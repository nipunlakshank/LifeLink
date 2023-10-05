<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?= APP_ICON ?>" type="image/x-icon">
    <title><?= APP_NAME ?> | <?= $this->title ?></title>

    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= PUBLIC_ROOT ?>/assets/css/style.css">
    <link rel="stylesheet" href="<?= PUBLIC_ROOT ?>/assets/css/animation.css">
    <?php if (file_exists(SERVER_ROOT . "/public/assets/css/" . strtolower(App::$page) . ".css")) : ?>
        <link rel="stylesheet" href="<?= PUBLIC_ROOT ?>/assets/css/<?= strtolower(App::$page) ?>.css">
    <?php endif; ?>

    <!-- JS -->
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script defer src="<?= PUBLIC_ROOT ?>/assets/js/main.js"></script>
    <?php if (file_exists(SERVER_ROOT . "/public/assets/js/" . strtolower(App::$page) . ".js")) : ?>
        <script defer src="<?= PUBLIC_ROOT ?>/assets/js/<?= strtolower(App::$page) ?>.js"></script>
    <?php endif; ?>

</head>

<body>
    <header>
        <div class="logo-wrapper">
            <img style="width: 100px;" src="<?= APP_LOGO ?>" alt="LOGO">
            <h1><?= APP_NAME ?></h1>
        </div>
    </header>