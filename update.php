<?php
// Include your database connection file (e.g., dbConnection.php)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once('partials/_dbconnect.php');
    $editnewId = $_POST['id'];
    $make1 = $_POST["make"];
    $model1 = $_POST["model"];
    $type1 = $_POST["type"];
    $yom1 = $_POST["yom"];
    $capacity1 = $_POST["capacity"];
    $registration1 = $_POST["registration"];
    $chassis1 = $_POST["chassis"];
    $engine1 = $_POST["engine"];
    $boomLength1 = $_POST["boomLength"];
    $jibLength1 = $_POST["jibLength"];
    $luffingLength1 = $_POST["luffingLength"];
    $dieselTankCap1 = $_POST["dieselTankCap"];
    $hydraulicOilTank1 = $_POST["hydraulicOilTank"];
    $engineOilCapacity1 = $_POST["engineOilCapacity"];
    $hydraulicOilGrade1 = $_POST["hydraulicOilGrade"];
    $engineOilGrade1 = $_POST["engineOilGrade"];
    $statuss1 = $_POST["status"];
    $assetcode1 = $_POST["assetcode"];
    // $currentrental = $_POST["crnt-rental"];
    // $expectedrental = $_POST["exp-rental"];
    $workorder = $_POST["workorder"];
    $workorder_valid = $_POST["workorder_validity"];
    $rc_valid = $_POST["rc_validity"];
    $fc_valid = $_POST["fc_validity"];
    $np_valid = $_POST["np_validity"];
    $insaurance = $_POST["insaurance"];
    $operator_fname = $_POST["operator-fname"];
    $unit=$_POST['unit'];
    $client_name=$_POST['client_name'];
    $project_name=$_POST['project_name'];
    $project_location=$_POST['project_location'];
    $rental_charges_wo=$_POST['rental_charges_wo'];
    $shift_wo=$_POST['shift_wo'];
    $ot_charges=$_POST['ot_charges'];
    $hour_shift=$_POST['hour_shift'];
    $working_days_month=$_POST['working_days_month'];
    $sunday_condition=$_POST['sunday_condition'];
    $fuel_norms=$_POST['fuel_condition'];
    $chassis_number=$_POST['chassis_number'];

    $sql=("UPDATE `fleet1` SET chassis_number='$chassis_number' ,fuel_norms='$fuel_norms',working_days_in_month='$working_days_month', condition_sundays='$sunday_condition', hour_shift='$hour_shift', rental_charges_wo='$rental_charges_wo', shift_wo='$shift_wo', ot_charges='$ot_charges',unit='$unit', project_name='$project_name' , project_location= '$project_location' , client_name='$client_name' , make='$make1', model='$model1', yom='$yom1', type='$type1',capacity='$capacity1',
    registration='$registration1',chassis='$chassis1', engine='$engine1',
    workorder='$workorder', rc_valid='$rc_valid', fc_valid='$fc_valid', insaurance_valid='$insaurance',
    np_valid='$np_valid',operator_fname='$operator_fname',workorder_valid='$workorder_valid',boom_length='$boomLength1',
    jib_length='$jibLength1',luffing_length='$luffingLength1',diesel_tank_capacity='$dieselTankCap1',
    hydraulic_oil_tank='$hydraulicOilTank1',assetcode='$assetcode1',engine_oil_capacity='$engineOilCapacity1',
    engine_oil_grade='$engineOilGrade1',hydraulic_oil_grade='$hydraulicOilGrade1',status='$statuss1' WHERE snum='$editnewId'");
    if (mysqli_query($conn, $sql)) {
        // echo "Record updated successfully";
        session_start();
        $_SESSION['message']='message';
        header('Location: viewfleet2.php');
        exit;
    
    } else {
        session_start();
        $_SESSION['error_message'];
        header('Location: viewfleet2.php');
        exit;
    
    }

    // Redirect back to the original page (e.g., a success page or the list of records)
}


