<?php
$category = $result["data"]["categories"];
$topic = $result["data"]["topics"];

?>

<form action="">
    <i class="fa-solid fa-magnifying-glass"></i>
    <input type="search" placeholder="Search a topic ...">
</form>



<section class="posts">

    <h1><?=$category->getNameCategory()?></h1>
    
    <article>

        <h1><?=$topic->getCategory()->getNameCategory()?></h1>
        <h1><?=$topic->getTitle()?></h1>
 
    </article>

</section>