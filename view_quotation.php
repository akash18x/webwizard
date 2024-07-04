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
    <strong>Period Of Contract :</strong> Minimum Order Shall Be 
    <select name="contract_period_select" id="contract_period_select">
        <option value="1">1 Month</option>
        <option value="2">2 Months</option>
        <option value="3">3 Months</option>
        <option value="6">6 Months</option>
        <option value="9">9 Months</option>
        <option value="12">12 Months</option>
        <option value="18">18 Months</option>
        <option value="24">24 Months</option>
    </select>
</p>

<p class="terms_condition">
    <strong>Advance Payment :</strong> 
    <select name="advance_payment_select" id="advance_payment_select">
        <option value="NA">Not Applicable</option>
        <option value="Mobilization">Applicable - Mobilization + Rental Charges</option>
        <option value="Mobilization+Demobilization">Applicable - Mobilization + Rental Charges + Demobilization Charges</option>
    </select>
</p>

<p class="terms_condition">
    <strong>Operating Crew :</strong> 
    <select name="operating_crew_select" id="operating_crew_select">
        <option value="Single Operator">Single Operator</option>
        <option value="Double Operator">Double Operator</option>
        <option value="Single Operator + Helper">Single Operator + Helper</option>
        <option value="Double Operator + Helper">Double Operator + Helper</option>
    </select>
</p>

<p class="terms_condition">
    <strong>Operator Room Scope :</strong> 
    <select name="operator_room_scope_select" id="operator_room_scope_select">
        <option value="NA">Not Applicable</option>
        <option value="Client Scope">In Client Scope</option>
        <option value="Rental Company Scope">In Rental Company Scope</option>
    </select>
</p>

<p class="terms_condition">
    <strong>Crew Food Scope :</strong>  
    <select name="crew_food_scope_select" id="crew_food_scope_select">
        <option value="NA">Not Applicable</option>
        <option value="Client Scope">In Client Scope</option>
        <option value="Rental Company Scope">In Rental Company Scope</option>
    </select>
</p>

<p class="terms_condition">
    <strong>Crew Travelling :</strong>  
    <select name="crew_travelling_select" id="crew_travelling_select">
        <option value="NA">Not Applicable</option>
        <option value="Client Scope">In Client Scope</option>
        <option value="Rental Company Scope">In Rental Company Scope</option>
    </select>
</p>

<p class="terms_condition">
    <strong>Breakdown :</strong> 
    <select name="breakdown_select" id="breakdown_select">
        <option value="NA">Free Time - Not Applicable</option>
        <option value="6">Free Time - First 6 Hours</option>
        <option value="12">Free Time - First 12 Hours</option>
    </select> 
    After free time, breakdown charges to be deducted on pro-rata basis
</p>






<div class="terms_area terms_condition" contenteditable="true">
    <strong>Over time payment : </strong>   Applicable. OT charges at 100% pro-rata basis payable if equipment has worked beyond stipulated work shift, engine hours and on Sundays,National holidays                                
                                   
                                

</div>

<p class="terms_condition">
    <strong>Payment Terms :</strong> 
    <select name="payment_terms_select" id="payment_terms_select">
        <option value="">Within 7 Days Of invoice submission</option>
        <option value="">Within 10 Days Of invoice submission</option>
        <option value="">Within 30 Days Of invoice submission</option>
        <option value="">Within 45 Days Of invoice submission</option>
    </select>
</p>
<div class="terms_area terms_condition" contenteditable="true">
    <strong>Delay payment clause : </strong>   In case, the payment credit terms are not honoured, we reserve the right to hault the machine operators, and our rental charges shall be in force. Additionally, an interest of 18% PA to be charges on outstanding amount.                                 
                                

</div>


<p class="terms_condition">
    <strong>Equipment Assembly :</strong> 
    <select name="equipment_assembly_select" id="equipment_assembly_select">
        <option value="">Not Applicable</option>
        <option value="Unloading + Assembly + Dismentling + Loading">Unloading + Assembly + Dismentling + Loading</option>
        <option value="Unloading & Loading">Unloading & Loading</option>
    </select>
</p>

<p class="terms_condition">
    <strong>TPI Scope :</strong> 
    <select name="tpi_scope_select" id="tpi_scope_select">
        <option value="">Not Required</option>
        <option value="In Client Scope">In Client Scope</option>
        <option value="In Rental Company">In Rental Company</option>
    </select>
</p>

<p class="terms_condition">
    <strong>Safety And Security :</strong> 
    <select name="safety_security_select" id="safety_security_select">
        <option value="">Not Required</option>
        <option value="In Client Scope">In Client Scope</option>
        <option value="In Rental Company">In Rental Company</option>
    </select>
</p>





<div class="terms_area terms_condition" contenteditable="true">
    <strong>Tools & Tackles :</strong>  Related Tools And Tackles , Required Safety PPE Kit And Gears To Be Provided By Client On FOC basis                                

</div>



<div class="terms_area terms_condition" contenteditable="true">
    <strong>GST :</strong> Applicable. Extra payable at actual invoice value at 18%.
</div>

<div class="terms_area terms_condition" contenteditable="true">
    <strong>Force Majeure clause :</strong> If the equipment deployment gets delayed due to transit delays, plants related gate pass, loading at client site, forces of nature and reasons beyond our control, no penalty shall be levied on us.
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
    // Fetch selected values from dropdowns
    const contractPeriodSelect = document.querySelector('#contract_period_select');
    const advancePaymentSelect = document.querySelector('#advance_payment_select');
    const operatingCrewSelect = document.querySelector('#operating_crew_select');
    const operatorRoomScopeSelect = document.querySelector('#operator_room_scope_select');
    const crewFoodScopeSelect = document.querySelector('#crew_food_scope_select');
    const crewTravellingSelect = document.querySelector('#crew_travelling_select');
    const breakdownSelect = document.querySelector('#breakdown_select');
    const equipmentAssemblySelect = document.querySelector('#equipment_assembly_select');
    const tpiScopeSelect = document.querySelector('#tpi_scope_select');
    const safetySecuritySelect = document.querySelector('#safety_security_select');
    const paymentTermsSelect = document.querySelector('#payment_terms_select');

    // Get selected option values
    const equipmentAssemblyValue = equipmentAssemblySelect.value;
    const tpiScopeValue = tpiScopeSelect.value;
    const safetySecurityValue = safetySecuritySelect.value;
    const contractPeriodValue = contractPeriodSelect.value;
    const advancePaymentValue = advancePaymentSelect.value;
    const operatingCrewValue = operatingCrewSelect.value;
    const operatorRoomScopeValue = operatorRoomScopeSelect.value;
    const crewFoodScopeValue = crewFoodScopeSelect.value;
    const crewTravellingValue = crewTravellingSelect.value;
    const breakdownValue = breakdownSelect.value;
    const paymentTermsValue = paymentTermsSelect.value;

    // Update HTML content with selected values (if needed, for display purpose)
    // Optional: If you want to display the selected text in the HTML as well
    // const contractPeriodText = contractPeriodSelect.options[contractPeriodSelect.selectedIndex].text;
    // const advancePaymentText = advancePaymentSelect.options[advancePaymentSelect.selectedIndex].text;
    // const operatingCrewText = operatingCrewSelect.options[operatingCrewSelect.selectedIndex].text;
    // const operatorRoomScopeText = operatorRoomScopeSelect.options[operatorRoomScopeSelect.selectedIndex].text;
    // const crewFoodScopeText = crewFoodScopeSelect.options[crewFoodScopeSelect.selectedIndex].text;
    // const crewTravellingText = crewTravellingSelect.options[crewTravellingSelect.selectedIndex].text;
    // const breakdownText = breakdownSelect.options[breakdownSelect.selectedIndex].text;

    // Example: Update span elements if you need to display selected text visually
    // document.querySelector('#contract_period_value').textContent = contractPeriodText;
    // document.querySelector('#advance_payment_value').textContent = advancePaymentText;
    // document.querySelector('#operating_crew_value').textContent = operatingCrewText;
    // document.querySelector('#operator_room_scope_value').textContent = operatorRoomScopeText;
    // document.querySelector('#crew_food_scope_value').textContent = crewFoodScopeText;
    // document.querySelector('#crew_travelling_value').textContent = crewTravellingText;
    // document.querySelector('#breakdown_value').textContent = breakdownText;

    // Select the HTML element to be converted to PDF
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