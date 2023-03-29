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

            $target_dir = "public/upload/"; //directory of where the file is going to be
            
            // used hash to with the algorithm sha256 
            $target_file = $target_dir . basename(hash('sha256',$_FILES["avatar"]["name"])); //specifies the path of the img that gonna be uploaded
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION)); // holds the file extension

            // if form is not empty
            if (!empty($_POST)) {

                $avatar = $target_file; //instance the $target_file variable to the poster in order to insert it in db  


                // Check if image file is a actual image or fake image
                $check = getimagesize($_FILES["avatar"]["tmp_name"]);

                if($check !== false) {

                    echo "File is an image - " . $check["mime"] . ".";
                    $uploadOk = 1;

                } else {

                    echo "File is not an image.";
                    $uploadOk = 0;
                }

                // Check if file already exists
                if (file_exists($target_file)) {

                    echo "Sorry, file already exists.";
                    $uploadOk = 0;
                }

                // Check file size
                if ($_FILES["avatar"]["size"] > 200000) {

                    echo "Sorry, your file is too large.";
                    $uploadOk = 0;
                }

                // Allow certain file formats
                if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
                    
                    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                    $uploadOk = 0;
                }

                // Check if $uploadOk is set to 0 by an error
                if ($uploadOk == 0) {

                    echo "Sorry, your file was not uploaded.";

                    // if everything is ok, try to upload file
                } else {

                    if (move_uploaded_file($_FILES["avatar"]["tmp_name"], $target_file)) {

                        echo "The file ". htmlspecialchars( basename( $_FILES["avatar"]["name"])). " has been uploaded.";
                    } else {

                        echo "Sorry, there was an error uploading your file.";
                    }
                }



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
                                "avatar" => $avatar,
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

        // TODO:
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