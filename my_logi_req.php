<?php
include_once 'partials/_dbconnect.php';
session_start();
$companyname001 = $_SESSION['companyname'];
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
                <li><a href="logout.php">Log Out</a></li>
            </ul>
        </div>
    </div>

    <?php
    include_once 'partials/_dbconnect.php';

    $result = mysqli_query($conn, "SELECT * FROM `logistics_need` WHERE companyname_need_generator= '$companyname001'");
    if(mysqli_num_rows($result) > 0) {
        echo '<table class="purchase_table">';
        echo '<tr>
                <th>Material Detail</th>
                <th>Number Of Trailor Required</th>
                <th>Length</th>
                <th>Width</th>
                <th>Height</th>
                <th>Weight</th>
                <th>From</th>
                <th>To</th>
                <th>Actions</th>
              </tr>';

        while ($row = mysqli_fetch_assoc($result)) {
            echo '<tr>';
            echo '<td>' . $row['material_detail'] . '</td>';
            echo '<td>' . $row['number_of_trailor'] . '</td>';
            echo '<td>' . $row['length1'] . '</td>';
            echo '<td>' . $row['width1'] . '</td>';
            echo '<td>' . $row['height1'] . '</td>';
            echo '<td>' . $row['weight1'] . '</td>';
            echo '<td>' . $row['from'] . '</td>';
            echo '<td>' . $row['to'] . '</td>';
            echo '<td><a class="btn_listing" href="del_logi_requirements.php?id=' . $row['id'] . '">Close Requirement</a></td>';
            echo '</tr>';
        }

        echo '</table>';
    }
    ?>
</body>
</html>