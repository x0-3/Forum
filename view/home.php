<?php

$topics = $result["data"]['topics'];
$users = $result["data"]['users'];

// var_dump($users);

?>

<form action="">
    <i class="fa-solid fa-magnifying-glass"></i>
    <input type="search" placeholder="Search a topic ...">
</form>

<section class="posts">

    <?php
    foreach($topics as $topic){
        ?>
        <article>

            <p><?=$topic->getTopicCreatedAt()?></p>

            <a href="#">
                <p><?=$topic->getTitle()?></p>
            </a>


        </article>
    <?php
    }
    ?>

</section>


