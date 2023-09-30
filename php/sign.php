<?php
include "conn.php";
$email = $_POST["user"];
$user = $_POST["username"];
$pass = md5($_POST["password"]);
$error = 1;

$sql_email = "SELECT email from users where email like '$email'";
$result_email = mysqli_query($conn, $sql_email);

$sql_user = "SELECT username from users where username like '$user'";
$result_user = mysqli_query($conn, $sql_user);

if (mysqli_num_rows($result_email) || mysqli_num_rows($result_user)) {
    header("location:../signup.php?msg=$error");
} else {
    $sql2 = " insert into users(username,email,pass) values ('$user','$email','$pass')";
    $result2 = mysqli_query($conn, $sql2);
    header("location:../login.php");
}

mysqli_close($conn);
