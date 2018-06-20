<?php
session_start();
unset($_SESSION["userid"]);
echo "<center><h3>Redirecting to homepage......</h3></center>";
header("location:index.php");
?>
