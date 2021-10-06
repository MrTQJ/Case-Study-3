<?php
 @ $db = new mysqli('localhost', 'f32ee', 'f32ee', 'f32ee');
 if (mysqli_connect_errno()) {
	echo 'Error: Could not connect to database.  Please try again later.';
	exit;
}
$query = "SELECT *
FROM `javajam_sales`
INNER JOIN javajam_prices ON javajam_prices.id = javajam_sales.product_id";
$result = $db->query($query);
$num_results = $result->num_rows;
$arr = array();
for ($i=0; $i <$num_results; $i++) {
	$row = $result->fetch_assoc();
    $row['revenue'] = $row['quantity'] * $row['price'];
	array_push($arr, $row);
 }

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>JavaJam Coffee House</title>
<meta charset=“utf-8”>
<link rel="stylesheet" href="style.css">

</head>

<body>
	<div id="wrapper">

		<header>
			<img src="image/java_house_image.png" />
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
			<h2>Total dollar sales by products</h2>
            <?php
            $javaRevenue = $arr[0]['revenue'];
            $cafeRevenue = $arr[1]['revenue'] + $arr[2]['revenue'];
            $icedRevenue = $arr[3]['revenue'] + $arr[4]['revenue'];
            $totalRevenue = $javaRevenue + $cafeRevenue + $icedRevenue;
            $greatest = max($javaRevenue, $cafeRevenue, $icedRevenue);
            if($javaRevenue == $greatest)
                echo "<h3>Just Java had the highest revenue</h3>";
            if($cafeRevenue == $greatest)
                echo "<h3>Cafe au Lait had the highest revenue</h3>";
            if($icedRevenue == $greatest)
                echo "<h3>Iced Cappuccino had the highest revenue</h3>";
            
            ?>



            <table style = "border :0">
            <tr>
                <th>Product</th>
                <th>Single</th>
                <th>Double</th>
                <th>Revenue</th>
            </tr>
			<tr>
				<th>Just Java</th>
                <td colspan ="2"><?php echo $arr[0]['quantity']?></td>
                <td>$<?php echo $javaRevenue;?></td>
			</tr>
			<tr>
				<th>Cafe au Lait</th>
                <td><?php echo $arr[1]['quantity']?></td>
                <td><?php echo $arr[2]['quantity']?></td>
                <td>$<?php echo $cafeRevenue;?></td>
			</tr>
			<tr>
				<th>Iced Cappuccino</th>
                <td><?php echo $arr[3]['quantity']?></td>
                <td><?php echo $arr[4]['quantity']?></td>
                <td>$<?php echo $icedRevenue;?></td>
			</tr>
            <tr>
            <td style="text-align:right; padding-right:10px;" colspan="3">
					<b>Total Price:</b>
				</td>
            <td align="center"><b>$<label class="costLabel" id="total"><?php echo $totalRevenue ?></label></b></td>
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