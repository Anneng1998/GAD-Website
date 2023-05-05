<?php 
    include 'include/header.php';
    include 'include/sidebar.php';
    include 'include/navbar.php';
?>

<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
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
            <h4 class="page-title">STAKEHOLDER PROFILING</h4>
        </div>
    </div>
</div>     
<!-- end page title -->

<h1 class="page-title" style="text-align:center;">FACULTY PROFILE</h1>
<br>
<h3 class="page-title" style="text-align:center;">Employee Information</h3>

<div class ="row">
    <div class="col-3">
        <div class="mb-3">
            <label for="simpleinput" class="form-label">First Name</label><span class="text-danger"> *</span>
            <input type="text" name="fname" id="simpleinput" class="form-control"  required>
        </div>
    </div>
    <div class="col-3">
        <div class="mb-3">
            <label for="simpleinput" class="form-label">Middle Name</label><span class="text-danger"> *</span>
            <input type="text" name="mname" id="simpleinput" class="form-control"  required>
        </div>
    </div>
    <div class="col-3">
        <div class="mb-3">
            <label for="simpleinput" class="form-label">Last Name</label><span class="text-danger"> *</span>
            <input type="text" name="lname" id="simpleinput" class="form-control"  required>
        </div>
    </div>
    <div class="col-3">
        <div class="mb-3">
            <label for="simpleinput" class="form-label">Extension Name</label><span class="text-danger"> *</span>
            <input type="text" name="Ename" id="simpleinput" class="form-control"  required>
        </div>
    </div>
</div>

<div class ="row">
    <div class = "col-2">
        <div class="mb-3">
            <label for="example-select" class="form-label">Sex</label><span class="text-danger"> *<span>
            <select class="form-select" name="gender" id="example-select">
                <option value= "">SELECT</option>
                <option value = "Female">Female</option>
                <option value = "Male">Male</option>
            </select>
        </div>
    </div>

    <div class = "col-2">
        <div class="mb-3">
            <label for="example-select" class="form-label">Civil Status</label><span class="text-danger"> *<span>
            <select class="form-select" name="civil" id="example-select">
                <option value= "">SELECT</option>
                <option value = "Single">Single</option>
                <option value = "Married">Married</option>
                <option value = "Widowed">Widowed</option>
                <option value = "Divorced">Divorced</option>
                <option value = "Separated">Separated</option>
            </select>
        </div>
    </div>

    <div class="col-4">
        <div class="mb-3">
            <label for="simpleinput" class="form-label">Citizenship</label><span class="text-danger"> *</span>
            <input type="text" name="citizenship" id="simpleinput" class="form-control"  required>
        </div>
    </div>

    <div class="col-4">
        <div class="mb-3">
            <label for="simpleinput" class="form-label">Religion</label><span class="text-danger"> *</span>
            <input type="text" name="religion" id="simpleinput" class="form-control"  required>
        </div>
    </div>
</div>

<div class = "row">
    <div class="col-2">
        <div class="mb-3">
            <label for="example-select" class="form-label">Date of Birth</label><span class="text-danger"> *</span>
            <input type="text" class="form-control date" name="birthday" id="birthdatepicker" data-toggle="date-picker" data-single-date-picker="true">
        </div>
    </div>

    <div class="col-3">
        <div class="mb-3">
            <label for="simpleinput" class="form-label">Plae of Birth</label><span class="text-danger"> *</span>
            <input type="text" name="place" id="simpleinput" class="form-control"  required>
        </div>
    </div>

    <div class="col-4">
        <div class="mb-3">
            <label for="simpleinput" class="form-label">Mobile Number</label><span class="text-danger"> *</span>
            <input type="number" name="mobile" id="simpleinput" class="form-control"  required>
        </div>
    </div>

    <div class="col-3">
        <div class="mb-3">
            <label for="simpleinput" class="form-label">Email Address</label><span class="text-danger"> *</span>
            <input type="email" name="email" id="simpleinput" class="form-control"  required>
        </div>
    </div>
</div>

<h4 class="page-title" style="text-align:center;">Contact Information</h4>
<h5 class="page-title" style="padding: 15px;">Residential Address</h5>

<div class = "row">
    <div class="col-3">
        <div class="mb-3">
            <label for="simpleinput" class="form-label">House/Block/Lot No.</label><span class="text-danger"> *</span>
            <input type="text" name="address1" id="simpleinput" class="form-control"  required>
        </div>
    </div>
    <div class="col-3">
        <div class="mb-3">
            <label for="simpleinput" class="form-label">Street</label><span class="text-danger"> *</span>
            <input type="text" name="address2" id="simpleinput" class="form-control"  required>
        </div>
    </div>
    <div class="col-3">
        <div class="mb-3">
            <label for="simpleinput" class="form-label">Subdivision/Village</label><span class="text-danger"> *</span>
            <input type="text" name="address3" id="simpleinput" class="form-control"  required>
        </div>
    </div>
    <div class="col-3">
        <div class="mb-3">
            <label for="simpleinput" class="form-label">City/Municipality</label><span class="text-danger"> *</span>
            <input type="text" name="address4" id="simpleinput" class="form-control"  required>
        </div>
    </div>
</div>

<div class = "row">
    <div class="col-5">
        <div class="mb-3">
            <label for="simpleinput" class="form-label">Province</label><span class="text-danger"> *</span>
            <input type="text" name="address5" id="simpleinput" class="form-control"  required>
        </div>
    </div>
    <div class="col-3">
        <div class="mb-3">
            <label for="simpleinput" class="form-label">Zip Code</label><span class="text-danger"> *</span>
            <input type="number" name="address6" id="simpleinput" class="form-control"  required>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        $('#checkbox1').change(function () {
            if (!this.checked) 
            //  ^
            $('#autoUpdate').fadeIn('fast');
            else 
                $('#autoUpdate').fadeOut('fast');
        });
    });
</script>


<div class="mt-3">
    <div class="form-check" style="padding: 15px; margin: 20px;">
        <input type="checkbox" id="checkbox1" class="form-check-input">
        <label class="form-check-label" for="customCheck1">Permnent address same as Residential Address</label>
    </div>
</div>

<div id="autoUpdate" class="autoUpdate" style="padding:15px;">
    <div class = "row">
        <div class="col-3">
            <div class="mb-3">
                <label for="simpleinput" class="form-label">House/Block/Lot No.</label><span class="text-danger"> *</span>
                <input type="text" name="address1" id="simpleinput" class="form-control"  required>
            </div>
        </div>
        <div class="col-3">
            <div class="mb-3">
                <label for="simpleinput" class="form-label">Street</label><span class="text-danger"> *</span>
                <input type="text" name="address2" id="simpleinput" class="form-control"  required>
            </div>
        </div>
        <div class="col-3">
            <div class="mb-3">
                <label for="simpleinput" class="form-label">Subdivision/Village</label><span class="text-danger"> *</span>
                <input type="text" name="address3" id="simpleinput" class="form-control"  required>
            </div>
        </div>
        <div class="col-3">
            <div class="mb-3">
                <label for="simpleinput" class="form-label">City/Municipality</label><span class="text-danger"> *</span>
                <input type="text" name="address4" id="simpleinput" class="form-control"  required>
            </div>
        </div>
    </div>

    <div class = "row" >
        <div class="col-5">
            <div class="mb-3">
                <label for="simpleinput" class="form-label">Province</label><span class="text-danger"> *</span>
                <input type="text" name="address5" id="simpleinput" class="form-control"  required>
            </div>
        </div>
        <div class="col-3">
            <div class="mb-3">
                <label for="simpleinput" class="form-label">Zip Code</label><span class="text-danger"> *</span>
                <input type="number" name="address6" id="simpleinput" class="form-control"  required>
            </div>
        </div>
    </div>
</div>

<h3 class="page-title" style="text-align:center;">Educational Attainment</h3>
<br>

<div class ="row">
    <div class = "col-5">
        <div class="mb-3">
            <label for="example-select" class="form-label">Highest Educational Attainment</label><span class="text-danger"> *<span>
            <select class="form-select" name="dept" id="example-select">
                <option value= "">SELECT</option>
                <option value = "Bachelor">Bachelor Degre</option>
                <option value = "Master">Master Degree</option>
                <option value = "Doctorate">Doctorate Degree</option>
                <option value = "UnitsM">Units in Masters</option>
                <option value = "UnitsD">Units in Doctorate</option>
            </select>
        </div>
    </div>

    <div class="col-3">
        <div class="mb-3">
            <label for="simpleinput" class="form-label">Course</label><span class="text-danger"> *</span>
            <input type="number" name="course" id="simpleinput" class="form-control"  required>
        </div>
    </div>

</div>

<h4 class="page-title" style="text-align:center;">Other Information</h4>

<div class="row">
    <div class="col-6">
        <div class="mt-2">
            <label class="form-check form-check-inline">Are you a person with disability?</label>
            <div class="form-check form-check-inline">
                <input type="radio" id="customRadio3" name="customRadio1" class="form-check-input">
                <label class="form-check-label" for="customRadio3">YES</label>
            </div>
            <div class="form-check form-check-inline">
                <input type="radio" id="customRadio4" name="customRadio1" class="form-check-input">
                <label class="form-check-label" for="customRadio4">NO</label>
            </div>
        </div>
    </div>

    <div class="col-6">
        <div class ="row">
            <div class = "col-4">
                <label>if YES, please specify:</label>
            </div>
            <div class = "col-8">
                <input type="text" name="yes" id="simpleinput" class="form-control" >
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-6">
        <div class="mt-2">
            <label class="form-check form-check-inline">Are you a 4Ps Member?</label>
            <div class="form-check form-check-inline">
                <input type="radio" id="customRadio3" name="customRadio1" class="form-check-input">
                <label class="form-check-label" for="customRadio3">YES</label>
            </div>
            <div class="form-check form-check-inline">
                <input type="radio" id="customRadio4" name="customRadio1" class="form-check-input">
                <label class="form-check-label" for="customRadio4">NO</label>
            </div>
        </div>
    </div>
    
</div>
    <br><br>
    <div class="row">
        <div class="col-8">

        </div>
        <div class="col-4">
            <div class="" style="float: right">
                <button class="btn btn-primary " type="submit" name="add"><i class="mdi mdi-account-circle"></i> Save Information </button>
                <button class="btn btn-dark" type="submit" name="add"><i class="mdi mdi-account-circle"></i> Cancel </button>
            </div>
            <br>
        </div>
    </div>
    <br>
</div>

<?php 
include 'backend/based-research-upload.php';
include 'include/footer.php';

?>

