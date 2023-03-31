<?php

namespace Model\Managers;

use App\Manager;
use App\DAO;

class LikeManager extends Manager{

    protected $className = "Model\Entities\Like";
    protected $tableName = "like";

    public function __construct(){
        parent::connect();
    }

    // find a pseudo 
    public function findOneByPseudo($data){
        $sql = "SELECT *
        FROM `".$this->tableName."` u
        WHERE u.user_id = :id
        ";
        
        return $this->getOneOrNullResult(
            DAO::select($sql, ['id' => $data], false), 
            $this->className
        );
    }
    public function findOneByTopic($data){
        $sql = "SELECT *
        FROM `".$this->tableName."` u
        WHERE u.topic_id = :id
        ";
        
        return $this->getOneOrNullResult(
            DAO::select($sql, ['id' => $data], false), 
            $this->className
        );
    }

}