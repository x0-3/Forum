<?php
$topic = $result["data"]["topic"];
?>

<section class="addComment">
    <h1>Add a comment</h1>

    <form action="index.php?ctrl=forum&action=addMessage&id=<?=$topic->getId()?>" method="post" enctype="multipart">
        <input type="text" name="text" id="text" placeholder="What do you want to write about ...">

        <input type="submit" value="add comment">
    </form>
</section>
