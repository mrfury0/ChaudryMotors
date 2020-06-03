<?php
	$conn = mysqli_connect('localhost','root','','web_project') or die(mysqli_connect_error());
?>

<!doctype html>

<html>

<head>
	<title>Merchandise</title>
	<link rel="stylesheet" href="css/style.css">
</head>

<body>
	<section id="navbar">
		<div>
			<ul>
				<li><a href="index.php">Home</a></li>
				<li><a href="motorcycles.php">Motorcycles</a></li>
				<li><a href="merchandise.php">Merchandise</a></li>
				<li><a href="booking.php">Book a Ride</a></li>
				<li><a href="contact.php">Contact</a></li>
			</ul>
		</div>
	</section>
	<section>
		<h2 style="font-size:300%">Merchandise</h2>
		<h2 class="subheading">Jackets</h2>
		<hr />
		<div class="merchandise-container">
			<?php
				$query = "SELECT * FROM product WHERE id BETWEEN 100 AND 200 ORDER BY price ASC;";
				$data = mysqli_query($conn,$query) or die(mysqli_connect_error());
				while ($row = mysqli_fetch_assoc($data))
				{
					$itemID = $row['id'];
					$itemName = $row['name'];
					$itemPrice = number_format($row['price'],2);
					$itemImgUrl = $row['img_url'];
					echo "<div><a href='item.php?id=" . $itemID . "'><img src='" . $itemImgUrl . "' /><h3>" . $itemName . "</h3></a><h3 class='price'>$" . $itemPrice . "</h3></div>";
				}
			?>
		</div>
		<h2 class="subheading">Boots &amp; Gloves</h2>
		<hr />
		<div class="merchandise-container">
			<?php
				$query = "SELECT * FROM product WHERE id BETWEEN 200 AND 400 ORDER BY price ASC;";
				$data = mysqli_query($conn,$query) or die(mysqli_connect_error());
				while ($row = mysqli_fetch_assoc($data))
				{
					$itemID = $row['id'];
					$itemName = $row['name'];
					$itemPrice = number_format($row['price'],2);
					$itemImgUrl = $row['img_url'];
					echo "<div><a href='item.php?id=" . $itemID . "'><img src='" . $itemImgUrl . "' /><h3>" . $itemName . "</h3></a><h3 class='price'>$" . $itemPrice . "</h3></div>";
				}
			?>
		</div>
		<h2 class="subheading">Helmets</h2>
		<hr />
		<div class="merchandise-container">
			<?php
				$query = "SELECT * FROM product WHERE id BETWEEN 400 AND 500 ORDER BY price ASC;";
				$data = mysqli_query($conn,$query) or die(mysqli_connect_error());
				while ($row = mysqli_fetch_assoc($data))
				{
					$itemID = $row['id'];
					$itemName = $row['name'];
					$itemPrice = number_format($row['price'],2);
					$itemImgUrl = $row['img_url'];
					echo "<div><a href='item.php?id=" . $itemID . "'><img src='" . $itemImgUrl . "' /><h3>" . $itemName . "</h3></a><h3 class='price'>$" . $itemPrice . "</h3></div>";
				}
			?>
		</div>
		<h2 class="subheading">Miscellaneous</h2>
		<hr />
		<div class="merchandise-container">
			<?php
				$query = "SELECT * FROM product WHERE id > 500 ORDER BY price ASC;";
				$data = mysqli_query($conn,$query) or die(mysqli_connect_error());
				while ($row = mysqli_fetch_assoc($data))
				{
					$itemID = $row['id'];
					$itemName = $row['name'];
					$itemPrice = number_format($row['price'],2);
					$itemImgUrl = $row['img_url'];
					echo "<div><a href='item.php?id=" . $itemID . "'><img src='" . $itemImgUrl . "' /><h3>" . $itemName . "</h3></a><h3 class='price'>$" . $itemPrice . "</h3></div>";
				}
			?>
		</div>
	</section>
	
</body>

</html>