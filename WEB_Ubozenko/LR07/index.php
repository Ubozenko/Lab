<!DOCTYPE html>
<html>
<head>
    <title>Перегляд текстових файлів</title>
</head>
<body>
    <h1>Перегляд текстових файлів</h1>

    <?php
    $uploadDirectory = 'texts/';
    $files = scandir($uploadDirectory);

    $files = array_diff($files, array('.', '..'));

    if (isset($_GET['search']) && !empty($_GET['search'])) {
        $searchTerm = $_GET['search'];
        $filteredFiles = array_filter($files, function ($file) use ($searchTerm) {
            return stripos($file, $searchTerm) !== false;
        });
        $files = $filteredFiles;
    }

    if (isset($_GET['file'])) {
        $selectedFile = $_GET['file'];
        if (in_array($selectedFile, $files)) {
            echo "<h2>Зміст файлу \"$selectedFile\"</h2>";
            echo "<pre>";
            echo file_get_contents($uploadDirectory . $selectedFile);
            echo "</pre>";
        } else {
            echo "<p>Вибраний файл не існує.</p>";
        }
    } else {
        echo "<h2>Виберіть файл для перегляду:</h2>";
        echo "<form method='get'>";
        echo "<input type='text' name='search' placeholder='Пошук за назвою'>";
        echo "<input type='submit' value='Пошук'>";
        echo "</form>";
        echo "<ul>";
        foreach ($files as $file) {
            echo "<li><a href=\"index.php?file=$file\">$file</a></li>";
        }
        echo "</ul>";
    }
    ?>
</body>
</html>
