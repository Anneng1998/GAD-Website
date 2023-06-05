<?php 
ob_start();
session_start();
?>

 
<?php include 'database/db.php'; 
?>
<!DOCTYPE html>
<html>
<head>
	<title>About Us</title>
	<meta charset="utf-8">
    <link rel="icon" href="img/gad_logo.png">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/top-navbar.css">
	<link rel="stylesheet" type="text/css" href="css/aboutus.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>

<body>
	<?php include "home-navbar.php" ?>
	<br><br>
	<div class="container" id="about" >
			<div class="col-md-5" >
				<h3>Vision</h3>
				<p>A gender responsive academic and research institution in the region where stakeholders enjoy
					equal responsibilities and opportunities.
				</p>
			</div>
			<div class="col-md-5" >
				<h3>Mission</h3>
				<p>CvSU-CCC shall integrate and advocate gender equity and equality principles and perspectives in the structure,
					policies, processes, programs, projects and activities in the university.
				</p>
			</div>
	</div>

	<br><br><br><br><br><br>
	<?php include "plugins/footer.php"?>

</body>
</html>