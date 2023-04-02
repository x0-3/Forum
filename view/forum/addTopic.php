<?php
$categories = $result["data"]["category"]
?>

<section class="addTopic">
    <h1>Add a topic</h1>

    <form action="index.php?ctrl=forum&action=addTopic&id=<?=$categories->getId()?>" method="post">

        <textarea name="title" id="text" cols="100" rows="10" placeholder="What do you want to write about ..."></textarea>

        <input type="submit" value="add Topic">
    </form>
</section>
