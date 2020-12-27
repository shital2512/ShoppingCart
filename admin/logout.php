<?php
session_start();
//unset($_SESSION["id"]);
unset($_SESSION["aname"]);
header("Location:./admin_login_design.php");
?>