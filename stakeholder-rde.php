<?php 
    include 'include/header.php';
    include 'include/sidebar.php';
    include 'include/navbar.php';
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

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

<h1 class="page-title" style="text-align:center;">EXTERNAL CLIENT PERSONAL DATA SHEET</h1>
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
    <div class="col-5">
        <div class="mt-2">
            <label class="form-check form-check-inline">Are you a person with disability?</label>
            <div class="form-check form-check-inline">
                <input type="radio" id="disabilityY" name="disability" class="form-check-input">
                <label class="form-check-label" for="disabilityY">YES</label>
            </div>
            <div class="form-check form-check-inline">
                <input type="radio" id="disabilityN" name="disability" class="form-check-input">
                <label class="form-check-label" for="disabilityN">NO</label>
            </div>
        </div>
    </div>

    <div class="col-7" id="disabilitychoices" style="display: none">
        <div class ="row">
            <div class = "col-4" style="text-align: right;">
                <label>if YES, please specify:</label>
            </div>
            <div class = "col-8">
                <select class="form-select" name="disability" id="example-select">
                    <option value= "">SELECT</option>
                    <option value = "">Deaf &#40; Hard of hearing &#41; </option>
                    <option value = "">Intellectual Disability</option>
                    <option value = "">Learning Disability</option>
                    <option value = "">Mental Disability</option>
                    <option value = "">Orthopedic Disability</option>
                    <option value = "">Physical Disability</option>
                    <option value = "">Psychosocial Disability</option>
                    <option value = "">Speech and Language</option>
                    <option value = "">Impairment</option>
                    <option value = "">Visual Disability</option>
                </select>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-6">
        <div class="mt-2">
            <label class="form-check form-check-inline">Are you a 4Ps Member?</label>
            <div class="form-check form-check-inline">
                <input type="radio" id="4PY" name="4P" class="form-check-input">
                <label class="form-check-label" for="4PY">YES</label>
            </div>
            <div class="form-check form-check-inline">
                <input type="radio" id="4PN" name="4P" class="form-check-input">
                <label class="form-check-label" for="4PN">NO</label>
            </div>
        </div>
    </div> 
</div>

<div class="row">
    <div class="col-6">
        <div class="mt-2">
            <label class="form-check form-check-inline">Are you a working student?</label>
            <div class="form-check form-check-inline">
                <input type="radio" id="wsY" name="ws" class="form-check-input">
                <label class="form-check-label" for="wsY">YES</label>
            </div>
            <div class="form-check form-check-inline">
                <input type="radio" id="wsN" name="ws" class="form-check-input">
                <label class="form-check-label" for="wsN">NO</label>
            </div>
        </div>
    </div> 
</div>

<div class="row">
    <div class="col-6">
        <div class="mt-2">
            <label class="form-check form-check-inline">Are you Single Parent?</label>
            <div class="form-check form-check-inline">
                <input type="radio" id="spY" name="sp" class="form-check-input">
                <label class="form-check-label" for="spY">YES</label>
            </div>
            <div class="form-check form-check-inline">
                <input type="radio" id="spN" name="sp" class="form-check-input">
                <label class="form-check-label" for="spN">NO</label>
            </div>
        </div>
    </div> 
</div>

<h4 class="page-title" style="text-align:center;">Family Background</h4>

<div class="row">
    <div class="col-5">
        <div class="mt-2">
            <label class="form-check form-check-inline">Do you have a spouse?</label>
            <div class="form-check form-check-inline">
                <input type="radio" id="chkYes" name="spouse" class="form-check-input">
                <label class="form-check-label" for="chkYes">YES</label>
            </div>
            <div class="form-check form-check-inline">
                <input type="radio" id="chkNo" name="spouse" class="form-check-input">
                <label class="form-check-label" for="chkNo">NO</label>
            </div>
        </div>
    </div> 

    <div class="col-7 hide" id="dvPinNo" style="display: none">
        <div class="row">
            <div class = "col-4" style="text-align: right;">
                <label for="example-select" class="form-label">If YES</label><span class="text-danger"> *<span>
            </div>
            <div class = "col-8">
                <select class="form-select" name="sStatus" id="example-select" required>
                    <option value= "">SELECT</option>
                    <option value = "With">With Occupation</option>
                    <option value = "No">No Occupation</option>
                </select>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-6">
        <div class="mt-2">
            <label class="form-check form-check-inline">Do you have a children?</label>
            <div class="form-check form-check-inline">
                <input type="radio" id="cY" name="children" class="form-check-input">
                <label class="form-check-label" for="cY">YES</label>
            </div>
            <div class="form-check form-check-inline">
                <input type="radio" id="cN" name="children" class="form-check-input">
                <label class="form-check-label" for="cN">NO</label>
            </div>
        </div>
    </div> 
</div>

<div class="mt-2" style="padding: 40px; display: none" id="childrenYN">
    <div class="row">
        <div class="col-3">
            <div class="mb-3">
                <label for="simpleinput" class="form-label">Name of Children</label><span class="text-danger"> *</span>
                <input type="text" name="cname" id="simpleinput" class="form-control">
            </div>
        </div>
        <div class="col-3">
            <label for="example-select" class="form-label">Sex</label><span class="text-danger"> *<span>
            <select class="form-select" name="cgender" id="example-select">
                <option value= "">SELECT</option>
                <option value = "Female">Female</option>
                <option value = "Male">Male</option>
            </select>
        </div>
        <div class="col-1">
            <div class="mb-3">
                <label for="simpleinput" class="form-label">Age</label><span class="text-danger"> *</span>
                <input type="text" name="cage" id="simpleinput" class="form-control">
            </div>
        </div>
        <div class="col-3">
            <label for="example-select" class="form-label">Status</label><span class="text-danger"> *<span>
            <select class="form-select" name="cgender" id="example-select">
                <option value= "">SELECT</option>
                <option value = "Studying">Studying</option>
                <option value = "Not">Not Studying</option>
            </select>
        </div>
        <div class="col-1" style="margin-block: auto;">
            <button class="btn btn-info shadow btn-xs sharp me-1"><i class="dripicons-plus"></i></button>
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


<script type="text/javascript">

    $(function() {
        $("input[name='spouse']").click(function() {
            if ($("#chkYes").is(":checked")) {
                $("#dvPinNo").show();
            } else {
                $("#dvPinNo").hide();
            }
        });
    });

    $(function() {
        $("input[name='disability']").click(function() {
            if ($("#disabilityY").is(":checked")) {
                $("#disabilitychoices").show();
            } else {
                $("#disabilitychoices").hide();
            }
        });
    });
    
</script>

<?php 
include 'include/footer.php';
?>

