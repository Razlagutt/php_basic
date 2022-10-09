<?php
require_once('game_logic.php');

$count      = 0;
$secret_num = $_REQUEST['secret_num'];
$textarea   = check_user_guess($count, $secret_num);

define("NUM_DIGITS",  $_REQUEST['num_digits']);
define("MAX_GUESSES", $_REQUEST['max_guesses']);

require_once('head.php');
?>
    <div class="container-fluid py-5">
            <a class="text-dark text-decoration-none" href="index.php"><h1 class="display-5 fw-bold">Bagels</h1></a>
            <div class="row">
                <div class="col">
                    <form action="<?=$_SERVER['SCRIPT_NAME']?>" method="POST">
                        <div class="input-group mb-3">
                            <span class="input-group-text">Ответ</span>
                            <div class="form-floating">
                                <textarea class="form-control" rows="<?=MAX_GUESSES?>" name="textarea" style="height: 250px; resize: none" readonly><?=$textarea?></textarea>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Число</span>
                            <input class="form-control" type="text" maxlength="<?=NUM_DIGITS?>" name="guess" autofocus>
                        </div>
                        <input type="hidden" name="num_digits" value="<?=NUM_DIGITS?>">
                        <input type="hidden" name="max_guesses" value="<?=MAX_GUESSES?>">
                        <input type="hidden" name="secret_num" value="<?=$secret_num?>">
                        <input type="hidden" class="form-control" name="count" value="<?=$count?>">
                        <button type="submit" class="btn btn-primary btn-lg" name="submit">Ввод</button>
                    </form>
                 </div>
            </div>
        </div>
<?php require_once('foot.php'); ?>
