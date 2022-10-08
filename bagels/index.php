<?php require_once('head.php'); ?>
        <div class="container-fluid py-5">
            <a class="text-dark text-decoration-none" href="<?=$_SERVER['SCRIPT_NAME']?>"><h1 class="display-5 fw-bold">Bangels</h1></a>
            <p class="col-md-8 fs-4">В этой игре необходимо по подсказкам угадать секретное число из трех цифр. В ответ на ваши попытки угадать игра выдает одну из трех подсказок: Pico, если вы угадали правильную цифру на неправильном месте, Fermi, если в вашей догадке есть правильная цифра на правильном месте, и Bagels, если в догадке не содержится правильных цифр. На угадывание секретного числа у вас десять попыток.</p>
            <form action="main.php" method="POST">
                <input type="hidden" name="num_digits" value="3">
                <input type="hidden" name="max_guesses" value="10">
                <button type="submit" class="btn btn-primary btn-lg">Играть!</button>            
            </form>
        </div>
<?php require_once('foot.php'); ?>