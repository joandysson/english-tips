<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?php include dirname(__DIR__) . '/layouts/main/head.php' ?>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo asset('css/main.css?v=0.9') ?>">

    <?php
    if (isset($headExtra)) {
        echo $headExtra;;
    }
    ?>
</head>

<body>
    <div class="wrapper">
        <?php include dirname(__DIR__) . '/layouts/scriptTagManager.php' ?>
        <?php include dirname(__DIR__) . '/layouts/main/header.php' ?>

        <?php echo $content; ?>

        <?php include dirname(__DIR__) . '/layouts/main/footer.php' ?>
        <?php include dirname(__DIR__) . '/layouts/scripts.php' ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo asset('js/main.js?v=0.8') ?>"></script>
    <?php
    if (isset($scriptsExtra)) {
        echo $scriptsExtra;
    }
    ?>
</body>

</html>
