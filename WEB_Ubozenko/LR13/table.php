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

function scrapeAndDisplaySchedule($url, $groupIdentifier, $semester) {
    $scraper = new WebPageScraper($url);
    $scraper->loadPage();
    $scheduleHTML = $scraper->getScheduleForGroup($groupIdentifier, $semester);
    echo $scheduleHTML;
}
$url = 'https://college.ks.ua';
$groupIdentifier = 'form-185'; 
$semester = 'Розклад занять на 1 семестр 2023-2024н.р.';
scrapeAndDisplaySchedule($url, $groupIdentifier, $semester);
?>
</body>
</html>