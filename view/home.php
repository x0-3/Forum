<?php

$topics = $result["data"]['topics'];

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
            <div class="authorInfo">
                <figure>
                    <img src="<?=$topic->getUser()->getAvatar()?>" alt="avatar">
                    
                </figure>

                <a href="#">
                    <p><?=$topic->getUser()->getPseudo()?></p>
                    
                </a>
            </div>

            <p><?=$topic->getTopicCreatedAt()?></p>

            <a href="#">
            <p><?=$topic->getTitle()?></p>
            </a>


        </article>
    <?php
    // var_dump();
    }
    ?>

</section>


