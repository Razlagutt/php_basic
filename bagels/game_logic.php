<?php
function get_secret_num() 
{
    $numbers = range(0, 9);
    shuffle($numbers);
    return implode("", array_slice($numbers, 0, 3));
}

function get_clues(&$secret_num, &$guess)
{
    if ($guess == $secret_num) // <=>
    {
        header('Location: win.php');
        exit;
    }

    $clues = array();

    for ($i = 0; $i < strlen($guess); ++$i)
    {
        if ($guess[$i] == $secret_num[$i])
        {
            $clues[] = "Fermi"; 
        }
        else if (str_contains($secret_num, $guess[$i]))
        {
            $clues[] = "Pico";
        } 
    }

    if (count($clues) == 0)
    {
        return "Bagels";
    }
    else
    {
        sort($clues);
        return implode(" ", $clues); 
    }
}

function check_user_guess(&$count, &$secret_num)
{
    $textarea = "";
    if (isset($_REQUEST['submit'])) {
        $count = $_REQUEST['count'];
        $count++;
        if ($count < 10) {
            $guess     = $_REQUEST['guess'];
            $clues     = get_clues($secret_num, $guess);
            $textarea  = $_REQUEST['textarea'];
            $textarea .= @"\r\n";
            $textarea .= $guess . " " . $clues;
        }
        else
        {
            header('Location: lose.php');
            exit; 
        }
    }
    return $textarea;
}
