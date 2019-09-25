<?php
require_once ('vendor/autoload.php');



use Core\Core;

if(isset($_GET['amount']) and is_numeric($_GET['amount']))
{
    $core = new Core();
//    return header('Location:')
    echo $core->setAmount($_GET['amount'])->initValidation()->prepare()->run()->result('sar');
}


