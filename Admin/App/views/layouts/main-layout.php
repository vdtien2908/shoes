<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php
        echo $title = isset($pageName) ? $pageName : 'Document';
        ?>
    </title>
    <base href="/shoes/Admin/">
    <link rel="stylesheet" href="./public/css/main.css">
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@300;400;500;600;700&family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="./public/font/font-icon/css/all.css">
    <script type="text/javascript" src="./public/library/ckeditor5/ckeditor.js"></script>
</head>

<body>
    <div class="wrapper">
        <div class="container">
            <!-- sideBar -->
            <?php require_once './App/views/partials/sidebar.php' ?>

            <!-- Header -->
            <?php require_once './App/views/partials/header.php' ?>


            <!-- main -->
            <main class="main">
                <!-- main__content -->
                <div class="content" style="<?php echo $func->handlePaddingContent(); ?>">
                    <?php require_once './App/views/partials/pageLink.php' ?>
                    <?php require_once './App/views/partials/notificationAction.php' ?>
                    <?php require_once "./App/views/page/${page}.php" ?>

                </div>
            </main>
        </div>
    </div>

    <!--link JS  -->
    <script src="./public/js/main.js"></script>
    <script src="./public/js/notification.js"></script>
</body>

</html>