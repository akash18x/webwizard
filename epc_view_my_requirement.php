<?php
include_once 'partials/_dbconnect.php'; // Include the database connection file
session_start();
$companyname001 = $_SESSION['companyname'];

?>
<script>
    <?php include "main.js" ?>
</script>
<style>
  <?php include "style.css" ?>
</style>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">      <link rel="icon" href="favicon.jpg" type="image/x-icon">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="main.js"></script>
    <title>Document</title>
</head>
<body>
<div class="navbar1">
    <div class="iconcontainer">
        <ul>
            <li><a href="epc_dashboard.php">Dashboard</a></li>
            <li><a href="view_news_epc.php">News</a></li>
            <li><a href="logout.php">Log Out</a></li>
        </ul>
    </div>
</div> 
<?php
if (isset($_SESSION['message'])) {
    echo '<label>
<input type="checkbox" class="alertCheckbox" autocomplete="off" />
<div class="alert notice">
  <span class="alertClose">X</span>
  <span class="alertText"><b>Success!</b>Requirement Have Been Closed <a href="#">View Closed Requirement</a>
      <br class="clear"/></span>
</div>
</label>';
unset($_SESSION['message']);
}

?>

<?php
include_once 'partials/_dbconnect.php'; // Include the database connection file

$result = mysqli_query($conn, "SELECT * FROM `req_by_epc` WHERE epc_name= '$companyname001'");
if(mysqli_num_rows($result) > 0) {
    // Display the data in a table
    echo '<table class="myreq_epc">';
    echo '<tr><th>Equipment Type</th><th>Equipment Capacity</th><th>Project Type</th><th>Duration</th><th>State</th><th>District</th><th>Working Shift</th><th>Tentative Date</th><th>Actions</th></tr>';
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<tr>';
        echo '<td>' . $row['equipment_type'] . '</td>';
        echo '<td>' . $row['equipment_capacity'] . '</td>';
        echo '<td>' . $row['project_type'] . '</td>';
        echo '<td>' . $row['duration_month'] . '</td>';
        echo '<td>' . $row['state'] . '</td>';
        echo '<td>' . $row['district'] . '</td>';
        echo '<td>' . $row['working_shift'] . '</td>';
        echo '<td>' . $row['tentative_date'] . '</td>';
        ?>
        <td>
            <a class='btn_listing' href='view_epc_full.php?id=<?php echo $row['id'];?>'> View</a>
            <a class='btn_listing' onclick="close_req_epc(<?php echo $row['id'] ?>)"> Close Requirement</a>
        </td>
        <?php
        echo '</tr>';
        ?>
        <div id="deleteModal_<?php echo $row['id']; ?>" class="modal">
            <div class="modal-content-epc">
                <div class="trial1">
                    <select name="" id="closed_through_<?php echo $row['id']; ?>" class="input02" onchange="show_vendor_list(<?php echo $row['id']; ?>)">
                        <option value="" disable selected>Requirement Closed Through?</option>
                        <option value="Fleet EIP">Fleet EIP</option>
                        <option value="Other Platform">Other Platform</option>
                    </select>
                </div>
                <div class="trial1" id="vendor-list_<?php echo $row['id']; ?>" style="display:none;">
                    <?php
                    // Fetch the company names from the login table
                    $company_query = "SELECT companyname FROM login order by companyname asc"; // Modify this query based on your table structure
                    $company_result = mysqli_query($conn, $company_query);
                    echo '<select name="vendors" id="vendors_' . $row['id'] . '" class="input02">';
                    echo '<option value="none" disabled selected>Choose Vendor</option>';
                    while ($row_vendor = mysqli_fetch_assoc($company_result)) {
                        echo '<option value="' . $row_vendor['companyname'] . '">' . $row_vendor['companyname'] . '</option>';
                    }
                    echo '</select>';
                    ?>
                </div>
                <div class="btn_delete01">
                    <a class='btn_listing' onclick="confirm_close_req(<?php echo $row['id'] ?>)">Confirm Close</a>
                    <a class='btn_listing' href='epc_view_my_requirement.php'>Cancel</a>
                </div>
            </div>
        </div>
        <?php
    }

    echo '</table>';

}
?>
<script>
    function close_req_epc(id) {
        document.getElementById("deleteModal_" + id).style.display = "block";
    }

    function show_vendor_list(id) {
        const req_closed_platform = document.getElementById("closed_through_" + id);
        const vendor = document.getElementById("vendor-list_" + id);
        if (req_closed_platform.value === 'Fleet EIP') {
            vendor.style.display = 'block';
        } else {
            vendor.style.display = 'none';
        }
    }

    function confirm_close_req(id) {
        const value_platform = document.getElementById("closed_through_" + id).value;
        const vendor_name = document.getElementById("vendors_" + id).value;

        window.location.href = "closed_req_epc.php?id=" + id + "&platform=" + value_platform + "&vendor=" + vendor_name;
    }
</script>

</body>
</html>
