<?php
include_once 'partials/_dbconnect.php';

if(isset($_POST['submit']) && isset($_FILES['letterhead']))
{
    $companylogo = $_FILES['letterhead']['name'];
    $temp_file_path = $_FILES['letterhead']['tmp_name'];
    $folder1 = 'img/' . $companylogo;

    move_uploaded_file($temp_file_path, $folder1);

    $sql_insertion = "INSERT INTO `quotation_generated` (`letterhead_logo`) VALUES ('$companylogo')";
    $result = mysqli_query($conn, $sql_insertion);
    if($result) {
        echo "File uploaded and data inserted successfully.";
    } else {
        echo "Error inserting data: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">      <link rel="icon" href="favicon.jpg" type="image/x-icon">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="test1.php" method="POST" enctype="multipart/form-data">
        <div class="trial1">
            <input type="file" name="letterhead" class="input02">
            <label for="" class="placeholder2">Scanned Company Letterhead Heading</label>
        </div>
        <button type="submit" name="submit">Submit</button>
    </form>
</body>
</html>