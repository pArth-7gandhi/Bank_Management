

 <!DOCTYPE html>
 <html>
 <head>
 	<title>User Info</title>
 	<link rel="stylesheet"  href="display.css">

 </head>
 <body>
 	<?php 
 	$username=$_POST["username"];
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


	<div class ="markque"><marquee behavior="scroll" direction="right" scrollamount="12"><H1>WELCOME TO JPG BANK</H1></marquee></div>
<div class="table-container">
  <input type="radio" id="col1" name="table" checked="checked"/>
 
  <div class="labels">
    <label for="col1">
      <div class="text">YOUR ACCOUNT DETAILS.</div>
    </label>
  
    
    <div class="left"><i class="fa fa-chevron-left">&#171;</i></div>
    <div class="right"><i class="fa fa-chevron-right">&#xbb;</i></div>
  </div>



 <form action="" method="post">

  <div class="table">
    <div class="sticky">
      <div class="item">NAME:</div>
      <div class="item">Username:</div>
      <div class="item">E-mail:</div>
      <div class="item">Contact No:</div>
      <div class="item">City:</div>
      <div class="item">Date of Birth:</div>
      <div class="item">Account type:</div>
      <div class="item">Account Balance:</div>
    </div>
    <div class="data">
      <div class="column">
        <div class="item"><?php echo $row1["c_name"];?></div>
        <div class="item"><?php echo $row1["username"];?></div>
        <div class="item"><?php echo $row1['email']; ?></div>
        <div class="item"><?php echo $row1['phone_no']; ?></div>
        <div class="item"><?php echo $row1['ccity']; ?></div>
        <div class="item"><?php echo $row1['dob']; ?></div>
        <div class="item"><?php echo $row1['acctype']; ?></div>
        <div class="item"><?php echo $row1['balance']; ?></div>
      </div>
    </div>
  </div>

  <div class="signature">
    <div class="note">By: Jg Pg Ag</div>
  </div>
 </form>
</div>


	<?php
      }
      // header('Location:home_page.html');
    }
    else {
      echo "<script>alert('Account NOT found. $username');
        window.location.href='display1.php'
      </script>";
      // header('Location:login.html');
    }
   }
 }
 ?>

 <form action="display1.php" method="post">
            <button class="button button1">Go back.</button>
        </form>
 </body>
 </html>