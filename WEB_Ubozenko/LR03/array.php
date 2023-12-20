<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="index.php">Головна</a>
    <a href="datetime.php">Дата і час</a>
    <a href="array.php">Масив</a>
    <a href="lessons.php">Уроки</a><br>

    <?php
    function printArrayInTable($array) {
        echo "<table border='1'>";
        foreach ($array as $key => $value) {
            echo "<tr><td>$key</td><td>$value</td></tr>";
        }
        echo "</table>";
    }

    $exampleArray = [
        "Поле 1" => "Значення 1",
        "Поле 2" => "Значення 2",
        "Поле 3" => "Значення 3"
    ];
    ?>
    <?php printArrayInTable($exampleArray); ?>
</body>
</html>