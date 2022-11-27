<?php
include "connected.php";
$un = $_GET['user_name'];
$id = $_GET['cart_id'];
$query = mysqli_query($conn, "DELETE FROM `cart` WHERE cart_id='$id'");

if ($query == true) {
?>
    <script>
        window.location = "test.php?user_name=<?php echo $un;?>";
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