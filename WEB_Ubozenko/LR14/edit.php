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
            // Display the edit form
            ?>
            <!DOCTYPE html>
            <html lang="en">

            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Edit Realtor</title>
            </head>

            <body>
                <h1>Edit Realtor</h1>
                <form method="POST" action="update.php">
                    <input type="hidden" name="id" value="<?php echo $realtor->columns->id; ?>">

                    <label for="name">Name:</label>
                    <input type="text" name="name" value="<?php echo $realtor->columns->name; ?>" required><br><br>

                    <label for="email">Email:</label>
                    <input type="email" name="email" value="<?php echo $realtor->columns->email; ?>" required><br><br>

                    <label for="phone">Phone:</label>
                    <input type="text" name="phone" value="<?php echo $realtor->columns->phone; ?>" required><br><br>

                    <input type="submit" value="Update">
                </form>
            </body>

            </html>
            <?php
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
