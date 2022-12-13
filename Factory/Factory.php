<?php 

interface Ibank{
    public function Widthdraw();
}

class bankA implements Ibank{

    public function Widthdraw()
    {
        return "I am bank A";
    }
}

class bankB implements Ibank{

    public function Widthdraw()
    {
        return "I am bank B";
    }
}

interface IbankFactory{

    public function GetBank(string $bankCode):Ibank;
}

class BankFactory implements IbankFactory{

    public function GetBank(string $bankCode):Ibank{
        switch($bankCode){
            case "123456" : return new BankA(); 
            case "111111" : return new BankB(); 
        }
        return null ; 
    }
}


$bankFactory = new BankFactory();


$bank = $bankFactory->GetBank("111111");

echo $bank->Widthdraw();


