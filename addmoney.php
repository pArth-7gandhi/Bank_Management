<?php
        //get sender's account number through SESSION and store it in this variable
         session_start();
        $username=$_SESSION['username'];      
?>


<!DOCTYPE html>
<html>
<head>   
	<title>Add money in your account.</title>
	<link rel="stylesheet" href="transactions.css">
</head>
<body>

<div id="main">
            <form action="" method="post">
            <h2><center> Add Money in your Account</center>	</h2><br>
           
            <br><br>
            <!-- <br> -->
            <p id="lef"><h3>Enter your Password :  <input type="password" id="righ" name="password"></h3></p><br>
            <p id="lef"><h3>Enter amount to be added: <input id="righ" type="number" name="amount"></h3></p>
            <br><br><br>	
             <!-- <input type="submit" value="Submit" id="a"> -->
             <button class="button button2">Submit</button>
            </form> 

	<?php

	 if($_SERVER["REQUEST_METHOD"]=="POST")
	 {
           if( isset($_POST["password"]) && isset($_POST["amount"]))
           {
                //connecting to database
                $connection=mysqli_connect("localhost","root","","bankmanagementsystem");
                $amt=$_POST["amount"];
                $password=$_POST["password"];
                // $id=1;
                // $password->toString();
                $sql="select password from login where username='$username'";
                $result=mysqli_query($connection,$sql);
                $res=mysqli_fetch_row($result);
                // echo "<script>alert(' $password $res[0] Wrong Password! Transaction failed.')</script>";
                $comp=strcmp($res[0],$password);
                if($comp==0)
                {
                	date_default_timezone_set('Asia/Kolkata');
	                $date1=date("Y-m-d H:i:s");

	                $sql1="insert into transaction (t_datetime,trans_amt,rec_username,sender_username) values('$date1',$amt,'$username','$username')"; 
	                $sql2="update customer set balance=balance+$amt where username='$username'";
	                //$sql3="update customer set balance=balance+$amt where username='$rec_username'";
	                
	                $result1=mysqli_query($connection,$sql1);
	                $result2=mysqli_query($connection,$sql2);
	                // $result3=mysqli_query($connection,$sql3);
	                   
	                if(mysqli_affected_rows($connection)>0)
	                {
	                    //entering this means RESULT meh TRUE is stored ie. transaction done 
	                    echo "<script>alert('Transaction successfull!! $date1');
	                        window.location.href='display1.php'
	                    </script>";
	                    // header("Location: ");
	                                      
	                }
	                else{
	                    //as in transaction failed
	                    echo "<script>alert('Transaction failed!\nTry again')</script>";
	                        
	           			}
                }
                else
                {
                	echo "<script>alert('Wrong Password! Transaction failed.')</script>";	
                }
               
           	}
        }
	?>
	</div>
	<form action="display1.php" method="post">
            <button class="button button1">Go back.</button>
        </form>
</body>
</html>