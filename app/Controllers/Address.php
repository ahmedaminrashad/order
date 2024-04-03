<?php

namespace App\Controllers;
class Address
{


    /**
     * @param string $order_city
     * @param string $order_street
     * @param string $order_country
     * @param string $order_nearest_point
     * @param string $order_map
     */
    public function __construct(public string $order_city,public string $order_street,public string $order_country,public string $order_nearest_point='',public string $order_map='')
    {
    }

    public function get_order_city(): string
    {
        return $this->order_city;
    }

    public function get_order_street(): string
    {
        return $this->order_street;
    }

    public function get_order_country(): string
    {
        return $this->order_country;
    }

    public function get_order_nearest_point(): string
    {
        return $this->order_nearest_point;
    }

    public function get_order_map(): string
    {
        return $this->order_map;
    }
}