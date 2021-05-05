<?php
require('../controllers/auth.php');
require('../middlewares/auth.php');

$auth = new Auth();
if (isset($_POST['login'])){
    $data = [
        'email'=> $_POST['email'],
        'password'=> $_POST['password'],
    ];
    $auth->login($data);
}

must_not_be_auth();

?>
<!DOCTYPE html>
<html lang="">
<?php include('../include/_head.php'); ?>
<body>
<div class="login">
    <div class="login__row">
        <div class="login__col login-side">
            <img src="../assets/img/ava-header.png" class="login-side__logo" alt="">
        </div>
        <div class="login__col login__signin-img"></div>
        <div class="login__col login-form">
            <div class="login-form__signup">
                <a href="/sign-up">create new account</a>
            </div>
            <div class="login__form-div">
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" class="login__form">
                    <a class="login__logo"><img src="../assets/img/ava-header.png" alt=""></a>
                    <?php
                        include('../include/_error.php');
                    ?>
                    <div class="login__stage h5">Sign in to your account</div>
                    <p class="login__form-desc">input your details</p>
                    <div class="login__field">
                        <div class="field__label">email address</div>
                        <div class="field__wrap">
                            <input class="field__input" type="email" name="email" placeholder="e.g dave@gmail.com">
                        </div>
                    </div>
                    <div class="login__field">
                        <div class="field__label">password</div>
                        <div class="field__wrap">
                            <input class="field__input" type="password" name="password" placeholder="e.g **********">
                        </div>
                    </div>
                    <div class="login__links text-right">
                        <a class="login__link" href="#">
                            <svg width="24px" height="24px" class="icon icon-link">
                                <use xlink:href="../assets/img/sprite.svg#icon-forgot-password"></use>
                            </svg>
                            Forgot Password?
                        </a>
                    </div>
                    <button type="submit" name="login" class="login__btn button button--blue-white button_wide">
                        <span>Sign in to your account</span>
                        <span>
                            <svg width="20px" height="20px" class="icon icon-link">
                                <use xlink:href="../assets/img/sprite.svg#icon-arrow-right"></use>
                            </svg>
                        </span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="../assets/js/main.js"></script>
</body>
</html>
