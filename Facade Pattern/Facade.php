<?php
/**
 * Facade
 *
 * @desc
 *     Takes a bundle of similar classes and puts all the shared functionality
 *     into one. It acts like a mask for different classes that do similar
 *     things.
 *
 * @usage
 *     Handle Prices from different suppliers/vendors.
 *     Handle a Shopping Cart checkout process.
 *
 * @example
 *     We will create a Retail Price calculator.
 *
 */

class Facade // Should be called RetailPriceFacade
{
    public $item_id;
    public $vendor_id;

    public function __construct($item_id, $vendor_id) {
        $this->item_id = $item_id;
        $this->vendor_id = $vendor_id;
    }

    // This would be the shared function among all the other classes
    public function process() {
        $wholesale_price = new WholesaleCost($this->item_id, $this->vendor_id);
        $markup_price = new MarkupCost($this->item_id, $this->vendor_id);
        return $wholesale_price->getCost() + $markup_price->getCost();
    }

}

// --------------------------------------------------------
// Fake Class(es) for Example
// --------------------------------------------------------
class WholesaleCost
{
    public function __construct($item_id, $vendor_id){
        // Database look up the vendors wholesale price
        
    }
    public function getCost(){
        return 40.00;
    }
}

class MarkupCost
{
    // This could obviously do much more
    public function __construct($item_id, $vendor_id) {
        // Database look up the vendors wholesale price
        
    }
    public function getCost(){
        return 4.95;
    }

}

// --------------------------------------------------------
// Example
// --------------------------------------------------------
// Here you would pss the item_id and vendor_id
$kbtoys = new Facade(1, 3);
$toysrus = new Facade(1, 4);
$bestbuy = new Facade(1, 2);

$retail_prices = [
    'bestbuy' => $bestbuy->process(), 
    'kbtoys' => $kbtoys->process(),
    'toysrus' => $toysrus->process(),
];

// Sell the most expensive item
arsort($retail_prices);
reset($retail_prices);
$most_expensive = key($retail_prices);

printf("Most Cost Effective: %s", $most_expensive);

