<?php
require_once ('vendor/autoload.php');


use Core\Core;
$core = new Core();


print_r($core->setAmount('23.33')->initValidation()->prepare()->run()->result('sdg'));
echo "\n";

