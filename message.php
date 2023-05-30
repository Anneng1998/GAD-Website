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
                </div>
                <h4 class="page-title">MESSAGES</h4>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-2">

        <div class="email-menu-list mt-3">
            <?php
                $inbox = mysqli_query($db, "Select * from message_concern order by concern_id");

                foreach ($inbox as $name) {
            ?>
            <a href="message-read.php?id=<?php echo $name['concern_id'] ?>" class="text-danger fw-bold"><?php echo $name['concern_name'] ?></a>
            <?php
                }
            ?>
        </div>
        
    </div>
    
    <div class="col-10">   
        
 
    </div>
</div>

<?php 
include 'include/footer.php';
?>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> 
<script>
    $(document).ready(function(){
        $('#readmessage').hide();
    });

    function button_one() {
        $("#readmessage").show();
    }
</script>