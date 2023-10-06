<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?= APP_ICON ?>" type="image/x-icon">
    <link rel="shortcut icon" href="<?= APP_ICON ?>" type="image/x-icon">
    <title><?= $this->title ?> | <?= APP_NAME ?></title>

    <!-- CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <link rel="stylesheet" href="https://cdn.quilljs.com/1.3.6/quill.snow.css">
    <link rel="stylesheet" href="https://cdn.quilljs.com/1.3.6/quill.core.css">
    <link rel="stylesheet" href="<?= PUBLIC_ROOT ?>/assets/css/select2.min.css">
    <link rel="stylesheet" href="<?= PUBLIC_ROOT ?>/assets/plugins/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="<?= PUBLIC_ROOT ?>/assets/css/style.css">
    <link rel="stylesheet" href="<?= PUBLIC_ROOT ?>/assets/css/animation.css">
    <?php if (file_exists(SERVER_ROOT . "/public/assets/css/" . strtolower(App::$page) . ".css")) : ?>
        <link rel="stylesheet" href="<?= PUBLIC_ROOT ?>/assets/css/<?= strtolower(App::$page) ?>.css">
    <?php endif; ?>

    <!-- JS -->
    <script defer src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script defer src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <script defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAGsWWXL-epXqoGQCw62WinAUf9Xf6B9fk&libraries=places&callback=initMapAndAutocomplete" async defer></script>
    <script defer src="https://cdn.jsdelivr.net/npm/quill-image-resize-module@3.0.0/image-resize.min.js"></script>
    <script defer src="<?= PUBLIC_ROOT ?>/assets/js/initMapAndAutocomplete.js"></script>
    <script defer src="<?= PUBLIC_ROOT ?>/assets/js/select2.min.js"></script>
    <script defer src="<?= PUBLIC_ROOT ?>/assets/js/form-advanced.init.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script defer src="<?= PUBLIC_ROOT ?>/assets/js/main.js"></script>
    <?php if (file_exists(SERVER_ROOT . "/public/assets/js/" . strtolower(App::$page) . ".js")) : ?>
        <script defer src="<?= PUBLIC_ROOT ?>/assets/js/<?= strtolower(App::$page) ?>.js"></script>
    <?php endif; ?>

</head>

<body>
    <header class="sticky-top">
        <div class="overflow-hidden" style="background-color: #F4F2EE;">
            <div class="offset-lg-1 col-lg-10">
                <div class="d-flex justify-content-between p-2">
                    <div class="header-left ji-center">
                        <a href="<?= ROOT ?>" class="pe-3 pointer">
                            <img style="width: 40px;" src="<?= APP_LOGO ?>" alt="LOGO" class="">
                        </a>
                        <div class="position-relative p-1 d-flex justify-content-center align-items-center border border-1 rounded rounded-2">
                            <i class="fa-solid fa-magnifying-glass mx-2 opacity-75 flex_lg"></i>
                            <i class="fa-solid fa-magnifying-glass mx-2 opacity-75 none_lg" onclick="open_search();"></i>
                            <input type="text" class="flex_lg" style="outline: none; border: none; background-color: #00000000;" placeholder="Search..">
                            <div id="mob_search" class="position-absolute d-none" style="z-index: 9; left: -2px;">
                                <div class="p-1 bg-light d-flex justify-content-center align-items-center border border-1 rounded rounded-2">
                                    <i class="fa-solid fa-magnifying-glass mx-2 opacity-75"></i>
                                    <input type="text" class="" style="outline: none; border: none; background-color: #00000000;" placeholder="Search..">
                                    <i class="fa-solid fa-circle-xmark" onclick="open_search()"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="header-right ji-center position-relative">
                        <div class="mx-3 ms-5 text-center border-bottom border-2 border-dark pointer">
                            <i class="fa-solid fa-house opacity-50 fs-5"></i>
                            <p class="m-0 flex_lg" style="font-size: 12px;">Home</p>
                        </div>
                        <div class="mx-3 text-center border-2 border-dark pointer">
                            <i class="fa-solid fa-bell opacity-50 fs-5"></i>
                            <p class="m-0 flex_lg" style="font-size: 12px;">Notification</p>
                        </div>
                        <div class="mx-3 text-center border-2 border-dark pointer">
                            <i class="fa-solid fa-envelope  opacity-50 fs-5"></i>
                            <p class="m-0 flex_lg" style="font-size: 12px;">Messaging</p>
                        </div>
                        <div class="ji-center border-start ps-3 pointer" onclick="open_log_out();">
                            <div class="ji-center position-relative rounded rounded-circle" style="width: 35px; height: 35px;">
                                <img src="https://cdn-icons-png.flaticon.com/128/3135/3135715.png" alt="" class="img-fluid">
                            </div>
                        </div>
                        <div id="log_out_div" class="header-btn d-none position-absolute bg-white p-4 py-2 border border-1 rounded rounded-3" style="right: 37px; z-index: 9; top: 0;">
                            <?php if (Auth::logged_in()) : ?>
                                <a class="text-danger logout-btn" href="<?= ROOT ?>/logout">Log out</a>
                            <?php else : ?>
                                <a class="text-primary login-btn" href="<?= ROOT ?>/login">Log in</a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>