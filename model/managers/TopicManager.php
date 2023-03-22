<?php

    namespace Model\Managers;

    use App\Manager;
    use App\DAO;

    class TopicManager extends Manager{

        protected $classname = "Model\Entities\Topic";
        protected $tablename = "topic";


        public function __construct(){
            parent::connect();
        }


    }