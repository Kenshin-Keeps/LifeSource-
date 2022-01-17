<?php include 'db.php'; ?>
<?php ob_start(); ?>
<?php session_start(); ?>
<?php
if ($_SESSION['loggedin']) {
?>
	<!DOCTYPE html>
	<html>

	<head>
		<title>LifeSource-Find Blood Instantly</title>

		<!-- Bootstrap & Fontawesome -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

		<!-- Google Fonts -->
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Cairo&family=Merriweather:wght@400;700&family=Pacifico&family=Ubuntu&display=swap" rel="stylesheet">

		<!-- CSS file -->
		<link rel="stylesheet" type="text/css" href="css/homestyle.css">
		<link rel="shortcut icon" href="images/blood-drop.png" type="image/x-icon">
	</head>

	<body>
		<section id="navigation">
			<nav class="navbar navbar-expand-lg navbar-dark">


				<a href="#" class="navbar-brand">LifeSource</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>


				<div class="container-fluid">
					<div class="collapse navbar-collapse" id="navbarSupportedContent">


						<ul class="navbar-nav mr-auto">
							<li class="nav-item">
								<a class="nav-link" href="home.php"><i class="fa fa-home"></i> Home </a>
							</li>
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-assistive-listening-systems"></i> Request </a>
								<div class="dropdown-menu" aria-labelledby="navbarDropdown">
									<a class="dropdown-item" href="home.php?source=myrequest"><i class="fa fa-tags"></i> My Request </a>
									<a class="dropdown-item" href="home.php?source=makerequest"><i class="fa fa-edit"></i> Make Request </a>
								</div>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="home.php?source=searchdonor"><i class="fa fa-search"></i> Search </a>
							</li>
						</ul>


						<ul class="navbar-nav right">
							<li class="nav-item">
								<a class="nav-link" href="home.php?source=profile"><i class="fa fa-user"></i> <?php echo $_SESSION['current_user_name']; ?> </a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="logout.php"><i class="fa fa-sign-out"></i> Logout</a>
							</li>
						</ul>
					</div>
				</div>
			</nav>
		</section>
		<?php

		if (isset($_GET['source'])) {
			# code...
			$source = $_GET['source'];
		} else {
			$source = '';
		}

		switch ($source) {
			case 'profile':
				# code...
				/*include file path here*/
				include 'myprofile.php';
				break;
			case 'editprofile':
				# code...
				/*include file path here*/
				include 'editprofile.php';
				break;
			case 'myrequest':
				# code...
				/*include file path here*/
				include 'myrequest.php';
				break;
			case 'makerequest':
				# code...
				include 'makerequest.php';
				break;
			case 'searchdonor':
				# code...
				include 'searchdonor.php';
				break;
			default:
				# code...
				include 'requestlist.php';
				break;
		}

		?>
		<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

	</body>

	</html>
<?php
} else {
	echo "<h1>Login First <a href='index.php'> Here.</a></h1>";
}
?>