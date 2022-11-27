<?php
include "../connected.php";
$id = $_GET['item_id'];
$s_id = $_GET['store_id'];
$query = mysqli_query($conn, "UPDATE `items` SET `item_status`='Available' WHERE `item_id` = '$id'");

if ($query == true) {
?>
    <script>
        window.location = "items.php?store_id=<?php echo $s_id ?>";
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