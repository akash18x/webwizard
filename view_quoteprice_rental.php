<?php
session_start();
$email = $_SESSION['email'];
$companyname001 = $_SESSION['companyname'];
?>
<?php
include_once 'partials/_dbconnect.php'; // Include the database connection file

$id=$_GET['id'];
$sql="SELECT * FROM `req_by_epc` WHERE id='$id'";
$result=mysqli_query($conn , $sql);
$row=mysqli_fetch_assoc($result);


$sql2="SELECT * FROM `requirement_price_byrental` WHERE req_id='$id' and rental_name='$companyname001'";
$result2 = mysqli_query($conn , $sql2);
if($result2){
$row2=mysqli_fetch_assoc($result2);
}
else{
    $row2=NULL;
}






?>
<?php
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    include_once 'partials/_dbconnect.php'; // Include the database connection file
$req_id = $_POST['req_id'];
$type = $_POST["type"];
$quip_capacity = $_POST["equip_capacity"];
$boom_combination = $_POST["boom_combination"];
$project_type = $_POST["project_type"];
$state = $_POST["state"];
$district = $_POST["district"];
$duration = $_POST["duration"];
$workingshift = $_POST["working_shift"];
$date = $_POST["date"];
$comp_name = $_POST["EPCcomp_name"];
$epc_email = $_POST["epc_email"];
$epc_number = $_POST["epc_number"];
$price_quote = $_POST["price_quoted"];
$compname =  $_POST["compname"];
$comp_email = $_POST['comp_email'];
$comp_number = $_POST['comp_number'];
$fleet_category=$_POST['fleet_category'];
$unit=$_POST['unit'];
$contact_person=$_POST['contact_person'];
$engine_hour=$_POST['engine_hour'];

$offer_equip_make=$_POST['offer_equip_make'];
$offer_Equip_model=$_POST['offer_Equip_model'];
$offer_yom=$_POST['offer_yom'];
$offer_assembly = !empty($_POST['offer_assembly']) ? $_POST['offer_assembly'] : null;
$offer_assembly_Scope = !empty($_POST['offer_assembly_Scope']) ? $_POST['offer_assembly_Scope'] : null;
$offer_location=$_POST['offer_location'];
$offer_district=$_POST['offer_district'];
$offer_Available=$_POST['offer_Available'];
$offer_payment=$_POST['offer_payment'];
$offer_mob_charges=$_POST['offer_mob_charges'];
$offer_demob_charge=$_POST['offer_demob_charge'];
$offer_contact_person_name=$_POST['offer_contact_person_name'];
$offer_email=$_POST['offer_email'];
$rental_notes=$_POST['rental_notes'];
$epc_notes=$_POST['epc_notes'];



$sql_price = "INSERT INTO `requirement_price_byrental` (`rental_notes`,`epc_notes`,`contact_person_offer_email`,`contact_person_offer`,`demob_charges`,`mob_charges`,`payment_terms`,`available_From_offer`,`offer_district`,`offer_equip_location`,`offer_assembly_scope`,`offer_assembly`,`offer_yom`,`offer_model`,`offer_make`,`fleet_category`,`unit`,`engine_hour`,`contact_person`,`req_id`, `type`, `cap`, `boom_combination`, `project_type`, `state`, `district`, `duration`, `working_shift`, `date`, `epc_name`, `epc_email`, `epc_number`, `price_quoted`, `rental_name`, `rental_email`, `rental_number`)
 VALUES ('$rental_notes','$epc_notes','$offer_email','$offer_contact_person_name','$offer_demob_charge','$offer_mob_charges','$offer_payment','$offer_Available','$offer_district','$offer_location','$offer_assembly_Scope','$offer_assembly','$offer_yom','$offer_Equip_model','$offer_equip_make','$fleet_category','$unit','$engine_hour','$contact_person','$req_id' , '$type', '$quip_capacity', '$boom_combination', '$project_type', '$state', '$district', '$duration', '$workingshift', '$date', '$comp_name', '$epc_email', '$epc_number', '$price_quote', '$compname', '$comp_email', '$comp_number')";
$result=mysqli_query($conn , $sql_price);
if($result){
    header("location:view_req_rentalinner.php");
    // $newid=$_SESSION['req_id'];
}
}
?>
<style>
  <?php include "style.css" ?>
</style>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">      <link rel="icon" href="favicon.jpg" type="image/x-icon">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <title>Quote Price</title>
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
    <div class="bothform_container">
    <form action="view_quoteprice_rental.php" method="POST" autocomplete="off" class="epc_req1">
        <div class="epc_red_div">
            <div class="epc_req_heading"><h2>EPC Requirements</h2></div>
            <div class="trial1">
            <?php
    $date = date('d-m-Y', strtotime($row['enquiry_posted_date']));
    $time = date('H:i:s', strtotime($row['enquiry_posted_date']));
    ?>
    <input type="text" placeholder="" value="<?php echo $date . ' ' . $time; ?>" class="input02">            <label for="" class="placeholder2">Enquiry Posted Date</label>
            </div>
            <div class="trial1">
                <input class="input02" name="EPCcomp_name" type="text" value="<?php echo $row["epc_name"] ?>" placeholder="" readonly>
                <label class="placeholder2"> EPC Company Name</label>
                </div>
                
                <div class="outer02">
                <div class="trial1" >
                <input class="input02" name="contact_person" type="text" placeholder="" value="<?php echo $row['contact_person'] ;?>" readonly>
                <label class="placeholder2"> Contact Person</label>
                </div>
                <div class="trial1" >
                <input class="input02" name="epc_number" type="text" placeholder="" value="<?php echo $row['epc_number'] ;?>" readonly>
                <label class="placeholder2"> Contact Number</label>
                </div>
                </div>
                <div class="trial1">
                <input class="input02" name="epc_email" type="text" placeholder="" value="<?php echo $row['epc_email'] ?>" readonly>
                <label class="placeholder2"> Contact Email</label>
                </div>


            <div class="outer02">
            <div class="trial1">
                <input type="text" placeholder="" name="fleet_category" class="input02" value="<?php echo $row['fleet_category']; ?>">
                <label class="placeholder2">Fleet Category</label>
            </div>
                <input type="text" name="req_id" class="input02" placeholder="" value="<?php echo $row["id"] ?>" readonly hidden >
            <div class="trial1">
                <input type="text" name="type" class="input02" placeholder="" value="<?php echo $row["equipment_type"] ?>" readonly>
                <label class="placeholder2">Equipment Type</label>
            </div></div>
            <div class="outer02">
            <div class="trial1">
            <input type="text" name="equip_capacity" class="input02" placeholder="" value="<?php echo $row['equipment_capacity'] ?>" readonly>
            <label class="placeholder2">Equipment Capacity</label>
            </div>
            <div class="trial1">
            <input type="text" name="unit" class="input02" placeholder="" value="<?php echo $row['unit'] ?>" readonly>
            <label class="placeholder2">Unit</label>
            </div>
            <div class="trial1" <?php if(empty($row['boom_combination'])) echo 'style="display:none;"'; ?>>
    <input type="text" name="boom_combination" value="<?php echo $row['boom_combination'] ?>" class="input02" placeholder="" readonly>
    <label class="placeholder2">Boom Combination</label>
</div>
            </div>
            <div class="trial1">
                <input type="text" name="project_type" placeholder="" class="input02" value="<?php echo $row["project_type"] ?>" readonly>
                <label class="placeholder2">Project Type</label>
    </div>
            <div class="outer02">
            <div class="trial1">
                <input type="text" name="state" placeholder="" class="input02" value="<?php echo $row["state"] ?>" readonly>
                <label class="placeholder2"> Project State</label>
            </div>
            <div class="trial1">
                <input class="input02" name="district" type="text" placeholder="" value="<?php echo $row["district"] ?>" readonly>
                <label class="placeholder2">Project District</label>
            </div>
            </div>
            <div class="outer02">
            <div class="trial1">
                <input class="input02" name="duration" type="text" placeholder="" value="<?php echo $row["duration_month"] . " Months" ?>" readonly>
                <label class="placeholder2">Duration </label>
            </div>
            <div class="trial1">
                <input type="text" class="input02" name="working_shift" placeholder="" value="<?php echo $row['working_shift'] ?>" readonly>
                <label class="placeholder2">Working Shift</label>
            </div>
            <div class="trial1">
            <input class="input02" name="date" type="text" placeholder="" value="<?php echo date("d-m-Y", strtotime($row['tentative_date'])); ?>" readonly>
                <label class="placeholder2"> Required From</label>
                </div>
            <?php
                $engineStyle = empty($row['engine_hour']) ? 'style="display:none"' : '';
                ?>
            <div class="trial1" <?php echo $engineStyle?> >
                <input type="text" class="input02" name="engine_hour" placeholder="" value="<?php echo $row['engine_hour'] ?>" readonly>
                <label class="placeholder2">Engine Hour</label>
            </div>
            </div>
            <div class="trial1">
                <textarea type="text" placeholder="" name="epc_notes" class="input02" rows="4"><?php echo $row['notes'] ?></textarea>
                <label for="" class="placeholder2">EPC Notes</label>
            </div>
                
                    <input type="text" placeholder="" name="compname" class="input02" value="<?php echo $companyname001 ?>" readonly hidden>
                    
    <!-- </div> -->

                
                    <input type="text" placeholder="" name="comp_email" value="<?php echo $email ?>" class="input02" readonly hidden>
                    <!-- <label class="placeholder2">Company Email</label> -->
                <!-- </div> -->


<br>

</div>

</form>
<br><br>
<form action="view_quoteprice_rental.php" method="POST" autocomplete="off" class="epc_req1">
<div class="epc_red_div">
<div class="epc_req_heading"><h2>Quote Price</h2></div>

                <div class="outer02">
                <div class="trial1">
            <select class="input02" name="offer_equip_make" id="" onchange="" required> 
        <option value="" disabled selected>Equipment Make</option>
    <option value="ACE">ACE</option>
    <option value="Ajax Fiori">Ajax Fiori</option>
    <option value="AMW">AMW</option>
    <option value="Apollo">Apollo</option>
    <option value="Aquarius">Aquarius</option>
    <option value="Ashok Leyland">Ashok Leyland</option>
    <option value="Atlas Copco">Atlas Copco</option>
    <option value="Belaz">Belaz</option>
    <option value="Bemi">Bemi</option>
    <option value="BEML">BEML</option>
    <option value="Bharat Benz">Bharat Benz</option>
    <option value="Bob Cat">Bob Cat</option>
    <option value="Bull">Bull</option>
    <option value="Bauer">Bauer</option>
    <option value="BMS">BMS</option>
    <option value="Bomag">Bomag</option>
    <option value="Case">Case</option>
    <option value="Cat">Cat</option>
    <option value="Cranex">Cranex</option>
    <option value="Casagrande">Casagrande</option>
    <option value="Coles">Coles</option>
    <option value="CHS">CHS</option>
        <option value="Doosan">Doosan</option>
        <option value="Dynapac">Dynapac</option>
        <option value="Demag">Demag</option>
        <option value="Eicher">Eicher</option>
        <option value="Escorts">Escorts</option>
        <option value="Fuwa">Fuwa</option>
        <option value="Fushan">Fushan</option>
        <option value="Genie">Genie</option>
        <option value="Godrej">Godrej</option>
        <option value="Grove">Grove</option>
        <option value="Hamm AG">Hamm AG</option>
        <option value="Haulott">Haulott</option>
        <option value="Hidromek">Hidromek</option>
        <option value="Hydrolift">Hydrolift</option>
        <option value="Hyundai">Hyundai</option>
        <option value="Hidrocon">Hidrocon</option>
        <option value="Ingersoll Rand">Ingersoll Rand</option>
        <option value="Isuzu">Isuzu</option>
        <option value="IHI">IHI</option>
        <option value="JCB">JCB</option>
        <option value="JLG">JLG</option>
        <option value="Jaypee">Jaypee</option>
        <option value="Jinwoo">Jinwoo</option>
        <option value="John Deere">John Deere</option>
        <option value="Jackson">Jackson</option>
        <option value="Kamaz">Kamaz</option>
        <option value="Kato">Kato</option>
        <option value="Kobelco">Kobelco</option>
        <option value="Komatsu">Komatsu</option>
        <option value="Konecranes">Konecranes</option>
        <option value="Kubota">Kubota</option>
        <option value="KYB Conmat">KYB Conmat</option>
        <option value="Krupp">Krupp</option>
        <option value="Kirloskar">Kirloskar</option>
        <option value="Kohler">Kohler</option>
        <option value="L&T">L&T</option>
        <option value="Leeboy">Leeboy</option>
        <option value="LGMG">LGMG</option>
        <option value="Liebherr">Liebherr</option>
        <option value="Link-Belt">Link-Belt</option>
        <option value="Liugong">Liugong</option>
        <option value="Lorain">Lorain</option>
        <option value="Mahindra">Mahindra</option>
        <option value="Manitou">Manitou</option>
        <option value="Maintowoc">Maintowoc</option>
        <option value="Marion">Marion</option>
        <option value="MAIT">MAIT</option>
        <option value="Marchetti">Marchetti</option>
        <option value="Noble Lift">Noble Lift</option>
        <option value="New Holland">New Holland</option>
        <option value="Palfinger">Palfinger</option>
        <option value="Potain">Potain</option>
        <option value="Putzmeister">Putzmeister</option>
        <option value="P&H">P&H</option>
        <option value="Pinguely">Pinguely</option>
        <option value="PTC">PTC</option>
        <option value="Reva">Reva</option>
        <option value="Sany">Sany</option>
        <option value="Scania">Scania</option>
        <option value="Schwing Stetter">Schwing Stetter</option>
        <option value="SDLG">SDLG</option>
        <option value="Sennebogen">Sennebogen</option>
        <option value="Shuttle Lift">Shuttle Lift</option>
        <option value="Skyjack">Skyjack</option>
        <option value="Snorkel">Snorkel</option>
        <option value="Soilmec">Soilmec</option>
        <option value="Sunward">Sunward</option>
        <option value="Tadano">Tadano</option>
        <option value="Tata Hitachi">Tata Hitachi</option>
        <option value="TATA">TATA</option>
        <option value="Terex">Terex</option>
        <option value="TIL">TIL</option>
        <option value="Toyota">Toyota</option>
        <option value="Teupen">Teupen</option>
        <option value="Unicon">Unicon</option>
        <option value="Urb Engineering">Urb Engineering</option>
        <option value="Universal Construction">Universal Construction</option>
        <option value="Unipave">Unipave</option>
        <option value="Vogele">Vogele</option>
        <option value="Volvo">Volvo</option>
        <option value="Wirtgen Group">Wirtgen Group</option>
        <option value="XCMG Group">XCMG Group</option>
        <option value="XGMA">XGMA</option>
        <option value="Yanmar">Yanmar</option>
        <option value="Zoomlion">Zoomlion</option>
        <option value="ZPMC">ZPMC</option>
            </select>
                </div>

                <div class="trial1">
                    <input type="text" placeholder="" name="offer_Equip_model" class="input02">
                    <label for="" class="placeholder2"> Equipment Model</label>
                </div>
                <div class="trial1">
                    <input type="text" name="offer_yom" placeholder="" class="input02">
                    <label for="" class="placeholder2">YOM  </label>
                </div></div>
                <div class="outer02">
                <div class="trial1">
                    <select name="offer_assembly" id="" class="input02">
                        <option value=""disabled selected>Equipment Assembly Required?</option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                    </select>
                </div>
                <div class="trial1">
                    <select name="offer_assembly_Scope" id="" class="input02">
                        <option value=""disabled selected>In Scope Of?</option>
                        <option value="Client">Client</option>
                        <option value="Rental Company">Rental Company</option>
                    </select>
                </div></div>
                <div class="outer02">
                <div class="trial1">
                <select class="input02" name="offer_location" class="input02">
                    <option value=""disabled selected>Location Of Equipment</option>
    <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
    <option value="Andhra Pradesh">Andhra Pradesh</option>
    <option value="Arunachal Pradesh">Arunachal Pradesh</option>
    <option value="Assam">Assam</option>
    <option value="Bihar">Bihar</option>
    <option value="Chandigarh">Chandigarh</option>
    <option value="Chhattisgarh">Chhattisgarh</option>
    <option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option>
    <option value="Daman and Diu">Daman and Diu</option>
    <option value="Delhi">Delhi</option>
    <option value="Goa">Goa</option>
    <option value="Gujarat">Gujarat</option>
    <option value="Haryana">Haryana</option>
    <option value="Himachal Pradesh">Himachal Pradesh</option>
    <option value="Jammu and Kashmir">Jammu and Kashmir</option>
    <option value="Jharkhand">Jharkhand</option>
    <option value="Karnataka">Karnataka</option>
    <option value="Kerala">Kerala</option>
    <option value="Ladakh">Ladakh</option>
    <option value="Lakshadweep">Lakshadweep</option>
    <option value="Madhya Pradesh">Madhya Pradesh</option>
    <option value="Maharashtra">Maharashtra</option>
    <option value="Manipur">Manipur</option>
    <option value="Meghalaya">Meghalaya</option>
    <option value="Mizoram">Mizoram</option>
    <option value="Nagaland">Nagaland</option>
    <option value="Odisha">Odisha</option>
    <option value="Puducherry">Puducherry</option>
    <option value="Punjab">Punjab</option>
    <option value="Rajasthan">Rajasthan</option>
    <option value="Sikkim">Sikkim</option>
    <option value="Tamil Nadu">Tamil Nadu</option>
    <option value="Telangana">Telangana</option>
    <option value="Tripura">Tripura</option>
    <option value="Uttar Pradesh">Uttar Pradesh</option>
    <option value="Uttarakhand">Uttarakhand</option>
    <option value="West Bengal">West Bengal</option>
    </select>
            </div>
                <div class="trial1">
                    <input type="text" placeholder="" name="offer_district" class="input02">
                    <label for="" class="placeholder2">Current District  </label>
                </div>
                <div class="trial1">
                    <input type="date" placeholder="" name="offer_Available" class="input02">
                    <label for="" class="placeholder2">Available From</label>
                </div>
                </div>
                <div class="trial1">
                    <select name="offer_payment" id="" class="input02">
                        <option value=""disabled selected>Choose Payment Conditions</option>
                        <option value="Advance">Advance</option>
                        <option value="15 Days">15 Days</option>
                        <option value="30 Days">30 Days</option>
                        <option value="45 Days">45 Days</option>
                    </select>
                </div>
    <div class="outer02">
                <div class="trial1">
                    <input type="text" placeholder="" name="price_quoted" value="<?php if(!empty($row2['price_quoted'])){ echo $row2['price_quoted'];}  ?>"<?php if(!empty($row2['price_quoted'])){ echo 'readonly';} ?> class="input02" >
                    <label class="placeholder2">Quote Price</label>
                </div>
            
                <div class="trial1">
                    <input type="text" placeholder="" name="offer_mob_charges"  class="input02" >
                    <label class="placeholder2">Mob Charges</label>
                </div>
                <div class="trial1">
                    <input type="text" placeholder="" name="offer_demob_charge"  class="input02" >
                    <label class="placeholder2">De-Mob Charges</label>
                </div></div>
                <div class="outer02">
                <div class="trial1">
                <input type="text" placeholder="" name="offer_contact_person_name" class="input02">
                <label class="placeholder2">Contact Person</label>
                </div>
                <div class="trial1">
                <input type="text" placeholder="" name="comp_number" value="<?php if(!empty($row2['rental_number'])){ echo $row2['rental_number'];}  ?> " class="input02">
                <label class="placeholder2">Mobile Number</label>
                </div></div>
                <div class="trial1">
                <input type="text" placeholder="" name="offer_email"  class="input02">
                <label class="placeholder2">Contact Email </label>
                </div>
                <div class="trial1">
                <textarea type="text" name="rental_notes" class="input02" placeholder=""></textarea>
                <label for="" class="placeholder2">Notes</label>
                </div>
                <button class="epc-button" id="submitBtn" type="submit">Quote </button>
                <br><br>
    </form>
    <br>
    </div>
    <br><br>
<script>
            // Hide the submit button if the comp_number input field is readonly
            if (document.querySelector('[name="price_quoted"]').readOnly) {
                document.getElementById('submitBtn').style.display = 'none';
            }
        </script>
</body>
</html>