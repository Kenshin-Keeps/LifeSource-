<?php include 'db.php'; ?>
<div class="container mt-3">
	<div class="jumbotron text-center ">
		<h1 class="display-4"><b>See Your Requests!</b></h1>
		<p class="lead"><strong>Here you can see and manage the requests you have created.</strong></p>
		<hr class="my-4">
	</div>


	<?php
	// $current_user_id = $_SESSION['current_user_id']; $query=  "SELECT * FROM requests ORDER BY request_id DESC";
	$query = "SELECT * FROM requests WHERE request_user_id = {$_SESSION['current_user_id']} ORDER BY request_id DESC";

	$current_user_request_query = mysqli_query($connection, $query);
	if ($current_user_request_query && mysqli_num_rows($current_user_request_query) > 0) {
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
					<th scope="col">Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$sl = 0;
				while ($row = mysqli_fetch_assoc($current_user_request_query)) {
					# code...
					$request_id = $row['request_id'];
					$pname = $row['request_patient_name'];
					$pcontact = $row['request_contact_no'];
					$pgroup = $row['request_blood_group'];
					$pplace = $row['request_place'];
					$preason = $row['request_reason'];
					$pdate = $row['request_meet_date'];
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
					echo "<td><a class='btn btn-sm btn-light' href='home.php?source=myrequest&action=delete&id=$request_id'>Delete</a></td>";
					echo "</tr>";
				}
				?>
			</tbody>
		</table>
		<?php
		if (isset($_GET['action'])) {
			# code...
			$id = $_GET['id'];
			$query = "DELETE FROM requests WHERE request_id = {$id}";

			$delete_current_user_request_query = mysqli_query($connection, $query);

			header("Location:home.php?source=myrequest");
		}
	} else {
		?>
		<p class="query-failed">You haven't made any request! </p>
	<?php
	}
	?>
</div>