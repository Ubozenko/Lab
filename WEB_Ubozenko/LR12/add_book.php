<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "books";
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if (isset($_POST['title'])) {
        $title = $_POST['title'];
    } else {
        $title = '';
    }
    if (isset($_POST['author'])) {
        $author = $_POST['author'];
    } else {
        $author = '';
    }
    if (isset($_POST['published_year'])) {
        $published_year = $_POST['published_year'];
    } else {
        $published_year = '';
    }
    $sql = "INSERT INTO books (title, author, published_year) VALUES (:title, :author, :published_year)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':author', $author);
    $stmt->bindParam(':published_year', $published_year);
    $stmt->execute();
    echo "Книга успішно додана";
} catch (PDOException $e) {
    echo "Помилка: " . $e->getMessage();
}
$conn = null;
?>