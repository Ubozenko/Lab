<?php
session_start();

require_once 'config.php';

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete'])) {
    $idToDelete = $_POST['delete'];

    $materialsModel->delete($idToDelete);

    header("Location: materials.php");
    exit();
}

$materials = $materialsModel->all();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Materials</title>
</head>
<body>
    <h2>Materials</h2>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Product</th>
            <th>Amount</th>
            <th>Action</th>
        </tr>
        <?php foreach ($materials as $material) : ?>
            <tr>
                <td><?php echo $material['id']; ?></td>
                <td><?php echo $material['product']; ?></td>
                <td><?php echo $material['amount']; ?></td>
                <td>
                    <form method="post" action="">
                        <input type="hidden" name="delete" value="<?php echo $material['id']; ?>">
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <p><a href="create.php">New Material record</a></p>
    <p><a href="index.php">Back to Login</a></p>
</body>
</html>
