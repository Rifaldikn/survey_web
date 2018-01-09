<?php
session_start();
include "inc/connect.php";
$user_id;
$user_id = $_SESSION["user_id"];
if(!isset($_SESSION['status'])) {
	header("Location: sign-in");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo($title); ?></title>
    <!-- <link href="form-builder/assets/css/lib/bootstrap.min.css" rel="stylesheet">
    <link href="form-builder/assets/css/lib/bootstrap-responsive.min.css" rel="stylesheet">
    <link href="form-builder/assets/css/custom.css" rel="stylesheet"> -->
    <!-- <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css"> -->
	<!-- <link rel="stylesheet" type="text/css" href="css/form_template.css"> -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/dashboard.css">
  
    
</head>
<body>