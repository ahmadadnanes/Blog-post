<?php
include "conn.php";
$email = trim($_POST["user"]);
$sql = "SELECT email from users where email like '$email'";
$result = mysqli_query($conn, $sql);
$pass = trim($_POST["password"]);

if (mysqli_num_rows($result)) {
    checkPass($email, $pass);
} else {
    echo "this email doesn't exist";
}


function checkPass($em, $pass)
{
    global $conn;
    $sql = "SELECT pass from users where email like '$em'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    if ($row["pass"] == md5($pass)) {
        $sql2 = "SELECT id from users where email like '$em'";
        $result2 = mysqli_query($conn, $sql2);

        session_start();
        $idrow = mysqli_fetch_assoc($result2);
        $_SESSION["id"] = $idrow;
        $id = $_SESSION["id"];
        header("location:../Home.php?id=$id");
    } else {
        echo "wrong password";
    }
}

mysqli_close($conn);
