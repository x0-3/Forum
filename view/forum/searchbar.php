<?php
$topics = $result["data"]['topics'];

?>

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


