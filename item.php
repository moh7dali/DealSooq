<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" href="photo/Deal1.png">
    <link rel="stylesheet" href="css/homestyle.css">
    <title>Items</title>
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
    <?php 
    include "connected.php";
    $s_id = $_GET['store_id'];
    $getstoreinfo = mysqli_query($conn, "SELECT `store_img`,`store_name` FROM `stores` WHERE `store_id`='$s_id'");
    if (mysqli_num_rows($getstoreinfo) > 0) {
        while ($row = mysqli_fetch_array($getstoreinfo)) {
    ?>
    <div class="bg">
        <h2><?php echo $row['store_name'];?></h2>
        <div class="test">
            <img src="<?php echo $row['store_img'];?>">
        </div>
    </div>

    <?php
            }
        } 
        ?>





    <div class="container">
        <?php
        include "connected.php";
        $s_id = $_GET['store_id'];
        $get = mysqli_query($conn, "SELECT * FROM `items` WHERE `item_status` ='available' and `store_id`='$s_id'");
        if (mysqli_num_rows($get) > 0) {
            while ($r = mysqli_fetch_array($get)) {
        ?>
                <div class="card">
                    <div class="box">
                        <div class="content">
                            <img src="<?php echo $r['item_img']; ?>">
                            <h3><?php echo $r['item_name']; ?></h3>
                            <p><?php echo $r['item_desc']; ?></p>
                            <h3><?php echo $r['item_price']; ?> JD</h3>
                            <a href="cart.php?item_id=<?php echo $r['item_id']; ?>&store_id=<?php echo $r['store_id']; ?>&user_id=<?php echo $_SESSION['id']; ?>&price=<?php echo $r['item_price']; ?>">Add To Cart</a>
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