<?php
require_once('../helper/global.php');
require('../middlewares/auth.php');

must_be_auth();


?>
<!DOCTYPE html>
<html lang="">
    <?php include('../include/_head.php') ?>
    <body>
        <div class="page">
            <?php include('../include/_sidebar.php') ?>
            <main class="main">
                <div class="page__content">
                    <?php include('../include/_header.php'); ?>

                    <div class="page__container">
                        <div class="prices">
                            <div class="prices__head">
                                <div class="prices__title h6">Overview</div>
                            </div>
                            <div class="prices_description">
                                statistics of records in Vertikal Hospital
                            </div>
                            <hr class="prices__hr">
                            <div class="case">
                                <div class="set">
                                    <div class="sub--md--6 sub--lg--3">
                                        <div class="card card_widget">
                                            <a type="button" class="card__next" href="/services">
                                                <svg class="icon icon-arrow-up-right" id="icon-arrow-up-right" viewBox="0 0 10 10">
                                                    <use xlink:href="../assets/img/sprite.svg#icon-arrow-up-right"></use>
                                                </svg>
                                            </a>

                                            <div class="card__inner">
                                                <div class="card__img card__img-blue">
                                                    <svg class="icon" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <use xlink:href="../assets/img/sprite.svg#icon-doctor"></use>
                                                    </svg>
                                                </div>
                                                <div class="card__title h6">staffs</div>
                                                <div class="card__number h4">2 <span>records</span></div>
                                                <a class="card__btn button button--blue-white" href="/services">view records</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="sub--md--6 sub--lg--3">
                                        <div class="card card_widget">
                                            <a type="button" class="card__next" href="/customer">
                                                <svg class="icon icon-arrow-up-right" id="icon-arrow-up-right" viewBox="0 0 10 10">
                                                    <use xlink:href="../assets/img/sprite.svg#icon-arrow-up-right"></use>
                                                </svg>
                                            </a>

                                            <div class="card__inner">
                                                <div class="card__img card__img-blue">
                                                    <svg class="icon" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <use xlink:href="../assets/img/sprite.svg#icon-group"></use>
                                                    </svg>
                                                </div>
                                                <div class="card__title h6">patients</div>
                                                <div class="card__number h4">10 <span>records</span></div>
                                                <a class="card__btn button button--blue-white" href="/customer">view records</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="sub--md--6 sub--lg--3">
                                        <div class="card card_widget">
                                            <a type="button" class="card__next" href="/employee">
                                                <svg class="icon icon-arrow-up-right" id="icon-arrow-up-right" viewBox="0 0 10 10">
                                                    <use xlink:href="../assets/img/sprite.svg#icon-arrow-up-right"></use>
                                                </svg>
                                            </a>

                                            <div class="card__inner">
                                                <div class="card__img card__img-blue">
                                                    <svg class="icon" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <use xlink:href="../assets/img/sprite.svg#icon-clipboard"></use>
                                                    </svg>
                                                </div>
                                                <div class="card__title h6">questionnaires</div>
                                                <div class="card__number h4">20 <span>records</span></div>
                                                <a class="card__btn button button--blue-white" href="/employee">view records</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <script src="../assets/js/main.js"></script>
    </body>
</html>
