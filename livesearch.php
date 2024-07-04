<?php
include 'partials/_dbconnect.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">      <link rel="icon" href="favicon.jpg" type="image/x-icon">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
</head>
<style>
  <?php include "style.css" ?>
</style>
<script>
    <?php include "main.js" ?>
    </script>
<body>
<div class="navbar1">
        <div class="iconcontainer">
        <ul>
        <li><a href="rental_dashboard.php">Dashboard</a></li>
            <li><a href="view_news.php">News</a></li>

            <li><a href="logout.php">Log Out</a></li></ul>
        </div>
    </div> 
    <div class="directory_container">
        <!-- <div class="trial1"> -->
    <input type="text" class="form_control " id="live_search" autocomplete="off"   placeholder="Search Company Name" >
    <!-- <label class="placeholder2">Search Company Name</label> -->
    </div>
    <div id="searchresult"></div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $("#live_search").keyup(function(){
                var input =$(this).val();
                // alert(input);
                if(input !=""){
                    $("#searchresult").css("display","block");
                    $.ajax({
                        url:"livesearch1.php",
                        method:"POST",
                        data:{input: input},
                        success:function(data){
                            $("#searchresult").html(data);
                        }

                    });
                }else{
                    $("#searchresult").css("display","none");
                }
            })


        })
    </script>

</body>
</html>