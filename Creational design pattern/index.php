<?php 

require "singleton.php";


$singleton = Singleton::getInstance();

$singleton->addOne();
$singleton->addOne();

echo $singleton->getCount();
echo $singleton->getDatabaseInstance();