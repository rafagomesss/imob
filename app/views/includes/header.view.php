<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IMOB</title>
    <link rel="stylesheet" type="text/css" href="<?= ASSETS_PATH; ?>/css/bootstrap/bootstrap.min.css">
    <link rel="icon" href="<?= ASSETS_PATH; ?>/img/favicon.ico">
</head>

<body>
    <?php
    if ($this->menu) {
        require VIEWS_INCLUDES_PATH . 'menu.view.php';
    }
    ?>
    <div class="col-md-12 col-xl-12">
        <?php require VIEWS_INCLUDES_PATH . 'messages.view.php'; ?>
    </div>
    <div class="container">
