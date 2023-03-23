<?php
$categories = $result["data"]["categories"];
$topic = $result["data"]["topics"];
?>

<form action="">
    <i class="fa-solid fa-magnifying-glass"></i>
    <input type="search" placeholder="Search a topic ...">
</form>



<section class="posts">

    <h1><?=$categories->getNameCategory()?></h1>

    
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

</section>