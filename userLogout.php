<?php
session_start();
unset($_SESSION["LOGIN"]);
unset($_SESSION["USERNAME"]);
header("location:index.php");
die();
?>