<?php
include "../connected.php";
$id = $_GET['store_id'];
$cat_id = $_GET['cat_id'];
$query = mysqli_query($conn, "DELETE FROM `stores` WHERE store_id='$id'");

if ($query == true) {
?>
    <script>
        window.location = "stores.php?categories_id=<?php echo $cat_id; ?>";
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