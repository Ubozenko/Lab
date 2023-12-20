<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "books";
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if (isset($_POST['login']) && isset($_POST['full_name']) && isset($_POST['email']) && isset($_POST['password'])) {
        $login = $_POST['login'];
        $full_name = $_POST['full_name'];
        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $sql = "INSERT INTO users (login, full_name, email, password) VALUES (:login, :full_name, :email, :password)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':login', $login);
        $stmt->bindParam(':full_name', $full_name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->execute();
        echo "Користувач успішно доданий";
    } else {
        echo "Не вдалося додати користувача. Перевірте введені дані.";
    }
} catch (PDOException $e) {
    echo "Помилка: " . $e->getMessage();
}
$conn = null;
?>