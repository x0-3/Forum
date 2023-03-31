<?php

    namespace Controller;

    use App\Session;
    use App\AbstractController;
    use App\ControllerInterface;
    use Model\Managers\TopicManager;
    use Model\Managers\MessageManager;
    use Model\Managers\CategoryManager;
    use Model\Managers\UserManager;
    use Model\Managers\LikeManager;

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


        public function like(){
            
            // if button submit pressed
            if(empty($_POST)){
                $likeManager = new LikeManager();
                
                // get the user in session
                $user = SESSION::getUser()->getId();

                // get the id of the topic
                $topic = $_GET['id'];
                
                // look if there is a dublicate of the user and the topic
                $userLike=$likeManager->findOneByPseudo($user);
                $TopicLike=$likeManager->findOneByTopic($topic);

                // if the user or the topic hasn't been liked yet then add to db
                if (!$userLike || !$TopicLike) {
                    

                    $likeManager->add([
                        "user_id" => $user,
                        "topic_id" => $topic,
                    ]);

                    header("location:index.php?ctrl=forum&action=detailTopic&id=".$topic);

                } else {

                    // else if the user has already liked the topic then delete the like from db
                    $likeManager->deleteLike($topic, $user);
    
                    // and redirect to the topic page
                    header("location:index.php?ctrl=forum&action=detailTopic&id=".$topic);
                }
            }

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

            $topicManager = new TopicManager();

            return[
                "view" => VIEW_DIR."forum/addMessage.php",
                "data" => [
                    "topic" => $topicManager->findOneById($id),

                ]

            ];
        }

        public function addMessage(){

            if(!empty($_POST)){

                $user = session::getUser()->getId();

                $topic = $_GET['id']; 

                $text = filter_input(INPUT_POST,"text",FILTER_SANITIZE_FULL_SPECIAL_CHARS);

                if($text){

                    $messageManager = new MessageManager();

                    $messageManager->add([
                        "text"=> $text,
                        "user_id" => $user,
                        "topic_id"=>$topic,
                    ]);

                    echo "message ajouter";
                    header("location:index.php?ctrl=forum&action=detailTopic&id=".$topic);
                }
            }

        }


        public function topicForm($id){
            $categoryManager = new CategoryManager();

            return[
                "view" => VIEW_DIR."forum/addTopic.php",
                "data" => [
                    "category" => $categoryManager->findOneById($id),

                ]

            ];
        }

        public function addTopic(){

            if (!empty($_POST)) {

                $user= SESSION::getUser()->getId();

                $categories = $_GET['id'];   
                
                $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

                if ($title) {

                    $topicManager = new TopicManager();

                    $topicManager->add([
                        "title" =>$title,
                        "category_id" =>$categories,
                        "user_id" =>$user,
                    ]);
                    
                }
                header("location:index.php?ctrl=forum&action=listCategories");
            }
        }
    }