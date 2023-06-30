<?php
include "php/conn.php";
session_start();
$idn = "";
$idn = $_SESSION["id"];
$id = implode(" ", $idn);
$sql = "SELECT username from users where id = '$id'";
$result = mysqli_query($conn, $sql);
$us = mysqli_fetch_assoc($result);
$user = $us["username"];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- main css file -->
    <link rel="stylesheet" href="css/main.css">
    <!-- other css files -->
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/brands.min.css">
    <link rel="stylesheet" href="css/normal.css">
    <title>Blog</title>
</head>

<body>
    <!-- start header -->
    <header>
        <div class="container">
            <?php
            $html = "post.php?id=$id";
            ?>
            <div class="user">
                <span><?php echo ($user) ?></span>
            </div>
            <div class="logo">
                <img src="img/blogger_black_logo_icon_147154.png" height="40px">
            </div>
            <nav>
                <div class="normal_nav">
                    <ul>
                        <li>
                            <a href="<?php echo $html ?>">new post</a>
                        </li>
                        <li>
                            <a href="php/logout.php">logout</a>
                        </li>
                    </ul>
                </div>

                <div class="drop_nav">
                    <input type="image" src="img/bars-solid.svg" alt="" height="40px" id="nav-btn">

                    <ul id="drop-ul">
                        <li>
                            <a href="<?php echo $html ?>">new post</a>
                        </li>
                        <li>
                            <a href="php/logout.php">logout</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>
    <!-- end header -->

    <!-- start blog -->
    <section>
        <div class="container">
            <?php
            $query = "select blog_name,blog_content from save_blog where user_id = $id order by id desc;";
            $result = mysqli_query($conn, $query);
            while ($row = mysqli_fetch_assoc($result)) {
                $pt = $row["blog_name"];
                $pd = $row["blog_content"];
            ?>

                <div class="card">
                    <p class="title"> <?php echo $pt  ?></p>
                    <p>
                        <?php echo $pd ?>
                    </p>
                </div>
            <?php
            }
            ?>
        </div>
    </section>
    <!-- end blog -->

</body>
<!-- JS -->
<script src="js/main.js"></script>

<?php
mysqli_close($conn);
?>

</html>