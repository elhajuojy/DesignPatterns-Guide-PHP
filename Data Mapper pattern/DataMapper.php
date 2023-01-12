

<?php 


class DataMapper{

    private $manger ;

    public function __construct(StorageManger $manger)
    {
        $this->manger = $manger;
    }


    public function findById(string $id){
        return $this->manger->find($id);
    }

    public function save(array $user){
        return $this->manger->save($user);
    }

}