<?php
session_start();
$email = $_SESSION["email"];
$companyname001 = $_SESSION['companyname'];

?>
<?php
include 'partials/_dbconnect.php';

?>
<?php
// Include your database connection file
include 'partials/_dbconnect.php';

if(isset($_GET['id'])) {
    $soldId = $_GET['id'];
    $sold_platform=$_GET['soldItem'];

    // Select the record from images table
    $selectQuery = "SELECT * FROM images WHERE id = $soldId";
    $result = mysqli_query($conn, $selectQuery);

    if(mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        // Insert the record into the sold table
       $insertQuery=" INSERT INTO `sold` (`sold_platform`, `companyname`,`category`,`sub_type`, `kmr`, `hmr`, `email`, `price`, `contact_no`,
        `model`, `make`, `capacity`, `yom`, `location`, `boomlength`, `jiblength`,
         `luffinglength`, `description`,`front_pic`,`left_side_pic`,`right_side_pic`)
         VALUES ('$sold_platform','$companyname001','".$row['category']."', '".$row['sub_type']."', '".$row['kmr']."', '".$row['hmr']."', '$email', '".$row['price']."', '".$row['contact_no']."',
          '".$row['model']."', '".$row['make']."', '".$row['capacity']."', '".$row['yom']."', '".$row['location']."', '".$row['boomlength']."', '".$row['jiblength']."', '".$row['luffinglength']."', '".$row['description']."','".$row['front_pic']."','".$row['left_side_pic']."','".$row['right_side_pic']."')";
        // $insertQuery = "INSERT INTO sold (email,type, capacity, yom, description, price) 
        //                 VALUES ('$email' , '".$row['type']."', '".$row['capacity']."', '".$row['yom']."', '".$row['description']."', '".$row['price']."')";
        if (mysqli_query($conn, $insertQuery)) {
            // Delete the record from images table
            $deleteQuery = "DELETE FROM images WHERE id = $soldId";
            if (mysqli_query($conn, $deleteQuery)) {
                echo "Record deleted successfully and moved to sold table.";
            } else {
                echo "Error deleting record: " . mysqli_error($conn);
            }
        } else {
            echo "Error inserting into sold table: " . mysqli_error($conn);
        }
    } else {
        echo "Record not found.";
    }
} else {
    echo "Invalid id provided.";
}

// Redirect back to the original page or success page
header('Location: view_listing.php');
exit;
?>