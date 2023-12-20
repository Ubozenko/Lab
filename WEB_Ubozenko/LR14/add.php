<?php
session_start();

include "config.php";
include "Model.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];

    try {
        $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $realtor = new Model($pdo);
        $realtor->columns->name = $name;
        $realtor->columns->email = $email;
        $realtor->columns->phone = $phone;

        // Save the realtor to the database
        $realtor->save();

        header("Location: index.php");
        exit();
    } catch (PDOException $e) {
        echo "Error connecting to the database: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Add Realtor</title>
</head>

<body>
    <h1>Add Realtor</h1>
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="name">Name:</label>
        <input type="text" name="name" required><br><br>

        <label for="email">Email:</label>
        <input type="email" name="email" required><br><br>

        <label for="phone">Phone:</label>
        <input type="text" name="phone" required><br><br>

        <input type="submit" value="Add Realtor">
    </form>
</body>

</html>
