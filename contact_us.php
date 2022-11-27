<!DOCTYPE html>

<html>

<head>
	<link rel="stylesheet" type="text/css" href="css/loginstyle.css">
	<title>Contact US</title>
	<link rel="icon" href="photo/Deal1.png">
</head>

<body>
	<div class="main">
		<div class="container a-container" id="a-container">
			<form class="form" id="b-form" method="POST">
				<h2 class="form_title title">Get In Touch</h2>
				<input name="c_name" class="form__input" placeholder="Your First Name" required>
				<input name="c_email" class="form__input" placeholder="Your Email Address" required>
				<input name="c_phone" class="form__input" placeholder="Your Phone Number" required maxlength="10">
				<input name="c_title" class="form__input" placeholder="Your Subject of this message" required>
				<textarea name="c_message" class="form__input" placeholder="write us subject" required></textarea>
				<button class="form__button button submit" name="Register">Send Massege</button>
			</form>
		</div>
		<div class="switch" id="switch-cnt">
			<div class="switch__circle"></div>
			<div class="switch__circle switch__circle--t"></div>
			<div class="switch__container" id="switch-c1">
				<p class="switch__description description">DON'T BE SHY &nbsp;&nbsp;&nbsp;</p>
				<h2 class="switch__title title">Get In Touch</h2>
			</div>
		</div>
	</div>

	<?php
	if (isset($_POST['Register'])) {

		include "connected.php";

		$nam = $_POST['c_name'];
		$mail = $_POST['c_email'];
		$Phone = $_POST['c_phone'];
		$tit = $_POST['c_title'];
		$mase = $_POST['c_message'];
		$register = mysqli_query($conn, "INSERT INTO `contact_us`(`name`, `email`, `phone`, `title`, `massege`) VALUES ('$nam','$mail','$Phone','$tit','$mase')");

		if ($register == true) {
	?>
			<script>
				alert("Massege sent");
			</script>
		<?php
		} else {
		?>
			<script>
				alert("Massege not sent");
			</script>
	<?php
		}
	}
	?>
</body>

</html>