<?php

class Obj

{

    public $id;

    public $size;

    public $color;

    function __construct($id, $size, $color)

       {

        $this->id = $id;

        $this->size = $size;

        $this->color = $color;

    }

    function __clone()

        {

       $green = $this->color->green;

        $blue = $this->color->blue;

         $red = $this->color->red;

        $this->color = new Color($green, $blue, $red);

    }

}

class Color

{

    public $green;

    public $blue;

    public $red;

    function __construct($green, $blue, $red)

        {

        $this->green = $green;

        $this->blue = $blue;

        $this->red = $red;

    }

}

$color = new Color(23, 42, 223);

$obj1 = new Obj(23, "small", $color);

$obj2 = clone $obj1;

$obj2->id++;

$obj2->color->red = 255;

$obj2->size = "big";


var_dump($obj1, $obj2);


//output 🚀

// object(Obj)#2 (3) {
//     ["id"]=>
//     int(23)
//     ["size"]=>
//     string(5) "small"
//     ["color"]=>
//     object(Color)#1 (3) {
//       ["green"]=>
//       int(23)
//       ["blue"]=>
//       int(42)
//       ["red"]=>
//       int(223)
//     }
//   }
//   object(Obj)#3 (3) {
//     ["id"]=>
//     int(24)
//     ["size"]=>
//     string(3) "big"
//     ["color"]=>
//     object(Color)#4 (3) {
//       ["green"]=>
//       int(23)
//       ["blue"]=>
//       int(42)
//       ["red"]=>
//       int(255)
//     }
//   }


?>

