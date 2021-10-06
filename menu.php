<!doctypehtml>
<html lang="en">
<head>
<title>JavaJam Coffee House</title>
<meta charset=“utf-8”>
<link rel="stylesheet" href="style.css">

</head>
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
<body>
	<div id="wrapper">

		<header>
			<img src= "java_house_image.png">
		</header>

		<div id="leftcolumn">
			<nav>
				<a href="index.html">Home</a>
				<a href="menu.php">Menu</a>
				<a href="music.html">Music</a>
				<a href="jobs.html">Jobs</a>
				<a href="admin.php">Admin</a>
			</nav>
		</div>

		<div id="rightcolumn">

			<h2>Coffee at JavaJam</h2>

<!-- 			<form action="menu.php" method="post"> -->
			<table style = "border :0">
			<tr>
				<th>Drinks</th>
				<th style = "width:300px;">Description</th>
				<th>Quantity</th>
				<th>Sub-total</th>
			</tr>	
			<tr>
				<th>Just Java</th>
				<td>Regular house blend, decaffeinated coffee, or flavour of the day.<br>
				<b>Endless Cup $<?php echo $arr[0]['price'] ?></b>
				</td>
				<td align="center"><input type="number" class="amount" id="javaQty" size="3" maxlength="4" min="0" onchange="computeJava();"></td>
				<td align="center">$<label class="costLabel" id="javaCost">0</label></td>
			</tr>
			<tr>
				<th>Cafe au Lait</th>
				<td>House blended coffee infused into a smooth, steamed milk.<br>
				<b> <input type = "radio"  name="cafeRadio" id="singleCafeRadio"  onchange="computeCafe()"   
					/>Single $2.00</b>
					
				<b> <input type = "radio"  name="cafeRadio" id="doubleCafeRadio"  onchange="computeCafe()"   
					/>Double $3.00</b>
				</td>
				<td align="center"><input type="number" class="amount" id="cafeQty" size="3" maxlength="4" min="0" onchange="computeCafe()"></td>
				<td align="center">$<label class="costLabel" id="cafeCost">0</label></td>
			</tr>
			<tr>
				<th>Iced Cappuccino</th>
				<td>Sweetened expresso blended with icy-cold milk and served in a chilled glass.<br>
				<b> <input type = "radio"  name="icedRadio" id="singleIcedRadio"  onchange="computeIced()"   
					/>Single $4.75</b>
					
				<b> <input type = "radio"  name="icedRadio" id="doubleIcedRadio"  onchange="computeIced()"   
					/>Double $5.75</b>
				</td>
				<td align="center"><input type="number" class="amount" id="icedQty" size="3" maxlength="4" min="0" onchange="computeIced()"></td>
				<td align="center">$<label class="costLabel" id="icedCost">0</label>
				</td>
			</tr>
			<tr>
				<!-- <td></td> -->
				<td style="text-align:right; padding-right:10px;" colspan="3">
					<b>Total Price:</b>
				</td>
				<td align="center"><b>$<label class="costLabel" id="total">0</label></b></td>
			</tr>
			</table>
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