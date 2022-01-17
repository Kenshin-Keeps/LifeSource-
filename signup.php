<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>

<head>
	<title>LifeSource-Find Blood Instantly</title>
	<link rel="shortcut icon" href="images/blood-drop.png" type="image/x-icon">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

	<!-- Google Fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Cairo&family=Merriweather:wght@400;700&family=Pacifico&family=Ubuntu&display=swap" rel="stylesheet">


	<link rel="stylesheet" type="text/css" href="css/formstyle2.css">

</head>

<body>
	<section id="navigation">
		<nav class="navbar navbar-expand-lg navbar-dark">
			<a class="navbar-brand" href="#">LifeSource</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item">
						<a class="nav-link" href="index.php">Log in</a>
					</li>
				</ul>
			</div>
		</nav>
	</section>
	<section class="signup-section">

	</section>
	<div class="container-fluid bg">
		<div class="row">
			<div class="col-lg-12">
				<form name="signup_form" class="formstyle" method="post">
					<div align="center"><b>
							<h2>Signup Form</h2>
						</b></div>
					<hr class="my-4">

					<!-- REGISTRATION PRECESS ALONG WITH QUERY -->

					<?php
					if (isset($_POST['signup_submit'])) {

						$name = $_POST['signup_name'];
						$email = $_POST['signup_email'];
						$password = $_POST['signup_password'];
						$contact = $_POST['signup_mobile_no'];
						$blood_group = $_POST['signup_blood_group'];
						$gender = $_POST['signup_gender'];
						$birthday = $_POST['signup_birthday'];
						$status = $_POST['signup_donating_status'];
						$address = $_POST['signup_address'];

						if (empty($name) || empty($email) || empty($password) || empty($contact) || empty($blood_group) || empty($status) || empty($address)) {

							echo "'*''-marked content must be filled";
						} elseif (strlen($password) < 8) {

							echo "Password must be at least of 8 characters";
						} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

							echo "Invalid email format";
						} else {
							$q = "SELECT * FROM donors where d_email = '{$email}'";
							$res = mysqli_query($connection, $q);
							if ($res && mysqli_num_rows($res)) {
								echo "Already an account with this email exists!";
							} else {
								$query = "INSERT INTO donors(d_name,d_email,d_password,d_contact,d_b_g,	d_gender,d_birthday,d_status,d_address) VALUES('{$name}','{$email}','{$password}','{$contact}','{$blood_group}','{$gender}','{$birthday}','{$status}','{$address}')";

								// $registration_query = mysqli_query($connection,$query);
								if ($connection->query($query) === TRUE) {
									header("Location:index.php");
								} else {
									echo "Error: " . $query . "<br>" . $connection->error;
								}
							}
						}
					}
					?>

					<div class="form-group">
						<label for="signup_name"><b>Name :*</b></label>
						<input type="text" name="signup_name" class="form-control" id="signup_name" onchange="nameC()" placeholder="Enter name...">
						<small id="nameHelp" class="form-text text-muted">Please avoid using any fake name.</small>
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1"><b>Email :*</b></label>
						<input type="email" name="signup_email" class="form-control" id="exampleInputEmail1" placeholder="Enter email...">
					</div>

					<div class="form-group">
						<label for="exampleInputPassword1"><b>Password :*</b></label>
						<input type="password" name="signup_password" class="form-control" id="exampleInputPassword1" placeholder="Enter Password..">
						<small id="passwordHelp" class="form-text text-muted">Password must be at least of 8 characters.</small>
					</div>
					<div class="form-group">
						<label for="signup_mobile_no"><b>Contact no. :*</b></label>
						<input type="text" name="signup_mobile_no" class="form-control" id="signup_mobile_no" placeholder="Enter Contact no...">
					</div>
					<div class="form-group">
						<label for="signup_blood_group"><b>Blood Group :*</b></label>
						<select name="signup_blood_group" id="signup_blood_group">
							<option value="Not Selected">Choose One</option>
							<option value="A+">A+</option>
							<option value="A-">A-</option>
							<option value="B+">B+</option>
							<option value="B-">B-</option>
							<option value="O+">O+</option>
							<option value="O-">O-</option>
							<option value="AB+">AB+</option>
							<option value="AB-">AB-</option>
						</select>
					</div>
					<div class="form-group">
						<label for="signup_gender"><b>Gender :</b></label>
						<select name="signup_gender" id="signup_gender">
							<option value="Male">Male</option>
							<option value="Female">Female</option>
						</select>
					</div>
					<div class="form-group">
						<label for="signup_birthday"><b>Date of Birth :</b></label>
						<input type="date" name="signup_birthday" id="signup_birthday">
					</div>
					<div class="form-group">
						<label for="signup_donating_status"><b>Donating Status :*</b></label>
						<select name="signup_donating_status" id="signup_donating_status">
							<option value="Not Selected">Choose One</option>
							<option value="Can Donate">Can Donate</option>
							<option value="Can not Donate now">Can not Donate now</option>
						</select>
					</div>
					<div class="form-group">
						<label for="signup_address"><b>Current address :*</b></label>
						<input type="text" name="signup_address" class="form-control" id="signup_address" placeholder="Enter current address..">
					</div>
					<div class="form-group">
						<input type="submit" name="signup_submit" class="btn btn-success btn-lg btn-block" value="Sign Up">
					</div>
				</form>
			</div>
		</div>

		<script src="js/signup.js"></script>
		<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>