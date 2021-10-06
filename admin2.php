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
			<a href="admin2.php">Admin2</a>
		</nav>
		</div>

		<div id="rightcolumn">
			<h2>Click to generate daily sales report:</h2>
			<table style = "border :0">
			<tr>
                <td>
                    <input type="checkbox" id="javaRadio" onchange="document.location.href='sales1.php'">
                </td>
				<th>Total dollar sales by products</th>
			</tr>
			<tr>
                <td>
                    <input type="checkbox" id="cafeRadio" onchange="document.location.href='sales2.php'">
                </td>
				<th>Sales quantities by product categories</th>
				</td>
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