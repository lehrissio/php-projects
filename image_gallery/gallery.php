<?php
include './inc/functions.inc.php';
include './inc/images.inc.php';

?>
<?php include './views/header.php'; ?>
    
<div class="grid">
    <?php foreach($imageTitles AS $key => $value) : ?>
        <div class="item">
            <a href="image.php?<?php echo http_build_query(['image' => $key]); ?>"><?php echo $value; ?></a>
            <img src="./images/<?php echo rawurldecode($key); ?>" alt="">
        </div>
    <?php endforeach; ?>
</div>

<?php include './views/footer.php'; ?>
