<div class="container mt-3">
	<div class="jumbotron text-center ">
		<h1 class="display-4"><b>Welcome, <?php echo $_SESSION['current_user_name']; ?>!</b></h1>
		<p class="lead"><strong>Here is the list of the request for emergency Blood Supply.</strong></p>
		<hr class="my-4">
		<p>Most recent requests are on the top of the table.</p>

	</div>

	<?php

	$query =  "SELECT * FROM requests WHERE request_meet_date >= cast(now() as date) ORDER BY request_id DESC";

	// $query = "SELECT * FROM requests";

	$get_all_request_query = mysqli_query($connection, $query);
	if ($get_all_request_query && mysqli_num_rows($get_all_request_query) > 0) {
	?>
		<table class="table table-hover mt-3 table-bordered table-striped text-center">
			<thead class="thead-dark">
				<tr>
					<th scope="col">SL no.</th>
					<th scope="col">Patient Name</th>
					<th scope="col">Contact</th>
					<th scope="col">Blood Group</th>
					<th scope="col">Place</th>
					<th scope="col">Reason</th>
					<th scope="col">On Date</th>
					<th scope="col">Requested By</th>
				</tr>
			</thead>
			<tbody>
				<?php
				// $get_all_request_query = mysqli_query($connection, $query);
				$sl = 0;
				$currentDate = new DateTime();
				while ($row = mysqli_fetch_assoc($get_all_request_query)) {

					$retrivedDate = new DateTime($row['request_meet_date']);
					if ($retrivedDate >= $currentDate) {
						$pname = $row['request_patient_name'];
						$pcontact = $row['request_contact_no'];
						$pgroup = $row['request_blood_group'];
						$pplace = $row['request_place'];
						$preason = $row['request_reason'];
						$pdate = $row['request_meet_date'];
						$pby = $row['request_user_name'];
						$sl++;

						# code...
						echo "<tr>";
						echo "<th scope='row'>$sl</th>";
						echo "<td>$pname</td>";
						echo "<td>0$pcontact</td>";
						echo "<td>$pgroup</td>";
						echo "<td>$pplace</td>";
						echo "<td>$preason</td>";
						echo "<td>$pdate</td>";
						echo "<td>$pby</td>";
						echo "</tr>";
					}
				}
				?>
			</tbody>
		</table>
	<?php
	} else {
	?>
		<p class="query-failed">Currently no information available!</p>
	<?php
	}
	?>
</div>