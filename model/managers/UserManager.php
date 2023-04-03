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
    public function findOneByPseudo($pseudo){
        $sql = "SELECT u.id_user, u.pseudo, u.avatar, u.password
        FROM `".$this->tableName."` u
        WHERE u.pseudo = ?
        ";

        return $this->getOneOrNullResult(
            DAO::select($sql, [$pseudo], false), 
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