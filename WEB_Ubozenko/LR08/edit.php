<!DOCTYPE html>
<html>
<head>
    <title>Редагування книги</title>
</head>
<body>
    <h1>Редагування книги</h1>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $xml = simplexml_load_file('book.xml');
        
        $newBook = $xml->addChild('book');
        $newBook->addChild('title', $_POST['title']);
        $newBook->addChild('author', $_POST['author']);
        $newBook->addChild('genre', $_POST['genre']);
        $newBook->addChild('price', $_POST['price']);
        $newBook->addChild('published_date', $_POST['published_date']);
        
        $xml->asXML('book.xml');
        echo "<p>Дані збережено.</p>";
    }
    ?>
    <form method="post" action="">
        <label>Назва: <input type="text" name="title" /></label><br>
        <label>Автор: <input type="text" name="author" /></label><br>
        <label>Жанр: <input type="text" name="genre" /></label><br>
        <label>Ціна: <input type="text" name="price" /></label><br>
        <label>Дата публікації: <input type="text" name="published_date" /></label><br>
        <input type="submit" value="Зберегти" />
    </form>
    <p><a href="view.php">Перегляд інформації про книгу</a></p>
</body>
</html>
