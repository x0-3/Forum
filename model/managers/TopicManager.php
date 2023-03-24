<?php

    namespace Model\Managers;

    use App\Manager;
    use App\DAO;

    class TopicManager extends Manager{

        protected $className = "Model\Entities\Topic";
        protected $tableName = "topic";


        public function __construct(){
            parent::connect();
        }


        // finds the topics of one category 
        public function TopicCategory($id){

            $sql = "SELECT *
                    FROM ".$this->tableName." a
                    WHERE a.category_id = :id
                    ";

            return $this->getOneOrNullResult(
                DAO::select($sql, ['id' => $id], false), 
                $this->className
            );
        }

        // finds the topics of one category 
        public function TopicUser($id){

            $sql = "SELECT *
                    FROM ".$this->tableName." a
                    WHERE a.user_id = :id
                    ";

            return $this->getOneOrNullResult(
                DAO::select($sql, ['id' => $id], false), 
                $this->className
            );
        }

    }