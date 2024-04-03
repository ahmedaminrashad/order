<?php
namespace App\Controllers;

use App\Factories\AramexFactory;
use App\Factories\FedexFactory;
use Exception;


class Shipping
{

    /**
     * @param string $shipping_name
     * @param float $shipping_cost
     * @param float $shipping_tax
     */
    public function __construct(public string $shipping_name, public float $shipping_cost, public float $shipping_tax)
    {
    }

    private array $shippingProviders=[
        "fedex"=>FedexFactory::class,
        "aramex"=>AramexFactory::class,
        "fetcher"=>AramexFactory::class,
    ];

    /**
     * @return float
     * @throws Exception
     * @var $address
     */
    public function calculate_tax($address): float
    {

        if (!array_key_exists($this->shipping_name,$this->shippingProviders))
            throw new Exception('Operator not found!');

        $shippingProvider=new  $this->shippingProviders[$this->shipping_name];
        return $this->shipping_tax+$shippingProvider->create()->calculateTaxes($address->order_country);

    }

    public function notify($message)
    {
        /**
         * TODO
         * we need to add channel to send notification to shipping company but not now
         */
    }
}