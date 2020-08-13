<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<?php
	$username=$_POST["username"];
	echo "$username";


	?>
	<?php 
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
   $result1=mysqli_query($con,$sql1);
   if (mysqli_num_rows($result1)>0) 
    {
      // echo '<div style="font-size:5em;color:red;">Inside '.$username.' wala account</div>';
      while ($row1 = mysqli_fetch_array($result1))
      {
?>
</body>
</html>