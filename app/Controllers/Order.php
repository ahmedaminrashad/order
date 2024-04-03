<?php

namespace App\Controllers;

use App\Enums\OrderStatusEnums;
use PHPUnit\Framework\Exception;

class Order
{


    /**
     * @param Products[] $products
     * @param User $user
     * @param Shipping $shipping
     * @param string $status
     * @param float $shipping_tax
     * @param float $price
     * @param bool $is_done
     * @param float $o_inv_num
     */

    public function __construct(public array $products, public User $user, public Shipping $shipping, public float $shipping_tax, public float $price = 0, public bool $is_done = false, public float $o_inv_num = 0, public string $status = '')
    {
    }

    /**
     * @var array
     */

    private array $silentStatusList = [
        OrderStatusEnums::Received,
        OrderStatusEnums::Rejected
    ];
    /**
     * @var array
     */
    private array $statusUpdate = [
        OrderStatusEnums::Pending => OrderStatusEnums::Pending,
        OrderStatusEnums::Accepted => OrderStatusEnums::Accepted,
        OrderStatusEnums::Processing => OrderStatusEnums::Processing,
        OrderStatusEnums::Received => OrderStatusEnums::Pending,//Logic Error
        OrderStatusEnums::Rejected => OrderStatusEnums::Pending,//Logic Error
        OrderStatusEnums::Delivering => OrderStatusEnums::Delivering,
        OrderStatusEnums::Canceled => OrderStatusEnums::Canceled,
        OrderStatusEnums::Returned => OrderStatusEnums::Returned,
    ];
    /**
     * @var array
     */
    private array $statusList = [
        OrderStatusEnums::Rejected,
        OrderStatusEnums::Pending,
        OrderStatusEnums::Received,
        OrderStatusEnums::Accepted,
        OrderStatusEnums::Processing,
        OrderStatusEnums::Delivering,
        OrderStatusEnums::Returned,
        OrderStatusEnums::Canceled,
    ];


    /**
     * @param string $status
     * @param bool $extra
     * @return void
     * @throws \Exception
     */
    public function change_status(string $status, bool $extra = false): void
    {
        if (!in_array($status, $this->statusList))
            throw new Exception("Wrong Status! ");


        $this->notify($status);
        $this->status = $this->statusUpdate[$status];
        $total_price = 0;
        if ($status == OrderStatusEnums::Accepted) {
            foreach ($this->products as $product) {
                $total_price += $product->calculate_price();
            }
            if ($extra) {
                $tax = $this->shipping_tax * 2;
                $tax = $tax + ($this->price * $tax);
                if ($tax == 0) {
                    $_tax = 1;
                    $this->price *= $_tax;
                }
            }
            $this->price = $total_price;
        } elseif ($status == OrderStatusEnums::Delivering) {
            $this->o_inv_num = rand(1, 10);
            foreach ($this->products as $product) {
                $total_price = $product->calculate_price();
            }
            $this->price = $total_price;
            $tax = $this->shipping_tax + $this->shipping->calculate_tax($this->user->address);
            $this->price += $tax + $this->shipping->shipping_cost;
        } elseif ($status == OrderStatusEnums::Received) {
            $this->is_done = true;
        }


    }

    /**
     * @param string $status
     * @return void
     */
    private function notify(string $status): void
    {
        if (!in_array($status, $this->silentStatusList))
            $this->user->notify("your order is {$status}");

    }

    /**
     * @return string
     */
    public function print_receipt(): string
    {
        $receipt = '';
        if ($this->status == OrderStatusEnums::Delivering) {
            $receipt .= "total price : $this->price #|# user name : {$this->user->name}";
            foreach ($this->products as $product) {
                $receipt .= " #|# product name : $product->name category : $product->category price : $product->price";
                foreach ($product->attributes as $key => $attribute) {
                    $receipt .= " #|# $key $attribute";
                }
            }
            return $receipt;
        } else {
            throw new Exception ("Order not being delivered yet.");
        }
    }
}