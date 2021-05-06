<?php
require('../middlewares/auth.php');
require('../controllers/questionnaire.php');
must_be_auth();

$questionnaire = new Questionnaire();

//update
if(isset($_POST['update_questionnaire'])){
    $data = [
        'title'=> $_POST['title'],
        'questions'=> $_POST['questions'],
        'type' => $_POST['type'],
    ];
    $questionnaire->update_questionnaire($_GET['id'], $data);
}

//fetch with id in params
if (isset($_GET['id'])){
    $result = $questionnaire->get_one_questionnaire($_GET['id']);
}
else{
    $_SESSION['errors'] = [["info" => "<b>Unknown Questionnaire id inputted</b>", "type" => "danger"]];
    redirect('questionnaires.php');
}

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
                <?php
                include('../include/_error.php');
                ?>
                <div>
                    <div class="page__head">
                        <div class="page__title h6"><?= $result['title']?></div>
                        <a class="button button--success" id="open_createModal">
                            <svg class="icon" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <use xlink:href="../assets/img/sprite.svg#icon-edit"></use>
                            </svg>
                            <span>edit questionnaire</span>
                        </a>
                    </div>
                    <hr class="page__hr">
                    <div class="tb__container">
                        <div class="tb__table">
                            <div class="tb__row tb__row_head text-left">
                                <div class="tb__cell">questions </div>
                                <div class="tb__cell">type</div>
                            </div>
                            <?php foreach ($result['questions'] as $quest):?>
                                <div class="tb__row text-left">
                                    <div class="tb__cell"><?= $quest['content'];?></div>
                                    <div class="tb__cell"><?= $quest['type'];?></div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <div class="modal-mask" id="createModal">
                        <div class="modal-wrapper">
                            <form class="modal-container" method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']).'?id='.$_GET['id']; ?>">
                                <div class="modal-header">
                                    <div class="modal__title h6">
                                        edit <a class="primary"><?= $result['title']?></a>
                                    </div>
                                    <button type="button" class="modal-close" id="close_createModal">×</button>
                                </div>
                                <div class="modal-body">
                                    <div class="modal__fieldset">
                                        <div>
                                            <div class="modal__field">
                                                <div class="modal__label">enter the title of the questionnaire :</div>
                                                <div class="modal__wrap"><input class="modal__input" type="text" name="title" placeholder="e.g covid 19 assessment" value="<?= $result['title']?>" required></div>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="modal__label">enter your questions below :</div>
                                            <div id="question_wrap">
                                                <?php $i = 1; foreach ($result['questions'] as $quest):?>
                                                <div class="modal__row" id="question_<?=$i;?>">
                                                    <div class="modal__field">
                                                        <div class="modal__label">question title:</div>
                                                        <div class="modal__wrap">
                                                            <input class="modal__input" type="text" name="questions[]" placeholder="e.g enter a question" value="<?= $quest['content'];?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="modal__field">
                                                        <div class="modal__label">question type:</div>
                                                        <div class="modal__wrap" >
                                                            <select class="modal__input" name="type[]" required>
                                                                <option value="trueOrFalse" <?= $quest['type'] == "trueOrFalse" ? "selected": "";?>>True or False</option>
                                                                <option value="text" <?= $quest['type'] == "text" ? "selected": "";?>>Text</option>
                                                                <option value="agreeOrDisagree" <?= $quest['type'] == "agreeOrDisagree" ? "selected": "";?>>Agree to Disagree</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php $i++; endforeach; ?>
                                            </div>

                                            <input type="hidden" value="<?= count($result['questions'])?>" id="number_of_inputs">
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

                                <div class="modal-footer">
                                    <a class="modal__btn button button--red-transparent" id="close_createModal">discard</a>
                                    <button class="modal__btn button button--success" name="update_questionnaire" type="submit">
                                        <svg class="icon" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <use xlink:href="../assets/img/sprite.svg#icon-save"></use>
                                        </svg>
                                        submit
                                    </button>
                                </div>
                            </form>
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
