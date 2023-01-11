<?php


// Path: Strategy Pattern\StrategyPattern.php

// Compare this snippet from Creational design pattern\index.php:

class Client{
    private  $strategy;

    public function __construct(){
        // $this->strategy = $strategy;
    }
    
    public function runOpreation($num1, $num2){
        return $this->strategy->doOperation($num1, $num2);
    }

    public function setStrategy($strategy){
        $this->strategy = $strategy;
    }

    public function doOperation($num1, $num2){
        return $this->strategy->doOperation($num1, $num2);
    }
}

// Path: Strategy Pattern\StrategyPattern.php
interface Strategy{
    public function doOperation($num1, $num2);
}

class OperationAdd implements Strategy{
    public function doOperation($num1, $num2){
        return $num1 + $num2;
    }
}

class OperationSubstract implements Strategy{
    public function doOperation($num1, $num2){
        return $num1 - $num2;
    }
}

$Client1 = new Client();
$Client1->setStrategy(new OperationAdd());
echo  $Client1->runOpreation(10, 5);

echo "\n";
$Client2 = new Client();
$Client2->setStrategy(new OperationSubstract());
echo  $Client2->runOpreation(10, 5);



// output:
// 15
// 5
