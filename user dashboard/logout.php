<?php
session_start();
unset($_SESSION["users"]);
?>
<script type="text/javascript">
    window.location = "../home.php";
</script>