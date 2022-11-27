<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" href="photo/Deal1.png">
    <link rel="stylesheet" href="css/homestyle.css">
    <title>DealSooq</title>
    <script src="https://kit.fontawesome.com/04b6044f71.js" crossorigin="anonymous"></script>
</head>

<body>
    <?php
    if (!isset($_SESSION["users"])) {
    ?>
        <script>
            location.href = "log_in.php";
        </script>
    <?php
    }
    ?>
    <?php include "nav.php"; ?>

    <div class="bg">
        <h2>Let's Make a Great Deal</h2>
        <div class="test">
            <img src="photo/Deal.svg">
        </div>
    </div>

    <div class="container" id="menu">
        <?php
        include "connected.php";
        $get = mysqli_query($conn, "SELECT * FROM `categories`");
        if (mysqli_num_rows($get) > 0) {
            while ($r = mysqli_fetch_array($get)) {
        ?>
                <div class="card">
                    <div class="box">
                        <div class="content">
                            <img src="<?php echo $r['categories_img']; ?>">
                            <h3><?php echo $r['categories_name']; ?></h3>
                            <p><?php echo $r['categories_desc']; ?></p>
                            <a href="stores.php?categories_id=<?php echo $r['categories_id']; ?>">Search Now</a>
                        </div>
                    </div>
                </div>

        <?php
            }
        }
        ?>

    </div>
    <div class="about">
        <h2 id="about">DealSooq</h2>
        <p><img src="photo/deallight.gif" alt="" class="light">
            <img src="photo/dealdark.gif" alt="" class="dark">
            DealSooq website or shorted by (DS), is an E-commerce website that connects handmade products' sellers to their respective purchasers easily, DealSooq is built on the concept of providing sellers the chance to offer their products and to create a convenient website with wide variety of goods to online-shopping lovers
        </p>
    </div>
    <?php include "footer.php"; ?>
</body>

</html>