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
	<title>CvSU-CCC GAD Unit</title>
	<meta charset="utf-8">
	<link rel="icon" href="img/gad logo.jpg">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/top-navbar.css">
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
	<?php include "home-navbar.php";
	?>


	<div class="container-fluid" id="carousel">
		<div class="row">
			<div class="col-md-12" id="image-right">
				<div id="myCarousel" class="carousel slide carousel-fade " data-ride="carousel">

					<ol class="carousel-indicators">
						<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
						<li data-target="#myCarousel" data-slide-to="1"></li>
						<li data-target="#myCarousel" data-slide-to="2"></li>
					</ol>

					<div class="carousel-inner" >
						<div class="item active">
							<img src="img/wmonth.jpg" style="opacity: 0.8">
						</div>
						<div class="item">
							<img src="img/savespaceact.jpg" style="opacity: 0.8">
						</div>
						<div class="item">
							<img src="img/banner.jpg" style="opacity: 0.8">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


	<br><br><br>
	<div class="container">
		<div class="row">
			<div class="col-md-1" ></div>
			<div class="col-md-4" >
				<?php 
				$not_stat = "ARCHIVED";
				$events_sql = $db->prepare("SELECT * FROM tbl_events WHERE status !=? ORDER BY id ASC");
				$events_sql->bind_param('s',$not_stat);
				$events_sql->execute();
				$events_sql_result = $events_sql->get_result();
				if ($events_sql_result->num_rows  > 0) {
					?> 
					<h3>Programs and Events</h3>
					<hr>
					<?php while($events_row = $events_sql_result->fetch_assoc()){ ?>
						<div class="event">
							<center>
								<img src="admin/<?php echo ($events_row['image']); ?>" class="img img-responsive img-event"/>
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
				$not_stat = "ARCHIVED";
				$newsupdates_sql = $db->prepare("SELECT * FROM tbl_news WHERE status !=? ORDER BY id ASC");
				$newsupdates_sql->bind_param('s',$not_stat);
				$newsupdates_sql->execute();
				$newsupdates_sql_result = $newsupdates_sql->get_result();
				if ($newsupdates_sql_result->num_rows  > 0) {
					?> 
					<h3>Latest News</h3>
					<hr>
					<?php while($newsupdates_row = $newsupdates_sql_result->fetch_assoc()){ ?>
						<div class="event">
							<?php if ($newsupdates_row['news_vid_link']) {
								$news_link = $newsupdates_row['news_vid_link'];
								echo "<div class='fb-video' data-href='$news_link' data-width='500' data-show-text='false'>
								</div>";
							}?>
							<h4><b><?php echo $newsupdates_row['news_title']; ?></b>&nbsp;<span style="color: gray;font-size: 12px"><?php echo $newsupdates_row['news_date'];?></span></h4>
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
	<br><br><br>

	<div class="container">
		<div class="row">
			<legend>Services Offered</legend>
					<div class="col-md-6"  style="padding: 20px;">
						<h4 class="accordion " style="color:#335e90"> Seminar/Workshop/Training on <span class="fa fa-caret-down"></span></h4>
						<div class="panel panel_boxs ">
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
						<h4 class="accordion " style="color:#335e90"> Orientation on <span class="fa fa-caret-down"></span></h4>
						<div class="panel panel_boxs ">
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
	</div>

	<br><br><br>

	<div class="bottomright"><button class="fa fa-arrow-up"></button></div>
	<div id="fb-root"></div>
	<!-- Messenger Chat Plugin Code -->
	<div id="fb-root"></div>

	<!-- Your Chat Plugin code -->
	<div id="fb-customer-chat" class="fb-customerchat">
	</div>

	<script>
		var chatbox = document.getElementById('fb-customer-chat');
		chatbox.setAttribute("page_id", "110326821912479");
		chatbox.setAttribute("attribution", "biz_inbox");
	</script>

	<!-- Your SDK code -->
	<script>
		window.fbAsyncInit = function() {
			FB.init({
				xfbml            : true,
				version          : 'v15.0'
			});
		};

		(function(d, s, id) {
			var js, fjs = d.getElementsByTagName(s)[0];
			if (d.getElementById(id)) return;
			js = d.createElement(s); js.id = id;
			js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
			fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));
	</script>
	
	<script type="text/javascript" src="js/home-index.js"></script>
	<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v14.0" nonce="AQw4OiJF"></script>

	<?php include "plugins/footer.php"?>
</body>
</html>