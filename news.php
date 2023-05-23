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
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#primary-header-modal">Add News</button>
                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#warning-header-modal">ADD EVENTS</button>
                    <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#primary1-header-modal">View News Information</button>
                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#warning1-header-modal">View Events Information</button>     -->
                </div>
                <h4 class="page-title">News and Updates</h4>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="card d-block" style="box-shadow: 1px 2px 5px #333;">
            <h2 style="padding-left: 2%;">News</h2>

            <div class="row">
                <?php
                    $news_query = mysqli_query($db, "Select * from tbl_news where statuss = 'unarchive' order by id");
                    foreach ($news_query as $news_data){
                ?>
                <div class="col-sm-12 col-md-12 col-lg-12">
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
                            <div class="card-footer text-muted">
                                <button style = "float: right;" title="DELETE" class="btn btn-danger shadow btn-xs sharp me-1" data-bs-toggle="modal" data-bs-target="#newsdelete<?php echo $news_data['id'] ?>"><i class="dripicons-trash"></i></button>
                                <button style = "float: right;" title="EDIT" class="btn btn-warning shadow btn-xs sharp me-1" data-bs-toggle="modal" data-bs-target="#newsedit<?php echo $news_data['id'] ?>"><i class="dripicons-document-edit"></i></button>
                            </div>
                        </div>

                    </div>
                </div>
                <?php
                    include 'backend/news-delete.php';
                    include 'backend/news-edit.php';
                    }
                ?>
            </div>
        </div>
    </div>

    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="card d-block" style="box-shadow: 1px 2px 5px #333;">
            <h2 style="padding-left: 2%;">Events</h2>

            <div class="row">
                <?php
                    $events_query = mysqli_query($db, "Select * from tbl_events where statuss = 'unarchive' order by id");
                    foreach ($events_query as $events_data){
                ?>
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <div class="card d-block" style="box-shadow: 1px 2px 5px #333; margin: 20px;">

                            <div class="card" >
                                <img class="card-img-top" src="files/events/<?php echo $events_data['images'] ?>" alt="Card image cap" style="max-width:100%;">
                                <div class="card-body">
                                    <h2 class="card-title"><?php echo $events_data['event_title'] ?></h2>
                                    <h5 class="card-title"><?php echo $events_data['date_created'] ?></h5>
                                    <p class="card-text"><?php echo $events_data['event_desc'] ?></p>
                                </div>
                                <div class="card-footer text-muted">
                                    <button style = "float: right;" title="DELETE" class="btn btn-danger shadow btn-xs sharp me-1" data-bs-toggle="modal" data-bs-target="#eventsdelete<?php echo $events_data['id'] ?>"><i class="dripicons-trash"></i></button>
                                    <button style = "float: right;" title="EDIT" class="btn btn-warning shadow btn-xs sharp me-1" data-bs-toggle="modal" data-bs-target="#eventsedit<?php echo $events_data['id'] ?>"><i class="dripicons-document-edit"></i></button>
                                </div>
                            </div>
                                            
                        </div><br>
                    </div>
                <?php
                    include 'backend/event-delete.php';
                    include 'backend/event-edit.php';
                    }
                ?>
            </div>
        </div>
    </div>
</div>



<?php 
    include 'backend/news-add.php';
    include 'backend/event-add.php';
    include 'backend/news-view.php';
    include 'backend/event-view.php';
    include 'include/footer.php';
?>