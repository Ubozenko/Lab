<?php
session_start();

require_once 'core/config.php';
require_once __DIR__ . '/models/Material.php';
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = [
        'id' => (int)$_POST['id'],
        'product' => $_POST['product'],
        'amount' => $_POST['amount'],
    ];

    $material = new Material($pdo, 'materials');
    $material->create($data);

    header("Location: materials.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Material</title>
</head>
<body>
    <h2>Create New Material</h2>

    <form method="post" action="">
        <label for="id">ID:</label>
        <input type="text" id="id" name="id" required><br>

        <label for="product">Product:</label>
        <input type="text" id="product" name="product" required><br>

        <label for="amount">Amount:</label>
        <input type="text" id="amount" name="amount" required><br>

        <button type="submit">Create</button>
    </form>

    <p><a href="materials.php">Back to Materials</a></p>
    <p><a href="index.php">Back to Login</a></p>
</body>
</html>