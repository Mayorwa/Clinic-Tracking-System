<?php
if(isset($_SESSION['errors'])){
    foreach ($_SESSION['errors'] as $error) {
        if($error['type'] == 'warning'){
            echo '<div class="alert alert-warning">'.$error['info'].'</div>';
        }
        elseif ($error['type'] == 'danger'){
            echo '<div class="alert alert-danger">'.$error['info'].'</div>';
        }
        else{
            echo '<div class="alert alert-success">'.$error['info'].'</div>';
        }
    }
}

unset($_SESSION['errors']);
