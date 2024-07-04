<?php
session_start();
$email = $_SESSION['email']; 
$companyname001 = $_SESSION['companyname'];

$showAlert = false;
$showError = false;
if (isset($_POST['submit']) && isset($_FILES['my_image'])) {
	include_once 'partials/_dbconnect.php'; // Include the database connection file

	// echo "<pre>";
	// print_r($_FILES['my_image']);
	// echo "</pre>";
	$category=$_POST['fleet_category'];
	$subtype=$_POST['type'];
	$kmr01 = $_POST['kmr'];
	$hmr01 = $_POST['hmr'];
	// $type01 = $_POST['sell_type'];
	$price01 = $_POST['price'];
	$contact_no01 = $_POST['contact_no'];
	$make01 = $_POST['make'];
	$model01 = $_POST['model'];
	$capacity01 = $_POST['capacity'];
  $unit=$_POST['unit'];
	$yom01 = $_POST['yom'];
	$location01 = $_POST['location'];
	$boomlength01 = $_POST['boom_length'];
	$jiblength01 = $_POST['jib_length'];
	$luffinglength01 = $_POST['luffing_length'];
	$cranedesc01 = $_POST['crane_desc'];
	$img_name = $_FILES['my_image']['name'];
	$img_size = $_FILES['my_image']['size'];
	$tmp_name = $_FILES['my_image']['tmp_name'];
	$error = $_FILES['my_image']['error'];

  if (!empty($_FILES['pic4_image']['name'])) {
    $pic4 = $_FILES['pic4_image']['name'];
    $temp_file_path = $_FILES['pic4_image']['tmp_name'];
    $folder1 = 'img/' . $pic4;
    move_uploaded_file($temp_file_path, $folder1);
} else {
    $pic4 = "none";
}

if (!empty($_FILES['pic5_image']['name'])) {
    $pic5 = $_FILES['pic5_image']['name'];
    $temp_file_path = $_FILES['pic5_image']['tmp_name'];
    $folder2 = 'img/' . $pic5;
    move_uploaded_file($temp_file_path, $folder2);
} else {
    $pic5 = "none";
}

	// echo "<pre>";
	// print_r($_FILES['my_image2']);
	// echo "</pre>";
	$img_name2 = $_FILES['my_image2']['name'];
	$img_size2 = $_FILES['my_image2']['size'];
	$tmp_name2 = $_FILES['my_image2']['tmp_name'];
	$error2 = $_FILES['my_image']['error'];


	// echo "<pre>";
	// print_r($_FILES['my_image3']);
	// echo "</pre>";
	$img_name3 = $_FILES['my_image3']['name'];
	$img_size3 = $_FILES['my_image3']['size'];
	$tmp_name3 = $_FILES['my_image3']['tmp_name'];
	$error3 = $_FILES['my_image3']['error'];

	if ($error === 0) {
		if ($img_size > 1250000 || $img_size2 > 1250000 || $img_size3 > 1250000 ) {			
		    // header("Location: index.php?error=$em");
			echo "File Size Is Too large";
		}else {
			$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
			$img_ex_lc = strtolower($img_ex);

			$img_ex2 = pathinfo($img_name2, PATHINFO_EXTENSION);
			$img_ex_lc2 = strtolower($img_ex2);

			$img_ex3 = pathinfo($img_name3, PATHINFO_EXTENSION);
			$img_ex_lc3 = strtolower($img_ex3);

			$allowed_exs = array("jpg", "jpeg", "png"); 

			if (in_array($img_ex_lc, $allowed_exs)) {
				$new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
				$img_upload_path = 'img/'.$new_img_name;
				move_uploaded_file($tmp_name, $img_upload_path);

				$new_img_name2 = uniqid("IMG-", true).'.'.$img_ex_lc2;
				$img_upload_path2 = 'img/'.$new_img_name2;
				move_uploaded_file($tmp_name2, $img_upload_path2);

				$new_img_name3 = uniqid("IMG-", true).'.'.$img_ex_lc3;
				$img_upload_path3 = 'img/'.$new_img_name3;
				move_uploaded_file($tmp_name3, $img_upload_path3);

				// Insert into Database
				$sql = "INSERT INTO images(pic5,pic4,unit,companyname,category,sub_type,kmr,hmr,email,price,contact_no,front_pic,left_side_pic,right_side_pic,model,make,capacity,yom,location,boomlength,jiblength,luffinglength,description) 
				        VALUES('$pic5','$pic4','$unit','$companyname001','$category','$subtype','$kmr01' , '$hmr01' , '$email' , '$price01' , '$contact_no01' , '$new_img_name' , '$new_img_name2' , '$new_img_name3' , '$model01' , '$make01' , '$capacity01' , '$yom01' , '$location01' , '$boomlength01' , '$jiblength01' , '$luffinglength01' , '$cranedesc01')";
				$result01=mysqli_query($conn, $sql);
				if ($result01){
					$showAlert = true;	
				}
			
			else{
				$showError = true;
				// header("Location: tets.php");

			}
				
			}
}}}

?>
<style>
  <?php include "style.css" 
  ?>
</style>
<script>
  <?php include "main.js" ?>
</script>
<?php
include 'partials/_dbconnect.php';

?>
<!DOCTYPE html>
<html>
<head>
	<title>Sell Your Fleet </title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="main.js"></script>
	
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
          <span class="alertText_addfleet"><b>Success!</b>Listing Posted Successfully<a href="view_listing.php">View listing</a>
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
	<?php if (isset($_GET['error'])): ?>
		<p><?php echo $_GET['error']; ?></p>
	<?php endif ?>
<form action="tets.php" method="post" class="sellcrane" enctype="multipart/form-data">
	<div class="sellcrane-container">
	<div class="sellcrane_heading"><h2>Sell your crane</h2></div>
    <!-- <div class="trial1">
	<select name="sell_type" class="input02" id="">
  <option value="" disabled selected> Type</option>
  <option value="Backhoe loader">Backhoe loader</option>
  <option value="Barges">Barges</option>
  <option value="Bulldozers">Bulldozers</option>
  <option value="Compactor">Compactor</option>
  <option value="Concrete pump">Concrete pump</option>
  <option value="Crawler">Crawler</option>
  <option value="Crawler telescopic">Crawler telescopic</option>
  <option value="Excavator">Excavator</option>
  <option value="Forklift">Forklift</option>
  <option value="Front loader">Front loader</option>
  <option value="Graders">Graders</option>
  <option value="Heavy Haulage">Heavy Haulage</option>
  <option value="Lift">Lift</option>
  <option value="Lorry Loader">Lorry Loader</option>
  <option value="Mining equipment">Mining equipment</option>
  <option value="Paver">Paver</option>
  <option value="Rig">Rig</option>
  <option value="Skid loader">Skid loader</option>
  <option value="Telehandlers">Telehandlers</option>
  <option value="Telescopic">Telescopic</option>
  <option value="Tipper">Tipper</option>
  <option value="Tower cranes">Tower cranes</option>
  <option value="Trailer-flatbed">Trailer-flatbed</option>
  <option value="Trailer-semi lowbed">Trailer-semi lowbed</option>
  <option value="Trailer-lowbed">Trailer-lowbed</option>
  <option value="Trucks">Trucks</option>
	</select>
	</div> -->
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
        <input type="text" class="input02" placeholder="" name="make">
		<label class="placeholder2">Make</label>
		</div>
		<div class="trial1">
		<input type="text" class="input02" placeholder="" name="model">
		<label class="placeholder2">Model</label>
		</div>
		<div class="trial1">
		<input type="text" class="input02" placeholder="" name="capacity">
		<label class="placeholder2">Capacity</label>
		</div>
    <div class="trial1"  id="unit_sell">
      <select name="unit" class="input02">
        <option value="disabled selected">Unit</option>
        <option value="">Ton</option>
        <option value="">M³</option>
        <option value="">Meter</option>
      </select>
    </div>
    </div>
    <div class="outer02">
		<div class="trial1">
		<input type="text" class="input02" placeholder="" name="kmr">
		<label class="placeholder2">KMR</label>
		</div><div class="trial1">
		<input type="text" class="input02" placeholder="" name="hmr">
		<label class="placeholder2">HMR</label>
		</div>
		<div class="trial1">
		<input type="text" class="input02" placeholder="" name=yom>
		<label class="placeholder2">YOM</label>
		</div>
    </div>
    <div class="outer02">
		<div class="trial1">
		<input type="text" class="input02" placeholder="" name="location">
		<label class="placeholder2">Location</label>
		</div>
    <div class="trial1">
		<input type="text" class="input02" placeholder="" name="price">
		<label class="placeholder2">Price </label>
		</div>
    </div>
    <div class="outer02" id="sell_length">
		<div class="trial1" id="length1">
		<input type="text" class="input02" placeholder="" name="boom_length">
		<label class="placeholder2">Boom Length</label>
		</div>
		<div class="trial1" id="length2">
		<input type="text" class="input02" placeholder="" name=jib_length>
		<label class="placeholder2">Jib Length</label>
		</div>
		<div class="trial1" id="length3">
		<input type="text" class="input02" placeholder="" name="luffing_length">
		<label class="placeholder2">Luffing Length</label>
		</div>
    </div>
		<div class="trial1">
    
		<textarea type="text" class="input02" placeholder="" name="crane_desc" ></textarea>
		<label class="placeholder2">Crane Description</label>
		</div>
		
    <div class="trial1">
		<input type="text" class="input02" placeholder="" name="contact_no">
		<label class="placeholder2">Contact Number</label>
		</div>
    <div class="outer02">
		<div class="trial1">
    	<input type="file" class="input02" name="my_image" required>
		<label class="placeholder2">Picture1</label>
		</div>
		<div class="trial1">
		<input type="file" class="input02" name="my_image2" required>
		<label class="placeholder2">Picture 2</label>
		</div>
		<div class="trial1">
		<input type="file" class="input02" name="my_image3" required>
		<label class="placeholder2">Picture 3</label>
		</div>
    <div class="trial1" id="sellfleeticon">
    <i class="fa-solid fa-plus" onclick="sell_icon()"></i>
    </div>
    </div>
    <div class="outer02">
      <div class="trial1" id="pic4">
        <input type="file" name="pic4_image" class="input02">
        <label for="" class="placeholder2">Picture 4</label>
      </div>
      <div class="trial1" id="pic5">
        <input type="file" name="pic5_image" class="input02">
        <label for="" class="placeholder2">Picture 5</label>
      </div>
    </div>
    

        <input type="submit" class="epc-button" name="submit" value="Upload">
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
function crawler_options(){
const sub_types=document.getElementById("fleet_sub_type");
// const registration = document.getElementById("registration_rental");
// const length_out = document.getElementById("length_outer");
const length01 = document.getElementById("length1");
const length02 = document.getElementById("length2");
const length03 = document.getElementById("length3");
if(sub_types.value==="Hydraulic Crawler Crane" || sub_types.value==="Mechanical Crawler Crane" || sub_types.value==="Telescopic Crawler Crane"){
    // registration.style.display="none";
    // length_out.style.display="block"
    length01.style.display="block"
    length02.style.display="block"
    length03.style.display="block"
}
else{
    // registration.style.display="block";
    // length_out.style.display="none"
    length01.style.display="none"
    length02.style.display="none"
    length03.style.display="none"


}

}




       
    
</script>

</body>
</html>
     	