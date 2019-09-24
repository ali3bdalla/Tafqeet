<?php
require_once ('vendor/autoload.php');


use Core\Core;
$core = new Core();


print_r($core->setAmount('900000.34')->initValidation()->prepare()->run()->result('sar'));
echo "\n";

