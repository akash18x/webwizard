<?php
include_once 'partials/_dbconnect.php'; // Include the database connection file
session_start();
// $email = $_SESSION["email"];
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
    <meta charset="UTF-8">      <link rel="icon" href="favicon.jpg" type="image/x-icon">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
<div class="navbar1">
        <div class="iconcontainer">
        <ul><li><a href="sign_in.php">Home</a></li>
            <li><a href="about_us.html">About Us</a></li>
            <li><a href="contact_us.php">Contact Us</a></li>
            <li><a href="logout.php">Log Out</a></li></ul>
        </div>
    </div>
    <?php
    include_once 'partials/_dbconnect.php'; // Include the database connection file

$result = mysqli_query($conn, "SELECT * FROM `logi_price_quoted` where `logistic_company_name`='$companyname001'");
if(mysqli_num_rows($result) > 0) {
    // Display the data in a table
    echo '<table class="purchase_table">';
    echo '<tr><th>Company Name</th><th>Email Id</th><th>Material Detail</th><th>Trailor Type</th><th>Weight</th><th>Length</th><th>Width</th><th>Height</th><th>From</th><th>To</th><th>Quoted Price</th><th>Action</th></tr>';
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<tr>';
        echo '<td>' . $row['requirement_company_name'] . '</td>';
        echo '<td>' . $row['requirement_company_email'] . '</td>';
        echo '<td>' . $row['material_detail'] . '</td>';
        echo '<td>' . $row['trailor_type'] . '</td>';
        echo '<td>' . $row['weight'] . '</td>';
        echo '<td>' . $row['length'] . '</td>';
        echo '<td>' . $row['width'] . '</td>';
        echo '<td>' . $row['height'] . '</td>';
        echo '<td>' . $row['from_location'] . '</td>';
        echo '<td>' . $row['to_location'] . '</td>';
        echo '<td>' . $row['quote_price'] . '</td>';


        ?>
       <td>
        <a class='btn_listing' href='edit_quoted_price_logi.php?id=<?php echo $row['id']; ?>'> Edit Price</a>
    </td>;
        <?php
        echo '</tr>';
    }

    echo '</table>';

}
?>

        
</body>
</html>