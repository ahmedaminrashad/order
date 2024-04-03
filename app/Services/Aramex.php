<?php

namespace App\Services;


use App\Enums\CountriesEnums;
use App\Interfaces\Shipping;
use Exception;

class Aramex implements Shipping
{
    private const egyptTax=.14;
    private const kuwaitTax=.1;


    /**
     * @return float
     * @throws Exception
     * @var string $country
     */
    public function calculateTaxes(string $country): float
    {
        if ($country==CountriesEnums::Egypt)
            return  self::egyptTax;
        else if ($country==CountriesEnums::Kuwait)
            return self::kuwaitTax;
        else
            throw new Exception('Country Not Fount!');
    }
}