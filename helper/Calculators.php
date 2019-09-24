<?php


namespace Helper;
trait Calculators
{
    use Digit;





    public function classA($arr,$len = 1)
    {
        return $this->ones[$arr[0]];
    }

    public function classB($arr,$len = 2)
    {




        if($arr[1]==0)
           return $this->tens[$arr[0]];




        return $this->ones[$arr[1]] . $this->config['connection_tool'] . $this->tens[$arr[0]];
    }


    public function classC($arr,$len = 3)
    {


        if($arr[0]==0 and $arr[1] == 0)
            return $this->ones[$arr[2]];

        if($arr[0]==0)
            return $this->classB([$arr[1],$arr[2]]);

        if($arr[2] == 0 and $arr[1] == 0)
            return $this->hundreds[$arr[0]];


        if($arr[1]!=0)
            return $this->hundreds[$arr[0]] . $this->config['connection_tool']  . $this->classB([$arr[1],$arr[2]]);


        return $this->hundreds[$arr[0]] . $this->config['connection_tool'] . $this->classA([$arr[2]]);

    }




    public function classD($arr,$len = 4)
    {
        $classC = [$arr[1],$arr[2],$arr[3]];

        if($arr[0]<=2)
            $thousands = $this->thousands[$arr[0]] ;
        else
            $thousands = $this->ones[$arr[0]] . ' ' . $this->thousands['39'];


        if($arr[1] == 0 and $arr[2] == 0 and $arr[3] == 0)
             return $thousands;






        return $thousands . $this->config['connection_tool'] . $this->classC($classC);

    }




    public function classE($arr,$len = 5)
    {
        $classC = [$arr[2],$arr[3],$arr[4]];

        if($arr[0]!=0)
        {
            $conn = ' ';

            if(in_array($arr[1],[2,1]))
                $thousands =  $this->others[$arr[1]]  . $conn . $this->tens[$arr[0]] ;
            else
                $thousands =  $this->ones[$arr[1]]  . $conn . $this->tens[$arr[0]] ;


            if($arr[1] == 0)
            {
                $thousands =  $this->tens[$arr[0]] ;
            }
            $thousands.=' ' . $this->thousands[1199];
        }else
        {
            if(in_array($arr[1],[2]))
                $thousands =  $this->others[$arr[1]]  . ' '  ;
            else
                $thousands =  $this->ones[$arr[1]]  . ' ' ;


            if($arr[1] == 0)
            {
                $thousands =  $this->tens[$arr[2]] ;
            }
            $thousands.=' ' . $this->thousands[39];
        }
//



        return $thousands  . $this->config['connection_tool'] . $this->classC($classC);

    }






    public function classF($arr,$len = 6)
    {
        $classE = [$arr[1],$arr[2],$arr[3],$arr[4],$arr[5]];


        if($arr[0]<=2)
            $million = $this->millions[$arr[0]] ;
        else
            $million = $this->ones[$arr[0]] . ' ' . $this->millions['39'];




        return $million . $this->config['connection_tool'] . $this->classE($classE);

    }




    public function classG($arr,$len = 7)
    {
        $classE = [$arr[2],$arr[3],$arr[4],$arr[5],$arr[6]];


        if(in_array($arr[1],[2]))
            $million =  $this->others[$arr[1]]  . $this->config['connection_tool'] . $this->tens[$arr[0]] ;
        else
            $million =  $this->ones[$arr[1]]  . $this->config['connection_tool'] . $this->tens[$arr[0]] ;


        if($arr[1] == 0)
        {
            $million =  $this->tens[$arr[0]] ;
        }


        $million.=' ' . $this->millions[1199];




        return $million . $this->config['connection_tool'] . $this->classE($classE);

    }






}



