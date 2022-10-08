<?php

function check_user_guess(&$count)
{
    $textarea = "";
    if (isset($_REQUEST['submit'])) {
        $count = $_REQUEST['count'];
        $count++;
        if ($count < 11) {
            $guess     = $_REQUEST['guess'];
            $textarea  = $_REQUEST['textarea'];
            $textarea .= @"\r\n";
            $textarea .= $guess;
        }
    }
    return $textarea;
}
