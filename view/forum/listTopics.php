<?php

$topic = $result["data"]['topics'];

?>

<h1>Listes topics</h1>

<?php
foreach($topics as $topic){
    ?>

    <p><?=$topic->getTitle()?></p>

<?php
}

?>