<?php
include_once 'partials/_dbconnect.php'; // Include the database connection file
session_start();
$email = $_SESSION["email"];
$companyname001 = $_SESSION['companyname'];


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'partials/_dbconnect.php';
    $edit_id1 = $_POST["edit"];
    $req_generated_email = $_POST["email123"];
    $req_generated_company = $_POST["company"];
    $req_generated_company_contact = $_POST["company_number"];
    $material_detail = $_POST["material"];
    $req_type = $_POST["req_type"];
    $trailor_type = $_POST["trailor_type"];
    $length1 = $_POST["length"];
    $width1 = $_POST["width"];
    $height1 = $_POST["height"];
    $weight1 = $_POST["weight"];
    $from1 = $_POST["from"];
    $from1_pincode = $_POST["from_pincode"];
    $to1 = $_POST["to"];
    $to1_pincode = $_POST["to_pincode"];
    $payment = $_POST["payment_terms"];
    $quote_price = $_POST["price_quote"];
    $logi_comp = $_POST["logi_company"];
    $logi_number = $_POST["logi_number"];
    $logi_email = $_POST["logi_email"];

    $sql_update ="UPDATE `logi_price_quoted` SET quote_price ='$quote_price' , logistic_company_number = '$logi_number' where req_no ='$edit_id1' ";
    $result = mysqli_query($conn,$sql_update);
    if($result){
        header("location:quoted_price_logistics.php");
    }
   
}
?>
<?php
    include 'partials/_dbconnect.php';

$price_edit_id = $_GET['id'];
$sql_table="SELECT * FROM `logi_price_quoted` where id='$price_edit_id' ";
$result = mysqli_query($conn,$sql_table);
$row = mysqli_fetch_assoc($result);

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
                <li><a href="sign_in.php">Home</a></li>
                <li><a href="about_us.html">About Us</a></li>
                <li><a href="contact_us.php">Contact Us</a></li>
                <li><a href="logout.php">LogOut</a></li>
            </ul>
        </div>
    </div>
    <form action="edit_quoted_price_logi.php" method="POST" class="logistics_need_form">
        <div class="logistic_need_container">
        <div class="logistics_heading"><h2 class="logistics_need_heading">Logistics Need</h2></div>
        <input type="text" name="edit" placeholder="" value="<?php echo $row['req_no']; ?>" class="input02" hidden>

        <div class="trial1">
            <input type="text" name="email123" placeholder="" value="<?php echo $row['requirement_company_email']; ?>"  class="input02" readonly>
            <label class="placeholder2">Email</label>
        </div>
        <div class="trial1">
            <input type="text" name="company" placeholder="" value="<?php echo $row['requirement_company_name']; ?>" class="input02" readonly>
            <label class="placeholder2">Rental Company Name</label>
        </div>
        <div class="trial1">
            <input type="text" name="company_number"  placeholder="" value="<?php echo $row['requirement_company_number']; ?>" class="input02" readonly>
            <label class="placeholder2">Rental Contact Number</label>
        </div>
        <div class="trial1">
            <input type="text" name="material" placeholder="" value="<?php echo $row['material_detail']; ?>" class="input02" readonly>
            <label class="placeholder2">Material Details</label>
        </div>
        <div class="trial1">
            <input type="text" name="req_type" placeholder="" class="input02" value="<?php echo $row['type_of_requirement']; ?>" readonly>
            <label class="placeholder2">Type of Requirement</label>

            </div>
            <div class="trial1"> 
            <input type="text" name="trailor_type" class="input02" value="<?php echo $row['trailor_type'];  ?>" readonly>
            <label class="placeholder2">Trailor Type</label>
            </div>
            <div class="outer02">
            <div class="trial1">
            <input type="text" name="length" value="<?php echo $row['length']; ?>" placeholder="" class="input02" readonly>
            <label class="placeholder2">length</label>
            </div>
            <div class="trial1">
            <input type="text" name="width" placeholder="" value="<?php echo $row['width']; ?>" style="margin-left: 4px" class="input01" readonly>
            <label class="placeholder2">Width</label>
            </div>
            <div class="trial1">
            <input type="text" name="height" placeholder="" value="<?php echo $row['height']; ?>" style="margin-left: 7px" class="input01" readonly>
            <label class="placeholder2">Height</label>
            </div>
            </div>
            <div class="trial1">
            <input type="text" name="weight" placeholder="" value="<?php echo $row['weight']; ?>" class="input01" readonly>
            <label class="placeholder2">Weight</label>
            </div>
            <div class="outer02">
            <div class="trial1">
            <input type="text" name="from" value="<?php echo $row['from_location']; ?>" placeholder="" class="input01" readonly>
            <label class="placeholder2">From</label>
            </div>
            <div class="trial1">
            <input type="text" name="from_pincode" value="<?php echo $row['from_pincode']; ?>" style="margin-left: 4px" placeholder="" class="input01" readonly>
            <label class="placeholder2">From Pincode</label>
            </div>
            </div>
            <div class="outer02">
            <div class="trial1">
            <input type="text" name="to" placeholder="" value="<?php echo $row['to_location']; ?>" class="input01" readonly>
            <label class="placeholder2">To</label>
            </div>
            <div class="trial1">
            <input type="text" name="to_pincode" value="<?php echo $row['to_pincode']; ?>" placeholder="" style="margin-left: 4px" class="input01" readonly>
            <label class="placeholder2">To Pincode</label>
            </div>
            </div>
            <div class="trial1">
            <input type="text" name="payment_terms" placeholder="" value="<?php echo $row['payment_terms']; ?>" class="input02" readonly>
            <label class="placeholder2">Payment Terms</label>
            </div>
            <div class="trial1">
            <input type="text"  placeholder="" name="price_quote" value="<?php echo $row['quote_price']; ?>" class="input02" >
            <label class="placeholder2">Quote A Price</label>
            </div>
            <div class="trial1">
            <input type="text" placeholder="" name="logi_company" value="<?php echo $row['logistic_company_name'] ?>" class="input02" readonly>
            <label class="placeholder2">Logistic Company Name</label>
            </div>
            <div class="trial1">
            <input type="text" placeholder="" name="logi_number" value="<?php echo $row['logistic_company_number'] ?>"  class="input02"  >
            <label class="placeholder2">Logistic Company Number</label>
            </div>
            
            <div class="trial1">
            <input type="text" placeholder="" name="logi_email" value="<?php echo $row['logistic_company_email'] ?>" class="input02" readonly>
            <label class="placeholder2">Logistic Company Email</label>
            </div>
            <button type="submit" class="logi_req">Update Price</button>
            <br>


        </div>
    </form>
</body>
</html>