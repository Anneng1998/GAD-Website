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

	<style>
		#check {
			display: none;
		}

		#text-content {
			display: none;
			transition: 0.5s linear;
		}

		#check:checked ~ #text-content {
			display: block;
		}

		#check:checked ~ #content {
			display: none;
		}
	</style>
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
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-1" ></div>
			<div class="col-md-5" >
				
				<h3>News</h3>
					<hr>
					<?php
                    $news_query = mysqli_query($db, "Select * from tbl_news where statuss = 'unarchive' order by id");
                    foreach ($news_query as $news_data)
					if (mysqli_num_rows($news_query) > 0)
					{
                	?>
						<div class="card">
                            <div class="card-header">
								<?php 
                                    $itolitrato = $news_data['imagess'];

                                    if ( $itolitrato == ''){
                                ?>
                                    <img src="files/news/no-image-available.jpeg" class="card-img-top" alt="..." style="width: 338px;height: 254px;margin-left: 30%;padding: 10px;">
                                <?php       
                                    }else{
                                ?>
                                    <img src="files/news/<?php echo $news_data['imagess'] ?>" class="card-img-top" alt="..." style="width: 338px;height: 254px;margin-left: 30%;padding: 10px;">
                                <?php
                                    }

                                ?>
                                <h2> <?php echo $news_data['news_title'] ?> </h2>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $news_data['news_date'] ?></h5>
								<input type="checkbox" id="check">
                                <p class="card-text" id="content">
									<?php
										$a = $news_data['news_desc'];
										$string=strip_tags($a);
										// echo strlen($string);
										if(strlen($string) > 200):
											$stringcut=substr($a,0,200);
											$endpoint=strrpos($stringcut,'');
											$string=$endpoint?substr($stringcut,0,$endpoint):substr($stringcut,0);
											$string .= '...';
										endif;
										echo $string;
									?>
								</p>
								
								<p class="card-text" id="text-content">
									<?php echo $news_data['news_desc']; ?>
								</p>
								<label for="check" style="cursor: pointer">Read More...</label>
								<br>
                                <a class="card-text" href="<?php echo $news_data['news_vid_link'] ?>">Click the Video</a>
                            </div>
                        </div>
						<hr style="height:2px;border-width:0;color:gray;background-color:gray">
					<?php
				}else {
					echo "<h2>No events as of today.</h2>";
				}
				?>
			</div>
			<div class="col-md-1" >
			</div>
			<div class="col-md-4">
				<h3>Programs and Events</h3>
				<hr>
					<?php
                    $news_query = mysqli_query($db, "Select * from tbl_events where statuss = 'unarchive' order by id");
                    foreach ($news_query as $events_data)
					if (mysqli_num_rows($news_query) > 0)
					{
                	?>
						<div class="card" >
                            <img class="card-img-top" src="files/events/<?php echo $events_data['images'] ?>" alt="Card image cap" style="width: 338px;height: 254px;margin-left:30%;padding: 10px;">
                            <div class="card-body">
                                <h2 class="card-title"><?php echo $events_data['event_title'] ?></h2>
                                <h5 class="card-title"><?php echo $events_data['date_created'] ?></h5>
                                <!-- <p class="card-text"></?php echo $events_data['event_desc'] ?></p> -->
								<input type="checkbox" id="check">
                                <p class="card-text" id="content">
									<?php
										$a = $events_data['event_desc'];
										$string=strip_tags($a);
										// echo strlen($string);
										if(strlen($string) > 200):
											$stringcut=substr($a,0,200);
											$endpoint=strrpos($stringcut,'');
											$string=$endpoint?substr($stringcut,0,$endpoint):substr($stringcut,0);
											$string .= '...';
										endif;
										echo $string;
									?>
								</p>
                            </div>
                        </div>
						<hr style="height:2px;border-width:0;color:gray;background-color:gray">
					<?php
					}else {
						echo "<h2>No events as of today.</h2>";
					}
					?>
			</div>
		</div>
	</div>
	<br><br><br>

	<legend></legend>

	<div class="container">
		<div class="row">
			<div class="col-md-6"  style="padding: 20px;">
				<li class="dropdown">
					<h3 class="dropdown-toggle" data-toggle="dropdown" href="#">Seminar/Workshop/Training on<span class="fa fa-caret-down"></span></h3>
					<ul class="dropdown-menu dropdown-menu-right"  id="dropdown-menu">
						<li><a href="#">Gender and Sensitivity</a></li>
						<li class="divider"></li>
						<li><a href="#">Gender Analysis and GA Tools</a></li>
						<li class="divider"></li>
						<li><a href="#">Harmonized GAD Guidelines</a></li>
						<li class="divider"></li>
						<li><a href="#">Gender Mainstreaming Evaluation Framework</a></li>
						<li class="divider"></li>
						<li><a href="#">Gender Mainstreaming</a></li>
						<li class="divider"></li>
						<li><a href="#">Integration of GAD in Instruction</a></li>
						<li class="divider"></li>
						<li><a href="#">Integration of GAD in Research</a></li>
						<li class="divider"></li>
						<li><a href="#">Integration of GAD in Extension</a></li>
						<li class="divider"></li>
						<li><a href="#">Responsible Parenthood and Family Planning</a></li>
					</ul>
				</li>
			</div>
			<div class="col-md-6"  style="padding: 20px;">
				<li class="dropdown">
					<h3 class="dropdown-toggle" data-toggle="dropdown" href="#">Orientation on <span class="fa fa-caret-down"></span></h3>
					<ul class="dropdown-menu dropdown-menu-right"  id="dropdown-menu">
						<li><a href="#">Gender and Development</a></li>
						<li class="divider"></li>
						<li><a href="#">Anti-Sexual Harrasment Act of 1995 (RA 7877) </a></li>
						<li class="divider"></li>
						<li><a href="#">Anti-Violence Against Women and their Children Act of 2005 (RA 9262)</a></li>
						<li class="divider"></li>
						<li><a href="#">Anti-Rape Law of 1997 (RA 8353)</a></li>
						<li class="divider"></li>
						<li><a href="#">Anti-Trafficking in Persons Act of 2003 (RA 9208)</a></li>
						<li class="divider"></li>
						<li><a href="#">Anti-Bullying Act of 2013 (RA 10627)</a></li>
						<li class="divider"></li>
						<li><a href="#">Sexual Orientation, Gender Identity and Expression</a></li>
						<li class="divider"></li>
						<li><a href="#">Magna Carta of Women</a></li>
						<li class="divider"></li>
						<li><a href="#">MOVE Katropa</a></li>
					</ul>
				</li>
			</div>
		</div>
	</div>

	<!-- <div class="container-fluid">
		<div class="row">
			<legend></legend>
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
	</div> -->

	<br><br><br>

	<!-- <div class="bottomright"><button class="fa fa-arrow-up"></button></div>
	<div id="fb-root"></div> -->
	<!-- Messenger Chat Plugin Code -->
	<!-- <div id="fb-root"></div> -->

	<!-- Your Chat Plugin code -->
	<!-- <div id="fb-customer-chat" class="fb-customerchat">
	</div> -->

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