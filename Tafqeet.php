<?php
namespace Tafqeet\Tafqeet;
require_once ('Helper.php');
class Tafqeet extends Helper
{
    private $number;
    private $number_array = [];
    private $number_array_count;
    private $number_before_comma_array = [];
    private $number_before_comma_array_count = 0;

    private $number_after_comma_array = [];
    private $number_after_comma_array_count = 0;

    public function __construct($number)
    {

        $this->number = $number;
    }
    public function run()
    {

        if(!is_numeric($this->number))
        {
            return 0;
        }
        $this->splitToArray(); // split number to array
        $this->getStartupPointTitle();
        return $this->doWork();
    }
    private function splitToArray()
    {

        $split_array = explode('.',$this->number);
        $this->number_array = str_split($this->number);
        $this->number_array_count = count($this->number_array);


        if(count($split_array)>=1)
        {
            $this->number_after_comma_array = str_split($split_array[1]);
            $this->number_after_comma_array_count = count($this->number_after_comma_array);
        }


//        var_dump($split_array);
//        exit();

        $this->number_before_comma_array = str_split($split_array[0]);
        $this->number_before_comma_array_count = count($this->number_before_comma_array);



    }
    private function getStartupPointTitle()
    {
        return $this->number_array_count;
    }

    private  function  validateNumber($number,$index)
    {
        return $number != 0;

    }

    private  function detectTheTargetedArrayForTheCurrentPosition($position)
    {
        if($position==1)
            return $this->ones;


        if($position==2)
            return $this->tens;



        if($position==3)
            return $this->hundreds;



        if($position==4)
            return $this->thousands;


        if($position==5)
            return $this->millions;


        if($position==6)
            return $this->billions;



        if($position==7)
            return $this->trillions;

    }
    private  function  getRightPosition($number,$index,$len)
    {
        $position = $len - $index;
//       ;
        if($index==0 && $number>=3 && $len >= 4)
        {
            $arr =  $this->detectTheTargetedArrayForTheCurrentPosition(1);
            $arr2 = $this->detectTheTargetedArrayForTheCurrentPosition($position);

           return $arr[$number] .' '. $arr2[1];
        }


        if($index==1 && $number>=3 && $len >= 5)
        {
            $arr =  $this->detectTheTargetedArrayForTheCurrentPosition(1);
            $arr2 = $this->detectTheTargetedArrayForTheCurrentPosition($position);

            return $arr[$number] .' '. $arr2[1];
        }


        if($index==2 && $number>=3 && $len >= 6)
        {
            $arr =  $this->detectTheTargetedArrayForTheCurrentPosition(1);
            $arr2 = $this->detectTheTargetedArrayForTheCurrentPosition($position);

            return $arr[$number] .' '. $arr2[1];
        }


        if($index==3 && $number>=3 && $len >= 7)
        {


            $arr =  $this->detectTheTargetedArrayForTheCurrentPosition(1);
            $arr2 = $this->detectTheTargetedArrayForTheCurrentPosition($position);
            return $arr[$number] .' '. $arr2[1];
        }









        $arr =  $this->detectTheTargetedArrayForTheCurrentPosition($position);

        return $arr[$number];
    }



    private  function  getWordsForTenPosition($index)
    {
        $len = $this->number_before_comma_array_count;
        $index2 = $index + 1;
        $position = $len - $index;
        $position2 = $len - $index2;
        $number1 = $this->number_before_comma_array[$index];
        $number2 = $this->number_before_comma_array[$index2];
        $arr = $this->detectTheTargetedArrayForTheCurrentPosition($position);
        $arr2 = $this->detectTheTargetedArrayForTheCurrentPosition($position2);
        if($number2 == 0)
        {
            return    $arr[$number1];
        }
        if ($number1 ==1)
        {
            return $arr2[$number2] . ' ' . $arr[$number1];
        }
        return  $arr2[$number2] . ' و ' . $arr[$number1];
    }



    private  function  getWordsForLeftTenPosition($index)
    {
        $len = $this->number_after_comma_array_count;
        $index2 = $index + 1;
        $position = $len - $index;
        $position2 = $len - $index2;
        $number1 = $this->number_after_comma_array[$index];
        $number2 = $this->number_after_comma_array[$index2];
        $arr = $this->detectTheTargetedArrayForTheCurrentPosition($position);
        $arr2 = $this->detectTheTargetedArrayForTheCurrentPosition($position2);
        if($number2 == 0)
        {
            return    $arr[$number1] . ' ' . $this->single_after_comma;
        }
        if ($number1 ==1)
        {
            return $arr2[$number2] . ' ' . $arr[$number1] . ' ' . $this->single_after_comma;
        }
        return  $arr2[$number2] . ' و ' . $arr[$number1] .' '. $this->single_after_comma;
    }


    private function getWordsForNumberBeforeComma()
    {
        $words = "";
        foreach ($this->number_before_comma_array as $index => $key)
        {

            if($key==0)
            {
            }else
            {
                $goToTen = false;
                if($this->number_before_comma_array_count - 2== $index)
                {
                   $item = $this->number_before_comma_array[$this->number_before_comma_array_count - 2];
                    $goToTen = $item != 0;
                }
                if($goToTen && $key!=0 )
                {
                    $words.= $this->getWordsForTenPosition($index) . ' و ';
                }
                elseif($this->number_before_comma_array_count - 1== $index &&
                    $this->number_before_comma_array_count != 1)
                {

                }
                else
               if($this->validateNumber($key,$index))
                {
                    $words.= $this->getRightPosition($key,$index,$this->number_before_comma_array_count) . ' و';
                }
            }

        }
       return  strrev(implode(strrev($this->main_currency), explode(strrev('و'), strrev($words), 2))) . ''; //output:
        // bourbon, scotch,;
    }


    private function getWordsForNumberAfterComma()
    {
        $words = " و";
        $number_after_comma_sumation = 0;
        foreach ($this->number_after_comma_array as $index => $key)
        {
            if($key==0)
            {
                $number_after_comma_sumation = $number_after_comma_sumation * 10;
            }else
            {
                if($this->number_after_comma_array_count - 2== $index)
                {
                    $words.= $this->getWordsForLeftTenPosition($index) . ' و ';
                }
                elseif($this->number_after_comma_array_count - 1== $index && $key!=0 &&
                    $this->number_after_comma_array_count != 1)
                {

                }else if($this->validateNumber($key,$index))
                {
                    $number_after_comma_sumation+= $key;
                    $words.= $this->getRightPosition($key,$index,$this->number_after_comma_array_count) . ' و';
                }
            }


        }
        if($words==" و")
        {
            return '';
        }
        return  strrev(implode(strrev($this->getNameOfHala($number_after_comma_sumation) . ' '), explode(strrev('و'),
        strrev($words), 2))); //output:
    }



    private function doWork()
    {
        $words = '';
        $words.= $this->getWordsForNumberBeforeComma();
        $words.= $this->getWordsForNumberAfterComma();
        $words.='فقط لاغير';
        return str_replace('  ',' ',$words);

    }







}
