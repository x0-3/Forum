<!-- // FIXME:add an insert into look into the syntaxe -->
<?php
$message = ["data"]["messages"];

$data = $_POST['text'];

filter_input(INPUT_POST,"text",FILTER_SANITIZE_FULL_SPECIAL_CHARS);
?>


<section class="addComment">
    <h1>Add a comment for</h1>

    <form action="post">
        <input type="text" value="text" name="text" id="text" placeholder="What do you want to write about ...">
    </form>
</section>
