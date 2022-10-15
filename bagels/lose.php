<?php 
$secret_num = $_REQUEST['secret_num'];
require_once('head.php');
?>
        <div class="container-fluid py-5">
            <a class="text-dark text-decoration-none" href="index.php"><h1 class="display-5 fw-bold">Bagels</h1></a>
            <p class="col-md-8 fs-4">Увы! Вы проиграли! Секретное число: <?=$secret_num?></p>    
        </div>
<?php require_once('foot.php'); ?>
