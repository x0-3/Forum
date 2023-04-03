<?php
$topic = $result["data"]["topic"];
$messages = $result["data"]["messages"];
?>

<?php

if (isset($topic)) {
    ?>

    <section class="posts">
        <article>

            <div class="topicHeader">

                <div class="authorInfo">
                    <figure>
                        <img src="<?= $topic->getUser()->getAvatar() ?>" alt="avatar">

                    </figure>

                    <a href="index.php?ctrl=forum&action=detailUser&id=<?= $topic->getUser()->getId() ?>">
                        <p><?= $topic->getUser()->getPseudo() ?></p>
                    </a>

                </div>

                <a href="index.php?ctrl=forum&action=deleteTopic&id=<?= $topic->getId() ?>">
                    <i class="fa-solid fa-trash" style="color: #b20101;"></i>

                </a>

                <?= $topic->getLockTopic() ?>
            </div>

            <p><?= $topic->getTopicCreatedAt() ?></p>

            <a href="index.php?ctrl=forum&action=detailTopic&id=<?= $topic->getId() ?>">
                <p><?= $topic->getTitle() ?></p>
            </a>

            <form action="index.php?ctrl=forum&action=like&id=<?= $topic->getId() ?>" method="post">

                <button id="submit" type="submit">
                    <i class="fa-regular fa-thumbs-up"></i>
                    <p><?= $topic->getLike() ? $topic->getLike() : "" ?></p>
                </button>

            </form>



        </article>

        <div class="messTitle">
            <h1>Messages</h1>
            <a href="index.php?ctrl=forum&action=messageForm&id=<?= $topic->getId() ?>" class="fa-solid fa-plus"></a>
        </div>


        <?php
        if (isset($messages)) {

            foreach ($messages as $message) {
                ?>

                <div class="messages">

                    <div class="authorInfo">

                        <a href="index.php?ctrl=forum&action=detailUser&id=<?= $message->getUser()->getId() ?>">
                            <p><?= $message->getUser()->getPseudo() ?></p>
                        </a>

                        <p><?= $message->getMessCreatedAt() ?></p>

                    </div>

                    <p><?= $message->getText() ?></p>

                </div>
                <?php
            }

        } else {
            ?>
            <h3>there no messages for this topic</h3>
            <?php
        }
        ?>
    </section>
    <?php

} else {
    ?>

    <h3>The topic has successfuly been deleted</h3>

    <?php
}
