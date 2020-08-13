<!DOCTYPE html>
<html>
    <?php
        //get sender's account number through SESSION and store it in this variable
         session_start();
        $username=$_SESSION['username'];
        $con=mysqli_connect("localhost","root","","bankmanagementsystem");
    ?>
    <?php error_reporting (E_ALL ^ E_NOTICE); ?>
    <head>
        <link rel="stylesheet" href="transactions.css">
        <title id="titlee">
            Loans
        </title>
    </head>
    <body>
        <div id="main">
            <form action = "" method="post">

                <h2><center>Get a Loan</center></h2><br>
            <?php
                echo "<p id='lef'><h3>Your username: $username</h3></p>";
                //echo "<p id='righ'></p>";
                //echo "<p id=\"lemon\">HELLO</p>";

            ?>
            
            <p id="lef"><h3>Select your Occupation:
                <select id="righ" name="occ">
                    <option>Business</option>
                    <option>Builder</option>
                    <option>Job/Dealer</option>
                    <option>Clerk</option>
                </select>
                 </h3>
                
                <h3>Enter your Monthly Income:
               <input id="righ" type="number" name="income"></h3>

            </p>
            <!-- kaunsa select karega ye tu code karle @parth kyuki mereko wo php ka nai aata....
            tune register meh kiya hai -->
            

            <p id="lef"><h3>Enter your loan amount
                <input id="righ" type="number" name="loan_amount"></h3>
                <h3>
                In how many years will you return?
                <select id="righ" name="years">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>5</option>
                </select>
            </h3>
            </p>

            <br><br>
            <button class="button button2">Submit</button>
            </form>
        </div>
        <br><br>
        <?php
            // if($_SERVER["REQUEST_METHOD"]=="POST"){
                $loan=$_POST["loan_amount"];
                $income=$_POST["income"];
                $occupation=$_POST["occ"];
                $years=$_POST["years"];

                
               
                if( isset($_POST["loan_amount"]) ){//idhar kaunsa select kiya hai wo b dekhlena
                    
                    $alreadyexist="Select *from loans where username='$username'";
                    $resultloans=mysqli_query($con,$alreadyexist);
                    if (mysqli_num_rows($resultloans)>0) 
                    {
                      // echo '<div style="font-size:5em;color:red;">Inside '.$username.' wala account</div>';
                      while ($row1 = mysqli_fetch_array($resultloans))
                      {
                        ?>
                        <center>
                            <h2 style="color: red">You already have a pending loan.</h2>
                            <p><h4>Username: <?php echo $row1["username"];?></p>
                            <p>Amount: <?php echo $row1["Lamount"];?></p>
                            <p>Expires after: <?php echo $row1["years"];?> years.</h4></p>
                            <h3 style="color: red">Sorry we cant provide you with a LOAN.</h3   >
                        </center>

                    <?php
                        }
                    }
                    else
                    {
                         if($income<5000)
                        {
                            echo "<script>alert('Sorry your Monthly income is very less so loan cannot be provided.')</script>";
                        }

                        if ($income>5000) 
                        {
                            if($loan>1000000)
                            {
                                echo "<script>alert('Sorry your Monthly income is very less comparetively to your income so loan cannot be provided.')</script>";
                            }
                            else
                            {
                                $monthly=$loan+(0.1*$loan);
                                $monthly=$monthly/(12*$years);
                                $monthly=(int)$monthly;
                                echo nl2br("\t\r"); 
                                echo nl2br("<div style=font-size:2em;color:red;>LOAN GRANTED with 10% interest rate. \n\nYou will have to pay ₹ $monthly every month for $years years.</div>");
                                $L_no=1;

                                $sql="insert into loans (username,LDate,Lamount,years,LinterestRate)values ('$username',now(),'$loan','$years','10%')";
                                $Insert=mysqli_query($con,$sql);
                                // header("Location: readtp.php");

                            }
                        }
                    }
                }
            // }
        ?>
        <form action="display1.php" method="post">
            <button class="button button1">Go back.</button>
        </form>
        
    </body>
</html>