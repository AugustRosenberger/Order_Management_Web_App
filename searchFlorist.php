<!doctype html>
<html>
<head>
<title> The Flowering Pot</title>
<meta charset="UTF-8">
</head>
<link rel="stylesheet"
		type="text/css"
		href="it202_p2_styleSheet.css"/>
		
<body>

<div>
	<ul>
		<li><a class="active" href="FlowerPotHomePage.html">Home</a></li>
		<li><a href="searchFlorist.php">Search Florist Records</a></li>
		<li><a href="PlaceOrder.html">Place An Order</a></li>
		<li><a href="updateOrder.html">Update An Order</a></li>
		<li><a href="cancelOrder.html">Cancel An Order</a></li>
		<li><a href="NewCustomerAcct.html">Create New Customer Account</a></li>
	</ul>
</div>

<div class="center">
	<h1 align="center">The Flowering Pot</h1>
	
</div>


<?php

session_start();
//Makes DB connection	
	
$servername = "SERVER DOMAIN NAME";
$username = "SERVER USERNAME";
$password = "SERVER PASSWORD!";
$dbname = "NAME OF DATABASE";


$flid = $_SESSION["FloristID"];

$con = mysqli_connect($servername,$username,$password,$dbname);
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}


// Check to see which button was c;icked on your form. For example if Cusotmer is selected	
//if(isset($_POST['Customer'])) 
//{	



$sql="SELECT * FROM FloristInfo WHERE FloristID = '$flid'";
$result=mysqli_query($con,$sql); 
	
//echo $flid	;
//print_r($_SESSION);
echo "<table class='center' align='center' border='1' style='width:800px; line-height:40px; top=200px;'>
		<tr>
			<th colspan='6'><h2>Florist Information</h2></th>
		</tr>
		<tr>
			<th>Florist First Name</th>
			<th>Florist Last Name</th>
			<th>Florist Password</th>
			<th>Florist ID</th>
			<th>Florist Email</th>
			<th>Florist Phone Number</th>
		</tr>";
	while($r = mysqli_fetch_array($result)) 
	{
	  echo "<tr>";
      echo "<td>" . $r['FloristFirstName']. "</td>";
	  echo "<td>" .$r['FloristLastName']. "</td>";
	  echo "<td>" .$r['FloristPassword']. "</td>";
	  echo "<td>" . $r['FloristID']. "</td>";
	  echo "<td>" .$r['FloristEmail']. "</td>";
	  echo "<td>" .$r['FloristPhoneNumber']. "</td>";
	  echo "</tr>";
}
echo "</table>";
//

$sql = "SELECT * FROM OrderInfo, CustomerInfo WHERE OrderInfo.FloristID = '$flid' and OrderInfo.CustomerID = CustomerInfo.CustomerID";
$result=mysqli_query($con,$sql); 

echo "<table class='center' align='center' border='1' style='width:800px; line-height:40px; top=200px;'>
		<tr>
			<th colspan='6'><h2>Florist Orders</h2></th>
		</tr>
		<tr>
			<th>Order Type</th>
			<th>Delivery Date</th>
			<th>Delivery Address</th>
			<th>Order Number</th>
			<th>Customer First Name</th>
			<th>Customer Last Name</th>
		</tr>";
	while($r = mysqli_fetch_array($result)) 
	{
	  echo "<tr>";
      echo "<td>" . $r['OrderType']. "</td>";
	  echo "<td>" .$r['DeliveryDate']. "</td>";
	  echo "<td>" .$r['DeliveryAddress']. "</td>";
	  echo "<td>" . $r['OrderNumber']. "</td>";
	  echo "<td>" .$r['CustomerFirstName']. "</td>";
	  echo "<td>" .$r['CustomerLastName']. "</td>";
	  echo "</tr>";
}
echo "</table>";






mysqli_close($con);
?>	


</body>
</html>