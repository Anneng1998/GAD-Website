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
                <h4 class="page-title">MESSAES</h4>
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
    <?php 
        $id = $_GET['id'];
        $message_content = mysqli_query($db, "Select * from message_concern where concern_id = '$id'");
        $message_data = mysqli_fetch_array($message_content);
    ?>
    <div class="col-10">   
        <div class="mt-3">
        <h5 class="font-18">Subject: <?php echo $message_data['subject'];?></h5>
        <hr>
        <div class="d-flex mb-3 mt-1">
            <div class="w-100 overflow-hidden">
                <small class="float-end"><?php echo $message_data['date_created'];?></small>
                <h6 class="m-0 font-14"><?php echo $message_data['concern_name'];?></h6>
                <small class="text-muted">From: <?php echo $message_data['concern_number'];?></small>
            </div>
        </div>
        <p><?php echo $message_data['concern_comment'];?></p>
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