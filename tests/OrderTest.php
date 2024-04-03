<?php
use App\Controllers\Address;
use App\Controllers\Order;
use App\Controllers\Products;
use App\Controllers\Shipping;
use App\Controllers\User;
use App\Enums\OrderStatusEnums;
use PHPUnit\Framework\TestCase;

class OrderTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function testOrderHaveReceipt()
    {
        $address = new Address("cairo","el tahrir","egypt");
        $shipping = new Shipping("aramex",13,10);
        $attributes = ['size' => 'small', 'color' => 'red'];
        $product = new products('t-shirt',30,'men',$attributes,50);
        $user = new user('ahmed mohamed',$address);
        $order = new order([$product],$user,$shipping,.02);
        $order->change_status(OrderStatusEnums::Delivering);
        $print_receipt = $order->print_receipt();
        $this->assertEquals('total price : 83.16 #|# user name : ahmed mohamed #|# product name : t-shirt category : men price : 60 #|# size small #|# color red', $print_receipt);
    }
}
