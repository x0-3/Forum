<?php

    namespace Controller;

    use App\Session;
    use App\AbstractController;
    use App\ControllerInterface;
    use Model\Managers\TopicManager;
    use Model\Managers\MessageManager;
    use Model\Managers\CategoryManager;

    class ForumController extends AbstractController implements ControllerInterface{

        public function index(){
            
            $categoryManager = new CategoryManager();
            // $topicManager = new TopicManager();

            return [
                "view" => VIEW_DIR."forum/listCategories.php",
                "data" => [
                    "categories" => $categoryManager->findAll(),
                ]
            ];

        }

        // FIXME:topic doesn't match it's category 
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
    }