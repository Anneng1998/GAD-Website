<?php
    include 'database/db.php'; 
    include 'include/header.php';
    include 'include/sidebar.php';
    include 'include/navbar.php';
?>

<style>
    body > div.wrapper > div.content-page > div > div.card.d-block > div.row > div > div {
        padding: 0 15px;
    }
    #alternative-page-datatable_wrapper {
        padding: 0 15px;
    }
</style>

<br><br>

<?php 
    $id = $_GET['id']; 
    echo $id;

?>

<div class="card d-block" style="box-shadow: 0 0.3rem 0.8rem rgba(0, 0, 0, .12);"> <br>

<h1 class="page-title" style="text-align:center;">ACADEMIC EMPLOYEE PERSONAL DATA SHEET</h1>
<br>
<h3 class="page-title" style="text-align:center;">Employee Information</h3>


<form action="" method="GET" class="dropzone" id="myAwesomeDropzone" enctype="multipart/form-data">

<?php
    $view_query = mysqli_query($db, "Select * from employee_information where fldID = '$id'");
    foreach ($view_query as $view_data){
?>

<div class ="row">
    <div class="col-3">
        <div class="mb-3">
            <label for="simpleinput" class="form-label">First Name</label><span class="text-danger"> *</span>
            <input type="text" name="fname" id="simpleinput" class="form-control" readonly="true"  value="<?php echo $view_data['fname'] ?>">
        </div>
    </div>
    <div class="col-3">
        <div class="mb-3">
            <label for="simpleinput" class="form-label">Middle Name</label>
            <input type="text" name="mname" id="simpleinput" class="form-control" readonly="true"  value="<?php echo $view_data['cname'] ?>"  >
        </div>
    </div>
    <div class="col-3">
        <div class="mb-3">
            <label for="simpleinput" class="form-label">Last Name</label><span class="text-danger"> *</span>
            <input type="text" name="lname" id="simpleinput" class="form-control"  readonly="true"  value="<?php echo $view_data['lname'] ?>">
        </div>
    </div>
    <div class="col-3">
        <div class="mb-3">
            <label for="simpleinput" class="form-label">Extension Name</label>
            <input type="text" name="Ename" id="simpleinput" class="form-control" readonly="true"  value="<?php echo $view_data['exname'] ?>"  >
        </div>
    </div>
</div>

<div class ="row">
    <div class = "col-2">
        <div class="mb-3">
            <label for="example-select" class="form-label">Sex</label><span class="text-danger"> *<span>
            <input type="text" name="Ename" id="simpleinput" class="form-control" readonly="true"  value="<?php echo $view_data['sex'] ?>"  >
        </div>
    </div>

    <div class = "col-2">
        <div class="mb-3">
            <label for="example-select" class="form-label">Civil Status</label><span class="text-danger"> *<span>
            <input type="text" name="Ename" id="simpleinput" class="form-control" readonly="true"  value="<?php echo $view_data['cstatus'] ?>"  >
        </div>
    </div>

    <div class="col-4">
        <div class="mb-3">
            <label for="simpleinput" class="form-label">Citizenship</label><span class="text-danger"> *</span>
            <input type="text" name="citizenship" id="simpleinput" class="form-control"  readonly="true"  value="<?php echo $view_data['citizen'] ?>"  >
        </div>
    </div>

    <div class="col-4">
        <div class="mb-3">
            <label for="simpleinput" class="form-label">Religion</label>
            <input type="text" name="religion" id="simpleinput" class="form-control" readonly="true"  value="<?php echo $view_data['religion'] ?>"   >
        </div>
    </div>
</div>

<div class = "row">
    <div class="col-2">
        <div class="mb-3">
            <label for="example-select" class="form-label">Date of Birth</label><span class="text-danger"> *</span>
            <input type="text" class="form-control date" name="birthday" id="birthdatepicker" data-toggle="date-picker" data-single-date-picker="true" readonly="true"  value="<?php echo $view_data['dob'] ?>"  >
        </div>
    </div>

    <div class="col-3">
        <div class="mb-3">
            <label for="simpleinput" class="form-label">Place of Birth</label>>
            <input type="text" name="place" id="simpleinput" class="form-control" readonly="true"  value="<?php echo $view_data['pob'] ?>"    >
        </div>
    </div>

    <div class="col-4">
        <div class="mb-3">
            <label for="simpleinput" class="form-label">Mobile Number</label>
            <input type="number" name="mobile" id="simpleinput" class="form-control" readonly="true"  value="<?php echo $view_data['mobile'] ?>"  >
        </div>
    </div>

    <div class="col-3">
        <div class="mb-3">
            <label for="simpleinput" class="form-label">Email Address</label>
            <input type="email" name="email" id="simpleinput" class="form-control" readonly="true"  value="<?php echo $view_data['email'] ?>"   >
        </div>
    </div>
</div>

<?php
    }
?>

<?php
    $view_query = mysqli_query($db, "Select * from contact_information where fldID = '$id'");
    foreach ($view_query as $view_data){
?>

<h4 class="page-title" style="text-align:center;">Contact Information</h4>
<h5 class="page-title" style="padding: 15px;">Residential Address</h5>

<div class = "row">
    <div class="col-3">
        <div class="mb-3">
            <label for="simpleinput" class="form-label">House/Block/Lot No.</label><span class="text-danger"> *</span>
            <input type="text" name="cno" id="simpleinput" class="form-control"  readonly="true"  value="<?php echo $view_data['house'] ?>"   >
        </div>
    </div>
    <div class="col-3">
        <div class="mb-3">
            <label for="simpleinput" class="form-label">Street</label><span class="text-danger"> *</span>
            <input type="text" name="cstreet" id="simpleinput" class="form-control"   readonly="true"  value="<?php echo $view_data['street'] ?>"   >
        </div>
    </div>
    <div class="col-3">
        <div class="mb-3">
            <label for="simpleinput" class="form-label">Subdivision/Village</label>
            <input type="text" name="csubdivision" id="simpleinput" class="form-control"   readonly="true"  value="<?php echo $view_data['village'] ?>"   >
        </div>
    </div>
    <div class="col-3">
        <div class="mb-3">
            <label for="simpleinput" class="form-label">City/Municipality</label><span class="text-danger"> *</span>
            <input type="text" name="ccity" id="simpleinput" class="form-control"   readonly="true"  value="<?php echo $view_data['city'] ?>"   >
        </div>
    </div>
</div>

<div class = "row">
    <div class="col-5">
        <div class="mb-3">
            <label for="simpleinput" class="form-label">Province</label><span class="text-danger"> *</span>
            <input type="text" name="cprovince" id="simpleinput" class="form-control"   readonly="true"  value="<?php echo $view_data['province'] ?>"   >
        </div>
    </div>
    <div class="col-3">
        <div class="mb-3">
            <label for="simpleinput" class="form-label">Zip Code</label><span class="text-danger"> *</span>
            <input type="number" name="czip" id="simpleinput" class="form-control"   readonly="true"  value="<?php echo $view_data['zip'] ?>"   >
        </div>
    </div>
</div>

<?php
    }
?>

<?php
    $view_query = mysqli_query($db, "Select * from permanent_address where fldID = '$id'");
    foreach ($view_query as $view_data){
?>

<div class = "row">
    <div class="col-3">
        <div class="mb-3">
            <label for="simpleinput" class="form-label">House/Block/Lot No.</label><span class="text-danger"> *</span>
            <input type="text" name="cno" id="simpleinput" class="form-control"  readonly="true"  value="<?php echo $view_data['house'] ?>"   >
        </div>
    </div>
    <div class="col-3">
        <div class="mb-3">
            <label for="simpleinput" class="form-label">Street</label><span class="text-danger"> *</span>
            <input type="text" name="cstreet" id="simpleinput" class="form-control"   readonly="true"  value="<?php echo $view_data['street'] ?>"   >
        </div>
    </div>
    <div class="col-3">
        <div class="mb-3">
            <label for="simpleinput" class="form-label">Subdivision/Village</label>
            <input type="text" name="csubdivision" id="simpleinput" class="form-control"   readonly="true"  value="<?php echo $view_data['village'] ?>"   >
        </div>
    </div>
    <div class="col-3">
        <div class="mb-3">
            <label for="simpleinput" class="form-label">City/Municipality</label><span class="text-danger"> *</span>
            <input type="text" name="ccity" id="simpleinput" class="form-control"   readonly="true"  value="<?php echo $view_data['city'] ?>"   >
        </div>
    </div>
</div>

<div class = "row">
    <div class="col-5">
        <div class="mb-3">
            <label for="simpleinput" class="form-label">Province</label><span class="text-danger"> *</span>
            <input type="text" name="cprovince" id="simpleinput" class="form-control"   readonly="true"  value="<?php echo $view_data['province'] ?>"   >
        </div>
    </div>
    <div class="col-3">
        <div class="mb-3">
            <label for="simpleinput" class="form-label">Zip Code</label><span class="text-danger"> *</span>
            <input type="number" name="czip" id="simpleinput" class="form-control"   readonly="true"  value="<?php echo $view_data['zip'] ?>"   >
        </div>
    </div>
</div>

<?php
    }
?>

<h3 class="page-title" style="text-align:center;">Educational Attainment</h3>
<br>

<div class ="row">
    <div class = "col-5">
        <div class="mb-3">
            <label for="example-select" class="form-label">Highest Educational Attainment</label><span class="text-danger"> *<span>
            <select class="form-select" name="dept" id="example-select">
                <option value= "">SELECT</option>
                <option value = "BS/BA">BS/BA</option>
                <option value = "MA/MS Units">MA/MS Units</option>
                <option value = "MA/MS">MA/MS</option>
                <option value = "Ph. D Units">Ph. D Units</option>
                <option value = "Ph. D">Ph. D</option>
            </select>
        </div>
    </div>

    <div class="col-3">
        <div class="mb-3">
            <label for="simpleinput" class="form-label">Course</label><span class="text-danger"> *</span>
            <input type="text" name="course" id="simpleinput" class="form-control"  required>
        </div>
    </div>

    <div class = "col-4">
        <div class="mb-3">
            <label for="example-select" class="form-label">Designation</label><span class="text-danger"> *<span>
            <select class="form-select" name="designation" id="example-select" required>
                <option value= "">SELECT</option>
                <option value = "Instructor">Instructor</option>
                <option value = "Assistant">Assistant Professor</option>
                <option value = "Associate">Associate Professor</option>
                <option value = "Professor">Professor</option>
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

<h4 class="page-title" style="text-align:center;">Family Background</h4>

<div class="row">
    <div class="col-5">
        <div class="mt-2">
            <label class="form-check form-check-inline">Do you have a spouse?</label>
            <div class="form-check form-check-inline">
                <input type="radio" id="chkYes" name="spouse" value="YES" class="form-check-input">
                <label class="form-check-label" value="chkYes">YES</label>
            </div>
            <div class="form-check form-check-inline">
                <input type="radio" id="chkNo" name="spouse" value="NO" class="form-check-input">
                <label class="form-check-label" value="chkNo">NO</label>
            </div>
        </div>
    </div> 

    <div class="col-7 hide" id="dvPinNo" style="display: none">
        <div class="row">
            <div class = "col-4" style="text-align: right;">
                <label for="example-select" class="form-label">If YES</label><span class="text-danger"> *<span>
            </div>
            <div class = "col-8">
                <select class="form-select" name="sStatus" id="example-select">
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
                <input type="radio" id="cY" name="children" value="YES" class="form-check-input">
                <label class="form-check-label" value="cY">YES</label>
            </div>
            <div class="form-check form-check-inline">
                <input type="radio" id="cN" name="children" value="NO" class="form-check-input">
                <label class="form-check-label" value="cN">NO</label>
            </div>
        </div>
    </div> 
</div>

<div class="mt-2" style="padding: 40px; display: none" id="childrenYN">
    <div class="col-1" style="margin-block: auto;">
            <a href="javascript:void(0)" class="btn btn-info shadow btn-xs sharp me-1" id="newchild"><i class="dripicons-plus"></i>ADD</a>
    </div><br><br>
    <div id="mainsection">
        <div class="maincontent">
            <div class="row">
                <div class="col-3">
                    <div class="mb-3">
                        <label for="simpleinput" class="form-label">Name of Children</label><span class="text-danger"> *</span>
                        <input type="text" name="childname[]" id="simpleinput" class="form-control">
                    </div>
                </div>
                <div class="col-3">
                    <label for="example-select" class="form-label">Sex</label><span class="text-danger"> *<span>
                    <select class="form-select" name="childgender[]" id="example-select">
                        <option value= "">SELECT</option>
                        <option value = "Female">Female</option>
                        <option value = "Male">Male</option>
                    </select>
                </div>
                <div class="col-1">
                    <div class="mb-3">
                        <label for="simpleinput" class="form-label">Age</label><span class="text-danger"> *</span>
                        <input type="text" name="childage[]" id="simpleinput" class="form-control">
                    </div>
                </div>
                <div class="col-3">
                    <label for="example-select" class="form-label">Status</label><span class="text-danger"> *<span>
                    <select class="form-select" name="childstatus[]" id="example-select">
                        <option value= "">SELECT</option>
                        <option value = "Studying">Studying</option>
                        <option value = "Not">Not Studying</option>
                    </select>
                </div>
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
            <button class="btn btn-dark" type="submit" name="cancel"><i class="mdi mdi-account-circle"></i> BACK </button>
        </div>
        <br>
    </div>
</div>

</form>

<br>


</div>
<?php 
include 'include/footer.php';
?>