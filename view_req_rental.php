<?php
include 'partials/_dbconnect.php';

?>

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
    <div class="outercard">
            <div class="card_container1">
            <div class="button-52" onclick="location.href='quoted_pricerental.php'" > Quoted Price</div>
            <div class="button-52" onclick="location.href='notinterested_leads_listing.php'" >Not Interested Leads</div>
            <div class="button-52" onclick="location.href='view_req_rentalinner.php'" >View Leads</div>
            <div class="button-52" onclick="location.href='closed_rentalleads.php'" >Closed Leads</div>
            <!-- <div class="button-52" onclick="location.href='purchase.php'" >Purchase Requisition</div>
            <div class="button-52" onclick="location.href='view_req_rental.php'" >Requirements</div> -->

        </div>
</body>
</html>