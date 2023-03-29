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

        public function messageForm($id){

            return[
                "view" => VIEW_DIR."forum/addMessage.php",
                "data" => null,
            ];
        }

        // FIXME: need to retrieve user_id and topic_id
        public function addMessage($data){

            if(!empty($_POST)){

                $text = filter_input(INPUT_POST,"text",FILTER_SANITIZE_FULL_SPECIAL_CHARS);

                if($text){

                    $messageManager = new MessageManager();

                    if($messageManager->add([
                        "text"=> $text,
                    ]));{
                        // header("location:index.php");
                        echo "message ajouter";
                    }
                }
            }

        }


        public function topicForm(){
            return[
                "view" => VIEW_DIR."forum/addTopic.php",
                "data" => null,
            ];
        }

        // FIXME: need to retrieve user_id and category_id
        public function addTopic($data){

            if (!empty($_POST)) {
                
                $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

                if ($title) {

                    $topicManager = new TopicManager();

                    if ($topicManager->add([
                        "title" =>$title,
                    ])) {

                        // header("location:index.php");
                        echo "Topic ajouter";

                    }
                }
            }
        }
    }