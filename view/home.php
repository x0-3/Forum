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

            <a href="index.php?ctrl=forum&action=detailTopic&id=<?=$topic->getId()?>">
            <p><?=$topic->getTitle()?></p>
            </a>


        </article>
    <?php
    }
    ?>

</section>


