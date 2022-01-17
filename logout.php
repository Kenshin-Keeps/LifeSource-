<?php session_start(); ?>

<?php
$_SESSION['loggedin'] = false;
$_SESSION['current_user_id'] = null;
$_SESSION['current_user_name'] = null;
$_SESSION['current_user_password'] = null;
$_SESSION['current_user_contact'] = null;
$_SESSION['current_user_blood_group'] = null;
$_SESSION['current_user_gender'] = null;
$_SESSION['current_user_birthday'] = null;
$_SESSION['current_user_status'] = null;
$_SESSION['current_user_address'] = null;

header("Location:index.php");
?>