<?php

namespace App\Controllers;


use Exception;

class Products
{
    /**
     * @param string $name
     * @param float $quantity
     * @param string $category
     * @param array $attributes
     * @param float $price
     */

    public function __construct(public string $name, public float $quantity, public string $category, public array $attributes, public float $price)
    {
    }

    /**
     * @var array $attributes
     */
    private array $attribute_size_costs=[
        'small'=>-10,
        'medium'=>20,
        'large'=>50,
    ];
    private array $attribute_color_costs=[
        'white'=>-15,
        'red'=>20,
        'blue'=>18,
    ];
    public function get_name(): string
    {
        return $this->name;
    }

    public function get_quantity(): float
    {
        return $this->quantity;
    }

    public function get_category(): string
    {
        return $this->category;
    }

    public function get_attributes(): array
    {
        return $this->attributes;
    }

    public function get_price(): float
    {
        return $this->price;
    }

    /**
     * @throws Exception
     * @return int
     */
    public function calculate_price(): int
    {
        foreach ($this->attributes as $key => $attribute) {

            if ($key == 'size') {
                if (!array_key_exists($attribute,$this->attribute_size_costs))
                    throw new Exception('error in size!');
                $this->price+=$this->attribute_size_costs[$attribute];
            } elseif ($key == 'color') {
                if (!array_key_exists($attribute,$this->attribute_color_costs))
                    throw new Exception('error in color!');
                $this->price+=$this->attribute_color_costs[$attribute];

            } else {
                throw new Exception("error in attribute");
            }
        }
        return $this->price;
    }
}