<?php
//  error_reporting(0);
//  ini_set('display_errors', 'off');

$servername = "localhost";
$username   = "root";
$password   = "";
$dbname     = "social";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if(!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
