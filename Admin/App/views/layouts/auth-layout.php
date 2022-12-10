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
</head>

<body>
    <div class="wrapper">
        <div class="container">
            <?php require_once "./App/views/page/${page}.php" ?>
        </div>
    </div>

    <!--link JS  -->
    <script src="./public/js/main.js"></script>
</body>

</html>