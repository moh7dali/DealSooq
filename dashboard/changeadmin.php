<?php
include "../connected.php";
$user_id = $_GET['user_id'];
$query = mysqli_query($conn, "UPDATE `users` SET `type`='seller' WHERE `user_id` = '$user_id'");

if ($query == true) {
?>
    <script>
        window.location = "users.php";
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