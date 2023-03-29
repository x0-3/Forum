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

        

        public function users(){
            $this->restrictTo("ROLE_USER");

            $manager = new UserManager();
            $users = $manager->findAll(['registerdate', 'DESC']);

            return [
                "view" => VIEW_DIR."security/users.php",
                "data" => [
                    "users" => $users
                ]
            ];
        }

        public function forumRules(){
            
            return [
                "view" => VIEW_DIR."rules.php"
            ];
        }

        /*public function ajax(){
            $nb = $_GET['nb'];
            $nb++;
            include(VIEW_DIR."ajax.php");
        }*/
    }