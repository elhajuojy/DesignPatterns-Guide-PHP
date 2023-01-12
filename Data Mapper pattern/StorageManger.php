<?php 


class StorageManger{

    private array $data = [] ;

    public function __construct( array $data)
    {
        $this->data = $data;
    }
    public function find(string $id){
        return $this->data[$id] ?? null ;
    }

    public function save(array $data):bool{
        //save data to database
        $this->data = $data;
        return true ;
    }

    public function getData():array{
        return $this->data ;
    }
}