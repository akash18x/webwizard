<?php
include_once 'partials/_dbconnect.php'; // Include the database connection file
session_start();
// $email = $_SESSION["email"];
$companyname001 = $_SESSION['companyname'];

?>
<style>
  <?php include "style.css" 
  ?>
</style>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">      <link rel="icon" href="favicon.jpg" type="image/x-icon">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="navbar1">
        <div class="iconcontainer">
        <ul>
        <li><a href="oem_dashboard.php">Dashboard</a></li>
            <li><a href="view_news.php">News</a></li>
                        <li><a href="logout.php">Log Out</a></li></ul>
        </div>
    </div> 
        <table class="members_table">           
            <tr>
        <?php
             
     
        $result = mysqli_query($conn, "SELECT * FROM oem_fleet WHERE companyname='$companyname001'");
        $loop_count = 1;

        while ($row = mysqli_fetch_assoc($result)) { 
            // Display member information within a <td>
            echo '<td>';
            echo '<div class="viewfleet_outer">';
            echo '<div class="fleetcard">';
            echo '<img src="viewfleet_bg.png">';  
            // echo '<h2 class="fontasset"><b>' . $row['assetcode'] . '</b></h2>';
            echo '</div>';
            echo '<div class="content">';
            // echo '<p>‣ Assetcode:' . $row['assetcode'] . '</p>';
            echo '<p>‣ Model:' . $row['model'] . '</p>';
            echo '<p>‣ Type:' . $row['fleet_type'] . '</p>';
            echo '<p>‣ Capacity:' . $row['capacity'] . '</p>';


            // echo '<p>‣ Registration:' . $row['registration'] . '</p>';
            // echo '<p>‣ Operator:' . $row['operator_fname'] . '</p>';

            // echo '<p>‣ Status:' . $row['status'] . '</p>';
            echo'</div>';

            echo'<div class="btn01">';
            echo '<div class="viewbtn">';
            echo "
            <a class='btn' href='crane_fullspecs.php?id=" . $row['sno'] .  "'>View </a>
            </div>";
            echo '<div class="delbtn">';
            echo "
            <a class='btn' href='delete_oem.php?id=" . $row['sno'] .  "'>Delete </a>
            </div>";

            echo '</div>';
            echo'</div>';
            
            echo '</div>';
            echo'<br>';

           
            echo '</div>';
            echo '<br>';
            
           
            

            // Create a new row after every 5 members
            if ($loop_count > 0 && $loop_count % 3 == 0) {
                echo '</tr><tr>';
            }

            $loop_count++;
        }
        ?>
    </tr>
</table>

</body>
</html>