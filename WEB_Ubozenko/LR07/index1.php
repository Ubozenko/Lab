<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Робота з файлом</title>
</head>
<body>
    <?php
    if (isset($_POST['content'])) {
        $content = $_POST['content'];

        $file = fopen('my_file.txt', 'a');
        fwrite($file, $content . PHP_EOL);
        fclose($file);
    }

    if (file_exists('my_file.txt')) {
        $fileContent = file_get_contents('my_file.txt');
        echo "<h2>Вміст файлу:</h2>";
        echo "<pre>$fileContent</pre>";
    }
    ?>

    <h2>Додати дані у файл:</h2>
    <form method="post">
        <textarea name="content" rows="4" cols="50"></textarea><br>
        <input type="submit" value="Додати">
    </form>
</body>
</html>