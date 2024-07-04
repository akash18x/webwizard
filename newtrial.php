<?php

if (isset($_POST['submit'])){
	include_once 'partials/_dbconnect.php'; 
    $editid01 = $_POST['id'];
    // $type01 = $_POST['sell_type'];
	$fleet_Category=$_POST['fleet_category'];
	$fleet_sub_type=$_POST['fleet_sub_type'];
	$make01 = $_POST['make'];
	$model01 = $_POST['model'];
	$capacity01 = $_POST['capacity'];
	$yom01 = $_POST['yom'];
	$location01 = $_POST['location'];
	$boomlength01 = $_POST['boom_length'];
	$jiblength01 = $_POST['jib_length'];
	$luffinglength01 = $_POST['luffing_length'];
	$cranedesc01 = $_POST['crane_desc'];
    $price01 = $_POST['price'];
	$contact_no01 = $_POST['contact_no'];
    $sql="UPDATE `images` SET category=$fleet_Category,sub_Type=$fleet_sub_type ,description='$cranedesc01', price='$price01' , contact_no='$contact_no01' , model='$model01' , make='$make01' , capacity='$capacity01' , yom='$yom01' , location='$location01' , boomlength='$boomlength01' , jiblength='$jiblength01' , luffinglength='$luffinglength01' , type='$type01' where id='$editid01'";
    if (mysqli_query($conn, $sql)) {
    echo "done";
    }
    else{
        echo"not done";
    }

}
?>
