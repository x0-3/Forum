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
    public function findOneByPseudo($user, $topic){
        $sql = "SELECT *
        FROM `".$this->tableName."` u
        WHERE u.user_id = ?
        AND u.topic_id = ?
        ";
        
        return $this->getOneOrNullResult(
            DAO::select($sql, [$user, $topic], false), 
            $this->className
        );
    }

    // delete a like on a specific id of topic and user id
    public function deleteLike($topic, $user){
        $sql = "DELETE FROM `".$this->tableName."`
                WHERE topic_id = ?
                and user_id = ?
                ";

        return DAO::delete($sql, [$topic, $user]); 
    }


    public function countLike($topic){
        $sql = "UPDATE topic t 
                SET `like` = (SELECT COUNT(*) FROM `like` l WHERE l.topic_id = ? )WHERE t.id_topic = ?
                ";

        return $this->getOneOrNullResult(
            DAO::select($sql, [$topic, $topic]), 
            $this->className
        );


    }

}