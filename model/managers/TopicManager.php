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
                    FROM " . $this->tableName . " a
                    WHERE a.category_id = :id
                    ORDER BY YEAR(topicCreatedAt) DESC, MONTH(topicCreatedAt) DESC,  DAY(topicCreatedAt) DESC
                    ";
                
            return $this->getMultipleResults(
                DAO::select($sql, ['id' => $id], true), 
                $this->className
            );

        }

        // finds the topics Posted by one user 
        public function TopicUser($id){

            $sql = "SELECT *
                    FROM ".$this->tableName." a
                    WHERE a.user_id = :id
                    ORDER BY YEAR(topicCreatedAt) DESC, MONTH(topicCreatedAt) DESC, DAY(topicCreatedAt) DESC
                    ";

            return $this->getMultipleResults(
                DAO::select($sql, ['id' => $id], true), 
                $this->className
            );
        }
        
        // finds the topics Posted by one user 
        public function deleteTopic($id){

            $sql = "DELETE FROM `topic` 
                    WHERE id_topic = ?
                    ";

            return $this->getMultipleResults(
                DAO::select($sql, [$id], true), 
                $this->className
            );
        }
        
        // finds the topics Posted by one user 
        public function findAuthor($user_id, $id_topic){

            $sql = "SELECT *
                    FROM topic 
                    WHERE user_id = ?
                    AND id_topic = ?
            ";

            return $this->getMultipleResults(
                DAO::select($sql, [$user_id, $id_topic], true), 
                $this->className
            );
        }

        // finds the topics Posted by one user 
        public function searchBar($topic){

            $sql = "SELECT *
                    FROM topic 
                    WHERE title like ? limit 5
                    ";

            return $this->getMultipleResults(
                DAO::select($sql, ["%".$topic."%"], true), 
                $this->className
            );
        }

    }