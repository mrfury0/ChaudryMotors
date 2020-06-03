

<!doctype html>

<html>

<head>
	<title>My Cart</title>
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
	<section class="light" style="text-align:center;padding-bottom: 3em">
		<h2 style="font-size:300%">My Cart</h2>
		<?php 

		if (isset($_COOKIE['cart']))
		{
			$cart = json_decode($_COOKIE['cart'],true);
			echo "<table id='cart'><tr><th>Product ID</th><th>Product Name</th><th>Price</th><th>Quantity</th><th>Subtotal</th></tr>";
			$total = 0;
			foreach ($cart as $item)
			{
				echo "<tr><td>".$item[0]."</td><td>".$item[1]."</td><td>".$item[2]."</td><td>".$item[3]."</td><td>".$item[4]."</td></tr>";
				$total += $item[4];
			}

			echo "<tr><td class='total' colspan='5'>Total: $".$total."</td></tr>";
			echo "</table>";
			echo "<a class='btn' href='#'>Checkout</a>";
		}
		else
		{
			echo "<h3>Cart is empty!</h3>";
		}

		?>
	</section>
	
</body>

</html>