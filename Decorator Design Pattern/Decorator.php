
<?php 

interface ISandwich {
    public function getCost():float;
    public function getDescription():string;
};

class BasicSandwich implements ISandwich{

    public function getCost(): float
    {
        return 10;
    }
    public function getDescription(): string
    {
        return "Bread";
    }
}

class SandwichDecorator implements ISandwich{
    private ISandwich $sandwich ;

    public function __construct(ISandwich $sandwich)
    {
        $this->sandwich = $sandwich;
    }

    public function getCost(): float
    {
        return $this->sandwich->getCost();
    }
    public function getDescription(): string
    {
        return $this->sandwich->getDescription();
    }
}

class Beef extends SandwichDecorator{
    
    public function __construct(ISandwich $iSandwich)
    {
        parent::__construct($iSandwich);
    }

    public function getCost(): float
    {
        return parent::getCost()+5;
    }
    public function getDescription(): string
    {
        return parent::getDescription().", Beef";
    }
}

class Cheese extends SandwichDecorator{
    
    public function __construct(ISandwich $iSandwich)
    {
        parent::__construct($iSandwich);
    }

    public function getCost(): float
    {
        return parent::getCost()+10;
    }
    public function getDescription(): string
    {
        return parent::getDescription().", Cheese";
    }
}



$mySandwich = new Cheese(new Beef(new BasicSandwich()));

echo "Description ". $mySandwich->getDescription();
echo "\n";
echo "Cost ". $mySandwich->getCost();


//output :

// Description Bread, Beef, Cheese
// Cost 25