<?php
$servername = "localhost";
$username = "root";
$password = ""; 
$dbname = "db_68094957";

$connect = mysqli_connect($servername, $username, $password, $dbname);

if (!$connect) {
    die("Connection Failed: " . mysqli_connect_error());
}

mysqli_set_charset($connect, "utf8");
?>