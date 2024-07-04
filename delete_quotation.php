<?php
include_once 'partials/_dbconnect.php'; // Include the database connection file
$id=$_GET['del_id'];
$sql="DELETE FROM `quotation_generated` WHERE `sno`='$id'";
$result=mysqli_query($conn , $sql);
if($result){
    header("location:generate_quotation_landingpage.php");
}