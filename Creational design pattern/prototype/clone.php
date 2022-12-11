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


// object(Invoice)#1 (2) {
//     ["id":"Invoice":private]=>
//     string(21) "invoice_6395c403f1541"
//     ["date"]=>
//     string(10) "2022-01-01"
//   }

//   object(Invoice)#2 (2) {
//     ["id":"Invoice":private]=>
//     string(21) "invoice_6395c403f154b"
//     ["date"]=>
//     string(10) "2022-01-01"
//   }