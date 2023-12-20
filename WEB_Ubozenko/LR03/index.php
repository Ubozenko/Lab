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
    $surname = "Убоженко";
    $name = "Микола";
    $group = "451 група";
    echo "Прізвище: " . $surname . "<br>";
    echo "Ім'я: " . $name . "<br>";
    echo "Група: " . $group . "<br>";
    ?>

    <p>
        Прізвище: <?= $surname ?> <br>
        Ім'я: <?= $name ?> <br>
        Група: <?= $group ?>
    </p>
</body>
</html>