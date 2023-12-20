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
    $currentDate = new DateTime('2023-09-01'); // Починаємо з 1 вересня 2023
    $today = new DateTime(); // Отримуємо поточну дату

    $lessonSchedule = [
        'odd' => ['Monday', 'Wednesday', 'Thursday'],
        'even' => ['Monday', 'Thursday'],
    ];

    // Розрахунок кількості уроків
    $completedLessons = 0;

    while ($currentDate <= $today) {
        // Визначаємо, чи це парний чи непарний тиждень
        $weekType = ($currentDate->format('W') % 2 == 0) ? 'even' : 'odd';

        // Перевіряємо, чи поточний день тижня є уроком веб-програмування
        $currentDayOfWeek = $currentDate->format('l');

        if (in_array($currentDayOfWeek, $lessonSchedule[$weekType])) {
            $completedLessons++;
        }

        // Переходимо до наступного дня
        $currentDate->modify('+1 day');
    }

    echo "Поточна пара: $completedLessons";
    ?>
</body>
</html>