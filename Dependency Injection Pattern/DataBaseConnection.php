<?php 


namespace App\config ;


class DataBaseConnnection{

    private DataBaseConfig $config ;

    public function __construct(DataBaseConfig $config)
    {
        $this->config = $config;
    }

    public function getConnectionString(){
        return "host={$this->config->gethost()} dbname={$this->config->getdbname()} user={$this->config->getusername()} password={$this->config->getpassword()} port={$this->config->getport()}";

    }

    public function getConnectionString2(){
        return sprintf('mysql:host=%s;dbname=%s;port=%s;password=%s;user=%s', 
        $this->config->gethost(), 
        $this->config->getdbname(), 
        $this->config->getport(),
        $this->config->getpassword(),
        $this->config->getusername());
    }
}


?>
