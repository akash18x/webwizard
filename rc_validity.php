<?php
include_once 'partials/_dbconnect.php'; // Include the database connection file
// session_start();
$companyname001 = $_SESSION['companyname'];

$sql = "SELECT * FROM fleet1 WHERE companyname='$companyname001'";
$result = mysqli_query($conn, $sql);

$notificationThreshold = 7; // Threshold for notification (e.g., 7 days before expiry)

while ($row = mysqli_fetch_assoc($result)) {
    // echo "Insurance Validity: " . $row['insaurance_valid'] . "<br>";

    $expiryDate = strtotime($row['rc_valid']);
    $currentDate = time();
    $daysUntilExpiry = floor(($expiryDate - $currentDate) / (60 * 60 * 24));

    // Check if expiry is near
    if ($daysUntilExpiry <= $notificationThreshold) {
        // echo "Expiry Date of Asset Code " . $row['assetcode'] . " is Near: $daysUntilExpiry days left<br>";
        include_once 'partials/_dbconnect.php'; // Include the database connection file
        if(!empty($row['rc_valid'])){

        $sql_expiry_notification="INSERT  INTO `insaurance_notification` (`document_expiring`,`valid_till`, `company_name`,
         `days_left`, `asset_code`)
         VALUES ('Registration certificate','". $row['rc_valid'] ."', '". $row['companyname'] ."', '$daysUntilExpiry', '". $row['assetcode'] ."')";
        $result_notification=mysqli_query($conn,$sql_expiry_notification);
    }}
}


