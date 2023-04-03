<?php
use app\Session;

$user = session::getUser()->getId();
?>

<section class="addTopic">
    <form action="index.php?ctrl=forum&action=pseudoEdit&id=<?=$user?>" method="post">

        <input type="text" name="pseudo" id="pseudo">

        <input type="submit" value="Change username">
    </form>
</section>