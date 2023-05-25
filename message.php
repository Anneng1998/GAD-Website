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

<?php
    $message = "Select * from message_concern  order by concern_id";
    $message_query = mysqli_query($db, $message);
    while ($messages = mysqli_fetch_assoc($message_query)){
?>

<div class="row">
    <div class="col-2">
        <div class="email-menu-list mt-3">
            <?php
                foreach ($data as $messages){
                    echo $data;
            ?>
            <?php 
                    }
                }
            ?> 
        </div>
    </div>
    
    <div class="col-10">   
        <div class="mt-3" id="readmessage">
            <!-- </?php 
            $id = $_GET['id']; 
            echo $id;
            ?> -->
        </div>
    </div>
</div>
<!-- </?php 
    }
?> -->

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