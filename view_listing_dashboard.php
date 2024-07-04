<?php
session_start();
$email = $_SESSION["email"];
$companyname001 = $_SESSION['companyname'];

?>

<style>
  <?php include "style.css" 
  ?>
</style>
<?php
include 'partials/_dbconnect.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">      <link rel="icon" href="favicon.jpg" type="image/x-icon">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>

   <link rel="stylesheet" href="style.css">
    <title>Document</title>
    <style>
        .center-block {
            height: 300px;
            /* border: 2px solid blue; */
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
    <div class="outercard">
            <div class="card_container_purchase">
            <div class="button-52" onclick="location.href='view_listing.php'" >Active Listings</div>
            <div class="button-52" onclick="location.href='viewsold.php'" >Sold Listings</div>
        </div> 
        <div class="chartdatacontainer_sellingfleet"   >
    <div class="container123" style="width: 40%; height: 300px;">
            <div id="container" class="center-block"></div>
        </div>

        <div class="containernew" style="width: 40%; height: 300px;">
            <div id="containernew" class="center-block"></div>
        </div>


    </div>

    <?php
    include 'partials/_dbconnect.php';

    $query = "SELECT sold_platform, COUNT(*) as count FROM `sold` where companyname='$companyname001' GROUP BY sold_platform ";
    $getData = $conn->query($query);

    
    $query1 = "SELECT companyname, COUNT(*) as count FROM `images`  where companyname='$companyname001' GROUP BY companyname ";
    $getData1 = $conn->query($query1);
    ?>

    

    <script>
        // Build the chart
        Highcharts.chart('container', {
            credits: {
                enabled: false
            },
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'Sold Through Statistics:'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.y}</b>',
                valueSuffix: ' Sold'
            },
            accessibility: {
                point: {
                    valueSuffix: 'Sold'
                }
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: false
                    },
                    showInLegend: true
                }
            },
            series: [{
                name: 'Count',
                colorByPoint: true,
                data: [
                    <?php
                    $data = '';
                    if ($getData->num_rows > 0) {
                        while ($row = $getData->fetch_assoc()) {
                            $data .= '{ name: "' . $row['sold_platform'] . '", y: ' . $row['count'] . ' },';
                        }
                    }
                    echo $data;
                    ?>
                ]
            }]
        });

        
    // Build the chart
    Highcharts.chart('containernew', {
        credits: {
                enabled: false
            },
        chart: {
            type: 'bar'
        },
        title: {
            text: 'Listing Statistics'
        },
        xAxis: {
            type: 'category',
            title: {
                text: ''
            }
        },
        yAxis: {
            title: {
                text: 'Count'
            },
            min: 0,
            tickInterval: 1
        },
        series: [{
            name: 'Active Listings',
            data: [
                <?php
                if ($getData1->num_rows > 0) {
                    while ($row = $getData1->fetch_assoc()) {
                        echo "['" . $row['companyname'] . "', " . $row['count'] . "],";
                    }
                }
                ?>
            ]
        }]
    });        
    </script>     
</body>
</html>