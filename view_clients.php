<?php
include_once 'partials/_dbconnect.php'; // Include the database connection file

session_start();
$companyname001 = $_SESSION['companyname'];

$sql="SELECT * FROM `billing_clients` where added_by='$companyname001'";
$result=mysqli_query($conn , $sql);


?>
<style>
    <?php include "style.css" ?>
</style>

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
            <!-- <li><a href="contact_us.php">Contact Us</a></li> -->
            <li><a href="logout.php">Log Out</a></li></ul>
        </div>
    </div>
    <table class="view_clients">
    <th>Name</th>
        <th>Address</th>
        <th>State</th>
        <th>GST</th>
        <th>Actions</th>

        <?php while($row=mysqli_fetch_assoc($result)){
            ?>
            <tr>
                <td><?php echo $row['name'] ?></td>
                <td><?php echo $row['lane_address1'] ?></td>
                <td><?php echo $row['state'] ?></td>
                <td><?php echo $row['gst'] ?></td>
                <!-- href="delete_clients.php?id=<?php echo $row['id'] ?>" -->
                <td><a href="view_client_full_info.php?id=<?php echo $row['id'] ?>" class="view_clients_button">View</a>  <a onclick="delete_client()" class="view_clients_button">Delete</a></td>
            </tr>
           
            <div id="deleteModal" class="modal_client">
                <div class="del_client_container">
                <div class="confirm_del_client">
                    <p>Confirm Delete?</p>
                    <div class="btn_set"><a href="delete_clients.php?id=<?php echo $row['id'] ?>" class="del_client_confirm" >Delete</a><a href="view_clients.php" class="del_client_confirm" id="cancel_client">Cancel</a>
</div>
                </div>
                </div>
</div> 
           <?php
        } ?>
    </table> 
<script>
    function delete_client(){
        const deleteModal=document.getElementById("deleteModal").style.display="block";
    }
</script>
</body>
</html>