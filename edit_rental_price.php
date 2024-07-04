<?php
include 'partials/_dbconnect.php';
$edit_id = $_GET['id']; 
$sql="SELECT * FROM `requirement_price_byrental` WHERE id = '$edit_id'";
$result = mysqli_query($conn , $sql);
$row = mysqli_fetch_assoc($result);
?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'partials/_dbconnect.php';
    $id= $_POST['id'];
    $price = $_POST['edit_price'];
    $contact = $_POST['edit_number'];
    $sql_update ="UPDATE `requirement_price_byrental` SET price_quoted ='$price' , rental_number = '$contact' where id ='$id' ";
    $result = mysqli_query($conn,$sql_update);
    if($result){
        header("location:quoted_pricerental.php");
    }
}
?>
<script>
    <?php include "main.js" ?>
    </script>
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
<form action="edit_rental_price.php" method="POST" class="epc_req1">
    <div class="epc_red_div">
        <div class="epc_req_heading"><h2>Post Your Requirement</h2></div>
        <div class="trial1">
        <input type="text" name="id" class="input02" value="<?php echo $row['id'] ?>" placeholder="" readonly hidden>
        <label class="placeholder2" hidden>Equipment Type</label >
        </div>
        <div class="trial1">
        <input type="text" name="equip_type" class="input02" value="<?php echo $row['type'] ?>" placeholder="" readonly>
        <label class="placeholder2">Equipment Type</label>
        </div>
        <div class="trial1">
        <input type="text" name="equip_type" class="input02" value="<?php echo $row['cap'] ?>" placeholder="" readonly>
        <label class="placeholder2">Equipment Capacity</label>
        </div>
        <div class="trial1">
        <input type="text" name="equip_type" class="input02" value="<?php echo $row['boom_combination'] ?>" placeholder="" readonly>
        <label class="placeholder2">Boom Combination</label>
        </div>
        <div class="trial1">
        <input type="text" name="equip_type" class="input02" value="<?php echo $row['project_type'] ?>" placeholder="" readonly>
        <label class="placeholder2">Project Type</label>
        </div>
        <div class="trial1">
        <input type="text" name="equip_type" class="input02" value="<?php echo $row['state'] ?>" placeholder="" readonly>
        <label class="placeholder2">Project State</label>
        </div>
        <div class="trial1">
        <input type="text" name="equip_type" class="input02" value="<?php echo $row['district'] ?>" placeholder="" readonly>
        <label class="placeholder2">Project District</label>
        </div>
        <div class="trial1">
        <input type="text" name="equip_type" class="input02" value="<?php echo $row['working_shift'] ?>" placeholder="" readonly>
        <label class="placeholder2">Working Shift</label>
        </div>
        <div class="trial1">
        <input type="text" name="equip_type" class="input02" value="<?php echo $row['date'] ?>" placeholder="" readonly>
        <label class="placeholder2">Tentative Date Of Equipment Required At Site</label>
        </div>
        <div class="trial1">
        <input type="text" name="equip_type" class="input02" value="<?php echo $row['epc_name'] ?>" placeholder="" readonly>
        <label class="placeholder2">EPC Company Name</label>
        </div>
        <div class="trial1">
        <input type="text" name="equip_type" class="input02" value="<?php echo $row['epc_email'] ?>" placeholder="" readonly>
        <label class="placeholder2">EPC Company Email</label>
        </div>
        <div class="trial1">
        <input type="text" name="equip_type" class="input02" value="<?php echo $row['epc_number'] ?>" placeholder="" readonly>
        <label class="placeholder2">EPC Company Number</label>
        </div>
        <div class="trial1">
        <input type="text" name="edit_price" class="input02" value="<?php echo $row['price_quoted'] ?>" placeholder="" >
        <label class="placeholder2">Price Quoted</label>
        </div>
        <div class="trial1">
        <input type="text" name="equip_type" class="input02" value="<?php echo $row['rental_name'] ?>" placeholder="" readonly >
        <label class="placeholder2">Rental Company Name</label>
        </div>
        <div class="trial1">
        <input type="text" name="equip_type" class="input02" value="<?php echo $row['rental_email'] ?>" placeholder="" readonly>
        <label class="placeholder2">Rental Company Email</label>
        </div>
        <div class="trial1">
        <input type="text" name="edit_number" class="input02" value="<?php echo $row['rental_number'] ?>" placeholder=""  >
        <label class="placeholder2">Rental Company Number</label>
        </div>
        <button class="epc-button" type="submit">Update </button>
        <br><br>
</body>
</html>