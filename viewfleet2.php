<?php
session_start();
$_SESSION['loggedin'] = true;

include_once 'partials/_dbconnect.php'; // Include the database connection file
$showAlert=false;
$showError=false;
$showAlert_addfleet=false;
$showError_addfleet=false;
// Start the session and retrieve the company name from the session

$companyname001 = $_SESSION['companyname'];
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // Redirect the user to the homepage
    header("Location: sign_in.php");
    exit; // Stop further execution
}




// Fetch fleet statistics based on company name
$query = "SELECT status, COUNT(*) AS count FROM `fleet1` WHERE companyname='$companyname001' GROUP BY status";
$getData = $conn->query($query);
?>
<?php
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    include 'partials/_dbconnect.php';
    $make = $_POST["make"];
    $other_make = $_POST['other_make'];
    $category = $_POST['fleet_category'];
    $type = $_POST["type"];
    $model = $_POST["model"];
    $assetcode = $_POST["assetcode"];
    $companyname = $_POST["companyname"];
    $yom = $_POST["yom"];
    $capacity = $_POST["capacity"];
    $unit =$_POST['unit'];
    $registration = $_POST["registration"];
    $chassis = $_POST["chassis_make"];
    $other_chassis_make = $_POST['new_chassis_maker'];
    // $engine = $_POST["engine"];
    $boomLength = $_POST["boomLength"];
    $jibLength = $_POST["jibLength"];
    $luffingLength = $_POST["luffingLength"];
    $statuss = $_POST["status"];
    // $chassis_number=$_POST['chassis_number'];

    $sql_exist="SELECT * FROM `oem_fleet` WHERE fleet_category='$category' and fleet_Type='$type' and make='$make' and model='$model'";
    $result_exist= mysqli_query($conn , $sql_exist);
    $row=mysqli_fetch_assoc($result_exist);
    if($row){
        $sql = "INSERT INTO `fleet1` (`make`, `other_make`, `category`, `sub_type`, `model`, `assetcode`, `companyname`, `yom`, `capacity`, `unit`, `registration`, `chassis`, `other_chassis`,  `boom_length`, `jib_length`, `luffing_length`, `status`,`diesel_tank_capacity`,`hydraulic_oil_tank`,`engine_oil_capacity`,`engine_oil_grade`,`hydraulic_oil_grade`) 
    VALUES ('$make', '$other_make', '$category', '$type', '$model', '$assetcode', '$companyname', '$yom', '$capacity', '$unit', '$registration', '$chassis', '$other_chassis_make', '$boomLength', '$jibLength', '$luffingLength', '$statuss', '" . $row['diesel_tank_cap'] . "','" . $row['hydraulic_oil_tank'] . "','" . $row['engine_oil_cap'] . "','" . $row['engine_oil_grade'] . "','" . $row['hydraulic_oil_grade'] . "')";
            $result = mysqli_query($conn , $sql);
            if($result){
                $showAlert=true;
            }
            
    }
else{
    $sql = "INSERT INTO `fleet1` (`make`, `other_make`, `category`, `sub_type`, `model`, `assetcode`, `companyname`, `yom`, `capacity`, `unit`, `registration`, `chassis`, `other_chassis`,  `boom_length`, `jib_length`, `luffing_length`, `status`) 
    VALUES ('$make', '$other_make', '$category', '$type', '$model', '$assetcode', '$companyname', '$yom', '$capacity', '$unit', '$registration', '$chassis', '$other_chassis_make',  '$boomLength', '$jibLength', '$luffingLength', '$statuss')";    $result = mysqli_query($conn , $sql);
    if($result){
        $showAlert_addfleet=true;
    }
    else{
        $showError_addfleet=true;
    }

}
}
?>

<style>
  <?php include "style.css" 
  ?>
</style>
<?php
$sql_notification_count_expiry="SELECT COUNT(sno) AS total_notification FROM `insaurance_notification` where company_name='$companyname001'";
$result_count=mysqli_query($conn,$sql_notification_count_expiry);
$row_count_noti= mysqli_fetch_assoc($result_count);
$count_of_notification=$row_count_noti['total_notification']
?>

<?php
include_once 'partials/_dbconnect.php'; // Include the database connection file

$noti_check = "SELECT COUNT(snum) AS total FROM `fleet1` WHERE companyname='akash'";
$result = mysqli_query($conn, $noti_check);

$row = mysqli_fetch_assoc($result);
$total_count = $row['total'];
?>

<?php
$sql_noti="SELECT * FROM `insaurance_notification` WHERE `company_name`='$companyname001'";
$result_noti=mysqli_query($conn,$sql_noti);
?>
<?php
if(isset($_SESSION['message']))
{
    $showAlert=true;
    unset($_SESSION['message']);
}
else if (isset($_SESSION['error_message'])){
    $showError=true;
    unset($_SESSION['error_message']);
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">      <link rel="icon" href="favicon.jpg" type="image/x-icon">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Fleet</title>
    <link rel="stylesheet" href="style.css">
    <script src="main.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <style>
        .center-block {
        
        
            width: 100%;
            height: 300px;
            
        }
    </style>
</head>
<body>
    <!-- Navbar section -->
    <div class="navbar1">
        <div class="iconcontainer">
            <ul>
                <li><a href="rental_dashboard.php">Dashboard</a></li>
                <li><a href="view_news.php">News</a></li>
                <li><a href="logout.php">Logout</a></li>
                <!-- <li><a href="logout.php" >Alerts</a></li> -->
                <li <?php if($count_of_notification == 0) echo 'style="display: none;"' ?>><div class="alerts" onclick="expirynotification()" ><?php echo $count_of_notification ?> Alerts</div></li>

                <!-- <li><a onclick="expirynotification()" id="alerticon" class="notification-icon"><i class="fa-regular fa-bell"></i></a></li> -->
               



                

            </ul>
        </div>
    </div> 
    <?php
if($showAlert){
    echo '<label>
    <input type="checkbox" class="alertCheckbox" autocomplete="off" />
    <div class="alert notice">
        <span class="alertClose">X</span>
        <span class="alertText">Fleet Edited Successfully<br class="clear"/></span>
    </div>
    </label>';
}
if($showError){
    echo '<label>
    <input type="checkbox" class="alertCheckbox" autocomplete="off" />
    <div class="alert error">
        <span class="alertClose">X</span>
        <span class="alertText">Something Went Wrong<br class="clear"/></span>
    </div>
    </label>';
}
if($showAlert_addfleet){
    echo  '<label>
    <input type="checkbox" class="alertCheckbox" autocomplete="off" />
    <div class="alert notice">
      <span class="alertClose">X</span>
      <span class="alertText_addfleet"><b>Success!</b>Fleet Added Successfully<a href="viewfleet2.php">View Fleet Here</a>
          <br class="clear"/></span>
    </div>
  </label>';
 }
 if($showError_addfleet){
    echo '<label>
    <input type="checkbox" class="alertCheckbox" autocomplete="off" />
    <div class="alert error">
      <span class="alertClose">X</span>
      <span class="alertText">Something Went Wrong
          <br class="clear"/></span>
    </div>
  </label>';
 }
  
?>
<div class="add_fleet_btn_new"><button onclick="addfleetnew()" class="new_add">Add Fleet</button></div>
<div class="modal_new_fleetadd" id="newfleet_btn_add">
<form action="viewfleet2.php" method="POST" autocomplete="off" class="addcraneform">
    <div class="formcontainer">
        <div class="add-fleet"><p class="add_rental_fleet">Add Your Fleet</p><i onclick="window.location.href = 'viewfleet2.php';" class="fa-solid fa-xmark"></i></div>
        <div class="trial1">
        <input type="text" name="companyname" placeholder="" value="<?php echo$companyname001 ?>" class="input02" readonly>
        <label class="placeholder2">Company Name</label>
        </div>

        <div class="outer02">
        <div class="trial1">
        <select class="input02" name="fleet_category" id="oem_fleet_type" onchange="purchase_option()" required>
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
        <select class="input02" name="type" id="fleet_sub_type" onchange="crawler_options()" required>
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
            <option value="Shotcrete Machine"class="cq_options" id="concrete_equipment_option7">Shotcrete Machine</option>
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

            <option id="ground_engineering_equipment_option1" class="gee_options" value="Hydraulic Drilling Rig">Hydraulic Drilling Rig</option>
            <option id="ground_engineering_equipment_option2" class="gee_options" value="Rotary Drilling Rig">Rotary Drilling Rig</option>
            <option id="ground_engineering_equipment_option3" class="gee_options" value="Vibro Hammer">Vibro Hammer</option>
            <option  id="trailor_option1" class="trailor_options" value="Dumper">Dumper</option>
            <option  id="trailor_option2" class="trailor_options" value="Truck">Truck</option>
            <option  id="trailor_option3" class="trailor_options" value="Water Tanker">Water Tanker</option>
            <option id="trailor_option4"  class="trailor_options" value="Low Bed">Low Bed</option>
            <option id="trailor_option5"  class="trailor_options" value="Semi Low Bed">Semi Low Bed</option>
            <option  id="trailor_option6" class="trailor_options" value="Flatbed">Flatbed</option>
            <option  id="trailor_option7" class="trailor_options" value="Hydraulic Axle">Hydraulic Axle</option>
            <option id="generator_option1" class="generator_options" value="Silent Diesel Generator">Silent Diesel Generator</option>
            <option id="generator_option2" class="generator_options" value="Mobile Light Tower">Mobile Light Tower</option>
            <option id="generator_option3" class="generator_options" value="Diesel Generator">Diesel Generator</option>
        </select>
        </div>
        </div>
        <div class="outer02">
        <div class="trial1">
        <input type="text" class="input02" placeholder="" name="assetcode" required>
        <label class="placeholder2">Asset Code</label>
        </div>
        <div class="trial1">
        <select class="input02" name="make" id="crane_make_retnal" onchange="rental_addfleet()" required> 
            <option value="" disabled selected>Choose Fleet Make</option>
  <option value="ACE">ACE</option>
  <option value="Ajax Fiori">Ajax Fiori</option>
  <option value="AMW">AMW</option>
  <option value="Apollo">Apollo</option>
  <option value="Aquarius">Aquarius</option>
  <option value="Ashok Leyland">Ashok Leyland</option>
  <option value="Atlas Copco">Atlas Copco</option>
  <option value="Belaz">Belaz</option>
  <option value="Bemi">Bemi</option>
  <option value="BEML">BEML</option>
  <option value="Bharat Benz">Bharat Benz</option>
  <option value="Bob Cat">Bob Cat</option>
  <option value="Bull">Bull</option>
  <option value="Bauer">Bauer</option>
  <option value="BMS">BMS</option>
  <option value="Bomag">Bomag</option>
  <option value="Case">Case</option>
  <option value="Cat">Cat</option>
  <option value="Cranex">Cranex</option>
  <option value="Casagrande">Casagrande</option>
  <option value="Coles">Coles</option>
  <option value="CHS">CHS</option>
    <option value="Doosan">Doosan</option>
    <option value="Dynapac">Dynapac</option>
    <option value="Demag">Demag</option>
    <option value="Eicher">Eicher</option>
    <option value="Escorts">Escorts</option>
    <option value="Fuwa">Fuwa</option>
    <option value="Fushan">Fushan</option>
    <option value="Genie">Genie</option>
    <option value="Godrej">Godrej</option>
    <option value="Grove">Grove</option>
    <option value="Hamm AG">Hamm AG</option>
    <option value="Haulott">Haulott</option>
    <option value="Hidromek">Hidromek</option>
    <option value="Hydrolift">Hydrolift</option>
    <option value="Hyundai">Hyundai</option>
    <option value="Hidrocon">Hidrocon</option>
    <option value="Ingersoll Rand">Ingersoll Rand</option>
    <option value="Isuzu">Isuzu</option>
    <option value="IHI">IHI</option>
    <option value="JCB">JCB</option>
    <option value="JLG">JLG</option>
    <option value="Jaypee">Jaypee</option>
    <option value="Jinwoo">Jinwoo</option>
    <option value="John Deere">John Deere</option>
    <option value="Jackson">Jackson</option>
    <option value="Kamaz">Kamaz</option>
    <option value="Kato">Kato</option>
    <option value="Kobelco">Kobelco</option>
    <option value="Komatsu">Komatsu</option>
    <option value="Konecranes">Konecranes</option>
    <option value="Kubota">Kubota</option>
    <option value="KYB Conmat">KYB Conmat</option>
    <option value="Krupp">Krupp</option>
    <option value="Kirloskar">Kirloskar</option>
    <option value="Kohler">Kohler</option>
    <option value="L&T">L&T</option>
    <option value="Leeboy">Leeboy</option>
    <option value="LGMG">LGMG</option>
    <option value="Liebherr">Liebherr</option>
    <option value="Link-Belt">Link-Belt</option>
    <option value="Liugong">Liugong</option>
    <option value="Lorain">Lorain</option>
    <option value="Mahindra">Mahindra</option>
    <option value="Manitou">Manitou</option>
    <option value="Maintowoc">Maintowoc</option>
    <option value="Marion">Marion</option>
    <option value="MAIT">MAIT</option>
    <option value="Marchetti">Marchetti</option>
    <option value="Noble Lift">Noble Lift</option>
    <option value="New Holland">New Holland</option>
    <option value="Palfinger">Palfinger</option>
    <option value="Potain">Potain</option>
    <option value="Putzmeister">Putzmeister</option>
    <option value="P&H">P&H</option>
    <option value="Pinguely">Pinguely</option>
    <option value="PTC">PTC</option>
    <option value="Reva">Reva</option>
    <option value="Sany">Sany</option>
    <option value="Scania">Scania</option>
    <option value="Schwing Stetter">Schwing Stetter</option>
    <option value="SDLG">SDLG</option>
    <option value="Sennebogen">Sennebogen</option>
    <option value="Shuttle Lift">Shuttle Lift</option>
    <option value="Skyjack">Skyjack</option>
    <option value="Snorkel">Snorkel</option>
    <option value="Soilmec">Soilmec</option>
    <option value="Sunward">Sunward</option>
    <option value="Tadano">Tadano</option>
    <option value="Tata Hitachi">Tata Hitachi</option>
    <option value="TATA">TATA</option>
    <option value="Terex">Terex</option>
    <option value="TIL">TIL</option>
    <option value="Toyota">Toyota</option>
    <option value="Teupen">Teupen</option>
    <option value="Unicon">Unicon</option>
    <option value="Urb Engineering">Urb Engineering</option>
    <option value="Universal Construction">Universal Construction</option>
    <option value="Unipave">Unipave</option>
    <option value="Vogele">Vogele</option>
    <option value="Volvo">Volvo</option>
    <option value="Wirtgen Group">Wirtgen Group</option>
    <option value="XCMG Group">XCMG Group</option>
    <option value="XGMA">XGMA</option>
    <option value="Yanmar">Yanmar</option>
    <option value="Zoomlion">Zoomlion</option>
    <option value="ZPMC">ZPMC</option>
    <option value="Others">Others</option>
</select>
</div>

        <div class="trial1">
        <input type="text" class="input02" placeholder="" name="model" required>
        <label class="placeholder2">Model</label>
        </div>
        
        </div>
        <div class="trial1" id="othermake01">
        <input type="text" placeholder="" name="other_make" id="" class="input02" >
        <label class="placeholder2">Specify Other Make</label>
        </div>

        
        <div class="cap_container">
        <div class="trial1">
    <input type="number" name="yom" placeholder="" class="input02" required
           min="1900" max="2099">
    <label class="placeholder2">YOM</label>
</div>
        <div class="trial1">
        <input type="text" name="capacity" placeholder="" class="input02" required>
        <label class="placeholder2">Capacity</label>
        </div>
        <div class="trial1">
            <select name="unit" id="" class="input02" required>
            <option value="" disabled selected>Select Capacity Unit</option>
                <option value="Ton">Ton</option>
                <option value="Meter">Meter</option>
                <option value="m^3">M³</option>
            </select>
        </div>
        </div>
        <div class="trial1" id="registration_rental" >
        <input type="text" name="registration" placeholder="" class="input02">
        <label class="placeholder2">Registration</label>
        </div>
        <div class="trial1">
        <select name="chassis_make" class="input02 chassis_makedd" id="chassis_make_rental" onchange="chassis_make_rental1()" required>
            <option value="">Choose Chassis Make</option>
            <option value="AWM">AWM</option>
            <option value="Eicher">Eicher</option>
            <option value="TATA">TATA</option>
            <option value="Bharat Benz">Bharat Benz</option>
            <option value="Ashok Leyland">Ashok Leyland</option>
            <option value="Volvo">Volvo</option>
            <option value="Other">Other</option>
        </select>
        </div>
        <div class="trial1" id="otherchassis">
        <input type="text" name="new_chassis_maker" placeholder=""   class=" input02" >
        <label class="placeholder2">Specify Other Chassis Make</label>
        </div>
        <!-- <div class="trial1">
            <input type="text" name="chassis_number" placeholder="" class="input02">
            <label for="" class="placeholder2">Chassis Number</label>
        </div>
        <div class="trial1">
        <input type="text" name="engine" placeholder="" class="input02" >
        <label class="placeholder2">Engine Make</label>
        </div> -->
        <!-- <div class="length_outercontainer" id="length_outer"> -->
        <div class="trial1" id="length1">
            <input type="text" name="boomLength"  placeholder="" class=" input02" >
            <label class="placeholder2">Boom Length</label>
        </div>    
        <div class="trial1" id="length2">
            <input type="text" name="jibLength"  placeholder="" class="input02 " >
            <label class="placeholder2">Jib Length</label>
        </div>
        <div class="trial1" id="length3">
            <input type="text" name="luffingLength"  placeholder="" class=" input02" >
            <label class="placeholder2">Luffing Length</label>
        </div>
        <select class="craneforminput selectoption" name="status" required >
            <option value="" disabled selected>Choose Current Status</option>
            <option value="Working">Working</option>
            <option value="Idle">Idle</option>
            <option value="Not in use">Not in use</option>
        </select>
        <button type="SUBMIT" class="crane-submit" >Add Fleet</button>
        
<br>
    </div> 

    </form>  

</div>


<div class="chart_outer_cont">
    <div class="chartcontainer">
    <div class="container1234" style="margin-top: 5px;">
        <div id="container" class="center-block"></div>
    </div>
    <?php
    $sql_idle = "SELECT * FROM `fleet1` WHERE companyname='$companyname001' AND status='Working'";
    $result02 = mysqli_query($conn, $sql_idle);
    ?>
    <table class="idle_table">
        <tr>
            <th> Working Asset Codes</th>
        </tr>
        
        <?php
        while ($row = mysqli_fetch_assoc($result02)) {
            echo '<tr style="margin-top: 5px;">'; // Add top margin style to table rows
            echo '<td style="font-weight: bold;">'; // Add inline style for bold text
            echo '➼ <b>Assetcode:</b> ' . $row['assetcode'];
            echo '</td>';
            echo '</tr>';
        }
        ?>
    </table>
    <?php
    $sql_idle = "SELECT * FROM `fleet1` WHERE companyname='$companyname001' AND status='Idle'";
    $result02 = mysqli_query($conn, $sql_idle);
    ?>
    <table class="idle_table01">
        <tr>
            <th> Idle Asset Codes</th>
        </tr>
        
        <?php
        while ($row = mysqli_fetch_assoc($result02)) {
            echo '<tr style="margin-top: 5px;">'; // Add top margin style to table rows
            echo '<td style="font-weight: bold;">'; // Add inline style for bold text
            echo '➼ <b>Assetcode:</b> ' . $row['assetcode'];
            echo '</td>';
            echo '</tr>';
        }
        ?>
    </table>
</div>   </div>
    <!-- Display fleet information in a table -->
    <table class="members_table">
        <!-- <div class="working_head"><p>Working Fleet</p></div> -->
        <tr>
            
                <!-- Chart container -->
                
            

            <?php
            // Fetch fleet information
            $result = mysqli_query($conn, "SELECT * FROM fleet1 WHERE companyname='$companyname001' order by snum desc");
            $loop_count = 1;

            while ($row = mysqli_fetch_assoc($result)) { 
                echo '<td>';
                echo '<div class="viewfleet_outer">';
                
                // Display fleet information
                echo '<div class="fleetcard">';
                echo '<img src="viewfleet_bg.png">';  
                echo '</div>';
                
                echo '<div class="content">';
                echo '<p>‣ Assetcode: ' . $row['assetcode'] . '</p>';
                echo '<p>‣ Make: ' . $row['make'] . '</p>';
                echo '<p>‣ Model: ' . $row['model'] . '</p>';
                echo '<p>‣ Registration: ' . $row['registration'] . '</p>';
                echo '<p>‣ Operator: <a class="operator_fullinfo" href="explore_operator.php?id=' . $row['snum'] . '&fname=' . $row['operator_fname'] . '&lname=' . $row['operator_lname'] . '">' . $row['operator_fname'] . '</a></p>';
                echo '<p>‣ Status: ' . $row['status'] . '</p>';
                echo '</div>';

                // Display buttons for viewing and deleting
                echo '<div class="btn01">';
                echo '<div class="viewbtn">';
                echo "<a class='btn' href='additionalinfo.php?id=" . $row['snum'] . "'>View</a></div>";
                echo '<div class="delbtn">';
                echo "<a class='btn' href='delete.php?id=" . $row['snum'] . "'>Delete</a></div>";
                echo "<a class='btn' id='log_sheet' href='log_sheet.php?id=" . $row['snum'] . "'>Log Sheet</a></div>";

                echo '</div>';
                echo '</div>';
                echo '<br>';
                echo '</td>';

                if ($loop_count > 0 && $loop_count % 3 == 0) {
                    echo '</tr><tr>';
                }
                $loop_count++;
            }
            ?>
            
        </tr>
    </table>
    <div class="notification_background" id="notification_bg">
    <div class="noti_outer">
    <!-- <button>close all</button> -->
    <div class="closeall" onclick="close_all_notification('<?php echo $companyname001 ?>')"><i class="fa-solid fa-xmark cross_symbol"></i>  Close All</div>



<?php
while($row_noti_content = mysqli_fetch_assoc($result_noti) ){
    ?>
    <div class="noti_container">

        <div class="noti_content_main">
        <div class="content_holder">


        <?php 
echo $row_noti_content['document_expiring'] . " for Asset Code: " . $row_noti_content['asset_code'] . "<br>";
echo "Expires in " . $row_noti_content['days_left'] . " days" . "<br>";
?>
        </div>
<a onclick="del_notification(<?php echo $row_noti_content['sno']; ?>)" id="del_notification"><i class="fa-solid fa-xmark"></i></a>          


        </div>
    </div>
    
    <?php
}

?>
            </div>  
            </div> 

    <!-- JavaScript code for displaying the Highcharts pie chart -->
    <script>
        function expirynotification(){
            document.getElementById("notification_bg").style.display = "block";
        }

function close_all_notification(comp_name){
    window.location.href = "del_all_insaurance_notification.php?comp_name=" + comp_name;
}
function del_notification(del_noti) {
    window.location.href = "del_notification.php?notification_id=" + del_noti;
}
        Highcharts.chart('container', {
            credits: {
                enabled: false
            },
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie',
                
            },
            title: {
                text: 'Fleet Statistics:'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.y}</b>',
                valueSuffix: ' Fleet'
            },
            accessibility: {
                point: {
                    valueSuffix: ' Fleet'
                }
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: false
                    },
                    showInLegend: true
                }
            },
            series: [{
                name: 'Count',
                colorByPoint: true,
                data: [
                    <?php
                    $data = '';
                    if ($getData->num_rows > 0){
                        while ($row = $getData->fetch_object()){
                            $data .= '{ name: "'.$row->status.'", y: '.$row->count.' },';
                        }
                    }
                    echo $data;
                    ?>
                ]
            }]
        });


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

    </script>
</body>
</html>