<?php

    namespace Model\Entities;

    use App\Entity;

    final class Topic extends Entity{

        private $id;
        private $title;
        private $topicCreatedAt;
        private $lockTopic;
        private Category $category;
        private User $user;
        

        public function __construct($data){
            $this->hydrate($data);
        }


        /**
         * Get the value of title
         */ 
        public function getTitle()
        {
                return $this->title;
        }

        /**
         * Set the value of title
         *
         * @return  self
         */ 
        public function setTitle($title)
        {
                $this->title = $title;

                return $this;
        }

        /**
         * Get the value of topicCreatedAt
         */ 
        public function getTopicCreatedAt()
        {
                return $this->topicCreatedAt ;
        }

        /**
         * Set the value of topicCreatedAt
         *
         * @return  self
         */ 
        public function setTopicCreatedAt($topicCreatedAt)
        {
                $formatDate = strtotime( $topicCreatedAt );
                $topicCreatedAt = date( 'd/m/Y', $formatDate );

                $this->topicCreatedAt = $topicCreatedAt;

                return $this;
        }

        /**
         * Get the value of lockTopic
         * if locked then show closed lock 
         * else open lock
         */ 
        public function getLockTopic()
        {
                if ($this->lockTopic == true) {
                        return "<i class='fa-solid fa-lock'></i>";
                }else{
                        return "<i class='fa-solid fa-lock-open'></i>";
                }
        }

        /**
         * Set the value of lockTopic
         *
         * @return  self
         */ 
        public function setLockTopic($lockTopic)
        {
                $this->lockTopic = $lockTopic;

                return $this;
        }

   

        /**
         * Get the value of category
         */ 
        public function getCategory()
        {
                return $this->category;
        }

        /**
         * Set the value of category
         *
         * @return  self
         */ 
        public function setCategory($category)
        {
                $this->category = $category;

                return $this;
        }

        /**
         * Get the value of user
         */ 
        public function getUser()
        {
                return $this->user;
        }

        /**
         * Set the value of user
         *
         * @return  self
         */ 
        public function setUser($user)
        {
                $this->user = $user;

                return $this;
        }


        /**
         * Get the value of id
         */ 
        public function getId()
        {
                return $this->id;
        }

        /**
         * Set the value of id
         *
         * @return  self
         */ 
        public function setId($id)
        {
                $this->id = $id;

                return $this;
        }
    }