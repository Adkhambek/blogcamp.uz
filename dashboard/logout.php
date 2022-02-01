<?php require_once "include/function.php";?>
<?php require_once "include/session.php";?>
<?php
$_SESSION["User_Id"] = null;
$_SESSION["UserName"] = null;
session_destroy();
Redirect_to("login");
