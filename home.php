<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

$_SESSION['username'] = $_POST['username'];
$_SESSION['password'] = $_POST['password'];
?>

<!DOCTYPE html>

<html>
<head>
	<meta charset="UTF-8"/>
	<title>User database accessor</title>
</head>
<body>
	<h1>Customers</h1>
	<p>
		<a href="RestaurantInput.php">Add a new restaurant</a> &nbsp;&nbsp;
		<a href="RequestCustomerDetails">Find a customer's details</a> &nbsp;&nbsp;
		<a href="RestaurantInfo.html">Find order info about a restaurant</a>
	</p>
</body>
</html>
