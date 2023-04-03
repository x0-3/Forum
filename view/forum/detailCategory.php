<?php
$categories = $result["data"]["categories"];
$topic = $result["data"]["topics"];
?>


<section class="topic">
    <form action="index.php?ctrl=home&action=searchBar" method="post" class="searchBar">
        <input type="search" name="search" id="search" placeholder="Search a topic ..." autocomplete="on">

        <input type="submit" id="submitButton" name="submit" value="&#x1F50E;&#xFE0E;">
    </form>

    <div class="categoryName">
        <h1><?=$categories ->getNameCategory()?></h1>
        <a href="index.php?ctrl=forum&action=topicForm&id=<?=$categories->getId()?>" class="fa-solid fa-plus"></a>
    </div>
    
    <?php
    if(isset($topic)){
        foreach ($topic as $topic){
            
            ?>
            
                
                <div class="posts">
                    
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
                
                </div>
                
            <?php

        }
    } else {
        ?>
        <h3>there is no topic for this section</h3>
        <?php
    }
    ?>
</section>


