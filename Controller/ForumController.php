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
            $likeManager = new LikeManager();

            return [
                "view" => VIEW_DIR."forum/detailTopic.php",
                "data" => [
                    "topic" => $topicManager->findOneById($id),
                    "messages" => $messageManager->TopicMessage($id),
                    "like" => $likeManager->countLike($id),
                ]
            ];
        }
        
        // delete one topic 
        public function deleteTopic(){

            $topicManager = new TopicManager();

            // get the user in session
            $user = session::getUser()->getId();
            $topic = $_GET['id']; // get the id of the topic 

            // query to find the user topic 
            $topicAuthor = $topicManager->findAuthor($user, $topic);

            // find if the user is admin or not
            $admin = $topicManager->findIfAdmin($user);

            // if the user has written the post or that the user is an admin then
            if($topicAuthor || $admin){

                $topicManager->deleteTopic($topic); // delete the post
                header("location:index.php?ctrl=forum&action=profil"); // redirect on it's profil page

            } else {

                header("location:index.php?ctrl=forum&action=detailTopic&id=".$topic); // else stay in the current post page
            }

        }

        // TODO:
        public function lockTopic(){

            $topicManager = new TopicManager;

            $user = session::getUser()->getId();

            $admin = $topicManager->findIfAdmin($user); //see if user is admin 

            $topic = $_GET['id'];

            // if the user is an admin then
            if ($admin) {

                // see the status of the topic
                $status = $topicManager->lockStatus($topic);

                // if the topic is not locked then 
                if ($status) {

                    $topicManager->addLock($topic);
                    session::addFlash("success", "The topic has been locked");
                    header("location:index.php?ctrl=forum&action=detailTopic&id=".$topic);
                    
                } else {

                    $topicManager->removeLock($topic);
                    session::addFlash("success", "The topic has been unlocked");
                    header("location:index.php?ctrl=forum&action=detailTopic&id=".$topic);

                }

            } else {

                session::addFlash("error", "Only admins can lock a topic");
                header("location:index.php?ctrl=forum&action=detailTopic&id=".$topic);
            }


            

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

        // edit the user name
        public function pseudoForm($id){
            $userManager = new UserManager();

            return[
                "view" => VIEW_DIR."forum/editPseudo.php",
                "data" => [
                    "user" => $userManager->findOneById($id),

                ]

            ];
        }

        // edit the user name
        public function pseudoEdit(){

            // if the form is not empty 
            if (!empty($_POST)) {

                // filter the input
                $pseudo = filter_input(INPUT_POST, "pseudo", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

                // check if the input has been correctly filtered
                if ($pseudo) {
                    
                    $user = session::getUser()->getId();
                    
                    $userManager = new UserManager;

                    $userManager->editPseudo($pseudo, $user); // update the column pseudo to the user id in session

                    session::addFlash("success", "the username will change once you've disconnected") ;
                    header("location:index.php?ctrl=forum&action=profil");

                } else {

                    session::addFlash("error", "couldn't edit your username please try again") ;
                }
            } 
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

                    session::addFlash("success", "message added") ;
                    header("location:index.php?ctrl=forum&action=detailTopic&id=".$topic);
                }
            }else {
                session::addFlash("error", "an error as occured") ;

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
                session::addFlash("success", "Topic added") ;
                header("location:index.php?ctrl=forum&action=detailcategory&id=".$categories);
            } else {
                session::addFlash("erreor", "couldn't add the topic") ;

            }
        }
    }