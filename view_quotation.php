<?php
include "partials/_dbconnect.php";
session_start();
$email = $_SESSION['email'];
$companyname001 = $_SESSION['companyname'];

$sql_logo_fetch="SELECT * FROM `complete_profile` where companyname='$companyname001'";
$result_fetch_logo=mysqli_query($conn , $sql_logo_fetch);
$row_logo_fetch=mysqli_fetch_assoc($result_fetch_logo);

?>

<?php
include_once 'partials/_dbconnect.php'; // Include the database connection file


$quote_id=$_GET['quote_id'];
$sql="SELECT * FROM `quotation_generated` where `sno`='$quote_id'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);


$sql2ndequipment = "SELECT * FROM `second_vehicle_quotation` WHERE uniqueid='" . $row['uniqueid'] . "'";
$result_second = mysqli_query($conn, $sql2ndequipment);

// Check if there are rows returned
if (mysqli_num_rows($result_second) > 0) {
    // Fetch the first row (assuming uniqueid is unique and returns only one row)
    $row2equipment = mysqli_fetch_assoc($result_second);
    // Process $row2equipment data as needed
} else {
    // Handle case where no rows are returned
    $row2equipment = array(); // Assign an empty array or null, depending on your needs
    // Optionally, you can set default values or perform other actions
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">      <link rel="icon" href="favicon.jpg" type="image/x-icon">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.3/html2pdf.bundle.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.3/html2pdf.bundle.min.js"></script>

    <link rel="stylesheet" href="style.css">
    <style>
        <?php include "style.css" ?>
        </style>
    <title>Document</title>
</head>
    <div class="container_outer">
    <div class="entire_quotation_container">
    <div class="companylogo" style="background-image: url('img/<?php echo ($row_logo_fetch['letter_head']); ?>');"></div>
    <div class="date">Date: <?php echo $row['quote_date'] ?></div>
    <?php $firstThreeLetters = substr($companyname001, 0, 3); ?>
    <div class="ref">Ref No: &nbsp<?php echo $firstThreeLetters ?> / <?php echo substr($row['quote_date'], 0, 4);  ?> / <?php echo $row['sno'] ?></div>

   
    <div class="tocontainer">
            <div class="toadress">To, <p class="sender_name space"><?php echo $row['to_name'] ?></p> <p class="sender_name address_tobe_sent space"><?php echo $row['to_address'] ?></p> </div>

            <div class="to_contactperson sender_name">Contact Person -<?php echo $row['contact_person'] ?> <p class="space">Cell-<?php echo $row['contact_person_cell'] ?></p>
            <p class="space">Email ID : <?php echo $row['email_id_contact_person'] ?></p>
            <p class="space">Site Location : <?php echo $row['site_loc'] ?></p>
        
        </div>
        </div>
        <div class="salutation">
            <p>Dear Sir/Ma'am;</p>
            <p>Please find our proposed offer as below as per your requirement for providing equipment on rental bassis</p>
        </div>
        <table class="table_info">
            <th>Equipment</th>
            <!--  -->
            <th class="duration_th">
    For <?php echo $row['shift_info'] ?> Fixed 
    <?php 
        echo !empty($row['hours_duration']) ? $row['hours_duration'] : $row['engine_hours'];
    ?> Hours + <?php echo $row['days_duration'] ?> Days in month <?php echo $row['sunday_included'] ?>
</th>
            <th>Equipment Details</th>
            
            <tr>
                <td><?php echo $row['sub_Type'] . " / " . $row['make'] . " / " . $row['model']; ?></td>
                <td class="duration_td" style="border: none;"><p>Rental Charges: RS <?php echo number_format($row['rental_charges']); ?>/- per month</p>
                <p>Mob Charges: RS <?php echo number_format($row['mob_charges']); ?>/- one time</p>
                <p>Demob Charges: RS <?php echo number_format($row['demob_charges']) ?>/- one time </p>
            </td>
                <td class="equipment_details_td">
                <p><a class="equip_boom" <?php echo empty($row['boom']) ? 'hidden' : ''; ?>>Boom: <?php echo $row['boom'] ?>mtrs |</a><a <?php echo empty($row['luffing']) ? 'hidden' : ''; ?> >Luffing:-<?php echo $row['luffing'] ?>mtrs|</a><a <?php echo empty($row['jib']) ? 'hidden' : ''; ?>> Jib:-<?php echo $row['jib'] ?>mtrs</a></p>
                <p>Cap <?php echo $row['cap'] . " " . $row['cap_unit']; ?> | Fuel: <?php echo $row['fuel/hour'] ?>ltrs/hour | Adblue:<?php echo $row['adblue'] ?> </p>
                <p>Location: <?php echo $row['crane_location'] ?> | YOM:<?php echo substr($row['yom'], 0, 4); ?></p>
                <p>Availability:-<?php echo $row['availability'] ?></p>
                <p <?php if ($row['tentative_date'] === null || empty($row['tentative_date'])) { echo 'hidden'; } ?>>Tentative Date:-<?php echo $row['tentative_date'] ?></p>


                </td>
            </tr>
<!-- second row -->
<tr class="secondrow_quotation"  <?php if (!isset($row2equipment['sub_type2'])) { echo 'hidden'; } ?>>
                <td><?php echo $row2equipment['sub_type2'] . " / " . $row2equipment['make2'] . " / " . $row2equipment['model2']; ?></td>
                <td class="duration_td" style="border: none;"><p>Rental Charges: RS <?php
if (!empty($row2equipment['rental_charges2'])) {
    echo number_format($row2equipment['rental_charges2']);
}
?>/- per month</p>
                <p>Mob Charges: RS <?php
if (isset($row2equipment['mob_charges2'])) {
    echo number_format( $row2equipment['mob_charges2']);
}
?>
/- one time</p>
                <p>Demob Charges: RS <?php
if (!empty($row2equipment['demob_charges2'])) {
    echo number_format($row2equipment['demob_charges2']);
}
?>/- one time </p>
            </td>
                <td class="equipment_details_td">
                <p><a class="equip_boom" <?php echo empty($row2equipment['boom2']) ? 'hidden' : ''; ?>>Boom: <?php echo $row2equipment['boom2'] ?>mtrs |</a><a <?php echo empty($row2equipment['luffing2']) ? 'hidden' : ''; ?> >Luffing:-<?php echo $row2equipment['luffing2'] ?>mtrs|</a><a <?php echo empty($row2equipment['jib2']) ? 'hidden' : ''; ?>> Jib:-<?php echo $row2equipment['jib2'] ?>mtrs</a></p>
                <p>Cap <?php echo $row2equipment['cap2'] . " " . $row2equipment['cap_unit2']; ?> | Fuel: <?php echo $row2equipment['fuel/hour2'] ?>ltrs/hour | Adblue:<?php echo $row2equipment['adblue2'] ?> </p>
                <p>Location: <?php echo $row2equipment['crane_location2'] ?> | YOM:<?php echo substr($row2equipment['yom2'], 0, 4); ?></p>
                <p>Availability:-<?php echo $row2equipment['availability2'] ?></p>
                <p <?php if(empty($row2equipment['tentative_date2'])) { echo 'hidden'; } ?>>Tentative Date:-<?php echo $row2equipment['tentative_date2'] ?></p>


                </td>
            </tr>
            





        </table>
        <div class="withregard_section">
            <p>Thanks And Regards</p>
            <p class="sender_name"><?php echo $row['sender_name'] ?></p>
            <p class="sender_name"><?php echo $row['company_name'] ?></p>
            <p><?php echo $row['sender_number'] ?></p>
            <p><?php echo $row['sender_contact'] ?> </p>
        </div>
    </div>
    <div class="terms">


 
<p class="heading_terms">Terms & Conditions :

</p>


<p class="terms_condition">
    <strong>1.Period Of Contract :</strong> Minimum Order Shall Be <?php echo $row['period_contract'] ?> 
</p>

<p class="terms_condition">
    <strong>2.Advance Payment :</strong> <?php echo $row['adv_pay'] ?>
</p>

<p class="terms_condition">
    <strong>3.Operating Crew :</strong> <?php echo $row['crew'] ?>
</p>

<p class="terms_condition">
    <strong>4.Operator Room Scope :</strong> <?php echo $row['room'] ?>
</p>

<p class="terms_condition">
    <strong>5.Crew Food Scope :</strong>  <?php echo $row['food'] ?>
</p>

<p class="terms_condition">
    <strong>6.Crew Travelling :</strong> <?php echo $row['travel'] ?> 
</p>

<p class="terms_condition">
    <strong>7.Breakdown :</strong> 
<?php echo $row['brkdown'] ?>    After free time, breakdown charges to be deducted on pro-rata basis
</p>






<div class="terms_area terms_condition" >
    <strong>8.Over time payment : </strong><?php echo $row['ot_pay'] ?>
</div>

<p class="terms_condition">
    <strong>9.Payment Terms :</strong> <?php echo $row['pay_terms'] ?>
   
</p>
<div class="terms_area terms_condition" >
    <strong>10.Delay payment clause : </strong><?php echo $row['delay_pay'] ?>
                                

</div>


<p class="terms_condition">
    <strong>11.Equipment Assembly :</strong> 
<?php echo $row['equipment_assembly']?></p>

<p class="terms_condition">
    <strong>12.TPI Scope :</strong> <?php echo $row['tpi'] ?> </p>

<p class="terms_condition">
    <strong>13.Safety And Security :</strong> <?php echo $row['safety'] ?>
</p>





<div class="terms_area terms_condition" >
    <strong>14.Tools & Tackles :</strong>  <?php echo $row['tools'] ?>                                

</div>



<div class="terms_area terms_condition" >
    <strong>15.GST :</strong> <?php echo $row['gst'] ?>
</div>

<div class="terms_area terms_condition" >
    <strong>16.Force Majeure clause :</strong><?php echo $row['force_clause'] ?>
</div>

<p class="sender_office_address">Office Address: <?php echo $row['sender_office_address'] ?></p>
<p class="watermark">Quotations generated using Fleeteip.</p>
    </div>
</div>
    <br><br>
    <div class="button_container">
    <button class="print_quotation"  type="button" onclick="downloadPDF()">Download Quoatation</button>

    <!-- <BUTTON class="">PRINT</BUTTON> -->

    </div>
    <br><br>
</body>
<script>
function downloadPDF() {
   
    const element = document.querySelector('.container_outer');

    // Perform PDF generation
    html2pdf(element, {
        margin:       0.7,
        filename: '<?php echo $row['to_name'] ?> quotation.pdf',
        image:        { type: 'jpeg', quality: 1.0 },
        html2canvas:  { dpi: 290, letterRendering: true,scale: 3},
        jsPDF:        { unit: 'in', format: 'letter', orientation: 'portrait' }
    });
}
</script>

</html>