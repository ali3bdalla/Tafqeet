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
just try to browser index.php file or you can use direct php  command line by run the next command
```
$ php index.php
```
you should get result like that 
```
فقط تسعمائة ألف ريال و أربعة و ثلاثون هللة لاغير
```


now open index.php you will see this code 
```
print_r($core->setAmount('900000.34')->initValidation()->prepare()->run()->result('sar'));
```

just replace 900000.34  by the number you want  and run the above command you will see it will gives you  result


as you see 
```
result('sar')
```

here we spacify the currency you can put any other currecnry as you want like 
sdg 

also you can add new currency 

just open core/Core.php

you will see this code 

```
  public $config = [
        'connection_tool' => ' و ',
        'default_currency' => 'sar',
        'starter'=>'فقط',
        'end'=>'لاغير',
        'currencies' => [
            'sar' => [
                'main'=>'ريال',
                'single'=>'هللة',
                'multi'=>'هللات'
            ],

            'sdg' => [
                'main'=>'جنيه',
                'single'=>'قرش',
                'multi'=>'قروش'
            ],

        ],

    ];

```

add any currecny you want to currencies array 

## Note 
this script work untill 999999.99 
