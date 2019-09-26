# Tafqeet



* [What Is Tafqeet](#what-is-it)
* [How To Lunch It](#how-to-lunch-it)
* [Note](#note)


### What Is Tafqeet 
Tafqeet is php script that help you to integrate payments and receipts document inside your project by convert 
amout into arabic words , it help you to add this words to any thing you want 

### How To Lunch It 
very easy just download the code 
also you can use composer to get fresh instance of the code by running the next command line 
$ composer require 3li3bdalla/tafqeet

after you got fresh instance of the code just navigate to the code folder 
```
$ cd --path--/Tafqeet
```

then run composer install 
```
$ composer install 
```

after that just run composer dump-autoload -o
```
$ composer dump-autoload -o
```

now everything is ready to work 
just try to browse test.php file or you can use direct php  command line by run the next command
```
$ php test.php
```
you should get result like that 
```
فقط تسعمائة ألف ريال و أربعة و ثلاثون هللة لاغير
```


now open test.php you will see this code 
```
var_dump(Tafqeet::arablic(30));
```

just replace 900000.34  by the number you want  and run the above command you will see it will gives you  result


also you can add new param to specify the currency like that
```
var_dump(Tafqeet::arablic(30,'usd'));
```

here we spacify the currency you can put any other currecnry as you want like 
sdg 

also you can add new currency 

just open src/core/Tafqeet.php

you will see this code 

```
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

## Note 
this script work untill 999999.99 
