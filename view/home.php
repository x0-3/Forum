<?php

$topics = $result["data"]['topics'];

?>

<form action="">
    <i class="fa-solid fa-magnifying-glass"></i>
    <input type="search" placeholder="Search a topic ...">
</form>

<section class="posts">

    <article>

    </article>

</section>
<?php
foreach($topics as $topic){
    ?>

    <p><?=$topic->getTopicCreatedAt()?></p>
    <p><?=$topic->getTitle()?></p>

<?php
}

?>

