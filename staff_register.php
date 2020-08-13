<?php
$ename=$_POST['ename'];
$username=$_POST['username'];
$email=$_POST['email'];
$password=$_POST['password'];
$repassword=$_POST['repassword'];
$post=$_POST['post'];
$branch_id=$_POST['branch_id'];
$ecity=$_POST['ecity'];
// $acctype=$_POST['acctype'];
$ephone_no=$_POST['ephone_no'];
// $dob=$_POST['dob'];
if ($password != $repassword) 
{
	echo '<script>alert("Password and repassword doesnt match")</script>';
	header('location: register.html');
}
else 
{
 	$con=mysqli_connect("localhost","root","","bankmanagementsystem");

 	if (!$con) 
 	{
 		die("database not connected");
 	}
 	else
 	{
 		$salary=0;
 		if($post=="clerk")
 			$salary=10000;
 		if($post=="assistant")
 			$salary=15000;
 		else
 			$salary=25000;

 		$sql1="insert into employee values ('$username','$ename','$post','$salary','$ecity','$branch_id','$email','ephone_no')";
 		$sql2="insert into login values ('$username','$password')";
 		$Insert1=mysqli_query($con,$sql1);
 		$Insert2=mysqli_query($con,$sql2);
 		if (!$Insert1) 
 		{
 			die("not inserted");
 		}
 		else
 		{
 			// echo '<div style="font-size:5em;color:red;">DATA successfully added in database</div>';
 			 header('location:login.html');
 			 echo '<script>alert("Data added in database.")</script>'; 
 		}
 	}
 }