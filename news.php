<?php 
    include 'include/header.php';
    include 'include/sidebar.php';
    include 'include/navbar.php';
?>

<style>
    body > div.wrapper > div.content-page > div > div.card.d-block > div.row > div > div {
        padding: 0 15px;
    }
    #alternative-page-datatable_wrapper {
        padding: 0 15px;
    }
</style>

<br><br>
<div class="card d-block" style="box-shadow: 1px 2px 5px #333;">

 <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#primary-header-modal">Add New</button>
                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#warning-header-modal">Add Events</button>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#primary-header-modal">View News Information</button>
                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#primary-header-modal">View Events Information</button>    
            </div>
                <h4 class="page-title">News and Updates</h4>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-6">
        <div class="card d-block" style="box-shadow: 1px 2px 5px #333;"> <br>
            <h2 style="padding-left: 2%;">News</h2>

            <?php
                $news_query = mysqli_query($db, "Select * from tbl_news where statuss = 'unarchive' order by id");
            foreach ($news_query as $news_data){
            ?>

            <div class="card d-block" style="box-shadow: 1px 2px 5px #333; margin: 20px;">

                <div class="card">
                    <div class="card-header">
                        <h2> <?php echo $news_data['news_title'] ?> </h2>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $news_data['news_date'] ?></h5>
                        <p class="card-text"><?php echo $news_data['news_desc'] ?></p>
                        <p class="card-text"><?php echo $news_data['news_vid_link'] ?></p>
                    </div>
                </div>
            
            </div><br>
            <?php
                }
            ?>
    
        </div>
    </div>

    <div class="col-6">
        <div class="card d-block" style="box-shadow: 1px 2px 5px #333;"><br>
            <h2 style="padding-left: 2%;">Events</h2>

            <?php
                $events_query = mysqli_query($db, "Select * from tbl_events where statuss = 'unarchive' order by id");
            foreach ($events_query as $events_data){
            ?>

            <div class="card d-block" style="box-shadow: 1px 2px 5px #333; margin: 20px;">

            <div class="card" >
                <img class="card-img-top" src="files/events/<?php echo $events_data['images'] ?>" alt="Card image cap" style="height:">
                <div class="card-body">
                    <h2 class="card-title"><?php echo $events_data['date_created'] ?></h2>
                    <p class="card-text"><?php echo $events_data['event_desc'] ?></p>
                </div>
            </div>
                            
            </div><br>

            <?php
                }
            ?>

        </div>
    </div>
</div>





<?php 
    include 'backend/news-add.php';
    include 'backend/event-add.php';
    include 'include/footer.php';
?>