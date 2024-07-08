<?php
include 'partials/_dbconnect.php';
session_start();
$companyname001 = $_SESSION['companyname'];
$name_user=$_SESSION['username'];


$strt_time=$_SESSION['time'];
$expiry_date = date('d-m-Y', strtotime($strt_time . ' +3 months'));


$sql_addedfleet="SELECT COUNT(snum) AS total FROM `fleet1` where companyname='$companyname001'";
$result = mysqli_query($conn, $sql_addedfleet);
$row = mysqli_fetch_assoc($result);
$total_count = $row['total'];

$sql_addedoperator = "SELECT COUNT(id) AS total_operator FROM `myoperators` where company_name='$companyname001'";
$result_operator = mysqli_query($conn, $sql_addedoperator);
$row_operator = mysqli_fetch_assoc($result_operator);
$total_count_operator = $row_operator['total_operator']; // Update variable name to $row_operator

$sql_new_leads="SELECT COUNT(id) AS total_new_leads FROM  `req_by_epc` WHERE id NOT IN (SELECT requirement_id FROM `notinterested_rental` WHERE rental_name = '$companyname001') AND id NOT IN (SELECT req_id FROM `requirement_price_byrental` WHERE rental_name = '$companyname001')";
$result_new_leads=mysqli_query($conn,$sql_new_leads);
$row_new_leads=mysqli_fetch_assoc($result_new_leads);
$total_new_leads = $row_new_leads['total_new_leads'];

$sql_notification_count_expiry="SELECT COUNT(sno) AS total_notification FROM `insaurance_notification` where company_name='$companyname001'";
$result_count=mysqli_query($conn,$sql_notification_count_expiry);
$row_count_noti= mysqli_fetch_assoc($result_count);
$count_of_notification=$row_count_noti['total_notification'];

$sql_dl_expiry_count = "SELECT COUNT(sno) AS total_dl_notification FROM `dl_expiry` WHERE company_name='$companyname001'";
$dl_result = mysqli_query($conn, $sql_dl_expiry_count);
$row_count_dl = mysqli_fetch_assoc($dl_result);
$count_of_dl_notification = $row_count_dl['total_dl_notification'];


$sql_to_do_data="SELECT * FROM `to_do` where companyname='$companyname001'";
$sql_todo_result=mysqli_query($conn ,$sql_to_do_data);

$sql_employee="SELECT * FROM `login` where companyname='$companyname001'";
$sql_employee_result=mysqli_query($conn,$sql_employee);

?>
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="../favicon.jpg" type="image/x-icon">
    <script src="main.js"></script>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="admin.css"> 
    <!-- <link rel="stylesheet" href="./style.css"> -->
     
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


    <title>Dashboard</title> 
    
</head>
<body>
    <nav>
        <div class="logo-name">
            <div class="logo-image">
                <!--<img src="images/logo.png" alt="">-->
            </div>

            <span class="logo_name">FleetEIP</span>
        </div>

        <div class="menu-items">
            <ul class="nav-links">
                <li><a href="admindash.php">
                <i class="bi bi-speedometer2"></i>
                    <span class="link-name">Dahsboard</span>
                </a></li>

                <li><a href="viewfleet2.php">
                <i class="bi bi-truck-flatbed"></i>
                    <span class="link-name">Fleet Management</span>
                </a></li>
                <li><a href="purchase.php">
                <i class="bi bi-file-earmark"></i>
                    <span class="link-name">Purchase Requisition</span>
                </a></li>
                <li><a href="view_req_rental.php">
                <i class="fas fa-chart-line"></i>
                    <span class="link-name">Market Leads</span>
                </a></li>
                <li><a href="marketplace.php">
                <i class="fas fa-store"></i>
                    <span class="link-name">Market Place</span>
                </a></li> 

                <li><a href="view_operator.php">
                <i class="bi bi-lightning"></i>
                    <span class="link-name">Man Power</span>
                </a></li>
    
                <li><a href="livesearch.php">
                <i class="fas fa-address-book"></i>
                    <span class="link-name">Directory</span>
                </a></li>
                <li><a href="rental_employee.php">
                <i class="fas fa-user-plus"></i>
                    <span class="link-name">Add Subusers</span>
                </a></li>
                <li><a href="complete_profile.php">
                <i class="fas fa-user-check"></i>
                    <span class="link-name"> Complete Profile</span>
                </a></li>
                <li><a href="complete_profile.php">
                <i class="uil uil-globe"></i>
                    <span class="link-name"> News</span>
                </a></li>
            </ul> 

            <br>
            
            <ul class="logout-mode"> 

           

               
<!-- 
                <li class="mode">
                    <a href="#">
                        <i class="uil uil-moon"></i>
                    <span class="link-name">Dark Mode</span>
                </a> -->

                 <div class="mode-toggle">
                 <!--  <span class="switch"></span> -->
                </div> 
            </li>
            </ul>
        </div>
    </nav>

    <section class="dashboard">
        
        <div class="top compdetails">
            <i class="uil uil-bars sidebar-toggle"></i>
            <!-- <p>Food Donate</p> -->
            <p  class ="logo" >Welcome <?php echo ucwords($companyname001); ?> &nbsp &nbsp &nbsp Trial Expiry Date = <?php echo $expiry_date ?></b></p>
             <p class="user"><i class="uil uil-signout"></i><a href="logout.php">Logout</a>

             </p>
           
        </div>

        <div class="dash-content">
            <div class="overview">
                <div class="title">
                    <i class="uil uil-tachometer-fast-alt"></i>
                    <span class="text">Dashboard</span>
                </div> 

<main class="py-6 bg-white ">
    <div class="container-fluid cardscont">
        <!-- Card stats -->
        <div class="row g-6 mb-6">
            <div class="col-xl-3 col-sm-6 col-12">
                <div class="card shadow border-0 card-hover" id="dashboard-card">
                    <div class="card-body" onclick="open_added_fleet()">
                        <div class="row">
<div class="col">
<div>
    <span class="h6 font-semibold text-muted text-sm d-block mb-2">Fleet </span>
</div>
<div>
    <span class="h3 font-bold mb-0"><?php echo $total_count ?></span>
</div>
<div <?php if ($count_of_notification === 16) { echo 'style="display: none;"'; } ?>>
    <span class="h5 font-bold mb-0"><?php echo $count_of_notification ?> Alerts</span>
</div>
</div>
                        <div class="col-auto">
                                <div class="icon icon-shape bg-tertiary text-white text-lg rounded-circle">
                                    <i class="fas fa-truck"></i> 
                                </div>
                                    </div>
                                </div>
                               <!--  <div class="mt-2 mb-0 text-sm">
                                    <span class="badge badge-pill bg-soft-success text-success me-2">
                                        <i class="bi bi-arrow-up me-1"></i>37%
                                    </span>
                                    <span class="text-nowrap text-xs text-muted">Since last month</span>
                                </div> -->
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12">
                        <div class="card shadow border-0" id="dashboard-card">
                            <div class="card-body" onclick="open_added_operators()">
                                <div class="row">
                                <div class="col">
    <div>
        <span class="h6 font-semibold text-muted text-sm d-block mb-2">Fleet Managers</span>
    </div>
    <div>
        <span class="h3 font-bold mb-0"><?php echo $total_count_operator ?></span>
    </div>
    <div>
        <span class="h5 font-bold mb-0"><?php echo $count_of_dl_notification ?> Alerts</span>
    </div>
</div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-primary text-white text-lg rounded-circle">
                                        <i class="bi bi-person-plus"></i> 
                                        </div>
                                    </div>
                                </div>
                              <!--   <div class="mt-2 mb-0 text-sm">
                                    <span class="badge badge-pill bg-soft-success text-success me-2">
                                        <i class="bi bi-arrow-up me-1"></i>80%
                                    </span>
                                    <span class="text-nowrap text-xs text-muted">Since last month</span>
                                </div> -->
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12" >
                        <div class="card shadow border-0" id="dashboard-card">
                            <div class="card-body" onclick="open_market_leads()" >
                                <div class="row">
                                    <div class="col">
                                        <span class="h6 font-semibold text-muted text-sm d-block mb-2">New Requirement</span>
                                        <span class="h3 font-bold mb-0"><?php echo $total_new_leads ?></span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-info text-white text-lg rounded-circle">
                                        <i class="bi bi-file-earmark-text"></i>
                                        </div>
                                    </div>
                                </div>
                              <!--   <div class="mt-2 mb-0 text-sm">
                                    <span class="badge badge-pill bg-soft-danger text-danger me-2">
                                        <i class="bi bi-arrow-down me-1"></i>-5%
                                    </span>
                                    <span class="text-nowrap text-xs text-muted">Since last month</span>
                                </div> -->
                            </div>
                        </div>
                    </div> 

                    

                    <div class="col-xl-3 col-sm-6 col-12">
                        <div class="card shadow border-0" id="dashboard-card">
                            <div class="card-body" onclick="generate_quotation()">
                                <div class="row">
                                    <div class="col">
                                        <span class="h6 font-semibold text-muted text-sm d-block mb-2">Generate Quotation</span>
                                        <!-- <span class="h3 font-bold mb-0">4.100</span> -->
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-info text-white text-lg rounded-circle">
                                        <i class="bi bi-file-earmark-text"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> 

                    <div class="col-xl-3 col-sm-6 col-12">
                        <div class="card shadow border-0" id="dashboard-card">
                            <div class="card-body" onclick="generate_bill()">
                                <div class="row">
                                    <div class="col">
                                        <span class="h6 font-semibold text-muted text-sm d-block mb-2">Generate Bill</span>
                                      <!--   <span class="h3 font-bold mb-0">4.100</span> -->
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-info text-white text-lg rounded-circle">
                                        <i class="bi bi-file-earmark-text"></i>
                                        </div>
                                    </div>
                                </div>
                              <!--   <div class="mt-2 mb-0 text-sm">
                                    <span class="badge badge-pill bg-soft-danger text-danger me-2">
                                        <i class="bi bi-arrow-down me-1"></i>-5%
                                    </span>
                                    <span class="text-nowrap text-xs text-muted">Since last month</span>
                                </div> -->
                            </div>
                        </div>
                    </div> 
                    

                </div>
                <br>
            </div>  
            <br> 

</main>

        

    </section>

    <script src="admin.js"></script>
    <script>
        function open_market_leads(){
    window.location.href="view_req_rentalinner.php";
}
function open_added_fleet() {
    window.location.href = "viewfleet2.php";
}
function open_added_operators(){
    window.location.href="view_operator.php";
}
function generate_quotation(){
    window.location.href="generate_quotation_landingpage.php";
}
function generate_bill(){
    window.location.href="generate_invoice.php";
}

    </script>
</body>
</html>
