<?php
session_start();


if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}


include "config.php";
include "Model.php";

try {
    $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $realtors = Model::all($pdo);

    echo "<h1>Realtor Catalog</h1>";
    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>Name</th><th>Email</th><th>Phone</th><th>Action</th></tr>";

    foreach ($realtors as $realtor) {
        echo "<tr>";
        echo "<td>" . $realtor->columns->id . "</td>";
        echo "<td>" . $realtor->columns->name . "</td>";
        echo "<td>" . $realtor->columns->email . "</td>";
        echo "<td>" . $realtor->columns->phone . "</td>";
        echo "<td>
        <a href='edit.php?id=" . $realtor->columns->id . "'>Edit</a> |
        <a href='delete.php?id=" . $realtor->columns->id . "'>Delete</a>
      </td>";
echo "</tr>";
}

echo "</table>";

echo "<br><br><a href='add.php'>Add Realtor</a>";
echo "<br><br><a href='logout.php'>Log out</a>";

} catch (PDOException $e) {
echo "Error connecting to the database: " . $e->getMessage();
}
?>

