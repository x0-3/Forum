<?php
$categories = $result["data"]["category"]
?>

<section class="addTopic">
    <h1>Add a comment for</h1>

    <form action="index.php?ctrl=forum&action=addTopic&id=<?=$categories->getId()?>" method="post">
        <input type="text" name="title" id="text" placeholder="What do you want to write about ...">
        <input type="submit" value="add Topic">
    </form>
</section>
