<!-- // FIXME:add an insert into look into the syntaxe -->
<?php
// $message = ["data"]["message"];
// $topic = ["data"]["topic"];
// $data = $_POST['text'];

// filter_input(INPUT_POST,"text",FILTER_SANITIZE_FULL_SPECIAL_CHARS);

?>


<section class="addComment">
    <h1>Add a comment</h1>

    <form action="index.php?ctrl=forum&action=addMessage" method="post">
        <input type="text" name="text" id="text" placeholder="What do you want to write about ...">

        <input type="submit" value="add comment">
    </form>
</section>
