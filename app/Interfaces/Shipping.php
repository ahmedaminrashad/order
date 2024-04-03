<?php
namespace App\Interfaces;
interface Shipping
{
public function calculateTaxes(string $country): float;

}