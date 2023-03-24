<?php

namespace Model\Managers;

use App\Manager;
use App\DAO;

class MessageManager extends Manager{
    protected $className = "Model\Entities\Message";
    protected $tableName = "message";

    public function __construct(){
        parent :: connect();
    }

    
    // finds the messages of one Topic 
    public function TopicMessage($id){

        $sql = "SELECT *
                FROM ".$this->tableName." a
                WHERE a.topic_id = :id
                ";

        return $this->getMultipleResults(
            DAO::select($sql, ['id' => $id], true), 
            $this->className
        );
    }
}
