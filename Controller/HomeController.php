<?php

    namespace Controller;

    use App\Session;
    use App\AbstractController;
    use App\ControllerInterface;
    use Model\Managers\UserManager;
    use Model\Managers\TopicManager;
    use Model\Managers\PostManager;

    
    class HomeController extends AbstractController implements ControllerInterface{

        public function index(){
            $topicManager = new TopicManager();

            return[
                "view" => VIEW_DIR. "home.php",
                "data" => [
                    "topics" => $topicManager->findAll(["topicCreatedAt", "DESC"]),                    
                ]
            ];
        }
    }