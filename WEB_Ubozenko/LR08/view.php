<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $mysqli = new mysqli('localhost', 'root', '', 'books');

    if ($mysqli->connect_error) {
        die("Помилка з'єднання з базою даних: " . $mysqli->connect_error);
    }

    $query = "SELECT title, author, genre, price, published_date FROM books";
    $results = $mysqli->query($query);

    if (!$results) {
        die("Помилка запиту: " . $mysqli->error);
    }

    print '<table border="1">';
    while ($row = $results->fetch_assoc()) {
        print '<tr>';
        print '<td>' . $row["title"] . '</td>';
        print '<td>' . $row["author"] . '</td>';
        print '<td>' . $row["genre"] . '</td>';
        print '<td>' . $row["price"] . '</td>';
        print '<td>' . $row["published_date"] . '</td>';
        print '</tr>';
    }
    print '</table>';

    $results->free(); // Звільнити пам'ять від результатів запиту
    $mysqli->close(); // Закрити з'єднання з базою даних
    ?>
</body>
</html>