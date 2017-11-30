<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Igaster\LaravelCities\Geo;

class Country implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return !empty(Geo::searchNames($value)[0]);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Le nom de la ville n\' existe pas.';
    }
}
