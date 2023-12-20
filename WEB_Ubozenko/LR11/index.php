<?php
$mysqli = new mysqli('localhost', 'root', '', 'products');

if ($mysqli->connect_error) {
    die('Error: (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}

$results = $mysqli->query("SELECT COUNT(*) FROM users");

if ($results === false) {
    die('Error in SQL query: ' . $mysqli->error);
} else {
    $get_total_rows = $results->fetch_row();
    echo "Total rows: " . $get_total_rows[0];
}

$mysqli->close();
?>