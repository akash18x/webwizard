<?php
session_start();
$email = $_SESSION["email"];
$companyname001 = $_SESSION['companyname'];
$showemail = false;
$showAlert = false;
$showError = false;
include 'partials/_dbconnect.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $subemail = $_POST["subemail"];
    $subpass = $_POST["password"];
    $subcpass = $_POST["cpassword"];
    $comp = $_POST['company_name'];
    $enterprise_subuser = $_POST['enterprise_type'];
    $contactnumber_subuser = $_POST["contact"];
    $designation=$_POST['designation'];
    $username=$_POST['username'];

    $sql_check011 = "SELECT * FROM `login` WHERE email='$subemail'";
    $result_subuser = mysqli_query($conn, $sql_check011);
    $row_subemail = mysqli_fetch_assoc($result_subuser);

    if ($row_subemail > 0) {
        $showemail = true;
    } else {

        if ($subpass == $subcpass) {
            // Fetch enterprise details from existing user
            $sql_check_exist77 = "SELECT * FROM `login` WHERE email='$email' and companyname='$companyname001'";
            $result_exist = mysqli_query($conn, $sql_check_exist77);
            $row_exist = mysqli_fetch_assoc($result_exist);

            $sql_subuser1 = "SELECT * FROM `login` WHERE `email`='$email' AND `companyname`='$companyname001' AND `added_by`=''";
            $result121 = mysqli_query($conn, $sql_subuser1);
            $row_new = mysqli_fetch_assoc($result121);
    

            $sql = "INSERT INTO `login` (`username`,`compnay_pincode`,`company_address`,`comp_web`,`designation`,`email`, `password`, `enterprise`, `contactnumber`, `added_by`, `companyname`,`gst`,`pancard`,`webiste_address`,`add_on_services`,`rmc_type`,`rmc_location`,`rmc_pincode`)
            VALUES ('$username','".$row_new['compnay_pincode']."','".$row_new['company_address']."','".$row_new['comp_web']."','$designation','$subemail', '$subpass', '$enterprise_subuser', '$contactnumber_subuser', '$email', '$comp','".$row_new['gst']."','".$row_new['pancard']."','".$row_new['webiste_address']."','".$row_new['add_on_services']."','".$row_new['rmc_type']."','".$row_new['rmc_location']."','".$row_new['rmc_pincode']."')";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                $showAlert = true;
            } else {
                $showError = true;
            }
        } else {
            $showError = true;
        }
    }
}
?>
<?php 
    include 'partials/_dbconnect.php';

$sql_check="SELECT * FROM `login` where email='$email' and companyname='$companyname001'";
$result_exist=mysqli_query($conn , $sql_check);
$row_exist=mysqli_fetch_assoc($result_exist);


?>
<style>
  <?php include "style.css" 
  ?>
</style>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">      <link rel="icon" href="favicon.jpg" type="image/x-icon">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

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
if($showemail){
    echo '<label>
    <input type="checkbox" class="alertCheckbox" autocomplete="off" />
    <div class="alert error">
      <span class="alertClose">X</span>
      <span class="alertText">Email Already Exist
          <br class="clear"/></span>
    </div>
  </label>';
}
    if($showAlert){
        echo '<label>
        <input type="checkbox" class="alertCheckbox" autocomplete="off" />
        <div class="alert notice">
          <span class="alertClose">X</span>
          <span class="alertText">Subuser Can Now LogIN
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
<form action="rental_employee.php" method="POST" class="oemsubusers">
    <div class="subuser-container">
        <div class="subuser_div"><h2>Add SubUsers</h2></div>
        <div class="trial1">
            <input type="text" name="username" class="input02">
            <label for="" class="placeholder2">User Name</label>
        </div>
        <div class="trial1">
        <input type="text" name="subemail" placeholder="" class="input02" required>
        <label class="placeholder2">Email</label>
    </div>
        <div class="outer02">
            <div class="trial1">
            <div class="row">

            <input type="password" name="password" placeholder="" required class="input02">
            <label for="" class="placeholder2">Password</label>
          </div>
        </div>
        <div class="trial1" >

        <div class="row">
            <input type="password" name="cpassword" placeholder="" required class="input02">
            <label for="" class="placeholder2">Confirm Password</label>
          </div>
        </div>

          </div>
        
        
        <div class="outer02">
        <div class="trial1">
        <input type="text" name="company_name" placeholder="" value="<?php echo $companyname001  ?>" class="input02" readonly>
        <label class="placeholder2">Company</label>
        </div>
        <div class="trial1">
        <input type="text" name="enterprise_type" placeholder="" value="<?php echo $row_exist['enterprise']  ?>" class="input02" readonly>
        <label class="placeholder2">Enterprise Type</label>
        </div></div>
        <div class="outer02">
        <div class="trial1">
        <input type="text" name="contact" placeholder="" class="input02" required>
        <label class="placeholder2">Contact Number</label>
        </div> 
        <div class="trial1">
            <select name="designation" id="" class="input02">
                <option value="" disabled selected >Department</option>
                <option value="marketing">Marketing</option>
                <option value="operation">Operation and Maintanance</option>
                <option value="accounts">Accounts</option>
                <option value="management">Management</option>
            </select>
            </div>
            </div>

        <button type="submit" class="epc-button">Add SubUser</button>
        <br>
    </div>
</form>
<br>
<br>
</body>
</html>