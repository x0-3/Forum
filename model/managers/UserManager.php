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
        $sql = "SELECT u.id_user, u.pseudo, u.avatar
        FROM `".$this->tableName."` u
        WHERE u.pseudo = :pseudo
        ";

        return $this->getOneOrNullResult(
            DAO::select($sql, ['pseudo' => $data], false), 
            $this->className
        );
    }
    
    // find a pseudo 
    public function editPseudo($data, $idUser){
        $sql = "update user 
        SET pseudo = ?
        WHERE id_user = ?
        ";

        return $this->getOneOrNullResult(
            DAO::select($sql, [$data, $idUser], false), 
            $this->className
        );
    }

}