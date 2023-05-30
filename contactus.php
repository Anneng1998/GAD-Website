<?php include 'database/db.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title>Contact Us</title>
	<meta charset="utf-8">
	<link rel="icon" href="img/gad logo.jpg">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/top-navbar.css">
	<link rel="stylesheet" type="text/css" href="css/contactus.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<script src="js/sweetalert2.all.min.js"></script>
</head>

<body>
	<?php include "home-navbar.php"; 

		if (isset($_POST['concern-sent'])) {
		$con_name = $_POST['con_name'];
		$con_num = $_POST['con_num'];
		$subject = $_POST['subject'];
		$con_comment = $_POST['con_comment'];
		$msg_status = "NEW MSG";
		date_default_timezone_set("Asia/Manila");
		$date_created = date('m-d-Y H:i:s');

		$concern_sql = $db->prepare("INSERT INTO message_concern(concern_name, concern_number, subject, concern_comment, date_created, msg_status) VALUES (?,?,?,?,?,?)");
		$concern_sql->bind_param('ssssss', $con_name, $con_num, $subject, $con_comment, $date_created, $msg_status);
		$concern_sql->execute();
		if($concern_sql){
			echo "<script>
			$(document).ready(function() {
				concern_sent();
				});
				</script>";
				$concern_sql->close();
			}
		}


	?>


	<br><br>
	<div class="container" id="">
		<div class="row">
			<div class="col-md-6">
				<div id="map">
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3863.457160691743!2d120.87783237497116!3d14.458418586011229!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33962d58ecc6306b%3A0xb8dbaa89e5964e7f!2sCavite%20State%20University!5e0!3m2!1sen!2sph!4v1685405675498!5m2!1sen!2sph" width="700" height="550" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
				</div>
			</div>
			
			<div class="col-md-5" id="msg">
				<legend>Contact Us</legend>
				<h6><span class="fa fa-map-marker"></span>&emsp;PULO II, DALAHICAN, CAVITE CITY</h6>
				<h6><span class="fa fa-envelope"></span>&emsp;gad@cvsu.edu.ph</h6>
				<br>
				<form method="POST">
					<h5>Full Name&nbsp;<span class="fa fa-asterisk" style="font-size: 8px;color: indianred;"></span></h5>
					<input type="text" required name="con_name" class="input" style="width:65%; padding: 5px; border: 1px solid #335e90; border-radius: 3px;">
					<h5>Phone Number&nbsp;<span class="fa fa-asterisk" style="font-size: 8px;color: indianred;"></span></h5>
					<input type="text" required name="con_num" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="input" style="width:65%;padding: 5px; border: 1px solid #335e90; border-radius: 3px;">
					<h5>Subject</h5>
					<input type="text" required name="subject" class="input" style="width:65%;padding: 5px; border: 1px solid #335e90; border-radius: 3px;">
					<h5>Concern</h5>
					<textarea type="text" required name="con_comment" class="input" style="width:65%;padding: 5px; height: 100px; border: 1px solid #335e90; border-radius: 3px;"></textarea>
					<br><br>
					<input type="submit" name="concern-sent" value="Send" style="width: 65%; padding:6px;background: #335e90; color: white; border-radius:3px; border: unset;">
				</form>
			</div>
		</div>
	</div>

	

		<br><br><br><br><br><br>
		<?php include "plugins/footer.php"?>
<script type="text/javascript" src="js/home-contactus.js"></script>

<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDrzBRd-5Zwq-ABwR28gRis9rqqNUwdN9E&callback=initMap" type="text/javascript"></script>
</body>
</html>