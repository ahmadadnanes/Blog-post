<?php
session_start();
$idn = "";
if (isset($_SESSION["id"])) {
    $idn = $_SESSION["id"];
    $id = implode(" ", $idn);
} else {
    header("location: ../index.html");
}
include "conn.php";

if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    $title = "";
    $content = "";
    $title =  $_POST["title"];
    $content = $_POST["blog"];

    $sql = "INSERT INTO save_blog(user_id,blog_name,blog_content) VALUES ($id,'$title','$content');";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("location: ../Home.php?id='$id'");
    } else {
        header("location: ../post.php?id='$id'");
    }
}


mysqli_close($conn);
