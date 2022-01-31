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
		<li><a href="searchFlorist.html">Search Florist Records</a></li>
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
$orderNumber = $_POST["orderNum"];


$con = mysqli_connect($servername,$username,$password,$dbname);
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

/////////////////////////////////////////////
	
	$sql="DELETE FROM OrderInfo WHERE OrderNumber = '$orderNumber' AND CustomerID = '$custID' ";
	$result=mysqli_query($con,$sql);
	
echo  " <div class = 'center'>
	<h3 align='center'>Order '$orderNumber' Successfully Deleted</h3>
</div> " ;
	


mysqli_close($con);

?>

</body>
</html>