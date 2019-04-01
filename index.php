<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/login.css">
</head>
<body>
        
        <div id="wrapper">
        <center><h1>Customer Login Page</h1></center>
        <form action="includes/login-inc.php" method="POST">
            <label class="lb" ><b>Phone Number</b></label><br>
            <input name="phn_num" type="text" placeholder="Phone Number" class="inputvalues" required>
            <label class="lb"><b>Password</b></label><br>
            <input name="password" type="password" placeholder="Password" class="inputvalues" required>
            <input name="s-btn" type="submit" id="login-btn" value="Sign In">
        </form>
        <br>
        <a href="register.php"><input name="r-btn" type="submit" id="signup-btn" value="Register"></a>
        <br>
        <a href="shopownerlogin.php"><input name="so-btn" type="submit" id="so-btn" value="ShopOwner"></a>

        <?php 
            if(!isset($_GET['login'])){
                exit();
            }
            else{
                $loginCheck = $_GET['login'];
                if($loginCheck == "Invalid"){
                    echo "<center><p style='font-weight:bold;font-size:17px;' class='error'>Invalid Username or Password!!</p></center>";
                    exit();
                }
            }

         ?>
        </div>


</body>
</html>
