<?php
error_reporting(E_ALL);
ini_set('display_errors',1);
session_start();
include("dbfunctions.php");
?>
<!DOCTYPE html>

<html>
<head>
	<meta charset="UTF-8"/>
	<title>Add a Restaurant</title>
</head>
<body>
	<h1>The data has been successfully entered into our database</h1>
<p>
  <a href="RestaurantInput.php">Add a new restaurant</a>
  <a href="RequestCustomerDetails.html">Find customer details</a>
</p>
<br/>

<?php
$username = $_SESSION['username'];
$password = $_SESSION['password'];

dbConnect("$username", "$password");
dbSelect("$username");

$restID = $_POST["restaurantID"];
$lpDel = $_POST["lpDel"];
$lpCol = $_POST["lpCol"];

$query = "INSERT INTO Restaurant VALUES ('$restID', '$lpDel', '$lpCol')";

print $query . '<br/'>;

$insResult = mysql_query($query);
if($insResult){
	print("Restaurant details for " . $restID . " have been inserted</br>");
}
else{ 
	exit(mysql_error() . "</p></body></html>");
}
print "</p></body>";
print "</html>";
?>

