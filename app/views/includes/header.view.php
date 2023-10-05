<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?= APP_ICON ?>" type="image/x-icon">
    <title><?= APP_NAME ?> | <?= $this->title ?></title>

    <!-- CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <link rel="stylesheet" href="<?= PUBLIC_ROOT ?>/assets/plugins/bootstrap/bootstrap.min.css">
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
        <div class="" style="background-color: #fff;">
            <div class="p-3 d-flex">
                <div class="pe-3">
                    <img style="width: 40px;" src="<?= APP_LOGO ?>" alt="LOGO" class="">
                </div>
                <div class="d-flex justify-content-center align-items-center border border-1 rounded rounded-2">
                    <i class="fa-solid fa-magnifying-glass mx-2 opacity-75"></i>
                    <input type="text" style="outline: none; border: none;" placeholder="Search..">
                </div>
                <div>
                    <i class="fa-solid fa-house"></i>
                </div>
                <div>

                </div>
                <div>

                </div>
            </div>
        </div>
    </header>