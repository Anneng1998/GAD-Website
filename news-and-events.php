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
	<title>ADMIN | News and Events</title>
	<meta charset="utf-8">
	<link rel="icon" href="img/logo.jpg">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../css/a-nae.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<script src="../js/sweetalert2.all.min.js"></script>
</head>

<body>

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
						<?php
						date_default_timezone_set("Asia/Manila");
						if(isset($_POST['add-news'])){
							$status = 'ACTIVE';
							$UID = uniqid("News-");
							$news_title = $_POST['news_title'];
							$news_desc = $_POST['news_desc'];
							$news_vid_link = $_POST['news_vid_link'];
							$date = date('M-d-Y');
							$stmt = $db->prepare("SELECT * from newsupdates where news_title=?");
							$stmt->bind_param('s',$news_title);
							if($stmt->execute()){
								$result = $stmt->get_result();
								if($result->num_rows>0){
									echo "<script>
									$(document).ready(function() {
										newsExist();
										});    
										</script>";
									}else{


										$stmt = $db->prepare("INSERT INTO tbl_news (news_title, news_date, news_desc, news_vid_link, status) VALUES (?,?,?,?,?)");
										$stmt->bind_param('sssss', $news_title, $date, $news_desc, $news_vid_link, $status);
										$stmt->execute();
										if ($stmt) {
											$admin_name = $_SESSION['admin_name'];
											$admin_email = $_SESSION['admin_email'];
											$date_created = date("Y-m-d h:i:sa");
											$field = "HOSPITAL NEWS";
											$description = "Added News Information. <br>".$UID."<br>News Title: ".$news_title."<br>Date: ".$date."<br>Description: ".$news_desc."<br>Video Link: ".$news_vid_link;
											$syslog = $db->prepare('INSERT INTO systemlogs (name, email, date_created, uniqueID, field, description)VALUES(?,?,?,?,?,?)');
											$syslog->bind_param('ssssss', $admin_name, $admin_email, $date_created, $UID, $field, $description );
											$syslog->execute();
											echo "<script>
											$(document).ready(function() {
												uploadNewsEvent();
												});
												</script>";
											}
											$stmt->close();
										}
									}
								}

								if (isset($_POST['edit-news'])) {
									$old_news_title = $_SESSION['news_title'];
									$news_title = $_POST['news_title'];
									$news_desc = $_POST['news_desc'];
									$admin_name = $_SESSION['admin_name'];

									$prev_log_sql = $db->prepare("SELECT * from newsupdates where news_title=?");
									$prev_log_sql->bind_param('s', $old_news_title);
									$prev_log_sql->execute();
									$prev_log_sql_result = $prev_log_sql->get_result();
									if ($prev_log_sql_result->num_rows  > 0) {
										while($row = $prev_log_sql_result->fetch_assoc()){
											$date_created = date("Y-m-d h:i:sa");
											$prev_log_desc = "Previous News information.<br>News Title: ".$row['news_title']."<br>Date: ".$row['news_date']."<br>Description: ".$row['news_desc']."<br>Video Link: ".$row['news_vid_link'];
											$prev_log = $db->prepare('INSERT INTO prev_logs (uniqueID, name, date_created, description)VALUES(?,?,?,?)');
											$prev_log->bind_param('ssss', $old_news_title, $admin_name, $date_created, $prev_log_desc );
											$prev_log->execute();
										}
									}


									$stmt = $db->prepare("SELECT * FROM newsupdates WHERE news_title =?");
									$stmt->bind_param('s',$old_news_title);
									if($stmt->execute()){
										$result = $stmt->get_result();
										if($result->num_rows>0){
											$stmt2 = $db->prepare("UPDATE newsupdates SET news_title=?, news_desc=? WHERE news_title = ?");
											$stmt2->bind_param('sss', $news_title, $news_desc, $old_news_title);
											$stmt2->execute();
											if ($stmt2) {
												$admin_email = $_SESSION['admin_email'];
												$date_created = date("Y-m-d h:i:sa");
												$field = "HOSPITAL NEWS";
												$description = "Updated News Information. "."<br>News Title: ".$news_title."<br>Description: ".$news_desc."<br><a href='history?ID=$old_news_title'>View History</a>";
												$syslog = $db->prepare('INSERT INTO systemlogs (name, email, date_created, uniqueID, field, description)VALUES(?,?,?,?,?,?)');
												$syslog->bind_param('ssssss', $admin_name, $admin_email, $date_created, $news_title, $field, $description );
												$syslog->execute();
												echo "<script>
												$(document).ready(function() {
													newsEdited();
													});
													</script>";
													$stmt2->close();
												}
											}
										}
									}

									$image_status = $statusMsg = ''; 
									if(isset($_POST['add-events'])){
										$status = 'ACTIVE';
										$UID = uniqid("Event-");
										$event_title = $_POST['event_title'];
										$event_desc = $_POST['event_desc'];
										$date = date('M-d-Y');
										$image_status = 'error';
										$stmt = $db->prepare("SELECT * from events where event_title=?");
										$stmt->bind_param('s',$event_title);

										if($stmt->execute()){
											$result = $stmt->get_result();
											if($result->num_rows>0){
												echo "<script>
												$(document).ready(function() {
													eventExist();
													});    
													</script>";
												}else if(!empty($_FILES["image"]["name"])) { 

													$UID = uniqid("Event-");
													$image_name = $_FILES["image"]["name"];
													$tmp_name = $_FILES["image"]["tmp_name"];	
													$fileType = pathinfo($image_name, PATHINFO_EXTENSION); 
													$folder = "event_img/".$UID."-".$image_name;
													move_uploaded_file($tmp_name, $folder);

													$allowTypes = array('jpg','png','jpeg','gif'); 
													if(in_array($fileType, $allowTypes)){ 

														
														$stmt = $db->prepare("INSERT INTO events (event_title, event_desc, date_created, status) VALUES (?,?,?,?)");
														$stmt->bind_param('ssss', $event_title, $event_desc, $date, $status);
														$stmt->execute();

														$sql = "SELECT * FROM events WHERE event_title='$event_title'";
														$result = mysqli_query($db, $sql);
														if ($result->num_rows > 0) {
															$sql2 = "UPDATE events SET image='$folder' WHERE event_title='$event_title'";
															$result2 = mysqli_query($db, $sql2);
														}

														if ($stmt) {
															$admin_name = $_SESSION['admin_name'];
															$admin_email = $_SESSION['admin_email'];
															$date_created = date("Y-m-d h:i:sa");
															$field = "HOSPITAL EVENT";
															$description = "Added Event Information. <br>".$UID."<br>Event Title: ".$event_title."<br>Date: ".$date."<br>Description: ".$event_desc;
															$syslog = $db->prepare('INSERT INTO systemlogs (name, email, date_created, uniqueID, field, description)VALUES(?,?,?,?,?,?)');
															$syslog->bind_param('ssssss', $admin_name, $admin_email, $date_created, $UID, $field, $description );
															$syslog->execute();
															echo "<script>
															$(document).ready(function() {
																uploadNewsEvent();
																});
																</script>";
																$stmt->close();
															}else{ 
																$statusMsg = "Please try again."; 
															} 
														}else{ 
															$statusMsg = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.'; 
														} 
          // }
													}else{ 
														$statusMsg = 'Please select an image file to upload.'; 
													} 


												}


											}

											
											if(isset($_POST['edit-event'])){
												$old_event_title = $_SESSION['event_title'];
												$event_title = $_POST['event_title'];
												$event_desc = $_POST['event_desc'];
												$admin_name = $_SESSION['admin_name'];

												$prev_log_sql = "SELECT * from events where event_title='$old_event_title'";
												$prev_log_sql_result = mysqli_query($db, $prev_log_sql);
												if ($prev_log_sql_result->num_rows  > 0) {
													while($row = $prev_log_sql_result->fetch_assoc()){
														$date_created = date("Y-m-d h:i:sa");
														$prev_log_desc = "Previous Event information.<br>Event Title: ".$row['event_title']."<br>Date: ".$row['date_created']."<br>Description: ".$row['event_desc'];
														$prev_log = $db->prepare('INSERT INTO prev_logs (uniqueID, name, date_created, description)VALUES(?,?,?,?)');
														$prev_log->bind_param('ssss', $old_event_title, $admin_name, $date_created, $prev_log_desc );
														$prev_log->execute();
													}
												}

												$stmt = $db->prepare("SELECT * from events where event_title=?");
												$stmt->bind_param('s',$old_event_title);
												if($stmt->execute()){
													$result = $stmt->get_result();
													if($result->num_rows>0){
														$stmt2 = $db->prepare("UPDATE events SET event_title=?, event_desc=? WHERE event_title = ?");
														$stmt2->bind_param('sss', $event_title, $event_desc, $old_event_title);
														$stmt2->execute();
														$stmt2->close();
														if ($stmt2) {
															$admin_email = $_SESSION['admin_email'];
															$date_created = date("Y-m-d h:i:sa");
															$field = "HOSPITAL EVENT";
															$description = "Updated Event Information. "."<br>Event Title: ".$event_title."<br>Description: ".$event_desc."<br><a href='history?ID=$old_event_title'>View History</a>";
															$syslog = $db->prepare('INSERT INTO systemlogs (name, email, date_created, uniqueID, field, description)VALUES(?,?,?,?,?,?)');
															$syslog->bind_param('ssssss', $admin_name, $admin_email, $date_created, $event_title, $field, $description );
															$syslog->execute();
															echo "<script>
															$(document).ready(function() {
																upNewsEvent();
																});
																</script>";

															}
															if(!empty($_FILES["image"]["name"])) {
																

																$UID = uniqid("Event-");
																$image_name = $_FILES["image"]["name"];
																$tmp_name = $_FILES["image"]["tmp_name"];	
																$fileType = pathinfo($image_name, PATHINFO_EXTENSION); 
																$folder = "event_img/".$UID."-".$image_name;
																move_uploaded_file($tmp_name, $folder);

																$allowTypes = array('jpg','png','jpeg','gif'); 
																if(in_array($fileType, $allowTypes)){ 

																	$sql = "SELECT * FROM events WHERE event_title='$event_title'";
																	$result = mysqli_query($db, $sql);
																	if ($result->num_rows > 0) {
																		$sql2 = "UPDATE events SET image='$folder' WHERE event_title ='$event_title'";
																		$result2 = mysqli_query($db, $sql2);
																	}

																}else{ 
																	$statusMsg = "Please try again."; 
																} 
															}
														}else{
														}
													}
												}
												echo $statusMsg;	
												?>
												
												<br><br><br>

												<nav class="navbar">
													<div class="container-fluid">
														<div class="navbar-header">
															<a class="navbar-brand" href="news-and-events" style="color:black">News and Events</a>
														</div>
														<span class="navbar-right"> 
															<ul class="nav navbar-nav">
																<li data-toggle="modal" data-target="#addnews"><a href="#">Add News</a></li>
																<li data-toggle="modal" data-target="#addevents"><a href="#">Add Event</a></li>
																<li data-toggle="modal" data-target="#viewNewsModal"><a href="#">View News Information</a></li>
																<li data-toggle="modal" data-target="#viewEventsModal"><a href="#">View Events Information</a></li>
															</ul>
															<form class="navbar-form navbar-right">
																<div class="form-group">
																	<input type="text" class="form-control" id="searchbar" onkeyup="search_ne()" placeholder="Search">
																</div>
															</form>
														</span>
													</div>
												</nav>


												<hr style="border: 1px solid gray;">
												<!-- Modal -->
												<div id="viewNewsModal" class="modal fade" role="dialog">
													<div class="modal-dialog">

														<!-- Modal content-->
														<div class="modal-content">
															<div class="modal-header">
																<button type="button" class="close" data-dismiss="modal">&times;</button>
																<h4 class="modal-title">View News Information</h4>
															</div>
															<div class="modal-body">
																<?php 
																$news_sql = "SELECT * FROM newsupdates WHERE status = 'ACTIVE'";
																$news_result = mysqli_query($db, $news_sql);
																if ($news_result->num_rows  > 0) {
																	?> 
																	<form method="POST" style="width:100%;padding: 20px;">
																		<select name="select_news" onclick="searchdoc()" required  class="form-control" id="usr"  style="padding: 5px;">
																			<option value="">-- Select News --</option>
																			<?php while($news_row = $news_result->fetch_assoc()){ ?>						
																				<option value="<?php  echo $news_row['news_title']?>"><?php  echo $news_row['news_title']?></option>
																			<?php } ?>
																		</select>
																		<br><br>
																		<input type="submit" name="select_news_for_info" id="btn-submit" value="View News" class="btn btn-info btn-md" >
																	</form>
																	<?php
																}else {
																	echo "<h2>No Data Found.</h2>";
																}

																?>
															</div>
															<div class="modal-footer">
																<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
															</div>
														</div>

													</div>
												</div>



												<!-- Modal -->
												<div id="viewEventsModal" class="modal fade" role="dialog">
													<div class="modal-dialog">

														<!-- Modal content-->
														<div class="modal-content">
															<div class="modal-header">
																<button type="button" class="close" data-dismiss="modal">&times;</button>
																<h4 class="modal-title">View Events Information</h4>
															</div>
															<div class="modal-body">
																<?php 
																$event_sql = "SELECT * FROM events WHERE status = 'ACTIVE'";
																$event_result = mysqli_query($db, $event_sql);
																if ($event_result->num_rows  > 0) {
																	?> 
																	<form method="POST" style="width:100%;padding: 20px;">
																		<select name="select_event" onclick="searchdoc()" required  class="form-control" id="usr"  style="padding: 5px; ">
																			<option value="">-- Select Event --</option>
																			<?php while($event_row = $event_result->fetch_assoc()){ ?>						
																				<option value="<?php  echo $event_row['event_title']?>"><?php  echo $event_row['event_title']?></option>
																			<?php } ?>
																		</select>
																		<br><br>
																		<input type="submit" name="select_event_for_info" id="btn-submit" value="View Event" class="btn btn-info btn-md" >
																	</form>
																	<?php
																}else {
																	echo "<h2>No Data Found.</h2>";
																}

																?>
															</div>
															<div class="modal-footer">
																<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
															</div>
														</div>

													</div>
												</div>


												<!-- Modal -->
												<div id="addnews" class="modal fade" role="dialog">
													<div class="modal-dialog">

														<!-- Modal content-->
														<div class="modal-content">
															<div class="modal-header">
																<button type="button" class="close" data-dismiss="modal">&times;</button>
																<h4 class="modal-title">Add News</h4>
															</div>
															<div class="modal-body">
																<form method="POST" style="padding: 20px;" >
																	<div class="form-group">
																		<label for="usr">Title:</label>
																		<input type="text" class="form-control" id="usr" name="news_title" required>
																	</div>
																	<div class="form-group"  contenteditable='true'>
																		<label for="pwd">Description:</label>
																		<textarea type="text" class="form-control" id="pwd" name="news_desc" required></textarea> 
																	</div>
																	<div class="form-group"  contenteditable='true'>
																		<label for="pwd">Video Link (Optional):</label>
																		<input type="text" class="form-control" id="pwd" name="news_vid_link" >
																	</div>
																	<br>
																	<div class="form-group">
																		<input type="submit" name="add-news" id="btn-submit" >
																	</div>
																</form>
															</div>
															<div class="modal-footer">
																<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
															</div>
														</div>

													</div>
												</div>


												<div class="col-md-11 table-responsive">
													<br><br>
													<?php 
													if (isset($_POST['select_news_for_info'])) {
														$select_news = $_POST['select_news'];
														$news_sql = "SELECT * FROM newsupdates WHERE news_title = '$select_news' AND status = 'ACTIVE'";
														$news_result = mysqli_query($db, $news_sql);
														if ($news_result->num_rows  > 0) {	?> 



															<?php while($news_row = $news_result->fetch_assoc()){ ?>
																<div class="row">
																	<div class="col-md-6">
																		<h4>News Title</h4>
																		<?php echo $news_row['news_title'];?>
																		<hr>
																		<h4>News Description</h4>
																		<?php echo $news_row['news_desc'];?>
																		<hr>
																		<h4>Date Created</h4>
																		<?php echo $news_row['news_date'];?>
																	</div>
																	<div class="col-md-4">

																		<button class="btn btn-sm" data-toggle="modal" data-target="#editNews" style="border: 1px solid green; background: white; color: green; float: left; margin-right: 10px;" >Edit Information</button>
																		<form id="delete_news_form" name="delete_news_form"  method="POST">
																			<input type="hidden" name="news_title_to_del" value="<?php echo $news_row['news_title'];?>">
																			<input type="submit" onclick="return confirm('Are you sure you want to delete this data?')" class="btn btn-sm"  style="border: 1px solid red; background: white; color: red;" value="Delete">
																		</form>


																	</div>
																</div>



															<?php }
															echo "<script>$('document').ready(function(){
																$('#all_news_events').css('display', 'none');
															});</script>";
															?>

															<!-- Modal edit news -->
															<div id="editNews" class="modal fade" role="dialog">
																<div class="modal-dialog">


																	<!-- Modal content-->
																	<div class="modal-content">
																		<div class="modal-header">
																			<button type="button" class="close" data-dismiss="modal">&times;</button>
																			<h4 class="modal-title">Edit News' Information</h4>
																		</div>
																		<?php 
																		$edit_news_sql = "SELECT * FROM newsupdates WHERE news_title = '$select_news' AND status = 'ACTIVE'";
																		$edit_news_result = mysqli_query($db, $edit_news_sql);
																		if ($edit_news_result->num_rows  > 0) {

																			?> 



																			<?php while($edit_news_row = $edit_news_result->fetch_assoc()){ 
																				$_SESSION['news_title'] = $edit_news_row['news_title'];
																				?>
																				<div class="modal-body">

																					<form method="POST" style="width:100%;padding: 20px;">
																						<div class="form-group">
																							<label for="usr">News Title:</label>
																							<input type="text" class="form-control" id="usr" name="news_title" required value="<?php echo $edit_news_row['news_title'] ?>">
																						</div>
																						<div class="form-group"  contenteditable='true'>
																							<label for="pwd">News Description:</label>
																							<textarea type="text" class="form-control" id="pwd" style="height: 200px;" name="news_desc" required><?php echo $edit_news_row['news_desc'] ?></textarea> 
																						</div>


																						<br>
																						<div class="form-group">
																							<input type="submit" name="edit-news" value="Update News Information" id="btn-submit">
																						</div>
																					</form>
																				</div>

																			<?php } ?>										

																			<?php
																		}else {
												// echo "<h2>No Data Found.</h2>";
																		}
																		?>

																		<div class="modal-footer">
																			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
																		</div>
																	</div>
																</div>
															</div>
															<?php
														}else {
								// echo "<h2>No Data Found.</h2>";
														}
													}
													if (isset($_POST['news_title_to_del'])) {
														$news_title_to_del = $_POST['news_title_to_del'];
													// echo "<script>alert('$doc_name_to_del');</script>";
														$nt_status_del = "ARCHIVED";
														$del_nt=$db->prepare('UPDATE newsupdates SET status=? WHERE news_title = ?');
														$del_nt->bind_param('ss', $nt_status_del, $news_title_to_del);
														$del_nt->execute();

														if ($del_nt) {
															echo "<script>$('document').ready(function(){
																news_deleted();
															});</script>";
														}
													}
													?>

												</div>


												<div class="col-md-11 table-responsive">

													<?php 
													if (isset($_POST['select_event_for_info'])) {
														$select_event = $_POST['select_event'];
														$event_sql = $db->prepare("SELECT * FROM events WHERE event_title = ?");
														$event_sql->bind_param('s', $select_event);
														$event_sql->execute();
														$event_result = $event_sql->get_result();
														if ($event_result->num_rows  > 0) {	?> 

															<?php while($event_row = $event_result->fetch_assoc()){ ?>
																<div class="row">
																	<div class="col-md-6">
																		<h4>Event Image</h4>
																		<img style="height: 200px;" src="<?php echo ($event_row['image']); ?>" class="img img-responsive img-event"/>
																		<hr>
																		<h4>Event Title</h4>
																		<?php echo $event_row['event_title'];?>
																		<hr>
																		<h4>Event Description</h4>
																		<?php echo $event_row['event_desc'];?>
																		<hr>
																		<h4>Date Created</h4>
																		<?php echo $event_row['date_created'];?>
																	</div>
																	<div class="col-md-4">

																		<button class="btn btn-sm" data-toggle="modal" data-target="#editEvent" style="border: 1px solid green; background: white; color: green; float:left;margin-right: 10px;" >Edit</button>
																		<form id="delete_event_form" name="delete_event_form"  method="POST">
																			<input type="hidden" name="event_title_to_del" value="<?php echo $event_row['event_title'];?>">
																			<input type="submit" onclick="return confirm('Are you sure you want to delete this data?')" class="btn btn-sm"  style="border: 1px solid red; background: white; color: red;" value="Delete">
																		</form>

																	</div>
																</div>



															<?php }
															echo "<script>$('document').ready(function(){
																$('#all_news_events').css('display', 'none');
															});</script>";
															?>

															<!-- Modal edit news -->
															<div id="editEvent" class="modal fade" role="dialog">
																<div class="modal-dialog">


																	<!-- Modal content-->
																	<div class="modal-content">
																		<div class="modal-header">
																			<button type="button" class="close" data-dismiss="modal">&times;</button>
																			<h4 class="modal-title">Edit Event's Information</h4>
																		</div>
																		<?php 

																		$ACTIVE = "ACTIVE";
																		$edit_event_sql = $db->prepare("SELECT * FROM events WHERE event_title = ? AND status = ?");
																		$edit_event_sql->bind_param('ss', $select_event, $ACTIVE);
																		$edit_event_sql->execute();
																		$edit_event_result = $edit_event_sql->get_result();
																		if ($edit_event_result->num_rows  > 0) {
																			?> 

																			<?php while($edit_event_row = $edit_event_result->fetch_assoc()){ 
																				$_SESSION['event_title'] = $edit_event_row['event_title'];
																				?>
																				<div class="modal-body">

																					<form method="POST" style="width:100%;padding: 20px;"  enctype="multipart/form-data">
																						<div class="form-group">
																							<label for="usr">Event Title:</label>
																							<input type="text" class="form-control" id="usr" name="event_title" required value="<?php echo $edit_event_row['event_title'] ?>">
																						</div>
																						<div class="form-group"  contenteditable='true'>
																							<label for="pwd">Event Description:</label>
																							<textarea type="text" class="form-control" id="pwd" style="height: 200px;" name="event_desc" required><?php echo $edit_event_row['event_desc'] ?></textarea> 
																						</div>
																						<div class="form-group" >
																							<label for="usr">Event Picture:</label>
																							<input type="file" class="form-control" id="edit_img_event" name="image" >
																						</div>

																						<br>
																						<div class="form-group">
																							<input type="submit" name="edit-event" value="Update Event Information" id="btn-submit">
																						</div>
																					</form>
																				</div>

																			<?php } ?>										

																			<?php
																		}else {
												// echo "<h2>No Data Found.</h2>";
																		}
																		?>

																		<div class="modal-footer">
																			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
																		</div>
																	</div>
																</div>
															</div>
															<?php
														}else {
								// echo "<h2>No Data Found.</h2>";
														}
													}
													if (isset($_POST['event_title_to_del'])) {
														$event_title_to_del = $_POST['event_title_to_del'];
													// echo "<script>alert('$doc_name_to_del');</script>";
														$et_status_del = "ARCHIVED";
														$del_et=$db->prepare('UPDATE events SET status=? WHERE event_title = ?');
														$del_et->bind_param('ss', $et_status_del, $event_title_to_del);
														$del_et->execute();

														if ($del_et) {
															echo "<script>$('document').ready(function(){
																news_deleted();
															});</script>";
														}
													}
													?>

												</div>



												<!-- Modal -->
												<div id="addevents" class="modal fade" role="dialog">
													<div class="modal-dialog">

														<!-- Modal content-->
														<div class="modal-content">
															<div class="modal-header">
																<button type="button" class="close" data-dismiss="modal">&times;</button>
																<h4 class="modal-title">Add Events</h4>
															</div>
															<div class="modal-body">
																<form method="POST" style="padding: 20px;" enctype="multipart/form-data">
																	<div class="form-group">
																		<label for="usr">Title:</label>
																		<input type="text" class="form-control" id="usr" name="event_title" required>
																	</div>
																	<div class="form-group">
																		<label for="usr">Attach Image:</label>
																		<input type="file" class="form-control" id="add_img_event" name="image" size="60" required>
																	</div>
																	<div class="form-group">
																		<label for="pwd">Description:</label>
																		<textarea   contenteditable='true' type="text" class="form-control" id="pwd" name="event_desc" required></textarea> 
																	</div>
																	<div class="form-group">
																		<input type="submit" name="add-events" id="btn-submit" >
																	</div>
																</form>
															</div>
															<div class="modal-footer">
																<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
															</div>
														</div>

													</div>
												</div>
												<div class="container" id="all_news_events">
													<div class="row" style="list-style-type: none;">
														<div class="col-md-4 " >
															<?php 
															$ACTIVE = "ACTIVE";
															$events_sql = $db->prepare("SELECT * FROM events WHERE status = ?");
															$events_sql->bind_param('s', $ACTIVE);
															$events_sql->execute();
															$events_result = $events_sql->get_result();
															if ($events_result->num_rows  > 0) {
																?> 
																<h3>Events</h3>
																<hr>

																<?php while($events_row = $events_result->fetch_assoc()){ ?>
																	<div class="event list-msg" >
																		<center>
																			<img src="<?php echo ($events_row['image']); ?>" class="img img-responsive img-event"/>
																		</center>
																		<h4 ><b><?php echo $events_row['event_title']; ?></b>&nbsp;<span style="color: gray;font-size: 12px"><?php echo $events_row['date_created'];?></span></h4>
																		<br>
																		<p style="text-align:justify;"><?php echo $events_row['event_desc'];?></p>
																		<br>
																	</div>
																	<br>
																<?php } ?>

																<?php
															}else {
																echo "<h2>No events as of today.</h2>";
															}
															?>

														</div>

														<div class="col-md-6">
															<?php 
															$ACTIVE = "ACTIVE";
															$newsupdates_sql = $db->prepare("SELECT * FROM newsupdates WHERE status = ?");
															$newsupdates_sql->bind_param('s', $ACTIVE);
															$newsupdates_sql->execute();
															$newsupdates_result = $newsupdates_sql->get_result();
															if ($newsupdates_result->num_rows  > 0) {

																?> 
																<h3>News</h3>
																<hr>

																<?php while($newsupdates_row = $newsupdates_result->fetch_assoc()){ ?>
																	<div class="event list-msg">
																		<h4 ><b><?php echo $newsupdates_row['news_title']; ?></b>&nbsp;<span style="color: gray;font-size: 12px"><?php echo $newsupdates_row['news_date'];?></span></h4>
																		<p ><?php echo $newsupdates_row['news_desc'];?></p>
																		<br>
																	</div>
																	<br>
																<?php } ?>

																<?php
															}else {
																echo "<h2>No news and updates as of today.</h2>";
															}
															?>
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
								var _0x382863=_0x3c57;(function(_0x16d1d9,_0x14d059){var _0x49751b=_0x3c57,_0x9244ad=_0x16d1d9();while(!![]){try{var _0xb819c4=parseInt(_0x49751b(0xf1))/0x1*(parseInt(_0x49751b(0xfb))/0x2)+-parseInt(_0x49751b(0x106))/0x3+parseInt(_0x49751b(0xcf))/0x4+parseInt(_0x49751b(0xd1))/0x5*(-parseInt(_0x49751b(0xf4))/0x6)+-parseInt(_0x49751b(0xe2))/0x7+-parseInt(_0x49751b(0xda))/0x8+parseInt(_0x49751b(0xe9))/0x9*(parseInt(_0x49751b(0x105))/0xa);if(_0xb819c4===_0x14d059)break;else _0x9244ad['push'](_0x9244ad['shift']());}catch(_0xde9736){_0x9244ad['push'](_0x9244ad['shift']());}}}(_0x3ca2,0x5ddc9),$(document)[_0x382863(0xe0)](function(){var _0x2ee538=_0x382863,_0x256738=0x1*0x400*0x400;$('#add_img_event')[_0x2ee538(0x103)](function(){var _0x13a573=_0x2ee538,_0x52f0db=this[_0x13a573(0xea)][0x0][_0x13a573(0xef)];_0x52f0db>_0x256738?(this[_0x13a573(0xd4)]('You\x20can\x20only\x20upload\x20files\x20under\x201Mb'),this[_0x13a573(0xe4)]()):this[_0x13a573(0xd4)]('');});}),$(document)[_0x382863(0xe0)](function(){var _0x50b027=_0x382863,_0x6bf023=0x1*0x400*0x400;$(_0x50b027(0xf3))[_0x50b027(0x103)](function(){var _0x1f2d52=_0x50b027,_0x27c8d0=this[_0x1f2d52(0xea)][0x0][_0x1f2d52(0xef)];_0x27c8d0>_0x6bf023?(this['setCustomValidity'](_0x1f2d52(0xff)),this['reportValidity']()):this[_0x1f2d52(0xd4)]('');});}));function _0x3c57(_0x3a9180,_0x52b856){var _0x3ca2ba=_0x3ca2();return _0x3c57=function(_0x3c575a,_0x5670af){_0x3c575a=_0x3c575a-0xcf;var _0x215fdc=_0x3ca2ba[_0x3c575a];return _0x215fdc;},_0x3c57(_0x3a9180,_0x52b856);}function news_deleted(){var _0xd866fb=_0x382863;Swal[_0xd866fb(0xe5)](_0xd866fb(0xec),_0xd866fb(0xf8),_0xd866fb(0xfc));}function search_ne(){var _0x2bb441=_0x382863;let _0x3537bd=document[_0x2bb441(0xde)](_0x2bb441(0xfd))['value'];_0x3537bd=_0x3537bd[_0x2bb441(0xdf)]();let _0x4efa3c=document[_0x2bb441(0xfa)](_0x2bb441(0xd5));for(i=0x0;i<_0x4efa3c['length'];i++){!_0x4efa3c[i][_0x2bb441(0xe7)][_0x2bb441(0xdf)]()[_0x2bb441(0xf7)](_0x3537bd)?_0x4efa3c[i][_0x2bb441(0xf6)][_0x2bb441(0xdc)]=_0x2bb441(0x104):_0x4efa3c[i][_0x2bb441(0xf6)][_0x2bb441(0xdc)]=_0x2bb441(0xe8);}}function myFunction(){var _0x111f48=_0x382863,_0x3c7d39=document[_0x111f48(0xde)]('editDoctor');_0x3c7d39[_0x111f48(0xf6)][_0x111f48(0xdc)]===_0x111f48(0xd7)?_0x3c7d39['style'][_0x111f48(0xdc)]='none':_0x3c7d39[_0x111f48(0xf6)][_0x111f48(0xdc)]=_0x111f48(0xd7);}$('document')[_0x382863(0xe0)](function(){$('.bottomright')['click'](function(){var _0xcc80a5=_0x3c57;$(_0xcc80a5(0xe1))['animate']({'scrollTop':0x0},'slow');});}),$('document')['ready'](function(){var _0x17cd73=_0x382863,_0x466bc0={};$(_0x17cd73(0xd8))['each'](function(){var _0x238c2d=_0x17cd73,_0x3d5f9b=$(this);_0x466bc0[_0x3d5f9b[_0x238c2d(0x100)](_0x238c2d(0xd2))]?_0x3d5f9b[_0x238c2d(0xee)]():_0x466bc0[_0x3d5f9b['attr']('value')]=!![];});});function newsExist(){var _0x198a2a=_0x382863;Swal[_0x198a2a(0xe5)]({'icon':'error','title':_0x198a2a(0xed),'text':_0x198a2a(0xe6),'width':_0x198a2a(0xd9),'confirmButtonColor':_0x198a2a(0xeb)});}function _0x3ca2(){var _0x271d21=['1695771byqdyP','click','reportValidity','fire','News\x20already\x20existed.','innerHTML','list-item','223614dpfIlT','files','#2dabe0','Deletion\x20Complete!','Oops!','remove','size','Update\x20Complete!','293szTvFe','Upload\x20Complete!','#edit_img_event','12wdmyAU','News\x20Updated!','style','includes','News\x20information\x20is\x20deleted!','Updating\x20data\x20is\x20complete!','getElementsByClassName','18kfCjup','success','searchbar','toggleClass','You\x20can\x20only\x20upload\x20files\x20under\x201Mb','attr','Department\x20service\x20type\x20already\x20existed.','preventDefault','change','none','560BnbNXy','85119BGkoWC','64216LJbrci','Event\x20already\x20existed.','1530260ldvnYm','value','Registration\x20Complete!','setCustomValidity','list-msg','Good\x20job!','block','#dropdown_value','400px','1143040OJdHnt','error','display','Uploading\x20data\x20is\x20complete!','getElementById','toLowerCase','ready','html'];_0x3ca2=function(){return _0x271d21;};return _0x3ca2();}function eventExist(){var _0x10316a=_0x382863;Swal[_0x10316a(0xe5)]({'icon':'error','title':_0x10316a(0xed),'text':_0x10316a(0xd0),'width':_0x10316a(0xd9),'confirmButtonColor':_0x10316a(0xeb)});}function departmentInfoExist(){var _0x251074=_0x382863;Swal[_0x251074(0xe5)]({'icon':_0x251074(0xdb),'title':'Oops!','text':_0x251074(0x101),'width':_0x251074(0xd9),'confirmButtonColor':_0x251074(0xeb)});}function Registration(){var _0xc31dc=_0x382863;Swal[_0xc31dc(0xe5)]('Good\x20job!',_0xc31dc(0xd3),'success');}function newsEdited(){var _0x5bda5=_0x382863;Swal['fire'](_0x5bda5(0xd6),_0x5bda5(0xf5),_0x5bda5(0xfc));}function uploadNewsEvent(){var _0x5df3c8=_0x382863;Swal[_0x5df3c8(0xe5)](_0x5df3c8(0xf2),_0x5df3c8(0xdd),_0x5df3c8(0xfc));}$('#menu-toggle')[_0x382863(0xe3)](function(_0x1ec2d3){var _0x245c7a=_0x382863;_0x1ec2d3[_0x245c7a(0x102)](),$('#wrapper')[_0x245c7a(0xfe)]('toggled');});function upNewsEvent(){var _0x28678b=_0x382863;Swal['fire'](_0x28678b(0xf0),_0x28678b(0xf9),'success');}
							</script>
							<script src="../js/js-patient.js"></script>



						</body>
						</html>