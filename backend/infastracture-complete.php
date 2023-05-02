<div id="done<?php echo $infastracture_data['fldID'] ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="info-header-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-colored-header bg-danger">
                <h4 class="modal-title" id="info-header-modalLabel">WARNING!</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>

            <form action="backend/infastracture-complete-process.php?id=<?php echo $infastracture_data['fldID'] ?>&&title=<?php echo $infastracture_data['fldTitle'] ?>" method="post"  id="myAwesomeDropzone" enctype="multipart/form-data">

                <div class="modal-body">
                    <p>Complete the fields below to make it completed!</p>
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="example-select" class="form-label">Date Completed</label>
                            <input type="text" class="form-control date" name="datecompleted" id="birthdatepicker"data-toggle="date-picker" data-single-date-picker="true">
                        </div>
                    </div>

                    <div class="col-12">
                        <label for="inputEmail3" class="col-6 col-form-label">Accomplished Report</label>
                        <input name="report" type="file" accept="pdf" multiple />
                    </div>

                </div>

                <div class="modal-footer">
                    <button name="complete" class="btn btn-primary">COMPLETE</button>
                </div>

            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->  