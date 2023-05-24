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
    // echo $id;

?>

<div class="card d-block" style="box-shadow: 0 0.3rem 0.8rem rgba(0, 0, 0, .12);"> <br>

<h1 class="page-title" style="text-align:center;">NON - ACADEMIC EMPLOYEE PERSONAL DATA SHEET</h1>
<br>
<h3 class="page-title" style="text-align:center;">Employee Information</h3>


<form action="" method="GET" class="dropzone" id="myAwesomeDropzone" enctype="multipart/form-data">

<?php
    $view_query = mysqli_query($db, "Select * from employee_information where fldID = '$id'");
    $view_data = mysqli_fetch_array($view_query);

    if (mysqli_num_rows($view_query) > 0) {
        $fname = $view_data['fname'];
        $cname = $view_data['cname'];
        $lname = $view_data['lname'];
        $exname = $view_data['exname'];
        $sex = $view_data['sex'];
        $cstatus = $view_data['cstatus'];
        $citizen = $view_data['citizen'];
        $religion = $view_data['religion'];
        $dob = $view_data['dob'];
        $pob = $view_data['pob'];
        $mobile = $view_data['mobile'];
        $email = $view_data['email'];
    } else {
        $fname = '';
        $cname = '';
        $lname = '';
        $exname = '';
        $sex = '';
        $cstatus ='';
        $citizen ='';
        $religion = '';
        $dob = '';
        $pob = '';
        $mobile = '';
        $email = '';
    }
?>

<div class ="row">
    <div class="col-3">
        <div class="mb-3">
            <label for="simpleinput" class="form-label">First Name</label><span class="text-danger"> *</span>
            <input type="text" name="fname" id="simpleinput" class="form-control" readonly="true"  value="<?php echo $fname?>">
        </div>
    </div>
    <div class="col-3">
        <div class="mb-3">
            <label for="simpleinput" class="form-label">Middle Name</label>
            <input type="text" name="mname" id="simpleinput" class="form-control" readonly="true"  value="<?php echo $cname?>"  >
        </div>
    </div>
    <div class="col-3">
        <div class="mb-3">
            <label for="simpleinput" class="form-label">Last Name</label><span class="text-danger"> *</span>
            <input type="text" name="lname" id="simpleinput" class="form-control"  readonly="true"  value="<?php echo $lname ?>">
        </div>
    </div>
    <div class="col-3">
        <div class="mb-3">
            <label for="simpleinput" class="form-label">Extension Name</label>
            <input type="text" name="Ename" id="simpleinput" class="form-control" readonly="true"  value="<?php echo $exname ?>"  >
        </div>
    </div>
</div>

<div class ="row">
    <div class = "col-2">
        <div class="mb-3">
            <label for="example-select" class="form-label">Sex</label><span class="text-danger"> *<span>
            <input type="text" name="Ename" id="simpleinput" class="form-control" readonly="true"  value="<?php echo $sex?>"  >
        </div>
    </div>

    <div class = "col-2">
        <div class="mb-3">
            <label for="example-select" class="form-label">Civil Status</label><span class="text-danger"> *<span>
            <input type="text" name="Ename" id="simpleinput" class="form-control" readonly="true"  value="<?php echo $cstatus ?>"  >
        </div>
    </div>

    <div class="col-4">
        <div class="mb-3">
            <label for="simpleinput" class="form-label">Citizenship</label><span class="text-danger"> *</span>
            <input type="text" name="citizenship" id="simpleinput" class="form-control"  readonly="true"  value="<?php echo $citizen ?>"  >
        </div>
    </div>

    <div class="col-4">
        <div class="mb-3">
            <label for="simpleinput" class="form-label">Religion</label>
            <input type="text" name="religion" id="simpleinput" class="form-control" readonly="true"  value="<?php echo $religion ?>"   >
        </div>
    </div>
</div>

<div class = "row">
    <div class="col-2">
        <div class="mb-3">
            <label for="example-select" class="form-label">Date of Birth</label><span class="text-danger"> *</span>
            <input type="text" name="dob" id="simpleinput" class="form-control" readonly="true"  value="<?php echo $dob?>"  >
        </div>
    </div>

    <div class="col-3">
        <div class="mb-3">
            <label for="simpleinput" class="form-label">Place of Birth</label>>
            <input type="text" name="place" id="simpleinput" class="form-control" readonly="true"  value="<?php echo $pob ?>"    >
        </div>
    </div>

    <div class="col-4">
        <div class="mb-3">
            <label for="simpleinput" class="form-label">Mobile Number</label>
            <input type="number" name="mobile" id="simpleinput" class="form-control" readonly="true"  value="<?php echo $mobile?>"  >
        </div>
    </div>

    <div class="col-3">
        <div class="mb-3">
            <label for="simpleinput" class="form-label">Email Address</label>
            <input type="email" name="email" id="simpleinput" class="form-control" readonly="true"  value="<?php echo $email ?>"   >
        </div>
    </div>
</div>


<?php
    $view_query = mysqli_query($db, "Select * from contact_information where fldID = '$id'");
    $view_data = mysqli_fetch_array($view_query);

    if (mysqli_num_rows($view_query) > 0) {
        $house = $view_data['house'];
        $street = $view_data['street'];
        $village = $view_data['village'];
        $city = $view_data['city'];
        $province = $view_data['province'];
        $zip = $view_data['zip'];
    } else {
        $house = '';
        $street = '';
        $village = '';
        $city = '';
        $province = '';
        $zip = '';
    }
?>

<h4 class="page-title" style="text-align:center;">Contact Information</h4>
<h5 class="page-title" style="padding: 15px;">Residential Address</h5>

<div class = "row">
    <div class="col-3">
        <div class="mb-3">
            <label for="simpleinput" class="form-label">House/Block/Lot No.</label><span class="text-danger"> *</span>
            <input type="text" name="cno" id="simpleinput" class="form-control"  readonly="true"  value="<?php echo $house ?>"   >
        </div>
    </div>
    <div class="col-3">
        <div class="mb-3">
            <label for="simpleinput" class="form-label">Street</label><span class="text-danger"> *</span>
            <input type="text" name="cstreet" id="simpleinput" class="form-control"   readonly="true"  value="<?php echo $street?>"   >
        </div>
    </div>
    <div class="col-3">
        <div class="mb-3">
            <label for="simpleinput" class="form-label">Subdivision/Village</label>
            <input type="text" name="csubdivision" id="simpleinput" class="form-control"   readonly="true"  value="<?php echo $village?>"   >
        </div>
    </div>
    <div class="col-3">
        <div class="mb-3">
            <label for="simpleinput" class="form-label">City/Municipality</label><span class="text-danger"> *</span>
            <input type="text" name="ccity" id="simpleinput" class="form-control"   readonly="true"  value="<?php echo $city?>"   >
        </div>
    </div>
</div>

<div class = "row">
    <div class="col-5">
        <div class="mb-3">
            <label for="simpleinput" class="form-label">Province</label><span class="text-danger"> *</span>
            <input type="text" name="cprovince" id="simpleinput" class="form-control"   readonly="true"  value="<?php echo $province?>"   >
        </div>
    </div>
    <div class="col-3">
        <div class="mb-3">
            <label for="simpleinput" class="form-label">Zip Code</label><span class="text-danger"> *</span>
            <input type="number" name="czip" id="simpleinput" class="form-control"   readonly="true"  value="<?php echo $zip ?>"   >
        </div>
    </div>
</div>

<?php
    $view_query = mysqli_query($db, "Select * from permanent_address where fldID = '$id'");
    $view_data = mysqli_fetch_array($view_query);

    if (mysqli_num_rows($view_query) > 0) {
        $house = $view_data['house'];
        $street = $view_data['street'];
        $village = $view_data['village'];
        $city = $view_data['city'];
        $province = $view_data['province'];
        $zip = $view_data['zip'];
    } else {
        $house = '';
        $street = '';
        $village = '';
        $city = '';
        $province = '';
        $zip = '';
    }
?>

<h5 class="page-title" style="padding: 15px;">Permanent Address</h5>
<div class = "row">
    <div class="col-3">
        <div class="mb-3">
            <label for="simpleinput" class="form-label">House/Block/Lot No.</label><span class="text-danger"> *</span>
            <input type="text" name="pno" id="simpleinput" class="form-control"  readonly="true"  value="<?php echo $house ?>"   >
        </div>
    </div>
    <div class="col-3">
        <div class="mb-3">
            <label for="simpleinput" class="form-label">Street</label><span class="text-danger"> *</span>
            <input type="text" name="pstreet" id="simpleinput" class="form-control"  readonly="true"  value="<?php echo $street ?>"   >
        </div>
    </div>
    <div class="col-3">
        <div class="mb-3">
            <label for="simpleinput" class="form-label">Subdivision/Village</label><span class="text-danger"> *</span>
            <input type="text" name="psubdivision" id="simpleinput" class="form-control"  readonly="true"  value="<?php echo $village ?>"   >
        </div>
    </div>
    <div class="col-3">
        <div class="mb-3">
            <label for="simpleinput" class="form-label">City/Municipality</label><span class="text-danger"> *</span>
            <input type="text" name="pcity" id="simpleinput" class="form-control"  readonly="true"  value="<?php echo $city ?>"   >
        </div>
    </div>
</div>
<div class = "row" >
    <div class="col-5">
        <div class="mb-3">
            <label for="simpleinput" class="form-label">Province</label><span class="text-danger"> *</span>
            <input type="text" name="pprovince" id="simpleinput" class="form-control"  readonly="true"  value="<?php echo $province ?>"   >
        </div>
    </div>
    <div class="col-3">
        <div class="mb-3">
            <label for="simpleinput" class="form-label">Zip Code</label><span class="text-danger"> *</span>
            <input type="number" name="pzip" id="simpleinput" class="form-control"  readonly="true"  value="<?php echo $zip ?>"   >
        </div>
    </div>
</div>

<?php
    $view_query = mysqli_query($db, "Select * from educational_information where fldID = '$id'");
    $view_data = mysqli_fetch_array($view_query);

    if (mysqli_num_rows($view_query) > 0) {
        $educational = $view_data['educational'];
        $course = $view_data['course'];
    } else {
        $educational = '';
        $course = '';
    }
?>

<h3 class="page-title" style="text-align:center;">Educational Attainment</h3>
<br>

<div class ="row">
    <div class = "col-5">
        <div class="mb-3">
            <label for="example-select" class="form-label">Highest Educational Attainment</label><span class="text-danger"> *<span>
            <input id="simpleinput" class="form-control" readonly="true"  value="<?php echo $educational ?>"  >
        </div>
    </div>

    <div class="col-3">
        <div class="mb-3">
            <label for="simpleinput" class="form-label">Course</label><span class="text-danger"> *</span>
            <input type="text" name="course" id="simpleinput" class="form-control"  readonly="true"  value="<?php echo $course?>" >
        </div>
    </div>

</div>

<?php
    $view_query = mysqli_query($db, "Select * from other_information where fldID = '$id'");
    $view_data = mysqli_fetch_array($view_query);

    if (mysqli_num_rows($view_query) > 0) {
        $disability = $view_data['disability'];
        $disability_type = $view_data['disability_type'];
        $fourP = $view_data['fourps'];
        $working_student = $view_data['working_student'];
        $single_parent = $view_data['single_parent'];
        $spouse = $view_data['spouse'];
        $spouse_type = $view_data['spouse_type'];
    } else {
        $disability = '';
        $disability_type = '';
        $fourp = '';
        $working_student = '';
        $single_parent = '';
        $spouse = '';
        $spouse_type = '';
    }
?>

<h4 class="page-title" style="text-align:center;">Other Information</h4>

<div class="row">
    <div class="col-12">
        <label class="">Are you a person with disability?</label>
        <p>Answer:&nbsp;<?php echo $disability ?>,<?php echo $disability_type ?> </p>
    </div>
</div>

<div class="row">
    <div class="col-6">
        <label class="">Are you a 4Ps Member?</label>
        <p>Answer:&nbsp;<?php echo $fourP ?></p>
    </div> 
</div>

<div class="row">
    <div class="col-6">
        <label class="">Are you Single Parent?</label>
        <p>Answer:&nbsp;<?php echo $single_parent ?></p>
    </div> 
</div>

<!-- <h4 class="page-title" style="text-align:center;">Family Background</h4> -->

<div class="row">
    <div class="col-5">
        <label class="">Do you have a spouse?</label>
        <p>Answer:&nbsp;<?php echo $spouse ?>,<?php echo $spouse_type ?> </p>
    </div> 
</div>

    <br><br>
</form>

<div class="row">
    <div class="col-8">
    </div>
    <div class="col-4">
        <div class="" style="float: right">
            <a href="stakeholder-rde-list.php" type="button" class="btn btn-dark" ><i class="mdi mdi-account-circle"></i> BACK </a>
        </div>
        <br>
    </div>
</div>



<br>


</div>
<?php 
include 'include/footer.php';
?>