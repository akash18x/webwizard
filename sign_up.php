<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
require 'PHPMailer/Exception.php';

$showAlert = false;
$showError = false;
$showError1 = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['upl_gst'])) {
    include "partials/_dbconnect.php";

    // Retrieve form data
    $email_new = $_POST['email_new'];
    $pass_new = $_POST['pass_new'];
    $conf_pass_new = $_POST['conf_pass_new'];
    $name_new = $_POST['name_new'];
    $cont_new = $_POST['cont_new'];
    $comp_name_new = $_POST['comp_name_new'];
    $add_new = $_POST['add_new'];
    $pin_new = $_POST['pin_new'];
    $gst_new = $_POST['gst_new'];
    $pancard_new = $_POST['pancard_new'];
    $companyweb_dd = $_POST['companyweb_dd'];
    $web_add_new = $_POST['web_add_new'];
    $ent_class_new = !empty($_POST['ent_class_new']) ? $_POST['ent_class_new'] : 'None';
    $add_service_new = !empty($_POST['add_service_new']) ? $_POST['add_service_new'] : 'None';
    $rmc_type_new = !empty($_POST['rmc_type_new']) ? $_POST['rmc_type_new'] : 'None';
    $rmc_loca_new = $_POST['rmc_loca_new'];
    $rmc_pin_new = $_POST['rmc_pin_new'];

    // Handle GST certificate upload
    $gst_cert = $_FILES['upl_gst']['name'];
    $temp_file_path = $_FILES['upl_gst']['tmp_name'];
    $folder1 = 'img/' . $gst_cert;
    move_uploaded_file($temp_file_path, $folder1);

    // Handle PAN card upload
    $pan = $_FILES['pan_upl']['name'];
    $temp_file_1 = $_FILES['pan_upl']['tmp_name'];
    $folder12 = 'img/' . $pan;
    move_uploaded_file($temp_file_1, $folder12);

    // Check if the company already exists
    $sql_exist = "SELECT * FROM login WHERE companyname='$comp_name_new'";
    $result = mysqli_query($conn, $sql_exist);

    if (mysqli_num_rows($result) > 0) {
        $showError = true;
    } else if ($pass_new === $conf_pass_new) {
        // $encpass = password_hash($pass_new, PASSWORD_BCRYPT);
        $code = rand(999999, 111111);
        $status = "notverified";

        $sql_insert = "INSERT INTO login (pan_card_photo, gst_certificate, username, email, password, companyname, company_address, compnay_pincode, gst, pancard, contactnumber, comp_web, webiste_address, enterprise, add_on_services, rmc_type, rmc_location, rmc_pincode, code, status) 
        VALUES ('$pan', '$gst_cert', '$name_new', '$email_new', '$pass_new', '$comp_name_new', '$add_new', '$pin_new', '$gst_new', '$pancard_new', '$cont_new', '$companyweb_dd', '$web_add_new', '$ent_class_new', '$add_service_new', '$rmc_type_new', '$rmc_loca_new', '$rmc_pin_new', '$code', '$status')";
        
        $result_insert = mysqli_query($conn, $sql_insert);
        if ($result_insert) {
            $mail = new PHPMailer(true);
            try {
                //Server settings
                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host       = 'smtp.hostinger.com';                     //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $mail->Username   = 'support@fleeteip.com';                     //SMTP username
                $mail->Password   = 'fleetEIP@0807';                               //SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                $mail->Port       = 465;            


                $mail->setFrom('support@fleeteip.com', 'FleetEIP');
                $mail->addAddress($email_new);  

                $mail->isHTML(true);  // Set email format to HTML
                $subject = "Email Verification Code";
                $message = "
<html>
<head>
    <style>
        body {
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
            line-height: 1.6;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 100%;
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border: 1px solid #e0e0e0;
        }
        .header {
            background-color: #C1121F;
            color: white;
            padding: 15px;
            border-radius: 8px 8px 0 0;
            text-align: center;
            font-size: 24px;
            font-weight: bold;
        }
        .content {
            margin: 20px 0;
            padding: 20px;
        }
        .content p {
            font-size: 16px;
            color: #333333;
        }
        .content h2 {
            font-size: 28px;
            color: #C1121F;
            text-align: center;
            margin: 20px 0;
        }
        .footer {
            font-size: 12px;
            color: #888888;
            text-align: center;
            margin-top: 20px;
        }
        .footer p {
            margin: 5px 0;
        }
    </style>
</head>
<body>
    <div class='container'>
        <div class='header'>
            FleetEIP - Email Verification
        </div>
        <div class='content'>
            <p>Dear User,</p>
            <p>Thank you for registering with FleetEIP. To complete your registration, please verify your email address by entering the verification code provided below on the verification page:</p>
            <h2>$code</h2>
            <p>This verification code is valid for a limited time and should be kept confidential.</p>
            <p>If you did not request this verification, please ignore this email or contact our support team immediately.</p>
            <p>Thank you,<br>
            FleetEIP Support Team</p>
        </div>
        <div class='footer'>
            <p>This email was sent from an address that cannot receive replies. If you need further assistance, please contact our support team.</p>
            <p>&copy; 2024 FleetEIP. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
";

                
                $mail->Subject = $subject;
                $mail->Body    = $message;
                $mail->send();
                
                $info = "We've sent a verification code to your email - $email_new";
                $_SESSION['info'] = $info;
                $_SESSION['email'] = $email_new;
                $_SESSION['password'] = $pass_new;
                
    header('location: user-otp.php');
    exit();


            }
            catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
            // $subject = "Email Verification Code";
            // $message = "Your verification code is $code";
            // $sender = "From: vishal32saini@gmail.com";
            // if (mail($email_new, $subject, $message, $sender)) {
            //     $info = "We've sent a verification code to your email - $email_new";
            //     $_SESSION['info'] = $info;
            //     $_SESSION['email'] = $email_new;
            //     $_SESSION['password'] = $pass_new;
            //     header('location: user-otp.php');
            //     exit();
            // } 
        }
            else {
                $errors['otp-error'] = "Failed while sending code!";
            }
        } else {
            $errors['db-error'] = "Failed while inserting data into database!";
        }
    } else {
        $showError1 = true;
    } 
    

?>


<script><?php include "main.js" ?></script>
<style><?php include "style.css" ?></style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="main.js"></script>
    <title>Document</title>
</head>
<body>
<div class="navbar1">
        <div class="iconcontainer">
        <ul><li><a href="sign_in.php">Home</a></li>
            <li><a href="about_us.html">About Us</a></li>
            <li><a href="contact_us.php">Contact Us</a></li>
            <li><a href="sign_in.php">LogIn</a></li></ul>
        </div>
    </div>
    <?php
    if($showAlert){
       echo '<label>
       <input type="checkbox" class="alertCheckbox" autocomplete="off" />
       <div class="alert notice">
         <span class="alertClose">X</span>
         <span class="alertText">You Can Now LogIN
             <br class="clear"/></span>
       </div>
     </label>';
    }
    if($showError){
        echo '<label>
        <input type="checkbox" class="alertCheckbox" autocomplete="off" />
        <div class="alert error">
          <span class="alertClose">X</span>
          <span class="alertText">Company Already Exist Kindly Login
              <br class="clear"/></span>
        </div>
      </label>';
      if($showError1){
        echo '<label>
        <input type="checkbox" class="alertCheckbox" autocomplete="off" />
        <div class="alert error">
          <span class="alertClose">X</span>
          <span class="alertText">Mis Matched Credentials
              <br class="clear"/></span>
        </div>
      </label>';
    }

    }
    ?>

<form action="sign_up.php" enctype="multipart/form-data" method='POST' class="sign_up_new">
    <div class="form_container1">
        <div class="sign_head">SignUp</div>
        <div class="trial1">
            <input type="text" name="email_new" placeholder="" class="input02 ">
            <label for="" class="placeholder2">Email</label>
        </div>
        <div class="outer02">
        <div class="trial1">
            <input type="password" name="pass_new"  placeholder="" class="input02">
            <label for="" class="placeholder2">Password</label>
        </div>
        <div class="trial1">
            <input type="password" name="conf_pass_new"  placeholder="" class="input02">
            <label for="" class="placeholder2">Confirm Password</label>
        </div>
        </div>
        <div class="outer02">
        <div class="trial1">
            <input type="text" name="name_new"  placeholder="" class="input02">
            <label for="" class="placeholder2">User Name</label>
        </div>
        <div class="trial1">
            <input type="text" name="cont_new"  placeholder="" class="input02">
            <label for="" class="placeholder2">Contact Number</label>
        </div>
        </div>
        <div class="trial1">
            <input type="text" name="comp_name_new"  placeholder="" class="input02">
            <label for="" class="placeholder2">Company Name</label>
        </div>
        <div class="outer02">
        <div class="trial1">
            <input type="text" name="add_new"  placeholder="" class="input02">
            <label for="" class="placeholder2">Company Address</label>
        </div>
        <div class="trial1">
            <input type="text" name="pin_new"  placeholder="" class="input02">
            <label for="" class="placeholder2">Pincode</label>
        </div>
        </div>
        <div class="outer02">
        <div class="trial1">
            <input type="text" name="gst_new"  placeholder="" class="input02">
            <label for="" class="placeholder2">Gst Number</label>
        </div> <div class="trial1">
            <input type="file" name="upl_gst" class="input02">
            <label for="" class="placeholder2">Upload Gst Certificate</label>
        </div>
        </div>
        <div class="outer02">
        <div class="trial1">
            <input type="text" name="pancard_new"  placeholder="" class="input02">
            <label for="" class="placeholder2">Pan Card Number</label>
        </div> 
        <div class="trial1">
            <input type="file" name="pan_upl"  placeholder="" class="input02">
            <label for="" class="placeholder2">Upload Pancard Certificate</label>
        </div>
        </div>
        <div class="trial1">
        <select name="companyweb_dd" class="input02" id="web_present" onchange="webdd_signin()">
            <option value=""disabled selected>Company Website ?</option>
            <option value="Yes">Yes</option>
            <option value="No">No</option>
        </select>
        </div>
        <div class="trial1"  placeholder="" id="web_add_company">
            <input type="text" name="web_add_new" class="input02">
            <label for="" class="placeholder2">Website Address</label>
        </div>
        <div class="trial1">
            <select name="ent_class_new" id="ent_Type_" class="input02" onchange="ent_type()">
                <option value=""disabled selected>Enterprise Classified As</option>
                <option value="OEM">OEM</option>
                <option value="rental">Rental</option>
                <option value="logistics">Logistics</option>
                <option value="epc">EPC</option>
                <option value=" Commercial RMC ">Commercial Contractor</option>
                <!-- <option value="admin">Admin</option> -->
            </select>
        </div>
        <div class="trial1" id="Info_Outer">
            <select name="add_service_new" id="_info" class="input02" onchange="service_Addon()">
                <option value=""disabled selected>Choose Add On Services</option>
                <option value="RMC Plant">RMC Plant</option>
                    <option value="Foundation Work">Piling Contract</option>
                    <option value="RMC Plant And Foundation Work">RMC Plant And Foundation Work</option>
                    <option value="None">None</option>
            </select>
        </div>
        <div class="trial1" >
            <select name="rmc_type_new" id="rmc_Type" class="input02" onchange="Rmc_Location()">
                <option value=""disabled selected>RMC Type</option>
                <option value="Dedicated">Dedicated</option>
                <option value="Commercial">Commercial</option>

            </select>
        </div>
        <div class="outer02" >
            <div class="trial1" id="Rmc_loca_outer">
                <input type="text" name="rmc_loca_new"  placeholder="" class="input02">
                <label for="" class="placeholder2">RMC Location</label>
            </div>
            <div class="trial1" id="Rmc_loca_outer2">
                <input type="text" name="rmc_pin_new"  placeholder="" class="input02">
                <label for="" class="placeholder2">RMC Pincode</label>
            </div>
        </div>
        <button type='submit' class="epc-button">SIGNUP</button>
        <p class="terms">Already A Member ?  <a href="" class="sign_in_a">SignIn Here</a> </p>
<br><br>




    </div>
</form>
<br><br>
</body>
</html>