<?php
include_once 'partials/_dbconnect.php'; // Include the database connection file
session_start();
$companyname001 = $_SESSION['companyname'];
?>

<style>
  <?php include "style.css" ?>
</style>
<script>
  <?php include "main.js" ?>
</script>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="favicon.jpg" type="image/x-icon">
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
include_once 'partials/_dbconnect.php'; // Include the database connection file

$result = mysqli_query($conn, "SELECT * FROM `requirement_price_byrental` where `rental_name`='$companyname001' order by id desc");
if(mysqli_num_rows($result) > 0) {
    // Display the data in a table
    echo '<table class="purchase_table">';
    echo '<tr><th>EPC Company Name</th><th>EPC Email Id</th><th>EPC Contact</th><th>Equipment Type</th><th>Project Type</th><th>State</th><th>District</th><th>Duration</th><th>Working Shift</th><th>Price Quoted</th><th>Action</th></tr>';
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<tr>';
        echo '<td>' . $row['epc_name'] . '</td>';
        echo '<td>' . $row['epc_email'] . '</td>';
        echo '<td>' . $row['epc_number'] . '</td>';
        echo '<td>' . $row['type'] . '</td>';
        echo '<td>' . $row['project_type'] . '</td>';
        echo '<td>' . $row['state'] . '</td>';
        echo '<td>' . $row['district'] . '</td>';
        echo '<td>' . $row['duration'] . '</td>';
        echo '<td>' . $row['working_shift'] . '</td>';
        echo '<td>' . $row['price_quoted'] . '</td>';
        ?>
        <td>
            <a class='btn_listing' href='edit_rental_price.php?id=<?php echo $row['id']; ?>'>Edit Price</a>
        </td>
        <?php
        echo '</tr>';
    }
    echo '</table>';
}
?>

</body>
</html>
