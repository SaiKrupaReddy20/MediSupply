<!DOCTYPE html>
<html>
<head>
	<title>Sell Stock</title>
</head>
<body>
	<form action="add-to-cart.php" method="POST">
		<div class="inputbox">
                 <input type="text" name="medicinename" required>
                 <label>MedicineName</label>
        </div>
     	<div class="inputbox">
        	<input type="text" name="quantity" required>
        	<label>Quantity</label>
    	</div>
    	<div class="inputbox">
        	<input type="text" name="price" required>
        	<label>ModifiedPrice</label>
    	</div>
    	<div class="inputbox">
        	<input type="date" name="expiry" required>
        	<label>Expiry</label>
    	</div>
    	<input type="Submit" name="add-cart-btn" value="Add to Cart">
	</form>
	<form action="display-cart.php">
		<input type="submit" name="display-btn" value="Display Cart">
	</form>
</body>
</html>

<?php 
	if(!isset($_GET['modified'])){
        exit();
    }
    else{
        $cartcheck = $_GET['modified'];
        if($cartcheck == "false"){
            echo '<script>';
            	echo 'alert("Invalid Entry into Cart")';
            echo '</script>';
            exit();
        }
    }
 ?>