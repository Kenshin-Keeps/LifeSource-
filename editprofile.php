<div class="container mt-4">
	<div class="circletag">
		<img id="circleid" src="images/profileimg.png" height="200" width="230">
	</div>
</div>

<div class="container mt-4">

	<form method="post" class="profile-form">
		<p align="left">***Each time of update please select "Donation Status" accordingly.***</p>
		<?php

		if (isset($_POST['update'])) {
			# code...
			$id = $_SESSION['current_user_id'];
			$name = $_POST['signup_name'];
			$email = $_POST['signup_email'];
			$password = $_POST['signup_password'];
			$contact = $_POST['signup_mobile_no'];
			$status = $_POST['signup_donating_status'];
			$address = $_POST['signup_address'];


			$_SESSION['current_user_name'] = $name;
			$_SESSION['current_user_password'] = $password;
			$_SESSION['current_user_email'] = $email;
			$_SESSION['current_user_contact'] = $contact;
			$_SESSION['current_user_status'] = $status;
			$_SESSION['current_user_address'] = $address;

			if (empty($name) || empty($email) || empty($password) || empty($contact) || empty($address)) {

				echo "'*''-marked content must be filled";
			} elseif (strlen($password) < 8) {

				echo "Password must be at least of 8 characters";
			} else {

				$query = "UPDATE donors SET d_name='{$name}',d_email='{$email}',d_password='{$password}',d_contact='{$contact}',d_status='{$status}',d_address='{$address}' WHERE d_id={$id}";

				$edit_profile_info_query = mysqli_query($connection, $query);
				if (!$edit_profile_info_query) {
					# code...
					die("Query not completed");
				}
				header("Location:home.php?source=profile");
			}
		}

		?>


		<div class="form-group">
			<label for="signup_name"><b>Name*</b></label>
			<input type="text" name="signup_name" class="form-control" id="signup_name" value="<?php echo $_SESSION['current_user_name']; ?>">
		</div>
		<div class="form-group">
			<label for="exampleInputEmail1"><b>Email*</b></label>
			<input type="email" name="signup_email" class="form-control" id="exampleInputEmail1" value="<?php echo $_SESSION['current_user_email']; ?>">
		</div>

		<div class="form-group">
			<label for="exampleInputPassword1"><b>Password*</b></label>
			<input type="password" name="signup_password" class="form-control" id="exampleInputPassword1" value="<?php echo $_SESSION['current_user_password']; ?>">

		</div>
		<div class="form-group">
			<label for="signup_mobile_no"><b>Contact no.*</b></label>
			<input type="text" name="signup_mobile_no" class="form-control" id="signup_mobile_no" value="<?php echo $_SESSION['current_user_contact']; ?>">
		</div>
		<div class="form-group">
			<label for="signup_blood_group"><b>Blood Group :</b></label>
			<select name="signup_blood_group" id="signup_blood_group">
				<option value="<?php echo $_SESSION['current_user_blood_group']; ?>"><?php echo $_SESSION['current_user_blood_group']; ?></option>
			</select>
		</div>
		<div class="form-group">
			<label for="signup_gender"><b>Gender :</b></label>
			<select name="signup_gender" id="signup_gender">
				<option value="<?php echo $_SESSION['current_user_gender']; ?>"><?php echo $_SESSION['current_user_gender']; ?></option>
			</select>
		</div>
		<div class="form-group">
			<label for="signup_birthday"><b>Date of Birth :</b></label>
			<input type="text" name="signup_birthday" id="signup_birthday" value="<?php echo $_SESSION['current_user_birthday']; ?>">
		</div>
		<div class="form-group">
			<label for="signup_donating_status"><b>Donating Status :</b></label>
			<select name="signup_donating_status" id="signup_donating_status">
				<option value="Not Selected">Choose One</option>
				<option value="Can Donate">Can Donate</option>
				<option value="Can not Donate now">Can not Donate now</option>
			</select>
		</div>
		<div class="form-group">
			<label for="signup_address"><b>Current address*</b></label>
			<input type="text" name="signup_address" class="form-control" id="signup_address" value="<?php echo $_SESSION['current_user_address']; ?>">
		</div>
		<div class="form-group">
			<input type="submit" name="update" class="btn btn-primary btn-lg btn-block" value="Update">
		</div>
	</form>
</div>