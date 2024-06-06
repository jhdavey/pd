<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class DecimalPlaces implements Rule
{
    protected $places;

    public function __construct($places = 2)
    {
        $this->places = $places;
    }

    public function passes($attribute, $value)
    {
        return preg_match('/^\d+(\.\d{1,' . $this->places . '})?$/', $value);
    }

    public function message()
    {
        return 'The :attribute must be a number with up to ' . $this->places . ' decimal places.';
    }
}
