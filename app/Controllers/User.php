<?php

namespace App\Controllers;
class User
{

    /**
     * @param string $name
     * @param Address $address
     * @param float $age
     * @param string $gender
     * @param string $image
     */
    public function __construct(public string $name, public Address $address, public float $age=0, public string $gender='', string $image='')
    {
    }

    public function notify($message)
    {
        /**
         * TODO
         * we need to add channel to send notification to user but not now
         */
    }
}