<?php
$user = $result['data']['user'];
$topic = $result['data']['topics'];
?>


<div class="profilIntro">
    <figure>
        <img src="<?=$user->getAvatar()?>" alt="profil picture">

        <figcaption>
            <h2><?=$user->getPseudo()?></h2>

        </figcaption>
    </figure>
    

</div>


<?php
    foreach ($topic as $topic){
        
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
?>