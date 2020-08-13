<?php

session_start();
$username=$_SESSION['username'];
echo $username;
if(isset($username))
{
	$con=mysqli_connect("localhost","root","","bankmanagementsystem");
	if (!$con) 
	{
	 	die("database not connected");
	}
	else 
	{
		$sql1="Delete from customer where username='$username'";
		$sql2="Delete from login where username='$username'";
		// $result1=mysqli_query($con,$sql1);
		// $result2=mysqli_query($con,$sql2);
		if(mysqli_query($con, $sql1) && mysqli_query($con, $sql2))
		{
			echo "<script>alert('Account Deleted.');
 				window.location.href='login.html'
 			</script>";
		}
		else
		{
			echo'DATA NOT FOUND';
		}

	}
}

?>