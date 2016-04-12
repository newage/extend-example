<?php

namespace Example\Validate;

class Validator
{
    public function validate($value)
    {
        if (is_array($value)) {

        } elseif (is_numeric($value)) {
            $value = (int)$value;
        } elseif (is_string($value)) {
            
        }
    }
}