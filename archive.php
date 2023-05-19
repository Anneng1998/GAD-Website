<?php 
ob_start();
session_start();
?>

<?php 
include "../plugins/db.php";
if (!isset($_SESSION['admin_email'])) {
	echo "<script>window.location.href = '../login';</script>";
}
if (isset($_POST['log'])) {
	session_destroy();
	echo "<script>window.location.href = '../login';</script>";

}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin | Archive</title>
	<meta charset="utf-8">
	<link rel="icon" href="img/gad logo.jpg">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../css/a-archive.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<script src="../js/sweetalert2.all.min.js"></script>
</head>

<body onload="display_ct6();">

	<!------ Include the above in your HEAD tag ---------->

	<div id="wrapper">

		<!-- Sidebar -->
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
												<a class="navbar-brand" href="" style="color:black">Archives</a>
											</div>
											<span class="navbar-right"> 
												<ul class="nav navbar-nav">
													<li data-toggle="modal" data-target="#"><a href="#"></a></li>
													<li data-toggle="modal" data-target="#viewDoc"><a href="#"></a></li>
												</ul>
												<form class="navbar-form navbar-right">
													<div class="form-group">
													</div>
												</form>
											</span>
										</div>
									</nav>	
									<hr style="border: 1px solid gray;">

									<div class="row">
										<a href="view-archive?type=Appointments" id="app_link">
											<div class="col-md-3" >
												<div class="box" style=" background:#335e90;">
													<legend  style="border-bottom: 1px solid white; color: white;font-size: 14px;">Appointments</legend>
													<div style=" margin-top: -20px;">
														<?php 
														$ARCHIVED = "ARCHIVED";
														$sql = $db->prepare("SELECT COUNT(RFN) AS c FROM appointments WHERE status = ?");
														$sql->bind_param('s', $ARCHIVED);
														$sql->execute();
														$result = $sql->get_result();
														?> 
														<?php while($row = $result->fetch_assoc()){
															?>
															<span style='font-size:70px;font-weight:bold; color:white;'><?php echo $row['c']?></span>
															<?php  
															if ($row['c']>1) {
																echo "<span style='color:white'>Archived Files</span>";
															}else {
																echo "<span style='color:white'>Archived File</span>";
															}
															?>
														<?php } 
														?>
													</div>
												</div>
											</div>
										</a>
										<a href="view-archive?type=Doctor" id="app_link">
											<div class="col-md-3" >
												<div class="box" style=" background:#335e90;">
													<legend  style="border-bottom: 1px solid white; color: white;font-size: 14px;">Doctors</legend>
													<div style=" margin-top: -20px;">
														<?php 

														$ARCHIVED = "ARCHIVED";
														$sql = $db->prepare("SELECT COUNT(doc_rfn) AS c FROM doc_info WHERE status = ?");
														$sql->bind_param('s', $ARCHIVED);
														$sql->execute();
														$result = $sql->get_result();
														?> 
														<?php while($row = $result->fetch_assoc()){
															?>
															<span style='font-size:70px;font-weight:bold; color:white;'><?php echo $row['c']?></span>
															<?php  
															if ($row['c']>1) {
																echo "<span style='color:white'>Archived Files</span>";
															}else {
																echo "<span style='color:white'>Archived File</span>";
															}
															?>
														<?php } 
														?>
													</div>
												</div>
											</div>
										</a>
										<a href="view-archive?type=Department" id="app_link">
											<div class="col-md-3" >
												<div class="box" style=" background:#335e90;">
													<legend  style="border-bottom: 1px solid white; color: white;font-size: 14px;">Departments</legend>
													<div style=" margin-top: -20px;">
														<?php 

														$ARCHIVED = "ARCHIVED";
														$sql = $db->prepare("SELECT COUNT(dept_rfn) AS c FROM departments WHERE status = ?");
														$sql->bind_param('s', $ARCHIVED);
														$sql->execute();
														$result = $sql->get_result();
														?> 
														<?php while($row = $result->fetch_assoc()){
															?>
															<span style='font-size:70px;font-weight:bold; color:white;'><?php echo $row['c']?></span>
															<?php  
															if ($row['c']>1) {
																echo "<span style='color:white'>Archived Files</span>";
															}else {
																echo "<span style='color:white'>Archived File</span>";
															}
															?>
														<?php } 
														?>
													</div>
												</div>
											</div>
										</a>
										<a href="view-archive?type=Department_Info" id="app_link">
											<div class="col-md-3" >
												<div class="box" style=" background:#335e90;">
													<legend  style="border-bottom: 1px solid white; color: white;font-size: 14px;">Department Services</legend>
													<div style=" margin-top: -20px;">
														<?php 

														$ARCHIVED = "ARCHIVED";
														$sql = $db->prepare("SELECT COUNT(dept_name) AS c FROM departments_info WHERE status = ?");
														$sql->bind_param('s', $ARCHIVED);
														$sql->execute();
														$result = $sql->get_result();
														?> 
														<?php while($row = $result->fetch_assoc()){
															?>
															<span style='font-size:70px;font-weight:bold; color:white;'><?php echo $row['c']?></span>
															<?php  
															if ($row['c']>1) {
																echo "<span style='color:white'>Archived Files</span>";
															}else {
																echo "<span style='color:white'>Archived File</span>";
															}
															?>
														<?php } 
														?>
													</div>
												</div>
											</div>
										</a>
										<a href="view-archive?type=Hospital_News" id="app_link">
											<div class="col-md-3" >
												<div class="box" style=" background:#335e90;">
													<legend  style="border-bottom: 1px solid white; color: white;font-size: 14px;">Hospital News</legend>
													<div style=" margin-top: -20px;">
														<?php 

														$ARCHIVED = "ARCHIVED";
														$sql = $db->prepare("SELECT COUNT(news_title) AS c FROM newsupdates WHERE status = ?");
														$sql->bind_param('s', $ARCHIVED);
														$sql->execute();
														$result = $sql->get_result();
														?> 
														<?php while($row = $result->fetch_assoc()){
															?>
															<span style='font-size:70px;font-weight:bold; color:white;'><?php echo $row['c']?></span>
															<?php  
															if ($row['c']>1) {
																echo "<span style='color:white'>Archived Files</span>";
															}else {
																echo "<span style='color:white'>Archived File</span>";
															}
															?>
														<?php } 
														?>
													</div>
												</div>
											</div>
										</a>
										<a href="view-archive?type=Hospital_Events" id="app_link">
											<div class="col-md-3" >
												<div class="box" style=" background:#335e90;">
													<legend  style="border-bottom: 1px solid white; color: white;font-size: 14px;">Hospital Events</legend>
													<div style=" margin-top: -20px;">
														<?php 


														$ARCHIVED = "ARCHIVED";
														$sql = $db->prepare("SELECT COUNT(event_title) AS c FROM events WHERE status = ?");
														$sql->bind_param('s', $ARCHIVED);
														$sql->execute();
														$result = $sql->get_result();
														?> 
														<?php while($row = $result->fetch_assoc()){
															?>
															<span style='font-size:70px;font-weight:bold; color:white;'><?php echo $row['c']?></span>
															<?php  
															if ($row['c']>1) {
																echo "<span style='color:white'>Archived Files</span>";
															}else {
																echo "<span style='color:white'>Archived File</span>";
															}
															?>
														<?php } 
														?>
													</div>
												</div>
											</div>
										</a>
										<a href="view-archive?type=Messages" id="app_link">
											<div class="col-md-3" >
												<div class="box" style=" background:#335e90;">
													<legend  style="border-bottom: 1px solid white; color: white;font-size: 14px;">Messages</legend>
													<div style=" margin-top: -20px;">
														<?php 

														$ARCHIVED = "ARCHIVED";
														$sql = $db->prepare("SELECT COUNT(concern_id) AS c FROM patient_concern WHERE msg_status = ?");
														$sql->bind_param('s', $ARCHIVED);
														$sql->execute();
														$result = $sql->get_result();
														?> 
														<?php while($row = $result->fetch_assoc()){
															?>
															<span style='font-size:70px;font-weight:bold; color:white;'><?php echo $row['c']?></span>
															<?php  
															if ($row['c']>1) {
																echo "<span style='color:white'>Archived Files</span>";
															}else {
																echo "<span style='color:white'>Archived File</span>";
															}
															?>
														<?php } 
														?>
													</div>
												</div>
											</div>
										</a>
										
									</div>
								</div>
							</div>	
							<!-- end of body -->

						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- /#page-content-wrapper -->


		<!-- /#wrapper -->
		<!-- Menu Toggle Script -->





		<script>
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
		<script src="../js/js-patient.js"></script>


	</body>
	</html>