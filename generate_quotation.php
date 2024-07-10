<?php
include_once 'partials/_dbconnect.php';

$showAlert = false;
$showError = false;
$showAlertuser=false;

session_start();
$companyname001 = $_SESSION['companyname'];

$asset_code_selection = "SELECT * FROM `fleet1` WHERE `companyname`='$companyname001'";
$result_asset_code = mysqli_query($conn, $asset_code_selection);

$asset_code_selection1 = "SELECT * FROM `fleet1` WHERE `companyname`='$companyname001'";
$result_asset_code1 = mysqli_query($conn, $asset_code_selection1);

$asset_code_selection2 = "SELECT * FROM `fleet1` WHERE `companyname`='$companyname001'";
$result_asset_code2 = mysqli_query($conn, $asset_code_selection2);


$sql_sender_name="SELECT * FROM `team_members` where company_name='$companyname001'";
$result_sender_name=mysqli_query($conn,$sql_sender_name);


$sql_sender_name1="SELECT * FROM `team_members` where company_name='$companyname001'";
$result_sender_name1=mysqli_query($conn,$sql_sender_name);
$sender_name=mysqli_fetch_assoc($result_sender_name1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $quote_date = $_POST['quotation_date'];
    $to_name = $_POST['to'];
    $to_address = $_POST['to_address'];
    $contact_person_name = $_POST['contact_person'];
    $contact_peson_cell = $_POST['contact_number'];
    $email_id = $_POST['email_id'];
    $site_location = $_POST['site_location'];
    $sender_office_address=$_POST['sender_office_address'];
    $asset_code = $_POST['asset_code'];
   
    $sql_equip_specs="SELECT * FROM `fleet1` where assetcode='$asset_code' and companyname='$companyname001'";
    $result_spec=mysqli_query($conn,$sql_equip_specs);
    $row_specs=mysqli_fetch_assoc($result_spec);


    $availability = $_POST['availability'];
    $hours_duration = $_POST['hours_duration'];
    $days_duration = $_POST['days_duration'];
    $condition = $_POST['condition'];
    $rental_charges = $_POST['rental_charges'];
    $mob_charges = $_POST['mob_charges'];
    $demob_charges = $_POST['demob_charges'];
    $location = $_POST['location'];
    $adblue = $_POST['adblue'];
    $sender = $_POST['sender'];
    $fleet_category = !empty($_POST['fleet_category']) ? $_POST['fleet_category'] : "null";
    $type = !empty($_POST['type']) ? $_POST['type'] : "null";    
    $new_fleet_cap=$_POST['new_fleet_cap'];
    $yom_new_fleet=$_POST['yom_new_fleet'];
    $newfleet_cap = isset($_POST['newfleet_cap']) && !empty($_POST['newfleet_cap']) ? $_POST['newfleet_cap'] : "null";
    $boomLength=$_POST['boomLength'];
    $jibLength=$_POST['jibLength'];
    $luffingLength=$_POST['luffingLength'];
    $newfleetmake=$_POST['newfleetmake'];
    $newfleetmodel=$_POST['newfleetmodel'];
    $fuel = $_POST['fuel_per_hour'];
    $tentative = isset($_POST['tentative_date']) ? $_POST['tentative_date'] : "none";


    $period=$_POST['contract_period_select'];
    $adv_pay=$_POST['advance_payment_select'];
    $crew=$_POST['operating_crew_select'];
    $room=$_POST['operator_room_scope_select'];
    $food=$_POST['crew_food_scope_select'];
    $travel=$_POST['crew_travelling_select'];
    $brkdown=$_POST['breakdown_select'];
    $ot_payment=$_POST['ot_payment'];
    $payment_terms_select=$_POST['payment_terms_select'];
    $delay_pay=$_POST['delay_pay'];
    $assembly=$_POST['equipment_assembly_select'];
    $tpi=$_POST['tpi_scope_select'];
    $safety_security=$_POST['safety_security_select'];
    $tools_tackels=$_POST['tools_tackels'];
    $gst=$_POST['gst'];
    $force_clause=$_POST['force_clause'];

$asset_code1 = isset($_POST['asset_code1']) ? $_POST['asset_code1'] : null;
$avail1 = isset($_POST['avail1']) ? $_POST['avail1'] : null;
$fleet_category1 = isset($_POST['fleet_category1']) ? $_POST['fleet_category1'] : null;
$type1 = isset($_POST['type1']) ? $_POST['type1'] : null;
$newfleetmake1=$_POST['newfleetmake1'];
$newfleetmodel1=$_POST['newfleetmodel1'];
$fleetcap2=$_POST['fleetcap2'];
$unit2 = isset($_POST['unit2']) ? $_POST['unit2'] : null;
$yom2=$_POST['yom2'];
$boomLength2=$_POST['boomLength2'];
$jibLength2=$_POST['jibLength2'];
$luffingLength2=$_POST['luffingLength2'];
$date_ = isset($_POST['date_']) ? $_POST['date_'] : null;
$rental2=$_POST['rental2'];
$mob02=$_POST['mob02'];
$demob02=$_POST['demob02'];
$equiplocation02=$_POST['equiplocation02'];
$adblue2 = isset($_POST['adblue2']) ? $_POST['adblue2'] : null;
$fuelperltr2=$_POST['fuelperltr2'];












    if(!empty(($_POST['fleet_category'])) && !empty(($_POST['type']))){
        $sql_insertion="INSERT INTO `quotation_generated` (`sender_office_address`,`tentative_date`,`contact_person_cell`,`yom`,`cap`,`cap_unit`,`boom`,`jib`,`luffing`,`availability`,`fuel/hour`,`make`,`model`,`sub_Type`,`quote_date`, `to_name`, `to_address`, `contact_person`, `email_id_contact_person`, 
        `site_loc`, `asset_code`, `hours_duration`, `days_duration`, `sunday_included`, `rental_charges`, `mob_charges`, `demob_charges`,
         `crane_location`, `adblue`, `sender_name`, `sender_number`, `sender_contact`, `company_name`,`period_contract`, `adv_pay`, `crew`, `room`, `food`, `travel`, `brkdown`, `ot_pay`, `pay_terms`, `delay_pay`, `equipment_assembly`, `tpi`, `safety`, `tools`, `gst`, `force_clause`) 
        VALUES ('$sender_office_address','$tentative','$contact_peson_cell','$yom_new_fleet','$new_fleet_cap','$newfleet_cap','$boomLength','$jibLength','$luffingLength','$availability','$fuel','$newfleetmake','$newfleetmodel','$type','$quote_date', '$to_name', '$to_address', '$contact_person_name', '$email_id', '$site_location', '$asset_code', '$hours_duration',
         '$days_duration', '$condition', '$rental_charges', '$mob_charges', '$demob_charges', '$location', '$adblue', '$sender', '" .$sender_name['mob_number'] ."', '" .$sender_name['email'] ."', '$companyname001','$period','$adv_pay','$crew','$room','$food','$travel','$brkdown','$ot_payment','$payment_terms_select','$delay_pay','$assembly','$tpi','$safety_security','$tools_tackels','$gst','$force_clause')";
         $result_insertion = mysqli_query($conn, $sql_insertion);

         if ($result_insertion) {
             $showAlert = true;
         } else {
             $showError = true;
         }
 
    }
else{
    $sql_insertion1="INSERT INTO `quotation_generated` (`sender_office_address`,`tentative_date`,`contact_person_cell`,`yom`,`cap`,`cap_unit`,`boom`,`jib`,`luffing`,`availability`,`fuel/hour`,`make`,`model`,`sub_Type`,`quote_date`, `to_name`, `to_address`, `contact_person`, `email_id_contact_person`, 
        `site_loc`, `asset_code`, `hours_duration`, `days_duration`, `sunday_included`, `rental_charges`, `mob_charges`, `demob_charges`,
         `crane_location`, `adblue`, `sender_name`, `sender_number`, `sender_contact`, `company_name`,`period_contract`, `adv_pay`, `crew`, `room`, `food`, `travel`, `brkdown`, `ot_pay`, `pay_terms`, `delay_pay`, `equipment_assembly`, `tpi`, `safety`, `tools`, `gst`, `force_clause`) 
        VALUES ('$sender_office_address','$tentative','$contact_peson_cell','". $row_specs['yom'] . "','". $row_specs['capacity'] . "','". $row_specs['unit'] . "','". $row_specs['boom_length'] . "','". $row_specs['jib_length'] . "','". $row_specs['luffing_length'] . "','$availability','$fuel','". $row_specs['make'] . "','". $row_specs['model'] . "','". $row_specs['sub_type'] . "','$quote_date', '$to_name', '$to_address', '$contact_person_name', '$email_id', '$site_location', '$asset_code', '$hours_duration',
         '$days_duration', '$condition', '$rental_charges', '$mob_charges', '$demob_charges', '$location', '$adblue', '$sender', '" .$sender_name['mob_number'] ."', '" .$sender_name['email'] ."', '$companyname001','$period','$adv_pay','$crew','$room','$food','$travel','$brkdown','$ot_payment','$payment_terms_select','$delay_pay','$assembly','$tpi','$safety_security','$tools_tackels','$gst','$force_clause')";

        $result_insertion1= mysqli_query($conn, $sql_insertion1);

        if ($result_insertion1) {
            $showAlert = true;
        } else {
            $showError = true;
        }
    }
 }
?>
<?php  
$sql_logo_check="SELECT * FROM `quotation_generated` where company_name='$companyname001'";
$result_logo=mysqli_query($conn , $sql_logo_check);
$row_logo=mysqli_fetch_assoc($result_logo);
?>
<?php 
$sql_company_address="SELECT * FROM `login` where companyname='$companyname001'";
$sql_result_company_address=mysqli_query($conn , $sql_company_address);
$row_companyaddress=mysqli_fetch_assoc($sql_result_company_address);
?>
<?php 
if(isset($_SESSION['user_added'])){
    $showAlertuser=true;
    unset($_SESSION['user_added']);
    
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">      <link rel="icon" href="favicon.jpg" type="image/x-icon">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="main.js"></script>
    <title>Generate Quotation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style><?php include "style.css" ?></style>
    <script><?php include "main.js" ?></script>
</head>
<body>
<div class="navbar1">
    <div class="iconcontainer">
        <ul>
            <li><a href="rental_dashboard.php">Dashboard</a></li>
            <li><a href="view_news.php">News</a></li>
            <li><a href="logout.php">Log Out</a></li>
        </ul>
    </div>
</div>

<?php
if ($showAlert) {
    echo  '<label>
    <input type="checkbox" class="alertCheckbox" autocomplete="off" />
    <div class="alert notice">
      <span class="alertClose">X</span>
      <span class="alertText_addfleet"><b>Success! </b>Quotation Generated Successfully<a href="generate_quotation_landingpage.php">View It Here</a>
          <br class="clear"/></span>
    </div>
  </label>';
}
if ($showError) {
    echo '<label>
    <input type="checkbox" class="alertCheckbox" autocomplete="off" />
    <div class="alert error">
      <span class="alertClose">X</span>
      <span class="alertText">Something Went Wrong
          <br class="clear"/></span>
    </div>
  </label>';
}
if($showAlertuser){
    echo '<label>
    <input type="checkbox" class="alertCheckbox" autocomplete="off" />
    <div class="alert notice">
      <span class="alertClose">X</span>
      <span class="alertText">User Added SUccessfully!
          <br class="clear"/></span>
    </div>
  </label>';
 }

?>

<form action="generate_quotation.php" method="POST" class="generate_quotation" enctype="multipart/form-data">
    <div class="generate_quote_container">
        <div class="generate_quote_heading">Generate Quotation</div>
        <div class="trial1">
    <input type="date" placeholder="" name="quotation_date" class="input02" value="<?php echo date('Y-m-d'); ?>">
    <label for="" class="placeholder2"> Quotation Date</label>
</div>
<div class="trial1">
        <h5>Sender Name Not In List ? <a href="quote_subuser.php">Add Team Members Here</a> </h5>
    <select name="sender" id="sender" class="input02">
    <option value="" disabled selected>Select Senders Name</option>
    <?php
    while ($row_sender_name = mysqli_fetch_assoc($result_sender_name)) {
        echo '<option value="' . $row_sender_name['name'] . '">' . $row_sender_name['name'] . '</option>';
    }
    ?>
</select>
    </div>


        <div class="outer02">

        <div class="trial1">
        <input type="text" placeholder="" name="to" class="input02" >
        <label for="" class="placeholder2">To</label>
        </div>
        <div class="trial1">
        <input type="text" placeholder="" name="to_address" class="input02" >
        <label for="" class="placeholder2">To Address</label>
        </div>
        </div>
        <div class="outer02">
        <div class="trial1">
        <input type="text" placeholder="" name="contact_person" class="input02" >
        <label for="" class="placeholder2">Contact Person</label>
        </div>
        <div class="trial1">
        <input type="text" placeholder="" name="contact_number" class="input02" >
        <label for="" class="placeholder2">Contact Number</label>
        </div>
        
        <div class="trial1">
        <input type="text" placeholder="" name="email_id" class="input02" >
        <label for="" class="placeholder2">Email Id</label>
        </div>
        <div class="trial1">
        <input type="text" placeholder="" name="site_location" class="input02" >
        <label for="" class="placeholder2">Site Location</label>
        </div>
        </div>
        <div class="outer02">
        <div class="trial1">
        <select name="asset_code" name="" class="input02" onchange="choose_new_equ()" id="choose_Ac">
            <option value="" disabled selected>Choose Asset Code</option>
            <option value="New Equipment">Choose New Equipment</option>
    <?php
        while ($row_asset_code = mysqli_fetch_assoc($result_asset_code1)) {
            echo '<option value="' . $row_asset_code['assetcode'] . '">' . $row_asset_code['assetcode'] . " (" . $row_asset_code['sub_type'] . " " . $row_asset_code['make'] . " " . $row_asset_code['model'] . ")" . '</option>';
        }
    ?>
        </select>
        </div>
        <div class="trial1">
            <select name="availability" id="availability_dd" class="input02" onchange="not_immediate()">
                <option value=""disabled selected>Availability</option>
                <option value="Immediate">Immediate</option>
                <option value="Not Immediate">Select A Date</option>
            </select>
        </div>
        </div>
        <div class="outer02" id="new_equip" >
        <div class="trial1">
        <select class="input02" name="fleet_category" id="oem_fleet_type" onchange="purchase_option()" >
            <option value="" disabled selected>Select Fleet Category</option>
            <option value="Aerial Work Platform">Aerial Work Platform</option>
            <option value="Concrete Equipment">Concrete Equipment</option>
            <option value="EarthMovers and Road Equipments">EarthMovers and Road Equipments</option>
            <!-- <option value="aerial_work_platform">Aerial Work Platform</option> -->
            <option value="Material Handling Equipments">Material Handling Equipments</option>
            <option value="Ground Engineering Equipments">Ground Engineering Equipments</option>
            <option value="Trailor and Truck">Trailor and Truck</option>
            <option value="Generator and Lighting">Generator and Lighting</option>
        </select>

        </div>
        <div class="trial1">
        <select class="input02" name="type" id="fleet_sub_type" >
            <option value="" disabled selected>Select Fleet Type</option>
            <option value="Self Propelled Articulated Boomlift"class="awp_options"  id="aerial_work_platform_option1">Self Propelled Articulated Boomlift</option>
            <option value="Scissor Lift Diesel" class="awp_options" id="aerial_work_platform_option2">Scissor Lift Diesel</option>
            <option value="Scissor Lift Electric"class="awp_options"  id="aerial_work_platform_option3">Scissor Lift Electric</option>
            <option value="Spider Lift"class="awp_options"  id="aerial_work_platform_option4">Spider Lift</option>
            <option value="Self Propelled Straight Boomlift"class="awp_options"  id="aerial_work_platform_option5">Self Propelled Straight Boomlift</option>
            <option value="Truck Mounted Articulated Boomlift"class="awp_options"  id="aerial_work_platform_option6">Truck Mounted Articulated Boomlift</option>
            <option value="Truck Mounted Straight Boomlift"class="awp_options"  id="aerial_work_platform_option7">Truck Mounted Straight Boomlift</option>
            <option value="Batching Plant"class="cq_options" id="concrete_equipment_option1">Batching Plant</option>
            <option value="Concrete Boom Placer"class="cq_options" id="concrete_equipment_option2">Concrete Boom Placer</option>
            <option value="Concrete Pump"class="cq_options" id="concrete_equipment_option3">Concrete Pump</option>
            <option value="Moli Pump"class="cq_options" id="concrete_equipment_option4">Moli Pump</option>
            <option value="Mobile Batching Plant"class="cq_options" id="concrete_equipment_option5">Mobile Batching Plant</option>
            <option value="Static Boom Placer"class="cq_options" id="concrete_equipment_option6">Static Boom Placer</option>
            <option value="Transit Mixer"class="cq_options" id="concrete_equipment_option7">Transit Mixer</option>
            <option value="Baby Roller" class="earthmover_options" id="earthmovers_option1">Baby Roller</option>
            <option value="Backhoe Loader" class="earthmover_options" id="earthmovers_option2">Backhoe Loader</option>
            <option value="Bulldozer" class="earthmover_options" id="earthmovers_option3">Bulldozer</option>
            <option value="Excavator" class="earthmover_options" id="earthmovers_option4">Excavator</option>
            <option value="Milling Machine" class="earthmover_options" id="earthmovers_option5">Milling Machine</option>
            <option value="Motor Grader" class="earthmover_options" id="earthmovers_option6">Motor Grader</option>
            <option value="Pneumatic Tyre Roller" class="earthmover_options" id="earthmovers_option7">Pneumatic Tyre Roller</option>
            <option value="Single Drum Roller" class="earthmover_options" id="earthmovers_option8">Single Drum Roller</option>
            <option value="Skid Loader" class="earthmover_options" id="earthmovers_option9">Skid Loader</option>
            <option value="Slip Form Paver" class="earthmover_options" id="earthmovers_option10">Slip Form Paver</option>
            <option value="Soil Compactor" class="earthmover_options" id="earthmovers_option11">Soil Compactor</option>
            <option value="Tandem Roller" class="earthmover_options" id="earthmovers_option12">Tandem Roller</option>
            <option value="Vibratory Roller" class="earthmover_options" id="earthmovers_option13">Vibratory Roller</option>
            <option value="Wheeled Excavator" class="earthmover_options" id="earthmovers_option14">Wheeled Excavator</option>
            <option value="Wheeled Loader" class="earthmover_options" id="earthmovers_option15">Wheeled Loader</option>
            <option id="mhe_option1"  class="mhe_options" value="Fixed Tower Crane">Fixed Tower Crane</option>
            <option id="mhe_option2" class="mhe_options" value="Fork Lift Diesel">Fork Lift Diesel</option>
            <option id="mhe_option3" class="mhe_options" value="Fork Lift Electric">Fork Lift Electric</option>
            <option id="mhe_option4" class="mhe_options" value="Hammerhead Tower Crane">Hammerhead Tower Crane</option>
            <option id="mhe_option5" class="mhe_options" value="Hydraulic Crawler Crane">Hydraulic Crawler Crane</option>
            <option id="mhe_option6" class="mhe_options" value="Luffing Jib Tower Crane">Luffing Jib Tower Crane</option>
            <option id="mhe_option7" class="mhe_options" value="Mechanical Crawler Crane">Mechanical Crawler Crane</option>
            <option id="mhe_option8" class="mhe_options" value="Pick and Carry Crane">Pick and Carry Crane</option>
            <option id="mhe_option9" class="mhe_options" value="Reach Stacker">Reach Stacker</option>
            <option id="mhe_option10" class="mhe_options" value="Rough Terrain Crane">Rough Terrain Crane</option>
            <option id="mhe_option11" class="mhe_options" value="Telehandler">Telehandler</option>
            <option id="mhe_option12" class="mhe_options" value="Telescopic Crawler Crane">Telescopic Crawler Crane</option>
            <option id="mhe_option13" class="mhe_options" value="Telescopic Mobile Crane">Telescopic Mobile Crane</option>
            <option id="mhe_option14" class="mhe_options" value="Terrain Mobile Crane">Terrain Mobile Crane</option>
            <option id="mhe_option15" class="mhe_options" value="Self Loading Truck Crane">Self Loading Truck Crane</option>

            <option id="ground_engineering_equipment_option" class="gee_options1" value="Hydraulic Drilling Rig">Hydraulic Drilling Rig</option>
            <option id="ground_engineering_equipment_option" class="gee_options1" value="Rotary Drilling Rig">Rotary Drilling Rig</option>
            <option id="ground_engineering_equipment_option" class="gee_options1" value="Vibro Hammer">Vibro Hammer</option>
            <option  id="trailor_option1" class="trailor_options" value="Dumper">Dumper</option>
            <option  id="trailor_option2" class="trailor_options" value="Truck">Truck</option>
            <option  id="trailor_option3" class="trailor_options" value="Water Tanker">Water Tanker</option>
            <option id="trailor_option4"  class="trailor_options" value="Low Bed">Low Bed</option>
            <option id="trailor_option5"  class="trailor_options" value="Semi Low Bed">Semi Low Bed</option>
            <option  id="trailor_option6" class="trailor_options" value="Flatbed">Flatbed</option>
            <option  id="trailor_option7" class="trailor_options" value="Hydraulic Axle">Hydraulic Axle</option>
            <option id="generator_option" class="generator_options" value="Silent Diesel Generator">Silent Diesel Generator</option>
            <option id="generator_option" class="generator_options" value="Mobile Light Tower">Mobile Light Tower</option>
            <option id="generator_option" class="generator_options" value="Diesel Generator">Diesel Generator</option>
        </select>

        </div>
    </div>
    <div class="outer02" id="newfleet_makemodel">
        <div class="trial1">
            <input type="text" placeholder="" name="newfleetmake" class="input02">
            <label for="" class="placeholder2">Fleet Make</label>
        </div>
        <div class="trial1">
            <input type="text" placeholder="" name="newfleetmodel" class="input02">
            <label for="" class="placeholder2">Fleet Model</label>
        </div>

    </div>
    <div class="outer02" id="newfleet_capinfo">
        <div class="trial1">
            <input type="text" placeholder="" name="new_fleet_cap" class="input02">
            <label for="" class="placeholder2">Fleet Capacity</label>
        </div>
        <div class="trial1" id="newfleet_unit">
            <select name="newfleet_cap" id="" class="input02">
                <option value=""disabled selected>Unit</option>
                <option value="Ton">Ton</option>
                <option value="Meter">Meter</option>
                <option value="m^3">M³</option>
            </select>
        </div>
        <div class="trial1">
            <input type="number" placeholder="" name="yom_new_fleet" class="input02" min="1900" max="2099">
            <label for="" class="placeholder2">YOM</label>
        </div>
    </div>
    <div class="outer02" id="newfleet_jib">
    <div class="trial1" >
            <input type="text" name="boomLength"  placeholder="" class=" input02" >
            <label class="placeholder2">Boom Length</label>
        </div>    
        <div class="trial1" >
            <input type="text" name="jibLength"  placeholder="" class="input02 " >
            <label class="placeholder2">Jib Length</label>
        </div>
        <div class="trial1">
            <input type="text" name="luffingLength"  placeholder="" class=" input02" >
            <label class="placeholder2">Luffing Length</label>
        </div>

    </div>
        <div class="trial1" id="date_of_availability" name="tentative_date">
            <input type="date" placeholder="" class="input02">
            <label for="" class="placeholder2">Tentative Date Of Availability</label>
        </div>
        <div class="trial1">
            <select name="shiftinfo" id="select_shift" class="input02" onchange="shift_hour()">
                <option value=""disabled selected>Select Shift</option>
                <option value="Single Shift">Single Shift</option>
                <option value="Double Shift">Double Shift</option>
                <option value="lexi Shift">Flexi Shift</option>
            </select>
        </div>
        <div class="trial1" id="single_Shift_hour">
            <input type="text" class="input02" name="hours_duration" placeholder="" >
            <label class="placeholder2" for="">Shift Duration In Hours</label>
        </div>
        <div class="trial1" id="othershift_enginehour">
            <input type="text" class="input02" name="" placeholder="" >
            <label class="placeholder2" for="">Engine Hours</label>
        </div>

        <div class="outer02">
        <div class="trial1">
            <input type="text" class="input02" name="days_duration" placeholder="">
            <label class="placeholder2" for="">Duration Of Days In Month</label>
        </div>
        <div class="trial1">
            <select name="condition" id="" class="input02">
                <option value=""disabled selected>Condition</option>
                <option value="Including Sundays">Including Sundays</option>
                <option value="Excluding Sundays">Excluding Sundays</option>
            </select>
        </div>
        </div>
        <div class="outer02">
        <div class="trial1">
            <input type="text" name="rental_charges" placeholder="" class="input02">
            <label for="" class="placeholder2">Rental Charges </label>
        </div>
        <div class="trial1">
            <input type="text" name="mob_charges" placeholder="" class="input02">
            <label for="" class="placeholder2">Mob Charges </label>
        </div>
        <div class="trial1">
            <input type="text" name="demob_charges" placeholder="" class="input02">
            <label for="" class="placeholder2">Demob Charges </label>
        </div>
        </div>
        <div class="outer02">
        <div class="trial1">
            <input type="text" name="location" placeholder="" class="input02">
            <label for="" class="placeholder2"> Equipment Location </label>
 
        </div>
        <div class="trial1">
            <select name="adblue" id="" class="input02">
                <option value=""disabled selected>Adblue?</option>
                <option value="Yes">Yes</option>
                <option value="No">No</option>
            </select>
        </div>
        <div class="trial1">
            <input type="text" placeholder="" name="fuel_per_hour" class="input02">
            <label for="" class="placeholder2">Fuel in ltrs Per Hour</label>
        </div>
        </div>
    <div class="trial1">
    <textarea type="text" placeholder="" name="sender_office_address" class="input02"><?php echo $row_companyaddress['company_address'] ;?></textarea>
    <label for="" class="placeholder2">Sender Office Address</label>
    </div>
    <div class="addbuttonicon" id="second_addequipbtn"><i onclick="other_quotation()"  class="bi bi-plus-circle"></i><p>Add Another Equipment</p></div>
    <div class="otherquipquote" id="new_out1">
        <br>
        <p>Add Second Equipment Details</p>
    <div class="outer02 mt-10px" >
        <div class="trial1">
        <select name="" name="asset_code1" class="input02" onchange="choose_new_equ2()" id="choose_Ac2">
            <option value="" disabled selected>Choose Asset Code</option>
            <option value="New Equipment">Choose New Equipment</option>
    <?php
        while ($row_asset_code2 = mysqli_fetch_assoc($result_asset_code)) {
            echo '<option value="' . $row_asset_code2['assetcode'] . '">' . $row_asset_code2['assetcode'] . " (" . $row_asset_code2['sub_type'] . " " . $row_asset_code2['make'] . " " . $row_asset_code2['model'] . ")" . '</option>';
        }
    ?>
        </select>
        </div>
        <div class="trial1">
            <select name="avail1" id="availability_dd2" class="input02" onchange="not_immediate2()">
                <option value=""disabled selected>Availability</option>
                <option value="Immediate">Immediate</option>
                <option value="Not Immediate">Select A Date</option>
            </select>
        </div>
        </div>
        <div class="newequip_details1" id="newequipdet1">
        <div class="outer02" id="" >
        <div class="trial1">
        <select class="input02" name="fleet_category1" id="oem_fleet_type1" onchange="seco_equip()" >
            <option value="" disabled selected>Select Fleet Category</option>
            <option value="Aerial Work Platform">Aerial Work Platform</option>
            <option value="Concrete Equipment">Concrete Equipment</option>
            <option value="EarthMovers and Road Equipments">EarthMovers and Road Equipments</option>
            <!-- <option value="aerial_work_platform">Aerial Work Platform</option> -->
            <option value="Material Handling Equipments">Material Handling Equipments</option>
            <option value="Ground Engineering Equipments">Ground Engineering Equipments</option>
            <option value="Trailor and Truck">Trailor and Truck</option>
            <option value="Generator and Lighting">Generator and Lighting</option>
        </select>

        </div>
        <div class="trial1">
        <select class="input02" name="type1" id="fleet_sub_type1" >
            <option value="" disabled selected>Select Fleet Type</option>
            <option value="Self Propelled Articulated Boomlift"class="awp_options1"  id="aerial_work_platform_option1">Self Propelled Articulated Boomlift</option>
            <option value="Scissor Lift Diesel" class="awp_options1" id="aerial_work_platform_option2">Scissor Lift Diesel</option>
            <option value="Scissor Lift Electric"class="awp_options1"  id="aerial_work_platform_option3">Scissor Lift Electric</option>
            <option value="Spider Lift"class="awp_options1"  id="aerial_work_platform_option4">Spider Lift</option>
            <option value="Self Propelled Straight Boomlift"class="awp_options1"  id="aerial_work_platform_option5">Self Propelled Straight Boomlift</option>
            <option value="Truck Mounted Articulated Boomlift"class="awp_options1"  id="aerial_work_platform_option6">Truck Mounted Articulated Boomlift</option>
            <option value="Truck Mounted Straight Boomlift"class="awp_options1"  id="aerial_work_platform_option7">Truck Mounted Straight Boomlift</option>
            <option value="Batching Plant"class="cq_options1" id="concrete_equipment_option1">Batching Plant</option>
            <option value="Concrete Boom Placer"class="cq_options1" id="concrete_equipment_option2">Concrete Boom Placer</option>
            <option value="Concrete Pump"class="cq_options1" id="concrete_equipment_option3">Concrete Pump</option>
            <option value="Moli Pump"class="cq_options1" id="concrete_equipment_option4">Moli Pump</option>
            <option value="Mobile Batching Plant"class="cq_options1" id="concrete_equipment_option5">Mobile Batching Plant</option>
            <option value="Static Boom Placer"class="cq_options1" id="concrete_equipment_option6">Static Boom Placer</option>
            <option value="Transit Mixer"class="cq_options1" id="concrete_equipment_option7">Transit Mixer</option>
            <option value="Baby Roller" class="earthmover_options1" id="earthmovers_option1">Baby Roller</option>
            <option value="Backhoe Loader" class="earthmover_options1" id="earthmovers_option2">Backhoe Loader</option>
            <option value="Bulldozer" class="earthmover_options1" id="earthmovers_option3">Bulldozer</option>
            <option value="Excavator" class="earthmover_options1" id="earthmovers_option4">Excavator</option>
            <option value="Milling Machine" class="earthmover_options1" id="earthmovers_option5">Milling Machine</option>
            <option value="Motor Grader" class="earthmover_options1" id="earthmovers_option6">Motor Grader</option>
            <option value="Pneumatic Tyre Roller" class="earthmover_options1" id="earthmovers_option7">Pneumatic Tyre Roller</option>
            <option value="Single Drum Roller" class="earthmover_options1" id="earthmovers_option8">Single Drum Roller</option>
            <option value="Skid Loader" class="earthmover_options1" id="earthmovers_option9">Skid Loader</option>
            <option value="Slip Form Paver" class="earthmover_options1" id="earthmovers_option10">Slip Form Paver</option>
            <option value="Soil Compactor" class="earthmover_options1" id="earthmovers_option11">Soil Compactor</option>
            <option value="Tandem Roller" class="earthmover_options1" id="earthmovers_option12">Tandem Roller</option>
            <option value="Vibratory Roller" class="earthmover_options1" id="earthmovers_option13">Vibratory Roller</option>
            <option value="Wheeled Excavator" class="earthmover_options1" id="earthmovers_option14">Wheeled Excavator</option>
            <option value="Wheeled Loader" class="earthmover_options1" id="earthmovers_option15">Wheeled Loader</option>
            <option id="mhe_option1"  class="mhe_options1" value="Fixed Tower Crane">Fixed Tower Crane</option>
            <option id="mhe_option2" class="mhe_options1" value="Fork Lift Diesel">Fork Lift Diesel</option>
            <option id="mhe_option3" class="mhe_options1" value="Fork Lift Electric">Fork Lift Electric</option>
            <option id="mhe_option4" class="mhe_options1" value="Hammerhead Tower Crane">Hammerhead Tower Crane</option>
            <option id="mhe_option5" class="mhe_options1" value="Hydraulic Crawler Crane">Hydraulic Crawler Crane</option>
            <option id="mhe_option6" class="mhe_options1" value="Luffing Jib Tower Crane">Luffing Jib Tower Crane</option>
            <option id="mhe_option7" class="mhe_options1" value="Mechanical Crawler Crane">Mechanical Crawler Crane</option>
            <option id="mhe_option8" class="mhe_options1" value="Pick and Carry Crane">Pick and Carry Crane</option>
            <option id="mhe_option9" class="mhe_options1" value="Reach Stacker">Reach Stacker</option>
            <option id="mhe_option10" class="mhe_options1" value="Rough Terrain Crane">Rough Terrain Crane</option>
            <option id="mhe_option11" class="mhe_options1" value="Telehandler">Telehandler</option>
            <option id="mhe_option12" class="mhe_options1" value="Telescopic Crawler Crane">Telescopic Crawler Crane</option>
            <option id="mhe_option13" class="mhe_options1" value="Telescopic Mobile Crane">Telescopic Mobile Crane</option>
            <option id="mhe_option14" class="mhe_options1" value="Terrain Mobile Crane">Terrain Mobile Crane</option>
            <option id="mhe_option15" class="mhe_options1" value="Self Loading Truck Crane">Self Loading Truck Crane</option>

            <option id="ground_engineering_equipment_option1" class="gee_options1" value="Hydraulic Drilling Rig">Hydraulic Drilling Rig</option>
            <option id="ground_engineering_equipment_option2" class="gee_options1" value="Rotary Drilling Rig">Rotary Drilling Rig</option>
            <option id="ground_engineering_equipment_option3" class="gee_options1" value="Vibro Hammer">Vibro Hammer</option>
            <option  id="trailor_option1" class="trailor_options1" value="Dumper">Dumper</option>
            <option  id="trailor_option2" class="trailor_options1" value="Truck">Truck</option>
            <option  id="trailor_option3" class="trailor_options1" value="Water Tanker">Water Tanker</option>
            <option id="trailor_option4"  class="trailor_options1" value="Low Bed">Low Bed</option>
            <option id="trailor_option5"  class="trailor_options1" value="Semi Low Bed">Semi Low Bed</option>
            <option  id="trailor_option6" class="trailor_options1" value="Flatbed">Flatbed</option>
            <option  id="trailor_option7" class="trailor_options1" value="Hydraulic Axle">Hydraulic Axle</option>
            <option id="generator_option1" class="generator_options" value="Silent Diesel Generator">Silent Diesel Generator</option>
            <option id="generator_option2" class="generator_options" value="Mobile Light Tower">Mobile Light Tower</option>
            <option id="generator_option3" class="generator_options" value="Diesel Generator">Diesel Generator</option>
        </select>

        </div>
    </div>
    <div class="outer02" id="">
        <div class="trial1">
            <input type="text" placeholder="" name="newfleetmake1" class="input02">
            <label for="" class="placeholder2">Fleet Make</label>
        </div>
        <div class="trial1">
            <input type="text" placeholder="" name="newfleetmodel1" class="input02">
            <label for="" class="placeholder2">Fleet Model</label>
        </div>

    </div>
    <div class="outer02" id="">
        <div class="trial1">
            <input type="text" placeholder="" name="fleetcap2" class="input02">
            <label for="" class="placeholder2">Fleet Capacity</label>
        </div>
        <div class="trial1" id="newfleet_unit">
            <select name="unit2" id="" class="input02">
                <option value=""disabled selected>Unit</option>
                <option value="Ton">Ton</option>
                <option value="Meter">Meter</option>
                <option value="m^3">M³</option>
            </select>
        </div>
        <div class="trial1">
            <input type="number" placeholder="" name="yom2" class="input02" min="1900" max="2099">
            <label for="" class="placeholder2">YOM</label>
        </div>
    </div>
    <div class="outer02" id="">
    <div class="trial1" >
            <input type="text" name="boomLength2"  placeholder="" class=" input02" >
            <label class="placeholder2">Boom Length</label>
        </div>    
        <div class="trial1" >
            <input type="text" name="jibLength2"  placeholder="" class="input02 " >
            <label class="placeholder2">Jib Length</label>
        </div>
        <div class="trial1">
            <input type="text" name="luffingLength2"  placeholder="" class=" input02" >
            <label class="placeholder2">Luffing Length</label>
        </div>
    </div>

    </div>
        <div class="trial1" id="date_of_availability2" >
            <input type="date" placeholder="" name="date_" class="input02">
            <label for="" class="placeholder2">Tentative Date Of Availability</label>
        </div>
        <div class="outer02">
        <div class="trial1">
            <input type="text" name="rental2" placeholder="" class="input02">
            <label for="" class="placeholder2">Rental Charges </label>
        </div>
        <div class="trial1">
            <input type="text" name="mob02" placeholder="" class="input02">
            <label for="" class="placeholder2">Mob Charges </label>
        </div>
        <div class="trial1">
            <input type="text" name="demob02" placeholder="" class="input02">
            <label for="" class="placeholder2">Demob Charges </label>
        </div>
        </div>
        <div class="outer02">
        <div class="trial1">
            <input type="text" name="equiplocation02" placeholder="" class="input02">
            <label for="" class="placeholder2"> Equipment Location </label>
 
        </div>
        <div class="trial1">
            <select name="adblue2" id="" class="input02">
                <option value=""disabled selected>Adblue?</option>
                <option value="Yes">Yes</option>
                <option value="No">No</option>
            </select>
        </div>
        <div class="trial1">
            <input type="text" placeholder="" name="fuelperltr2" class="input02">
            <label for="" class="placeholder2">Fuel in ltrs Per Hour</label>
        </div>
        </div>
        <!-- <div class="addbuttonicon" id="lastaddequipbtn"><i onclick="addanother_equip()"  class="bi bi-plus-circle"></i><p>Add Another Equipment</p></div> -->
        </div>




    
    
    <div class="terms_container012">
    <p class="heading_terms">Terms & Conditions :

</p>


<p class="terms_condition">
    <strong>Period Of Contract :</strong> Minimum Order Shall Be 
    <select name="contract_period_select" id="contract_period_select">
        <option value="1 Month">1 Month</option>
        <option value="2 Month">2 Months</option>
        <option value="3 Month">3 Months</option>
        <option value="6 Month">6 Months</option>
        <option value="9 Month">9 Months</option>
        <option value="12 Month">12 Months</option>
        <option value="18 Month">18 Months</option>
        <option value="24 Month">24 Months</option>
    </select>
</p>

<p class="terms_condition">
    <strong>Advance Payment :</strong> 
    <select name="advance_payment_select" id="advance_payment_select">
        <option value="NA">Not Applicable</option>
        <option value="Applicable - Mobilization + Rental Charges">Applicable - Mobilization + Rental Charges</option>
        <option value="Applicable - Mobilization + Rental Charges + Demobilization Charges">Applicable - Mobilization + Rental Charges + Demobilization Charges</option>
    </select>
</p>

<p class="terms_condition">
    <strong>Operating Crew :</strong> 
    <select name="operating_crew_select" id="operating_crew_select">
        <option value="Single Operator">Single Operator</option>
        <option value="Double Operator">Double Operator</option>
        <option value="Single Operator + Helper">Single Operator + Helper</option>
        <option value="Double Operator + Helper">Double Operator + Helper</option>
    </select>
</p>

<p class="terms_condition">
    <strong>Operator Room Scope :</strong> 
    <select name="operator_room_scope_select" id="operator_room_scope_select">
        <option value="NA">Not Applicable</option>
        <option value="Client Scope">In Client Scope</option>
        <option value="Rental Company Scope">In Rental Company Scope</option>
    </select>
</p>

<p class="terms_condition">
    <strong>Crew Food Scope :</strong>  
    <select name="crew_food_scope_select" id="crew_food_scope_select">
        <option value="NA">Not Applicable</option>
        <option value="In Client Scope">In Client Scope</option>
        <option value="In Rental Company Scope">In Rental Company Scope</option>
    </select>
</p>

<p class="terms_condition">
    <strong>Crew Travelling :</strong>  
    <select name="crew_travelling_select" id="crew_travelling_select">
        <option value="NA">Not Applicable</option>
        <option value="In Client Scope">In Client Scope</option>
        <option value="In Rental Company Scope">In Rental Company Scope</option>
    </select>
</p>

<p class="terms_condition">
    <strong>Breakdown :</strong> 
    <select name="breakdown_select" id="breakdown_select">
        <option value="NA">Free Time - Not Applicable</option>
        <option value="Free Time - First 6 Hours">Free Time - First 6 Hours</option>
        <option value="Free Time - First 12 Hours">Free Time - First 12 Hours</option>
    </select> 
    After free time, breakdown charges to be deducted on pro-rata basis
</p>

<p class="terms_condition">
    <strong>Payment Terms :</strong> 
    <select name="payment_terms_select" id="payment_terms_select">
        <option value="Within 7 Days Of invoice submission">Within 7 Days Of invoice submission</option>
        <option value="Within 10 Days Of invoice submission">Within 10 Days Of invoice submission</option>
        <option value="Within 30 Days Of invoice submission">Within 30 Days Of invoice submission</option>
        <option value="Within 45 Days Of invoice submission">Within 45 Days Of invoice submission</option>
    </select>
</p>




<p class="terms_condition">
    <strong>Equipment Assembly :</strong> 
    <select name="equipment_assembly_select" id="equipment_assembly_select">
        <option value="NA">Not Applicable</option>
        <option value="Unloading + Assembly + Dismentling + Loading">Unloading + Assembly + Dismentling + Loading</option>
        <option value="Unloading & Loading">Unloading & Loading</option>
    </select>
</p>

<p class="terms_condition">
    <strong>TPI Scope :</strong> 
    <select name="tpi_scope_select" id="tpi_scope_select">
        <option value="Not Required">Not Required</option>
        <option value="In Client Scope">In Client Scope</option>
        <option value="In Rental Company">In Rental Company</option>
    </select>
</p>

<p class="terms_condition">
    <strong>Safety And Security :</strong> 
    <select name="safety_security_select" id="safety_security_select">
        <option value="Not Required">Not Required</option>
        <option value="In Client Scope">In Client Scope</option>
        <option value="In Rental Company">In Rental Company</option>
    </select>
</p>




<p class="terms_condition">
    <strong>GST :</strong>
<textarea name="gst" id="" cols="30" rows="1" class="terms_textarea"> Applicable. Extra payable at actual invoice value at 18%.</textarea>
</p>


<p class="terms_condition">
    <strong>Over time payment :</strong>
<textarea name="ot_payment" id="" cols="30" rows="2" class="terms_textarea"> Applicable. OT charges at 100% pro-rata basis payable if equipment has worked beyond stipulated work shift, engine hours and on Sundays,National holidays</textarea>
</p>

<p class="terms_condition">
    <strong>Delay payment clause :</strong>
<textarea name="delay_pay" id="" cols="30" rows="3" class="terms_textarea"> In case, the payment credit terms are not honoured, we reserve the right to hault the machine operators, and our rental charges shall be in force. Additionally, an interest of 18% PA to be charges on outstanding amount.</textarea>
</p>




<p class="terms_condition">
    <strong>Tools & Tackles :</strong>
<textarea name="tools_tackels" id="" cols="30" rows="2" class="terms_textarea"> Related Tools And Tackles , Required Safety PPE Kit And Gears To Be Provided By Client On FOC basis.</textarea>
</p>

<p class="terms_condition">
    <strong>Force Majeure clause :</strong>
<textarea name="force_clause" id="" cols="30" rows="3" class="terms_textarea"> If the equipment deployment gets delayed due to transit delays, plants related gate pass, loading at client site, forces of nature and reasons beyond our control, no penalty shall be levied on us.</textarea>
</p>




    </div>
<button class="quotation_submit" type="submit">SUBMIT</button>
<br><br>

    </div>
</form>
<script>
    function not_immediate(){
 const availability_dd=document.getElementById("availability_dd");
 const date_of_availability=document.getElementById("date_of_availability");
 if(availability_dd.value==="Not Immediate"){
    date_of_availability.style.display="block"
 }
 else{
    date_of_availability.style.display="none";
 }
    }

    function purchase_option() {
    const options = document.getElementsByClassName('awp_options');
    const options1 = document.getElementsByClassName('cq_options');
    const options2 = document.getElementsByClassName('earthmover_options');
    const options3 = document.getElementsByClassName('mhe_options');
    const options4 = document.getElementsByClassName('gee_options');
    const options5 = document.getElementsByClassName('trailor_options');
    const options6 = document.getElementsByClassName('generator_options');

    const first_select = document.getElementById('oem_fleet_type');

    // Set the display style for all elements at once
    const displayStyle = (first_select.value === "Aerial Work Platform") ? "block" : "none";
    Array.from(options).forEach(option => option.style.display = displayStyle);

    const displayStyle1 = (first_select.value === "Concrete Equipment") ? "block" : "none";
    Array.from(options1).forEach(option => option.style.display = displayStyle1);

    const displayStyle2 = (first_select.value === "EarthMovers and Road Equipments") ? "block" : "none";
    Array.from(options2).forEach(option => option.style.display = displayStyle2);

    const displayStyle3 = (first_select.value === "Material Handling Equipments") ? "block" : "none";
    Array.from(options3).forEach(option => option.style.display = displayStyle3);

    const displayStyle4 = (first_select.value === "Ground Engineering Equipments") ? "block" : "none";
    Array.from(options4).forEach(option => option.style.display = displayStyle4);

    const displayStyle5 = (first_select.value === "Trailor and Truck") ? "block" : "none";
    Array.from(options5).forEach(option => option.style.display = displayStyle5);

    const displayStyle6 = (first_select.value === "Generator and Lighting") ? "block" : "none";
    Array.from(options6).forEach(option => option.style.display = displayStyle6);


}



function seco_equip() {
    const options1 = document.getElementsByClassName('awp_options1');
    const options11 = document.getElementsByClassName('cq_options1');
    const options21 = document.getElementsByClassName('earthmover_options1');
    const options31 = document.getElementsByClassName('mhe_options1');
    const options41 = document.getElementsByClassName('gee_options1');
    const options51 = document.getElementsByClassName('trailor_options1');
    const options61 = document.getElementsByClassName('generator_options1');

    const first_select1 = document.getElementById('oem_fleet_type1');

    // Set the display style for all elements at once
    const displayStyle00 = (first_select1.value === "Aerial Work Platform") ? "block" : "none";
    Array.from(options1).forEach(option => option.style.display = displayStyle00);

    const displayStyle1 = (first_select1.value === "Concrete Equipment") ? "block" : "none";
    Array.from(options11).forEach(option => option.style.display = displayStyle1);

    const displayStyle2 = (first_select1.value === "EarthMovers and Road Equipments") ? "block" : "none";
    Array.from(options21).forEach(option => option.style.display = displayStyle2);

    const displayStyle3 = (first_select1.value === "Material Handling Equipments") ? "block" : "none";
    Array.from(options31).forEach(option => option.style.display = displayStyle3);

    const displayStyle4 = (first_select1.value === "Ground Engineering Equipments") ? "block" : "none";
    Array.from(options41).forEach(option => option.style.display = displayStyle4);

    const displayStyle5 = (first_select1.value === "Trailor and Truck") ? "block" : "none";
    Array.from(options51).forEach(option => option.style.display = displayStyle5);

    const displayStyle6 = (first_select1.value === "Generator and Lighting") ? "block" : "none";
    Array.from(options61).forEach(option => option.style.display = displayStyle6);


}


</script>
</body>
</html>
