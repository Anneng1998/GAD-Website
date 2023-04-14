<div id="complete<?php echo $research_data['fldID'] ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="info-header-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-colored-header bg-info">
                <h4 class="modal-title" id="info-header-modalLabel">Upload the document to Complete</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>

            <div class="modal-body">
                <div class="row mb-3">
                    <label for="inputEmail3" class="col-6 col-form-label">Copy of Proposal</label>
                    <div class="col-6 fallback">
                        <input name="file" type="file" accept="pdf" multiple />
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputEmail3" class="col-6 col-form-label">Accomplished HGDG Design</label>
                    <div class="col-6 fallback">
                        <input name="hgdg" type="file" accept="pdf" multiple />
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <form action="" method="post">
                    <button href = "based-research-complete-form.php" name="complete" class="btn btn-info">Complete</button>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->  