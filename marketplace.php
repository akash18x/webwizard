<style>
  <?php include "style.css" 
  ?>
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
            <div class="card_container_purchase">
            <div class="button-52" onclick="location.href='tets.php'" >Sell Fleet</div>
            <div class="button-52" onclick="location.href='buyusedfleet.php'" >Buy Fleet</div>
            <div class="button-52" onclick="location.href='view_listing_dashboard.php'" >View Listing</div>
        </div>
</body>
</html>