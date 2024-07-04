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
    <style>
       
        
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

    if (isset($_POST['submit'])) {
        include_once 'partials/_dbconnect.php';

        $fleet_category = $_POST['fleet_category'];
        $fleet_sub_type =$_POST['type'];
        $purchase_capacity = $_POST['purchase_capacity'];
        
        $sql = "SELECT * FROM images WHERE category = '$fleet_category' AND capacity = '$purchase_capacity' AND sub_type='$fleet_sub_type'";
        $result = mysqli_query($conn, $sql);
        
        if (!$result) {
            echo "Error: " . mysqli_error($conn);
        } else {
            if (mysqli_num_rows($result) > 0) {
                ?>
                <div class="outer_Sell_table">
                <table class="sellfleet_table">
                <tr>
            <!-- <div class="outer_sellcontainer"> -->

                    <?php
                        $loop_count = 1;

                    while ($row = mysqli_fetch_assoc($result)) { 
                        echo '<td>';
 
                       echo '<div class="gallery_container">';                     
                        echo '<div class="gallery_item">';
                        echo "<img src='img/" . $row['front_pic'] . "' >";                           
                        echo '</div>';
                        echo '<div class="details">';
                        echo '<div class="detail_inner">';
                        
                        echo "<p>‣Make: " . $row['make'] . "</p>";
                        echo "<p>‣Model: " . $row['model'] . "</p>"; // Fix the concatenation here
                        echo "<p>‣KMR: " . $row['kmr'] . "</p>";
                        echo "<p>‣HMR: " . $row['hmr'] . "</p>"; // Fix the concatenation here
                        echo "<p>‣Location: " . $row['location'] . "</p>"; // Fix the concatenation here
                        echo "<p>‣Price: " . $row['price'] . "</p>"; // Fix the concatenation here

                        echo "</div>";
                        echo "</div>";
                        echo '<div class="outer_btn_view">';
                       echo "<div class='button_sellused_fleet'>";
                       echo"<a  href='full_info_used_fleet.php?id=" . $row['id'] .  "'>View</a></div>";
                       echo "</div>";
                       echo "</div>";
                       echo '<br>';

                       echo '</td>';
                       if ($loop_count > 0 && $loop_count % 3 == 0) {
                        echo '</tr><tr>';
                    }
        
                    $loop_count++;
                    }
                    ?>
                    
                    </tr>
                </table>
                </div>
                <?php
            } else {
                echo "No matching fleet found.";
            }
        }
    }
    ?>

</body>
</html>