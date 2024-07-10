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
    <link rel="stylesheet" href="tiles.css"> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
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
 <!--    <div class="outercard">
            <div class="card_container_logistic">
            <div class="button-52" onclick="location.href='recieved_quotation_logistics.php'" > Recieved Quotations</div>
            <div class="button-52" onclick="location.href='logistics.php'" >Post Requirement</div>
            <div class="button-52" onclick="location.href='my_logi_req.php'" >My Requirements</div>

        </div>  -->

        
  <div class="newtilecontainer">
<article class="article-wrapper" onclick="location.href='recieved_quotation_logistics.php'" > 
  <div class="rounded-lg container-project clients">
    </div>
    <div class="project-info">
      <div class="flex-pr">
        <div class="project-title text-nowrap">Recieved <br> Quotations</div>
          <div class="project-hover">
            <svg style="color: black;" xmlns="http://www.w3.org/2000/svg" width="2em" height="2em" color="black" stroke-linejoin="round" stroke-linecap="round" viewBox="0 0 24 24" stroke-width="2" fill="none" stroke="currentColor"><line y2="12" x2="19" y1="12" x1="5"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
            </div>
          </div>
          <div class="types">
            <span style="background-color: rgba(165, 96, 247, 0.43); color: rgb(85, 27, 177);" class="project-type">• Add Clients</span>
             <span class="project-type">• Manage Clients</span>
        </div>
    </div>
</article>

<article class="article-wrapper" onclick="location.href='logistics.php'" >
  <div class="rounded-lg container-project bills_tile">
    </div>
    <div class="project-info">
      <div class="flex-pr">
        <div class="project-title text-nowrap">Post <br> Requirement</div>
          <div class="project-hover">
            <svg style="color: black;" xmlns="http://www.w3.org/2000/svg" width="2em" height="2em" color="black" stroke-linejoin="round" stroke-linecap="round" viewBox="0 0 24 24" stroke-width="2" fill="none" stroke="currentColor"><line y2="12" x2="19" y1="12" x1="5"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
            </div>
          </div>
          <div class="types">
            <span style="background-color: rgba(165, 96, 247, 0.43); color: rgb(85, 27, 177);" class="project-type">• Manage Bills</span>
             <span class="project-type">• Generate Bills</span>
        </div>
    </div>
</article>


<article class="article-wrapper" onclick="location.href='my_logi_req.php'">
  <div class="rounded-lg container-project">
    </div>
    <div class="project-info">
      <div class="flex-pr">
        <div class="project-title text-nowrap">My <br> Requirements</div>
          <div class="project-hover">
            <svg style="color: black;" xmlns="http://www.w3.org/2000/svg" width="2em" height="2em" color="black" stroke-linejoin="round" stroke-linecap="round" viewBox="0 0 24 24" stroke-width="2" fill="none" stroke="currentColor"><line y2="12" x2="19" y1="12" x1="5"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
            </div>
          </div>
          <div class="types">
            <span style="background-color: rgba(165, 96, 247, 0.43); color: rgb(85, 27, 177);" class="project-type">• Open Bill</span>
             <span class="project-type">• Closed Bill</span>
        </div>
    </div>
</article>

</body>
</html>