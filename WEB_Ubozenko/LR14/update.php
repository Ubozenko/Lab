<?php
session_start();

include "config.php";
include "Model.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $id = $_POST["id"];
        $name = $_POST["name"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];

        // Create an instance of the Model
        $model = new Model($pdo, 'realtors');

        // Example of using the update method
        $result = $model->update($id, [
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
        ]);

        if ($result) {
            echo "Realtor updated successfully!";
            header("Location: index.php"); // Redirect to the index page or any other page
            exit();
        } else {
            echo "Error updating Realtor.";
        }
    } catch (PDOException $e) {
        echo "Error connecting to the database: " . $e->getMessage();
    }
} else {
    echo "Invalid request.";
}
?>
