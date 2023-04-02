<?php
$topics = $result["data"]['topics'];
?>

<form action="index.php?ctrl=home&action=searchBar" method="post">
    <input type="search" name="search" id="search" placeholder="Search a topic ..." autocomplete="on">

    <input type="submit" id="submitButton" name="submit" value="search">
    <i class="fa-solid fa-magnifying-glass"></i>
</form>

<?php
if (isset($topics)) {
    ?>

    <section class="posts">

        <?php
        foreach ($topics as $topic) {
            ?>
            <article>
                <div class="authorInfo">
                    <figure>
                        <img src="<?= $topic->getUser()->getAvatar() ?>" alt="avatar">

                    </figure>

                    <a href="index.php?ctrl=forum&action=detailUser&id=<?= $topic->getUser()->getId() ?>">
                        <p><?= $topic->getUser()->getPseudo() ?></p>

                    </a>
                </div>

                <p><?= $topic->getTopicCreatedAt() ?></p>

                <a href="index.php?ctrl=forum&action=detailTopic&id=<?= $topic->getId() ?>">
                    <p><?= $topic->getTitle() ?></p>
                </a>


            </article>
        <?php
        }
        ?>

    </section>

<?php
} else {
    ?>
    <h3>Sorry there is no topic with this name.</h3>
<?php
}
?>