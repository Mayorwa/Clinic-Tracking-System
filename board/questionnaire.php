<?php
require('../middlewares/auth.php');
require('../controllers/questionnaire.php');
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
                    <?php include('../include/_header.php')?>
                    <div class="page__container">
                        <div>
                            <div class="page__head">
                                <div class="page__title h6">Questionnaire</div>
                                <a class="button button--success" id="open_createModal">
                                    <svg class="icon" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <use xlink:href="../assets/img/sprite.svg#icon-plus-circle"></use>
                                    </svg>
                                    <span>create</span>
                                </a>
                            </div>
                            <div class="page_description">
                                questionnaires crated by the admin
                            </div>
                            <div class="modal-mask" id="createModal">
                                <div class="modal-wrapper">
                                    <form class="modal-container">

                                        <div class="modal-header">
                                            <div class="modal__title h6">
                                                create questionnaire
                                            </div>
                                            <button type="button" class="modal-close" id="close_createModal">×</button>
                                        </div>

                                        <div class="modal-body">
                                            <div class="modal__fieldset">
                                                <div>
                                                    <div class="modal__field">
                                                        <div class="modal__label">enter the title of the questionnaire :</div>
                                                        <div class="modal__wrap"><input class="modal__input" type="text" name="name" placeholder="e.g covid 19 assessment"></div>
                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="modal__field">
                                                        <div class="modal__label">enter your questions below :</div>
                                                        <div class="modal__wrap" id="question_wrap">
                                                            <input class="modal__input" type="text" name="questions[]" placeholder="e.g enter a question">
                                                        </div>
                                                        <input type="hidden" value="1" id="number_of_inputs">
                                                        <div class="modal__question-btns">
                                                            <a class="modal__btn modal__btn-add button button--primary" onclick="add_input()">
                                                                <svg class="icon" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                    <use xlink:href="../assets/img/sprite.svg#icon-plus-circle"></use>
                                                                </svg>
                                                                add a question
                                                            </a>
                                                            <a class="modal__btn modal__btn-add button button--red-white" onclick="remove_input()">
                                                                remove a question
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <a class="modal__btn button button--red-transparent" id="close_createModal">discard</a>
                                            <button class="modal__btn button button--success" name="create_questionnaire" type="submit">
                                                <svg class="icon" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <use xlink:href="../assets/img/sprite.svg#icon-save"></use>
                                                </svg>
                                                submit
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="modal-mask" id="deleteModal">
                                <div class="modal-wrapper">
                                    <div class="modal-container delete-modal">

                                        <div class="modal-header">
                                            <button type="button" class="modal-close" id="close_deleteModal">×</button>
                                        </div>

                                        <div class="modal-body">
                                            <div class="modal__fieldset">
                                                <img src="../assets/img/warning-red.png" class="modal__img"/>
                                                <h6>
                                                    delete report (# 3)?
                                                </h6>
                                                <p>
                                                    are you sure you want to delete this record, this is an irreversible action?
                                                </p>
                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <button class="modal__btn button button--blue-transparent" id="close_deleteModal" type="submit">discard</button>
                                            <button class="modal__btn button button--red-white" @click="deleteInfo(['yo'])" type="submit">
                                                <svg class="icon" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <use xlink:href="../assets/img/sprite.svg#icon-trash"></use>
                                                </svg>
                                                delete
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="page__hr">
                            <div class="tb__container">
                                <div class="tb__table">
                                    <div class="tb__row tb__row_head">
                                        <div class="tb__cell">#</div>
                                        <div class="tb__cell">title</div>
                                        <div class="tb__cell">no of questions</div>
                                        <div class="tb__cell">creation date</div>
                                        <div class="tb__cell">actions</div>
                                    </div>
                                    <div class="tb__row">
                                        <div class="tb__cell"><a class="primary">1</a></div>
                                        <div class="tb__cell">david Agbabiaka</div>
                                        <div class="tb__cell">
                                            <p>3</p>
                                        </div>
                                        <div class="tb__cell">January 7th 2018, 3:34:02 am</div>
                                        <div class="tb__cell tb__btns">
                                            <a class="button button--blue-white">view details</a>
                                            <a class="button button--red-white" id="open_deleteModal">
                                                <svg class="icon" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <use xlink:href="../assets/img/sprite.svg#icon-trash"></use>
                                                </svg>
                                                delete
                                            </a>
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
