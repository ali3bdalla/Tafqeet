<?php

namespace AliAbdalla\Tafqeet\Exceptions;

use Exception;

class InValidNumberException extends Exception
{
    public function __construct($input)
    {
        parent::__construct("The given Input `{$input}` is not valid number");
    }
}