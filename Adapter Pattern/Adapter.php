<?php

interface  ITarget{

    public function request();
}

class  Adapter implements  ITarget{

    private  SomethingToAdapte $somethingToAdapte;

    /**
     * @param SomethingToAdapte $somethingToAdapte
     */
    public function __construct(SomethingToAdapte $somethingToAdapte)
    {
        $this->somethingToAdapte = $somethingToAdapte;
    }


    public function request()
    {
       return $this->somethingToAdapte->doSomething();

    }
}

class  SomethingToAdapte{

    public function doSomething(){
        return "done ❤️";
    }
}

class  Client{
    private  ITarget $target ;

    public function  runTarget(){
        return $this->target->request();
    }


}

$target = new Adapter(new SomethingToAdapte());

echo $target->request();