<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
// $username=$_POST['username'];
if(isset($_POST['username']) && isset($_POST['password'])){

	session_start();
	$username=$_POST['username'];
	$_SESSION['username']=$username;
	// echo $username;
$password=$_POST['password'];
$con=mysqli_connect("localhost","root","","bankmanagementsystem");

	if (mysqli_connect_errno($con)) {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	  exit();
	}
 	if (!$con) {
 		die("database not connected");
 	}else{
 		$sql="select * from login where username = '$username' and password = '$password'";
 		$result=mysqli_query($con,$sql);
 		// $row=mysqli_fetch_array($result);
 		if (mysqli_num_rows($result)>0) {
 			 echo "<script>alert('Login successfull!');
                                window.location.href='display1.php'
                            </script>";
 			  exit();
 		}
 		else {
 			echo "<script>alert('Login failed,Please Register.');
 				window.location.href='login.html'
 			</script>";
 			 // header('Location:login.html');
 		}
 	}
}
?>



</body>
</html>

