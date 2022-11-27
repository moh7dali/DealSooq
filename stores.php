<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" href="photo/Deal1.png">
    <link rel="stylesheet" href="css/homestyle.css">
    <title>Stores</title>
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
    <br>
    <div class="container">
        <?php
        include "connected.php";
        $c_id = $_GET['categories_id'];
        $get = mysqli_query($conn, "SELECT * FROM `stores` where `categories_id`='$c_id'");
        if (mysqli_num_rows($get) > 0) {
            while ($r = mysqli_fetch_array($get)) {

        ?>
                <div class="card">
                    <div class="box">
                        <div class="content">
                            <img src="<?php echo $r['store_img']; ?>">
                            <h3><?php echo $r['store_name']; ?></h3>
                            <p><?php echo $r['store_loc']; ?></p>
                            <p><?php echo $r['store_desc']; ?></p>
                            <?php $_SESSION['sid']=$r['store_id'];?>
                            <a href="item.php?store_id=<?php echo $r['store_id']; ?>">Visit Now</a>
                        </div>
                    </div>
                </div>

        <?php
            }
        }
        ?>

    </div>
    <?php include "footer.php"; ?>
</body>

</html>