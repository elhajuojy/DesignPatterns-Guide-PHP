<?php 

namespace App\config ;

class DataBaseConfig{
    private string $host ; 
    private string $username ; 
    private string $password ; 
    private string $dbname ; 
    private string $port ;
    
    public function __construct(string $host, string $username, string $password, string $dbname, string $port)
    {
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->dbname = $dbname;
        $this->port = $port;
    }

    public function gethost(){
        return $this->host;

    }
    public function getusername(){
        return $this->username;

    }
    public function getpassword(){
        return $this->password;

    }
    public function getdbname(){
        return $this->dbname;

    }
    public function getport(){
        return $this->port;

    }
    



}