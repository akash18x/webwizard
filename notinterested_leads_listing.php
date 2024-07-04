<?php
session_start();
$email = $_SESSION["email"];
$companyname001 = $_SESSION['companyname'];

?>
<?php
include 'partials/_dbconnect.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">      <link rel="icon" href="favicon.jpg" type="image/x-icon">

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    <?php include "style.css"; ?>
  </style>
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
    </div>

    <?php
    include_once 'partials/_dbconnect.php';
    $sql = "SELECT * FROM `notinterested_rental` WHERE `rental_name` = '$companyname001' ORDER BY id DESC";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
    ?>
      <div class="table_head01">
        <p>Not Interested Leads</p>
      </div>
      <table class="my_sell_listing">
        <tr>
          <th>Equipment Type</th>
          <th>Equipment Capacity</th>
          <th>Project Type</th>
          <th>District </th>
          <th>State</th>
          <th>Duration</th>
          <th>Reason</th>
          <th>Action</th>
        </tr>

        <?php
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
            <tr>
              <td><?php echo $row['equipment_type']; ?></td>
              <td><?php echo $row['equipment_capacity']; ?></td>
              <td><?php echo $row['project_type']; ?></td>
              <td><?php echo $row['district']; ?></td>
              <td><?php echo $row['state']; ?></td>
              <td><?php echo $row['duration']; ?></td>
              <td><?php echo $row['not_interested_reason']; ?></td>
              <td><a class='btn_listing' id='' href='view_not_interested_leads_rental.php?id=<?php echo $row['id']; ?>'> View </a></td>

            </tr>
       
      

    <?php
          }
        ?>
              </table>

    <?php
    }
    ?>
    <script>
      function openPopup() {
        document.getElementById("deleteModal").style.display = "block";
      }

      function openPopup1() {
        document.getElementById("soldModel").style.display = "block";
      }

      function confirmSold(id) {
        const soldItem = document.getElementById("sold_platform").value;
        window.location.href = 'sold_items.php?id=' + id + '&soldItem=' + soldItem;
      }
    </script>
  </div>
</body>

</html>