<?php
    require_once('../controllers/auth.php');

    $auth = new Auth();
    if (isset($_POST['logout'])){
        $auth->logout();
    }

    $uri = trim( $_SERVER['REQUEST_URI'], "/" );
    $uri = explode("/", $uri);
    array_shift($uri);
    $request_page = $uri[count($uri)-1];
?>
<div class="sidebar">
    <div class="sidebar__head">
        <a class="sidebar__logo">
            <img class="sidebar__pic sidebar__pic_light" src="../assets/img/ava-header.png" alt="" />
        </a>
        <button class="sidebar__toggle">
            <svg class="icon" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                <use xlink:href="../assets/img/sprite.svg#icon-toggle"></use>
            </svg>
        </button>
        <button class="sidebar__close">
            <svg class="icon" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                <use xlink:href="../assets/img/sprite.svg#icon-close"></use>
            </svg>
        </button>
    </div>
    <div class="sidebar__body">
        <nav class="sidebar__nav">
                <?php if ($request_page == "overview.php"):?>
                    <a href="../board/overview.php" class="sidebar__item active">
                <?php else: ?>
                    <a href="../board/overview.php" class="sidebar__item">
                <?php endif; ?>
                <div class="sidebar__icon">
                    <svg class="icon" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                        <use xlink:href="../assets/img/sprite.svg#icon-analytics"></use>
                    </svg>
                </div>
                <div class="sidebar__text">Analysis</div>
            </a>
            <a href="/board/meetings" class="sidebar__item">
                <div class="sidebar__icon">
                    <svg class="icon" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                        <use xlink:href="../assets/img/sprite.svg#icon-doctor"></use>
                    </svg>
                </div>
                <div class="sidebar__text">Staff</div>
            </a>
            <a href="/board/meetings" class="sidebar__item">
                <div class="sidebar__icon">
                    <svg class="icon" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                        <use xlink:href="../assets/img/sprite.svg#icon-group"></use>
                    </svg>
                </div>
                <div class="sidebar__text">Patients</div>
            </a>
            <?php if ($request_page == "questionnaire.php"):?>
                <a href="../board/questionnaire.php" class="sidebar__item active">
            <?php else: ?>
                <a href="../board/questionnaire.php" class="sidebar__item">
            <?php endif; ?>
                <div class="sidebar__icon">
                    <svg class="icon" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                        <use xlink:href="../assets/img/sprite.svg#icon-clipboard"></use>
                    </svg>
                </div>
                <div class="sidebar__text">Questionnaires</div>
            </a>
        </nav>
    </div>
    <div class="sidebar__bottom">
        <div class="sidebar__profile">
            <div class="sidebar__details">
                <a class="sidebar__link" href="#">
                    <div class="sidebar__icon">
                        <svg class="icon" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <use xlink:href="../assets/img/sprite.svg#icon-user"></use>
                        </svg>
                    </div>
                    <div class="sidebar__text">Profile</div>
                </a>
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                    <button type="submit" name="logout" class="sidebar__link">
                        <div class="sidebar__icon">
                            <svg class="icon" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <use xlink:href="../assets/img/sprite.svg#icon-logout"></use>
                            </svg>
                        </div>
                        <div class="sidebar__text">Log out</div>
                    </button>
                </form>

            </div>
            <a class="sidebar__user" href="#">
                <div class="sidebar__ava">
                    <img class="sidebar__pic" src="../assets/img/avatar/ava-5.png" alt="">
                </div>
                <div class="sidebar__desc">
                    <div class="sidebar__man">david</div>
                    <div class="sidebar__status caption">Free account</div>
                </div>
                <div class="sidebar__arrow">
                    <svg class="icon" width="18px" height="18px" viewBox="0 0 24 24" version="1.1">
                        <use xlink:href="../assets/img/sprite.svg#icon-angle-double-v"></use>
                    </svg>
                </div>
            </a>
        </div>
    </div>
</div>
