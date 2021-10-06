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
                if ($singleRevenue> $doubleRevenue){
                    echo "<h3>Single Shot Coffee had the highest revenue</h3>";
                }else{
                    echo "<h3>Double Shot Coffee had the highest revenue</h3>";
                }
            ?>
			<table style = "border :0">
            <tr>
                <th>Product</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Revenue</th>
            </tr>
            <tr>
                <th colspan="4">Single</th>
            </tr>
            <?php 
            $singleRevenue = 0;
            foreach($arr as $key=>$value) {
                if($arr[$key]['type'] == "Single" || $arr[$key]['type'] == "Endless Cup"){
                    $singleRevenue += $arr[$key]['revenue'];
                    echo "<tr><th>{$arr[$key]['product']}<br>({$arr[$key]['type']})</th>";
                    echo "<td>{$arr[$key]['quantity']} </td>";
                    echo "<td>\${$arr[$key]['price']} </td>";
                    echo "<td>\${$arr[$key]['revenue']} </td></tr>";
                }
            }
            echo "<td style=\"text-align:right; padding-right:10px;\" colspan=\"3\">
                    <b>Total Price (Single Shot):</b>
                </td>
                <td>
                    <b>\${$singleRevenue}</b>
                </td>";
            ?>
            <tr>
                <th colspan="4">Double</th>
            </tr>
            <?php 
            foreach($arr as $key=>$value) {
                if($arr[$key]['type'] == "Double"){
                    $doubleRevenue += $arr[$key]['revenue'];
                    echo "<tr><th>{$arr[$key]['product']}<br>({$arr[$key]['type']})</th>";
                    echo "<td>{$arr[$key]['quantity']} </td>";
                    echo "<td>\${$arr[$key]['price']} </td>";
                    echo "<td>\${$arr[$key]['revenue']} </td></tr>";
                }
            }
            echo "<td style=\"text-align:right; padding-right:10px;\" colspan=\"3\">
            <b>Total Price (Double Shot):</b>
        </td>
        <td>
            <b>\${$doubleRevenue}</b>
        </td>";

            ?>
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