<?php
$c_name=$_POST['c_name'];
$username=$_POST['username'];
$email=$_POST['email'];
$password=$_POST['password'];
$repassword=$_POST['repassword'];
$ccity=$_POST['ccity'];
$acctype=$_POST['acctype'];
$phone_no=$_POST['phone_no'];
$dob=$_POST['dob'];
$balance=2000;
if ($password != $repassword) 
{
	echo '<script>alert("Password and repassword doesnt match")</script>';
	header('location: register.html');
}
$con=mysqli_connect("localhost","root","","bankmanagementsystem");
$sqlrepeat="Select * from customer where username='$username' or email='$email' or phone_no='$phone_no'";
$resultrepeat=mysqli_query($con,$sqlrepeat);
	if (mysqli_num_rows($resultrepeat)>0) 
    {
      // echo '<div style="font-size:5em;color:red;">Inside '.$username.' wala account</div>';
      while ($row1 = mysqli_fetch_array($resultrepeat))
      {
      	if($row1["username"]==$username)
      	{
      			echo "<script>alert('SORRY! Cannot create an account.An account has already been registered under the same USERNAME.');
 				window.location.href='register.html'
 				</script>";
      	}

      	if($row1["phone_no"]==$phone_no)
      	{
      			echo "<script>alert('SORRY! Cannot create an account.An account has already been registered under the same PHONE NUMBER.');
 				window.location.href='register.html'
 				</script>";
      	}

      	if($row1["email"]==$email)
      	{
      			echo "<script>alert('SORRY! Cannot create an account.An account has already been registered under the same EMAIL ID.');
 				window.location.href='register.html'
 				</script>";
      	}
      }
   }

else 
{

 		$sql1="insert into customer values ('$c_name','$username','$phone_no','$ccity','$email','$dob','$acctype','$balance')";
 		$sql2="insert into login values ('$username','$password')";
 		$sql3="insert into account values ('$acctype','$username','$balance')";
 		$Insert1=mysqli_query($con,$sql1);
 		$Insert2=mysqli_query($con,$sql2);
 		$Insert3=mysqli_query($con,$sql3);
 		if (!$Insert1) 
 		{
 			die("not inserted");
 		}
 		else
 		{

 			// header('location:login.html');
 			echo "<script>alert('Data added in Database.');
 			</script>";
 			echo "<script>alert('Minimum balance of ₹2000 is added in your account.');
 				window.location.href='login.html'
 			</script>";
 		}
 	
 }