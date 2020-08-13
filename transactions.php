<!DOCTYPE html>
<html>
    <?php
        //get sender's account number through SESSION and store it in next variable
       session_start();
        $sender_username=$_SESSION['username'];
    ?>
    <head>
        <link rel="stylesheet" type="text/css" href="transactions.css">
        <title id="titlee">
            Transactions
        </title>
    </head>
    <body>
        <div id="main">
            <form action="" method="post">
            <h2><center>MAKE A TRANSACTION</center></h2><br>
            <?php
                echo "<p id='lef'><h3>Your account username:   $sender_username<h3></p>";
                // echo "<p id='righ'>""</p>";
                //echo "<p id=\"lemon\">HELLO</p>";
            ?>
            <br>
            <!-- <br> -->
            <p id="lef"><h3>Enter username of receiver :  <input id="righ" name="rec_username"></h3></p><br>
            <p id="lef"><h3>Enter amount to send: <input id="righ" type="number" name="amount"></h3></p>
            <br><br>
            <?php
               // $date='Select GETDATE()';
                // echo"<script> alert('$date') </script>  ";
            ?>
            <!-- <input type="submit" value="Submit" id="a"> -->
            <button class="button button2">Submit</button>
            </form> 
            <?php
                if($_SERVER["REQUEST_METHOD"]=="POST"){
                   if( isset($_POST["rec_username"]) && isset($_POST["amount"])){
                        //connecting to database
                        $connection=mysqli_connect("localhost","root","","bankmanagementsystem");
                        $amt=$_POST["amount"];
                        $rec_username=$_POST["rec_username"];
                        // $id=1;

                        //removing money from sender
                        date_default_timezone_set('Asia/Kolkata');
                        $date1=date("Y-m-d H:i:s");

                        $sql1="insert into transaction (t_datetime,trans_amt,rec_username,sender_username) values('$date1',$amt,'$sender_username','$rec_username')"; 
                        $sql2="update customer set balance=balance-$amt where username='$sender_username'";
                        $sql3="update customer set balance=balance+$amt where username='$rec_username'";
                        


                        //YAAAD SE PEHLE CALL KAR BC

                        //FIR AAGE KA DEKH :)
                        $result1=mysqli_query($connection,$sql1);
                        $result2=mysqli_query($connection,$sql2);
                        $result3=mysqli_query($connection,$sql3);
                           
                        if(mysqli_affected_rows($connection)>0){
                            //entering this means RESULT meh TRUE is stored ie. transaction done 
                            echo "<script>alert('Transaction successfull!!');
                                window.location.href='display1.php'
                            </script>";
                            // header("Location: ");
                            
                            
                        }
                        else{
                            //as in transaction failed
                            echo "<script>alert('Transaction unsuccesfull!\nTry again')</script>";
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