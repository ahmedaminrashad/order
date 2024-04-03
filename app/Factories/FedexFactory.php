<?php

namespace App\Factories;

use App\Interfaces\Shipping;
use App\Interfaces\ShippingFactory;
use App\Services\Fedex;

class FedexFactory implements ShippingFactory
{

    public function create(): Shipping
    {
       return  new Fedex();
    }
}