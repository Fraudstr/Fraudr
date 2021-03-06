<?php

namespace Fraudr\Validators;

use Auth;
use Illuminate\Validation\Validator;

class CreditValidator implements ValidatorContract
{
    /**
     * Boot is called once before the first time the validate function is ran.
     */
    public function boot()
    {
        //
    }

    /**
     * @param string    $attribute  Name of the attribute being validated
     * @param object    $value      Value of the attribute being validated
     * @param array     $parameters Array of parameters
     * @param Validator $validator  Validator instance
     *
     * @return bool
     */
    public function validate(string $attribute, $value, array $parameters, Validator $validator): bool
    {
        return Auth::user()->credits >= $value;
    }
}