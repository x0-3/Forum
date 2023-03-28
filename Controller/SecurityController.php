<?php

    namespace Controller;

    use App\Session;
    use App\AbstractController;
    use App\ControllerInterface;
    use Model\Managers\TopicManager;
    use Model\Managers\MessageManager;
    use Model\Managers\CategoryManager;
    use Model\Managers\UserManager;

    class SecurityController extends AbstractController implements ControllerInterface{

        public function index(){
            
        }

        // manage the form
        public function registerForm(){
            return[
                "view" => VIEW_DIR."security/login.php",
                "data" => null,
            ];
        } 
    }