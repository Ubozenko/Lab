<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Web Page Scraper</title>
</head>
<body>
<?php
include "WebPageScraper.php";

$url = 'https://college.ks.ua';
$scraper = new WebPageScraper($url);
$scraper->loadPage();

$class = 'news-list';  
$tagName = 'div'; 

$elements = $scraper->findElementsByClass($class, $tagName);

if (!empty($elements)) {
    
    $newsItems = $elements[0]->getElementsByTagName('li');

    foreach ($newsItems as $newsItem) {
        echo $scraper->getDOM()->saveHTML($newsItem) . "\n";
    }
    $paginationBlocks = $scraper->getDOM()->getElementsByTagName('div');
    
    foreach ($paginationBlocks as $paginationBlock) {
        if ($paginationBlock->getAttribute('class') === 'pagination') {
            $paginationBlock->parentNode->removeChild($paginationBlock);
        }
    }
} else {
    echo "Не вдалося знайти елементи новин.";
}

echo '<img src="1.png" alt="1.png">';
?>
</body>
</html>