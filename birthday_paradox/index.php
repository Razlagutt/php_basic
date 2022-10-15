<?php
setlocale(LC_ALL, "");

define('MONTHS', ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']);

function get_birthdays($number_of_birthdays)
{
    $birthdays = [];
    $numbers = range(0, $number_of_birthdays - 1);
    foreach ($numbers as $i)
    {
        $start_of_year         = date_create();
        $random_number_of_days = date_interval_create_from_date_string('+' . random_int(0, 364) . ' day');
        
        date_date_set($start_of_year, 1, 1, 1);
        date_add($start_of_year, $random_number_of_days);

        $birthdays[$i] = $start_of_year;
    }
    return $birthdays;
}

function get_match($birthdays)
{
    foreach ($birthdays as $a => $birthday_a)
    {
        foreach (array_slice($birthdays, $a + 1) as $b => $birthday_b)
        {
            $date_text_a = date_format($birthday_a, 'y-m-d');
            $date_text_b = date_format($birthday_b, 'y-m-d');

            if ($date_text_a === $date_text_b) return $birthday_a;
        }
    }
}

function main()
{
    print_r("It's Birthday Paradox.");

    $response = null;
    while (!(is_int($response) && ((int) $response > 0) && ((int) $response <= 100)))
    {
        print_r('How many birthdays shal I generate? (Max 100)');
        $response = (int) readline("> ");
    }

    print_r("\n");
    print_r("Here are {$response} birthdays:\n");

    $birthdays = get_birthdays($response);

    foreach ($birthdays as $i => $birthday)
    {
        if ($i !== 0) print_r(", ");

        $month_name = MONTHS[(int) date_format($birthday, "m") - 1];
        $day_text = date_format($birthday, 'd');
        $date_text = "{$month_name} {$day_text}";
        print_r($date_text);
    }
    
    print_r("\n");
    print_r("\n");

    $match = get_match($birthdays);

    print_r("In this simulation, ");
    if (!is_null($match))
    {
        $month_name = MONTHS[(int) date_format($match, "m") - 1];
        $day_text = date_format($match, 'd');
        $date_text = "{$month_name} {$day_text}";
        print_r("multiple people have a birthday on {$date_text}\n");
    }
    else
    {
        print_r("there are no matching birthdays.\n");
    }

    print_r("Generating {$response} random birthdays 100 000 times...\n");
    readline("Press Enter to begin...");
    print_r("Let's run another 100 000 simulations.\n");
    
    $sim_match = 0;

    foreach (range(0, 99999) as $i)
    {
        if ($i % 10000 == 0) print_r("{$i} simulations run...\n");
        
        $birthdays = get_birthdays($response);

        if (get_match($birthdays) != null) $sim_match += 1;    
    }
    print_r("100 000 simulations run.\n");

    $probability = round($sim_match / 100000 * 100, 2);
    print_r("Out of 100 000  simulations of {$response} people, there was a \n");
    print_r("matching birthday in that group {$response} times. This means \n");
    print_r("that {$response} people have a {$probability}% chance of \n");
    print_r("having a matching birthday in their group.\n");
    print_r("That's probably more than you would think!");
}

main();
