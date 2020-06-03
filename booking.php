

<!doctype html>

<html>

<head>
	<title>Book a Ride</title>
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
		<h2 style="font-size:300%">Book a Ride</h2>
		<?php if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$conn = mysqli_connect('localhost','root','','web_project') or die(mysqli_connect_error());

			$firstName = $_POST["firstName"];
			$lastName = $_POST["lastName"];
			$number = $_POST["number"];
			$email = $_POST["email"];
			$model = $_POST["model"];
			$date = $_POST["date"];

			$query = "INSERT INTO booking VALUES ('$firstName','$lastName','$number','$email','$model','$date');" ;
			if (!mysqli_query($conn,$query))
			{
  				echo("Error description: " . mysqli_error($conn));
  			}		
			echo "<p>Thank you! Your test ride has been booked.</p>";
		}
		else 
			{ ?>
		<form action="#" method="post">
		<table class="booking-form">
			<tr><td>First Name</td><td><input type="text" name="firstName" /></td></tr>
			<tr><td>Last Name</td><td><input type="text" name="lastName" /></td></tr>
			<tr><td>Contact Number</td><td><input type="text" name="number" /></td></tr>
			<tr><td>E-mail</td><td><input type="text" name="email" /></td></tr>
			<tr><td>Model</td><td><select name="model"><option value="BMW R1200GS">BMW R1200GS</option><option value="Triumph Bonneville T120">Triumph Bonneville T120</option><option value="Suzuki Boulevard M109R">Suzuki Boulevard M109R</option><option value="KTM 1290 Super Duke R">KTM 1290 Super Duke R</option></select></td></tr>
			<tr><td>Date</td><td><input type="date" name="date" /></td></tr>
			<tr><td colspan="2"><input type="submit" /></td></tr>
		</table>
		</form>
		<?php } ?>
	</section>
	
</body>

</html>