<div id="primary1-header-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="primary1-header-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-colored-header bg-primary">
                <h4 class="modal-title" id="primary1-header-modalLabel">View News Information</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>

            <form action="news.php" method="post" class="dropzone" id="myAwesomeDropzone" enctype="multipart/form-data">

            <div class="modal-body">

                <div class="mb-3">

                    
                    <select class="form-select" name="funding">
                        <option value= "">Select News</option>
                        <?php
                            $question_sql = mysqli_query($db, "SELECT news_title FROM tbl_news order by id");
                            foreach ($question_sql as $data_qa) {
                        ?>
                        <option value = "<?php echo $data_qa['news_title'] ?>"><?php echo $data_qa['news_title'] ?></option>
                        <?php
                            }
                        ?>
                    </select>

                    
                </div>
                
            </div>

            <div class="modal-footer">
                <button name="view-news" class="btn btn-primary">View News</button>
            </div>

            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->