<?php
include_once 'partials/_dbconnect.php'; // Include the database connection file
session_start();
$email = $_SESSION["email"];
$companyname001 = $_SESSION['companyname'];


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'partials/_dbconnect.php';
    $req_id = $_POST["edit"];
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
$sql_price = "INSERT INTO `logi_price_quoted` (`req_no`, `requirement_company_email`, `requirement_company_name`, `requirement_company_number`, `material_detail`, `type_of_requirement`, `trailor_type`, `length`, `width`, `height`, `weight`, `from_location`, `from_pincode`, `to_location`, `to_pincode`, `payment_terms`, `quote_price`, `logistic_company_name`, `logistic_company_number`, `logistic_company_email`) 
VALUES ('$req_id', '$req_generated_email', '$req_generated_company', '$req_generated_company_contact', '$material_detail', '$req_type', '$trailor_type', '$length1', '$width1', '$height1', '$weight1', '$from1', '$from1_pincode', '$to1', '$to1_pincode', '$payment', '$quote_price', '$logi_comp', '$logi_number', '$logi_email')";
$result123=mysqli_query($conn , $sql_price);
// $sql_price1 = "UPDATE `logistics_need` SET `price_quoted` = '$quote_price' WHERE id = '$logi_id'";
// $result123=mysqli_query($conn , $sql_price1);
if($result123){
    header("location:logistics-need.php");
}


}
?>

<?php
include 'partials/_dbconnect.php';
$logi_id = isset($_GET['id']) ? $_GET['id'] : null;

if ($logi_id) {
    $sql = "SELECT * FROM `logistics_need` WHERE id = $logi_id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
     // Fetch data from logi_price_quoted table
     $sql_quoted_price = "SELECT * FROM `logi_price_quoted` WHERE req_no = '$logi_id' and `logistic_company_name` = '$companyname001'";
      $result_quoted_price = mysqli_query($conn, $sql_quoted_price);
     
     // Check if there is a quoted price row for this requirement
     $row_quoted_price = mysqli_fetch_assoc($result_quoted_price);

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
                <li><a href="sign_in.php">Home</a></li>
                <li><a href="about_us.html">About Us</a></li>
                <li><a href="contact_us.php">Contact Us</a></li>
                <li><a href="logout.php">LogOut</a></li>
            </ul>
        </div>
    </div>
    <form action="quote_price_logi.php" method="POST" class="logistics_need_form">
        <div class="logistic_need_container">
        <div class="logistics_heading"><h2 class="logistics_need_heading">Logistics Need</h2></div>
        <div class="trial1">
        <input type="text" name="edit" placeholder="" value="<?php echo$logi_id ?>" class="input02" hidden >
        </div>
        <div class="trial1">
            <input type="text" name="email123" placeholder="" value="<?php echo $row['email_need_generator']; ?>"  class="input02" readonly>
            <label class="placeholder2">Email</label>
        </div>
        <div class="trial1">
            <input type="text" name="company" placeholder="" value="<?php echo $row['companyname_need_generator']; ?>" class="input02" readonly>
            <label class="placeholder2">Rental Company Name</label>
        </div>
        <div class="trial1">
            <input type="text" name="company_number"  placeholder="" value="<?php echo $row['company_number']; ?>" class="input02" readonly>
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
            <input type="text" name="trailor_type" class="input02" value="<?php echo $row['number_of_trailor'];  ?>" readonly>
            <label class="placeholder2">Number Of Trailor Required</label>
            </div>
            <div class="trial1">
            <div class="cont">
            <div class="trial1"> 
            <input type="text" name="trailor_type" class="input02" value="<?php echo $row['trailor_type1'];  ?>" readonly>
            <label class="placeholder2">1st Trailor Type</label>
            </div>
            <div class="outer02">
            <div class="trial1">
            <input type="text" name="length" value="<?php echo $row['length1']; ?>" placeholder="" class="input02" readonly>
            <label class="placeholder2">length</label>
            </div>
            <div class="trial1">
            <input type="text" name="width" placeholder="" value="<?php echo $row['width1']; ?>" style="margin-left: 4px" class="input01" readonly>
            <label class="placeholder2">Width</label>
            </div>
            <div class="trial1">
            <input type="text" name="height" placeholder="" value="<?php echo $row['height1']; ?>" style="margin-left: 7px" class="input01" readonly>
            <label class="placeholder2">Height</label>
            </div>
            </div>
            <div class="trial1">
            <input type="text" name="weight" placeholder="" value="<?php echo $row['weight1']; ?>" class="input01" readonly>
            <label class="placeholder2">Weight</label>
            </div>
            </div>
        </div>
        <?php
            $displayStyle8 = empty($row['trailor2']) ? 'style="display:none"' : '';
        ?>

        <div class="trial1"  <?php echo $displayStyle8 ?>>
            <div class="cont">
            <div class="trial1"> 
            <input type="text" name="trailor_type" class="input02" value="<?php echo $row['trailor2'];  ?>" readonly>
            <label class="placeholder2">2nd Trailor Type</label>
            </div>
            <div class="outer02">
            <div class="trial1">
            <input type="text" name="length" value="<?php echo $row['length2']; ?>" placeholder="" class="input02" readonly>
            <label class="placeholder2">length</label>
            </div>
            <div class="trial1">
            <input type="text" name="width" placeholder="" value="<?php echo $row['width2']; ?>" style="margin-left: 4px" class="input01" readonly>
            <label class="placeholder2">Width</label>
            </div>
            <div class="trial1">
            <input type="text" name="height" placeholder="" value="<?php echo $row['height2']; ?>" style="margin-left: 7px" class="input01" readonly>
            <label class="placeholder2">Height</label>
            </div>
            </div>
            <div class="trial1">
            <input type="text" name="weight" placeholder="" value="<?php echo $row['weight2']; ?>" class="input01" readonly>
            <label class="placeholder2">Weight</label>
            </div>
            </div>
        </div>
        <?php
            $displayStyle7= empty($row['trailor3']) ? 'style="display:none"' : '';
        ?>

        <div class="trial1" <?php echo $displayStyle7 ?>>
            <div class="cont">
            <div class="trial1"> 
            <input type="text" name="trailor_type" class="input02" value="<?php echo $row['trailor3'];  ?>" readonly>
            <label class="placeholder2">3rd Trailor Type</label>
            </div>
            <div class="outer02">
            <div class="trial1">
            <input type="text" name="length" value="<?php echo $row['length3']; ?>" placeholder="" class="input02" readonly>
            <label class="placeholder2">length</label>
            </div>
            <div class="trial1">
            <input type="text" name="width" placeholder="" value="<?php echo $row['width3']; ?>" style="margin-left: 4px" class="input01" readonly>
            <label class="placeholder2">Width</label>
            </div>
            <div class="trial1">
            <input type="text" name="height" placeholder="" value="<?php echo $row['height3']; ?>" style="margin-left: 7px" class="input01" readonly>
            <label class="placeholder2">Height</label>
            </div>
            </div>
            <div class="trial1">
            <input type="text" name="weight" placeholder="" value="<?php echo $row['weight3']; ?>" class="input01" readonly>
            <label class="placeholder2">Weight</label>
            </div>
            </div>
        </div>
        <?php
            $displayStyle6 = empty($row['trailor4']) ? 'style="display:none"' : '';
        ?>

        <div class="trial1" <?php echo $displayStyle6 ?>>
            <div class="cont">
            <div class="trial1"> 
            <input type="text" name="trailor_type" class="input02" value="<?php echo $row['trailor4'];  ?>" readonly>
            <label class="placeholder2">4th Trailor Type</label>
            </div>
            <div class="outer02">
            <div class="trial1">
            <input type="text" name="length" value="<?php echo $row['length4']; ?>" placeholder="" class="input02" readonly>
            <label class="placeholder2">length</label>
            </div>
            <div class="trial1">
            <input type="text" name="width" placeholder="" value="<?php echo $row['width4']; ?>" style="margin-left: 4px" class="input01" readonly>
            <label class="placeholder2">Width</label>
            </div>
            <div class="trial1">
            <input type="text" name="height" placeholder="" value="<?php echo $row['height4']; ?>" style="margin-left: 7px" class="input01" readonly>
            <label class="placeholder2">Height</label>
            </div>
            </div>
            <div class="trial1">
            <input type="text" name="weight" placeholder="" value="<?php echo $row['weight4']; ?>" class="input01" readonly>
            <label class="placeholder2">Weight</label>
            </div>
            </div>
        </div>
        <?php
            $displayStyle5 = empty($row['trailor5']) ? 'style="display:none"' : '';
        ?>
        <div class="trial1" <?php echo $displayStyle5  ?>>
            <div class="cont">
            <div class="trial1"> 
            <input type="text" name="trailor_type" class="input02" value="<?php echo $row['trailor5'];  ?>" readonly>
            <label class="placeholder2">5th Trailor Type</label>
            </div>
            <div class="outer02">
            <div class="trial1">
            <input type="text" name="length" value="<?php echo $row['length5']; ?>" placeholder="" class="input02" readonly>
            <label class="placeholder2">length</label>
            </div>
            <div class="trial1">
            <input type="text" name="width" placeholder="" value="<?php echo $row['width5']; ?>" style="margin-left: 4px" class="input01" readonly>
            <label class="placeholder2">Width</label>
            </div>
            <div class="trial1">
            <input type="text" name="height" placeholder="" value="<?php echo $row['height5']; ?>" style="margin-left: 7px" class="input01" readonly>
            <label class="placeholder2">Height</label>
            </div>
            </div>
            <div class="trial1">
            <input type="text" name="weight" placeholder="" value="<?php echo $row['weight5']; ?>" class="input01" readonly>
            <label class="placeholder2">Weight</label>
            </div>
            </div>
        </div>
        <?php
            $displayStyle4 = empty($row['trailor6']) ? 'style="display:none"' : '';
        ?>
        <div class="trial1" <?php echo $displayStyle4 ?>>
            <div class="cont">
            <div class="trial1"> 
            <input type="text" name="trailor_type" class="input02" value="<?php echo $row['trailor6'];  ?>" readonly>
            <label class="placeholder2">6th Trailor Type</label>
            </div>
            <div class="outer02">
            <div class="trial1">
            <input type="text" name="length" value="<?php echo $row['length6']; ?>" placeholder="" class="input02" readonly>
            <label class="placeholder2">length</label>
            </div>
            <div class="trial1">
            <input type="text" name="width" placeholder="" value="<?php echo $row['width6']; ?>" style="margin-left: 4px" class="input01" readonly>
            <label class="placeholder2">Width</label>
            </div>
            <div class="trial1">
            <input type="text" name="height" placeholder="" value="<?php echo $row['height6']; ?>" style="margin-left: 7px" class="input01" readonly>
            <label class="placeholder2">Height</label>
            </div>
            </div>
            <div class="trial1">
            <input type="text" name="weight" placeholder="" value="<?php echo $row['weight6']; ?>" class="input01" readonly>
            <label class="placeholder2">Weight</label>
            </div>
            </div>
        </div>
        <?php
            $displayStyle3 = empty($row['trailor7']) ? 'style="display:none"' : '';
        ?>
        <div class="trial1" <?php echo $displayStyle3 ?>>
            <div class="cont">
            <div class="trial1"> 
            <input type="text" name="trailor_type" class="input02" value="<?php echo $row['trailor7'];  ?>" readonly>
            <label class="placeholder2">7th Trailor Type</label>
            </div>
            <div class="outer02">
            <div class="trial1">
            <input type="text" name="length" value="<?php echo $row['length7']; ?>" placeholder="" class="input02" readonly>
            <label class="placeholder2">length</label>
            </div>
            <div class="trial1">
            <input type="text" name="width" placeholder="" value="<?php echo $row['width7']; ?>" style="margin-left: 4px" class="input01" readonly>
            <label class="placeholder2">Width</label>
            </div>
            <div class="trial1">
            <input type="text" name="height" placeholder="" value="<?php echo $row['height7']; ?>" style="margin-left: 7px" class="input01" readonly>
            <label class="placeholder2">Height</label>
            </div>
            </div>
            <div class="trial1">
            <input type="text" name="weight" placeholder="" value="<?php echo $row['weight7']; ?>" class="input01" readonly>
            <label class="placeholder2">Weight</label>
            </div>
            </div>
        </div>
        <?php
            $displayStyle2 = empty($row['trailor8']) ? 'style="display:none"' : '';
        ?>

        <div class="trial1" <?php echo $displayStyle2 ?>>
            <div class="cont">
            <div class="trial1"> 
            <input type="text" name="trailor_type" class="input02" value="<?php echo $row['trailor8'];  ?>" readonly>
            <label class="placeholder2">8th Trailor Type</label>
            </div>
            <div class="outer02">
            <div class="trial1">
            <input type="text" name="length" value="<?php echo $row['length8']; ?>" placeholder="" class="input02" readonly>
            <label class="placeholder2">length</label>
            </div>
            <div class="trial1">
            <input type="text" name="width" placeholder="" value="<?php echo $row['width8']; ?>" style="margin-left: 4px" class="input01" readonly>
            <label class="placeholder2">Width</label>
            </div>
            <div class="trial1">
            <input type="text" name="height" placeholder="" value="<?php echo $row['height8']; ?>" style="margin-left: 7px" class="input01" readonly>
            <label class="placeholder2">Height</label>
            </div>
            </div>
            <div class="trial1">
            <input type="text" name="weight" placeholder="" value="<?php echo $row['weight8']; ?>" class="input01" readonly>
            <label class="placeholder2">Weight</label>
            </div>
            </div>
        </div>
        <?php
            $displayStyle1 = empty($row['trailor9']) ? 'style="display:none"' : '';
        ?>
        <div class="trial1" <?php echo $displayStyle1 ?>>
            <div class="cont">
            <div class="trial1"> 
            <input type="text" name="trailor_type" class="input02" value="<?php echo $row['trailor9'];  ?>" readonly>
            <label class="placeholder2">9th Trailor Type</label>
            </div>
            <div class="outer02">
            <div class="trial1">
            <input type="text" name="length" value="<?php echo $row['length9']; ?>" placeholder="" class="input02" readonly>
            <label class="placeholder2">length</label>
            </div>
            <div class="trial1">
            <input type="text" name="width" placeholder="" value="<?php echo $row['width9']; ?>" style="margin-left: 4px" class="input01" readonly>
            <label class="placeholder2">Width</label>
            </div>
            <div class="trial1">
            <input type="text" name="height" placeholder="" value="<?php echo $row['height9']; ?>" style="margin-left: 7px" class="input01" readonly>
            <label class="placeholder2">Height</label>
            </div>
            </div>
            <div class="trial1">
            <input type="text" name="weight" placeholder="" value="<?php echo $row['weight9']; ?>" class="input01" readonly>
            <label class="placeholder2">Weight</label>
            </div>
            </div>
        </div>
        
        <?php
            $displayStyle = empty($row['trailor10']) ? 'style="display:none"' : '';
        ?>
        <div class="trial1" <?php echo $displayStyle ?>>
            <div class="cont" >
            <div class="trial1"> 
            <input type="text" name="trailor_type" class="input02" value="<?php echo $row['trailor10'];  ?>" readonly>
            <label class="placeholder2">10th Trailor Type</label>
            </div>
            <div class="outer02">
            <div class="trial1">
            <input type="text" name="length" value="<?php echo $row['length10']; ?>" placeholder="" class="input02" readonly>
            <label class="placeholder2">length</label>
            </div>
            <div class="trial1">
            <input type="text" name="width" placeholder="" value="<?php echo $row['width10']; ?>" style="margin-left: 4px" class="input01" readonly>
            <label class="placeholder2">Width</label>
            </div>
            <div class="trial1">
            <input type="text" name="height" placeholder="" value="<?php echo $row['height10']; ?>" style="margin-left: 7px" class="input01" readonly>
            <label class="placeholder2">Height</label>
            </div>
            </div>
            <div class="trial1">
            <input type="text" name="weight" placeholder="" value="<?php echo $row['weight10']; ?>" class="input01" readonly>
            <label class="placeholder2">Weight</label>
            </div>
            </div>
        </div>
            <div class="outer02">
            <div class="trial1">
            <input type="text" name="from" value="<?php echo $row['from']; ?>" placeholder="" class="input01" readonly>
            <label class="placeholder2">From</label>
            </div>
            <div class="trial1">
            <input type="text" name="from_pincode" value="<?php echo $row['from_pincode']; ?>" style="margin-left: 4px" placeholder="" class="input01" readonly>
            <label class="placeholder2">From Pincode</label>
            </div>
            </div>
            <div class="outer02">
            <div class="trial1">
            <input type="text" name="to" placeholder="" value="<?php echo $row['to']; ?>" class="input01" readonly>
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
            <input type="text"  placeholder="" name="price_quote" value="<?php echo isset($row_quoted_price['quote_price']) ? $row_quoted_price['quote_price'] : ''; ?>" class="input02" <?php echo !empty($row_quoted_price['quote_price']) ? 'readonly' : ''; ?>>
            <label class="placeholder2">Quote A Price</label>
            </div>
            <div class="trial1">
            <input type="text" placeholder="" name="logi_company" value="<?php echo $companyname001 ?>" class="input02" readonly>
            <label class="placeholder2">Logistic Company Name</label>
            </div>
            <div class="trial1">
            <input type="text" placeholder="" name="logi_number" value="<?php echo isset($row_quoted_price['logistic_company_number']) ? $row_quoted_price['logistic_company_number'] : ''; ?>"  class="input02" <?php echo !empty($row_quoted_price['logistic_company_number']) ? 'readonly' : ''; ?>>
            <label class="placeholder2">Logistic Company Number</label>
            </div>
            
            <div class="trial1">
            <input type="text" placeholder="" name="logi_email" value="<?php echo $email ?>" class="input02" readonly>
            <label class="placeholder2">Logistic Company Email</label>
            </div>
            <?php
            $displayStyle112 = !empty($row_quoted_price['quote_price']) ? 'style="display:none"' : '';
        ?>

            <button type="submit" class="logi_req" <?php echo $displayStyle112 ?>>Quote Price</button>
            <br>


        </div>
    </form>
</body>
</html>