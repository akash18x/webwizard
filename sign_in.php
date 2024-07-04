<?php
$login = false;
$showError = false;
session_start();
 
if(isset($_SESSION['verified'])){
  $login = true;
  unset($_SESSION['verified']);
}

if(isset($_COOKIE['login_email']) && isset($_COOKIE['login_password'])){
  $log_email=$_COOKIE['login_email'];
  $log_pass=$_COOKIE['login_password'];

}
else{
  $log_email="";
  $log_pass="";
}
$checked = isset($_COOKIE['login_email']) ? 'checked' : '';



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'partials/_dbconnect.php';
    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM `login` WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        
        if ($password == $row["password"] && $row['status']=== 'verified') {
            $login = true;
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['email'] = $email;
            
            $companyname = mysqli_real_escape_string($conn, $row['companyname']);
            $_SESSION['companyname'] = $companyname;

            $username = mysqli_real_escape_string($conn, $row['username']);
            $_SESSION['username'] = $username;

            $strtdate = mysqli_real_escape_string($conn, $row['time']);
            $_SESSION['time'] = $strtdate;

            if (isset($_POST['remember_me'])){
              setcookie('login_email',$_POST['email'],time()+(60*60*24));
              setcookie('login_password',$_POST['password'],time()+(60*60*24));

            }
            else{
              setcookie('login_email','',time()-(60*60*24));
              setcookie('login_password','',time()-(60*60*24));

            }


            // Redirect based on enterprise type
            switch ($row['enterprise']) {
                case 'rental':
                    header("location: rental_dashboard.php");
                    exit;
                case 'OEM':
                    header("location: oem_dashboard.php");
                    exit;
                case 'logistics':
                    header("location: logistics_dashboard.php");
                    exit;
                case 'admin':
                    header("location: admin.php");
                    exit;
                case 'epc':
                    header("location: epc_dashboard.php");
                    exit;
                default:
                    $showError = "Invalid Credentials";
            }
        }
        elseif($row['status'] === 'notverified'){
          $_SESSION['email']=$_POST['email'];
          header("Location:user-otp.php");
        }
    
    } 

    
    else {
        $showError = "Invalid Credentials";
    }
}
?>
<style>
<?php include "style.css" ?>
</style>

<style>
  <?php include "main.js" ?>
</style>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">      <link rel="icon" href="favicon.jpg" type="image/x-icon">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="main.js"></script>
    <title>SignIn</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="favicon.jpg" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Fredoka+One&family=Play&display=swap" rel="stylesheet">
</head>
<body>
<div class="navbar1" id="main_nav">
        <div class="iconcontainer">
        <ul><li><a href="sign_in.php">Home</a></li>
        <li><a onclick="scroll_to_service()" >Services</a></li>
            <li><a onclick="scroll_to_aboutus()">About Us</a></li>
            <li><a onclick="scroll_to_contactus()">Contact Us</a></li>
            <li><a href="sign_up.php">SignUp</a></li></ul>
        </div>
    </div>
    <?php
    if($login){
        echo '<label>
        <input type="checkbox" class="alertCheckbox" autocomplete="off" />
        <div class="alert notice">
          <span class="alertClose">X</span>
          <span class="alertText"><b>Success!</b>You Can Now LogIN
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
    <br><br><br><br><br>
    <div class="header_container">
      <div class="font_header_cont">
        <div class="tagline">Empowering Business, Elevating Success Your Premier Crane Rental Ecosystem</div>
      </div>
    <div class="container">
      <div class="wrapper">
        <div class="title"><span>Login Form</span></div>
        <form action="sign_in.php" method="POST" autocomplete="off">
          <div class="row">
            <i class="fas fa-user"></i>
            <input type="text" name="email" value="<?php if(isset($log_email)){ echo $log_email;} ?>"  placeholder="Email " required>
          </div>
          <div class="row">
            <i class="fas fa-lock"></i>
            <input type="password" value="<?php if(isset($log_pass)){ echo $log_pass;} ?>" name="password" placeholder="Password" required>
          </div>
          <input type="checkbox" <?php echo $checked; ?> id="remember_me"  name="remember_me">
          <label for="remember_me" class="remember_me1">Remember Me</label>  

          <div class="forgot-password">
              <a href="forgot-password.php">Forgot Password?</a>
          </div>


          <div class="row button">
            <input type="submit" value="Login">
          </div>
          <div class="signup-link">Not a member? <a href="sign_up.php">Signup now</a></div>
        </form>
      </div>
    </div>
</div>

<div class="services_section" id="service_section_content">
<!-- <div class="service_innerdata_top"> -->
    <p class="service_heading001">Discover the unparalleled suite of services offered by Fleet EIP, where excellence meets innovation</p>

    <!-- </div> -->
  <div class="service_innerdata" id="first_service_row">
   
    <div class="service_card">
      <div class="sservice_heading">Market Leads</div>
      <div class="service_content01"><p>Our crane rental ecosystem features a robust market lead function, allowing potential clients to easily submit inquiries for crane rentals through our portal. With a user-friendly submission form capturing essential project details and contact information, we ensure seamless communication and prompt responses</p></div>
    </div>
    <div class="service_card">
    <div class="sservice_heading">Market Place</div>
      <div class="service_content01"><p>Our marketplace simplifies the process of buying and selling crane equipment. Users can easily list their cranes for sale by uploading photos and details, attracting potential buyers seeking reliable, pre-owned equipment. Simultaneously, buyers can browse a curated selection of used cranes available on our platform.</p></div>

    </div>
    <div class="service_card">
    <div class="sservice_heading">Fleet Management</div>
      <div class="service_content01"><p>Our fleet management solution empowers users to efficiently add, monitor, and maintain their fleets with ease. Users can seamlessly input their fleet details, ensuring comprehensive tracking and management capabilities. Crucially, our system notifies users of impending document expirations.</p></div>

    </div>
</div>
<div class="service_innerdata" id="second_service_row">
    <div class="service_card">
    <div class="sservice_heading">Operator Management</div>
      <div class="service_content01"><p>Our operator management allows users to find operators based on specific needs. Users can view operator ratings and feedback from previous employers, ensuring informed hiring decisions.Users can  match their operational requirements with skilled operators, leveraging ratings and reviews for confident hiring.
</p></div>

    </div>
    <div class="service_card">
    <div class="sservice_heading">Accounts Management</div>
      <div class="service_content01"><p>

Our account management feature enables users to effortlessly create and manage quotations and bills. Users can track pending and cleared bills, ensuring streamlined financial oversight and efficient business operations.</p></div>

    </div>
    <div class="service_card">
    <div class="sservice_heading">Purchase Requisition</div>
      <div class="service_content01"><p>

Our purchase requisition system facilitates direct interaction between OEMs listing their fleets and users seeking transparency in procurement. It ensures seamless communication and clear visibility, enabling efficient fleet acquisition with confidence.</p></div>

    </div>
</div>
</div>
<br>
<div class="about_us_section" id="abtus_content">
<div class="abtusimg"></div>

  <div class="aboutus_data">

    <div class="data_container" id="abt_us_section">
      <p class="heading_abtus">ABOUT US :</p>
    <p class="first_para_abtus">Welcome to FleetEIP, the ultimate solution for
                your crane needs. We offer a crane management ecosystem that present to you a wide range of services,
               including crane purchase, rental, maintenance, monitoring, and optimization. 
               Our skilled and trained staff are ready to assist you with any
               crane-related issue, from booking to delivery, from installation to operation, and 
               from inspection to repair.</p><br>
               <p>Our mission is to deliver high-quality crane solutions that meet the needs of our clients while ensuring safety, efficiency, and excellence in every project.
                At FleetEIP, we value safety, quality, 
            and customer satisfaction above all. We follow the highest standards of safety and
             compliance, and we ensure that our services are well-maintained and regularly inspected. 
             and strive to deliver the best service and 
            support to our customers, from planning and execution to after-sales and feedback
            </p>


    </div>
  </div>
</div>
<br>
<footer class="sign_up_footer" id="footer_content">
  <div class="footer_content_main">
    <div class="social_line"><img src="facebook_logo.png" alt="Facebook" onclick="window.open('https://www.facebook.com/fleetEIP/', '_blank');" style="cursor: pointer;"><img src="linkedin.png"  alt="LinkedIn" onclick="window.open('https://www.linkedin.com/company/fleeteip/', '_blank');" style="cursor: pointer;"></div>
    <p>&copy; 2024 FleetEIP. All rights reserved. Unauthorized use or reproduction of any content is strictly prohibited.</p>

  </div>
  <div class="footer_Secondary">
    <p><strong> Office Address:</strong>SF-B301,Roman Court,Near Parkar Mall,Kundli,Sonipat,Haryana 131023</p>
    <p><strong>Contact Us:</strong> support@fleeteip.com  &nbsp +91-89767 23779</p>
    

  </div>

</footer>
    



</body>
</html>
   