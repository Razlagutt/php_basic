<?php
require_once('game_logic.php');

$count    = 0;
$textarea = check_user_guess($count);

define("NUM_DIGITS",  $_REQUEST['num_digits']);
define("MAX_GUESSES", $_REQUEST['max_guesses']);

require_once('head.php');
?>
    <div class="container-fluid py-5">
            <a class="text-dark text-decoration-none" href="index.php"><h1 class="display-5 fw-bold">Bangels</h1></a>
            <div class="row">
                <div class="col">
                    <form action="<?=$_SERVER['SCRIPT_NAME']?>" method="POST">
                        <div class="input-group mb-3">
                            <span class="input-group-text">Результат</span>
                            <div class="form-floating">
                                <textarea class="form-control" rows="10" name="textarea" style="height: 250px; resize: none" readonly><?=$textarea?></textarea>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Попытка</span>
                            <input class="form-control" type="text" maxlength="<?=NUM_DIGITS?>" name="guess" autofocus>
                        </div>
                        <input type="hidden" name="num_digits" value="<?=NUM_DIGITS?>">
                        <input type="hidden" name="max_guesses" value="<?=MAX_GUESSES?>">
                        <input type="hidden" class="form-control" name="count" value="<?=$count?>">
                        <button type="submit" class="btn btn-primary" name="submit">Отправить</button>
                    </form>
                 </div>
            </div>
        </div>
<?php require_once('foot.php'); ?>
