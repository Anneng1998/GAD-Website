<div id="warning1-header-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="warning1-header-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-colored-header bg-warning">
                <h4 class="modal-title" id="warning1-header-modalLabel">View News Information</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>

            <form action="news.php" method="post" class="dropzone" id="myAwesomeDropzone" enctype="multipart/form-data">

            <div class="modal-body">

                <div class="mb-3">

                    
                    <select class="form-select" name="funding">
                        <option value= "">Select News</option>
                        <?php
                            $question_sql = mysqli_query($db, "SELECT event_title FROM tbl_events order by id");
                            foreach ($question_sql as $data_qa) {
                        ?>
                        <option value = "<?php echo $data_qa['event_title'] ?>"><?php echo $data_qa['event_title'] ?></option>
                        <?php
                            }
                        ?>
                    </select>

                    
                </div>
                
            </div>

            <div class="modal-footer">
                <button name="view-events" class="btn btn-warning">View Events</button>
            </div>

            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->