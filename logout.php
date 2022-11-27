<?php
session_start();
unset($_SESSION["users"]);
?>
<script type="text/javascript">
    window.location = "log_in.php";
</script>