<?php
session_start();

include "config.php";
include "Model.php";

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    try {
        $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $id = $_GET["id"];
        $realtor = Model::find($pdo, $id);

        if ($realtor) {
            // Delete the realtor record
            $realtor->delete();

            // Redirect back to the index page after deletion
            header("Location: index.php");
            exit();
        } else {
            echo "Realtor not found.";
        }
    } catch (PDOException $e) {
        echo "Error connecting to the database: " . $e->getMessage();
    }
} else {
    echo "Invalid request.";
}
?>
