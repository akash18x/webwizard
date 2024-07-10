<?php
include 'partials/_dbconnect.php';
session_start();
$email = $_SESSION['email'];
$companyname001 = $_SESSION['companyname'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="favicon.jpg" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
    <style>
        <?php include "style.css" ?>
    </style>
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
if (isset($_SESSION['success_msg'])) {
    echo '<label>
        <input type="checkbox" class="alertCheckbox" autocomplete="off" />
        <div class="alert notice">
          <span class="alertClose">X</span>
          <span class="alertText">Listing Added To Not Interested
              <br class="clear"/></span>
        </div>
      </label>';
    unset($_SESSION['success_msg']); // Unset the session after displaying the message
}
?>

<?php
include_once 'partials/_dbconnect.php'; // Include the database connection file
// SELECT * FROM `req_by_epc` order by `id` desc
$result = mysqli_query($conn, "SELECT * FROM `req_by_epc` WHERE id NOT IN (SELECT requirement_id FROM `notinterested_rental` WHERE rental_name = '$companyname001') AND id NOT IN (SELECT req_id FROM `requirement_price_byrental` WHERE rental_name = '$companyname001') ORDER BY `id` DESC");

if (mysqli_num_rows($result) > 0) {
    echo '<table class="myreq_epc">';
    echo '<tr><th>Company Name</th><th>Equipment Type</th><th>Equipment Capacity</th><th>District</th><th>State</th><th>Duration</th><th>Working Shift</th><th>Actions</th></tr>';
    
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<tr>';
        echo '<td>' . $row['epc_name'] . '</td>';
        echo '<td>' . $row['equipment_type'] . '</td>';
        echo '<td>' . $row['equipment_capacity'] . " " . $row['unit'] . '</td>';
        echo '<td>' . $row['district'] . '</td>';
        echo '<td>' . $row['state'] . '</td>';
        echo '<td>' . $row['duration_month'] . '</td>';
        echo '<td>' . $row['working_shift'] . '</td>';
        echo '<td>
                  <a class="btn_listing" id="Quotepricebutton" href="view_quoteprice_rental.php?id=' . $row['id'] . '">View & Quote Price</a>
              </td>';
        echo '</tr>';
    }
    echo '</table>';
}
?>

<div class="info" id='notinterested' style="display: none;">
    <div class="notinterested_content">
        <div class="trial1">
            <select name="" id="notinterested_reason" class="input02" required>
                <option value="" disabled selected>Select A Reason</option>
                <option value="Equipment Not Available">Equipment Not Available</option>
                <option value="Non Serviceable Area">Non Serviceable Area</option>
                <option value="Rental Period Is Short">Rental Period Is Short</option>
                <option value="Client Issue">Client Issue</option>
                <option value="Other Reason">Other Reason</option>
            </select>
        </div>
        <div class="button_notinterested">
            <a class="btn_listing" onclick="notinterested_Reasson(<?php echo $row['id']; ?>)">Confirm Not Interested</a>
            <a class="btn_listing" href="view_req_rentalinner.php">Cancel</a>
        </div>
    </div>
</div>

<script>
    function notinterested() {
        const box = document.getElementById("notinterested");
        box.style.display = 'block';
    }

    function notinterested_Reasson(id) {
        const dropdown_reason = document.getElementById("notinterested_reason").value;
        window.location.href = 'notinterested.php?id=' + id + '&reasons=' + dropdown_reason;
    }
</script>

</body>
</html>
