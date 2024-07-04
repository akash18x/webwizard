<?php
include_once 'partials/_dbconnect.php'; // Include the database connection file
session_start();
$email = $_SESSION["email"];
$companyname001 = $_SESSION['companyname'];

$showAlert = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'partials/_dbconnect.php';
    $name = $_POST["team_name"];
    $mobnum = $_POST["number"];
    $team_email = $_POST["email"];
    $companyname = $_POST["companyname"];
    $designation = $_POST["designation"];

        $sql="INSERT INTO `team_members` (`added_by`, `name`, `mob_number`, `email`, `company_name`, `designation`)
         VALUES ('$email', '$name', '$mobnum', '$team_email', '$companyname', '$designation')";
         $result = mysqli_query($conn, $sql);
         if ($result){
            $showAlert = true;
            // session_start();
            $_SESSION['username']=$name;
        }
    
    else{
        $showError = true;
    
     }};

?>



<style>
  <?php include "style.css" ?>
</style>
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
    <?php
    if($showAlert){
        echo '<label>
        <input type="checkbox" class="alertCheckbox" autocomplete="off" />
        <div class="alert notice">
          <span class="alertClose">X</span>
          <span class="alertText">User Added SUccessfully!
              <br class="clear"/></span>
        </div>
      </label>';
     }
     if($showError){
        echo '<label>
        <input type="checkbox" class="alertCheckbox" autocomplete="off" />
        <div class="alert error">
          <span class="alertClose">X</span>
          <span class="alertText">Mis Matched Credentials
              <br class="clear"/></span>
        </div>
      </label>';
    }
    ?>  
    <form action="rental_subuser.php" method="POST" class="rental-subuser-form" autocomplete="off">
        <div class="innersubuser">
            <div class="add_subuser_heading"><h2 class="rental_heading1">Add Team Member</h2></div>
            
            <div class="trial1">
            <input type="text" name="team_name" id="" placeholder="" class="input02">
            <label class="placeholder2">Name</label>
            </div>
            <div class="trial1">
            <input type="text" name="number" id="" placeholder="" class="input02">
            <label class="placeholder2">Mobile Number</label>
            </div>
            <div class="trial1">
            <input type="text" name="companyname" id="" value="<?php echo $companyname001 ?>" placeholder="" class="input02" readonly>
            <label class="placeholder2">Company Name</label>
            </div>
            <div class="trial1">

            <input type="text" name="email" id="" placeholder="" class="input02">
            <label class="placeholder2">Email</label>
            </div>
            <div class="trial1">
            <select name="designation" id="" class="input02">
                <option value="" disabled selected >User Designation</option>
                <option value="marketing">Marketing</option>
                <option value="operation">Operation and Maintanance</option>
                <option value="accounts">Accounts</option>
            </select>
            </div>
            <button type="submit" class="epc-button">Add User</button>
            <br>

        </div>
    </form>

</body>
</html>