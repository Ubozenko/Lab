<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "books";
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM books";
    $result = $conn->query($sql);
    if ($result->rowCount() > 0) {
        echo "<h2>Список книг</h2>";
        echo "<table border='1'>";
        echo "<tr><th>ID</th><th>Назва</th><th>Автор</th><th>Рік видання</th></tr>";
        while ($row = $result->fetch()) {
            echo "<tr><td>".$row["id"]."</td><td>".$row["title"]."</td><td>".$row["author"]."</td><td>".$row["published_year"]."</td></tr>";
        }
        echo "</table>";
    } else {
        echo "У базі даних немає жодної книги";
    }
} catch (PDOException $e) {
    echo "Помилка: " . $e->getMessage();
}
$conn = null;
?>