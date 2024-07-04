<?php
session_start();
$email = $_SESSION['email'];
?>
<style>
<?php 
include "style.css" 
?>
</style>
<script>
    <?php include "main.js" ?>
    </script>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">      <link rel="icon" href="favicon.jpg" type="image/x-icon">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="main.js"></script>
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
include('partials/_dbconnect.php');
$listing_edit_id = $_GET['id'];
$query = "SELECT * FROM `images` WHERE id ='$listing_edit_id'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
if ($row) {
    ?>
    <form action="newtrial.php"  method="post" class="edit_listing_form" enctype="multipart/form-data">
        <div class="edit_listinghead"><p>Edit Your Listing</p></div>
        <div class="innerlisting_edit_form">
            <input name="id" type="text" value="<?php echo $row['id']; ?> " hidden >
            <div class="trial1">
        <select class="input02"  name="fleet_category" id="oem_fleet_type" >
            <option value="" disabled selected>Select Fleet Category</option>
            <option value="Aerial Work Platform"<?php if ($row['category']=== 'Aerial Work Platform' ){ echo'selected';} ?>>Aerial Work Platform</option>
            <option value="Concrete Equipment" <?php if ($row['category']=== 'Concrete Equipment' ){ echo'selected';} ?>>Concrete Equipment</option>
            <option value="EarthMovers and Road Equipments" <?php if ($row['category']=== 'EarthMovers and Road Equipments' ){ echo'selected';} ?>>EarthMovers and Road Equipments</option>
            <option value="Material Handling Equipments" <?php if ($row['category']=== 'Material Handling Equipments' ){ echo'selected';} ?>>Material Handling Equipments</option>           
            <option value="Ground Engineering Equipments" <?php if($row['category']=== 'Ground Engineering Equipments'){echo 'selected';} ?> >Ground Engineering Equipments</option>
            <option value="Trailor and Truck" <?php if($row['category']=== 'Trailor and Truck'){echo 'selected';} ?>>Trailor and Truck</option>
            <option value="Generator and Lighting" <?php if($row['category']=== 'Generator and Lighting'){echo 'selected';} ?>>Generator and Lighting</option>
        </select>
        </div>
        <div class="trial1">
        <select class="input02" name="type" id="fleet_sub_type" onchange="crawler_options()" required>
            <option value="" disabled selected>Select Fleet Type</option>
            <option <?php if($row['sub_type']=== 'Self Propelled Articulated Boomlift'){echo 'selected';} ?> value="Self Propelled Articulated Boomlift"class="awp_options"  id="aerial_work_platform_option1">Self Propelled Articulated Boomlift</option>
            <option <?php if($row['sub_type']=== 'Scissor Lift Diesel'){echo 'selected';} ?> value="Scissor Lift Diesel" class="awp_options" id="aerial_work_platform_option2">Scissor Lift Diesel</option>
            <option <?php if($row['sub_type']=== 'Scissor Lift Electric'){echo 'selected';} ?> value="Scissor Lift Electric"class="awp_options"  id="aerial_work_platform_option3">Scissor Lift Electric</option>
            <option <?php if($row['sub_type']=== 'Spider Lift'){echo 'selected';} ?> value="Spider Lift"class="awp_options"  id="aerial_work_platform_option4">Spider Lift</option>
            <option <?php if($row['sub_type']=== 'Self Propelled Straight Boomlift'){echo 'selected';} ?> value="Self Propelled Straight Boomlift"class="awp_options"  id="aerial_work_platform_option5">Self Propelled Straight Boomlift</option>
            <option <?php if($row['sub_type']=== 'Truck Mounted Articulated Boomlift'){echo 'selected';} ?> value="Truck Mounted Articulated Boomlift"class="awp_options"  id="aerial_work_platform_option6">Truck Mounted Articulated Boomlift</option>
            <option <?php if($row['sub_type']=== 'Truck Mounted Straight Boomlift'){echo 'selected';} ?> value="Truck Mounted Straight Boomlift"class="awp_options"  id="aerial_work_platform_option7">Truck Mounted Straight Boomlift</option>
            <option <?php if($row['sub_type']=== 'Bateling Plant'){echo 'selected';} ?> value="Bateling Plant"class="cq_options" id="concrete_equipment_option1">Bateling Plant</option>
            <option <?php if($row['sub_type']=== 'Concrete Boom Placer'){echo 'selected';} ?> value="Concrete Boom Placer"class="cq_options" id="concrete_equipment_option2">Concrete Boom Placer</option>
            <option <?php if($row['sub_type']=== 'Concrete Pump'){echo 'selected';} ?> value="Concrete Pump"class="cq_options" id="concrete_equipment_option3">Concrete Pump</option>
            <option <?php if($row['sub_type']=== 'Moli Pump'){echo 'selected';} ?> value="Moli Pump"class="cq_options" id="concrete_equipment_option4">Moli Pump</option>
            <option <?php if($row['sub_type']=== 'Mobile Batching Plant'){echo 'selected';} ?> value="Mobile Batching Plant"class="cq_options" id="concrete_equipment_option5">Mobile Batching Plant</option>
            <option <?php if($row['sub_type']=== 'Static Boom Placer'){echo 'selected';} ?> value="Static Boom Placer"class="cq_options" id="concrete_equipment_option6">Static Boom Placer</option>
            <option <?php if($row['sub_type']=== 'Transit Mixer'){echo 'selected';} ?> value="Transit Mixer"class="cq_options" id="concrete_equipment_option7">Transit Mixer</option>
            <option <?php if($row['sub_type']=== 'Baby Roller'){echo 'selected';} ?> value="Baby Roller" class="earthmover_options" id="earthmovers_option1">Baby Roller</option>
            <option <?php if($row['sub_type']=== 'Backhoe Loader'){echo 'selected';} ?> value="Backhoe Loader" class="earthmover_options" id="earthmovers_option2">Backhoe Loader</option>
            <option <?php if($row['sub_type']=== 'Bulldozer'){echo 'selected';} ?> value="Bulldozer" class="earthmover_options" id="earthmovers_option3">Bulldozer</option>
            <option <?php if($row['sub_type']=== 'Excavator'){echo 'selected';} ?> value="Excavator" class="earthmover_options" id="earthmovers_option4">Excavator</option>
            <option <?php if($row['sub_type']=== 'Milling Machine'){echo 'selected';} ?> value="Milling Machine" class="earthmover_options" id="earthmovers_option5">Milling Machine</option>
            <option <?php if($row['sub_type']=== 'Motor Grader'){echo 'selected';} ?> value="Motor Grader" class="earthmover_options" id="earthmovers_option6">Motor Grader</option>
            <option <?php if($row['sub_type']=== 'Pneumatic Tyre Roller'){echo 'selected';} ?> value="Pneumatic Tyre Roller" class="earthmover_options" id="earthmovers_option7">Pneumatic Tyre Roller</option>
            <option <?php if($row['sub_type']=== 'Single Drum Roller'){echo 'selected';} ?> value="Single Drum Roller" class="earthmover_options" id="earthmovers_option8">Single Drum Roller</option>
            <option <?php if($row['sub_type']=== 'Skid Loader'){echo 'selected';} ?> value="Skid Loader" class="earthmover_options" id="earthmovers_option9">Skid Loader</option>
            <option <?php if($row['sub_type']=== 'Slip Form Paver'){echo 'selected';} ?> value="Slip Form Paver" class="earthmover_options" id="earthmovers_option10">Slip Form Paver</option>
            <option <?php if($row['sub_type']=== 'Soil Compactor'){echo 'selected';} ?> value="Soil Compactor" class="earthmover_options" id="earthmovers_option11">Soil Compactor</option>
            <option <?php if($row['sub_type']=== 'Tandem Roller'){echo 'selected';} ?> value="Tandem Roller" class="earthmover_options" id="earthmovers_option12">Tandem Roller</option>
            <option <?php if($row['sub_type']=== 'Vibratory Roller'){echo 'selected';} ?> value="Vibratory Roller" class="earthmover_options" id="earthmovers_option13">Vibratory Roller</option>
            <option <?php if($row['sub_type']=== 'Wheeled Excavator'){echo 'selected';} ?> value="Wheeled Excavator" class="earthmover_options" id="earthmovers_option14">Wheeled Excavator</option>
            <option <?php if($row['sub_type']=== 'Wheeled Loader'){echo 'selected';} ?> value="Wheeled Loader" class="earthmover_options" id="earthmovers_option15">Wheeled Loader</option>
            <option id="mhe_option1"  class="mhe_options"<?php if($row['sub_type']==='Fixed Tower Crane'){ echo 'selected';} ?> value="Fixed Tower Crane">Fixed Tower Crane</option>
            <option id="mhe_option2" class="mhe_options" <?php if($row['sub_type']==='Fork Lift Diesel'){ echo 'selected';} ?> value="Fork Lift Diesel">Fork Lift Diesel</option>
            <option id="mhe_option3" class="mhe_options" <?php if($row['sub_type']==='Fork Lift Electric'){ echo 'selected';} ?> value="Fork Lift Electric">Fork Lift Electric</option>
            <option id="mhe_option4" class="mhe_options" <?php if($row['sub_type']==='Hammerhead Tower Crane'){ echo 'selected';} ?> value="Hammerhead Tower Crane">Hammerhead Tower Crane</option>
            <option id="mhe_option5" class="mhe_options" <?php if($row['sub_type']==='Hydraulic Crawler Crane'){ echo 'selected';} ?> value="Hydraulic Crawler Crane">Hydraulic Crawler Crane</option>
            <option id="mhe_option6" class="mhe_options" <?php if($row['sub_type']==='Luffing Jib Tower Crane'){ echo 'selected';} ?> value="Luffing Jib Tower Crane">Luffing Jib Tower Crane</option>
            <option id="mhe_option7" class="mhe_options" <?php if($row['sub_type']==='Mechanical Crawler Crane'){ echo 'selected';} ?> value="Mechanical Crawler Crane">Mechanical Crawler Crane</option>
            <option id="mhe_option8" class="mhe_options" <?php if($row['sub_type']==='Pick and Carry Crane'){ echo 'selected';} ?> value="Pick and Carry Crane">Pick and Carry Crane</option>
            <option id="mhe_option9" class="mhe_options" <?php if($row['sub_type']==='Reach Stacker'){ echo 'selected';} ?> value="Reach Stacker">Reach Stacker</option>
            <option id="mhe_option10" class="mhe_options" <?php if($row['sub_type']==='Rough Terrain Crane'){echo 'selected';} ?> value="Rough Terrain Crane">Rough Terrain Crane</option>
            <option id="mhe_option11" class="mhe_options" <?php if($row['sub_type']==='Telehandler'){echo 'selected';} ?> value="Telehandler">Telehandler</option>
            <option id="mhe_option12" class="mhe_options" <?php if($row['sub_type']==='Telescopic Crawler Crane'){echo 'selected';} ?> value="Telescopic Crawler Crane">Telescopic Crawler Crane</option>
            <option id="mhe_option13" class="mhe_options" <?php if($row['sub_type']==='Telescopic Mobile Crane'){echo 'selected';} ?> value="Telescopic Mobile Crane">Telescopic Mobile Crane</option>
            <option id="mhe_option14" class="mhe_options" <?php if($row['sub_type']==='Terrain Mobile Crane'){echo 'selected';} ?> value="Terrain Mobile Crane">Terrain Mobile Crane</option>
            <option id="mhe_option15" class="mhe_options" <?php if($row['sub_type']==='Self Loading Truck Crane'){echo 'selected';} ?> value="Self Loading Truck Crane">Self Loading Truck Crane</option>

            <option id="ground_engineering_equipment_option1" class="gee_options" <?php if($row['sub_type']=== 'Hydraulic Drilling Rig') {echo 'selected';} ?>  value="Hydraulic Drilling Rig">Hydraulic Drilling Rig</option>
            <option id="ground_engineering_equipment_option2" class="gee_options" <?php if($row['sub_type']=== 'Rotary Drilling Rig'){echo 'selected';} ?> value="Rotary Drilling Rig">Rotary Drilling Rig</option>
            <option id="ground_engineering_equipment_option3" class="gee_options" <?php if($row['sub_type']=== 'Vibro Hammer'){echo 'selected';} ?> value="Vibro Hammer">Vibro Hammer</option>
            <option  id="trailor_option1" class="trailor_options" <?php if($row['sub_type']==='Dumper'){echo 'selected';} ?> value="Dumper">Dumper</option>
            <option  id="trailor_option2" class="trailor_options" <?php if($row['sub_type']==='Truck'){echo 'selected';} ?> value="Truck">Truck</option>
            <option  id="trailor_option3" class="trailor_options" <?php if($row['sub_type']==='Water Tanker'){echo 'selected';} ?> value="Water Tanker">Water Tanker</option>
            <option id="trailor_option4"  class="trailor_options" <?php if($row['sub_type']==='Low Bed'){echo 'selected';} ?> value="Low Bed">Low Bed</option>
            <option id="trailor_option5"  class="trailor_options" <?php if($row['sub_type']==='Semi Low Bed'){echo 'selected';} ?> value="Semi Low Bed">Semi Low Bed</option>
            <option  id="trailor_option6" class="trailor_options" <?php if($row['sub_type']==='Flatbed'){echo 'selected';} ?> value="Flatbed">Flatbed</option>
            <option  id="trailor_option7" class="trailor_options" <?php if($row['sub_type']==='Hydraulic Axle'){echo 'selected';} ?> value="Hydraulic Axle">Hydraulic Axle</option>
            <option id="generator_option1" class="generator_options" <?php if($row['sub_type']==='Silent Diesel Generator'){echo 'selected';} ?> value="Silent Diesel Generator">Silent Diesel Generator</option>
            <option id="generator_option2" class="generator_options" <?php if($row['sub_type']==='Mobile Light Tower'){echo 'selected';} ?> value="Mobile Light Tower">Mobile Light Tower</option>
            <option id="generator_option3" class="generator_options" <?php if($row['sub_type']==='Diesel Generator'){echo 'selected';} ?> value="Diesel Generator">Diesel Generator</option>
        </select>
        </div>

		<div class="trial1">
        <input type="text" class="input02" placeholder="" value="<?php echo $row['make']; ?>" name="make">
		<label class="placeholder2">Make</label>
		</div>
		<div class="trial1">
		<input type="text" class="input02" placeholder="" value="<?php echo $row['model']; ?>" name="model">
		<label class="placeholder2">Model</label>
		</div>
		<div class="trial1">
		<input type="text" class="input02" placeholder="" value="<?php echo $row['capacity']; ?>" name="capacity">
		<label class="placeholder2">Capacity</label>
		</div>
		<div class="trial1">
		<input type="text" class="input02" placeholder="" value="<?php echo $row['yom']; ?>" name=yom>
		<label class="placeholder2">YOM</label>
		</div>
		<div class="trial1">
		<input type="text" class="input02" placeholder="" value="<?php echo $row['location']; ?>" name="location">
		<label class="placeholder2">Location</label>
		</div>
		<div class="trial1">
		<input type="text" class="input02" placeholder=""value="<?php echo $row['boomlength']; ?>" name="boom_length">
		<label class="placeholder2">Boom Lenght</label>
		</div>
		<div class="trial1">
		<input type="text" class="input02" placeholder="" value="<?php echo $row['jiblength']; ?>" name=jib_length>
		<label class="placeholder2">Jib Lenght</label>
		</div>
		<div class="trial1">
		<input type="text" class="input02" placeholder="" value="<?php echo $row['luffinglength']; ?>" name="luffing_length">
		<label class="placeholder2">Luffing Lenght</label>
		</div>
		<div class="trial1">
		<input type="text" class="input02" placeholder="" value="<?php echo $row['description']; ?>" name="crane_desc">
		<label class="placeholder2">Crane Description</label>
		</div>
		<div class="trial1">
		<input type="text" class="input02" placeholder="" value="<?php echo $row['price']; ?>" name="price">
		<label class="placeholder2">Price </label>
		</div>
        <div class="trial1">
		<input type="text" class="input02" placeholder="" value="<?php echo $row['contact_no']; ?>" name="contact_no">
		<label class="placeholder2">Contact Number</label>
		</div>
        <?php
        echo '<div class="trial123">';
        echo '<h4> Uploaded Images</h4>';
        echo "<img class='first_img input02' src='img/" . $row['front_pic'] . "' >";   
        echo "<img class='first_img input02' src='img/" . $row['left_side_pic'] . "' >";   
        echo "<img class='first_img input02' src='img/" . $row['right_side_pic'] . "' >";   
        echo'</div>';                        
        ?>
        <!-- <div class="trial1">
            <select name="" id="edit_uploaded_images" class="input02" onchange="showPhoto()">
                <option value="" disabled selected>Do You Want To Edit the pictures uploaded</option>
                <option value="yes">Yes</option>
                <option value="no">No</option>
            </select>
        </div> -->
        <div class="trial1" id="picture1" >
        <input type="file" class="input02" name="my_image" >
        <label class="placeholder2">Front Picture</label>
        </div>
		<div class="trial1" id="picture2">
		<input type="file" class="input02" name="my_image2">
		<label class="placeholder2">Left Side Picture</label>
        </div>
		<div class="trial1" id="picture3">
		<input type="file" class="input02"  name="my_image3">
		<label class="placeholder2">Right Side Picture</label>
		</div> 
        <input type="submit" class="epc-button" name="submit" value="Edit">
        <br>

        </div>
    </form>
 <?php   
} 
?>





    

</body>
</html>