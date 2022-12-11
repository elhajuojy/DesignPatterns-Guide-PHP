<?php 


class Singleton
{
    private static $instance = null;
    private $name = null;
    private $count = 0;
    //lazy instantiation
    private $database =null;
    private function __construct()
    {
        $this->name = "Singleton";
    }

    public static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new Singleton();
        }
        return self::$instance;
    }

    public function getDatabaseInstance()
    {
        if($this->database == null){
            $this->database = "database";
        }
        return $this->database;
    }
    public function getName()
    {
        return $this->name;
    }
    
    public function getCount()
    {
        return $this->count;
    }

    public function addOne(){
        $this->count++;
    }
}

$singleton = Singleton::getInstance();
$singleton1 = singleton::getInstance();

//2 object adding 1 to count
$singleton->addOne();
$singleton1->addOne();


//the count will be 2 because the 2 object are the same instance of the class

