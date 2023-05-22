<div id="newsedit<?php echo $news_data['id'] ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="info-header-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-colored-header bg-danger">
                <h4 class="modal-title" id="info-header-modalLabel">Warning</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>

            <div class="modal-body">
                <form action="backend/news-edit-process.php?id=<?php echo $news_data['id'] ?>" method="GET">

                    <div class="mb-3">
                        <input type="hidden" name="id" id="simpleinput" class="form-control" value="<?php echo $news_data['id']?>">
                    </div>

                    <div class="mb-3">
                        <label for="simpleinput" class="form-label">Title</label><span class="text-danger"> *</span>
                        <input type="text" name="title" id="simpleinput" class="form-control" value="<?php echo $news_data['news_title']?>">
                    </div>

                    <div class="mb-3">
                        <label for="simpleinput" class="form-label">Description</label> <span class="text-danger"> *</span>
                        <input type="text" name="description" id="simpleinput" class="form-control" value="<?php echo $news_data['news_desc']?>">
                    </div>

                    <div class="mb-3">
                        <label for="simpleinput" class="form-label">Link(Optional)</label>
                        <input type="text" name="link" id="simpleinput" class="form-control" value="<?php echo $news_data['news_vid_link']?>">
                    </div>
            </div>

            <div class="modal-footer">
                    <button name="updatenews" class="btn btn-danger">UPDATE</button>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->  