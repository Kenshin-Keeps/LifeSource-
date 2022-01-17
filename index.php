<?php include 'db.php'; ?>
<?php ob_start(); ?>
<?php session_start();
$_SESSION['loggedin'] = false; ?>
<?php
// if ((isset($_COOKIE["user_email"]) && (strlen($_COOKIE["user_email"]) > 4))) {
// 	$email = $_COOKIE["user_email"];
// 	$query = "SELECT * FROM donors WHERE d_email LIKE '$email'";
// 	$check_login_email_password_query = mysqli_query($connection, $query);
// 	if ($check_login_email_password_query) {
// 		# code...
// 		while ($row = mysqli_fetch_assoc($check_login_email_password_query)) {
// 			# code...
// 			if ($row['d_email'] === $email && $row['d_password'] === $password) {
// 				# code...
// 				/*SET THE LOCATION HERE 
// 				WHERE TO GO AFTER LOGIN*/
// 				$_SESSION['loggedin'] = true;
// 				$_SESSION['current_user_id'] = $row['d_id'];
// 				$_SESSION['current_user_name'] = $row['d_name'];
// 				$_SESSION['current_user_password'] = $row['d_password'];
// 				$_SESSION['current_user_email'] = $row['d_email'];
// 				$_SESSION['current_user_contact'] = $row['d_contact'];
// 				$_SESSION['current_user_blood_group'] = $row['d_b_g'];
// 				$_SESSION['current_user_gender'] = $row['d_gender'];
// 				$_SESSION['current_user_birthday'] = $row['d_birthday'];
// 				$_SESSION['current_user_status'] = $row['d_status'];
// 				$_SESSION['current_user_address'] = $row['d_address'];
// 				// if (isset($_POST["remenber"])) {
// 				// 	setcookie("user_email", $row['d_email'], time() + (86400 * 30), "/");
// 				// }
// 				header("Location:home.php");
// 			} else {
// 				echo "Email/Password is incorrect.";
// 			}
// 		}
// 	}
// }
?>
<!DOCTYPE html>
<html>

<head>
	<title>LifeSource-Find Blood Instantly</title>
	<link rel="shortcut icon" href="images/blood-drop.png" type="image/x-icon">
	<!-- Google Fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Cairo&family=Merriweather:wght@400;700&family=Pacifico&family=Ubuntu&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<!-- <link rel="stylesheet" type="text/css" href="css/formstyle.css"> -->
	<!-- Font awesome  -->
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
	<!-- External CSS -->
	<link rel="stylesheet" href="css/style.css">
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
					<li class="nav-item benefits">
						<a class="nav-link" href="#services">Benefits</a>
					</li>
					<li class="nav-item contact">
						<a class="nav-link" href="#footer">Contact</a>
					</li>
				</ul>
			</div>
		</nav>
	</section>

	<section id="title-and-login">

		<div class="container-fluid title-section">
			<div class="row">
				<div class="col-lg-6">

					<h1 class="title-text">Excuses never save a life, Blood donation does.</h1>
					<p class="title-subtext">Donate blood and get real blessings.</p>

				</div>
				<div class="col-lg-6">
					<form class="login-form" method="post">
						<h2 class="title-subtext">Login Here</h2>
						<hr>
						<!-- Login Query -->
						<?php
						if (isset($_POST['login_submit'])) {
							$email = $_POST['login_email'];
							$password = $_POST['login_password'];

							$email = mysqli_real_escape_string($connection, $email);
							$password = mysqli_real_escape_string($connection, $password);

							if (empty($email) || empty($password)) {
								echo "<p class='empty-email-pass'>Email/Password cannot be empty.</p>";
								# code...
							} else {
								$query = "SELECT * FROM donors WHERE d_email LIKE '$email' AND d_password LIKE '$password'";
								$check_login_email_password_query = mysqli_query($connection, $query);
								if ($check_login_email_password_query && mysqli_num_rows($check_login_email_password_query) > 0) {
									# code...
									while ($row = mysqli_fetch_assoc($check_login_email_password_query)) {
										# code...
										/*SET THE LOCATION HERE 
												WHERE TO GO AFTER LOGIN*/
										$_SESSION['loggedin'] = true;
										$_SESSION['current_user_id'] = $row['d_id'];
										$_SESSION['current_user_name'] = $row['d_name'];
										$_SESSION['current_user_password'] = $row['d_password'];
										$_SESSION['current_user_email'] = $row['d_email'];
										$_SESSION['current_user_contact'] = $row['d_contact'];
										$_SESSION['current_user_blood_group'] = $row['d_b_g'];
										$_SESSION['current_user_gender'] = $row['d_gender'];
										$_SESSION['current_user_birthday'] = $row['d_birthday'];
										$_SESSION['current_user_status'] = $row['d_status'];
										$_SESSION['current_user_address'] = $row['d_address'];

										if (isset($_POST["remember"])) {
											setcookie("user_email", $row['d_email'], time() + 86400, "/");
										}
										header("Location:home.php");
									}
								} else {
									echo "<p class='empty-email-pass'>Email/Password is incorrect.</p>";
								}
							}
						}
						?>
						<div class="form-group">
							<label for="exampleInputEmail1">Email address:</label>
							<input type="email" name="login_email" class="form-control" <?php
																						if (isset($_COOKIE['user_email'])) {
																							$val = $_COOKIE['user_email'];
																							echo "value = $val";
																						}
																						?> id="exampleInputEmail1" placeholder="Enter email">
						</div>
						<div class="form-group">
							<label for="LoginPassword">Password:</label>
							<input type="password" name="login_password" class="form-control" id="LoginPassword" placeholder="Password">
						</div>
						<div class="form-check">
							<input type="checkbox" name="remember" class="form-check-input" id="login-check">
							<label class="form-check-label" for="login-check">Remember me</label>
						</div>
						<button type="submit" name="login_submit" class="btn btn-lg btn-block btn-primary login-form-btn">Log in</button>
						<p class="or">OR</p>
						<a role="button" class="btn btn-lg btn-block btn-success login-form-btn" href="signup.php">Sign up</a>
					</form>
				</div>
			</div>
		</div>
	</section>
	<section id="services">

		<h2 class="service-section-heading">Available benefits</h2>
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-4 individual-service">
					<i class="fas fa-map-marked-alt service-icon"></i>
					<h3 class="individual-service-heading">Find available donors</h3>
					<p class="individual-service-text">Search and find any blood group donor and contact them instantly.
					</p>
				</div>
				<div class="col-lg-4 individual-service">
					<i class="fas fa-address-card service-icon"></i>
					<h3 class="individual-service-heading">Make request</h3>
					<p class="individual-service-text">Make request for a specific group of blood and get donors
						attention fast.</p>
				</div>
				<div class="col-lg-4 individual-service">
					<i class="fas fa-street-view service-icon"></i>
					<h3 class="individual-service-heading">Become a donor</h3>
					<p class="individual-service-text">By becoming a donor yourself, help others and take part in saving
						lives.</p>
				</div>
			</div>
		</div>
	</section>

	<section id="footer">
		<div class="row">
			<div class="col-lg-6 creator-info">
				<h3>Md. Zahim Hassan</h3>
				<p>Department of Computer Science and Engineering</p>
				<p>Khulna University of Engineering & Technology(KUET), Khulna-9203</p>
			</div>
			<div class="col-lg-6 social-info">
				<i class="fab fa-facebook-square social-icon"></i>
				<i class="fab fa-linkedin social-icon"></i>
				<i class="fab fa-github-square social-icon"></i>
				<i class="fas fa-envelope social-icon"></i>
			</div>
			<div class="col-lg-12 copyright">
				<p>Copyright: 2022 Md Zahim Hassan</p>
			</div>
		</div>
	</section>
	<script src="js/index.js"></script>
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>

</html>