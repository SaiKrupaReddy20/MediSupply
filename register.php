<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Register Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/login.css" >
</head>
<body>
        
        <div id="wrapper">
        <center><h1>Customer Register</h1></center>
        <form action="includes/signup-inc.php" method="POST">
        	<?php 
        		echo '<label ><b>Phone Number</b></label><br>';
        		if(isset($_GET['phn_num'])){
        			$phn_num = $_GET['phn_num'];
        		 	echo '<input name="phn_num" type="text" placeholder="Phone Number" class="inputvalues" value="'.$phn_num.'" required><br>';
        		}
        		else{
        			echo '<input name="phn_num" type="text" placeholder="Phone Number" class="inputvalues" required><br>';
        		}
            ?>
            <label ><b>Password</b></label><br>
            <input name="password" type="password" placeholder="Type your Password" class="inputvalues" required><br>
            <label ><b>Confirm Password</b></label><br>
            <input name="cpassword" type="password" placeholder="Confirm your Password" class="inputvalues" required><br>
            <?php 
        		echo '<label ><b>Name</b></label><br>';
        		if(isset($_GET['cname'])){
        			$cname = $_GET['cname'];
        		 	echo '<input name="cname" type="text" placeholder="Your Name" class="inputvalues" value="'.$cname.'" required><br>';
        		}
        		else{
        			echo '<input name="cname" type="text" placeholder="Your Name" class="inputvalues" required><br>';
        		}
            ?>
            <?php 
        		echo '<label ><b>Age</b></label><br>';
        		if(isset($_GET['age'])){
        			$age = $_GET['age'];
        		 	echo '<input name="age" type="text" placeholder="Age" class="inputvalues" value="'.$age.'" required><br>';
        		}
        		else{
        			echo '<input name="age" type="text" placeholder="Age" class="inputvalues" required><br>';
        		}
            ?>
            <?php 
        		echo '<label ><b>Address</b></label><br>';
        		if(isset($_GET['address'])){
        			$address = $_GET['address'];
        		 	echo '<input name="address" type="text" placeholder="Address" class="inputvalues" value="'.$address.'" required><br>';
        		}
        		else{
        			echo '<input name="address" type="text" placeholder="Address" class="inputvalues" required><br>';
        		}
            ?>
            <input name="register" type="submit" id="signup-btn" value="Register"><br>;
        </form>

        <?php 
            if(!isset($_GET['signup'])){
                exit();
            }
            else{
                $signupCheck = $_GET['signup'];
                if($signupCheck == "fieldexists"){
                    echo "<center><p style='font-weight:bold;font-size:17px;' class='error'>Duplicate Field Entry</p></center>";
                    exit();
                }
                elseif($signupCheck == "pwds"){
                    echo "<center><p style='font-weight: bold;font-size: 17px;' class='error'>Password fields doesnot match!</p></center>";
                    exit();
                }
            }

         ?>
        </div>

</body>
</html>