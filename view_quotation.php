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
    <div class="ref">Ref No:<?php echo $companyname001 ?> / <?php echo substr($row['quote_date'], 0, 4);  ?> / <?php echo $row['sno'] ?></div>

   
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
            <th class="duration_th">For Fixed <?php echo $row['hours_duration'] ?> Hours + <?php echo $row['days_duration'] ?> Days in month <?php echo $row['sunday_included'] ?></th>
            <th>Equipment Details</th>
            
            <tr>
                <td><?php echo $row['sub_Type'] . " / " . $row['make'] . " / " . $row['model']; ?></td>
                <td class="duration_td" style="border: none;"><p>Rental Charges: RS <?php echo $row['rental_charges'] ?>/- per month</p>
                <p>Mob Charges: RS <?php echo $row['mob_charges'] ?>/- one time</p>
                <p>Demob Charges: RS <?php echo $row['demob_charges'] ?>/- one time </p>
            </td>
                <td class="equipment_details_td">
                <p><a class="equip_boom" <?php echo empty($row['boom']) ? 'hidden' : ''; ?>>Boom: <?php echo $row['boom'] ?>mtrs |</a><a <?php echo empty($row['luffing']) ? 'hidden' : ''; ?> >Luffing:-<?php echo $row['luffing'] ?>mtrs|</a><a <?php echo empty($row['jib']) ? 'hidden' : ''; ?>> Jib:-<?php echo $row['jib'] ?>mtrs</a></p>
                <p>Cap <?php echo $row['cap'] . " " . $row['cap_unit']; ?> | Fuel: <?php echo $row['fuel/hour'] ?>ltrs/hour | Adblue:<?php echo $row['adblue'] ?> </p>
                <p>Location: <?php echo $row['crane_location'] ?> | YOM:<?php echo substr($row['yom'], 0, 4); ?></p>
                <p>Availability:-<?php echo $row['availability'] ?></p>
                <p <?php if($row['tentative_date']==='none'){ echo 'hidden';} ?>>Tentative Date:-<?php echo $row['tentative_date'] ?></p>


                </td>
            </tr>

        </table>
        <div class="withregard_section">
            <p>Thanks And Regards</p>
            <p class="sender_name"><?php echo $row['sender_name'] ?></p>
            <p class="sender_name"><?php echo $row['company_name'] ?></p>
            <p><?php echo $row['sender_number'] ?></p>
            <p><?php echo $row['sender_contact'] ?> </p>
            <p class="sender_office_address"><?php echo $row['sender_office_address'] ?></p>
        </div>
    </div><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <div class="terms">


 
<p class="heading_terms">Terms & Conditions :

</p>


<p class="terms_condition">
    <strong>Period Of Contract :</strong> Minimum Order Shall Be <?php echo $row['period_contract'] ?> 
</p>

<p class="terms_condition">
    <strong>Advance Payment :</strong> <?php echo $row['adv_pay'] ?>
</p>

<p class="terms_condition">
    <strong>Operating Crew :</strong> <?php echo $row['crew'] ?>
</p>

<p class="terms_condition">
    <strong>Operator Room Scope :</strong> <?php echo $row['room'] ?>
</p>

<p class="terms_condition">
    <strong>Crew Food Scope :</strong>  <?php echo $row['food'] ?>
</p>

<p class="terms_condition">
    <strong>Crew Travelling :</strong> <?php echo $row['travel'] ?> 
</p>

<p class="terms_condition">
    <strong>Breakdown :</strong> 
<?php echo $row['brkdown'] ?>    After free time, breakdown charges to be deducted on pro-rata basis
</p>






<div class="terms_area terms_condition" >
    <strong>Over time payment : </strong><?php echo $row['ot_pay'] ?>
</div>

<p class="terms_condition">
    <strong>Payment Terms :</strong> <?php echo $row['pay_terms'] ?>
   
</p>
<div class="terms_area terms_condition" >
    <strong>Delay payment clause : </strong><?php echo $row['delay_pay'] ?>
                                

</div>


<p class="terms_condition">
    <strong>Equipment Assembly :</strong> 
<?php echo $row['equipment_assembly']?></p>

<p class="terms_condition">
    <strong>TPI Scope :</strong> <?php echo $row['tpi'] ?> </p>

<p class="terms_condition">
    <strong>Safety And Security :</strong> <?php echo $row['safety'] ?>
</p>





<div class="terms_area terms_condition" >
    <strong>Tools & Tackles :</strong>  <?php echo $row['tools'] ?>                                

</div>



<div class="terms_area terms_condition" >
    <strong>GST :</strong> <?php echo $row['gst'] ?>
</div>

<div class="terms_area terms_condition" >
    <strong>Force Majeure clause :</strong><?php echo $row['force_clause'] ?>
</div>


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
        html2canvas:  { dpi: 290, letterRendering: true },
        jsPDF:        { unit: 'in', format: 'letter', orientation: 'portrait' }
    });
}
</script>

</html>