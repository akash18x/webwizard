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

    $result = mysqli_query($conn, "SELECT * FROM `logi_price_quoted` where `requirement_company_name`='$companyname001' ORDER BY id desc");
    if(mysqli_num_rows($result) > 0) {
        echo '<table class="purchase_table">';
        echo '<tr>
                <th>Material Detail</th>
                <th>Trailor Type</th>
                <th>Length</th>
                <th>Width</th>
                <th>Height</th>
                <th>Weight</th>
                <th>From</th>
                <th>To</th>
                <th>Logistic Company Name</th>
                <th>Logistic Company Email</th>
                <th>Logistic Company Number</th>
                <th>Quoted Price</th>
              </tr>';

        while ($row = mysqli_fetch_assoc($result)) {
            echo '<tr>';
            echo '<td>' . $row['material_detail'] . '</td>';
            echo '<td>' . $row['trailor_type'] . '</td>';
            echo '<td>' . $row['length'] . '</td>';
            echo '<td>' . $row['width'] . '</td>';
            echo '<td>' . $row['height'] . '</td>';
            echo '<td>' . $row['weight'] . '</td>';
            echo '<td>' . $row['from_location'] . '</td>';
            echo '<td>' . $row['to_location'] . '</td>';
            echo '<td>' . $row['logistic_company_name'] . '</td>';
            echo '<td>' . $row['logistic_company_email'] . '</td>';
            echo '<td>' . $row['logistic_company_number'] . '</td>';
            echo '<td>' . $row['quote_price'] . '</td>';
            // echo '<td><a class="btn_listing" href="edit_quoted_price_logi.php?id=' . $row['id'] . '">Edit Price</a></td>';
            echo '</tr>';
        }

        echo '</table>';
    }
    ?>
</body>
</html>