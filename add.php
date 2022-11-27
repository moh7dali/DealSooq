<?php session_start(); ?>
<?php 
$cart_id=$_GET['cart_id'];
$user_name=$_GET['user_name'];
$price=$_GET['price'];
$quantity=$_GET['quantity']+1;
$fprice=$_GET['fprice'];
include "connected.php";
$price=$fprice*$quantity;
$query = mysqli_query($conn, "UPDATE `cart` SET `quantity`='$quantity' , `price`='$price' WHERE `cart_id` = '$cart_id'");
if ($query == true) {
?>
    <script>
      window.location = "test.php?user_name=<?php echo $user_name; ?>";
    </script>
<?php
} else {
?>
    <script>
        alert("There was a problem, please try again later");
    </script>
<?php
}
?>