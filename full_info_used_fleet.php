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
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8/slick/slick-theme.css"/>
    <style>
        /* Additional CSS styles for the slider */
        .slider {
            width: 50%;
            /* margin: 20px auto; */
            height: 30%;
            text-align: center;
            background-size: cover;
            /* border: 2px solid black; */
                box-shadow: 0px 4px 10px 1px rgba(0,0,0,0.1);

        }

        .slides img {
            max-width: 100%;
            min-width: 100%;
            max-height: 100%;
            min-height: auto;
            object-fit: contain;
        }
        .outer_container01{
            display: flex;
            justify-content: flex-start;
            align-items: center;
            margin-top: 50px;
            /* border: 2px solid blue; */
            width: 80%;
            padding: 20px;
            margin-left: 8%;
            align-self: center;
        }
    </style>
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
            $used_fleetId = $_GET['id'];
            include_once 'partials/_dbconnect.php'; 

            $sql = "SELECT * FROM images WHERE id='$used_fleetId'";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) { 
                    echo '<div class="outer_container01">';
                    echo'<div class="slider">';
                    echo'<div class="slides">';
                    echo "<div><img src='img/" . $row['front_pic'] . "'></div>";                           
                    echo "<div><img src='img/" . $row['right_side_pic'] . "'></div>";                           
                    echo "<div><img src='img/" . $row['left_side_pic'] . "'></div>";  
                    echo "<div><img src='img/" . $row['pic4'] . "'></div>";  
                    echo "<div><img src='img/" . $row['pic5'] . "'></div>";  
                    echo '</div>';
                    echo '</div>'; 
                    echo '<div class="sell_info001">';
                    ?>
                    <div class="sellheading"><p>Information</p></div>
                   <form action="" class="qwerty">
                    
                   <div class="trial1">
                    <input type="text" class="input02" placeholder="" value="<?php echo $row['category']; ?>" readonly>
                    <label class="placeholder2">Category</label>
                    </div>  
                    <div class="trial1">
                    <input type="text" class="input02" placeholder="" value="<?php echo $row['sub_type']; ?>" readonly>
                    <label class="placeholder2">Sub Type</label>
                    </div> 
                    <div class="trial1">
                    <input type="text" class="input02" placeholder="" value="<?php echo $row['make']; ?>" readonly>
                    <label class="placeholder2">Make</label>
                    </div>   
                    <div class="trial1">
                    <input type="text" class="input02" placeholder="" value="<?php echo $row['capacity']; ?>" readonly>
                    <label class="placeholder2">capacity</label>
                    </div>   <div class="trial1">
                    <input type="text" class="input02" placeholder="" value="<?php echo $row['yom']; ?>" readonly>
                    <label class="placeholder2">YOM</label>
                    </div>   <div class="trial1">
                    <input type="text" class="input02" placeholder="" value="<?php echo $row['location']; ?>" readonly>
                    <label class="placeholder2">Location</label>
                    </div>  
                    <div class="jib_outer">
                    <div class="trial1">
                    <input type="text" class="input02" placeholder="" value="<?php echo $row['boomlength']; ?>" readonly>
                    <label class="placeholder2">Boom Length</label>
                    </div>   
                    <div class="trial1">
                    <input type="text" class="input02" placeholder="" value="<?php echo $row['jiblength']; ?>" readonly>
                    <label class="placeholder2">Jib Length</label>
                    </div> 
                    <div class="trial1">
                    <input type="text" class="input02" placeholder="" value="<?php echo $row['luffinglength']; ?>" readonly>
                    <label class="placeholder2">Luffing Length</label>
                    </div> 
                    </div> 
                     <div class="trial1">
                    <input type="textarea"  class="input02" placeholder="" value="<?php echo $row['description']; ?>" readonly>
                    <label class="placeholder2">description</label>
                    </div> 
                    <div class="trial1">
                    <input type="textarea" class="input02" placeholder="" value="<?php echo $row['contact_no']; ?>" readonly>
                    <label class="placeholder2">Contact Number</label>
                    </div> 
                    <div class="trial1">
                    <input type="textarea" class="input02" placeholder="" value="<?php echo $row['price']; ?>" readonly>
                    <label class="placeholder2">Price</label>
                    </div> 
                    <br>
                   </form>
                    <?php
                    echo '</div>'; 
                    echo '</div>';                        
                }
            }
            ?>
       

    <!-- JavaScript for the slider -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8/slick/slick.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.slides').slick({
                dots: true,
                infinite: true,
                speed: 500,
                slidesToShow: 1,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 6000
            });
        });
    </script>
</body>
</html>