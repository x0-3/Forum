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

        // detail page for one category 
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

        // detail page for one topic 
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
        
        // delete one topic 
        public function deleteTopic($id){
            $topicManager = new TopicManager();
            $messageManager = new MessageManager();

            return [
                "view" => VIEW_DIR."forum/detailTopic.php",
                "data" => [
                    "topic" => $topicManager->deleteTopic($id),
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
                $userLike=$likeManager->findOneByPseudo($user, $topic);

                // $TopicLike=$likeManager->findOneByTopic($topic);


                // if the user hasn't liked the topic then 
                if (!$userLike) {

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

                // count the number of like on a topic
                $likeManager->countLike($topic);
            }


        }

        // detail page for one user 
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

        // profil page with all the topic created by the user in session
        public function profil(){
            $topicManager = new TopicManager();

            $user_id = session::getUser()->getId();

            return [
                "view" => VIEW_DIR."forum/profil.php",
                "data" => [
                    "topics" =>$topicManager->TopicUser($user_id),
                ]
            ];
        }

        // page for message form      
        public function messageForm($id){

            $topicManager = new TopicManager();

            return[
                "view" => VIEW_DIR."forum/addMessage.php",
                "data" => [
                    "topic" => $topicManager->findOneById($id),

                ]

            ];
        }

        // form action
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

        // page for topic form      
        public function topicForm($id){
            $categoryManager = new CategoryManager();

            return[
                "view" => VIEW_DIR."forum/addTopic.php",
                "data" => [
                    "category" => $categoryManager->findOneById($id),

                ]

            ];
        }
        
        // form action
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
                header("location:index.php?ctrl=forum&action=detailcategory&id=".$categories);
            }
        }
    }