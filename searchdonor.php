<div class="container mt-4">
	<div class="jumbotron text-center ">
		<h1 class="display-4"><b>Make A Search</b></h1>
		<p class="lead"><strong>Search For Donor by selecting Blood Group And Place.</strong></p>
		<hr class="my-4">
		<p>Search result wil appear as a structure of table.</p>
	</div>
</div>

<div class="container mt-4">
	<form method="post" class="formstyle3">
		<fieldset>
			<legend><b>Search Box :</b></legend>
			<div>
				<label for="search_blood_group"><b>Blood Group :</b></label>
				<select name="search_blood_group" id="search_blood_group">
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
			<div>
				<label for="search_address"><b>Place :</b></label>
				<input type="text" name="search_address" class="form-control" id="search_address" placeholder="Enter current address..">
			</div>
			<br>
			<div align="right">
				<input type="submit" name="search_submit" class="btn btn-primary btn-lg btn-block" value="Search">
			</div>
		</fieldset>
	</form>
</div>

<div class="container mt-4">

	<?php

	if (isset($_POST['search_submit'])) {
		# code...
		$search_group = $_POST['search_blood_group'];
		$search_address = $_POST['search_address'];

		$loweraddress = strtolower($search_address);
		$upperaddress = strtoupper($search_address);
		$Word_Initial_Letter_Capital = ucwords($search_address);

		$status = "Can Donate";

	?>

		<!-- SET THE TABLE STRUCTURE HERE -->
		<?php

		$query = "SELECT * FROM donors WHERE (d_b_g = '$search_group') AND (d_status = '$status') AND(d_address LIKE '%$loweraddress%' OR d_address LIKE '%$upperaddress%' OR d_address LIKE '%$Word_Initial_Letter_Capital%')";

		$search_donor_query = mysqli_query($connection, $query);

		if ($search_donor_query && mysqli_num_rows($search_donor_query) > 0) {
		?>
			<table class="table table-hover mt-3 table-bordered table-striped text-center">
				<thead class="thead-dark">
					<tr>
						<th scope="col">SL no.</th>
						<th scope="col">Donor Name</th>
						<th scope="col">Blood Group</th>
						<th scope="col">Contact No.</th>
						<th scope="col">Gender</th>
						<th scope="col">Address</th>
					</tr>
				</thead>
				<tbody>
					<?php

					$sl = 0;
					while ($row = mysqli_fetch_assoc($search_donor_query)) {
						# code...
						$name = $row['d_name'];
						$bloodGroup = $row['d_b_g'];
						$contact = $row['d_contact'];
						$gender = $row['d_gender'];
						$address = $row['d_address'];
						$sl++;

						// PUT THE INFO IN TABLE HERE

						echo "<tr>";
						echo "<th scope='row'>$sl</th>";
						echo "<td>$name</td>";
						echo "<td>$bloodGroup</td>";
						echo "<td>$contact</td>";
						echo "<td>$gender</td>";
						echo "<td>$address</td>";
						echo "</tr>";
					}
					?>
				</tbody>
			</table>
		<?php
		} else {
		?>
			<p class="query-failed">Sorry, Your requirement doesn't match with any available donor!</p>
	<?php
		}
	}
	?>
</div>