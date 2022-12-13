<?php 

interface ICommand {
    public function execute();
    public function unexecute();
}

class Command implements ICommand{
    public Light $light ; 

    public function __construct(Light $light)
    {
        $this->light = $light;
    }

    public function execute(){
        $this->light->light = 1;
    }
    public function unexecute(){
        $this->light->light=0;
    }
}


class RemoteController{

    private ICommand $on;
    private ICommand $off;
    private ICommand $up;
    private ICommand $down;

    public function __construct(ICommand $on,ICommand $off,ICommand $up,ICommand $down)
    {
        $this->on= $on;
        $this->off= $off;
        $this->up= $up;
        $this->down= $down;
    }

    public function ClickOn(){
        $this->on->execute();
    }

    public function ClickOff(){
        $this->on->unexecute();
    }

}

class Light{
    public $light = 0;
    public function on(){
        $this->light = 1;
    }
    public function off(){
        $this->light = 0;
    }
}


$light = new Light();

$cmd1 = new Command($light);


$remoteController = new RemoteController($cmd1,$cmd1,$cmd1 ,$cmd1,$cmd1);

$remoteController->ClickOn();
echo $light->light;
$remoteController->ClickOff();
echo $light->light;
