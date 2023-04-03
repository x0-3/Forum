<?php
$topic = $result["data"]["topic"];

use app\Session;
?>

<section class="addComment">
    <h1>Add a comment</h1>

    <form action="index.php?ctrl=forum&action=addMessage&id=<?=$topic->getId()?>" method="post" enctype="multipart">

        <textarea name="text" id="text" cols="100" rows="10" placeholder="What do you want to write about ..."></textarea>

        <input type="hidden" name="token" value="<?=session::Token()?>">

        <input type="submit" value="add comment">
    </form>
</section>
