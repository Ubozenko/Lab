<!DOCTYPE html>
<html>
<head>
    <title>Зміст файла JSON</title>
</head>
<body>
    <h1>Зміст файла JSON</h1>
    <?php
    $jsonContent = file_get_contents('data.json');
    $data = json_decode($jsonContent, true);

    if ($data !== null) {
        echo '<ul>';
        foreach ($data as $item) {
            echo '<li>' . $item['model'] . '</li>';
        }
        echo '</ul>';
    } else {
        echo '<p>Помилка читання файлу JSON.</p>';
    }
    ?>
</body>
</html>
