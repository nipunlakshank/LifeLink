<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS -->
    <link rel="icon" href="<?= PUBLIC_ROOT ?>/assets/images/favicon.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="<?= PUBLIC_ROOT ?>/assets/css/login.css">

    <!-- JS -->
    <script defer src="<?= PUBLIC_ROOT ?>/assets/js/login.js"></script>

    <title><?= $this->title ?> | <?= APP_NAME ?></title>

</head>

<body>

    <?php $this->view('includes/popup') ?>

    <div class="container">
        <div class="box <?= $form ?>">
            <img class="logo" src="<?= APP_LOGO2 ?>" role="logo" alt="<?= APP_NAME ?>">

            <!--- Login Section --->
            <div class="box-login active">
                <form action="<?= ROOT ?>/login" method="post" id="form-login">
                    <input type="hidden" name="form" value="login" />
                    <div class="top-header">
                        <h3>Welcome to <a href="<?= ROOT ?>" class="link-home"><?= APP_NAME ?></a></h3>
                        <small>We are happy to have you back.</small>
                    </div>
                    <div class="input-group">
                        <div class="input-field">
                            <input type="username" class="input-box" name="username" value="<?= get_value('username') ?>" id="username" placeholder=" " required>
                            <label for="username">Username</label>
                            <?php if (!empty($errors['username'])) : ?>
                                <span class="text-error"><?= $errors['username'] ?></span>
                            <?php endif; ?>
                        </div>
                        <div class="input-field">
                            <input type="password" class="input-box" name="password" value="<?= get_value('password') ?>" id="passwd-1" placeholder=" " required>
                            <label for="passwd-1">Password</label>
                            <div class="eye-area">
                                <div class="eye-box" onclick="togglePassword(1)">
                                    <i class="fa-regular fa-eye" id="eye-1"></i>
                                    <i class="fa-regular fa-eye-slash" id="eye-slash-1"></i>
                                </div>
                            </div>
                            <?php if (!empty($errors['password'])) : ?>
                                <span class="text-error"><?= $errors['password'] ?></span>
                            <?php endif; ?>
                        </div>
                        <div class="remember">
                            <input type="checkbox" name="remember_me" <?= get_value('remember_me') ? 'checked' : '' ?> id="formCheck" class="check">
                            <label for="formCheck"> Remember Me</label>
                        </div>
                        <div class="input-field">
                            <input type="submit" id="btn-login" class="input-submit" value="Login">
                        </div>
                        <div class="forgot">
                            <a href="#">Forgot password?</a>
                        </div>
                    </div>
                </form>
            </div>

            <!---- Registeration Section--->
            <div class="box-register" aria-disabled="true">
                <form action="<?= ROOT ?>/login" method="post" id="form-register">
                    <input type="hidden" name="form" value="register">
                    <div class="top-header">
                        <h3>Register with <a href="<?= ROOT ?>" class="link-home"><?= APP_NAME ?></a></h3>
                        <small>We are happy to have you with us.</small>
                    </div>
                    <div class="input-group">
                        <div class="input-field">
                            <input type="text" class="input-box" name="fname" value="<?= get_value('fname') ?>" id="fname" placeholder=" " required>
                            <label for="fname">First Name</label>
                            <?php if (!empty($errors['fname'])) : ?>
                                <span class="text-error"><?= $errors['fname'] ?></span>
                            <?php endif; ?>
                        </div>
                        <div class="input-field">
                            <input type="text" class="input-box" name="lname" value="<?= get_value('lname') ?>" id="lname" placeholder=" " required>
                            <label for="lname">Last Name</label>
                            <?php if (!empty($errors['lname'])) : ?>
                                <span class="text-error"><?= $errors['lname'] ?></span>
                            <?php endif; ?>
                        </div>
                        <div class="input-field">
                            <input type="email" class="input-box" name="email" value="<?= get_value('email') ?>" id="email" placeholder=" " required>
                            <label for="regEmail">Email</label>
                            <?php if (!empty($errors['email'])) : ?>
                                <span class="text-error"><?= $errors['email'] ?></span>
                            <?php endif; ?>
                        </div>
                        <div class="input-field">
                            <input type="text" class="input-box" name="new_username" value="<?= get_value('new_username') ?>" id="new_username" placeholder=" " required>
                            <label for="new_username">Username</label>
                            <?php if (!empty($errors['new_username'])) : ?>
                                <span class="text-error"><?= $errors['new_username'] ?></span>
                            <?php endif; ?>
                        </div>
                        <div class="input-field">
                            <input type="password" class="input-box" name="new_password" value="<?= get_value('new_password') ?>" id="passwd-2" placeholder=" " required>
                            <label for="passwd-2">New Password</label>
                            <div class="eye-area">
                                <div class="eye-box" onclick="togglePassword(2)">
                                    <i class="fa-regular fa-eye" id="eye-2"></i>
                                    <i class="fa-regular fa-eye-slash" id="eye-slash-2"></i>
                                </div>
                            </div>
                            <?php if (!empty($errors['new_password'])) : ?>
                                <span class="text-error"><?= $errors['new_password'] ?></span>
                            <?php endif; ?>
                        </div>
                        <div class="input-field">
                            <input type="password" class="input-box" name="confirm_password" value="<?= get_value('confirm_password') ?>" id="passwd-3" placeholder=" " required>
                            <label for="passwd-3">Confirm Password</label>
                            <div class="eye-area">
                                <div class="eye-box" onclick="togglePassword(3)">
                                    <i class="fa-regular fa-eye" id="eye-3"></i>
                                    <i class="fa-regular fa-eye-slash" id="eye-slash-3"></i>
                                </div>
                            </div>
                            <?php if (!empty($errors['confirm_password'])) : ?>
                                <span class="text-error"><?= $errors['confirm_password'] ?></span>
                            <?php endif; ?>
                        </div>
                        <div class="input-field">
                            <input type="submit" id="btn-register" class="input-submit" value="Sign Up">
                        </div>
                </form>
            </div>
        </div>

        <!---- Switch --->
        <div class="switch">
            <a href="#" class="switch-login" tabindex="0" onclick="switchForm(1)">Login</a>
            <a href="#" class="switch-register" tabindex="0" onclick="switchForm(2)">Register</a>
            <div class="switch-active"></div>
        </div>


    </div>

</body>

</html>