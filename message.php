<?php 
include 'database/db.php';
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
	<title>Messages</title>
	<meta charset="utf-8">
	<link rel="icon" href="img/gad logo.jpg">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../css/a-message.css">
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
		<?php include "sidebar.php"?>
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
												<a class="navbar-brand" href="doctor" style="color:black">Messages</a>
											</div>
											<span class="navbar-right"> 
												<ul class="nav navbar-nav">
													<!-- new msg -->
													<li data-toggle="modal" data-toggle="modal" data-target="#new_msg"><a href="#">
														<?php 
														$NEW_MSG = "NEW MSG";
														$sql = $db->prepare("SELECT COUNT(concern_id) AS c FROM message_concern WHERE msg_status =?");
														$sql->bind_param('s', $NEW_MSG);
														$sql->execute();
														$result = $sql->get_result();
														?> 
														<?php while($row = $result->fetch_assoc()){
															?>
															<span style="background:#42ba96; padding-left:10px; padding-right:10px; padding-top:8px; padding-bottom:8px;border-radius:50%" class="badge" ><?php echo $row['c']?></span>&nbsp;New Messages
														<?php } ?>
													</a></li>

													<!-- Modal new messages -->
													<div id="new_msg" class="modal fade" role="dialog">
														<div class="modal-dialog">
															<!-- Modal content-->
															<div class="modal-content">
																<div class="modal-header">
																	<button type="button" class="close" data-dismiss="modal">&times;</button>
																	<h4 class="modal-title">New Messages</h4>
																</div>
																<div class="modal-body">
																	<div class="row">
																		<div class="col-md-12">
																			<div class="msg-box">
																				<input id="searchbar_newmsg" class="form-control" onkeyup="search_newchat()" type="text" name="search" placeholder="Search chat">
																			</div>
																			<div class="msg-mini-chat">
																				<?php 
																				$msg_status_arch_msg = "NEW MSG";
																				$msg = $db->prepare("SELECT * from message_concern WHERE msg_status=? ORDER BY concern_id DESC");
																				$msg->bind_param('s', $msg_status_arch_msg);
																				if($msg->execute()){
																					$result = $msg->get_result();
																					if($result->num_rows>0){
																						?>
																						<?php
																						while($rows = $result->fetch_assoc()){ ?>
																							<?php $msg_id = $rows['concern_id'];?>
																							<div id='list'>
																								<li class="list-newmsg">
																									<a href="?msg_content=<?php echo $msg_id;?>" class="view_msg">	
																										<div class="msg-min-info">
																											<div class="row">
																												<div class="col-md-8">
																													<h5 class="con_min_name"><?php echo $rows['concern_name'];?></h5>
																													<span class="msg_created"><?php echo $rows['date_created'] ?></span>
																													<br>
																													<b><span class="msg_created"><?php echo $rows['subject'] ?></span></b>
																												</div>
																												<div class="col-md-4">
																													<form method="GET">
																														<input type="submit" class="msg_id" name="msg_content" value="<?php echo $msg_id;?>">
																													</form>
																												</div>
																											</div>
																											<h6 class="con_min_com"><?php echo $rows['concern_comment'];?></h6>
																										</div>
																									</a>
																								</li>
																							</div>
																						<?php }
																						$msg->close();
																					}
																				}
																				?>
																			</div>
																		</div>
																	</div>
																</div>
																<div class="modal-footer">
																	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
																</div>
															</div>
														</div>
													</div>

													<!-- unread msg -->

													<li data-toggle="modal"  data-toggle="modal" data-target="#unread_msg"><a href="#">
														<?php 
														$UNREAD_MSG = "UNREAD_MSG";
														$sql = $db->prepare("SELECT COUNT(concern_id) AS c FROM message_concern WHERE msg_status =?");
														$sql->bind_param('s', $UNREAD_MSG);
														$sql->execute();
														$result = $sql->get_result();
														?> 
														<?php while($row = $result->fetch_assoc()){
															?>
															<span style="background:#0275d8; padding-left:10px; padding-right:10px; padding-top:7px; padding-bottom:7px;border-radius:50%" class="badge" ><?php echo $row['c']?></span>&nbsp;Unread Messages
														<?php } ?>
													</a></li>
													<!-- Modal archived messages-->
													<div id="unread_msg" class="modal fade" role="dialog">
														<div class="modal-dialog">
															<!-- Modal content-->
															<div class="modal-content">
																<div class="modal-header">
																	<button type="button" class="close" data-dismiss="modal">&times;</button>
																	<h4 class="modal-title">Unread Messages</h4>
																</div>
																<div class="modal-body">
																	<div class="modal-body">
																		<div class="row">
																			<div class="col-md-12">
																				<div class="msg-box">
																					<input id="searchbar_archmsg" class="form-control" onkeyup="search_archchat()" type="text" name="search" placeholder="Search chat">
																				</div>
																				<div class="msg-mini-chat">
																					<?php 
																					$UNREAD_MSG = "UNREAD_MSG";
																					$msg = $db->prepare("SELECT * from message_concern WHERE msg_status=? ORDER BY concern_id DESC");
																					$msg->bind_param('s', $UNREAD_MSG);
																					if($msg->execute()){
																						$result = $msg->get_result();
																						if($result->num_rows>0){
																							?>
																							<?php
																							while($rows = $result->fetch_assoc()){ ?>
																								<?php $msg_id = $rows['concern_id'];?>
																								<div id='list'>
																									<li class="list-archmsg">
																										<a href="?msg_content=<?php echo $msg_id;?>" class="view_msg">	
																											<div class="msg-min-info">
																												<div class="row">
																													<div class="col-md-8">
																														<h5 class="con_min_name"><?php echo $rows['concern_name'];?></h5>
																														<span class="msg_created"><?php echo $rows['date_created'] ?></span>
																														<br>
																														<b><span class="msg_created"><?php echo $rows['subject'] ?></span></b>
																													</div>
																													<div class="col-md-4">
																														<form method="GET">
																															<input type="submit" class="msg_id" name="msg_content" value="<?php echo $msg_id;?>">
																														</form>
																													</div>
																												</div>
																												<h6 class="con_min_com"><?php echo $rows['concern_comment'];?></h6>
																											</div>
																										</a>
																									</li>
																								</div>
																							<?php }
																							$msg->close();
																						}
																					}
																					?>
																				</div>
																			</div>
																		</div>
																	</div>
																</div>
																<div class="modal-footer">
																	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
																</div>
															</div>
														</div>
													</div>



													<!-- arch msg -->
													<li data-toggle="modal"  data-toggle="modal" data-target="#arch_msg"><a href="#">
														<?php 
														$ARCHIVED_MSG = "ARCHIVED_MSG";
														$sql = $db->prepare("SELECT COUNT(concern_id) AS c FROM message_concern WHERE msg_status =?");
														$sql->bind_param('s', $ARCHIVED_MSG);
														$sql->execute();
														$result = $sql->get_result();
														?> 
														<?php while($row = $result->fetch_assoc()){
															?>
															<span style="background:#ff9966;  padding-left:10px; padding-right:10px; padding-top:8px; padding-bottom:8px;border-radius:50%" class="badge" ><?php echo $row['c']?></span>&nbsp;Archives
														<?php } ?>
													</a></li>
													<!-- Modal archived messages-->
													<div id="arch_msg" class="modal fade" role="dialog">
														<div class="modal-dialog">
															<!-- Modal content-->
															<div class="modal-content">
																<div class="modal-header">
																	<button type="button" class="close" data-dismiss="modal">&times;</button>
																	<h4 class="modal-title">Archived Messages</h4>
																</div>
																<div class="modal-body">
																	<div class="modal-body">
																		<div class="row">
																			<div class="col-md-12">
																				<div class="msg-box">
																					<input id="searchbar_archmsg" class="form-control" onkeyup="search_archchat()" type="text" name="search" placeholder="Search chat">
																				</div>
																				<div class="msg-mini-chat">
																					<?php 
																					$msg_status_arch_msg = "ARCHIVED_MSG";
																					$msg = $db->prepare("SELECT * from message_concern WHERE msg_status=? ORDER BY concern_id DESC");
																					$msg->bind_param('s', $msg_status_arch_msg);
																					if($msg->execute()){
																						$result = $msg->get_result();
																						if($result->num_rows>0){
																							?>
																							<?php
																							while($rows = $result->fetch_assoc()){ ?>
																								<?php $msg_id = $rows['concern_id'];?>
																								<div id='list'>
																									<li class="list-archmsg">
																										<a href="?msg_content=<?php echo $msg_id;?>" class="view_msg">	
																											<div class="msg-min-info">
																												<div class="row">
																													<div class="col-md-8">
																														<h5 class="con_min_name"><?php echo $rows['concern_name'];?></h5>
																														<span class="msg_created"><?php echo $rows['date_created'] ?></span>
																														<br>
																														<b><span class="msg_created"><?php echo $rows['subject'] ?></span></b>
																													</div>
																													<div class="col-md-4">
																														<form method="GET">
																															<input type="submit" class="msg_id" name="msg_content" value="<?php echo $msg_id;?>">
																														</form>
																													</div>
																												</div>
																												<h6 class="con_min_com"><?php echo $rows['concern_comment'];?></h6>
																											</div>
																										</a>
																									</li>
																								</div>
																							<?php }
																							$msg->close();
																						}
																					}
																					?>
																				</div>
																			</div>
																		</div>
																	</div>
																</div>
																<div class="modal-footer">
																	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
																</div>
															</div>
														</div>
													</div>


												</ul>
											</span>
										</div>
									</nav>

									<hr style="border: 1px solid gray;">

									<!-- start of message content -->

									<div class="container">
										<div class="row">
											<div class="col-md-4">
												<form method="GET">

													<label for="checkAll">
														<input type="checkbox" name="checkAll" onchange="selectAllChkbxs()" id="checkAll" style="width: 15px;height: 15px;">
														Select All
													</label>

													&emsp;<button type="submit" title="Delete" name="delete_all" id="fa-trash" onclick="return confirm('Are you sure you want to delete selected messages?')" class="btn btn-md btn-default" ><i class="fa fa-trash"></i></button>

													&emsp;<button type="submit" title="Archive" name="archive_all" id="fa-arch" onclick="return confirm('Are you sure you want to archive selected messages?')" class="btn btn-md btn-default"><i class="fa fa-archive"></i></button>

													&emsp;<button type="submit" title="Mark as unread" name="unread_all" id="fa-envelope" onclick="return confirm('Are you sure you want to mark as unread the selected messages?')" class="btn btn-md btn-default"><i class="fa fa-envelope"></i></button>

													<div class="msg-box">
														<h4>Messages</h4>
														<input id="searchbar" class="form-control" onkeyup="search_chat()" type="text"  placeholder="Search chat">
													</div>
													<div class="msg-mini-chat">
														<?php 
														$msg_status_arch_msg = "ARCHIVED_MSG";
														$msg_status_del_msg = "ARCHIVED";
														$msg = $db->prepare("SELECT * from message_concern WHERE msg_status!=? AND msg_status!=? ORDER BY concern_id DESC");
														$msg->bind_param('ss', $msg_status_arch_msg, $msg_status_del_msg);
														if($msg->execute()){
															$result = $msg->get_result();
															if($result->num_rows>0){
																?>

																<?php
																while($rows = $result->fetch_assoc()){ ?>
																	<?php $msg_id = $rows['concern_id'];?>
																	<div id='list'>
																		<li class="list-msg">

																			<a href="?msg_content=<?php echo $msg_id;?>" class="view_msg">	
																				<div class="msg-min-info">
																					<div class="row">
																						<div class="col-md-12">

																							<h5 class="con_min_name"><input type="checkbox" class="select-msg" onclick="selectChkbxs()" name="msg_id[]" id="chkbx" value="<?php echo $msg_id;?>" style="width: 15px;height: 15px;">
																								<?php 
																								if($rows['msg_status']=="NEW MSG"){
																									echo "<b style='color:green'>".$rows['concern_name']."</b>";
																								}else if($rows['msg_status']=="UNREAD_MSG"){
																									echo "<b style='color:#0275d8'>".$rows['concern_name']."</b>";
																								}else {
																									echo $rows['concern_name'];
																								}
																								

																							?>&nbsp;
																							<span class="msg_created" style="font-size: 10px;"><?php echo $rows['date_created'] ?></span></h5>
																							<b><span class="msg_created"><?php echo $rows['subject'] ?></span></b>
																						</div>
																						<div class="col-md-12">
																							<form method="GET">
																								<input type="submit" class="msg_id" name="msg_content" value="<?php echo $msg_id;?>">
																							</form>
																						</div>
																					</div>
																					<h6 class="con_min_com"><?php echo $rows['concern_comment'];?></h6>
																				</div>
																			</a>
																		</li>
																	</div>

																<?php }
																$msg->close();
															}?>


															<?php
														}

														if (isset($_GET['delete_all'])) {
															if (!empty($_GET['msg_id'])) {
																$all_id = $_GET['msg_id'];
																$extract_id = implode(',', $all_id);
																$sql = "UPDATE message_concern SET msg_status='ARCHIVED' WHERE concern_id IN($extract_id)";
																$result = mysqli_query($db, $sql);
																if($result){
																	echo "<script>alert('Message has been deleted!'); window.location.href = 'message'</script>";
																}
															}else{
																echo "<script>alert('Please select a message and try again.');</script>";
															}
														}

														if (isset($_GET['archive_all'])) {
															if (!empty($_GET['msg_id'])) {
																$all_id = $_GET['msg_id'];
																$extract_id = implode(',', $all_id);
																$sql = "UPDATE message_concern SET msg_status='ARCHIVED_MSG' WHERE concern_id IN($extract_id)";
																$result = mysqli_query($db, $sql);
																if($result){
																	echo "<script>alert('Message has been archived!'); window.location.href = 'message'</script>";
																}
															}else{
																echo "<script>alert('Please select a message and try again.');</script>";
															}
														}

														if (isset($_GET['unread_all'])) {
															if (!empty($_GET['msg_id'])) {
																$all_id = $_GET['msg_id'];
																$extract_id = implode(',', $all_id);
																$sql = "UPDATE message_concern SET msg_status='UNREAD_MSG' WHERE concern_id IN($extract_id)";
																$result = mysqli_query($db, $sql);
																if($result){
																	echo "<script>alert('Message has been marked as unread!'); window.location.href = 'message'</script>";
																}
															}else{
																echo "<script>alert('Please select a message and try again.');</script>";
															}
														}


														?>
													</div>
												</form>
											</div>


											<?php 

											if (isset($_GET['msg_content'])) {
												$msg_content = $_GET['msg_content'];
												$read = "READ";
												$read_sql = $db->prepare("UPDATE message_concern SET msg_status=? WHERE concern_id=?");
												$read_sql->bind_param('ss', $read, $msg_content);
												$read_sql->execute();

											}

											$msg = $db->prepare("SELECT * from message_concern WHERE concern_id=? ");
											$msg->bind_param('s', $msg_content);
											if($msg->execute()){
												$result = $msg->get_result();
												if($result->num_rows>0){
													?>

													<?php
													while($rows = $result->fetch_assoc()){ ?>
														<?php $msg_id = $rows['concern_id'];?>
														<div class="col-md-6 msg-content">
															<div class="msg-info">
																<div class="row">
																	<div class="col-md-11">
																		<h5  class="con_name"><?php echo $rows['concern_name'];?></h5>
																		<i class="msg_created"><?php echo $rows['date_created'] ?></i><br>
																		<i class="msg_created">Status: <?php echo $rows['msg_status'] ?></i>

																	</div>
																	<div class="col-md-1" style="margin-top:20px">
																		<span data-toggle="dropdown" style="padding: 5px;font-size: 20px;" class="fa fa-ellipsis-v" aria-hidden="true"></span>
																		<ul class="dropdown-menu">
																			<?php 
																			if($rows['msg_status']=="ARCHIVED_MSG"){ ?>
																				<li> 
																					<form method="POST">
																						<input type="hidden" name="msg_id" value="<?php echo $msg_id?>">
																						<input type="hidden" name="msg_num" value="<?php echo $rows['concern_number']; ?>">
																						<input type="submit" onclick="return confirm('Are you sure you want to unarchive this message?');" name="unarchive_msg" value="Unarchive" style="background: unset; border: none; border-radius: 5px; padding:6px" >
																					</form>
																				</li>
																			<?php		}else{ ?>
																				<li> 
																					<form method="POST">
																						<input type="hidden" name="msg_id" value="<?php echo $msg_id?>">
																						<input type="hidden" name="msg_num" value="<?php echo $rows['concern_number']; ?>">
																						<input type="submit" onclick="return confirm('Are you sure you want to archive this message?');" name="archive_msg" value="Archive" style="background: unset; border: none; border-radius: 5px; padding:6px" >
																					</form>
																				</li>
																				<?php
																			}
																			?>
																			
																			<li> 
																				<form method="POST">
																					<input type="hidden" name="msg_id" value="<?php echo $msg_id?>">
																					<input type="hidden" name="msg_num" value="<?php echo $rows['concern_number']; ?>">
																					<input type="submit" onclick="return confirm('Are you sure you want to delete this message?');" name="delete_msg" value="Delete" style="background: unset; border: none; border-radius: 5px; padding:6px" >
																				</form>
																			</li>
																		</ul>
																	</div>

																</div>

																<hr>
																<div class="row">
																	<div class="col-md-12">
																		<br>
																		<b><span class="msg_created"><?php echo $rows['subject'] ?></span></b>
																		<h6 class="con_com"><?php echo $rows['concern_comment'];?></h6>
																		<br><br>
																	</div>
																</div>
															</div>

															<div class="row reply_msg">
																<form method="POST">
																	<div class="col-md-10">
																		<input type="hidden" name="msg_id" value="<?php echo $msg_id?>">
																		<input type="hidden" name="msg_con_name" value="<?php echo $rows['concern_name'];?>">
																		<input type="hidden" name="msg_num" value="<?php echo $rows['concern_number']; ?>">
																		<textarea rows="1" name="msg_reply" style="height: 100px;" required class="form-control" placeholder="Reply here..."></textarea>
																	</div>
																	<div class="col-md-2">
																		<input type="submit" name="send_reply" class="form-control btn btn-success" title="Send Message" value="Send">
																	</div>
																</form>
															</div>
														</div>
													<?php }
													$msg->close();
												}else {
													?>
													<div class="col-md-7">
														<center>
															<h3 style="  padding: 70px 0; color: lightgray;">Please select a chat to start a conversation.</h3>
														</center>
													</div>
													<?php
												}
											}

											if (isset($_POST['send_reply'])) {
												$msg_con_id = $_POST['msg_id'];
												$msg_con_name = $_POST['msg_con_name'];
												$msg_num = $_POST['msg_num'];
												$msg_reply = $_POST['msg_reply'];
												$sql = $db->prepare("SELECT * FROM message_concern WHERE concern_number = ? AND concern_id =?");
												$sql->bind_param('ss',$msg_num, $msg_con_id);
												$sql->execute();
												$result = $sql->get_result();
												if ($result->num_rows > 0) {
													while($row = $result->fetch_assoc()){
														$p_contact = $row['concern_number'];
														$concern = $row['concern_comment'];
														$ch = curl_init();
														$parameters = array(
															'apikey' => '',
															'number' => "$p_contact",
															'message' => "Hi $msg_con_name,\n\n$msg_reply\n\n- E. Zarate Hospital",
															'sendername' => 'EZHospital'
														);
														curl_setopt( $ch, CURLOPT_URL,'https://api.semaphore.co/api/v4/messages' );
														curl_setopt( $ch, CURLOPT_POST, 1 );
														curl_setopt( $ch, CURLOPT_POSTFIELDS, http_build_query( $parameters ) );
														curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
														$output = curl_exec( $ch );
														curl_close ($ch);
														if ($output) {
															$admin_name = $_SESSION['admin_name'];
															$admin_email = $_SESSION['admin_email'];
															$date_created = date("Y-m-d h:i:sa");
															$field = "MESSAGE";
															$description = "Message has been replied.<br>Name: ".$msg_con_name."<br>Phone Number: ".$msg_num."<br>Concern: ".$concern."<br>Reply Message: ".$msg_reply;
															$syslog = $db->prepare('INSERT INTO systemlogs (name, email, date_created, uniqueID, field, description)VALUES(?,?,?,?,?,?)');
															$syslog->bind_param('ssssss', $admin_name, $admin_email, $date_created, $msg_con_id, $field, $description );
															$syslog->execute();
															echo "<script>
															$(document).ready(function() {
																msg_replied();
																});    
																</script>"; 
																$msg_status = 'REPLIED';
																$stmt = $db->prepare("UPDATE message_concern SET msg_status=?, reply=? WHERE concern_id =? AND concern_number =?");
																$stmt->bind_param('ssss',$msg_status, $msg_reply, $msg_con_id, $msg_num);
																$stmt->execute();
															}
            // echo 'Message has been sent';

															?>
															<?php 
														}

													} else {
														echo "<script>
														$(document).ready(function() {
															wcred();
															});    
															</script>";
														}
													}
													if (isset($_POST['archive_msg'])) {
														$msg_id = $_POST['msg_id'];
														$msg_num = $_POST['msg_num'];
														$msg_status = 'ARCHIVED_MSG';
														$admin_name = $_SESSION['admin_name'];

														$prev_log_sql = $db->prepare("SELECT * from message_concern where concern_id=?");
														$prev_log_sql->bind_param('s', $msg_id);
														$prev_log_sql->execute();
														$prev_log_sql_result = $prev_log_sql->get_result();
														if ($prev_log_sql_result->num_rows  > 0) {
															while($row = $prev_log_sql_result->fetch_assoc()){
																$name = $row['concern_name'];
																$num = $row['concern_number'];
																$concern_com = $row['concern_comment'];
																$status = $row['msg_status'];
																$msg_reply = $row['reply'];
																$date_created = date("Y-m-d h:i:sa");
																$prev_log_desc = "Previous Message Information.<br>Name: ".$name."<br>Phone Number: ".$num."<br>Concern: ".$concern_com."<br>Reply Message: ".$msg_reply."<br>Status: ".$status;
																$prev_log = $db->prepare('INSERT INTO prev_logs (uniqueID, name, date_created, description)VALUES(?,?,?,?)');
																$prev_log->bind_param('ssss', $msg_id, $admin_name, $date_created, $prev_log_desc );
																$prev_log->execute();
															}
														}

														$arch_msg = $db->prepare('UPDATE message_concern SET msg_status =? WHERE concern_id=? AND concern_number=?');
														$arch_msg->bind_param('sss', $msg_status, $msg_id, $msg_num );
														$arch_msg->execute();

														if ($arch_msg) {
															$admin_email = $_SESSION['admin_email'];
															$date_created = date("Y-m-d h:i:sa");
															$field = "MESSAGE";
															$description = "Updated Message Information. "."<br>Name: ".$name."<br>Concern: ".$concern_com."<br>Status :".$msg_status."<br><a href='history?ID=$msg_id'>View History</a>";
															$syslog = $db->prepare('INSERT INTO systemlogs (name, email, date_created, uniqueID, field, description)VALUES(?,?,?,?,?,?)');
															$syslog->bind_param('ssssss', $admin_name, $admin_email, $date_created, $msg_id, $field, $description );
															$syslog->execute();
															echo "<script>
															$(document).ready(function() {
																msg_archive();
																});    
																</script>";        	
															}
														}

														if (isset($_POST['unarchive_msg'])) {
															$msg_id = $_POST['msg_id'];
															$msg_num = $_POST['msg_num'];
															$msg_status = 'MSG';
															$admin_name = $_SESSION['admin_name'];

															$prev_log_sql = $db->prepare("SELECT * from message_concern where concern_id=?");
															$prev_log_sql->bind_param('s', $msg_id);
															$prev_log_sql->execute();
															$prev_log_sql_result = $prev_log_sql->get_result();
															if ($prev_log_sql_result->num_rows  > 0) {
																while($row = $prev_log_sql_result->fetch_assoc()){
																	$name = $row['concern_name'];
																	$num = $row['concern_number'];
																	$concern_com = $row['concern_comment'];
																	$status = $row['msg_status'];
																	$msg_reply = $row['reply'];
																	$date_created = date("Y-m-d h:i:sa");
																	$prev_log_desc = "Previous Message Information.<br>Name: ".$name."<br>Phone Number: ".$num."<br>Concern: ".$concern_com."<br>Reply Message: ".$msg_reply."<br>Status: ".$status;
																	$prev_log = $db->prepare('INSERT INTO prev_logs (uniqueID, name, date_created, description)VALUES(?,?,?,?)');
																	$prev_log->bind_param('ssss', $msg_id, $admin_name, $date_created, $prev_log_desc );
																	$prev_log->execute();
																}
															}

															$arch_msg = $db->prepare('UPDATE message_concern SET msg_status =? WHERE concern_id=? AND concern_number=?');
															$arch_msg->bind_param('sss', $msg_status, $msg_id, $msg_num );
															$arch_msg->execute();

															if ($arch_msg) {
																$admin_email = $_SESSION['admin_email'];
																$date_created = date("Y-m-d h:i:sa");
																$field = "MESSAGE";
																$description = "Updated Message Information. "."<br>Name: ".$name."<br>Concern: ".$concern_com."<br>Status :".$msg_status."<br><a href='history?ID=$msg_id'>View History</a>";
																$syslog = $db->prepare('INSERT INTO systemlogs (name, email, date_created, uniqueID, field, description)VALUES(?,?,?,?,?,?)');
																$syslog->bind_param('ssssss', $admin_name, $admin_email, $date_created, $msg_id, $field, $description );
																$syslog->execute();
																echo "<script>
																$(document).ready(function() {
																	msg_unarchive();
																	});    
																	</script>";        	
																}
															}

															if (isset($_POST['delete_msg'])) {
																$msg_id = $_POST['msg_id'];
																$msg_num = $_POST['msg_num'];
																$msg_status = 'ARCHIVED';
																$stat = "DELETED";
																$admin_name = $_SESSION['admin_name'];

																$prev_log_sql=$db->prepare("SELECT * from message_concern where concern_id=?");
																$prev_log_sql->bind_param('s', $msg_id);
																$prev_log_sql->execute();
																$prev_log_sql_result = $prev_log_sql->get_result();
																if ($prev_log_sql_result->num_rows  > 0) {
																	while($row = $prev_log_sql_result->fetch_assoc()){
																		$name = $row['concern_name'];
																		$num = $row['concern_number'];
																		$concern_com = $row['concern_comment'];
																		$status = $row['msg_status'];
																		$msg_reply = $row['reply'];
																		$date_created = date("Y-m-d h:i:sa");
																		$prev_log_desc = "Previous Message Information.<br>Name: ".$name."<br>Phone Number: ".$num."<br>Concern: ".$concern_com."<br>Reply Message: ".$msg_reply."<br>Status: ".$status;
																		$prev_log = $db->prepare('INSERT INTO prev_logs (uniqueID, name, date_created, description)VALUES(?,?,?,?)');
																		$prev_log->bind_param('ssss', $msg_id, $admin_name, $date_created, $prev_log_desc );
																		$prev_log->execute();
																	}
																}
																$arch_msg = $db->prepare('UPDATE message_concern SET msg_status =? WHERE concern_id=? AND concern_number=?');
																$arch_msg->bind_param('sss', $msg_status, $msg_id, $msg_num );
																$arch_msg->execute();

																if ($arch_msg) {
																	$admin_email = $_SESSION['admin_email'];
																	$date_created = date("Y-m-d h:i:sa");
																	$field = "MESSAGE";
																	$description = "Updated Message Information. "."<br>Name: ".$name."<br>Concern: ".$concern_com."<br>Status :".$stat."<br><a href='history?ID=$msg_id'>View History</a>";
																	$syslog = $db->prepare('INSERT INTO systemlogs (name, email, date_created, uniqueID, field, description)VALUES(?,?,?,?,?,?)');
																	$syslog->bind_param('ssssss', $admin_name, $admin_email, $date_created, $msg_id, $field, $description );
																	$syslog->execute();
																	echo "<script>
																	$(document).ready(function() {
																		msg_delete();
																		});    
																		</script>";        	
																	}
																}
																?>
															</div>
														</div>
													</div>
												</div>
											</div>
											<!-- end of body -->
										</div>
									</div>
								</div>
							</div>
							<!-- /#page-content-wrapper -->
						</div>

						<!-- /#wrapper -->
						<!-- Menu Toggle Script -->
						<script>

							const chkbxAll = document.querySelector("#checkAll");
							const chkbxOptions = document.querySelectorAll(".select-msg");

							function selectAllChkbxs(){
								const	isCheked = chkbxAll.checked;
								for( let i = 0; i < chkbxOptions.length; i++){
									chkbxOptions[i].checked = isCheked;
								}
							}



// JavaScript code
function search_chat() {
	let input = document.getElementById('searchbar').value
	input=input.toLowerCase();
	let x = document.getElementsByClassName('list-msg');

	for (i = 0; i < x.length; i++) { 
		if (!x[i].innerHTML.toLowerCase().includes(input)) {
			x[i].style.display="none";
		}
		else {
			x[i].style.display="list-item";                 
		}
	}
}
function search_newchat() {
	let input = document.getElementById('searchbar_newmsg').value
	input=input.toLowerCase();
	let x = document.getElementsByClassName('list-newmsg');

	for (i = 0; i < x.length; i++) { 
		if (!x[i].innerHTML.toLowerCase().includes(input)) {
			x[i].style.display="none";
		}
		else {
			x[i].style.display="list-item";                 
		}
	}
}function search_archchat() {
	let input = document.getElementById('searchbar_archmsg').value
	input=input.toLowerCase();
	let x = document.getElementsByClassName('list-archmsg');

	for (i = 0; i < x.length; i++) { 
		if (!x[i].innerHTML.toLowerCase().includes(input)) {
			x[i].style.display="none";
		}
		else {
			x[i].style.display="list-item";                 
		}
	}
}

function myFunction() {
	var x = document.getElementById("editDoctor");
	if (x.style.display === "block") {
		x.style.display = "none";
	} else {
		x.style.display = "block";
	}
}
$("document").ready(function() {
	$(".bottomright").click(function() {
		$("html").animate({ scrollTop: 0 }, "slow");
	});
});
$("document").ready(function(){
	var found = {};
	$('#dropdown_value').each(function(){
		var $this = $(this);
		if(found[$this.attr('value')]){
			$this.remove();
		}else{
			found[$this.attr('value')] = true;
		}
	});
});
function newsExist(){
	Swal.fire({
		icon: 'error',
		title: 'Oops!',
		text: 'News already existed.',
		width: '400px',
		confirmButtonColor: '#2dabe0'
	});
}
function eventExist(){
	Swal.fire({
		icon: 'error',
		title: 'Oops!',
		text: 'Event already existed.',
		width: '400px',
		confirmButtonColor: '#2dabe0'
	});
}
function departmentInfoExist(){
	Swal.fire({
		icon: 'error',
		title: 'Oops!',
		text: 'Department service type already existed.',
		width: '400px',
		confirmButtonColor: '#2dabe0'
	});
}
function Registration(){
	Swal.fire(
		'Good job!',
		'Registration Complete!',
		'success'

		);
}




function msg_archive(){
	Swal.fire({
		title: 'Message Archived!',
		icon: 'success',
		confirmButtonColor: '#3085d6',
		confirmButtonText: 'Okay, got it.'
	}).then((result) => {
		if (result.value===true) { 
			window.location.href = 'message';
		}
	})
}


function msg_unarchive(){
	Swal.fire({
		title: 'Message Unarchived!',
		icon: 'success',
		confirmButtonColor: '#3085d6',
		confirmButtonText: 'Okay, got it.'
	}).then((result) => {
		if (result.value===true) { 
			window.location.href = 'message';
		}
	})
}
function msg_replied(){
	Swal.fire({
		title: 'Reply has been sent!',
		icon: 'success',
		confirmButtonColor: '#3085d6',
		confirmButtonText: 'Okay, got it.'
	}).then((result) => {
		if (result.value===true) { 
			window.location.href = 'message';
		}
	})
}


function msg_delete(){
	Swal.fire({
		title: 'Message Deleted!',
		icon: 'success',
		confirmButtonColor: '#3085d6',
		confirmButtonText: 'Okay, got it.'
	}).then((result) => {
		if (result.value===true) { 
			window.location.href = 'message';
		}
	})
}


function newsEdited(){
	Swal.fire(
		'Good job!',
		'News Updated!',
		'success'

		);
}
function uploadNewsEvent(){
	Swal.fire(
		'Upload Complete!',
		'Uploading data is complete!',
		'success'

		);
}
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
