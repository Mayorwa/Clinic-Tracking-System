<?php
require_once('../helper/global.php');
require('../middlewares/auth.php');

must_be_auth();


?>


<!DOCTYPE html>
<html lang="en">
<?php include('../include/_head.php') ?>
<body>
	<div class="page">
		<?php include('../include/_sidebar.php') ?>
		<main class="main">
			<div class="page__content">
                    <?php include('../include/_header.php'); ?>
                     <div class="page__container">
                        <?php
                        include('../include/_error.php');
                        ?>
                        <div>
                            <div class="page__head">
                                <div class="page__title h6">Doctors</div>
                                <a class="button button--success" id="open_createModal">
                                    <svg class="icon" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <use xlink:href="../assets/img/sprite.svg#icon-plus-circle"></use>
                                    </svg>
                                    <span>Add Doctor</span>
                                </a>
                            </div>
                            <div class="page_description">
                                Doctor's requests managed by the Admin
                            </div>
                            <div class="modal-mask" id="createModal">
                                <div class="modal-wrapper">
                                    <form class="modal-container" method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                                        <div class="modal-header">
                                            <div class="modal__title h6">
                                                Add a new Doctor
                                            </div>
                                            <button type="button" class="modal-close" id="close_createModal">×</button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="modal__fieldset">
                                                <div>
                                                    <div class="modal__field">
                                                        <div class="modal__label">Full Name:</div>
                                                        <div class="modal__wrap"><input class="modal__input" type="text" name="title" placeholder="e.g Dr. Agbeleshe Arowolo" required></div>
                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="modal__label">Enter your requests below :</div>
                                                    <div id="question_wrap">
                                                        <div class="modal__row" id="question_1">
                                                            <div class="modal__field">
                                                                <div class="modal__label">Request:</div>
                                                                <div class="modal__wrap">
                                                                    <input class="modal__input" type="text" name="questions[]" placeholder="e.g enter a request/complaint" required>
                                                                </div>
                                                            </div>
                                                            <div class="modal__field">
                                                                <div class="modal__label">Specialization:</div>
                                                                <div class="modal__wrap" >
                                                                    <select class="modal__input" name="type[]" required>
                                                                        <option value="surgeon">Surgeon</option>
                                                                        <option value="pediatrician">Pediatrician</option>
                                                                        <option value="consultant">Consultant</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <input type="hidden" value="1" id="number_of_inputs">
                                                    <div class="modal__question-btns">
                                                        <a class="modal__btn modal__btn-add button button--primary" onclick="add_input()">
                                                            <svg class="icon" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                <use xlink:href="../assets/img/sprite.svg#icon-plus-circle"></use>
                                                            </svg>
                                                            Add a request
                                                        </a>
                                                        <a class="modal__btn modal__btn-add button button--red-white" onclick="remove_input()">
                                                            Remove a request
                                                        </a>
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
                                                Submit
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
                                            <button class="modal__btn button button--blue-transparent" id="close_deleteModal" type="submit">Discard</button>
                                            <button class="modal__btn button button--red-white" @click="deleteInfo(['yo'])" type="submit">
                                                <svg class="icon" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <use xlink:href="../assets/img/sprite.svg#icon-trash"></use>
                                                </svg>
                                                Delete
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
                                        <div class="tb__cell">Name</div>
                                        <div class="tb__cell">No. of requests</div>
                                        <div class="tb__cell">Creation date</div>
                                        <div class="tb__cell">Actions</div>
                                    </div>
                                    <div class="tb__row">
                                        <div class="tb__cell"><a class="primary">1</a></div>
                                        <div class="tb__cell">David Agbabiaka</div>
                                        <div class="tb__cell">
                                            <p>3</p>
                                        </div>
                                        <div class="tb__cell">January 7th 2018, 3:34:02 am</div>
                                        <div class="tb__cell tb__btns">
                                            <a class="button button--blue-white">View Details</a>
                                            <a class="button button--red-white" id="open_deleteModal">
                                                <svg class="icon" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <use xlink:href="../assets/img/sprite.svg#icon-trash"></use>
                                                </svg>
                                                Delete
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
