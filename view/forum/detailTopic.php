<?php
$topic = $result["data"]["topic"];
$messages = $result["data"]["messages"];
?>


<section class="posts">    
    <article>

        <div class="topicHeader">

            <div class="authorInfo">
                <figure>
                    <img src="<?=$topic->getUser()->getAvatar()?>" alt="avatar">
                    
                </figure>
    
                <a href="index.php?ctrl=forum&action=detailUser&id=<?=$topic->getUser()->getId()?>">
                    <p><?=$topic->getUser()->getPseudo()?></p>
                </a>
                
            </div>
            
            <?=$topic->getLockTopic()?>
        </div>

        <p><?=$topic->getTopicCreatedAt()?></p>
        
        <a href="index.php?ctrl=forum&action=detailTopic&id=<?=$topic->getId()?>">
        <p><?=$topic->getTitle()?></p>
        </a>
    </article>

    <div class="messTitle">
        <h1>Messages</h1>
        <a href="index.php?ctrl=forum&action=addMessage&id=<?=$topic->getId()?>" class="fa-solid fa-plus"></a>
    </div>

    <?php
    foreach ($messages as $message){
        ?>
        
        <div class="message">
            

            <div class="authorInfo">
        
                <a href="index.php?ctrl=forum&action=detailUser&id=<?=$message->getUser()->getId()?>">
                    <p><?=$message->getUser()->getPseudo()?></p>
                </a>
        
                <p><?=$message->getMessCreatedAt()?></p>
        
            </div>
        
            <p><?=$message->getText()?></p>
        
        </div>
    <?php
    }
    ?>
</section>
