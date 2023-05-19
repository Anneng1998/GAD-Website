<?php include 'database/db.php'; ?>
<!-- start ka dito mi -->

<!DOCTYPE html>
<html>
<head>
	<title>News and Updates</title>
	<meta charset="utf-8">
	<link rel="icon" href="img/gad logo.jpg">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/top-navbar.css">
	<link rel="stylesheet" type="text/css" href="css/newsandevents.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
	<?php include "home-navbar.php"; ?>

	<br>
	<div class="container">
		<div class="row">
			<div class="col-md-1" ></div>
			<div class="col-md-4" >
				<?php 
				$not_stat = "ARCHIVED";
				$events_sql = $db->prepare("SELECT * FROM events WHERE status !=? ORDER BY event_id ASC");
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
				$newsupdates_sql = $db->prepare("SELECT * FROM newsupdates WHERE status !=? ORDER BY nu_id ASC");
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
	<br><br><br>

	<div class="bottomright"><button class="fa fa-arrow-up"></button></div>
	<div id="fb-root"></div>
	<script type="text/javascript" src="js/home-news-and-events.js"></script>
	<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v14.0" nonce="AQw4OiJF"></script>
	<?php include "plugins/footer.php" ?>
</body>
</html>
