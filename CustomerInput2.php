<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include("dbfunctions.php");

session_start();
?>

<!DOCTYPE html>

<html>
<head>
	<meta charset="UTF-8"/>
	<title>Add New Customer</title>
</head>
<body>
<p>
  <a href="RestaurantInput">Add a new restaurant</a>   &nbsp;&nbsp; 
  <a href="RequestCustomerDetails.html">Search customer database</a> &nbsp;&nbsp;
  <a href="RestaurantInfo.html">Find order info about a restaurant</a> 
  </br>
</p>
<h1>Customers</h1>
	
<h2>Edit a customer's details</h2>
</br>
	
<form method="post" action="CustomerEdit.php">
  <table>
    <?php
      $username = $_SESSION['username'];
      $password = $_SESSION['password'];

      dbConnect("$username", "$password");
      dbSelect("$username");
      $customerID = $_POST['customerID'];
      $query = "SELECT * FROM Customer WHERE Username= '$customerID'";
      $result = runQuery($query);
      $fieldCount = mysql_num_fields($result);
      $row = mysql_fetch_row($result);
      for($i=1; $i<$fieldCount; $i++){
        print "<tr>";
        $fieldName = mysql_field_name($result, $i);
        print "<td>" . $fieldName . "</td>";
        print "<td><input type='text' name='$fieldName' value='$row[$i]'</td>";
        print "</tr>";
      }
      print "<input type='hidden' name='customerID' value='$customerID'/>";
    ?>
  </table>

<input type="submit" value="Submit"/>
</form>
</body>
</html>
