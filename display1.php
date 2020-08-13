<?php
 session_start();
$username=$_SESSION['username'];
// $acctype=$_SESSION['acctype'];
 ?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet"  href="display.css">
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
  $sql2="Select *from employee where username='$username'";
  $result1=mysqli_query($con,$sql1);
  $result2=mysqli_query($con,$sql2);

  if (mysqli_num_rows($result1)>0) 
    {
      // echo '<div style="font-size:5em;color:red;">Inside '.$username.' wala account</div>';
      while ($row1 = mysqli_fetch_array($result1))
      {
  ?>


<body>


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



 <form action="transactions.php" method="post">

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


<button class="button button1">CLICK FOR TRANSACTION</button>
</form>

<form action="addmoney.php" method="post">
  <button class="button button4">Add money in your account.</button>
</form>
<!-- <form action="loans.php" method="post"> -->


<form action="loans.php" method="post">
    <button class="button button2"> 
  Need Help? <br>Get a Loan at low interest rate.
    </button>
</form>
<form action="login.html" method="post">
    <button class="button button3"> LOG OUT.</button>
</form>
<form action="delete.php" method="post">
    <button class="button button3">Delete Account.</button>
</form>

<?php
      }
      // header('Location:home_page.html');
    }
  else if(mysqli_num_rows($result2)>0)
    {
      // echo '<div style="font-size:5em;color:red;">Inside '.$username.' wala account</div>';
      while ($row1 = mysqli_fetch_array($result2))
      {
?>

<div class ="markque"><marquee behavior="scroll" direction="right" scrollamount="12"><H1>WELCOME TO JPG BANK</H1></marquee></div>

  <form action="userinfo.php" method="post">
    <h4>Enter username of the account you want to find.</h4>
  <input type="text" name="username" placeholder="Username"><br><br>
    <button>Search</button>
   <!--  <?php
    //session_start();
    // $username=$_POST['username'];
    // $_SESSION['username']=$username;
    ?> -->
  </form>
<div class="table-container">
  <input type="radio" id="col1" name="table" checked="checked"/>

  
 
  <div class="labels">
    <label for="col1">
      <div class="text">YOUR DETAILS.</div>
    </label>
  
    
    <div class="left"><i class="fa fa-chevron-left">&#171;</i></div>
    <div class="right"><i class="fa fa-chevron-right">&#xbb;</i></div>
  </div>

  
 <form action=" " method="post">

  <div class="table">
    <div class="sticky">
      <div class="item">NAME:</div>
      <div class="item">Username:</div>
      <div class="item">E-mail:</div>
      <div class="item">Contact No:</div>
      <div class="item">City:</div>
      <div class="item">Post:</div>
      <div class="item">Branch Id:</div>
      <div class="item">Salary:</div>
    </div>
    <div class="data">
      <div class="column">
        <div class="item"><?php echo $row1["ename"];?></div>
        <div class="item"><?php echo $row1["username"];?></div>
        <div class="item"><?php echo $row1['email']; ?></div>
        <div class="item"><?php echo $row1['ephone_no']; ?></div>
        <div class="item"><?php echo $row1['ecity']; ?></div>
        <div class="item"><?php echo $row1['post']; ?></div>
        <div class="item"><?php echo $row1['branch_id']; ?></div>
        <div class="item"><?php echo $row1['salary']; ?></div>
      </div>
  
    
    </div>
  </div>

  <div class="signature">
    <div class="note">By: Jg Pg Ag</div>
  </div>


<!-- <button class="button button1">CLICK FOR TRANSACTION</button> -->
</form>

<form action="delete.php" method="post">
<button class="button button3">Delete Account.</button>
</form>

<?php
      }
    }
    else {
      echo "<script>alert('Account NOT found.');
        window.location.href='login.html'
      </script>";
      // header('Location:login.html');
    }
}

}

?>

  </body>
</html>








