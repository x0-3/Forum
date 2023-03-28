<?php

$topics = $result["data"]['topics'];

?>

<form action="#" method="post">
    <input type="submit" name="search" value="">
    <i type="submit" class="fa-solid fa-magnifying-glass"></i>
    <input type="search" name="search" id="search" placeholder="Search a topic ..." autocomplete="on">
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

                <a href="index.php?ctrl=forum&action=detailUser&id=<?=$topic->getUser()->getId()?>">
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


