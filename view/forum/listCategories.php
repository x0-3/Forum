<?php
$categories = $result["data"]["categories"];
?>

<h1>Featured Categories</h1>
<section class="listCategories">

    <?php
    foreach($categories as $category){
        ?>

        <a href="#">
            <div class="category">
                <p><?=$category->getNameCategory()?></p>
            </div>
        </a>

        <?php   
    }
    ?>

</section>