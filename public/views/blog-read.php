<?php
$title = '';
$description = '';
$keywords = '';
?>

<?php $headExtra = section(function () { ?>
<?php }); ?>

<?php $content = section(function () use ($data) { ?>

<?php }); ?>

<?php $scriptsExtra = section(function () { ?>
  <script src="<?php echo asset('js/blog-post.js?v=0.8') ?>"></script>
<?php }); ?>

<?php include 'templates/main.php' ?>
