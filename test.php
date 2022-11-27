<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" type="text/css" href="css/cart.css">
    <link rel="icon" href="photo/Deal1.png">
    <script src="https://kit.fontawesome.com/04b6044f71.js" crossorigin="anonymous"></script>
    <title>Cart</title>
</head>

<body>
<?php include "nav.php"; ?>

    <div class="main">
        <div class="container">
            <?php
            include "connected.php";
            ?>
            <div class="details">
                <div class="recentorder">
                    <div class="cardheader">
                        <table>
                            <thead>
                                <tr>
                                    <th>Item Img</th>
                                    <th>Item Name</th>
                                    <th>Store Name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Add</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $user_name = $_GET['user_name'];
                                $sum = 0;
                                //$select = mysqli_query($conn, "SELECT `cart_id`,`user_id`, `store_id`, `item_id`, `price`, `quantity` FROM `cart` WHERE user_id=(SELECT `user_id` FROM `users` WHERE `username` LIKE '$user_name')");
                                $select = mysqli_query($conn, "SELECT `stores`.`store_name`,`items`.`item_id`,`items`.`item_name`,`items`.`item_img`,`cart`.`price`,`cart`.`cart_id`,`cart`.`quantity`,`cart`.`fixed_price` FROM `cart`,`stores`,`items` 
                                          WHERE `cart`.`store_id`=`stores`.`store_id`
                                          AND   `cart`.`item_id`=`items`.`item_id` 
                                          AND `cart`.`user_id` =(SELECT `user_id` FROM `users` WHERE `username` LIKE '$user_name')");
                                if (mysqli_num_rows($select) > 0) {
                                    while ($row = mysqli_fetch_array($select)) {
                                ?>
                                        <tr>
                                            <td><img src="<?php echo $row['item_img']; ?>" width="120px"></td>
                                            <td><?php echo $row['item_name']; ?></td>
                                            <td><?php echo $row['store_name']; ?></td>
                                            <td><?php echo $row['price'];$sum += $row['price'];?> JD</td>
                                            <td><?php echo $row['quantity']; ?></td>
                                            <td><a href="add.php?cart_id=<?php echo $row['cart_id']; ?>&user_name=<?php echo $user_name; ?>&price=<?php echo $row['price']; ?>&fprice=<?php echo $row['fixed_price'];?>&quantity=<?php echo $row['quantity']; ?>" class="btn">Add</a></td>
                                            <td><a href="delete.php?cart_id=<?php echo $row['cart_id']; ?>&user_name=<?php echo $user_name; ?>" class="button2"><i class="fa fa-times" aria-hidden="true"></i></a></td>
                                        </tr>
                                <?php
                                    }
                                }
                                ?>
                                <tr>
                                    <td colspan="2">Total : </td>
                                    <td colspan="5"><?php echo $sum; ?> JD</td>
                                </tr>             
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <br>
            <a href="log_in.php" class="colorbtn">PAY</a>
        </div>
    </div>
</body>

</html>