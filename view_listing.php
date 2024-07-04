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
    $sql = "SELECT * FROM images WHERE companyname = '$companyname001'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
    ?>
      <div class="table_head01">
        <p>My Listing</p>
      </div>
      <table class="my_sell_listing">
        <tr>
          <th>Category</th>
          <th>Sub Type</th>
          <th>Capacity</th>
          <th>YOM</th>
          <th>Description</th>
          <th>Price</th>
          <th>Actions</th>
        </tr>

        <?php
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
            <tr>
              <td><?php echo $row['category']; ?></td>
              <td><?php echo $row['sub_type']; ?></td>
              <td><?php echo $row['capacity']; ?></td>
              <td><?php echo $row['yom']; ?></td>
              <td><?php echo $row['description']; ?></td>
              <td><?php echo $row['price']; ?></td>
              <td>
                <a class='btn_listing' href='edit_listing.php?id=<?php echo $row['id']; ?>'>Edit</a>
                <a class='btn_listing1' href='javascript:void(0)' onclick='openPopup()'>Delete</a>
                <a class='btn_listing' href='javascript:void(0)' onclick='openPopup1()'>Mark As Sold</a>
              </td>
            </tr>
       
      

    <div id="deleteModal" class="modal">
      <div class="modal-content">
        <h4>Are you sure you want to delete this listing?</h4>
        <div class="btn_delete01">
          <a class='btn_listing' href='delete_listing.php?id=<?php echo $row['id']; ?>'>Confirm Delete</a>
          <a class='btn_listing' href='view_listing.php'>Cancel</a>
        </div>
      </div>
    </div>

    <div id="soldModel" class="modal1">
      <div class="modal-content">
        <select name="sold_platform" id="sold_platform" class="input02" required>
          <option value=""disabled selected>Please Select A Option</option>
          <option value="Listing Sold Through Fleet EIP">Listing Sold Through Fleet EIP</option>
          <option value="Sold Through Other Platform">Sold Through Other Platform</option>
          <option value="Sold Offline">Sold Offline</option>
          <option value="Not Selling Anymore">Not Selling Anymore</option>
        </select>
        
        <div class="btn_delete01">
        <a class='btn_listing' onclick="confirmSold(<?php echo $row['id']; ?>)">Confirm Sold</a>
        <a class='btn_listing' href='view_listing.php'>Cancel</a>
        </div>
      </div>  
    </div>
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