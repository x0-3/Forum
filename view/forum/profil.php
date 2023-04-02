<?php
use App\Session;

$topics = $result["data"]["topics"];
?>

<div class="profilIntro">
    <figure>
        <img src="<?=Session::getUser()->getAvatar()?>" alt="profil picture">

        <figcaption>
            <h2><?=Session::getUser()->getPseudo()?></h2>

        </figcaption>
    </figure>

</div>


<?php
if (isset($topics)) {
    
    foreach ($topics as $topic){
        
        ?>

        <section class="posts">
            
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

        </section>
    <?php
    }
} else {
    ?>

    <h3>no topic for this user</h3>
    
    <?php
}
?>