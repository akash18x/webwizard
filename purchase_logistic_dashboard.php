<style>
<?php include "style.css" ?>
</style>
<script>
    <?php include "main.js" ?>
    </script>
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
            <div class="card_container_logistic">
            <div class="button-52" onclick="location.href='recieved_quotation_logistics.php'" > Recieved Quotations</div>
            <div class="button-52" onclick="location.href='logistics.php'" >Post Requirement</div>
            <div class="button-52" onclick="location.href='my_logi_req.php'" >My Requirements</div>

        </div>
</body>
</html>