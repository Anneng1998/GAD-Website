<?php 
ob_start();
session_start();
?>

<?php 
include "../plugins/db.php";
if (!isset($_SESSION['admin_email'])) {
	echo "<script>window.location.href = '../login';</script>";
}else{
	date_default_timezone_set("Asia/Manila");
	$admin_email = $_SESSION['admin_email'];
	$add_cred = "SELECT * from admin_account where admin_email='$admin_email'";
	$result = mysqli_query($db, $add_cred);
	if ($result->num_rows  > 0) {
		while($row = $result->fetch_assoc()){
			$_SESSION['admin_name'] = $row['admin_name'];
		}
	}
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
	<link rel="icon" href="../img/logo.jpg">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../css/a-edit-arch.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.11.5/datatables.min.css" />
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

						<?php 
						if (isset($_GET['type'])&&isset($_GET['ID'])&&isset($_GET['status'])) {
							$type = $_GET['type'];
							$ID = $_GET['ID'];
							$status = $_GET['status'];
							$app_status = "CANCELLED";
							$new_status = "ACTIVE";
							$ret_msg_status = "RETRIEVED MSG";
							$admin_name = $_SESSION['admin_name'];
							$admin_email = $_SESSION['admin_email'];
							$date_created = date("Y-m-d h:i:sa");

							if($type=="Appointment"&&$status=="RETRIEVE"){
								$retrieve = $db->prepare("UPDATE appointments SET status=? WHERE RFN=?");
								$retrieve->bind_param('ss', $app_status, $ID);
								$retrieve->execute();
								$field = "APPOINTMENT";
								$description = "Restored Appointment Information of <br><a href='view-appointment?view-appointment=$ID'>$ID</a><br><a href='history?ID=$ID'>View History</a>";
								$syslog = $db->prepare('INSERT INTO systemlogs (name, email, date_created, uniqueID, field, description)VALUES(?,?,?,?,?,?)');
								$syslog->bind_param('ssssss', $admin_name, $admin_email, $date_created, $ID, $field, $description );
								$syslog->execute();
								echo "<script>window.location.href='view-archive?type=$type'</script>";
							}else if($type=="Doctor"&&$status=="RETRIEVE"){
								$retrieve = $db->prepare("UPDATE doc_info SET status=? WHERE doc_rfn=?");
								$retrieve->bind_param('ss', $new_status, $ID);
								$retrieve->execute();
								$field = "DOCTOR";
								$description = "Restored Doctor Information of <br>$ID<br><a href='history?ID=$ID'>View History</a>";
								$syslog = $db->prepare('INSERT INTO systemlogs (name, email, date_created, uniqueID, field, description)VALUES(?,?,?,?,?,?)');
								$syslog->bind_param('ssssss', $admin_name, $admin_email, $date_created, $ID, $field, $description );
								$syslog->execute();
								echo "<script>window.location.href='view-archive?type=$type'</script>";
							}else if($type=="Department"&&$status=="RETRIEVE"){
								$retrieve = $db->prepare("UPDATE departments SET status=? WHERE dept_rfn=?");
								$retrieve->bind_param('ss', $new_status, $ID);
								$retrieve->execute();
								$field = "DEPARTMENT";
								$description = "Restored Department Information of <br>$ID<br><a href='history?ID=$ID'>View History</a>";
								$syslog = $db->prepare('INSERT INTO systemlogs (name, email, date_created, uniqueID, field, description)VALUES(?,?,?,?,?,?)');
								$syslog->bind_param('ssssss', $admin_name, $admin_email, $date_created, $ID, $field, $description );
								$syslog->execute();
								echo "<script>window.location.href='view-archive?type=$type'</script>";
							}else if($type=="Department_Info"&&$status=="RETRIEVE"){
								$retrieve = $db->prepare("UPDATE departments_info SET status=? WHERE dept_service=?");
								$retrieve->bind_param('ss', $new_status, $ID);
								$retrieve->execute();
								$field = "DEPARTMENT INFO";
								$description = "Restored Department Info Information of <br>$ID<br><a href='history?ID=$ID'>View History</a>";
								$syslog = $db->prepare('INSERT INTO systemlogs (name, email, date_created, uniqueID, field, description)VALUES(?,?,?,?,?,?)');
								$syslog->bind_param('ssssss', $admin_name, $admin_email, $date_created, $ID, $field, $description );
								$syslog->execute();
								echo "<script>window.location.href='view-archive?type=$type'</script>";
							}else if($type=="Hospital_News"&&$status=="RETRIEVE"){
								$retrieve = $db->prepare("UPDATE newsupdates SET status=? WHERE news_title=?");
								$retrieve->bind_param('ss', $new_status, $ID);
								$retrieve->execute();
								$field = "HOSPITAL NEWS";
								$description = "Restored Hospital News Information of <br>$ID<br><a href='history?ID=$ID'>View History</a>";
								$syslog = $db->prepare('INSERT INTO systemlogs (name, email, date_created, uniqueID, field, description)VALUES(?,?,?,?,?,?)');
								$syslog->bind_param('ssssss', $admin_name, $admin_email, $date_created, $ID, $field, $description );
								$syslog->execute();
								echo "<script>window.location.href='view-archive?type=$type'</script>";
							}else if($type=="Hospital_Events"&&$status=="RETRIEVE"){
								$retrieve = $db->prepare("UPDATE events SET status=? WHERE event_title=?");
								$retrieve->bind_param('ss', $new_status, $ID);
								$retrieve->execute();
								$field = "HOSPITAL EVENT";
								$description = "Restored Hospital Event Information of <br>$ID<br><a href='history?ID=$ID'>View History</a>";
								$syslog = $db->prepare('INSERT INTO systemlogs (name, email, date_created, uniqueID, field, description)VALUES(?,?,?,?,?,?)');
								$syslog->bind_param('ssssss', $admin_name, $admin_email, $date_created, $ID, $field, $description );
								$syslog->execute();
								echo "<script>window.location.href='view-archive?type=$type'</script>";
							}else if($type=="Messages"&&$status=="RETRIEVE"){
								$retrieve = $db->prepare("UPDATE patient_concern SET msg_status=? WHERE concern_id=?");
								$retrieve->bind_param('ss', $ret_msg_status, $ID);
								$retrieve->execute();
								$field = "MESSAGES";
								$description = "Restored Message Information of <br>$ID<br><a href='history?ID=$ID'>View History</a>";
								$syslog = $db->prepare('INSERT INTO systemlogs (name, email, date_created, uniqueID, field, description)VALUES(?,?,?,?,?,?)');
								$syslog->bind_param('ssssss', $admin_name, $admin_email, $date_created, $ID, $field, $description );
								$syslog->execute();
								echo "<script>window.location.href='view-archive?type=$type'</script>";
							}

							// for permanently deletion

							if($type=="Appointment"&&$status=="DELETE"){
								$retrieve = $db->prepare("DELETE FROM appointments WHERE RFN=?");
								$retrieve->bind_param('s', $ID);
								$retrieve->execute();
								$field = "APPOINTMENT";
								$description = "Permanently Deleted Appointment Information of <br>$ID<br><a href='history?ID=$ID'>View History</a>";
								$syslog = $db->prepare('INSERT INTO systemlogs (name, email, date_created, uniqueID, field, description)VALUES(?,?,?,?,?,?)');
								$syslog->bind_param('ssssss', $admin_name, $admin_email, $date_created, $ID, $field, $description );
								$syslog->execute();
								echo "<script>window.location.href='view-archive?type=$type'</script>";
							}else if($type=="Doctor"&&$status=="DELETE"){
								$retrieve = $db->prepare("DELETE FROM doc_info WHERE doc_rfn=?");
								$retrieve->bind_param('s', $ID);
								$retrieve->execute();
								$field = "DOCTOR";
								$description = "Permanently Deleted  Doctor Information of <br>$ID<br><a href='history?ID=$ID'>View History</a>";
								$syslog = $db->prepare('INSERT INTO systemlogs (name, email, date_created, uniqueID, field, description)VALUES(?,?,?,?,?,?)');
								$syslog->bind_param('ssssss', $admin_name, $admin_email, $date_created, $ID, $field, $description );
								$syslog->execute();
								echo "<script>window.location.href='view-archive?type=$type'</script>";
							}else if($type=="Department"&&$status=="DELETE"){
								$retrieve = $db->prepare("DELETE FROM departments WHERE dept_rfn=?");
								$retrieve->bind_param('s', $ID);
								$retrieve->execute();
								$field = "DEPARTMENT";
								$description = "Permanently Deleted  Department Information of <br>$ID<br><a href='history?ID=$ID'>View History</a>";
								$syslog = $db->prepare('INSERT INTO systemlogs (name, email, date_created, uniqueID, field, description)VALUES(?,?,?,?,?,?)');
								$syslog->bind_param('ssssss', $admin_name, $admin_email, $date_created, $ID, $field, $description );
								$syslog->execute();
								echo "<script>window.location.href='view-archive?type=$type'</script>";
							}else if($type=="Department_Info"&&$status=="DELETE"){
								$retrieve = $db->prepare("DELETE FROM departments_info WHERE dept_service=?");
								$retrieve->bind_param('s' , $ID);
								$retrieve->execute();
								$field = "DEPARTMENT INFO";
								$description = "Permanently Deleted  Department Info Information of <br>$ID<br><a href='history?ID=$ID'>View History</a>";
								$syslog = $db->prepare('INSERT INTO systemlogs (name, email, date_created, uniqueID, field, description)VALUES(?,?,?,?,?,?)');
								$syslog->bind_param('ssssss', $admin_name, $admin_email, $date_created, $ID, $field, $description );
								$syslog->execute();
								echo "<script>window.location.href='view-archive?type=$type'</script>";
							}else if($type=="Hospital_News"&&$status=="DELETE"){
								$retrieve = $db->prepare("DELETE FROM newsupdates WHERE news_title=?");
								$retrieve->bind_param('s', $ID);
								$retrieve->execute();
								$field = "HOSPITAL NEWS";
								$description = "Permanently Deleted Hospital News Information of <br>$ID<br><a href='history?ID=$ID'>View History</a>";
								$syslog = $db->prepare('INSERT INTO systemlogs (name, email, date_created, uniqueID, field, description)VALUES(?,?,?,?,?,?)');
								$syslog->bind_param('ssssss', $admin_name, $admin_email, $date_created, $ID, $field, $description );
								$syslog->execute();
								echo "<script>window.location.href='view-archive?type=$type'</script>";
							}else if($type=="Hospital_Events"&&$status=="DELETE"){
								$retrieve = $db->prepare("DELETE FROM events WHERE event_title=?");
								$retrieve->bind_param('s' , $ID);
								$retrieve->execute();
								$field = "HOSPITAL EVENT";
								$description = "Permanently Deleted  Hospital Event Information of <br>$ID<br><a href='history?ID=$ID'>View History</a>";
								$syslog = $db->prepare('INSERT INTO systemlogs (name, email, date_created, uniqueID, field, description)VALUES(?,?,?,?,?,?)');
								$syslog->bind_param('ssssss', $admin_name, $admin_email, $date_created, $ID, $field, $description );
								$syslog->execute();
								echo "<script>window.location.href='view-archive?type=$type'</script>";
							}else if($type=="Messages"&&$status=="DELETE"){
								$retrieve = $db->prepare("DELETE FROM patient_concern WHERE concern_id=?");
								$retrieve->bind_param('s', $ID);
								$retrieve->execute();
								$field = "MESSAGES";
								$description = "Permanently Deleted  Message Information of <br>$ID<br><a href='history?ID=$ID'>View History</a>";
								$syslog = $db->prepare('INSERT INTO systemlogs (name, email, date_created, uniqueID, field, description)VALUES(?,?,?,?,?,?)');
								$syslog->bind_param('ssssss', $admin_name, $admin_email, $date_created, $ID, $field, $description );
								$syslog->execute();
								echo "<script>window.location.href='view-archive?type=$type'</script>";
							}


						}

						

						?>

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
										<div class="table-responsive" >            	
										</div>
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




		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
		<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.5/datatables.min.js"></script>
		<script>
			jQuery(document).ready(function($) {
				$('#view-arch').DataTable( {

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
		<script src="../js/js-patient.js"></script>


	</body>
	</html>