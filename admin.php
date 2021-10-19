<!DOCTYPE html>
<html lang="en">
<head>
<title>JavaJam Coffee House</title>
<meta charset=“utf-8”>
<link rel="stylesheet" href="style.css">

</head>

<body>
<?php
 @ $db = new mysqli('localhost', 'f32ee', 'f32ee', 'f32ee');
 if (mysqli_connect_errno()) {
	echo 'Error: Could not connect to database.  Please try again later.';
	exit;
}
$query = "select * from javajam_prices";
$result = $db->query($query);
$num_results = $result->num_rows;
$arr = array();
for ($i=0; $i <$num_results; $i++) {
	$row = $result->fetch_assoc();
	array_push($arr, $row);
 }
 ?>
<?php
  $updatedJavaPrice=$_POST['updatedJavaPrice'];
  $updatedCafeSinglePrice=$_POST['updatedCafeSinglePrice'];
  $updatedCafeDoublePrice=$_POST['updatedCafeDoublePrice'];
  $updatedIcedSinglePrice=$_POST['updatedIcedSinglePrice'];
  $updatedIcedDoublePrice=$_POST['updatedIcedDoublePrice'];
//   prices array indexed by produce id
  $prices = array(1 => $_POST['updatedJavaPrice'], 2 => $_POST['updatedCafeSinglePrice'], 3 => $_POST['updatedCafeDoublePrice'], 4 => $_POST['updatedIcedSinglePrice'], 5 => $_POST['updatedIcedDoublePrice']);
  @ $db = new mysqli('localhost', 'f32ee', 'f32ee', 'f32ee');

  if (mysqli_connect_errno()) {
	 echo 'Error: Could not connect to database.  Please try again later.';
	 exit;
  }
  foreach($prices as $product_id => $price) {
	if ($price){
		$query = "UPDATE javajam_prices SET price = " .$price." WHERE id = " .$product_id .";";
		// echo $query;
		$result = $db->query($query);

		if ($result) {
			// echo  $db->affected_rows."<br> Price updated.";
				header("Refresh:0");
		} else {
				echo "<br>An error has occurred.  The item was not added.";
		}

		}
}

  $db->close();
?>
	<div id="wrapper">

		<header>
        <img src="image/java_house_image.png" />
		</header>

		<div id="leftcolumn">
		<nav>
			<!-- <a href="index.html">Home</a> -->
			<a href="menu.php">Menu</a>
			<!-- <a href="music.html">Music</a>
			<a href="jobs.html">Jobs</a> -->
			<a href="admin.php" style="font-size: 0.6em;">Price Update</a>
			<a href="admin2.php" style="font-size: 0.6em;">Sales Report</a>
		</nav>
		</div>

		<div id="rightcolumn">
			<h2>Click to update product prices:</h2>
			<form action="admin.php" method="post">
			<table style = "border :0">
			<tr>
                <td>
                    <input type="checkbox" id="javaRadio" onchange="editJava()">
                </td>
				<th>Just Java</th>
				<td>Regular house blend, decaffeinated coffee, or flavour of the day.<br>
				<b>Endless Cup $<?php echo $arr[0]['price'] ?></b>
				<div id ="javaForm"></div>
				<!-- <div id="javaPrice"  style="visibility: hidden">
				<label>New Price: </label>
				<input type="number" size="3" maxlength="4" min="0" >
				</div> -->
				</td>
			</tr>
			<tr>
                <td>
                    <input type="checkbox" id="cafeRadio" onchange="editCafe()">
                </td>
				<th>Cafe au Lait</th>
				<td>House blended coffee infused into a smooth, steamed milk.<br>
				<b>Single $<?php echo $arr[1]['price'] ?></b>
				<b>Double $<?php echo $arr[2]['price'] ?></b>
				<div id ="cafeForm"></div>
				</td>
			</tr>
			<tr>
                <td>
                    <input type="checkbox" id="icedRadio" onchange="editIced()">
                </td>
				<th>Iced Cappuccino</th>
				<td>Sweetened expresso blended with icy-cold milk and served in a chilled glass.<br>
				<b>Single $<?php echo $arr[3]['price'] ?></b>			
				<b>Double $<?php echo $arr[4]['price'] ?></b>
				<div id ="icedForm"></div>
				</td> 
			</tr>
			<tr>
				<td>
					<input type="submit" id="submitBtn">
				</td>
			</tr>
			</table>
			</form>
		</div>

<br>

<div id="footer">
	<small><i>Copyright &copy; 2014 JavaJam Coffee House
	</i>
	<br>
	<i><a href="mailto:QiJian@Tan.com">QiJian@Tan.com</a></i>
	</small>
</footer>
</body>
<script type="text/javascript" src="menu.js"></script>
</html>