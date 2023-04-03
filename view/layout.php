<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/adba52364d.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="public/js/app.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="public\css\style.css">
    <title>Document</title>
</head>

<body>
    <?php
    use App\Session;
    ?>

    <h3 class="message"><?= Session::getFlash("success") ?></h3>
    <h3 class="message"><?= Session::getFlash("error") ?></h3>
    
    <header>
        <a href="index.php">
            <figure>
                <img src="public\img\logo.png" alt="logo">
            </figure>
        </a>

        <?php
        // if there is no user in session then show login button
        if($_SESSION == null){
            ?>
            
            <nav>
                <ul>
                    <li><a href="index.php" class="fa-solid fa-house"></a></li>
                    <li><a href="index.php?ctrl=forum&action=listCategories" class="fa-solid fa-puzzle-piece"></a></li>
                    <li><a href="index.php?ctrl=security&action=loginForm" class="fa-solid fa-user-plus"></a></li>
                </ul>
            </nav>

            <div class="account">
                <ul>
                <li><a href="#"><i class="fa-solid fa-gear"></i></a></li>
                </ul>
            </div>
            <?php

            // else show logout
        } else {
            ?>

            <nav>
                <ul>
                    <li><a href="index.php" class="fa-solid fa-house"></a></li>
                    <li><a href="index.php?ctrl=forum&action=listCategories" class="fa-solid fa-puzzle-piece"></a></li>
                    <li><a href="index.php?ctrl=security&action=logout" class="fa-solid fa-arrow-right-from-bracket"></a></li>
                </ul>
            </nav>

            <div class="account">
                <ul>
                    <li><a href="#"><i class="fa-solid fa-gear"></i></a></li>
                    <li>
                        <a href="index.php?ctrl=forum&action=profil">
                            <figure>
                                <img src="<?= Session::getUser()->getAvatar() ?>" alt="account avatar">

                            </figure>
                        </a>
                    </li>
                </ul>
            </div>

            <?php
        }
        ?>

        


    </header>

    <main>
        <?=$page?>
    </main>

    <footer>
        <ul>
            <li><a href="#">Legal</a></li>
            <li><a href="#">Privacy policy</a></li>
            <li><a href="#">Term of service</a></li>
            <li><a href="#">Contact us</a></li>
        </ul>
    </footer>

    <script src="tarteaucitron.js/tarteaucitron.js"></script>
    <script src="public/js/tarteaucitron.js"></script>


</body>
</html>