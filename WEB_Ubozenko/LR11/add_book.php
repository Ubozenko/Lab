<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "books";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Помилка підключення: " . $conn->connect_error);
}


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


$sql = "INSERT INTO books (title, author, published_year) VALUES ('$title', '$author', '$published_year')";

if ($conn->query($sql) === TRUE) {
    echo "Книга успішно додана";
} else {
    echo "Помилка: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>