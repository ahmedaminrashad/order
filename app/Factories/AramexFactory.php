<?php

namespace App\Factories;

use App\Interfaces\Shipping;
use App\Interfaces\ShippingFactory;
use App\Services\Aramex;

class AramexFactory implements ShippingFactory
{
    public function create(): Shipping
    {
      return new Aramex();
    }
}