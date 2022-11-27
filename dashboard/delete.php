<?php
include "../connected.php";
$id = $_GET['id'];
$query = mysqli_query($conn, "DELETE FROM `contact_us` WHERE id='$id'");

if ($query == true) {
?>
    <script>
        window.location = "Messages.php";
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