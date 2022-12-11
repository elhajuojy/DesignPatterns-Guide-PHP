<?php 


class Invoice {

    private $id ;

    public $date  = "2022-01-01";
    public function __construct() {
        $this->id = uniqid("invoice_");

    }
    public function __clone() {
        $this->id = uniqid("invoice_");
    }

    public function getdate() {
        return $this->date;
    }

}


$invoice = new Invoice();
$invoice1 = clone $invoice;

var_dump($invoice, $invoice1);

