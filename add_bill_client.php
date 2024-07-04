<?php 
$showAlert = false;
$showError = false;

    include 'partials/_dbconnect.php';

session_start();
$companyname001 = $_SESSION['companyname'];

if($_SERVER["REQUEST_METHOD"] == "POST")
{
$client_name=$_POST['client_name'];
$lane1=$_POST['lane1'];
$lane2=$_POST['lane2'];
$pincode =$_POST['pincode'];
$state=$_POST['state'];
$gst=$_POST['gst'];

$sql="INSERT INTO `billing_clients` ( `name`, `lane_address1`, `lane_address2`, `pincode`, `state`, `gst`,`added_by`) VALUES
 ('$client_name', '$lane1', '$lane2', '$pincode', '$state', '$gst','$companyname001')";
$result=mysqli_query($conn , $sql);
if($result){
    $showAlert=true;
}
else{
    $showError=true;
}



}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">      <link rel="icon" href="favicon.jpg" type="image/x-icon">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>

<body>
<div class="navbar1">
        <div class="iconcontainer">
        <ul>
            <li><a href="rental_dashboard.php">Dashboard</a></li>
            <li><a href="view_news.php">News</a></li>
            <!-- <li><a href="contact_us.php">Contact Us</a></li> -->
            <li><a href="logout.php">Log Out</a></li></ul>
        </div>
    </div> 
    <?php
if($showAlert){
    echo  '<label>
    <input type="checkbox" class="alertCheckbox" autocomplete="off" />
    <div class="alert notice">
      <span class="alertClose">X</span>
      <span class="alertText_addfleet"><b>Success!</b>Client Added Successfully<a href="view_clients.php">View Here</a>
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


    <form action="add_bill_client.php" method="POST" class="bill_client" autocomplete="off">
        <div class="bill_client_container">
            <div class="client_heading">Add Clients</div>
            <div class="trial1">
                <input type="text" placeholder="" name="client_name" class="input02">
                <label for="" class="placeholder2">Client Name</label>
            </div>
            <div class="trial1">
                <input type="text" placeholder="" name="lane1" class="input02">
                <label for="" class="placeholder2">Lane Address 1</label>
            </div>
            <div class="trial1">
                <input type="text" placeholder="" name="lane2" class="input02">
                <label for="" class="placeholder2">Lane Address 2</label>
            </div>
            <div class="outer02">
            <div class="trial1">
                <input type="text" placeholder="" name="pincode" class="input02">
                <label for="" class="placeholder2">Pincode</label>
            </div>
            <div class="trial1">
    <select name="state" id="state" class="input02" >
        <option value="">Select State</option>
        <option value="Andhra Pradesh">Andhra Pradesh</option>
        <option value="Arunachal Pradesh">Arunachal Pradesh</option>
        <option value="Assam">Assam</option>
        <option value="Bihar">Bihar</option>
        <option value="Chhattisgarh">Chhattisgarh</option>
        <option value="Goa">Goa</option>
        <option value="Gujarat">Gujarat</option>
        <option value="Haryana">Haryana</option>
        <option value="Himachal Pradesh">Himachal Pradesh</option>
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
        <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
        <option value="Chandigarh">Chandigarh</option>
        <option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option>
        <option value="Daman and Diu">Daman and Diu</option>
        <option value="Lakshadweep">Lakshadweep</option>
        <option value="Delhi">Delhi</option>
        <option value="Puducherry">Puducherry</option>
    </select>
            </div>
            </div>
            <div class="trial1">
                <input type="text" placeholder="" name="gst" class="input02">
                <label for="" class="placeholder2">GSTN/UIN</label>
            </div>
            <br>
            <button type="submit" class="epc-button">Add</button>
            <br>
        </div>
    </form>
</body>
</html>