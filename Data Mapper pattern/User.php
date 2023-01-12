<?php 

require "StorageManger.php";
require "DataMapper.php";

class User {
    private string $id; 
    private string $username ; 
    private string $password ;


    //set and gets 

    public function setid($id){
        $this->id = $id ; 
    }

    public function getid(){
        return $this->id ; 
    }

    public function setusername($username){
        $this->username = $username ; 
    }

    public function getusername(){
        return $this->username ; 
    }

    public function setpassword($password){
        $this->password = $password ; 
    }

    public function getpassword(){
        return $this->password ; 
    }
    
}


// test 

$data  = [
    1=>[
        'username'=>"admin",
        'password'=>"123",
        "id"=>1

    ],
    2=>[
        'username'=>"user",
        'password'=>"123",
        "id"=>2
    ],
    3=>[
        'username'=>"user",
        'password'=>"133",
        "id"=>3
    ],
    
];

$storage = new StorageManger($data);
$userMapper = new DataMapper($storage);

$user = new User(); 
$user = $userMapper->findById(1);

var_dump($user);

// array(3) {
//     ["username"]=>
//     string(5) "admin"
//     ["password"]=>
//     string(3) "123"
//     ["id"]=>
//     int(1)
//   }



//another test 🦊
// $userMapper->save([
//     'username'=>"user",
//     'password'=>"133777",
//     "id"=>4
// ]);

// var_dump($storage->getData());
// array(3) {
//     ["username"]=>
//     string(4) "user"
//     ["password"]=>
//     string(6) "133777"
//     ["id"]=>
//     int(4)
//   }

