<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cookie</title>
</head>
<body>
<?php
    $visit_count_cookie_name = "visit_count";
    $last_visit_cookie_name = "last_visit";

    if(isset($_COOKIE[$visit_count_cookie_name])) {
        $visit_count = $_COOKIE[$visit_count_cookie_name];
    } else {
        $visit_count = 0;
    }

    $visit_count++;
    $current_datetime = date("d/m/Y H:i:s");

    setcookie($visit_count_cookie_name, $visit_count, time() + (30 * 24 * 60 * 60), "/");
    setcookie($last_visit_cookie_name, $current_datetime, time() + (30 * 24 * 60 * 60), "/");

    echo "Кількість відвідувань сторінки: " . $visit_count . "<br>";
    echo "Останнє відвідування: " . $_COOKIE[$last_visit_cookie_name];
    ?>
</body>
</html>
