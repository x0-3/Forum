<?php
$topics = $result["data"]["topics"];


foreach ($topics as $topic){
    ?>

    <p><?=$topic->getTitle()?></p>

    <?php
}
?>

<h1>topic Page</h1>