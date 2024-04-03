<?php

use App\Factories\AramexFactory;
use App\Factories\FedexFactory;
use App\Factories\FetcherFactory;
use App\Services\Aramex;
use App\Services\Fedex;
use App\Services\Fetcher;
use PHPUnit\Framework\TestCase;

class ShippingFactoryTest extends TestCase
{

    public function testCreateAramexFactory()
    {
        $aramexFactory=new AramexFactory();
        $aramexService=$aramexFactory->create();
        $this->assertInstanceOf(Aramex::class, $aramexService);
    }
    public function testCreateFetcherFactory()
    {
        $fetcherFactory=new FetcherFactory();
        $fetcherService=$fetcherFactory->create();
        $this->assertInstanceOf(Fetcher::class, $fetcherService);
    }
    public function testCreateFedexFactory()
    {
        $fedexFactory=new FedexFactory();
        $fedexService=$fedexFactory->create();
        $this->assertInstanceOf(Fedex::class, $fedexService);
    }


}