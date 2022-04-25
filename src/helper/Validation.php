<?php

namespace AliAbdalla\Tafqeet\Helper;

use AliAbdalla\Tafqeet\Exceptions\InValidNumberException;

trait Validation
{

    public function initValidation()
    {
    	if (!is_numeric($this->parsed_number)) {
            
            throw new InValidNumberException($this->parsed_number);
        }
        
        return $this;
    }
}