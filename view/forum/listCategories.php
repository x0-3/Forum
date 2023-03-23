<?php
$categories = $result["data"]["categories"];
?>

<h1>Featured Categories</h1>
<section class="listCategories">


    <?php
    foreach($categories as $category){
        ?>

        <a href="index.php?ctrl=forum&action=detailCategory&id=<?=$category->getId()?>">
            <div class="category">
                <p><?=$category->getNameCategory()?></p>
            </div>
        </a>

        <?php   
        var_dump($category->getId());

    }
    ?>

</section>