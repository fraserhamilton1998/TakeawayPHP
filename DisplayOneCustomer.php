<?php
error_reporting(E_ALL); 
ini_set('display_errors', 1); 
include ("dbfunctions.php");

//start session 
session_start();

//print first part of html
?>
<!DOCTYPE html>

<html>
<head>  
  <meta charset="UTF-8" /> 
  <title>View One Customer</title>  
</head>
<body>
<h1>Customers</h1>
<p>
  <a href="RestaurantInput">Add a new restaurant</a>   &nbsp;&nbsp; 
  <a href="RequestCustomerDetails.html">Search customer database</a> &nbsp;&nbsp;
  <a href="RestaurantInfo.html">Find order info about a restaurant</a> 
  </br>
</p>
<h2>View a Customer</h2>

<?php
//retrieve username and password
$username = $_SESSION['username'];
$password = $_SESSION['password'];


//connect to database
dbConnect("$username", "$password") ;
dbSelect("$username");
$customerID = $_POST['customerID'];


$query = "SELECT * FROM Customer WHERE Username= '$customerID'";
$result = runQuery($query);
$numrows = mysql_num_rows($result);
if ($numrows == 0) 
{
	print "No customer with customer ID = $customerID";
	print "</body></html>";
	exit();
}
print "<h3>Customer with Username = $customerID</h3>";
displayVertTable($result);

$pointsQuery = "SELECT TotalPoints FROM Customer WHERE Username = '$customerID'";

$pointsResult = runQuery($pointsQuery);

$points = mysql_fetch_row($pointsResult);
$money = ($points[0] * 5)/100;

print "<h3>Customer's voucher points:</h3>";
print "<p style='border-style:dotted; width:100px'>£" . $money . "</p>";

?>
</br>
<form method="post" action="CustomerInput2.php">
  <?php
     print "<input type='hidden' name='customerID' value='$customerID'>";
  ?>
  <input type='submit' value="Edit details">
</form>

<h4>Orders - totals and search</h4>
<p>Total number of orders made by this customer:</p>
<?php
  $queryCol = "SELECT * FROM Orders, OrderHistory WHERE CustomerID = '$customerID' AND OrderID = OrderNumber AND OrderType = 'C'";
  $queryDel = "SELECT * FROM Orders, OrderHistory WHERE CustomerID = '$customerID' AND OrderID = OrderNumber AND OrderType = 'D'";

  $resultCol = runQuery($queryCol);
  $resultDel = runQuery($queryDel);

  $numRowsCol = mysql_num_rows($resultCol);
  $numRowsDel = mysql_num_rows($resultDel);

  print ($numRowsCol + $numRowsDel) . " total orders. ";

  print $numRowsCol . " collection orders. ";
  print $numRowsDel . " delivery orders.";
?>

<p>Show the total number of orders this customer has made for a specific restaurant</p>
<form method="post" action="ShowTotalOrders.php">
  <?php
    print "<input type='hidden' name='customerID' value='$customerID'/>";
  ?>
  <input type="text" name="restaurantName" placeholder="Restaurant"/>
  <input type="submit" value="Submit"/>
</form>
</br>



</body>
</html>
