<?php
// define('DB_HOST', 'localhost');
// define('DB_PORT', '5432');
// define('DB_NAME', 'blog');
// define('DB_USER', 'postgres');
// define('DB_PASSWORD', '1099');

// $conn = pg_connect("host=". DB_HOST . "port=" . DB_PORT . "dbname=". DB_NAME . "user=" . DB_USER . "password=" . DB_PASSWORD);

$host = "localhost";
$port = "5432";
$dbname = "blog";
$user = "postgres";
$password = "1099";

$conn = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");

if (!$conn) {
    die("Could not connect to the database");
}

?>