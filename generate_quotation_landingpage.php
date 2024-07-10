<?php
include_once 'partials/_dbconnect.php';
session_start();
$companyname001 = $_SESSION['companyname'];

$sql = "SELECT * FROM `quotation_generated` where company_name='$companyname001'";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Generate Quotation</title>  
<link rel="stylesheet" href="style.css"> 
<link rel="stylesheet" href="tiles.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
<style>

body {
  margin: 0;
  padding: 0;
}

.quotation-table-container {
  padding: 20px; 
}

.quotation-table {
  width: 100%;
  border-collapse: collapse;
  margin-top: 20px;
  margin: 0 auto; 
  padding: 10px; 
}


.quotation-table, .quotation-table th, .quotation-table td {
  border: 1px solid black!important; 
}

.quotation-table th, .quotation-table td {
  padding: 8px!important;
  text-align: left!important;
}  

.quotation-table .table-heading { 
    background-color: #4067B5!important; 
    color: white!important;
}

.generate-btn-container {
  display: flex!important;
  justify-content: space-between!important;
  align-items: center!important;
  margin-bottom: 20px!important;
}

.generate-btn {
  background-color: white!important;
  color: white!important;
  border: none!important;
  border-radius: 4px!important;
  padding: 10px 20px!important;
  cursor: pointer!important;
} 

.article-wrapper{ 
    width:288px!important; 
    height:68px;
}

.quotation-icon { 
  background-color:#B4C5E4; 
  color:black; 
  border: 1px; 
  border-radius:5px; 
  width: 22px; /* Set width for the icon */
  height: 22px; /* Set height for the icon */
  display: inline-block; /* Ensure icon width and height are respected */
  text-align: center; /* Center icon within its container */
  line-height: 22px; /* Ensure icon is vertically centered */
}

@media screen and (max-width: 600px) {
  .quotation-table {
    border: 0;
  }
  .quotation-table thead {
    display: none;
  }
  .quotation-table tr {
    border-bottom: 1px solid black;
    display: block;
    margin-bottom: 10px;
  }
  .quotation-table td {
    border-bottom: none;
    display: flex;
    flex-direction: column;
    justify-content: center;
    padding: 10px 0;
  }
  .quotation-table td:before {
    content: attr(data-label);
    float: left;
    font-weight: bold;
    text-transform: uppercase;
  }
  .generate-btn-container {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 10px;
  }
  .generate-btn-container h2 {
    margin: 0;
  }
  .generate-btn {
    margin-left: auto;
    padding: 8px 16px;
    background-color: #007bff;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
  }
}
</style>

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

<div class="quotation-table-container">
  <div class="generate-btn-container">
    <h2>Submitted Quotation</h2>
    <button class="generate-btn"> 
    <article class="article-wrapper" onclick="location.href='generate_quotation.php'" > 
  <div class="rounded-lg container-projectss ">
    </div>
    <div class="project-info">
      <div class="flex-pr">
        <div class="project-title text-nowrap">Generate  Quotations</div>
          <div class="project-hover">
            <svg style="color: black;" xmlns="http://www.w3.org/2000/svg" width="2em" height="2em" color="black" stroke-linejoin="round" stroke-linecap="round" viewBox="0 0 24 24" stroke-width="2" fill="none" stroke="currentColor"><line y2="12" x2="19" y1="12" x1="5"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
            </div>
          </div>
          <div class="types">
        </div>
    </div>
</article>
    </button>
  </div>


  <table class="quotation-table">
  <thead>
    <tr>
      <th class="table-heading">Date</th>
      <th class="table-heading">Ref No</th>
      <th class="table-heading">To</th>
      <th class="table-heading">Asset Code</th>
      <th class="table-heading">Equipment</th>
      <th class="table-heading">Capacity</th>
      <th class="table-heading">Duration</th>
      <th class="table-heading">Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php
    // Assuming $result is your MySQL query result
    while ($row = mysqli_fetch_assoc($result)) {
      ?>
      <tr>
        <td data-label="Date"><?php echo date('d-m-Y', strtotime($row['quote_date'])); ?></td>
        <td data-label="Ref No"><?php echo substr($row['quote_date'], 0, 4); ?> / <?php echo $row['sno'] ?></td>
        <td data-label="To"><?php echo $row['to_name'] ?></td>
        <td data-label="Asset Code"><?php echo $row['asset_code'] ?></td>
        <td data-label="Equipment"><?php echo $row['make'] . " " . $row['model']; ?></td>
        <td data-label="Capacity"><?php echo $row['cap'] . " " . $row['cap_unit']; ?></td>
        <td data-label="Duration"><?php echo $row['hours_duration'] ?> Hours + <?php echo $row['days_duration'] ?> Days (<?php echo $row['sunday_included'] ?>)</td>
        <td data-label="Actions">
          <a href="edit_quotation.php?quote_id=<?php echo $row['sno']; ?>" class="quotation-icon"> <i style="width: 22px; height: 22px;" class="bi bi-pencil"></i></a>
          <a href="delete_quotation.php?del_id=<?php echo $row['sno']; ?>" class="quotation-icon"><i style="width: 22px; height: 22px;" class="bi bi-trash"></i></a>
          <a href="view_quotation.php?quote_id=<?php echo $row['sno']; ?>" class="quotation-icon"><i style="width: 22px; height: 22px;" class="bi bi-file-text"></i></a>
        </td>
      </tr>
    <?php
    }
    ?>
  </tbody>
</table>

</body>
</html>
