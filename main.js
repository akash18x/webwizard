function showTextBox() {
    const select1 = document.getElementById("mySelect1");
    const div1 = document.getElementById("hide_show");
    const div2 = document.getElementById("hide_show1");
    const div3 = document.getElementById("hide_show2");
    



    if (select1.value==="Crawler") {
        div1.style.display = "block";
        div2.style.display = "block";
        div3.style.display = "block";
        div4.style.display = "block";
        div5.style.display = "block";
        div6.style.display = "block";


    } else {
        div1.style.display = "none";
        div2.style.display = "none";
        div3.style.display = "none";
        div6.style.display = "none";
        div4.style.display = "none";
        div5.style.display = "none";


    }
}

function showTextBox2(){
    const select2 = document.getElementById("mySelect2");
    const div4 = document.getElementById("hide_show00");
    const div5 = document.getElementById("hide_show01");
    const div6 = document.getElementById("hide_show02");

    if (select2.value==="Crawler") {
        div4.style.display = "block";
        div5.style.display = "block";
        div6.style.display = "block";
    }
    else{
        div6.style.display = "none";
        div4.style.display = "none";
        div5.style.display = "none";
    }

    

}










function showOption(){
    const oem_fleet_type = document.getElementById("oem_fleet_type");
    const option1 = document.getElementById("aerial_work_platform_option1");
    const option2 = document.getElementById("aerial_work_platform_option2");
    const option3 = document.getElementById("aerial_work_platform_option3");
    const option4 = document.getElementById("aerial_work_platform_option4");
    const option5 = document.getElementById("aerial_work_platform_option5");
    const option6 = document.getElementById("aerial_work_platform_option6");
    const option7 = document.getElementById("aerial_work_platform_option7");

    const option8 = document.getElementById("concrete_equipment_option1");
    const option9 = document.getElementById("concrete_equipment_option2");
    const option10 = document.getElementById("concrete_equipment_option3");
    const option11 = document.getElementById("concrete_equipment_option4");
    const option12 = document.getElementById("concrete_equipment_option5");
    const option13 = document.getElementById("concrete_equipment_option6");
    const option14 = document.getElementById("concrete_equipment_option7");

    const option15 = document.getElementById("earthmovers_option1");
    const option16 = document.getElementById("earthmovers_option2");
    const option17 = document.getElementById("earthmovers_option3");
    const option18 = document.getElementById("earthmovers_option4");
    const option19 = document.getElementById("earthmovers_option5");
    const option20 = document.getElementById("earthmovers_option6");
    const option21 = document.getElementById("earthmovers_option7");
    const option22 = document.getElementById("earthmovers_option8");
    const option23 = document.getElementById("earthmovers_option9");
    const option24 = document.getElementById("earthmovers_option10");
    const option25 = document.getElementById("earthmovers_option11");
    const option26 = document.getElementById("earthmovers_option12");
    const option27 = document.getElementById("earthmovers_option13");
    const option28 = document.getElementById("earthmovers_option14");
    const option29 = document.getElementById("earthmovers_option15");

    const option30 = document.getElementById("mhe_option1");
    const option31 = document.getElementById("mhe_option2");
    const option32 = document.getElementById("mhe_option3");
    const option33 = document.getElementById("mhe_option4");
    const option34 = document.getElementById("mhe_option5");
    const option35 = document.getElementById("mhe_option6");
    const option36 = document.getElementById("mhe_option7");
    const option37 = document.getElementById("mhe_option8");
    const option38 = document.getElementById("mhe_option9");
    const option39 = document.getElementById("mhe_option10");
    const option40 = document.getElementById("mhe_option11");
    const option41 = document.getElementById("mhe_option12");
    const option42 = document.getElementById("mhe_option13");
    const option43 = document.getElementById("mhe_option14");
    const option99 = document.getElementById("mhe_option15");


    const option44 = document.getElementById("ground_engineering_equipment_option1");
    const option45 = document.getElementById("ground_engineering_equipment_option2");
    const option46 = document.getElementById("ground_engineering_equipment_option3");

    const option47 = document.getElementById("trailor_option1");
    const option48 = document.getElementById("trailor_option2");
    const option49 = document.getElementById("trailor_option3");
    const option50 = document.getElementById("trailor_option4");
    const option51 = document.getElementById("trailor_option5");
    const option52 = document.getElementById("trailor_option6");
    const option53 = document.getElementById("trailor_option7");

    const option54 = document.getElementById("generator_option1");
    const option55 = document.getElementById("generator_option2");
    const option56 = document.getElementById("generator_option3");

    // let menu = document.getElementById("oem_fleet_type")
    const cntr_weight = document.getElementById("counter_weight_input")
    const spr_lift = document.getElementById("superlift_dd")











    if(oem_fleet_type.value === "aerial_work_platform")
    {
        option1.style.display="block";
        option2.style.display="block";
        option3.style.display="block";
        option4.style.display="block";
        option5.style.display="block";
        option6.style.display="block";
        option7.style.display="block";
    }
    else{
        option1.style.display="none";
        option2.style.display="none";
        option3.style.display="none";
        option4.style.display="none";
        option5.style.display="none";
        option6.style.display="none";
        option7.style.display="none";
    }
    if(oem_fleet_type.value === "concrete_equipment")
    {
        option8.style.display="block";
        option9.style.display="block";
        option10.style.display="block";
        option11.style.display="block";
        option12.style.display="block";
        option13.style.display="block";
        option14.style.display="block";
    }

    else{
        option8.style.display="none";
        option9.style.display="none";
        option10.style.display="none";
        option11.style.display="none";
        option12.style.display="none";
        option13.style.display="none";
        option14.style.display="none";
    }
    if(oem_fleet_type.value === "earthmovers_equipments")
    {
        option15.style.display="block";
        option16.style.display="block";
        option17.style.display="block";
        option18.style.display="block";
        option19.style.display="block";
        option20.style.display="block";
        option21.style.display="block";
        option22.style.display="block";
        option23.style.display="block";
        option24.style.display="block";
        option25.style.display="block";
        option26.style.display="block";
        option27.style.display="block";
        option28.style.display="block";
        option29.style.display="block";
  
    }
    else{
        option15.style.display="none";
        option16.style.display="none";
        option17.style.display="none";
        option18.style.display="none";
        option19.style.display="none";
        option20.style.display="none";
        option21.style.display="none";
        option22.style.display="none";
        option23.style.display="none";
        option24.style.display="none";
        option25.style.display="none";
        option26.style.display="none";
        option27.style.display="none";
        option28.style.display="none";
        option29.style.display="none";
    }
    if(oem_fleet_type.value === "mhe")
    {
        option30.style.display="block";
        option31.style.display="block";
        option32.style.display="block";
        option33.style.display="block";
        option34.style.display="block";
        option35.style.display="block";
        option36.style.display="block";
        option37.style.display="block";
        option38.style.display="block";
        option39.style.display="block";
        option40.style.display="block";
        option41.style.display="block";
        option42.style.display="block";
        option43.style.display="block";
        option99.style.display="block";
        cntr_weight.style.display="block";
        spr_lift.style.display="block";

  
    }
    else{
        option30.style.display="none";
        option30.style.display="none";
        option31.style.display="none";
        option32.style.display="none";
        option33.style.display="none";
        option34.style.display="none";
        option35.style.display="none";
        option36.style.display="none";
        option37.style.display="none";
        option38.style.display="none";
        option39.style.display="none";
        option40.style.display="none";
        option41.style.display="none";
        option42.style.display="none";
        option43.style.display="none";
        option99.style.display="none";
        cntr_weight.style.display="none";
        spr_lift.style.display="none";

    }
    if(oem_fleet_type.value === "ground_engineering_equioments")
    {
        option44.style.display="block";
        option45.style.display="block";
        option46.style.display="block";
 
    }
    else{
        option44.style.display="none";
        option45.style.display="none";
        option46.style.display="none";
    }
    if(oem_fleet_type.value === "trailor_truck")
    {
        option47.style.display="block";
        option48.style.display="block";
        option49.style.display="block";
        option50.style.display="block";
        option51.style.display="block";
        option52.style.display="block";
        option53.style.display="block";
    }
    else{
        option47.style.display="none";
        option48.style.display="none";
        option49.style.display="none";
        option50.style.display="none";
        option51.style.display="none";
        option52.style.display="none";
        option53.style.display="none";
    }
    if(oem_fleet_type.value === "generator_lighting"){
        option54.style.display="block";
        option55.style.display="block";
        option56.style.display="block";

    }
    else{
        option54.style.display="none";
        option55.style.display="none";
        option56.style.display="none";
    }


    }

function hide(){
    const subtype = document.getElementById("oem_fleet_sub_type");
    const dd = document.getElementById("chassis_make1");

    if( subtype.value === "truck_mounted_articulated_boomlift")
    {
        dd.style.display="block";
    }
    else if( subtype.value === "truck_mounted_straight_boomlift")
    {
        dd.style.display="block";
    }
    else if( subtype.value === "concrete_boom_placer")
    {
        dd.style.display="block";
    }
    else if( subtype.value === "self_loading_truck_crane")
    {
        dd.style.display="block";
    }

    else{
        dd.style.display="none";
    }
  
    
}
function other_textbox1(){
    let make_dd = document.getElementById("crane_make_dd");
    let other1 = document.getElementById("other_input1")

    if(make_dd.value === "other_make"){
        other1.style.display="block";
    }
    else{
        other1.style.display="none";
    }
}

function other_chassis(){
    let otherchassis = document.getElementById("chassis_make1")
    let textbox_chassis = document.getElementById("otherchassis_tectbox")

    if(otherchassis.value ==="other_brand"){
        textbox_chassis.style.display="block"
    }
    else{
        textbox_chassis.style.display="none";
    }
}

function input_visible(){
    let ddinput=document.getElementById("superlift_dd")
    let weight_input_field=document.getElementById("superlift_weight")
     if(ddinput.value ==="yes")
     {
        weight_input_field.style.display="block";
     }
     else{
        weight_input_field.style.display="none";
     }

}

function showPhoto(){
    const selectyes = document.getElementById("edit_uploaded_images")
    const image1 = document.getElementById("picture1")
    const image2 = document.getElementById("picture2")
    const image3 = document.getElementById("picture3")

    if(selectyes.value === "yes"){
        image1.style.display="block";
        image2.style.display="block";
        image3.style.display="block";

    }
    else{
        image2.style.display="none";
        image3.style.display="none";
        image1.style.display="none";

    }

}


function rental_addfleet(){
    const make = document.getElementById("crane_make_retnal");
    const textbox01 = document.getElementById("othermake01");

    if(make.value==="Others"){
        textbox01.style.display="block";
    }
    else{
        textbox01.style.display="none";
    }
}

function chassis_make_rental1(){
    const chassis = document.getElementById("chassis_make_rental");
    const other_chassis = document.getElementById("otherchassis")

    if(chassis.value==="Other"){
        other_chassis.style.display="block"
    }
    else{
        other_chassis.style.display="none";
    }
}

function crawler_options(){
const sub_types=document.getElementById("fleet_sub_type");
const registration = document.getElementById("registration_rental");
// const length_out = document.getElementById("length_outer");
const length01 = document.getElementById("length1");
const length02 = document.getElementById("length2");
const length03 = document.getElementById("length3");
if(sub_types.value==="Hydraulic Crawler Crane" || sub_types.value==="Mechanical Crawler Crane" || sub_types.value==="Telescopic Crawler Crane"){
    registration.style.display="none";
    // length_out.style.display="block"
    length01.style.display="block"
    length02.style.display="block"
    length03.style.display="block"
}
else{
    registration.style.display="block";
    // length_out.style.display="none"
    length01.style.display="none"
    length02.style.display="none"
    length03.style.display="none"


}

}


function crawler_subtype(){
    const select_fleet_Type=document.getElementById("sub_type_oemaddfleet");
    // const jib_boom=document.getElementById("oem_addfleet_jib");
    const boom_oem=document.getElementById("boomlength_oem");
    const jib_oem=document.getElementById("jiblength_oem");
    const luffing_oem=document.getElementById("luffinglength_oem")

    if(select_fleet_Type.value==="Hydraulic Crawler Crane" || select_fleet_Type.value==="Mechanical Crawler Crane" || select_fleet_Type.value==="Telescopic Crawler Crane" ){
        boom_oem.style.display="block";
        jib_oem.style.display="block";
        luffing_oem.style.display="block";
    }
    else{
        boom_oem.style.display="none ";
        jib_oem.style.display="none";
        luffing_oem.style.display="none";
    }
}



function oemchassis_01(){
    const chassis_make= document.getElementById("chassis_make_oem");
    const specify_other=document.getElementById("specify_other_chassis_oem")
    if(chassis_make.value==="Other"){
        specify_other.style.display="block";
    }
    else{
        specify_other.style.display="none";
    }
}

function rental_addfleet1(){
    const make = document.getElementById("crane_make_retnal1");
    const textbox010 = document.getElementById("othermake012");

    if(make.value==="Others"){
        textbox010.style.display="block";
    }
    else{
        textbox010.style.display="none";
    }
}



function crane_fullspecs_feetmake(){
    const full_specs_make=document.getElementById("crane_fullspeccs_fleet_make");
    const full_specs_other_brand=document.getElementById("crane_full_specs_other_brand");
    if( full_specs_make.value==="Others"){
        full_specs_other_brand.style.display="block";
    }
    else{
        full_specs_other_brand.style.display="none";

    }
}



function idlefunction(){
const status=document.getElementById("operator_status");
    const driving_asset=document.getElementById("asset_code");
    if(status.value ==="working"){
        driving_asset.style.display="block";
    }
   else{
    driving_asset.style.display='none';
   }
}

function crawler_subtype_sellfleet(){
    const select_fleet_Type=document.getElementById("sub_type_oemaddfleet");
    // const jib_boom=document.getElementById("oem_addfleet_jib");
    const boom_oem=document.getElementById("boomlength_oem");
    const jib_oem=document.getElementById("jiblength_oem");
    const luffing_oem=document.getElementById("luffinglength_oem")

    if(select_fleet_Type.value==="Hydraulic Crawler Crane" || select_fleet_Type.value==="Mechanical Crawler Crane" || select_fleet_Type.value==="Telescopic Crawler Crane" ){
        boom_oem.style.display="block";
        jib_oem.style.display="block";
        luffing_oem.style.display="block";
    }
    else{
        boom_oem.style.display="none ";
        jib_oem.style.display="none";
        luffing_oem.style.display="none";
    }
}

function new_page(){
    dd_change=document.getElementById("rmc_type_dd")
    if(dd_change.value==="Dedicated RMC"){
        window.location.href="dedicatedrmc_req.php"
    }
}

function first_plus_click(){
    firstplus=document.getElementById("first_plus").style.display='none';
    second_div=document.getElementById("second_particular").style.display='block';

}

function second_plus_click(){
    second_plus=document.getElementById("second_plus").style.display="none";
    third_div=document.getElementById("third_particular").style.display="block";
}

function third_plus_click(){
    third_plus=document.getElementById("third_plus").style.display='none';
    fourth_particular=document.getElementById("fourth_particular").style.display='block';
}

function fourth_click(){
    fourth_plus=document.getElementById("fourth_plus").style.display="none";
    fifth_particular=document.getElementById("fifth_particular").style.display="block";
}

function back_to_old_page(){
    dd_change1=document.getElementById("rmc_type_dd_dedicated")
    if(dd_change1.value==="Commercial RMC"){
        window.location.href="epc_rmc_req.php"
    }
}
function first_plus_dedicated_click(){
    first_plus_dedicated1=document.getElementById('first_plus_dedicated').style.display='none';
    second_particular_dedicated=document.getElementById("second_particular_dedicated").style.display='block';
}
function second_plus_dedicated_click(){
    second_plus_dedicated=document.getElementById('second_plus_dedicated').style.display='none';
    third_particular_dedicated=document.getElementById('third_particular_dedicated').style.display='block';
}

function third_plus_dedicated_click(){
    third_plus_dedicated=document.getElementById("third_plus_dedicated").style.display='none';
    fourth_particular_dedicated=document.getElementById("fourth_particular_dedicated").style.display='block';
}
function fourth_plus_dedicated_click(){
    fourth_plus_dedicated=document.getElementById("fourth_plus_dedicated").style.display='none';
    fifth_particular_dedicated=document.getElementById("fifth_particular_dedicated").style.display='block';
}

function dd_hide1(){
    const pouring_equip=document.getElementById("pouring_equip");
    const no_of_equipment_required=document.getElementById("no_of_equipment_required");
    if (pouring_equip.value==='Concrete Pump' ||pouring_equip.value==='Boomplacer' ){
        no_of_equipment_required.style.display='block';
    }
    else{
        no_of_equipment_required.style.display='none';
    }
}

function dd_hide1_dedicated(){
    const pouring_equip_dedicated=document.getElementById("pouring_equip_dedicated");
    const no_of_equipment_required_dedicated=document.getElementById("no_of_equipment_required_dedicated");
    if(pouring_equip_dedicated.value==='Concrete Pump' ||pouring_equip_dedicated.value==='Boomplacer'  ){
        no_of_equipment_required_dedicated.style.display='block';
    }
    else{
        no_of_equipment_required_dedicated.style.display='none';
    }
}

function companywebsite(){
    const drop=document.getElementById("company_web_drop_down")
    const specify_comp_web=document.getElementById("specify_comp_web");
if(drop.value==="yes"){
    specify_comp_web.style.display="block";
}
else{
    specify_comp_web.style.display="none"
}
}

function rental_addon(){
    const enterprise_classified=document.getElementById('enterprise_options');
    const addonservices=document.getElementById("addonservices");
    {
        if( enterprise_classified.value==='rental' ){
            addonservices.style.display='block';
        }
        else{
            addonservices.style.display='none';
        }
    }
}

function insentive(){
    const insentive_dd=document.getElementById("insentive_dd");
    const minimum_target=document.getElementById("minimum_target");
    if(insentive_dd.value==='Yes'){
minimum_target.style.display='block'
    }
    else{
        minimum_target.style.display='none';
    }
}

function website_input(){
    const compweb=document.getElementById("company_web_drop_down")
    const yes_web=document.getElementById("enter_website");
    if (compweb.value==="yes"){
        yes_web.style.display="block";
    }
    else{
        yes_web.style.display="none";
    }
}

function enterprise_classified_as(){
    const ent_type=document.getElementById("enterprise_type");
    const service=document.getElementById("services");
    if (ent_type.value==='rental'){
        service.style.display='block';
    }
    else{
        service.style.display='none';
    }
}

function addon1(){
    const svrc=document.getElementById("services2")
    const rmc_type=document.getElementById("rmc_subtype");
    if(svrc.value==='RMC Plant' || svrc.value==='RMC Plant And Foundation Work' ){
        rmc_type.style.display="block";

    }
    else{
        rmc_type.style.display='none';
    }
}

function dedicated_rmc(){
    const rmc_subtype1=document.getElementById("rmc_subtype1");
    const loca=document.getElementById("dedicated_rmc_location")
    if(rmc_subtype1.value==="Dedicated"){
        loca.style.display="block";
    }
    else{
        loca.style.display='none';  
    }
}
function webdd_signin(){
    const web_present=document.getElementById("web_present");
    const web_add_company=document.getElementById("web_add_company");
    if(web_present.value==='Yes'){
        web_add_company.style.display='block';
    }
    else{
        web_add_company.style.display='none';
    }
}
function service_Addon(){
    const info=document.getElementById("_info");
    const rmc_Type=document.getElementById("rmc_Type");
    if (info.value==='RMC Plant' || info.value==='RMC Plant And Foundation Work'){
        rmc_Type.style.display='block';
    }
    else{
        rmc_Type.style.display='none';
    }
}

function ent_type(){
    const ent_Type_=document.getElementById("ent_Type_");
    const Info_Outer=document.getElementById("Info_Outer");
    if(ent_Type_.value==='rental'){
        Info_Outer.style.display="block";
    }
    else{
        Info_Outer.style.display='none';
    }


}

function Rmc_Location(){
    const rmc_Type=document.getElementById("rmc_Type");
    const Rmc_loca_outer=document.getElementById("Rmc_loca_outer");
    const Rmc_loca_outer2=document.getElementById("Rmc_loca_outer2");
    if(rmc_Type.value==='Dedicated'){
        Rmc_loca_outer.style.display='block';
        Rmc_loca_outer2.style.display='block';

    }
    else{
        Rmc_loca_outer.style.display='none';
        Rmc_loca_outer2.style.display='none';
    }
}

function Get_asset_Detail() {
    const val = document.getElementById("bill_ac").value;
    console.log("Selected value:", val);
    window.location = "ac_redirection.php?id=" + encodeURIComponent(val);
}
function add_other_expense(){
    const first_expense_btn=document.getElementById("first_expense_btn");
    const expn_desc1=document.getElementById("expn_desc1");
    const cost1=document.getElementById("cost1");
    const second_expense_btn=document.getElementById("second_expense_btn");

    first_expense_btn.style.display="none";

    expn_desc1.style.display="block";
    cost1.style.display="block";
    second_expense_btn.style.display="block";
}
function add_other_Expense2(){
    document.getElementById("second_expense_btn").style.display="none";
    document.getElementById("expn_desc2").style.display="block";
    document.getElementById("cost2").style.display="block";
}
function open_req_grpinner(id) {
    window.location = "price_recieved_group.php?id=" + id;
}

function sell_icon(){
    document.getElementById("sellfleeticon").style.display="none";
    document.getElementById("pic4").style.display="block";
    document.getElementById("pic5").style.display="block";
  }

  function choose_new_equ(){
    const ac_dd=document.getElementById("choose_Ac");
    const new_equip=document.getElementById("new_equip");
    const newfleet_makemodel=document.getElementById("newfleet_makemodel");
    const newfleet_capinfo=document.getElementById("newfleet_capinfo");
    const newfleet_jib=document.getElementById("newfleet_jib");
    if(ac_dd.value==="New Equipment"){
        new_equip.style.display = "block"; // Set display to block initially
        new_equip.style.display = "flex"; // Change to flex after initial display
        new_equip.style.alignItems = "center";
        newfleet_makemodel.style.display="block";
        newfleet_makemodel.style.display="flex";
        newfleet_makemodel.style.alignItems="center";

        newfleet_capinfo.style.display="block";
        newfleet_capinfo.style.display="flex";
        newfleet_capinfo.style.alignItems="center";

        newfleet_jib.style.display="block";
        newfleet_jib.style.display="flex";
        newfleet_jib.style.alignItems="center";

    }
    else{
        new_equip.style.display="none";
        newfleet_makemodel.style.display="none";
        newfleet_capinfo.style.display="none";
        newfleet_jib.style.display="none";
    }
}
 
function scroll_to_service()
{
    var section = document.getElementById('service_section_content');
    if (section) {
        var offset = section.offsetTop - 100; // Calculate scroll offset with margin of 200px
        window.scrollTo({
            top: offset,
            behavior: 'smooth' // Smooth scrolling behavior
        });
    }
}
function scroll_to_aboutus()
{
    var section = document.getElementById('abtus_content');
    if (section) {
        var offset = section.offsetTop - 100; // Calculate scroll offset with margin of 200px
        window.scrollTo({
            top: offset,
            behavior: 'smooth' // Smooth scrolling behavior
        });
    }
}
function scroll_to_contactus()
{
    var section = document.getElementById('footer_content');
    if (section) {
        var offset = section.offsetTop - 100; // Calculate scroll offset with margin of 200px
        window.scrollTo({
            top: offset,
            behavior: 'smooth' // Smooth scrolling behavior
        });
    }
}

function addfleetnew(){
    document.getElementById("newfleet_btn_add").style.display="block";
}
function view_op_screen(){
    document.getElementById("addop_new").style.display="block";
}
function shift_hour() {
    const select_shift = document.getElementById("select_shift");
    const single_Shift_hour = document.getElementById("single_Shift_hour");
    const othershift_enginehour = document.getElementById("othershift_enginehour");

    if (select_shift.value === 'Single Shift') {
        single_Shift_hour.style.display = 'block';
        othershift_enginehour.style.display = 'none'; // Hide the other shift hour input if it's visible
    } else if (select_shift.value === 'Double Shift' || select_shift.value === 'Triple Shift') {
        othershift_enginehour.style.display = 'block';
        single_Shift_hour.style.display = 'none'; // Hide the single shift hour input if it's visible
    } else {
        single_Shift_hour.style.display = 'none';
        othershift_enginehour.style.display = 'none';
    }
}
