<?php
include_once 'partials/_dbconnect.php';

$soldid=$_GET['id'];

$sql_check="SELECT * FROM `sold` WHERE `id`='$soldid'";
$result=mysqli_query($conn , $sql_check);
$row=mysqli_fetch_assoc($result);
?>

<style>
    <?php include "style.css"; ?>
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
        <li><a href="logout.php">Log Out</a></li>
      </ul>
    </div>
    <form action="" class="sellcrane">
    <div class="sellcrane-container">
	<div class="sellcrane_heading"><h2>Sold Crane</h2></div>

        <!-- <div class="soldinner"> -->
            <div class="trial1">
                <input type="text" placeholder="" class="input02" value="<?php echo $row['category'] ?>" readonly>
                <label class="placeholder2">Category</label>
            </div>
            <div class="trial1">
                <input type="text" placeholder="" class="input02" value="<?php echo $row['sub_type'] ?>" readonly>
                <label class="placeholder2">Sub Type</label>
            </div>
            <div class="trial1">
        <input type="text" class="input02" placeholder="" value="<?php echo $row['make'] ?>" name="make">
		<label class="placeholder2">Make</label>
		</div>
		<div class="trial1">
		<input type="text" class="input02" placeholder="" value="<?php echo $row['model'] ?>" name="model">
		<label class="placeholder2">Model</label>
		</div>
		<div class="trial1">
		<input type="text" class="input02" placeholder="" value="<?php echo $row['capacity'] ?>" name="capacity">
		<label class="placeholder2">Capacity</label>
		</div>
		<div class="trial1">
		<input type="text" class="input02" placeholder=""  value="<?php echo $row['kmr'] ?>" name="kmr">
		<label class="placeholder2">KMR</label>
		</div><div class="trial1">
		<input type="text" class="input02" placeholder="" value="<?php echo $row['hmr'] ?>" name="hmr">
		<label class="placeholder2">HMR</label>
		</div>
		<div class="trial1">
		<input type="text" class="input02" placeholder="" value="<?php echo $row['yom'] ?>" name=yom>
		<label class="placeholder2">YOM</label>
		</div>
		<div class="trial1">
		<input type="text" class="input02" placeholder="" value="<?php echo $row['location'] ?>" name="location">
		<label class="placeholder2">Location</label>
		</div>
		<div class="trial1">
		<input type="text" class="input02" placeholder="" value="<?php echo $row['boomlength'] ?>" name="boom_length">
		<label class="placeholder2">Boom Lenght</label>
		</div>
		<div class="trial1">
		<input type="text" class="input02" placeholder="" value="<?php echo $row['jiblength'] ?>" name=jib_length>
		<label class="placeholder2">Jib Lenght</label>
		</div>
		<div class="trial1">
		<input type="text" class="input02" placeholder="" value="<?php echo $row['luffinglength'] ?>" name="luffing_length">
		<label class="placeholder2">Luffing Lenght</label>
		</div>
		<div class="trial1">
		<input type="text" class="input02" placeholder="" value="<?php echo $row['description'] ?>" name="crane_desc">
		<label class="placeholder2">Crane Description</label>
		</div>
		<div class="trial1">
		<input type="text" class="input02" placeholder="" value="<?php echo $row['price'] ?>" name="price">
		<label class="placeholder2">Price </label>
		</div><div class="trial1">
		<input type="text" class="input02" placeholder="" value="<?php echo $row['contact_no'] ?>" name="contact_no">
		<label class="placeholder2">Contact Number</label>
		</div>
        <?php
        echo '<div class="trial123">';
        echo '<h4> Uploaded Images</h4>';
        echo "<img class='first_img input02' src='img/" . $row['front_pic'] . "' >";   
        echo "<img class='first_img input02' src='img/" . $row['left_side_pic'] . "' >";   
        echo "<img class='first_img input02' src='img/" . $row['right_side_pic'] . "' >";   
        echo'</div>';                        
        ?>
        <br><br>
        </div>
    </form>
    <br><br>
</body>
</html>