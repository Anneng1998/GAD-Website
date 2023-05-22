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
                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#primary-header-modal">Add Events</button>
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

            <div class="card d-block" style="box-shadow: 1px 2px 5px #333; margin: 20px;">

                <div class="card">
                    <div class="card-header">
                        News title
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">time and date</h5>
                        <p class="card-text">Description</p>
                    </div>
                </div>
            
            </div><br>

        </div>
    </div>

    <div class="col-6">
        <div class="card d-block" style="box-shadow: 1px 2px 5px #333;"><br>
            <h2 style="padding-left: 2%;">Events</h2>

            <div class="card d-block" style="box-shadow: 1px 2px 5px #333; margin: 20px;">

                <div class="card">
                    <div class="card-header">
                        Events title
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">time and date</h5>
                        <p class="card-text">Description</p>
                    </div>
                </div>
            
            </div><br>

        </div>
    </div>
</div>





<?php 
include 'include/footer.php';
?>