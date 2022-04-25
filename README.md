# Tafqeet


- [Tafqeet](#tafqeet)
  - [😎 What Is Tafqeet](#-what-is-tafqeet)
  - [⬇️ Installtion](#️-installtion)
  - [🔨 Uses](#-uses)
  - [🧐 Note](#-note)


## 😎 What Is Tafqeet 
Tafqeet is php script that help you to integrate payments and receipts document inside your project by convert 
amout into arabic words , it help you to add this words to any thing you want 


## ⬇️ Installtion
very easy just use composer to get it
```
$ composer require 3li3bdalla/tafqeet
```

now everything is ready to work 

## 🔨 Uses

```php
<?php

use AliAbdalla\Tafqeet\Core\Tafqeet;

$arablic = Tafqeet::arablic(900000.34);

echo $arablic;
```
you should get result like that 
```
فقط تسعمائة ألف ريال و أربعة و ثلاثون هللة لاغير
```

also you can specify currency in socend param defult is `sar`
```php
Tafqeet::arablic(30, 'usd');
```

here we spacify the currency you can put any other currecnry as you want like 
sdg 

also you can add new currency 

just open src/core/Tafqeet.php

you will see this code 

```php
public $config = [
    'connection_tool' => ' و',
    'default_currency' => 'sar',
    'starter'=>'فقط',
    'end'=>'لاغير',
    'currencies' => [
        'sar' => [
            'main1'=>'ريال',
            'main2'=>'ريالاً',
            'single'=>'هللة',
            'multi'=>'هللات'
        ],

        'sdg' => [
            'main1'=>'قرش',
            'main2'=>'قرشاً',
            'single'=>'قرش',
            'multi'=>'قروش'
        ],

        'usd' => [
                'main1'=>'دولار',
            'main2'=>'دولاراً',
            'single'=>'سنت',
            'multi'=>'سنت'
        ],


    ],

];
```

add any currecny you want to currencies array 

## 🧐 Note 
this script work untill 999999.99 
