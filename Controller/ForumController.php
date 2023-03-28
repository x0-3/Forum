<?php

    namespace Controller;

    use App\Session;
    use App\AbstractController;
    use App\ControllerInterface;
    use Model\Managers\TopicManager;
    use Model\Managers\MessageManager;
    use Model\Managers\CategoryManager;
    use Model\Managers\UserManager;

    class ForumController extends AbstractController implements ControllerInterface{

        public function index(){
            
            $categoryManager = new CategoryManager();

            return [
                "view" => VIEW_DIR."forum/listCategories.php",
                "data" => [
                    "categories" => $categoryManager->findAll(),
                ]
            ];

        }


        public function detailCategory($id){

            $categoryManager = new CategoryManager();
            $topicManager = new TopicManager();

            return [
                "view" => VIEW_DIR."forum/detailCategory.php",
                "data" => [
                    "categories" => $categoryManager->findOneById($id),
                    "topics" =>$topicManager->TopicCategory($id),
                ]
            ];
        }


        public function detailTopic($id){
            $topicManager = new TopicManager();
            $messageManager = new MessageManager();

            return [
                "view" => VIEW_DIR."forum/detailTopic.php",
                "data" => [
                    "topic" => $topicManager->findOneById($id),
                    "messages" => $messageManager->TopicMessage($id),
                ]
            ];
        }

        public function detailUser($id){
            $userManager = new UserManager();
            $topicManager = new TopicManager();

            return [
                "view" => VIEW_DIR."forum/DetailUser.php",
                "data" => [
                    "user" => $userManager->findOneById($id),
                    "topics" =>$topicManager->TopicUser($id),
                ]
            ];
        }

        // FIXME:add an insert into look into the syntaxe
        public function addMessage($data){
    
            $messageManager = new MessageManager();
    
            return [
                "view" => VIEW_DIR."forum/addMessage.php",
                "data" => [
                    "messages" => $messageManager->add($data),
                ]
            ];
        }
        // FIXME:add an insert into look into the syntaxe
        public function addTopic($data){
    
            $topicManager = new TopicManager();
    
            return [
                "view" => VIEW_DIR."forum/addTopic.php",
                "data" => [
                    "topics" => $topicManager->add($data),
                ]
            ];
        }
    }