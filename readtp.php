
<!DOCTYPE html>
<html>
<head>
<title>Your Account </title>
	<link rel="stylesheet"  href="readtp.css">
</head>
<body>

<?php
// echo $username;
session_start();
$username=$_SESSION['username'];
// echo $username;
if(isset($username))
{
	$con=mysqli_connect("localhost","root","","bankmanagementsystem");
if (!$con) 
{
 	die("database not connected");
}
else 
{
	$sql1="Select *from customer where username='$username'";
	$sql2="Select *from employee where username='$username'";
	$result1=mysqli_query($con,$sql1);
	$result2=mysqli_query($con,$sql2);
 		// $row=mysqli_fetch_array($result);

 		if (mysqli_num_rows($result1)>0) 
 		{
 			// echo '<div style="font-size:5em;color:red;">Inside '.$username.' wala account</div>';
 			while ($row1 = mysqli_fetch_array($result1))
 			{
?>
				<br><br><br><br><br>
				<form action="delete.php" method="post">
					<div class="Display">
						<h2>---Details---</h2>
				<!-- Displaying Data Read From Database -->
						<span>Name:</span> <?php echo $row1["c_name"]; ?><br>
						<span>E-mail:</span> <?php echo $row1['email']; ?><br>
						<span>Contact No:</span> <?php echo $row1['phone_no']; ?><br>
						<span>City:</span> <?php echo $row1['ccity']; ?><br>
						<span>Date of Birth:</span> <?php echo $row1['dob']; ?><br>
						<span>Account type:</span> <?php echo $row1['acctype']; ?><br>
						<span>Account Balance:</span> <?php echo $row1['balance']."<br>"; ?>


							<a href="transactions.php"> <strong>Make a transaction.</strong> </a><br><br>
							<a href="loans.php"> <strong>Need Help? <br>Get a Loan at low interest rate.</strong> </a><br><br>
							<input type="submit" value="delete">

					</div>
				
				
					
				</form>
			<?php
 			}
 			// header('Location:home_page.html');
 		}

 		else if(mysqli_num_rows($result2)>0)
 		{
 			echo '<div style="font-size:5em;color:red;">Inside '.$username.' wala account</div>';
 			while ($row1 = mysqli_fetch_array($result2))
 			{
 ?>			
 				<div class="form">
				<h2>---Details---</h2>
				<!-- Displaying Data Read From Database -->
				<span>Name:</span> <?php echo $row1['ename']."<br>"; ?>
				<span>E-mail:</span> <?php echo $row1['email']."<br>"; ?>
				<span>Contact No:</span> <?php echo $row1['ephone_no']."<br>"; ?>
				<span>Post:</span> <?php echo $row1['post']."<br>"; ?>
				<span>Branch Id:</span> <?php echo $row1['branch_id']."<br>"; ?>
				<span>City:</span> <?php echo $row1['ecity']."<br>"; ?>
				<span>Account Balance:</span> <?php echo $row1['balance']."<br>"; ?>
				</div>
			<?php
 			}
 		}
 		else {
 			echo "Account not found";
 			// header('Location:login.html');
 		}
}

}

?>



</body>
</html>


