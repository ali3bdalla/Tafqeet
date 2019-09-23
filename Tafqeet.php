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
        $this->splitToArray(); // split number to array
        $this->getStartupPointTitle();
        return $this->doWork();
    }
    private function splitToArray()
    {
        $split_array = explode('.',$this->number);

        $this->number_array = str_split($this->number);
        $this->number_array_count = count($this->number_array);


        $this->number_after_comma_array = str_split($split_array[1]);
        $this->number_after_comma_array_count = count($this->number_after_comma_array);

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

    }
    private  function  getRightPosition($number,$index,$len)
    {
        $position = $len - $index;
        $arr =  $this->detectTheTargetedArrayForTheCurrentPosition($position);
        return $arr[$number];
    }

    private function getWordsForNumberBeforeComma()
    {
        $words = "";
        foreach ($this->number_before_comma_array as $index => $key)
        {
            if($this->validateNumber($key,$index))
            {
                $words.= $this->getRightPosition($key,$index,$this->number_before_comma_array_count) . ' و';
            }
        }
       return  strrev(implode(strrev($this->main_currency), explode(strrev('و'), strrev($words), 2))); //output:
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
            }
            if($this->validateNumber($key,$index))
            {
                $number_after_comma_sumation+= $key;
                $words.= $this->getRightPosition($key,$index,$this->number_after_comma_array_count) . ' و';
            }
        }
        var_dump($number_after_comma_sumation);
        return  strrev(implode(strrev($this->getNameOfHala($number_after_comma_sumation)), explode(strrev('و'), strrev($words), 2))); //output:
    }



    private function doWork()
    {
        $words = '';
        $words.= $this->getWordsForNumberBeforeComma();
        $words.= $this->getWordsForNumberAfterComma();
        return $words.=' فقط لاغير';
    }







}

$work = new Tafqeet('1000.30');

print_r( $work->run());
echo  "\n";