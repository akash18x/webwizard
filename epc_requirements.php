<?php
session_start();
$email = $_SESSION['email'];
$companyname001 = $_SESSION['companyname'];
$showAlert = false;
$showError = false;
?>
<?php
if($_SERVER["REQUEST_METHOD"] == "POST")

{
include 'partials/_dbconnect.php';
$project_code=$_POST['project_code'];
// $project_type=$_POST['project_type_epc'];
$fuel=$_POST['fuel_scope'];
$accomodation=$_POST['accomodation_scope'];
$fleet_category=$_POST['fleet_category'];
$type = $_POST["type"];
$quip_capacity = $_POST["equip_capacity"];
$unit=$_POST['unit'];
$engine_hour = isset($_POST['engine_hour']) ? $_POST['engine_hour'] : NULL;
$contact_person=$_POST['contact_person'];
$req_notes=$_POST['notes'];
$boom_combination = $_POST["boom_combination"];
$project_type = $_POST["project_type"];
$state = $_POST["state"];
$district = $_POST["district"];
$duration = $_POST["duration"];
$workingshift = $_POST["workingshift"];
$date = $_POST["date"];
$comp_name = $_POST["comp_name"];
$epc_email = $_POST["epc_email"];
$epc_number = $_POST["epc_number"];

$sql_insert="INSERT INTO `req_by_epc` (`enquiry_posted_date`,`project_code`,`fuel_scope`,`accomodation_scope`,`fleet_category`,`contact_person`,`engine_hour`,`notes`,`unit`, `equipment_type`, `equipment_capacity`, `boom_combination`, `project_type`,  `state`, `district`,`duration_month`, `working_shift`, `tentative_date`, `epc_name`, `epc_email`, `epc_number`)
 VALUES (NOW(),'$project_code','$fuel','$accomodation','$fleet_category','$contact_person','$engine_hour','$req_notes','$unit', '$type', '$quip_capacity', '$boom_combination', '$project_type', '$state', '$district', '$duration', '$workingshift', '$date', '$comp_name', '$epc_email', '$epc_number')";
$result= mysqli_query($conn , $sql_insert);
if($result){
$showAlert=true;
}
else{
    $showError=true;
}
}

?>
<style>
  <?php include "style.css" ?>
</style>
<script>
    <?php include "main.js" ?>
    </script>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">      <link rel="icon" href="favicon.jpg" type="image/x-icon">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="navbar1">
        <div class="iconcontainer">
        <ul>
            <li><a href="epc_dashboard.php">Dashboard</a></li>
            <li><a href="view_news_epc.php">News</a></li>
            
            <li><a href="logout.php">Log Out</a></li></ul>
        </div>
    </div> 
    <?php
    if($showAlert){
       echo '<label>
       <input type="checkbox" class="alertCheckbox" autocomplete="off" />
       <div class="alert notice">
         <span class="alertClose">X</span>
         <span class="alertText">Requirement Posted Successfully <a href="epc_view_my_requirement.php">View Requirement</a>
             <br class="clear"/></span>
       </div>
     </label>';
    }
    if($showError){
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

<form action="epc_requirements.php" method="POST" class="epc_req1" autocomplete="off">
    <div class="epc_red_div">
        <div class="epc_req_heading"><h2>Post Your Requirement</h2></div>
        <div class="outer02">
            <div class="trial1">
                <!-- <select name="" id="" class="input02">
                    <option value=""disabled selected>Choose Project Code</option>
                </select> -->
                <input type="text" placeholder="" name="project_code" class="input02">
                <label for="" class="placeholder2">Project Code</label>
            </div>
        <div class="trial1">
        <select class="input02" name="project_type" id="">
            <option value="" disabled selected>Choose Project Type</option>
            <option value="Urban Infra">Urban Infra</option>
            <option value="PipeLine">PipeLine</option>
            <option value="Marine">Marine</option>
            <option value="Road">Road</option>
            <option value="Bridge And Metro">Bridge And Metro</option>
            <option value="Plant">Plant</option>
            <option value="Refinery">Refinery</option>
            <option value="Others">Others</option>
        </select>
        </div>
        <div class="trial1">
            <input class="input02" id="tentative_date" name="date" type="date"  placeholder="" >
            <label class="placeholder2"> Equipment Required At Site</label>
            </div></div>

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
            <option value="Bateling Plant"class="cq_options" id="concrete_equipment_option1">Bateling Plant</option>
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
        <input type="text" name="equip_capacity" class="input02" placeholder="">
        <label class="placeholder2">Equipment Capacity</label>
        </div>
        <div class="trial1">
            <select name="unit" id="" class="input02" required>
            <option value="" disabled selected>Select  Unit</option>
                <option value="Ton">Ton</option>
                <option value="Meter">Meter</option>
                <option value="m^3">M³</option>
            </select>
        </div>

        <div class="trial1">
        <input type="text" name="boom_combination" class="input02" placeholder="">
        <label class="placeholder2">Boom Combination</label>
        </div>
        </div>
        <div class="outer02">
        <div class="trial1">
            <select class="input02" name="workingshift" id="working_shift_dd" onchange="engine_hour_input()">
                <option value="" disabled selected> Select Working shift</option>
                <option value="Single">Single</option>
                <option value="Double">Double</option>
                <option value="Flexi Single">Flexi Single</option>
            </select>
            </div>
            <div class="trial1">
            <select name="fuel_scope" id="" class="input02">
                <option value=""disabled selected>Fuel In Scope Of?</option>
                <option value="EPC Scope">EPC Scope</option>
                <option value="Service Provider">Service Provider</option>
            </select></div>
            <div class="trial1">
                <select name="accomodation_scope" id="" class="input02">
                    <option value=""disabled selected>Accomodation In Scope Of?</option>
                    <option value="EPC Scope">EPC Scope</option>
                    <option value="Service Provider">Service Provider</option>
                </select>
            
            </div>
        </div>
        <div class="outer02">
        <div class="trial1">
            <input class="input02" name="duration" type="text" placeholder="" >
            <label class="placeholder2">Duration In Months</label>
            </div>
        <div class="trial1">
            <select class="input02" name="state" id="state">
                <option value="" disabled selected>Project State</option>
                <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                <option value="Andhra Pradesh">Andhra Pradesh</option>
                <option value="Assam">Assam</option>
                <option value="Bihar">Bihar</option>
                <option value="Chandigarh">Chandigarh</option>
                <option value="Chhattisgarh">Chhattisgarh</option>
                <option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
                <option value="Daman and Diu">Daman and Diu</option>
                <option value="Delhi">Delhi</option>
                <option value="Lakshadweep">Lakshadweep</option>
                <option value="Puducherry">Puducherry</option>
                <option value="Goa">Goa</option>
                <option value="Gujarat">Gujarat</option>
                <option value="Haryana">Haryana</option>
                <option value="Himachal Pradesh">Himachal Pradesh</option>
                <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                <option value="Jharkhand">Jharkhand</option>
                <option value="Karnataka">Karnataka</option>
                <option value="Kerala">Kerala</option>
                <option value="Madhya Pradesh">Madhya Pradesh</option>
                <option value="Maharashtra">Maharashtra</option>
                <option value="Manipur">Manipur</option>
                <option value="Meghalaya">Meghalaya</option>
                <option value="Mizoram">Mizoram</option>
                <option value="Nagaland">Nagaland</option>
                <option value="Odisha">Odisha</option>
                <option value="Punjab">Punjab</option>
                <option value="Rajasthan">Rajasthan</option>
                <option value="Sikkim">Sikkim</option>
                <option value="Tamil Nadu">Tamil Nadu</option>
                <option value="Telangana">Telangana</option>
                <option value="Tripura">Tripura</option>
                <option value="Uttar Pradesh">Uttar Pradesh</option>
                <option value="Uttarakhand">Uttarakhand</option>
                <option value="West Bengal">West Bengal</option>
            </select>
            </div>
            <div class="trial1">
            <input class="input02"id="project_district" name="district" type="text" placeholder="">
            <label class="placeholder2">Project District</label>
            </div>
            </div>
            <!-- <div class="outer02"> -->
            <!-- <div class="trial1">
            <input class="input02" name="duration" type="text" placeholder="" >
            <label class="placeholder2">Duration In Months</label>
            </div>  -->
            <!-- <div class="trial1">
            <select class="input02" name="workingshift" id="working_shift_dd" onchange="engine_hour_input()">
                <option value="" disabled selected> Select Working shift</option>
                <option value="Single">Single</option>
                <option value="Double">Double</option>
                <option value="Flexi Single">Flexi Single</option>
            </select> -->
            <!-- </div> -->
            <div class="trial1" id="engine_hour_dd">
                <select name="engine_hour"  class="input02">
                    <option value="" disabled selected>Choose Engine Hour</option>
                    <option value="260">260</option>
                    <option value="280">280</option>
                    <option value="300">300</option>
                    <option value="312">312</option>
                    <option value="416">416</option>
                    <option value="572">572</option>
                </select>
            </div>
            

            
            <!-- <div class="trial1"> -->
            <input class="input02" name="comp_name" type="text" value="<?php echo$companyname001 ?>" placeholder="" readonly hidden>
            <!-- <label class="placeholder2">Company Name</label> -->
            <!-- </div><div class="trial1"> -->
            <input class="input02" name="epc_email" value="<?php echo$email ?>" type="text" placeholder="" readonly hidden>
            <!-- <label class="placeholder2">Email</label> -->
            <!-- </div> -->
            <div class="outer02">

            <div class="trial1">
            <input class="input02" name="contact_person" type="text" placeholder="">
            <label class="placeholder2"> Contact Person</label>
            </div>
            <div class="trial1">
            <input class="input02" name="epc_number" type="text" placeholder="">
            <label class="placeholder2"> Contact Number</label>
            </div>
            </div>
            <div class="trial1">
            <textarea class="input02" name="notes" type="text" placeholder=""></textarea>
            <label class="placeholder2">Requirements Notes for vendor</label>
            </div>
            <button class="epc-button" type="submit">Submit</button>
            <br>
        </div>
</form>
    <br><br>
    <script>   
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

    function engine_hour_input(){
        const dd_menu=document.getElementById('working_shift_dd');
        const work=document.getElementById('engine_hour_dd');
        if(dd_menu.value==='Double' || dd_menu.value==='Flexi Single'){
            work.style.display='block';
        }
        else{
            work.style.display='none';
        }
    }
    </script>
</body>
</html>