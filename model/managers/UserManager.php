<?php

namespace Model\Managers;

use App\Manager;
use App\DAO;

class UserManager extends Manager{

    protected $className = "Model\Entities\User";
    protected $tableName = "user";


    public function __construct(){
        parent::connect();
    }

    
    // find a pseudo 
    public function findOneByPseudo($data){
        $sql = "SELECT u.pseudo
        FROM ".$this->tableName." u
        WHERE u.pseudo = :pseudo
        ";

        return $this->getOneOrNullResult(
            DAO::select($sql, ['pseudo' => $data], false), 
            $this->className
        );
    }


}