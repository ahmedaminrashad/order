<?php

namespace App\Factories;

use App\Interfaces\Shipping;
use App\Interfaces\ShippingFactory;
use App\Services\Aramex;
use App\Services\Fetcher;

class FetcherFactory implements ShippingFactory
{
    public function create(): Shipping
    {
      return new Fetcher();
    }
}