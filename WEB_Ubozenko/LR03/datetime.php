<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
    <a href="index.php">Головна</a>
    <a href="datetime.php">Дата і час</a>
    <a href="array.php">Масив</a>
    <a href="lessons.php">Уроки</a><br>
    
    <?php
    $currentDate = date("Y-m-d");
    $currentTime = date("H:i:s");
    $dayOfWeek = date("N");

    $dayNames = [
        1 => "Понеділок",
        2 => "Вівторок",
        3 => "Середа",
        4 => "Четвер",
        5 => "П'ятниця",
        6 => "Субота",
        7 => "Неділя"
    ];

    $ukrainianDayOfWeek = $dayNames[$dayOfWeek];
?>

    <body>
        <p>Поточна дата: <?= $currentDate ?></p>
        <p>Поточний час: <?= $currentTime ?></p>
        <p>День тижня: <?= $ukrainianDayOfWeek ?></p>
    </body>
</body>
</html>