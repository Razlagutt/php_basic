<?php
$textarea = "";
if (isset($_REQUEST['submit'])) {
    $count = $_REQUEST['count'];
    $count++;
    if ($count < 10) {
        $guess     = $_REQUEST['guess'];
        $textarea  = $_REQUEST['textarea'];
        $textarea .= @"\r\n";
        $textarea .= $guess;
    }
}
require_once 'head.php';
?>
    <div class="container-fluid py-5">
            <a class="text-dark text-decoration-none" href="index.php"><h1 class="display-5 fw-bold">Bangels</h1></a>
            <div class="row">
                <div class="col">
                    <form action="<?=$_SERVER['SCRIPT_NAME']?>" method="POST">
                        <div class="input-group mb-3">
                            <span class="input-group-text">Результат</span>
                            <div class="form-floating">
                                <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 300px" name="textarea"><?=$textarea?></textarea>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Попытка</span>
                            <input type="text" class="form-control" name="guess" id="">
                        </div>
                        <input type="hidden" class="form-control" name="count" id="" value="<?=$count?>">
                        <button type="submit" class="btn btn-primary" name="submit">Отправить</button>
                    </form>
                 </div>
            </div>
        </div>
<?php require_once 'foot.php'; ?>
