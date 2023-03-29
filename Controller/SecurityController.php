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
                "view" => VIEW_DIR."security/register.php",
                "data" => null,
            ];
        } 


        public function register(){

            // if form is not empty
            if (!empty($_POST)) {
                // TODO: add avatar 

                // filter the inputs
                $pseudo = filter_input(INPUT_POST, "pseudo", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_FULL_SPECIAL_CHARS, FILTER_VALIDATE_EMAIL);
                $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $confirmPassword = filter_input(INPUT_POST, "confirmPassword", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

                // check if it's filtered correcly
                if ($pseudo && $email && $password) {

                    // if the password and the confirm password is the same and that it's lenght is more or 8 char
                    if (($password == $confirmPassword ) and strlen($password) >= 8) {
                        
                        $manager = new UserManager();
                        $user = $manager->findOneByPseudo($pseudo);

                        // if there is no user with this name 
                        if (!$user) {
                            
                            // then the password is hashed
                            $hash = password_hash($password, PASSWORD_DEFAULT);

                            // then added into the db
                            if ($manager->add([ 
                                "pseudo" => $pseudo,
                                "email" => $email,
                                "password" => $hash,
                            ])) {
                                
                                echo "vous ête bien inscrit";

                                // else it redirects the user to the homePage
                                header("location:index.php");
                            }
                        }
                    }
                }
            }

            // else it redirects the user to the register form page
            return [
                "view" => VIEW_DIR."security/register.php",
                
            ];
        }

        public function login(){

            // password_verify();

            // user en session
            // SESSION::$user;
        }

        public function modifyPassword(){
            
        }

        public function logout(){

            // enlever utilisateur de la session
            // redirect vers home ou login
            // message de confirmation
        }
    }