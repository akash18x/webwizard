<?php
session_start();
if (!isset($_SESSION['email'])) {
    header('location: signup.php');
    exit();
}

if(!isset($_POST['check'])){
    $_SESSION['notverified']="email not verified";

}


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['check'])) {
    include "partials/_dbconnect.php";
    $otp_code = mysqli_real_escape_string($conn, $_POST['otp']);
    $check_code = "SELECT * FROM login WHERE code = $otp_code";
    $code_res = mysqli_query($conn, $check_code);

    if (mysqli_num_rows($code_res) > 0) {
        $fetch_data = mysqli_fetch_assoc($code_res);
        $fetch_code = $fetch_data['code'];
        $email = $fetch_data['email'];
        $code = 0;
        $status = 'verified';

        $update_otp = "UPDATE login SET code = $code, status = '$status' WHERE code = $fetch_code";
        $update_res = mysqli_query($conn, $update_otp);

        if ($update_res) {
            $_SESSION['email'] = $email;
            $_SESSION['verified']= "mail verified";
            
            header('location: sign_in.php');

            exit();
        } else {
            $errors['otp-error'] = "Failed while updating code!";
        }
    } else {
        $errors['otp-error'] = "You've entered incorrect code!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="favicon.jpg" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTP Verification</title>
    <link rel="stylesheet" href="style.css">

</head>
<div class="navbar1">
        <div class="iconcontainer">
        <ul><li><a href="sign_in.php">Home</a></li>
            <li><a href="about_us.html">About Us</a></li>
            <li><a href="contact_us.php">Contact Us</a></li>
            <li><a href="sign_in.php">LogIn</a></li></ul>
        </div>
    </div>

<body>
    <form action="user-otp.php" class="otpform" method="POST">
        <div class="otp_container">

        <h2>OTP Verification</h2>
        <?php
        if (isset($_SESSION['info'])) {
            echo '<div>' . $_SESSION['info'] . '</div>';
        }
        if (isset($errors['otp-error'])) {
            echo '<div>' . $errors['otp-error'] . '</div>';
        }
        ?>
        <div class="trial1">
        <input type="text" name="otp" placeholder="" class="input02" required>
        <label for="" class="placeholder2">Enter OTP</label>
        </div>
        <button type="submit" class="epc-button" name="check">Verify</button>
        <br>
        </div>
    </form>
</body>
</html>