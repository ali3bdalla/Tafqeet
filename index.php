<?php
require_once ('vendor/autoload.php');


use Core\Core;
$core = new Core();

//for ($var = 0;)
print_r($core->setAmount('930000.20')->initValidation()->prepare()->run()->result('sar'));
echo "\n";

