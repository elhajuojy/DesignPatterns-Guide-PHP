<?php 

interface Observable {
    public function add(Observer $observer):void;
    public function remove():void ;
    public function notify();

}

interface Observer{
    function update();
}


class WeatherStation implements Observable{

    private $observers = []; 
    private $temperature = 0;
    public function add(Observer $observer):void{
        array_push($this->observers , $observer);
    }
    public function remove():void{

    } 
    public function notify(){
        foreach($this->observers as $observr){
            $observr->update();
        }
    }
    public function getTemperature(){
        return $this->temperature;
    }
    public function setTemperature($value){
        $this->temperature = $value;
        $this->notify();
    }
}

class PhoneDisplay implements Observer{

    public WeatherStation $weather ;

    public function __construct(WeatherStation $weatherStation)
    {
        $this->weather  = $weatherStation;
    }

    public function update():void
    {
        $this->weather->getTemperature();
    }
    public function displayPhone(){
        return "phone:".$this->weather->getTemperature();
    }
}

class WindowDisplay implements Observer{

    public WeatherStation $weather ;
    public function __construct(WeatherStation $weatherStation)
    {
        $this->weather  = $weatherStation;
    }

    public function update():void
    {
        $this->weather->getTemperature();
    }
    public function displayWindow(){
        return "windows:".$this->weather->getTemperature();
    }
}

$weatherStation = new WeatherStation();


$phone = new PhoneDisplay($weatherStation);
$window = new WindowDisplay($weatherStation);

$weatherStation->add($phone);
$weatherStation->add($window);


for ($x = 0; $x <= 10; $x++) {
    $weatherStation->setTemperature($x);
    $weatherStation->notify();
    echo $phone->displayPhone();
    echo "\n";
    echo $window->displayWindow();
    sleep(1);
    system('cls');
}

//!output
// phone:0
// windows:0
// phone:1
// windows:1
// phone:2
// windows:2
// phone:3
// windows:3
// phone:4
// windows:4
// phone:5
// windows:5
// phone:6
// windows:6
// phone:7
// windows:7
// phone:8
// windows:8
// phone:9
// windows:9
// phone:10
// windows:10