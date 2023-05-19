<?php 
include 'database/db.php';
if (!isset($_SESSION['admin_email'])) {
	echo "<script>window.location.href = '../login';</script>";
}
if (isset($_POST['log'])) {
	session_destroy();
	echo "<script>window.location.href = '../login';</script>";

}
date_default_timezone_set("Asia/Manila");
?>

<!DOCTYPE html>
<html>
<head>
	<title>System Logs</title>
	<meta charset="utf-8">
	<link rel="icon" href="img/gad logo.jpg">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../css/a-sys.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/datetime/1.1.2/css/dataTables.dateTime.min.css">

	<script src="../js/sweetalert2.all.min.js"></script>
</head>

<body>

	<!------ Include the above in your HEAD tag ---------->
	<div id="wrapper">

		<?php include "plugins/sidebar-topside.php"?>
		<!-- /#sidebar-wrapper -->


		<!-- Page Content -->
		<div id="page-content-wrapper">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-12">
						<a href="#menu-toggle" class="btn btn-default" id="menu-toggle">
							☰
						</a>
						<!-- body -->
						<br><br><br>

						<div class="container">
							<div class="row">
								<div class="col-md-11">
									<nav class="navbar">
										<div class="container-fluid">
											<div class="navbar-header">
												<a class="navbar-brand" href="" style="color:black">System Logs</a>
											</div>
											<span class="navbar-right"> 
												<ul class="nav navbar-nav">
													<li data-toggle="modal" data-target="#viewSystemlogs"><a href="#">All System Logs</a></li>
													<li data-toggle="modal" data-target="#select_range"><a href="#">Select Range</a></li>
												</ul>
												<form class="navbar-form navbar-right">
													<div class="form-group">
													</div>
												</form>
											</span>
										</div>
									</nav>	
									<hr style="border: 1px solid gray;">

									<!-- start of message content -->

									<h3>Recent System Changes</h3>
									<div class="table-responsive" >

										<?php if(isset($_GET['min'])){
											$min = $_GET['min'];
											$max = $_GET['max'];
											?>
											<table class="table table-striped table-responsive" id="logsToday">
												<thead class="thead list-msg">
													<tr >
														<th>Field</th>
														<th>Username</th>
														<th>Date Created</th>
														<th>Description</th>
													</tr>
												</thead>
												<tbody  id="myTable">
													<?php 
													$sql_range = "SELECT * from systemlogs WHERE date_created BETWEEN '$min' AND '$max'";
													$result = mysqli_query($db, $sql_range);
													if($result->num_rows > 0){
														while($row = $result->fetch_assoc()){?>


															<tr>
																<td><?php echo $row['field'];?></td>
																<td><?php echo $row['name'];?></td>														
																<td><?php echo $row['date_created'];?></td>
																<td><?php echo $row['description'];?></td>
															</tr>

														<?php }
													}?>

												</tbody>
											</table>
											<?php 
										}else{
											?>
									<p>This contains the changes happened in <?php echo date('M-d-Y')?>. </p>
											<table class="table table-striped table-responsive" id="logsToday">
												<thead class="thead list-msg">
													<tr >
														<th>Field</th>
														<th>Username</th>
														<th>Date Created</th>
														<th>Description</th>
													</tr>
												</thead>
												<tbody  id="myTable">
													<?php 
													$date_today = date('Y-m-d');
													$add_cred = "SELECT *	FROM systemlogs where date_created like '%$date_today%' ORDER BY date_created DESC";

													$result = mysqli_query($db, $add_cred);
													if ($result->num_rows  > 0) {
														while($row = $result->fetch_assoc()){
															?>
															<tr>
																<td><?php echo $row['field'];?></td>
																<td><?php echo $row['name'];?></td>														
																<td><?php echo $row['date_created'];?></td>
																<td><?php echo $row['description'];?></td>
															</tr>

															<?php 
														}
													}else {
														?><h5>No changes as of today.</h5><?php
													}
													?>
												</tbody>
											</table>

										<?php } ?>
									</div>		
									<!-- end of message content -->
								</div>
							</div>
						</div>
					</div>
				</div>

				<!-- Modal -->
				<div id="viewSystemlogs" class="modal fade" role="dialog">
					<div class="modal-dialog"  style="width: 100%;">
						<!-- Modal content-->
						<div class="modal-content" >
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">All System Logs</h4>
							</div>
							<div class="modal-body" >
								<div class="table-responsive" >            
									<table class="table table-striped table-responsive" id="allLogs">
										<thead class="thead list-msg">
											<tr >
												<th>Field</th>
												<th>Username</th>
												<th>Date Created</th>
												<th>Description</th>
											</tr>
										</thead>
										<tbody  id="myTable">
											<?php 
											$date_today = date('M-d-Y');
											$add_cred = "SELECT *	FROM systemlogs ORDER BY date_created DESC";

											$result = mysqli_query($db, $add_cred);
											if ($result->num_rows  > 0) {
												while($row = $result->fetch_assoc()){
													?>
													<tr>
														<td><?php echo $row['field'];?></td>
														<td><?php echo $row['name'];?></td>														
														<td><?php echo $row['date_created'];?></td>
														<td><?php echo $row['description'];?></td>
													</tr>
													<?php 
												}
											}else {
												?><h5>No changes as of today.</h5><?php
											}
											?>
										</tbody>
									</table>
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							</div>
						</div>
					</div>
				</div>

				<!-- Modal -->
				<div id="select_range" class="modal fade" role="dialog">
					<div class="modal-dialog">
						<!-- Modal content-->
						<div class="modal-content" >
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Select Range</h4>
							</div>
							<div class="modal-body" >
								
								<form method="GET">
									<div class="form-group">
										<label for="min">From:</label>
										<input type="date" required id="min" class="form-control" name="min">
									</div>
									<div class="form-group">
										<label for="max">To:</label>
										<input type="date" id="max" required class="form-control" name="max">
									</div>
									<input type="submit" class="btn btn-primary" value="SEARCH">
								</form>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							</div>
						</div>
					</div>
				</div>
				<!-- end of body -->
			</div>
		</div>

		<!-- /#page-content-wrapper -->
	</div>

	<!-- /#wrapper -->
	<!-- Menu Toggle Script -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.5/datatables.min.js"></script>
	<script>


		jQuery(document).ready(function($) {
			$('#logsToday').DataTable( {

			});
		});
		jQuery(document).ready(function($) {
			$('#allLogs').DataTable( {

			});
		});


		$("#menu-toggle").click(function(e) {
			e.preventDefault();
			$("#wrapper").toggleClass("toggled");
		});
		function upNewsEvent(){
			Swal.fire(
				'Update Complete!',
				'Updating data is complete!',
				'success'

				);
		}
	</script>



</body>
</html>
