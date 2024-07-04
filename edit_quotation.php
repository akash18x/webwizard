<?php 
include_once 'partials/_dbconnect.php';

$edit_quotation=$_GET['quote_id'];
$sql_edit_quotation="SELECT * FROM `quotation_generated` where `sno`='$edit_quotation'";
$result_edit=mysqli_query($conn,$sql_edit_quotation);
$row=mysqli_fetch_assoc($result_edit);
?>
<?php 
session_start();
$companyname001 = $_SESSION['companyname'];

$asset_code_selection = "SELECT * FROM `fleet1` WHERE `companyname`='$companyname001'";
$result_asset_code = mysqli_query($conn, $asset_code_selection);

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">      <link rel="icon" href="favicon.jpg" type="image/x-icon">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Generate Quotation</title>
    <style><?php include "style.css" ?></style>
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

<form action="generate_quotation.php" method="POST" class="generate_quotation" enctype="multipart/form-data">
    <div class="generate_quote_container">
        <div class="generate_quote_heading">Generate Quotation</div>
        <div class="outer02">
    <div class="trial1">
        <input type="date" placeholder="" value="<?php echo $row['quote_date'] ?>" name="quotation_date" class="input02" >
        <label for="" class="placeholder2"> Quotation Date</label>
        </div>
      <div class="trial1">
        <input type="text" placeholder="" value="<?php echo $companyname001 ?> / <?php echo substr($row['quote_date'], 0, 4);  ?> / <?php echo $row['sno'] ?>" class="input02">
        <label for="" class="placeholder2">Ref No</label>
      </div>  
    </div>

        <div class="outer02">

        <div class="trial1">
        <input type="text" placeholder="" value="<?php echo $row['to_name'] ?>" name="to" class="input02" >
        <label for="" class="placeholder2">To</label>
        </div>
        <div class="trial1">
        <input type="text" placeholder="" value="<?php echo $row['to_address'] ?>" name="to_address" class="input02" >
        <label for="" class="placeholder2">To Address</label>
        </div>
        </div>
        <div class="outer02">
        <div class="trial1">
        <input type="text" placeholder="" name="contact_person" value="<?php echo $row['contact_person'] ?>" class="input02" >
        <label for="" class="placeholder2">Contact Person</label>
        </div>
        <div class="trial1">
        <input type="text" placeholder="" value="<?php echo $row['contact_person_cell'] ?>" name="contact_number" class="input02" >
        <label for="" class="placeholder2">Contact Number</label>
        </div>
        
        <div class="trial1">
        <input type="text" placeholder="" value="<?php echo $row['email_id_contact_person'] ?>" name="email_id" class="input02" >
        <label for="" class="placeholder2">Email Id</label>
        </div>
        <div class="trial1">
        <input type="text" placeholder="" value="<?php echo $row['site_loc'] ?>" name="site_location" class="input02" >
        <label for="" class="placeholder2">Site Location</label>
        </div>
        </div>
        <div class="outer02">
        <div class="trial1">
        <select name="asset_code" name="asset_code" class="input02">
            <option value="" disabled selected>Choose Asset Code</option>
            <?php
        while ($row_asset_code = mysqli_fetch_assoc($result_asset_code)) {
            echo '<option value="' . $row_asset_code['assetcode'] . '"';
            if ($row['asset_code'] === $row_asset_code['assetcode']) {
                echo ' selected';
            }
            echo '>' . $row_asset_code['assetcode'] . '</option>';
                }
    ?>

        </select>
        </div>
        <div class="trial1">
            <select name="availability" id="availability_dd" class="input02" onchange="not_immediate()">
                <option value=""disabled selected>Availability</option>
                <option value="Immediate" <?php if($row['availability']==='Immediate'){ echo 'selected';} ?>>Immediate</option>
                <option value="Not Immediate" <?php if($row['availability']==='Not Immediate'){ echo 'selected';} ?>>Not Immediate</option>
            </select>
        </div>
        </div>
        <div class="trial1" id="date_of_availability" name="tentative_date">
            <input type="date" placeholder="" class="input02">
            <label for="" class="placeholder2">Tentative Date Of Availability</label>
        </div>
        <div class="outer02">
        <div class="trial1">
            <input type="text" class="input02" value="<?php echo $row['hours_duration'] ?>" name="hours_duration" placeholder="">
            <label class="placeholder2" for="">Duration In Hours</label>
        </div>
        <div class="trial1">
            <input type="text" class="input02" value="<?php echo $row['days_duration'] ?>"  name="days_duration" placeholder="">
            <label class="placeholder2" for="">Duration Of Days In Month</label>
        </div>
        <div class="trial1">
            <select name="condition" id="" class="input02">
                <option value=""disabled selected>Condition</option>
                <option value="Including Sundays" <?php if($row['sunday_included']==='Including Sundays'){ echo 'selected';} ?>>Including Sundays</option>
                <option value="Excluding Sundays" <?php if($row['sunday_included']==='Excluding Sundays'){ echo 'selected';} ?>>Excluding Sundays</option>
            </select>
        </div>
        </div>
        <div class="outer02">
        <div class="trial1">
            <input type="text" name="rental_charges" value="<?php echo $row['rental_charges'] ?>" placeholder="" class="input02">
            <label for="" class="placeholder2">Rental Charges Per Month</label>
        </div>
        <div class="trial1">
            <input type="text" name="mob_charges" value="<?php echo $row['mob_charges'] ?>" placeholder="" class="input02">
            <label for="" class="placeholder2">Mob Charges </label>
        </div>
        <div class="trial1">
            <input type="text" name="demob_charges" placeholder="" value="<?php echo $row['demob_charges'] ?>" class="input02">
            <label for="" class="placeholder2">Demob Charges </label>
        </div>
        </div>
        <div class="outer02">
        <div class="trial1">
            <input type="text" name="location" value="<?php echo $row['crane_location'] ?>" placeholder="" class="input02">
            <label for="" class="placeholder2"> Equipment Location </label>
 
        </div>
        <div class="trial1">
            <select name="adblue" id="" class="input02">
                <option value=""disabled selected>Adblue?</option>
                <option value="Yes"<?php if($row['adblue']==='Yes'){ echo 'selected';} ?>>Yes</option>
                <option value="No" <?php if($row['adblue']==='No'){ echo 'selected';} ?>>No</option>
            </select>
        </div>
        <div class="trial1">
            <input type="text" placeholder="" value="<?php echo $row['fuel/hour'] ?>" name="fuel_per_hour" class="input02">
            <label for="" class="placeholder2">Fuel in ltrs Per Hour</label>
        </div>
        </div>
<div class="outer02">
    <div class="trial1">
        <input type="text" name="sender" value="<?php echo $row['sender_name'] ?>" placeholder="" class="input02">
        <label for="" class="placeholder2">Senders Name</label>
    </div>
    <div class="trial1">
        <input type="text" name="sender_number" value="<?php echo $row['sender_number'] ?>" placeholder="" class="input02">
        <label for="" class="placeholder2">Senders Contact Number</label>
    </div>
    <div class="trial1">
        <input type="text" name="sender_email" value="<?php echo $row['sender_contact'] ?>" placeholder="" class="input02">
        <label for="" class="placeholder2">Senders Email</label>
    </div>
</div>
<div class="trial1">
<textarea placeholder="" name="sender_office_address" class="input02"><?php echo $row['sender_office_address']; ?></textarea>
    <label for="" class="placeholder2">Sender Office Address</label>
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
</script>

</body>
</html>
