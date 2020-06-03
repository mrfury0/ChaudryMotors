<?php
	if (isset($_GET['id']))
	{
		$itemID = $_GET['id'];
		$conn = mysqli_connect('localhost','root','','web_project') or die(mysqli_connect_error());
		$sql = "SELECT * FROM product WHERE id=".$itemID.";";
		$data = mysqli_query($conn,$sql) or die(mysqli_connect_error());
		$row = mysqli_fetch_assoc($data);
		if ($row)
		{
			$itemName = $row['name'];
			$itemPrice = number_format($row['price'],2);
			$itemPriceVal = $row['price'];
			$itemImgUrl = $row['img_url'];
			$itemInfoFile = $row['info_file'];

			$infoFile = fopen($itemInfoFile,'r');
			if ($infoFile)
			{
				$itemInfo = fread($infoFile,filesize($itemInfoFile));
				fclose($infoFile);
			}
			else
			{
				$itemInfo = "<h3>No Data Found!</h3>";
			}

		}
	}

	if ($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$quantity = $_POST['quantity'];
		$subtotal = $itemPriceVal * $quantity;

		if (isset($_COOKIE['cart']))
		{
			$cart = json_decode($_COOKIE['cart'],true);
			array_push($cart,array($itemID,$itemName,$itemPriceVal,$quantity,$subtotal));
			setcookie('cart',json_encode($cart),time()+3600);
		}
		else
		{
			$cart = array(array($itemID,$itemName,$itemPriceVal,$quantity,$subtotal));
			setcookie('cart',json_encode($cart),time()+3600);
		}
	}
	
?>

<!doctype html>

<html>

<head>
	<title><?php if (isset($itemName)) echo $itemName; else echo "Product Not Found!"; ?></title>
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
	<section id="product-info" class="light">
		<h2 style="font-size:300%">Product Information</h2>
		<?php if (isset($itemName)) { ?>
		<h2 class="subheading"><?php echo $itemName; ?></h2>
		<div class="two-column">
			<div>
				<img src="<?php echo $itemImgUrl; ?>" />
			</div>
			<div>
				<h3 id="price">$<?php echo $itemPrice; ?></h3>
				<?php if ($_SERVER["REQUEST_METHOD"] == "POST") { ?>
				<p>This item has been added to your cart.</p>
				<p><a class="btn" href="cart.php">View Cart</a></p>
				<?php } else { ?>
				<form action="#" method="post">
					<p>Quantity: <input type="number" name="quantity" min="1" max="10" value="1"/></p>
					<br /><input type="submit" value="Add To Cart"/>
				</form>
				<?php } ?>
			</div>
		</div>
		<div id="product-description">
			<?php echo $itemInfo; ?>
		</div>
		<?php } else echo "<h2 class='subheading'>Product not found!</h2>"; ?>
	</section>
	
</body>

</html>