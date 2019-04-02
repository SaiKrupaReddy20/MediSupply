<?php 
	$shopid_src = $_SESSION['shopid'];
	header("Location: display-stock.php?notifications=true&src_shopid=$shopid_src");
 ?>