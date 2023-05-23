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

<h1 class="page-title" style="text-align:center;">STUDENT PERSONAL DATA SHEET</h1>
<br>
<h3 class="page-title" style="text-align:center;">Student Information</h3>

<form action="stakeholder/student.php" method="post" class="dropzone" id="myAwesomeDropzone" enctype="multipart/form-data">


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
            <input type="text" name="cno" id="simpleinput" class="form-control"  required>
        </div>
    </div>
    <div class="col-3">
        <div class="mb-3">
            <label for="simpleinput" class="form-label">Street</label><span class="text-danger"> *</span>
            <input type="text" name="cstreet" id="simpleinput" class="form-control"  required>
        </div>
    </div>
    <div class="col-3">
        <div class="mb-3">
            <label for="simpleinput" class="form-label">Subdivision/Village</label><span class="text-danger"> *</span>
            <input type="text" name="csubdivision" id="simpleinput" class="form-control"  required>
        </div>
    </div>
    <div class="col-3">
        <div class="mb-3">
            <label for="simpleinput" class="form-label">City/Municipality</label><span class="text-danger"> *</span>
            <input type="text" name="ccity" id="simpleinput" class="form-control"  required>
        </div>
    </div>
</div>

<div class = "row">
    <div class="col-5">
        <div class="mb-3">
            <label for="simpleinput" class="form-label">Province</label><span class="text-danger"> *</span>
            <input type="text" name="cprovince" id="simpleinput" class="form-control"  required>
        </div>
    </div>
    <div class="col-3">
        <div class="mb-3">
            <label for="simpleinput" class="form-label">Zip Code</label><span class="text-danger"> *</span>
            <input type="number" name="czip" id="simpleinput" class="form-control"  required>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        $('#checkbox1').change(function () {
            if (!this.checked) 
            //  ^
            $('#autoUpdate').show();
            else 
                $('#autoUpdate').remove();
        });
    });
</script>


<div class="mt-3">
    <div class="form-check" style="padding: 15px; margin: 20px;">
        <input type="checkbox" id="checkbox1" name="sameadd" class="form-check-input">
        <label class="form-check-label" for="sameadd">Permnent address same as Residential Address</label>
    </div>
</div>

<div id="autoUpdate" class="autoUpdate" style="padding:15px;">
    <div class = "row">
        <div class="col-3">
            <div class="mb-3">
                <label for="simpleinput" class="form-label">House/Block/Lot No.</label><span class="text-danger"> *</span>
                <input type="text" name="pno" id="simpleinput" class="form-control"  required>
            </div>
        </div>
        <div class="col-3">
            <div class="mb-3">
                <label for="simpleinput" class="form-label">Street</label><span class="text-danger"> *</span>
                <input type="text" name="pstreet" id="simpleinput" class="form-control"  required>
            </div>
        </div>
        <div class="col-3">
            <div class="mb-3">
                <label for="simpleinput" class="form-label">Subdivision/Village</label><span class="text-danger"> *</span>
                <input type="text" name="psubdivision" id="simpleinput" class="form-control"  required>
            </div>
        </div>
        <div class="col-3">
            <div class="mb-3">
                <label for="simpleinput" class="form-label">City/Municipality</label><span class="text-danger"> *</span>
                <input type="text" name="pcity" id="simpleinput" class="form-control"  required>
                <input type="hidden" name="sameaddress" class="form-check-input" value="off">
            </div>
        </div>
    </div>

    <div class = "row" >
        <div class="col-5">
            <div class="mb-3">
                <label for="simpleinput" class="form-label">Province</label><span class="text-danger"> *</span>
                <input type="text" name="pprovince" id="simpleinput" class="form-control"  required>
            </div>
        </div>
        <div class="col-3">
            <div class="mb-3">
                <label for="simpleinput" class="form-label">Zip Code</label><span class="text-danger"> *</span>
                <input type="number" name="pzip" id="simpleinput" class="form-control"  required>
            </div>
        </div>
    </div>
</div>

<h4 class="page-title" style="text-align:center;">Educational Attainment</h4>

<div class ="row">
    <div class = "col-2">
        <div class="mb-3">
            <label for="example-select" class="form-label">Department</label><span class="text-danger"> *<span>
            <select class="form-select" name="dept" id="example-select">
                <option value= "">SELECT</option>
                <option value = "DAS">DAS</option>
                <option value = "DEPTEL">DEPTEL</option>
                <option value = "BM">BM</option>
                <option value = "DIT">DIT</option>
            </select>
        </div>
    </div>

    <div class = "col-6">
        <div class="mb-3">
            <label for="example-select" class="form-label">Program</label><span class="text-danger"> *<span>
            <select class="form-select" name="program" id="example-select">
                <option value= "">SELECT</option>
                <option value = "c1">BS Hospitality Management</option>
                <option value = "c2">BS Business Management</option>
                <option value = "c3">BS in Computer Science</option>
                <option value = "c4">Bachelor of Early Childhood Education</option>
                <option value = "c5">Bachelor of Secondary Education</option>
                <option value = "c6">BS Information Technology</option>
            </select>
        </div>
    </div>

    <div class = "col-2">
        <div class="mb-3">
            <label for="example-select" class="form-label">Year Level</label><span class="text-danger"> *<span>
            <select class="form-select" name="year" id="example-select">
                <option value= "">SELECT</option>
                <option value = "First">First Year</option>
                <option value = "Second">Second Year</option>
                <option value = "Third">Third Year</option>
                <option value = "Fourth">Fourth Year</option>
                <option value = "Fifth">Fifth Year</option>
            </select>
        </div>
    </div>

    <div class = "col-2">
        <div class="mb-3">
            <label for="example-select" class="form-label">Student Status</label><span class="text-danger"> *<span>
            <select class="form-select" name="status" id="example-select">
                <option value= "">SELECT</option>
                <option value = "Regular">Regular</option>
                <option value = "Irregular">Irregular</option>
            </select>
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
                <label class="form-check-label" value="disabilityY">YES</label>
            </div>
            <div class="form-check form-check-inline">
                <input type="radio" id="disabilityN" name="disability" class="form-check-input">
                <label class="form-check-label" value="disabilityN">NO</label>
            </div>
        </div>
    </div>

    <div class="col-7" id="disabilitychoices" style="display: none">
        <div class ="row">
            <div class = "col-4" style="text-align: right;">
                <label>if YES, please specify:</label>
            </div>
            <div class = "col-8">
                <select class="form-select" name="disability1" id="example-select">
                    <option value= "">SELECT</option>
                    <option value = "Deaf">Deaf &#40; Hard of hearing &#41; </option>
                    <option value = "Intellectual">Intellectual Disability</option>
                    <option value = "Learning">Learning Disability</option>
                    <option value = "Mental">Mental Disability</option>
                    <option value = "Orthopedic">Orthopedic Disability</option>
                    <option value = "Physical">Physical Disability</option>
                    <option value = "Psychosocial">Psychosocial Disability</option>
                    <option value = "Speech">Speech and Language</option>
                    <option value = "Impairment">Impairment</option>
                    <option value = "Visual">Visual Disability</option>
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
                <input type="radio" id="4PY" name="fourP" value="YES" class="form-check-input">
                <label class="form-check-label" value="YES">YES</label>
            </div>
            <div class="form-check form-check-inline">
                <input type="radio" id="4PN" name="fourP" value="NO" class="form-check-input">
                <label class="form-check-label" value="NO">NO</label>
            </div>
        </div>
    </div> 
</div>

<div class="row">
    <div class="col-6">
        <div class="mt-2">
            <label class="form-check form-check-inline">Are you a working student?</label>
            <div class="form-check form-check-inline">
                <input type="radio" id="wsY" name="ws" value="YES" class="form-check-input">
                <label class="form-check-label" value="wsY">YES</label>
            </div>
            <div class="form-check form-check-inline">
                <input type="radio" id="wsN" name="ws" value="NO" class="form-check-input">
                <label class="form-check-label" value="wsN">NO</label>
            </div>
        </div>
    </div> 
</div>

<div class="row">
    <div class="col-6">
        <div class="mt-2">
            <label class="form-check form-check-inline">Are you Single Parent?</label>
            <div class="form-check form-check-inline">
                <input type="radio" id="spY" name="sp" value="YES" class="form-check-input">
                <label class="form-check-label" value="spY">YES</label>
            </div>
            <div class="form-check form-check-inline">
                <input type="radio" id="spN" name="sp" value="NO" class="form-check-input">
                <label class="form-check-label" value="spN">NO</label>
            </div>
        </div>
    </div> 
</div>


    <br><br><br><br><br><br><br><br>
    <div class="row">
        <div class="col-8">

        </div>
        <div class="col-4">
            <div class="" style="float: right">
                <button class="btn btn-primary " type="submit" name="save"><i class="mdi mdi-account-circle"></i> Save Information </button>
                <button class="btn btn-dark" type="submit" name="cancel"><i class="mdi mdi-account-circle"></i> Cancel </button>
            </div>
            <br>
        </div>
    </div>

</div>


<script type="text/javascript">

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

