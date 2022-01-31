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


				<div class ="center">
					<h3 align="center">Create A New Customer Account</h3>
				</div>
	
<?php

session_start();
//Makes DB connection	
	
$servername = "SERVER DOMAIN NAME";
$username = "SERVER USERNAME";
$password = "SERVER PASSWORD!";
$dbname = "NAME OF DATABASE";


$custFirstName = $_POST["custFirstName"];
$custLastName = $_POST["custLastName"];
$custID = $_POST["custID"];
$checkID = 0;

$con = mysqli_connect($servername,$username,$password,$dbname);
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}



// Check to see which button was c;icked on your form. For example if Cusotmer is selected	
//if(isset($_POST['Customer'])) 
//{	



$sql="SELECT CustomerID FROM CustomerInfo";
$result=mysqli_query($con,$sql); 

while($r = mysqli_fetch_array($result)) 
	{
	  if($r['CustomerID'] == $custID){$checkID = $checkID+1;}
}

if(checkID >= 1){
echo 	"<div class ='center'>
					<h3 align='center'>User ID Already Taken</h3>
		</div>";
}
//////////////////////////////////////////////
if(checkID == 0){
	$sql = "INSERT INTO `CustomerInfo` VALUES ('$custFirstName','$custLastName','$custID')";
	$result=mysqli_query($con,$sql); 	
	
	$sql="SELECT * FROM CustomerInfo WHERE CustomerID = '$custID'";
	$result=mysqli_query($con,$sql);
	
	echo "<table class='center' align='center' border='1' style='width:800px; line-height:40px; top=200px;'>
		<tr>
			<th colspan='6'><h2>New Customer Account:</h2></th>
		</tr>
		<tr>
			<th>Customer First Name</th>
			<th>Customer Last Name</th>
			<th>Customer ID</th>
		</tr>";
	while($r = mysqli_fetch_array($result)) 
	{
	  echo "<tr>";
	  echo "<td>" .$r['CustomerFirstName']. "</td>";
	  echo "<td>" . $r['CustomerLastName']. "</td>";
	  echo "<td>" .$r['CustomerID']. "</td>";
	  echo "</tr>";
}
echo "</table>";
	
}

mysqli_close($con);
?>

</body>
</html>