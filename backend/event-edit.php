<div id="eventsedit<?php echo $events_data['id'] ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="info-header-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-colored-header bg-danger">
                <h4 class="modal-title" id="info-header-modalLabel">Warning</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>

            <div class="modal-body">
                <form action="backend/event-edit-process.php?id=<?php echo $events_data['id'] ?>" method="POST">

                    <div class="mb-3">
                        <input type="hidden" name="id" id="simpleinput" class="form-control" value="<?php echo $events_data['id']?>">
                    </div>

                    <div class="mb-3">
                        <label for="simpleinput" class="form-label">Title</label><span class="text-danger"> *</span>
                        <input type="text" name="title" id="simpleinput" class="form-control" value="<?php echo $events_data['event_title']?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="simpleinput" class="form-label">Description</label> <span class="text-danger"> *</span>
                        <input type="text" name="description" id="simpleinput" class="form-control" value="<?php echo $events_data['event_desc']?>" required>
                    </div>

                    <img src="files/events/<?php echo $events_data['images'] ?>" style="height:200px; width:200px;margin-left: 25%;"><br><br><br>

                    <!-- <div class="mb-3">
                        <label for="simpleinput" class="form-label">Attach Image</label>
                        <div class="fallback">
                            <input name="file" type="file" accept="image/png, image/gif, image/jpeg" multiple />
                        </div>
                            <span class="text-muted font-13">(Accepted file type: .JPG)</span>
                    </div>  -->
            </div>

            <div class="modal-footer">
                    <button name="updatenews" class="btn btn-danger">UPDATE</button>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->  