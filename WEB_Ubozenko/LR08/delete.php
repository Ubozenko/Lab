<?php
if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];

    // Завантаження XML-файлу
    $xml = simplexml_load_file('book.xml');

    // Видалення запису за ідентифікатором
    unset($xml->book[$id]);

    // Збереження оновленого XML-файлу
    $xml->asXML('book.xml');

    // Перенаправлення на сторінку перегляду
    header('Location: view.php');
    exit;
}
?>
