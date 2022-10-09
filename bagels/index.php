<?php
define("NUM_DIGITS",  "3"); 
define("MAX_GUESSES", "10");

require_once('game_logic.php');
$secret_num = get_secret_num();
require_once('head.php'); 
?>
        <div class="container-fluid py-5">
            <a class="text-dark text-decoration-none" href="<?=$_SERVER['SCRIPT_NAME']?>"><h1 class="display-5 fw-bold">Bagels</h1></a>
            <p class="col-md-8 fs-4">В этой игре необходимо по подсказкам угадать секретное число из трех цифр. В ответ на ваши попытки угадать игра выдает одну из трех подсказок: 
            <ul class="fs-4">
                <li>Pico - вы угадали правильную цифру на неправильном месте;</li>
                <li>Fermi - если в вашей догадке есть правильная цифра на правильном месте;</li>
                <li>Bagels - если в догадке не содержится правильных цифр.</li>
            </ul></p>    
            <p class="col-md-8 fs-4">На угадывание секретного числа у вас <?=MAX_GUESSES?> попыток.</p>
            <form action="main.php" method="POST">
                <input type="hidden" name="num_digits" value="<?=NUM_DIGITS?>">
                <input type="hidden" name="max_guesses" value="<?=MAX_GUESSES?>">
                <input type="hidden" name="secret_num" value="<?=$secret_num?>">
                <button type="submit" class="btn btn-primary btn-lg">Играть!</button>            
            </form>
        </div>
<?php require_once('foot.php'); ?>