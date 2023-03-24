<?php
$topic = $result["data"]["topic"];
$message = $result["data"]["messages"];
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

    <div class="message">
        
        <div class="messTitle">
            <h1>Messages</h1>
            <a href="#" class="fa-solid fa-plus"></a>
        </div>
    
        <div class="authorInfo">
    
            <a href="index.php?ctrl=forum&action=detailUser&id=<?=$message->getUser()->getId()?>">
                <p><?=$message->getUser()->getPseudo()?></p>
            </a>
    
            <p><?=$message->getMessCreatedAt()?></p>
    
        </div>
    
        <p><?=$message->getText()?></p>
    
    </div>
    
</section>
