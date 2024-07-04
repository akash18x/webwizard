<?php
include_once 'partials/_dbconnect.php'; // Include the database connection file
$sql="SELECT * FROM `closed_requirement_epc_latest` ORDER BY id DESC";
$result=mysqli_query($conn,$sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">      <link rel="icon" href="favicon.jpg" type="image/x-icon">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">

    <title>Document</title>
    <style><?php include "style.css" ?></style>
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
<table class="closed_requirements">
    <th>Equipment Type</th>
    <th>Equipment Capacity</th>
    <th>Project Type</th>
    <th>Duration</th>
    <th>State</th>
    <th>Action</th>
    <?php while($row=mysqli_fetch_assoc($result)){
?>
<tr>
    <td><?php echo $row['equipment_type'] ?></td>
    <td><?php echo $row['equipment_capacity'] ?></td>
    <td><?php echo $row['project_type'] ?></td>
    <td><?php echo $row['duration_month'] ?></td>
    <td><?php echo $row['state'] ?></td>
    <td><a href="view_closedrequirement_full.php?id=<?php echo $row['id']; ?>" class="View_closed_requirement">View</a></td>

</tr>

<?php
    } ?>
</table>
</body>
</html>