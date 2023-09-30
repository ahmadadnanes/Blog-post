<?php
include "conn.php";
$email = trim($_POST["user"]);
$sql = "SELECT email from users where email like '$email'";
$result = mysqli_query($conn, $sql);
$pass = trim($_POST["password"]);
$error = 1;
if (mysqli_num_rows($result)) {
    checkPass($email, $pass);
} else {
    header("location: ../login.php?msg=1");
}


function checkPass($em, $pass)
{
    global $conn;
    global $error;
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
        if (isset($_GET["pre"])) {
            $pre = $_GET["pre"];
            header("location:$pre");
        } else {
            header("location:../index.php?id=$id");
        }
    } else {
        header("location: ../login.php?msg=$error");
    }
}

mysqli_close($conn);
