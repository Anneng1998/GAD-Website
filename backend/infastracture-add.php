<div id="primary-header-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="primary-header-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-colored-header bg-primary">
                <h4 class="modal-title" id="primary-header-modalLabel">ADD INFASTRACTURE PROPOSAL</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>

            <form action="infastracture.php" method="post"  id="myAwesomeDropzone" enctype="multipart/form-data">
            <!-- class="dropzone" -->
            <div class="modal-body">

                <div class="mb-3">
                    <label for="simpleinput" class="form-label">Title</label>
                    <input type="text" name="researchtitle" id="simpleinput" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="simpleinput" class="form-label">Proponent (Researcher)</label>
                    <input type="text" name="researchdescription" id="simpleinput" class="form-control">
                </div>

                <div class="mb-3">
                        <label for="example-select" class="form-label">Date Of Approval</label>
                        <input type="text" class="form-control date" name="completiondate" id="birthdatepicker" data-toggle="date-picker" data-single-date-picker="true">
                </div>

                <div class="mb-3">
                    <label for="simpleinput" class="form-label">Description</label>
                    <input type="text" name="researchdescription" id="simpleinput" class="form-control">
                </div>

                <div class="mb-3">
                        <label for="example-select" class="form-label">Target Completion</label>
                        <input type="text" class="form-control date" name="completiondate" id="birthdatepicker" data-toggle="date-picker" data-single-date-picker="true">
                </div>

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
                <button name="mediaupload" class="btn btn-primary">UPLOAD</button>
            </div>

            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->