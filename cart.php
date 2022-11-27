<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" href="photo/Deal1.png">
    <script src="https://kit.fontawesome.com/04b6044f71.js" crossorigin="anonymous"></script>
    <title>Cart</title>
</head>

<body>
    <?php
    include "connected.php";
    $item_id = $_GET['item_id'];
    $store_id = $_GET['store_id'];
    $user_id = $_GET['user_id'];
    $price = $_GET['price'];
    $add = mysqli_query($conn, "INSERT INTO `cart`(`user_id`, `store_id`, `item_id`, `price`,`fixed_price`,`quantity`) VALUES ('$user_id','$store_id','$item_id','$price','$price',1)");
    if ($add == true) {
    ?>
        <script>
        alert("Added to Cart")
        window.location = "item.php?item_id=<?php echo $item_id;?>&store_id=<?php echo $store_id;?>";
       </script>
       <?php 
    } 
    ?>

</body>

</html>