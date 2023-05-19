<?php 
ob_start();
session_start();
?>
<?php 
include "database/db.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Services Offered</title>
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
	?>

	<div class="container">
		<div class="row">
			<legend>Services Offered</legend>
					<div class="col-md-6"  style="padding: 20px;">
						<h4 class="accordion2" style="color:#335e90"> Seminar/Workshop/Training on <span class="fa fa-caret-down"></span></h4>
						<div class="panel2 panel_boxs2">
							<ul>
								<li>Gender and Sensitivity</li>
								<li>Gender Analysis and GA Tools</li>
								<li>Harmonized GAD Guidelines</li>
								<li>Gender Mainstreaming Evaluation Framework</li>
								<li>Gender Mainstreaming</li>
								<li>Integration of GAD in Instruction</li>
								<li>Integration of GAD in Research</li>
								<li>Integration of GAD in Extension</li>
								<li>Responsible Parenthood and Family Planning</li>
							</ul>
						</div>
					</div>
					<div class="col-md-6"  style="padding: 20px;">
						<h4 class="accordion2" style="color:#335e90"> Orientation on <span class="fa fa-caret-down"></span></h4>
						<div class="panel2 panel_boxs2">
							<ul>
								<li>Gender and Development</li>
								<li>Anti-Sexual Harrasment Act of 1995 (RA 7877) </li>
								<li>Anti-Violence Against Women and their Children Act of 2005 (RA 9262)</li>
								<li>Anti-Rape Law of 1997 (RA 8353)</li>
								<li>Anti-Trafficking in Persons Act of 2003 (RA 9208)</li>
								<li>Anti-Bullying Act of 2013 (RA 10627)</li>
								<li>Sexual Orientation, Gender Identity and Expression</li>
								<li>Magna Carta of Women</li>
								<li>MOVE Katropa</li>
							</ul>
						</div>
					</div>
		</div>
	</div>


	<br><br>
	

		<br><br><br><br><br><br>
		<?php include "plugins/footer.php"?>
<script type="text/javascript" src="js/home-contactus.js"></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDrzBRd-5Zwq-ABwR28gRis9rqqNUwdN9E&callback=initMap" type="text/javascript"></script>
</body>
</html>