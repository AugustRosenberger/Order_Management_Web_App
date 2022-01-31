<!DOCTYPE html>

<?php
//Start the session
session_start();
$title ="The Flowering Pot";

// Variable to check for verification of data. Is there a match in the DB
$nomatch = NULL;

// Checks that form was submitted

if($_SERVER['REQUEST_METHOD']=='POST')
  {

	// Creates Database Connection so you can do verification of input data against your DB table
	
$servername = "SERVER DOMAIN NAME";
$username = "SERVER USERNAME";
$password = "SERVER PASSWORD!";
$dbname = "NAME OF DATABASE";


$con = mysqli_connect($servername,$username,$password,$dbname);
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}


		
    // Checks if variables have been set (First and Last Name, Password and ID. Email if box checked)
	//If set trim the values and assign to variables




    if(isset($_POST['firstName'],$_POST['lastName'],$_POST['psw'],$_POST['floristID']))	
      {
	    
		$FloristFirstName = mysqli_real_escape_string($con,trim($_POST['firstName']));
	    $FloristLastName = mysqli_real_escape_string($con,trim($_POST['lastName']));
		$FloristID = mysqli_real_escape_string($con,trim($_POST['floristID']));
       
       // Verifies on First Name, Last Name, ID and Password that Florsist Exists in DB 
	   
	    $query = "SELECT * FROM FloristInfo WHERE FloristFirstName= '$FloristFirstName'";
  		  
        $result = mysqli_query($con,$query);
	    $order = mysqli_query($con,$queryorder);
	    if(!$result) 
		 {
           echo "Error: "  . $query . "<br>" . $con->error;
		 }    
	
	     $rows= mysqli_num_rows($result);

         if($rows==1) 
		   {
	        // Set Session values for Florist
		
	        $_SESSION["FloristFirstName"] = $FloristFirstName;
		
			$_SESSION["FloristLastName"] = $FloristLastName;
			$_SESSION["FloristID"] = $FloristID;
			
            // Checks if transaction chosen Search for Florist Account. 
            //Redirects to page to search for and print Florist's Account
      
		    if($_POST['transaction']=='Search')
			
		      header("Location: searchFlorist.html");
		 	
			if($_POST['transaction']=='Create')
			
		      header("Location: NewCustomerAcct.html");
			  
			if($_POST['transaction']=='Place')
			
		      header("Location: PlaceOrder.html");
			  
			if($_POST['transaction']=='Update')
			
		      header("Location: updateOrder.html");
			  
			if($_POST['transaction']=='Cancel')
			
		      header("Location: cancelOrder.html");
            
          } // Closes if for Florist Verfication and Action
	  
      //Error message printed when verification fails
	
    else 
      $notmatch="<p class=\"invalid\">Invalid name/ID/password combination.</p>";
  
     } // Closes the IF checking for variables set from form 	  
	  
   }  // Closes request method check

//Contains HTML Information, Style Sheet links and JS links


print_r($_SESSION);
?>
<!-- Use onlcick to execute JavaScriptfunction. Use onsubmit to submit a form and it data -->


<html lang="en">
<head>
<title>Project2_AugustRosenberger</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="description" content="Description of website" />
		<meta name="veiwport" content="width = device-width ,initial-scale=1.0 "/>
		<!--<meta http-equiv = "refresh" content = "10" />-->
		<meta name="keywords" content="flowers, florist, flower" />
		<title><?php echo $title ?></title>
		<script src="javascript_p4.js" language="javascript" type="text/javascript"></script>	
<link rel="stylesheet"
		type="text/css"
		href="it202_p2_styleSheet.css"/>
		
<meta charset="utf-8" />
</head>
	
<body>
	<div class = "center">
		
		
		<body>	
			<script src="javascript_p4.js" language="javascript" type="text/javascript"></script>

			<form id="form" name="form1" action="flowerPotLogin.php" method="POST" onsubmit="return validate();">
				<h1>The Flowering Pot</h1>
				
			<label for="FirstName"> Florist First Name: </label>	
		    <input class="required"
				   type = "text" 
				   id="firstName"
				   name = "firstName" 
				   placeholder = "First Name" 
				   value="<?php if(isset($_POST['firstName']))echo $_POST['firstName']; ?>"/>
			<label for="lastName" class="req">Required</label>
			<br>	
     		<!--value="Enter First Name" pattern="[A-Za-z]"--> 
					
			<label for="lastName"> Florist Last Name:</label>
				<input class="required"
						type="text"
						id="lastName"
					    name = "lastName" 
						placeholder="Last Name"
					    value="<?php if(isset($_POST['lastName']))echo $_POST['lastName']; ?>"/>
				<label for="lastName" class="req">Required</label>
				<br>
				<!--<p class="req">REQUIRED<p> pattern="[A-Za-z]"-->
			
				<label for="psw">Florist Password:</label>
				<input class="required"
					   type="password" 
					   id="psw" 
					   name="psw" 
					   pattern= "(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{,8}"
					   maxlength="8"
					   title="Must contain at least one number and one uppercase and lowercase letter, and a max of 8 of characters" 
					   placeholder="Password"
					   value="<?php if(isset($_POST['psw']))echo $_POST['psw']; ?>"/>
				<label for="password" class="req">Required</label>
				<br>
				
				<label for="floristID">Florist ID:</label>
				<input class="required"
						type="text"
						id="floristID"
					    name = "floristID"
						placeholder="12345"
						value="<?php if(isset($_POST['floristID']))echo $_POST['floristID']; 				
						//$_SESSION["FloristID"] = 'floristID'; ?>"/>	
				<label for="floristID" class="req">Required</label>
				<br>
				
				<label for="floristPhone">Florist Phone Number:</label>
				<input class="required"
						type="tel"
						id="floristPhone"
					    name ="floristPhone"
						pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}"
						title="Must have format: 111-222-3333"
						placeholder="111-222-3333"
					    value="<?php if(isset($_POST['floristPhone']))echo $_POST['floristPhone']; ?>"/>
				<label for="floristPhone" class="req">Required</label>
				<br>
				<!--label for="floristEmail" class="req">Required</label-->
				
			   <label for="email" id ="florist_email" > Florist Email:</label>
	           <input type = "text"  
		              id = "Email"  
					  name = "Email" 
					  placeholder = "EMAIL" 
					  value="<?php if(isset($_POST['Email']))echo $_POST['Email']; ?>"/>
				<br>
	           
				<input type="checkbox" id="emailchecked"/> 
			    <label>Check the box to request an Email Confirmation: </label>
				<br>
				
	            <label for="transaction"> Select a Transaction: </label>
                <select	id = "transaction" name = "transaction">
                   <option value = "Search"> Search Florist's Records</option>
                   <option value = "Place"> Place An Order</option>
	               <option value = "Update"> Update An Order</option>
                   <option value = "Cancel"> Cancel An Order </option>
                   <option value = "Create"> Create A New Customer Account</option>
                </select>
 
				<div id="message">
					<h3>Password must contain the following:</h3>
					<p id="letter" class="invalid">A <b>lowercase</b> letter</p>
					<p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
					<p id="number" class="invalid">A <b>number</b></p>
					<p id="length" class="invalid">Minimum <b>8 characters</b></p>
				</div>
				
				 <span onclick="ResetForm()">
				<input type="reset" value="Reset" />
                </span>
                <input type="submit" value="Submit" />
				<?php
				//setcookie('FirstName', 'firstName', time() + (86400 * 30), "/");
				//setcookie('LastName', 'lastName', time() + (86400 * 30), "/");
				?>
				
								
			</form>
		</body>
	</div>
</html>