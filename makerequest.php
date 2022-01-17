<div class="container mt-3">
	<div class="jumbotron text-center ">
		<h1 class="display-4"><b>Create A Request!</b></h1>
		<p class="lead"><strong>Here you can create a request for emergency Blood Supply.</strong></p>
		<hr class="my-4">
		<p>Please read the instructions carefully and fill the form correctly so that others can find your request easily.</p>
	</div>
	<form class="formstyle3 mt-2" method="post">
		<fieldset>

			<?php

			if (isset($_POST['request_submit'])) {
				# code...

				$current_user_id = $_SESSION['current_user_id'];
				$current_user_name = $_SESSION['current_user_name'];
				$patient_name = $_POST['request_name'];
				$contact_no = $_POST['request_phone'];
				$request_group = $_POST['request_blood_group'];
				$request_place = $_POST['request_place'];
				$request_reason = $_POST['request_reason'];
				$request_date = $_POST['Request_date'];

				if (empty($patient_name) || empty($contact_no) || empty($request_group) || empty($request_place) || empty($request_reason) || empty($request_date)) {

					echo "'*''-marked content must be filled";
				} else {

					$query = "INSERT INTO requests(request_user_id,	request_user_name,request_patient_name,request_contact_no,request_blood_group,request_place,request_reason,request_meet_date) VALUES({$current_user_id},'{$current_user_name}','{$patient_name}',{$contact_no},'{$request_group}','{$request_place}','{$request_reason}','{$request_date}')";

					$add_request_query = mysqli_query($connection, $query);
					header("Location:home.php");
				}
			}

			?>



			<div class="form-group">
				<label for="request_name"><b>Patient Name*</b></label>
				<input type="text" name="request_name" class="form-control" id="request_name" placeholder="Enter name...">
			</div>
			<div class="form-group">
				<label for="request_phone"><b>Contact No.*</b></label>
				<input type="text" name="request_phone" class="form-control" id="request_phone" placeholder="Enter Phone No...">
			</div>
			<div class="form-group">
				<label for="request_blood_group"><b>Blood Group :*</b></label>
				<select name="request_blood_group" id="request_blood_group">
					<option value="None">Choose One</option>
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
				<label for="request_place"><b>Place*</b></label>
				<input type="text" name="request_place" class="form-control" id="request_place" placeholder="Enter Place...">
			</div>
			<div class="form-group">
				<label for="request_reason"><b>Reason*</b></label>
				<select name="request_reason" id="request_reason">
					<option value="None">Choose One</option>
					<option value="Operation">Operation</option>
					<option value="Child_birth">Child Birth</option>
					<option value="Accident">Accident</option>
					<option value="Pregnancy">Pregnancy</option>
					<option value="Illness">Illness</option>
					<option value="Others">Others</option>
				</select>
			</div>
			<div class="form-group">
				<label for="Request_date"><b>On Which Date*</b></label>
				<input type="date" name="Request_date" id="Request_date">
			</div>
			<div class="form-group">
				<input type="submit" name="request_submit" class="btn btn-primary btn-lg btn-block" value="Submit Request">
			</div>
		</fieldset>
	</form>
</div>