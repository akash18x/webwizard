<?php
include_once 'partials/_dbconnect.php';
session_start();
$companyname001 = $_SESSION['companyname'];

$sql="SELECT * FROM `quotation_generated` where company_name='$companyname001'";
$result=mysqli_query($conn , $sql);
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
        <ul><li><a href="rental_dashboard.php">Dashboard</a></li>
            <li><a href="view_news.php">News</a></li>
            <!-- <li><a href="contact_us.php">Contact Us</a></li> -->
            <li><a href="logout.php">Log Out</a></li></ul>
        </div>
</div> 
<div class="outercard">
            <div class="card_container_purchase">
            <div class="button-52" onclick="location.href='generate_quotation.php'" >Generate Quotation</div>
            <!-- <div class="button-52" onclick="location.href='rental_generated_quotation.php'" >View My Quotation</div> -->
            <!-- <div class="button-52" onclick="location.href='generate_bill.php'" >Generate bill</div>
            <div class="button-52" onclick="location.href='view_print_bills.php'" >View Generated bill</div>
            <div class="button-52" onclick="location.href='#'" >View Statistics</div> -->
        </div>

<p class="submit_quote_para">Submitted Quotation</p>
<table class="view_my_quotation">
    <th>Date</th>
    <th>Ref No</th>
    <th>To</th>
    <th>Asset Code</th>
    <th>Equipment</th>
<th>Capacity</th>
    <th>Duration</th>
    <th>Actions</th>
    <?php
    while($row=mysqli_fetch_assoc($result)){
        ?>
        <tr>
        <td><?php echo date('d-m-Y', strtotime($row['quote_date'])); ?></td>
            <td><?php echo substr($row['quote_date'], 0, 4);  ?> / <?php echo $row['sno'] ?></td>
            <td><?php echo $row['to_name'] ?></td>
            <td><?php echo $row['asset_code'] ?></td>
            <td><?php echo $row['make'] . " " . $row['model']; ?></td>
            <td><?php echo $row['cap'] . " " . $row['cap_unit']; ?></td>
            <td><?php echo $row['hours_duration'] ?> Hours + <?php echo $row['days_duration'] ?> Days (<?php echo $row['sunday_included'] ?>)</td>
            <td>
            <a href="edit_quotation.php?quote_id=<?php echo $row['sno']; ?>" class="quote_btn">Edit</a>    
            <a href="delete_quotation.php?del_id=<?php echo $row['sno']; ?>" class="quote_btn">Delete</a>
             <a href="view_quotation.php?quote_id=<?php echo $row['sno']; ?>" class="quote_btn">View & Print</a>
             </td>

            </td>
        </tr>
        <?php
    }
    ?>
</table>

</body>
</html>