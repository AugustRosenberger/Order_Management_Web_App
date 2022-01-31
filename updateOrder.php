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

$custID = $_POST["custID"];
$arrangement = $_POST["newArange"];
$orderNumber = $_POST["orderNum"];


$con = mysqli_connect($servername,$username,$password,$dbname);
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

//////////////////////////////////////////////
	//$sql = "INSERT INTO `CustomerInfo` VALUES ('$custFirstName','$custLastName','$custID')";
	//$result=mysqli_query($con,$sql); 	
	
	$sql = "UPDATE `OrderInfo` SET OrderType = '$arrangement' WHERE CustomerID = '$custID' AND OrderNumber = '$orderNumber' ";
	$result=mysqli_query($con,$sql); 
	
	$sql="SELECT * FROM OrderInfo WHERE OrderNumber = '$orderNumber'";
	$result=mysqli_query($con,$sql);
	
	echo "<table class='center' align='center' border='1' style='width:800px; line-height:40px; top=200px;'>
		<tr>
			<th colspan='6'><h2>New Order Info:</h2></th>
		</tr>
		<tr>
			<th>Order Type</th>
			<th>Delivery Date</th>
			<th>Delivery Address</th>
			<th>Order Number</th>
			<th>Customer ID</th>
			<th>Florist ID</th>
		</tr>";
	while($r = mysqli_fetch_array($result)) 
	{
	  echo "<tr>";
	  echo "<td>" .$r['OrderType']. "</td>";
	  echo "<td>" . $r['DeliveryDate']. "</td>";
	  echo "<td>" .$r['DeliveryAddress']. "</td>";
	  echo "<td>" .$r['OrderNumber']. "</td>";
	  echo "<td>" . $r['CustomerID']. "</td>";
	  echo "<td>" .$r['FloristID']. "</td>";
	  echo "</tr>";
}
echo "</table>";
	


mysqli_close($con);

?>

</body>
</html>