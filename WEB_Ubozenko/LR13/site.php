<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Web Page Scraper</title>
    <style>
        table {
            border-collapse: collapse;
        }
        td, th {
            border: 1px solid rgb(4, 32, 196);
            padding: 5px;
        }
    </style>
</head>
<body>
<?php
include "WebPageScraper.php";
function scrapeAndDisplay($url, $class, $tagName) {
   
    $scraper = new WebPageScraper($url);
    
    
    $scraper->loadPage();

    
    $elements = $scraper->findElementsByClass($class, $tagName);

   
    echo $scraper->getDOM()->saveHTML($elements[0]) . "\n";
}
$url = 'https://college.ks.ua';
$class = 'shedule_content';
$tagName = 'div';
scrapeAndDisplay($url, $class, $tagName);

?>
</body>
</html>