<?php
include "php/conn.php";
session_start();
$idn = "";
if (isset($_SESSION["id"])) {
    $idn = $_SESSION["id"];
    $id = implode(" ", $idn);
    $sql = "SELECT username from users where id = '$id'";
    $result = mysqli_query($conn, $sql);
    $us = mysqli_fetch_assoc($result);
    $user = $us["username"];
}
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
            <div class="user">
                <?php if (isset($_SESSION["id"])) { ?>
                    <span><?php echo ($user) ?></span>
                <?php } ?>
            </div>
            <div class="logo">
                <img src="img/blogger_black_logo_icon_147154.png" height="40px">
            </div>
            <nav>
                <div class="normal_nav">
                    <ul>
                        <li>
                            <a href="post.php">new post</a>
                        </li>
                        <?php
                        if (isset($_SESSION["id"])) { ?>
                            <li>
                                <a href="php/logout.php">logout</a>
                            </li>
                        <?php
                        } else { ?> <li><a href="login.php">login</a></li> <?php } ?>
                    </ul>
                </div>

                <div class="drop_nav">
                    <input type="image" src="img/bars-solid.svg" alt="" height="40px" id="nav-btn">

                    <ul id="drop-ul">
                        <li>
                            <a href="post.php">new post</a>
                        </li>
                        <?php
                        if (isset($_SESSION["id"])) { ?>
                            <li>
                                <a href="php/logout.php">logout</a>
                            </li>
                        <?php
                        } else { ?> <li><a href="login.php">login</a></li> <?php } ?>
                    </ul>
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
            $query = "select user_id,blog_name,blog_content from save_blog order by id desc;";
            $result = mysqli_query($conn, $query);
            while ($row = mysqli_fetch_assoc($result)) {
                $uid = $row["user_id"];
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

    <!-- start footer -->
    <footer>
        <div class="footer-container">
            <div class="text">
                <h3>Follow Me</h3>
            </div>
            <div class="social">
                <ul>
                    <li><a href="https://www.linkedin.com/in/ahmad-istaitieh-64a635248/"><i class="fa-brands fa-linkedin"></i></a></li>
                    <li><a href="https://github.com/ahmadadnanes"><i class="fa-brands fa-github"></i></a></li>
                </ul>
            </div>
        </div>
    </footer>
    <!-- end footer -->

</body>
<!-- JS -->
<script src="js/main.js"></script>

<?php
mysqli_close($conn);
?>

</html>