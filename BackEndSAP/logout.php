<?php
header("Location: ../index.php");
session_start();
unset($_SESSION["loggedin"]);
session_destroy();
echo " You are not logged in ";
echo '<a href="../index.php">Login</a>';

exit;
?>
<script>
location.href = "../index.php";
</script>