<?php

use App\Controllers\Address;
use PHPUnit\Framework\TestCase;

class AddressTest extends TestCase
{
    public function testAddressConstructor()
    {
        $city="cairo";
        $street="el tahrir";
        $country="el tahrir";
        $address = new Address($city,$street,$country);
        $this->assertSame($city, $address->get_order_city());
        $this->assertSame($street, $address->get_order_street());
        $this->assertSame($country, $address->get_order_country());
        $this->assertEmpty($address->get_order_map());
    }

}