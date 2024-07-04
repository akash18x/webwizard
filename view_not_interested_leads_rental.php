<?php
session_start();
$email = $_SESSION["email"];
$companyname001 = $_SESSION['companyname'];

include 'partials/_dbconnect.php';

$sql = "SELECT * FROM `notinterested_rental` WHERE `rental_name` = '$companyname001' ORDER BY id DESC";
$result = mysqli_query($conn, $sql);
$row=mysqli_fetch_assoc($result);
?>
<style>
    <?php include "style.css"; ?>
  </style>

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

            <li><a href="logout.php">Log Out</a></li></ul>
        </div>
    </div> 
<form action="" class="not_interested_form">
    <div class="notinterested_container">
        <div class="notinterestedhead"><p>Not Interested Leads</p></div>
<div class="trial1">
    <input type="text" placeholder="" value="<?php echo $row['equipment_type']; ?>" class="input02" readonly>
    <label class="placeholder2">Equipment Type</label>
</div>
<div class="trial1">
    <input type="text" placeholder="" value="<?php echo $row['equipment_capacity']; ?>"  class="input02" readonly>
    <label class="placeholder2">Equipment Capacity</label>
</div>
<div class="trial1">
    <input type="text" placeholder="" value="<?php echo $row['boom_combination']; ?>" class="input02" readonly>
    <label class="placeholder2">Boom Combination</label>
</div>
<div class="trial1">
    <input type="text" placeholder="" value="<?php echo $row['project_type']; ?>" class="input02" readonly>
    <label class="placeholder2">Project Type</label>
</div>

<div class="trial1">
    <input type="text" placeholder="" value="<?php echo $row['district']; ?>" class="input02" readonly>
    <label class="placeholder2">District</label>
</div>
<div class="trial1">
    <input type="text" placeholder="" value="<?php echo $row['state']; ?>" class="input02" readonly>
    <label class="placeholder2">State</label>
</div>
<div class="trial1">
    <input type="text" placeholder="" value="<?php echo $row['duration']; ?>" class="input02" readonly>
    <label class="placeholder2">Duration</label>
</div>
<div class="trial1">
    <input type="text" placeholder="" value="<?php echo $row['shift']; ?>" class="input02" readonly>
    <label class="placeholder2">Shift</label>
</div>
<div class="trial1">
    <input type="text" placeholder="" value="<?php echo $row['tentative_date']; ?>" class="input02" readonly>
    <label class="placeholder2">Tentative Date Of Equipment At Site</label>
</div>
<div class="trial1">
    <input type="text" placeholder="" value="<?php echo $row['epc_company']; ?>" class="input02" readonly>
    <label class="placeholder2">EPC Company</label>
</div>
<div class="trial1">
    <input type="text" placeholder="" value="<?php echo $row['epc_email']; ?>" class="input02" readonly>
    <label class="placeholder2">EPC Email</label>
</div>
<div class="trial1">
    <input type="text" placeholder="" value="<?php echo $row['epc_contact']; ?>" class="input02" readonly>
    <label class="placeholder2">EPC Contact </label>
</div>
<div class="trial1">
    <input type="text" placeholder="" value="<?php echo $row['not_interested_reason']; ?>" class="input02" readonly>
    <label class="placeholder2">Not Interested Reason</label>
</div>
<br>
    </div>
    <br><br>
</form> 
</body>
</html>