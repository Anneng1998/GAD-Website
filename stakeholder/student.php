<!-- kaya mo to anne :( -->
<?php 

include '../database/db.php';


if (isset($_POST['save'])){

    $random = random_int(100000, 999999);
    $UniqueID = 'SHA'.$random;

    $sameaddress = $_POST['sameaddress'];

    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $lname = $_POST['lname'];
    $Ename = $_POST['Ename'];
    $gender = $_POST['gender'];
    $civil = $_POST['civil'];
    $citizenship = $_POST['citizenship'];
    $religion = $_POST['religion'];
    $birthday = $_POST['birthday'];
    $place = $_POST['place'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];


    $insert_employee = "INSERT INTO employee_information (
                            fldID, 
                            stake_status,
                            fname, 
                            cname, 
                            lname, 
                            exname, 
                            sex, 
                            cstatus, 
                            citizen, 
                            religion, 
                            dob, 
                            pob, 
                            mobile, 
                            email) 
                        VALUES (
                            '$UniqueID', 
                            'STUDENT',
                            '$fname', 
                            '$mname', 
                            '$lname', 
                            '$Ename', 
                            '$gender', 
                            '$civil', 
                            '$citizenship', 
                            '$religion', 
                            '$birthday', 
                            '$place', 
                            '$mobile', 
                            '$email')";

$insert_qry = mysqli_query($db, $insert_employee);

if ($sameaddress == 'on') {

    $cno = $_POST['cno'];
    $cstreet = $_POST['cstreet'];
    $csubdivision = $_POST['csubdivision'];
    $ccity = $_POST['ccity'];
    $cprovince = $_POST['cprovince'];
    $czip = $_POST['czip'];

    $insert_contact = "INSERT INTO contact_information (
                            fldID,
                            house,	
                            street,
                            village,
                            city,
                            province,
                            zip)
                        VALUES (
                            '$UniqueID',
                            '$cno',
                            '$cstreet',
                            '$csubdivision',
                            '$ccity',
                            '$cprovince',
                            '$czip')";

    $insert_qry1 = mysqli_query($db, $insert_contact);

    $insert_permanent = "INSERT INTO permanent_address (
        fldID,
        house,	
        street,
        village,
        city,
        province,
        zip)
    VALUES (
            '$UniqueID',
            '$cno',
            '$cstreet',
            '$csubdivision',
            '$ccity',
            '$cprovince',
            '$czip')";

    $insert_qry2 = mysqli_query($db, $insert_permanent);
    
} else {

    $cno = $_POST['cno'];
    $cstreet = $_POST['cstreet'];
    $csubdivision = $_POST['csubdivision'];
    $ccity = $_POST['ccity'];
    $cprovince = $_POST['cprovince'];
    $czip = $_POST['czip'];

    $insert_contact = "INSERT INTO contact_information (
                            fldID,
                            house,	
                            street,
                            village,
                            city,
                            province,
                            zip)
                        VALUES (
                            '$UniqueID',
                            '$cno',
                            '$cstreet',
                            '$csubdivision',
                            '$ccity',
                            '$cprovince',
                            '$czip')";

    $insert_qry1 = mysqli_query($db, $insert_contact);

    $pno = $_POST['pno'];
    $pstreet = $_POST['pstreet'];
    $psubdivision = $_POST['psubdivision'];
    $pcity = $_POST['pcity'];
    $pprovince = $_POST['pprovince'];
    $pzip = $_POST['pzip'];

    $insert_permanent = "INSERT INTO permanent_address (
                                fldID,
                                house,	
                                street,
                                village,
                                city,
                                province,
                                zip)
                        VALUES (
                                '$UniqueID',
                                '$pno',
                                '$pstreet',
                                '$psubdivision',
                                '$pcity',
                                '$pprovince',
                                '$pzip')";

    $insert_qry2 = mysqli_query($db, $insert_permanent);
}

    $dept = $_POST['dept'];
    $program = $_POST['program'];
    $year = $_POST['year'];
    $status = $_POST['status'];

    $insert_educational = "INSERT INTO student_education_information (
                                fldID,
                                department,
                                program,
                                years,
                                statuss)
                            VALUES (
                                '$UniqueID',
                                '$dept',
                                '$program',
                                '$year',
                                '$status'
                            )";

$insert_qry3 = mysqli_query($db, $insert_educational);

    $disability = $_POST['disability'];
    $disability1 = $_POST['disability1'];
    $fourP = $_POST['fourP'];
    $ws = $_POST['ws'];
    $sp = $_POST['sp'];
    

    $insert_other = "INSERT INTO other_information (
                                fldID,
                                disability,
                                disability_type,
                                fourps,
                                working_student,
                                single_parent
                            VALUES (
                                '$UniqueID',
                                '$disability',
                                '$disability1',
                                '$fourP',
                                '$ws',
                                '$sp')";

$insert_qry4 = mysqli_query($db, $insert_other);

    
        
    
        echo "<script>alert('New data has been added successfully');window.location.href = '../stakeholder.php';</script>";


    }

?>