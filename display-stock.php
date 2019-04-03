<?php 
	include_once 'includes/dbh-inc.php';
	session_start();
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>
		Stock Display
	</title>
	<link rel="stylesheet" href="css/stockdisplay.css">
	<script type="text/javascript">
        function addField (row_count_new){
            var myTable = document.getElementById("stock");
            var currentIndex = myTable.rows.length;
            var currentRow = myTable.insertRow(-1);
            var linksBox = document.createElement("td");
            var ipt = document.createElement("input");
            ipt.setAttribute("type", "text");
            ipt.setAttribute("name", "MedicineName[]");
            ipt.setAttribute("value", "");
            linksBox.appendChild(ipt);
            var currentCell = currentRow.insertCell(-1);
            currentCell.appendChild(linksBox);
          
            var linksBox = document.createElement("td");
            var ipt = document.createElement("input");
            ipt.setAttribute("type", "text");
            ipt.setAttribute("name", "Quantity[]");
            ipt.setAttribute("value", "");
            linksBox.appendChild(ipt);
            var currentCell = currentRow.insertCell(-1);
            currentCell.appendChild(linksBox);

            var linksBox = document.createElement("td");
            var ipt = document.createElement("input");
            ipt.setAttribute("type", "text");
            ipt.setAttribute("name", "Price[]");
            ipt.setAttribute("value", "");
            linksBox.appendChild(ipt);
            var currentCell = currentRow.insertCell(-1);
            currentCell.appendChild(linksBox);

            var linksBox = document.createElement("td");
            var ipt = document.createElement("input");
            ipt.setAttribute("type", "date");
            ipt.setAttribute("name", "Expiry[]");
            ipt.setAttribute("value", "");
            linksBox.appendChild(ipt);
            var currentCell = currentRow.insertCell(-1);
            currentCell.appendChild(linksBox);

            row_count_new = row_count_new + 1;
        }
    </script>
</head>


<body>

</body>
</html>



 <?php 
	$shopid = $_SESSION['shopid'];
	$sql = "SELECT * FROM medicinestock WHERE shopid = '$shopid'";
	$result = mysqli_query($conn, $sql);
	$resultCheck = mysqli_num_rows($result);
	if($resultCheck > 0){
		echo '<form action="modify-stock.php" method="POST">';
		echo '<p> Your Current Stock..</p>';
        echo '<table id="stock">';
        	echo '<tr>';
              echo '<th>MedicineName</th>';
              echo '<th>Quantity</th>';
              echo '<th>Price</th>';
              echo '<th>Expiry(DD-MM-YYYY)</th>';
            echo '</tr>';
        $i=1;
        $row_count=strval($i);
		while($row = mysqli_fetch_assoc($result)){
			echo '<tr>';
				echo '<td><input type="text" name="MedicineName[]" value="' . $row['MedicineName'] . '" /></td>';
				echo '<td><input type="text" name="Quantity[]" value="' . $row['Quantity'] . '" /></td>';
				echo '<td><input type="text" name="Price[]" value="' . $row['Price'] . '" /></td>';
				echo '<td><input type="date" name="Expiry[]" value="' . $row['Expiry'] . '" /></td>';
			echo '</tr>';
			$i=$i+1;
            $row_count = strval($i);
		}
		echo '</table>';
        echo '<br>';
        echo '<center><input style="width:150px;" type="submit" id ="modify-btn" class="button" value="Modify Stock"></center>';
        echo '</form>';
	}
	else{
		echo "Stooocckkkk issss emmmmptyyyy";
	}
	echo '<center>';              
      echo '<input style="width:150px;" type="button" id ="add-btn" class="button" value="Add Stock" onclick="addField(' .$row_count. ');">';
    echo '</center>';
    echo '<form action="sell-stock.php">';
    echo '<center>';              
      echo '<input style="width:150px;" type="submit" id ="sell-btn" class="button" value="Sell Stock";">';
    echo '</center>';
    echo '</form>';

    echo '<p>Notifications</p>';
    $sql = "SELECT * FROM cart WHERE ShopID != '$shopid' AND notifications='true';";
    $result = mysqli_query($conn, $sql);
	$resultCheck = mysqli_num_rows($result);
	if($resultCheck > 0){
		echo '<table id="notifications">';
        	echo '<tr>';
        	  echo '<th>Number</th>';
        	  echo '<th>SourceShopID</th>';
              echo '<th>MedicineName</th>';
              echo '<th>Quantity</th>';
              echo '<th>Price</th>';
              echo '<th>Expiry(DD-MM-YYYY)</th>';
              echo '<th>Accept Request</th>';
            echo '</tr>';
            $i = 1;
		while($row = mysqli_fetch_assoc($result)){
			echo '<tr>';
				echo '<td>' . $i . '</td>';
				echo '<td>' . $row['ShopID'] . '</td>';
				echo '<td>' . $row['MedicineName'] . '</td>';
				echo '<td>' . $row['Quantity'] . '</td>';
				echo '<td>' . $row['Price'] . '</td>';
				echo '<td>' . $row['Expiry'] . '</td>';
				echo '<td><a href="accept-request.php?rowid=' . $i . '" >Accept Request</a></td>';
			echo '</tr>';
			$i = $i + 1;
		}
	}
 ?>