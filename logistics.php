<?php
include_once 'partials/_dbconnect.php'; // Include the database connection file
session_start();
$email = $_SESSION["email"];
$companyname001 = $_SESSION['companyname'];
$showAlert = false;
$showError = false;

?>
<?php
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // Redirect the user to the homepage
    header("Location: sign_in.php");
    exit; // Stop further execution
}
?>
<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
include 'partials/_dbconnect.php';
$request_email = $_POST["email"];
$request_company = $_POST["company"];
$material = $_POST["material"];
$req_type = $_POST["req_type"];
$trailor_type = $_POST["trailor_type"];
// $trailor_type2 = $_POST["trailor_type2"];
$trailor_type2 = !empty($_POST["trailor_type2"]) ? $_POST["trailor_type2"] : NULL;
$trailor_type3 = !empty($_POST["trailor_type3"]) ? $_POST["trailor_type3"] : NULL;
$trailor_type4 = !empty($_POST["trailor_type4"]) ? $_POST["trailor_type4"] : NULL;
$trailor_type5 = !empty($_POST["trailor_type5"]) ? $_POST["trailor_type5"] : NULL;
$trailor_type6 = !empty($_POST["trailor_type6"]) ? $_POST["trailor_type6"] : NULL;
$trailor_type7 = !empty($_POST["trailor_type7"]) ? $_POST["trailor_type7"] : NULL;
$trailor_type8 = !empty($_POST["trailor_type8"]) ? $_POST["trailor_type8"] : NULL;
$trailor_type9 = !empty($_POST["trailor_type9"]) ? $_POST["trailor_type9"] : NULL;
$trailor_type10 = !empty($_POST["trailor_type10"]) ? $_POST["trailor_type10"] : NULL;

// $trailor_type3 = $_POST["trailor_type3"];
// $trailor_type4 = $_POST["trailor_type4"];
// $trailor_type5 = $_POST["trailor_type5"];
// $trailor_type6 = $_POST["trailor_type6"];
// $trailor_type7 = $_POST["trailor_type7"];
// $trailor_type8 = $_POST["trailor_type8"];
// $trailor_type9 = $_POST["trailor_type9"];
// $trailor_type10 = $_POST["trailor_type10"];
// $trailor_type11 = $_POST["trailor_type11"];
// $trailor_type12 = $_POST["trailor_type12"];
// $trailor_type13 = $_POST["trailor_type13"];
// $trailor_type14 = $_POST["trailor_type14"];
// $trailor_type15 = $_POST["trailor_type15"];

$length = $_POST["length"];
$length2 = $_POST["length2"];
$length3 = $_POST["length3"];
$length4 = $_POST["length4"];
$length5 = $_POST["length5"];
$length6 = $_POST["length6"];
$length7 = $_POST["length7"];
$length8 = $_POST["length8"];
$length9 = $_POST["length9"];
$length10 = $_POST["length10"];
// $length11 = $_POST["length11"];
// $length12 = $_POST["length12"];
// $length13 = $_POST["length13"];
// $length14 = $_POST["length14"];
// $length15 = $_POST["length15"];


$width = $_POST["width"];
$width2  = $_POST["width2"];
$width3  = $_POST["width3"];
$width4  = $_POST["width4"];
$width5  = $_POST["width5"];
$width6  = $_POST["width6"];
$width7  = $_POST["width7"];
$width8  = $_POST["width8"];
$width9  = $_POST["width9"];
$width10  = $_POST["width10"];
// $width11  = $_POST["width11"];
// $width12  = $_POST["width12"];
// $width13  = $_POST["width13"];
// $width14  = $_POST["width14"];
// $width15  = $_POST["width15"];




$height = $_POST["height"];
$height2 = $_POST["height2"];
$height3 = $_POST["height3"];
$height4 = $_POST["height4"];
$height5 = $_POST["height5"];
$height6 = $_POST["height6"];
$height7 = $_POST["height7"];
$height8 = $_POST["height8"];
$height9 = $_POST["height9"];
$height10 = $_POST["height10"];
// $height11 = $_POST["height11"];
// $height12 = $_POST["height12"];
// $height13 = $_POST["height13"];
// $height14 = $_POST["height14"];
// $height15 = $_POST["height15"];





$weight = $_POST["weight"];
$weight2 = $_POST["weight2"];
$weight3 = $_POST["weight3"];
$weight4 = $_POST["weight4"];
$weight5 = $_POST["weight5"];
$weight6 = $_POST["weight6"];
$weight7 = $_POST["weight7"];
$weight8 = $_POST["weight8"];
$weight9 = $_POST["weight9"];
$weight10 = $_POST["weight10"];
// $weight11 = $_POST["weight11"];
// $weight12 = $_POST["weight12"];
// $weight13 = $_POST["weight13"];
// $weight14 = $_POST["weight14"];
// $weight15 = $_POST["weight15"];


$from = $_POST["from"];
$from_pincode = $_POST["from_pincode"];
$to = $_POST["to"];
$to_pincode = $_POST["to_pincode"];
$payment = $_POST["payment_terms"];
$company_number = $_POST["company_number"];
$number_of_trailor=$_POST['no_of_trailor'];

$sql="INSERT INTO `logistics_need` (`number_of_trailor`,`email_need_generator`, `company_number` , `companyname_need_generator`, `material_detail`, `type_of_requirement`, `trailor_type1`, `length1`, `width1`, `height1`, `weight1`, `from`, `from_pincode`, `to`, `to_pincode`, `payment_terms`,
`trailor2`, `trailor3`, `trailor4`, `trailor5`, `trailor6`, `trailor7`,
 `trailor8`, `trailor9`, `trailor10`, `length2`, `length3`, `length4`, `length5`,
  `length6`, `length7`, `length8`, `length9`, `length10`, `width2`, `width3`, `width4`,
   `width5`, `width6`, `width7`, `width8`, `width9`, `width10`, `height2`, `height3`, 
   `height4`, `height5`, `height6`, `height7`, `height8`, `height9`, `height10`, `weight2`,
    `weight3`, `weight4`, `weight5`, `weight6`, `weight7`, `weight8`, `weight9`, `weight10`)
 VALUES
 ('$number_of_trailor','$request_email', '$company_number' , '$request_company',
  '$material', '$req_type', '$trailor_type', '$length', '$width', '$height', '$weight',
   '$from', '$from_pincode', '$to', '$to_pincode', '$payment','$trailor_type2','$trailor_type3','$trailor_type4','$trailor_type5','$trailor_type6',
   '$trailor_type7','$trailor_type8','$trailor_type9','$trailor_type10','$length2','$length3','$length4','$length5','$length6','$length7','$length8','$length9','$length10',
   '$width2','$width3','$width4','$width5','$width6','$width7','$width8','$width9','$width10','$height2','$height3','$height4','$height5','$height6','$height7','$height8','$height9','$height10',
   '$weight2','$weight3','$weight4','$weight5','$weight6','$weight7','$weight8','$weight9','$weight10');";
$result=mysqli_query($conn , $sql);
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
    <?php
include 'partials/_dbconnect.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">      <link rel="icon" href="favicon.jpg" type="image/x-icon">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
</head>
<body>
<div class="navbar1">
        <div class="iconcontainer">
        <ul>
        <li><a href="rental_dashboard.php">Dashboard</a></li>
            <li><a href="view_news.php">News</a></li>

            <li><a href="logout.php">Log Out</a></li></ul>
        </div>
    </div>
    <?php
    if($showAlert){
        echo  '<label>
        <input type="checkbox" class="alertCheckbox" autocomplete="off" />
        <div class="alert notice">
          <span class="alertClose">X</span>
          <span class="alertText_addfleet"><b>Success!</b>Requirement Posted Successfully<a href="my_logi_req.php">View Requirement</a>
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
    <form action="logistics.php" method="POST" class="logistics_need_form">
        <div class="logistic_need_container">
        <div class="logistics_heading"><h2 class="logistics_need_heading">Logistics Need</h2></div>
        <div class="trial1">
            <input type="text" name="email" placeholder="" value="<?php echo$email ?>" class="input02">
            <label class="placeholder2">Email</label>
        </div>
        <div class="trial1">
            <input type="text" name="company" placeholder="" value="<?php echo $companyname001 ?>" class="input02">
            <label class="placeholder2">Rental Company Name</label>
        </div>
        <div class="trial1">
            <input type="text" name="company_number" placeholder="" class="input02">
            <label class="placeholder2">Rental Contact Number</label>
        </div>
        <div class="trial1">
            <input type="text" name="material" placeholder="" class="input02">
            <label class="placeholder2">Material Details</label>
        </div>
        <div class="trial1">
            <select name="req_type" id=""  class="input02">
                <option value="" disabled selected>Type Of Requirement</option>
                <option value="Budgeting">Budgeting</option>
                <option value="Immediate">Immediate</option>
            </select>
            </div>
            <div class="trial1">
                <input type="text" placeholder="" name="no_of_trailor" class="input02">
                <label class="placeholder2">Number Of Trailor Required</label>
            </div>
            <div class="trial1"> 
            <select name="trailor_type" id="" class="input02">
                <option value="" disabled selected>Type Of 1st Trailor Required</option>
                <option value="Axle">Axle</option>
                <option value="LBT">LBT</option>
                <option value="SLBT">SLBT</option>
                <option value="HBT">HBT</option>
                <option value="Lorry">Lorry</option>
            </select>
            </div>
            <div class="outer02">
            <div class="trial1">
            <input type="text" name="length" placeholder="" class="input02">
            <label class="placeholder2">length</label>
            </div>
            <div class="trial1">
            <input type="text" name="width" placeholder="" style="margin-left: 4px" class="input02">
            <label class="placeholder2">Width</label>
            </div>
            <div class="trial1">
            <input type="text" name="height" placeholder="" style="margin-left: 7px" class="input02">
            <label class="placeholder2">Height</label>
            </div>
            <div class="trial1">
            <input type="text" name="weight" placeholder="" class="input02">
            <label class="placeholder2">Weight</label>
            </div>
            <div class="trial1 abcd" id="icon" style="display: block;">
            <i class="fa-solid fa-plus" onclick="addtrailor()"></i>
            </div>
            </div>
            
            <div class="outer02" id="add_trailor" style="display: none;">
            
            <!-- <br><br> -->
            <div class="cont">
            <select name="trailor_type2" id="" class="input02">
                <option value="" disabled selected>Type </option>
                <option value="Axle">Axle</option>
                <option value="LBT">LBT</option>
                <option value="SLBT">SLBT</option>
                <option value="HBT">HBT</option>
                <option value="Lorry">Lorry</option>
            </select>
            <div class="trial1">
            <input type="text" name="length2" placeholder="" class="input02">
            <label class="placeholder2">length</label>
            </div>
            <div class="trial1">
            <input type="text" name="width2" placeholder="" style="margin-left: 4px" class="input02">
            <label class="placeholder2">Width</label>
            </div>
            <div class="trial1">
            <input type="text" name="height2" placeholder="" style="margin-left: 7px" class="input02">
            <label class="placeholder2">Height</label>
            </div>
            <div class="trial1">
            <input type="text" name="weight2" placeholder="" class="input02">
            <label class="placeholder2">Weight</label>
            </div>
            <div class="trial1 abcd" id="icon2">
            <i class="fa-solid fa-plus" onclick="addtrailor2()"></i>
            </div>
            </div>
            </div>
            
            <div class="outer02" id="add_trailor2" style="display: none;">
            <div class="cont">
            <select name="trailor_type3" id="" class="input02">
                <option value="" disabled selected>Type </option>
                <option value="Axle">Axle</option>
                <option value="LBT">LBT</option>
                <option value="SLBT">SLBT</option>
                <option value="HBT">HBT</option>
                <option value="Lorry">Lorry</option>
            </select>
            
            <!-- <br><br> -->
            <div class="trial1">
            <input type="text" name="length3" placeholder="" class="input02">
            <label class="placeholder2">length</label>
            </div>
            <div class="trial1">
            <input type="text" name="width3" placeholder="" style="margin-left: 4px" class="input02">
            <label class="placeholder2">Width</label>
            </div>
            <div class="trial1">
            <input type="text" name="height3" placeholder="" style="margin-left: 7px" class="input02">
            <label class="placeholder2">Height</label>
            </div>
            <div class="trial1">
            <input type="text" name="weight3" placeholder="" class="input02">
            <label class="placeholder2">Weight</label>
            </div>
            <div class="trial1 abcd" id="icon3">
            <i class="fa-solid fa-plus" onclick="trailor4_required()"></i>
            </div>
            </div>
            </div>
            <!-- 4th trailor -->
            <div class="outer02" id="add_trailor4" style="display: none;">
            <div class="cont">
            <select name="trailor_type4" id="" class="input02">
                <option value="" disabled selected>Type </option>
                <option value="Axle">Axle</option>
                <option value="LBT">LBT</option>
                <option value="SLBT">SLBT</option>
                <option value="HBT">HBT</option>
                <option value="Lorry">Lorry</option>
            </select>

            <div class="trial1">
            <input type="text" name="length4" placeholder="" class="input02">
            <label class="placeholder2">length</label>
            </div>
            <div class="trial1">
            <input type="text" name="width4" placeholder="" style="margin-left: 4px" class="input02">
            <label class="placeholder2">Width</label>
            </div>
            <div class="trial1">
            <input type="text" name="height4" placeholder="" style="margin-left: 7px" class="input02">
            <label class="placeholder2">Height</label>
            </div>
            <div class="trial1">
            <input type="text" name="weight4" placeholder="" class="input02">
            <label class="placeholder2">Weight</label>
            </div>
            <div class="trial1 abcd" id="icon4">
            <i class="fa-solid fa-plus" onclick="trailor5_required()"></i>
            </div>
            </div>
            </div>

        <!-- 5th trailor -->
        <div class="outer02" id="add_trailor5" style="display: none;">
            <div class="cont">
            <select name="trailor_type5" id="" class="input02">
                <option value="" disabled selected>Type </option>
                <option value="Axle">Axle</option>
                <option value="LBT">LBT</option>
                <option value="SLBT">SLBT</option>
                <option value="HBT">HBT</option>
                <option value="Lorry">Lorry</option>
            </select>

            <div class="trial1">
            <input type="text" name="length5" placeholder="" class="input02">
            <label class="placeholder2">length</label>
            </div>
            <div class="trial1">
            <input type="text" name="width5" placeholder="" style="margin-left: 4px" class="input02">
            <label class="placeholder2">Width</label>
            </div>
            <div class="trial1">
            <input type="text" name="height5" placeholder="" style="margin-left: 7px" class="input02">
            <label class="placeholder2">Height</label>
            </div>
            <div class="trial1">
            <input type="text" name="weight5" placeholder="" class="input02">
            <label class="placeholder2">Weight</label>
            </div>
            <div class="trial1 abcd" id="icon5">
            <i class="fa-solid fa-plus" onclick="trailor6_required()"></i>
            </div>
            </div>
            </div>


<!-- 6th trailor  -->
<div class="outer02" id="add_trailor6" style="display: none;">
            <div class="cont">
            <select name="trailor_type6" id="" class="input02">
                <option value="" disabled selected>Type </option>
                <option value="Axle">Axle</option>
                <option value="LBT">LBT</option>
                <option value="SLBT">SLBT</option>
                <option value="HBT">HBT</option>
                <option value="Lorry">Lorry</option>
            </select>

            <div class="trial1">
            <input type="text" name="length6" placeholder="" class="input02">
            <label class="placeholder2">length</label>
            </div>
            <div class="trial1">
            <input type="text" name="width6" placeholder="" style="margin-left: 4px" class="input02">
            <label class="placeholder2">Width</label>
            </div>
            <div class="trial1">
            <input type="text" name="height6" placeholder="" style="margin-left: 7px" class="input02">
            <label class="placeholder2">Height</label>
            </div>
            <div class="trial1">
            <input type="text" name="weight6" placeholder="" class="input02">
            <label class="placeholder2">Weight</label>
            </div>
            <div class="trial1 abcd" id="icon6">
            <i class="fa-solid fa-plus" onclick="trailor7_required()"></i>
            </div>
            </div>
            </div>

            <!-- 7th trailor  -->

            <div class="outer02" id="add_trailor7" style="display: none;">
            <div class="cont">
            <select name="trailor_type7" id="" class="input02">
                <option value="" disabled selected>Type </option>
                <option value="Axle">Axle</option>
                <option value="LBT">LBT</option>
                <option value="SLBT">SLBT</option>
                <option value="HBT">HBT</option>
                <option value="Lorry">Lorry</option>
            </select>

            <div class="trial1">
            <input type="text" name="length7" placeholder="" class="input02">
            <label class="placeholder2">length</label>
            </div>
            <div class="trial1">
            <input type="text" name="width7" placeholder="" style="margin-left: 4px" class="input02">
            <label class="placeholder2">Width</label>
            </div>
            <div class="trial1">
            <input type="text" name="height7" placeholder="" style="margin-left: 7px" class="input02">
            <label class="placeholder2">Height</label>
            </div>
            <div class="trial1">
            <input type="text" name="weight7" placeholder="" class="input02">
            <label class="placeholder2">Weight</label>
            </div>
            <div class="trial1 abcd" id="icon7">
            <i class="fa-solid fa-plus" onclick="trailor8_required()"></i>
            </div>
            </div>
            </div>

<!-- 8th trailor  -->
<div class="outer02" id="add_trailor8" style="display: none;">
            <div class="cont">
            <select name="trailor_type8" id="" class="input02">
                <option value="" disabled selected>Type </option>
                <option value="Axle">Axle</option>
                <option value="LBT">LBT</option>
                <option value="SLBT">SLBT</option>
                <option value="HBT">HBT</option>
                <option value="Lorry">Lorry</option>
            </select>

            <div class="trial1">
            <input type="text" name="length8" placeholder="" class="input02">
            <label class="placeholder2">length</label>
            </div>
            <div class="trial1">
            <input type="text" name="width8" placeholder="" style="margin-left: 4px" class="input02">
            <label class="placeholder2">Width</label>
            </div>
            <div class="trial1">
            <input type="text" name="height8" placeholder="" style="margin-left: 7px" class="input02">
            <label class="placeholder2">Height</label>
            </div>
            <div class="trial1">
            <input type="text" name="weight8" placeholder="" class="input02">
            <label class="placeholder2">Weight</label>
            </div>
            <div class="trial1 abcd" id="icon8">
            <i class="fa-solid fa-plus" onclick="trailor9_required()"></i>
            </div>
            </div>
            </div>

            <!-- 9th trailor  -->
            <div class="outer02" id="add_trailor9" style="display: none;">
            <div class="cont">
            <select name="trailor_type9" id="" class="input02">
                <option value="" disabled selected>Type </option>
                <option value="Axle">Axle</option>
                <option value="LBT">LBT</option>
                <option value="SLBT">SLBT</option>
                <option value="HBT">HBT</option>
                <option value="Lorry">Lorry</option>
            </select>

            <div class="trial1">
            <input type="text" name="length9" placeholder="" class="input02">
            <label class="placeholder2">length</label>
            </div>
            <div class="trial1">
            <input type="text" name="width9" placeholder="" style="margin-left: 4px" class="input02">
            <label class="placeholder2">Width</label>
            </div>
            <div class="trial1">
            <input type="text" name="height9" placeholder="" style="margin-left: 7px" class="input02">
            <label class="placeholder2">Height</label>
            </div>
            <div class="trial1">
            <input type="text" name="weight9" placeholder="" class="input02">
            <label class="placeholder2">Weight</label>
            </div>
            <div class="trial1 abcd" id="icon9">
            <i class="fa-solid fa-plus" onclick="trailor10_required()"></i>
            </div>
            </div>
            </div>

<!-- 10th trailor  -->
<div class="outer02" id="add_trailor10" style="display: none;">
            <div class="cont">
            <select name="trailor_type10" id="" class="input02">
                <option value="" disabled selected>Type</option>
                <option value="Axle">Axle</option>
                <option value="LBT">LBT</option>
                <option value="SLBT">SLBT</option>
                <option value="HBT">HBT</option>
                <option value="Lorry">Lorry</option>
            </select>

            <div class="trial1">
            <input type="text" name="length10" placeholder="" class="input02">
            <label class="placeholder2">length</label>
            </div>
            <div class="trial1">
            <input type="text" name="width10" placeholder="" style="margin-left: 4px" class="input02">
            <label class="placeholder2">Width</label>
            </div>
            <div class="trial1">
            <input type="text" name="height10" placeholder="" style="margin-left: 7px" class="input02">
            <label class="placeholder2">Height</label>
            </div>
            <div class="trial1">
            <input type="text" name="weight10" placeholder="" class="input02">
            <label class="placeholder2">Weight</label>
            </div>
            <!-- <div class="trial1 abcd" id="icon10"> -->
            <!-- <i class="fa-solid fa-plus" onclick="trailor11_required()"></i> -->
            <!-- </div> -->
            </div>
            </div>

            <!-- 11th trailor  -->
            <div class="outer02" id="add_trailor11" style="display: none;">
            <select name="trailor_type11" id="" class="input02">
                <option value="" disabled selected>Type Of 11th Trailor Required</option>
                <option value="Axle">Axle</option>
                <option value="LBT">LBT</option>
                <option value="SLBT">SLBT</option>
                <option value="HBT">HBT</option>
                <option value="Lorry">Lorry</option>
            </select>
            <div class="cont">
            <div class="trial1">
            <input type="text" name="length11" placeholder="" class="input02">
            <label class="placeholder2">length</label>
            </div>
            <div class="trial1">
            <input type="text" name="width11" placeholder="" style="margin-left: 4px" class="input02">
            <label class="placeholder2">Width</label>
            </div>
            <div class="trial1">
            <input type="text" name="height11" placeholder="" style="margin-left: 7px" class="input02">
            <label class="placeholder2">Height</label>
            </div>
            <div class="trial1">
            <input type="text" name="weight11" placeholder="" class="input02">
            <label class="placeholder2">Weight</label>
            </div>
            <div class="trial1 abcd" id="icon11">
            <i class="fa-solid fa-plus" onclick="trailor12_required()"></i>
            </div>
            </div>
            </div>


<!-- 12th trailor  -->
<div class="outer02" id="add_trailor12" style="display: none;">
            <select name="trailor_type12" id="" class="input02">
                <option value="" disabled selected>Type Of 12th Trailor Required</option>
                <option value="Axle">Axle</option>
                <option value="LBT">LBT</option>
                <option value="SLBT">SLBT</option>
                <option value="HBT">HBT</option>
                <option value="Lorry">Lorry</option>
            </select>
            <div class="cont">
            <div class="trial1">
            <input type="text" name="length12" placeholder="" class="input02">
            <label class="placeholder2">length</label>
            </div>
            <div class="trial1">
            <input type="text" name="width12" placeholder="" style="margin-left: 4px" class="input02">
            <label class="placeholder2">Width</label>
            </div>
            <div class="trial1">
            <input type="text" name="height12" placeholder="" style="margin-left: 7px" class="input02">
            <label class="placeholder2">Height</label>
            </div>
            <div class="trial1">
            <input type="text" name="weight12" placeholder="" class="input02">
            <label class="placeholder2">Weight</label>
            </div>
            <div class="trial1 abcd" id="icon12">
            <i class="fa-solid fa-plus" onclick="trailor13_required()"></i>
            </div>
            </div>
            </div>

<!-- 13th trailor  -->
<div class="outer02" id="add_trailor13" style="display: none;">
            <select name="trailor_type13" id="" class="input02">
                <option value="" disabled selected>Type Of 13th Trailor Required</option>
                <option value="Axle">Axle</option>
                <option value="LBT">LBT</option>
                <option value="SLBT">SLBT</option>
                <option value="HBT">HBT</option>
                <option value="Lorry">Lorry</option>
            </select>
            <div class="cont">
            <div class="trial1">
            <input type="text" name="length13" placeholder="" class="input02">
            <label class="placeholder2">length</label>
            </div>
            <div class="trial1">
            <input type="text" name="width13" placeholder="" style="margin-left: 4px" class="input02">
            <label class="placeholder2">Width</label>
            </div>
            <div class="trial1">
            <input type="text" name="height13" placeholder="" style="margin-left: 7px" class="input02">
            <label class="placeholder2">Height</label>
            </div>
            <div class="trial1">
            <input type="text" name="weight13" placeholder="" class="input02">
            <label class="placeholder2">Weight</label>
            </div>
            <div class="trial1 abcd" id="icon13">
            <i class="fa-solid fa-plus" onclick="trailor14_required()"></i>
            </div>
            </div>
            </div>

            <!-- 14th trailor  -->
            <div class="outer02" id="add_trailor14" style="display: none;">
            <select name="trailor_type14" id="" class="input02">
                <option value="" disabled selected>Type Of 14th Trailor Required</option>
                <option value="Axle">Axle</option>
                <option value="LBT">LBT</option>
                <option value="SLBT">SLBT</option>
                <option value="HBT">HBT</option>
                <option value="Lorry">Lorry</option>
            </select>
            <div class="cont">
            <div class="trial1">
            <input type="text" name="length14" placeholder="" class="input02">
            <label class="placeholder2">length</label>
            </div>
            <div class="trial1">
            <input type="text" name="width14" placeholder="" style="margin-left: 4px" class="input02">
            <label class="placeholder2">Width</label>
            </div>
            <div class="trial1">
            <input type="text" name="height14" placeholder="" style="margin-left: 7px" class="input02">
            <label class="placeholder2">Height</label>
            </div>
            <div class="trial1">
            <input type="text" name="weight14" placeholder="" class="input02">
            <label class="placeholder2">Weight</label>
            </div>
            <div class="trial1 abcd" id="icon14">
            <i class="fa-solid fa-plus" onclick="trailor15_required()"></i>
            </div>
            </div>
            </div>
 
<!-- 15th trailor  -->
<div class="outer02" id="add_trailor15" style="display: none;">
            <select name="trailor_type15" id="" class="input02">
                <option value="" disabled selected>Type Of 15th Trailor Required</option>
                <option value="Axle">Axle</option>
                <option value="LBT">LBT</option>
                <option value="SLBT">SLBT</option>
                <option value="HBT">HBT</option>
                <option value="Lorry">Lorry</option>
            </select>
            <div class="cont">
            <div class="trial1">
            <input type="text" name="length15" placeholder="" class="input02">
            <label class="placeholder2">length</label>
            </div>
            <div class="trial1">
            <input type="text" name="width15" placeholder="" style="margin-left: 4px" class="input02">
            <label class="placeholder2">Width</label>
            </div>
            <div class="trial1">
            <input type="text" name="height15" placeholder="" style="margin-left: 7px" class="input02">
            <label class="placeholder2">Height</label>
            </div>
            <div class="trial1">
            <input type="text" name="weight15" placeholder="" class="input02">
            <label class="placeholder2">Weight</label>
            </div>
            </div>
</div>
            <div class="outer02">
            <div class="trial1">
            <input type="text" name="from" placeholder="" class="input02">
            <label class="placeholder2">From</label>
            </div>
            <div class="trial1">
            <input type="text" name="from_pincode" style="margin-left: 4px" placeholder="" class="input02">
            <label class="placeholder2">From Pincode</label>
            </div>
            </div>
            <div class="outer02">
            <div class="trial1">
            <input type="text" name="to" placeholder="" class="input02">
            <label class="placeholder2">To</label>
            </div>
            <div class="trial1">
            <input type="text" name="to_pincode" placeholder="" style="margin-left: 4px" class="input02">
            <label class="placeholder2">To Pincode</label>
            </div>

            </div>
            <div class="trial1">
            <select name="payment_terms"  id="" class="input02">
                <option value="" disabled selected>Payment terms</option>
                <option value="Advance">Advance</option>
                <option value="Credit 30 Days">Credit 30 Days</option>
                <option value="Credit 45 Days">Credit 45 Days</option>
            </select>
            </div>
            <button type="submit" class="logi_req">Post Requirement</button>
            <br>


        </div>
    </form>
    <br><br>
   
    <script>
    function addtrailor() {
        const addicon=document.getElementById("icon");
        const text=document.getElementById("add_trailor");
        
        text.style.display="block";
        addicon.style.display="none";
    }

    function addtrailor2() {
        const addicon2=document.getElementById("icon2");
        const text2=document.getElementById("add_trailor2");
        
        text2.style.display="block";
        addicon2.style.display="none";
    }

    function trailor4_required(){
        const addicon3=document.getElementById("icon3")
        const text3=document.getElementById("add_trailor4")
        text3.style.display="block";
        addicon3.style.display="none";
    }

    function trailor5_required(){
        const addicon4=document.getElementById("icon4")
        const text4=document.getElementById("add_trailor5")
        text4.style.display="block";
        addicon4.style.display="none";
    }

    function trailor6_required(){
        const addicon5=document.getElementById("icon5")
        const text5=document.getElementById("add_trailor6")
        text5.style.display="block";
        addicon5.style.display="none";
    }

    function trailor7_required(){
        const addicon6=document.getElementById("icon6")
        const text6=document.getElementById("add_trailor7")
        text6.style.display="block";
        addicon6.style.display="none";
    }
    function trailor8_required(){
        const addicon7=document.getElementById("icon7")
        const text7=document.getElementById("add_trailor8")
        text7.style.display="block";
        addicon7.style.display="none";
    }

    function trailor9_required(){
        const addicon8=document.getElementById("icon8")
        const text8=document.getElementById("add_trailor9")
        text8.style.display="block";
        addicon8.style.display="none";
    }

    function trailor10_required(){
        const addicon9=document.getElementById("icon9")
        const text9=document.getElementById("add_trailor10")
        text9.style.display="block";
        addicon9.style.display="none";
    }
    // function trailor11_required(){
    //     const addicon10=document.getElementById("icon10")
    //     const text10=document.getElementById("add_trailor11")
    //     text10.style.display="block";
    //     addicon10.style.display="none";
    // }
    // function trailor12_required(){
    //     const addicon11=document.getElementById("icon11")
    //     const text11=document.getElementById("add_trailor12")
    //     text11.style.display="block";
    //     addicon11.style.display="none";
    // }
    // function trailor13_required(){
    //     const addicon12=document.getElementById("icon12")
    //     const text12=document.getElementById("add_trailor13")
    //     text12.style.display="block";
    //     addicon12.style.display="none";
    // }
    // function trailor14_required(){
    //     const addicon13=document.getElementById("icon13")
    //     const text13=document.getElementById("add_trailor14")
    //     text13.style.display="block";
    //     addicon13.style.display="none";
    // }
    // function trailor15_required(){
    //     const addicon14=document.getElementById("icon14")
    //     const text14=document.getElementById("add_trailor15")
    //     text14.style.display="block";
    //     addicon14.style.display="none";
    // }
</script>
 </body>
</html>