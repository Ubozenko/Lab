<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
</head>
<body>
    <?php
    $nameErr = $emailErr = "";
    $name = $email = $message = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["name"])) {
            $nameErr = "Поле 'Ім'я' обов'язкове для заповнення";
        } else {
            $name = test_input($_POST["name"]);
            if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
                $nameErr = "Дозволені лише літери та пробіли";
            }
        }

        if (empty($_POST["email"])) {
            $emailErr = "Поле 'Електронна пошта' обов'язкове для заповнення";
        } else {
            $email = test_input($_POST["email"]);
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Невірний формат електронної пошти";
            }
        }

        $message = test_input($_POST["message"]);

        if ($_FILES["file"]["error"] == 0) {
            $fileName = $_FILES["file"]["name"];
            $fileSize = $_FILES["file"]["size"];
            $fileType = $_FILES["file"]["type"];
        }

    }

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    ?>

    <h2>Форма зворотнього зв'язку</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
        Ім'я: <input type="text" name="name">
        <span class="error">* <?php echo $nameErr; ?></span>
        <br><br>
        Електронна пошта: <input type="text" name="email">
        <span class="error">* <?php echo $emailErr; ?></span>
        <br><br>
        Повідомлення:<br>
        <textarea name="message" rows="5" cols="40"></textarea>
        <br><br>
        Завантаження файлу: <input type="file" name="file">
        <br><br>
        <input type="submit" name="submit" value="Відправити">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && $nameErr == "" && $emailErr == "") {
        echo "<h2>Ваші дані:</h2>";
        echo "Ім'я: " . $name . "<br>";
        echo "Електронна пошта: " . $email . "<br>";
        echo "Повідомлення: " . $message . "<br>";

        if ($_FILES["file"]["error"] == 0) {
            echo "Ім'я файлу: " . $fileName . "<br>";
            echo "Розмір файлу: " . $fileSize . " байт<br>";
            echo "Тип файлу: " . $fileType . "<br>";
        }
    }
    ?>
</body>
</html>
