<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$db = "blog";

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $db);

if (!$conn) {
    echo "Error" . mysqli_connect_error();
}
