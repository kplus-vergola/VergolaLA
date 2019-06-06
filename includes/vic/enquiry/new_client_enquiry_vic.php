<script src="<?php echo JURI::base().'jscript/jsapi.js'; ?>"></script>
<script src="<?php echo JURI::base().'jscript/jquery.min.js'; ?>"></script>
<!-- <script src="<?php echo JURI::base().'jscript/jquery-ui-1.11.4/jquery.js'; ?>"></script> -->
<script src="<?php echo JURI::base().'jscript/labels.js'; ?>"></script>
<script type="text/javascript" src="<?php echo JURI::base().'jscript/tabcontent.js'; ?>"></script>
<script charset="UTF-8" type="text/javascript" src="<?php echo JURI::base().'jscript/datetime/js/jquery-1.8.3.min.js'; ?>"></script>
<script type="text/javascript" src="<?php echo JURI::base().'jscript/datetime/js/bootstrap.min.js'; ?>"></script>
<script charset="UTF-8" type="text/javascript" src="<?php echo JURI::base().'jscript/datetime/js/bootstrap-datetimepicker.js'; ?>"></script>
<link rel="stylesheet" type="text/css" media="screen,projection" href="<?php echo JURI::base().'jscript/jquery-ui-1.11.4/jquery-ui.min.css'; ?>" /> 
<link rel="stylesheet" type="text/css" media="screen,projection" href="<?php echo JURI::base().'jscript/custom.css'; ?>" />
<link rel="stylesheet" type="text/css" media="screen,projection" href="<?php echo JURI::base().'jscript/new-enquiry.css'; ?>" />
<link rel="stylesheet" type="text/css" media="screen,projection" href="<?php echo JURI::base().'jscript/datetime/css/bootstrap.min.css'; ?>" />
<link rel="stylesheet" type="text/css" media="screen,projection" href="<?php echo JURI::base().'jscript/datetime/css/bootstrap-datetimepicker.min.css'; ?>" />
<?php
// date_default_timezone_set('America/Los_Angeles');
date_default_timezone_set('Australia/Victoria');
$notification = "";
$is_builder = 0;
$page_name = "";
$request = parse_url($_SERVER['REQUEST_URI']);
$page_name = substr($request["path"],1); 
//error_log($page, 3,'C:\\xampp\htdocs\\vergola_contract_system_v4_us\\my-error.log');
if($page_name == "new-builder-enquiry-vic"){
  $is_builder = 1;
}else if(isset($_REQUEST['client_type']) && $_REQUEST['client_type']=="b"){
    $is_builder = 1;
}
if(isset($_POST['update']) || isset($_POST['send_and_update']) )
{ 
  $is_builder = $_POST['is_builder'];
  //print_r($_POST);return;
  $pid = $_POST['pid'];
  $clientid = $_POST['clientid'];
  $ClientSuburbID = $_POST['csuburbid'] ;
  $ClientTitle = $_POST['ctitle'];
  $ClientFirstName = $_POST['firstname'];
  $ClientLastName = $_POST['lastname'];
  $ClientAddress1 = $_POST['caddress1'];
  $ClientAddress2 = $_POST['caddress2'];
  $ClientSuburb = $_POST['client_suburb'];
  $ClientState = $_POST['client_state'];
  $ClientPostCode = $_POST['client_postcode'];
  $ClientWPhone = $_POST['cwkphone'];
  $ClientHPhone = $_POST['chmphone'];
  $ClientMobile = $_POST['cmobile'];
  $ClientOther = $_POST['cother'];
  $ClientEmail = $_POST['cemail'];
  $builder_name = $_POST['builder_name'];
  $builder_contact = $_POST['builder_contact']; 
  $SiteTitle = $_POST['stitle'];
  $SiteFirstName = $_POST['sfirstname'];
  $SiteLastName = $_POST['slastname'];
  $SiteAddress1 = $_POST['saddress1'];
  $SiteAddress2 = $_POST['saddress2'];
  $SiteSuburbID = $_POST['ssuburbid'];
  $SiteSuburb = $_POST['site_suburb'];
  $SiteState = $_POST['site_state'];
  $SitePostcode = $_POST['site_postcode'];
  $SiteWKPhone = $_POST['swkphone'];
  $SiteHMPhone = $_POST['shmphone'];
  $SiteMobile = $_POST['smobile'];
  $SiteOther = $_POST['sother'];
  $SiteEmail = $_POST['semail'];
  $date =  $_POST['idate'];
  $timestamp = date('Y-m-d H:i:s', strtotime($date)); 
  $DateLodged = $timestamp;
  if(empty($_POST['dtp_appointment'])==true || $_POST['dtp_appointment']=="0000-00-00 00:00:00")
     $AppointmentLodged = "NULL";
  else
    $AppointmentLodged = "'".$_POST['dtp_appointment']."'";
  // $RepID = $_POST['repid'];
  // $RepIdent = $_POST['repident'];
  // $RepName = $_POST['repname'];
  $RepID = $_POST['rep_id'];
  $RepIdent = $_POST['rep_ident'];
  $RepName = $_POST['rep_name'];
  $RepEmail = $_POST['repemail'];
  // $LeadID = $_POST['leadid'];
  // $LeadName = $_POST['leadname'];
  $LeadID = $_POST['lead_id'];
  $LeadName = $_POST['lead_name'];
  $EmployeeID = $_POST['username'];
  $lastRepId = $_POST['lastRepId']; 
$sql = "UPDATE ver_chronoforms_data_clientpersonal_vic SET
                client_suburbid = '" . mysql_real_escape_string($ClientSuburbID) . "', 
                client_title = '" . mysql_real_escape_string($ClientTitle) . "', 
                client_firstname = '" . mysql_real_escape_string($ClientFirstName) . "', 
                client_lastname = '" . mysql_real_escape_string($ClientLastName) . "',
                builder_name = '" . mysql_real_escape_string($builder_name) . "', 
                builder_contact = '" . mysql_real_escape_string($builder_contact) . "', 
                client_address1 = '" . mysql_real_escape_string($ClientAddress1) . "', 
                client_address2 = '" . mysql_real_escape_string($ClientAddress2) . "', 
                client_suburb = '" . mysql_real_escape_string($ClientSuburb) . "', 
                client_state = '" . mysql_real_escape_string($ClientState) . "', 
                client_postcode = '" . mysql_real_escape_string($ClientPostCode) . "', 
                client_wkphone = '" . mysql_real_escape_string($ClientWPhone) . "', 
                client_hmphone = '" . mysql_real_escape_string($ClientHPhone) . "', 
                client_mobile = '" . mysql_real_escape_string($ClientMobile) . "', 
                client_other = '" . mysql_real_escape_string($ClientOther) . "', 
                client_email = '" . mysql_real_escape_string($ClientEmail) . "', 
                site_suburbid = '" . mysql_real_escape_string($SiteSuburbID) . "',
                site_title = '" . mysql_real_escape_string($SiteTitle) . "',
                site_firstname = '" . mysql_real_escape_string($SiteFirstName) . "',
                site_lastname = '" . mysql_real_escape_string($SiteLastName) . "',
                site_address1 = '" . mysql_real_escape_string($SiteAddress1) . "',
                site_address2 = '" . mysql_real_escape_string($SiteAddress2) . "',
                site_suburb = '" . mysql_real_escape_string($SiteSuburb) . "',
                site_state = '" . mysql_real_escape_string($SiteState) . "',
                site_postcode = '" . mysql_real_escape_string($SitePostcode) . "',
                site_wkphone = '" . mysql_real_escape_string($SiteWKPhone) . "',
                site_hmphone = '" . mysql_real_escape_string($SiteHMPhone) . "',
                site_mobile = '" . mysql_real_escape_string($SiteMobile) . "',
                site_other = '" . mysql_real_escape_string($SiteOther) . "',
                site_email = '" . mysql_real_escape_string($SiteEmail) . "',  
                repid = '" . mysql_real_escape_string($RepID) . "',
                repident = '" . mysql_real_escape_string($RepIdent) . "',
                repname = '" . mysql_real_escape_string($RepName) . "',
                leadid = '" . mysql_real_escape_string($LeadID) . "',
                leadname = '" . mysql_real_escape_string($LeadName) . "',
                appointmentdate = $AppointmentLodged,
                employeeid = '" . mysql_real_escape_string($EmployeeID) . "',
                lastRepId = '" . mysql_real_escape_string($lastRepId) . "' 
        WHERE pid={$pid};         
      ";
  //error_log($sql, 3,'C:\\xampp\htdocs\\vergola_contract_system_v4_us\\my-error.log'); exit();
  mysql_query($sql);
  //   $sql = "SELECT *, DATE_FORMAT(datelodged,'%d-%b-%Y') fdatelodged, DATE_FORMAT(appointmentdate,'%d-%b-%Y @ %h:%i %p') fappointmentdate  FROM ver_chronoforms_data_clientpersonal_vic WHERE clientid='{$client_id}' ";
  // $client = mysql_fetch_assoc(mysql_query($sql)); 
  $mail_result = send_email();
  //error_log("mail_result: ".$mail_result, 3,'C:\\xampp\htdocs\\vergola_contract_system_v4_us\\my-error.log');
  $notification = "Successfully saved.";
  if($is_builder){
    header('Location:'.JURI::base().'builder-listing-vic/builder-folder-vic?cid='.$clientid);
  }else{
    //header('Location:'.JURI::base().'new-client-enquiry-vic?pid='.$pid); 
    header("Location:".JURI::base()."client-listing-vic/client-folder-vic?cid={$clientid}"); 
  }
  return; 
  //  if(isset($_REQUEST['ref']) && $_REQUEST['ref']=="home"){
  //   header('Location:'.JURI::base());
  // }else if($is_builder){
  //   header('Location:'.JURI::base().'builder-listing-vic/builder-folder-vic?pid='.$next_increment);
  //   return;
  // }else{
  //   header('Location:'.JURI::base().'client-listing-vic/client-folder-vic?pid='.$next_increment);
  //   return; 
}
else if(isset($_POST['save']) || isset($_POST['sendmail'])){    
$next_increment = 0;
$qShowStatus = "SHOW TABLE STATUS LIKE 'ver_chronoforms_data_clientpersonal_vic'";
$qShowStatusResult = mysql_query($qShowStatus) or die ( "Query failed: " . mysql_error() . "<br/>" . $qShowStatus );
$row = mysql_fetch_assoc($qShowStatusResult);
$next_increment = $row['Auto_increment'];
$client_code = "";
if(HOST_SERVER=="Victoria"){
  $client_code = "CRV";
}else if(HOST_SERVER=="SA"){
  $client_code = "CR";
}else if(HOST_SERVER=="LA"){
  $client_code = "CRC";
}
  $getclientid = $client_code.$next_increment;
  $ClientID = $client_code.$row['Auto_increment'];
  $ClientSuburbID = $_POST['csuburbid'] ;
  $ClientTitle = $_POST['ctitle'];
  $ClientFirstName = $_POST['firstname'];
  $ClientLastName = $_POST['lastname'];
  $ClientAddress1 = $_POST['caddress1'];
  $ClientAddress2 = $_POST['caddress2'];
  $ClientSuburb = $_POST['client_suburb'];
  $ClientState = $_POST['client_state'];
  $ClientPostCode = $_POST['client_postcode'];
  $ClientWPhone = $_POST['cwkphone'];
  $ClientHPhone = $_POST['chmphone'];
  $ClientMobile = $_POST['cmobile'];
  $ClientOther = $_POST['cother'];
  $ClientEmail = $_POST['cemail'];
  $SiteTitle = $_POST['stitle'];
  $SiteFirstName = $_POST['sfirstname'];
  $SiteLastName = $_POST['slastname'];
  $SiteAddress1 = $_POST['saddress1'];
  $SiteAddress2 = $_POST['saddress2'];
  $SiteSuburbID = $_POST['ssuburbid'];
  $SiteSuburb = $_POST['site_suburb'];
  $SiteState = $_POST['site_state'];
  $SitePostcode = $_POST['site_postcode'];
  $SiteWKPhone = $_POST['swkphone'];
  $SiteHMPhone = $_POST['shmphone'];
  $SiteMobile = $_POST['smobile'];
  $SiteOther = $_POST['sother'];
  $SiteEmail = $_POST['semail'];
  $date =  $_POST['idate']; 
  $timestamp = date('Y-m-d H:i:s', strtotime($date)); 
  $DateLodged = $timestamp; 
  if(empty($_POST['dtp_appointment'])==true || $_POST['dtp_appointment']=="0000-00-00 00:00:00")
      $AppointmentLodged = "NULL";
  else
    $AppointmentLodged = "'".$_POST['dtp_appointment']."'";
  // $RepID = $_POST['repid'];
  // $RepIdent = $_POST['repident'];
  // $RepName = $_POST['repname'];
  $RepID = $_POST['rep_id'];
  $RepIdent = $_POST['rep_ident'];
  $RepName = $_POST['rep_name'];
  $RepEmail = $_POST['repemail'];
  // $LeadID = $_POST['leadid'];
  // $LeadName = $_POST['leadname'];
  $LeadID = $_POST['lead_id'];
  $LeadName = $_POST['lead_name'];
  $EmployeeID = $_POST['username'];
  $lastRepId = $_POST['lastRepId']; 
  $builder_name = $_POST['builder_name'];
  $builder_contact = $_POST['builder_contact']; 
  $is_builder = $_POST['is_builder'];
$sql = "INSERT INTO ver_chronoforms_data_clientpersonal_vic
               (clientid,
                              client_suburbid, 
                              client_title, 
                              client_firstname, 
                              client_lastname, 
                              client_address1, 
                              client_address2, 
                              client_suburb, 
                              client_state, 
                              client_postcode, 
                              client_wkphone, 
                              client_hmphone, 
                              client_mobile, 
                              client_other, 
                              client_email,  
                              site_suburbid,
                              site_title,
                              site_firstname,
                              site_lastname,
                              site_address1,
                              site_address2,
                              site_suburb,
                              site_state,
                              site_postcode,
                              site_wkphone,
                              site_hmphone,
                              site_mobile,
                              site_other,
                              site_email,
                              datelodged,
                              repid,
                              repident,
                              repname,
                              leadid,
                              leadname,
                              appointmentdate,
                              employeeid,
                lastRepId,
                builder_name,
                builder_contact,
                is_builder) 
         VALUES ('" . mysql_real_escape_string($ClientID) . "',
                 '" . mysql_real_escape_string($ClientSuburbID) . "', 
                 '" . mysql_real_escape_string($ClientTitle) . "', 
                 '" . mysql_real_escape_string($ClientFirstName) . "', 
                 '" . mysql_real_escape_string($ClientLastName) . "', 
                 '" . mysql_real_escape_string($ClientAddress1) . "', 
                 '" . mysql_real_escape_string($ClientAddress2) . "', 
                 '" . mysql_real_escape_string($ClientSuburb) . "', 
                 '" . mysql_real_escape_string($ClientState) . "', 
                 '" . mysql_real_escape_string($ClientPostCode) . "', 
                 '" . mysql_real_escape_string($ClientWPhone) . "', 
                 '" . mysql_real_escape_string($ClientHPhone) . "', 
                 '" . mysql_real_escape_string($ClientMobile) . "', 
                 '" . mysql_real_escape_string($ClientOther) . "', 
                 '" . mysql_real_escape_string($ClientEmail) . "',
                 '" . mysql_real_escape_string($SiteSuburbID) . "',
                 '" . mysql_real_escape_string($SiteTitle) . "',
                 '" . mysql_real_escape_string($SiteFirstName) . "',
                 '" . mysql_real_escape_string($SiteLastName) . "',
                 '" . mysql_real_escape_string($SiteAddress1) . "',
                 '" . mysql_real_escape_string($SiteAddress2) . "',
                 '" . mysql_real_escape_string($SiteSuburb) . "',
                 '" . mysql_real_escape_string($SiteState) . "',
                 '" . mysql_real_escape_string($SitePostcode) . "',
                 '" . mysql_real_escape_string($SiteWKPhone) . "',
                 '" . mysql_real_escape_string($SiteHMPhone) . "',
                 '" . mysql_real_escape_string($SiteMobile) . "',
                 '" . mysql_real_escape_string($SiteOther) . "',
                 '" . mysql_real_escape_string($SiteEmail) . "',
                 '" . mysql_real_escape_string($DateLodged) . "',
                 '" . mysql_real_escape_string($RepID) . "',
                 '" . mysql_real_escape_string($RepIdent) . "',
                 '" . mysql_real_escape_string($RepName) . "',
                 '" . mysql_real_escape_string($LeadID) . "',
                 '" . mysql_real_escape_string($LeadName) . "',                 
                  $AppointmentLodged,
				 '" . mysql_real_escape_string($EmployeeID) . "',
                 '" . mysql_real_escape_string($lastRepId) . "',
                 '" . mysql_real_escape_string($builder_name) . "',
                 '" . mysql_real_escape_string($builder_contact) . "',
                 '" . mysql_real_escape_string($is_builder) . "')";
//error_log($sql, 3,'C:\\xampp\htdocs\\vergola_contract_system_v4_us\\my-error.log'); exit();
mysql_query($sql);
$result_id  = mysql_insert_id();
$NotesTxt =  $_POST['notestxt'];
//$DateNotes = $_POST['date_notes'];
$UsernameNotes = $_POST['username_notes'];  
if(strlen($NotesTxt)>0){
  mysql_query(
    "
    INSERT INTO ver_chronoforms_data_notes_vic (clientid, username, content)  
    VALUES (
    '" . mysql_real_escape_string($getclientid) . "', 
    '" . mysql_real_escape_string($UsernameNotes) . "',
    '" . mysql_real_escape_string($NotesTxt) . "'
    )"
  );
}
//This is the Time Save 
$now = time();  
if(isset($_FILES['photo'])){ 
    foreach ($_FILES['photo']['tmp_name'] as $key => $tmp_name){
//This is the directory where images will be saved 
		$file_name = pathinfo($_FILES['photo']['name'][$key], PATHINFO_FILENAME).'.'.pathinfo($_FILES['photo']['name'][$key], PATHINFO_EXTENSION); 
        $target="images/drawings/$now-";
        $target=$target.$_FILES['photo']['name'][$key]; 
        if (move_uploaded_file($tmp_name, $target)) {
$query = "INSERT INTO ver_chronoforms_data_drawings_vic (clientid, photo, file_name) VALUES  ('" . mysql_real_escape_string($getclientid) . "', '" . mysql_real_escape_string($target) . "', '" . mysql_real_escape_string($file_name) . "')";
//$query = "INSERT INTO ver_chronoforms_data_drawings_vic (clientid, photo, file_name) VALUES  ('$ClientID', '$target','{$file_name}')";
 mysql_query($query) or trigger_error("Insert failed: " . mysql_error());
            }
    }
}
 $mail_result = send_email();
  //error_log("mail_result: ".$mail_result, 3,'C:\\xampp\htdocs\\vergola_contract_system_v4_us\\my-error.log');
   // mail($from,$subject2,$message2,$headers2); // sends a copy of the message to the sender
    //echo "Mail Sent. To " . $_POST['repname'];
    // You can also use header('Location: thank_you.php'); to redirect to another page.   
  if($result_id<1){
    if($is_builder){
      header('Location:'.JURI::base().'new-builder-enquiry-vic?error=1'); 
    }else{
      header('Location:'.JURI::base().'new-client-enquiry-vic?error=1'); 
    } 
  }else if(isset($_REQUEST['ref']) && $_REQUEST['ref']=="home"){
    header('Location:'.JURI::base());
  }else if($is_builder){
    header('Location:'.JURI::base().'builder-listing-vic/builder-folder-vic?pid='.$next_increment);
    return;
  }else{
    header('Location:'.JURI::base().'client-listing-vic/client-folder-vic?pid='.$next_increment);
    return; 
  }
}
function send_email(){
    $to = $_POST['repemail']; // this is the Sales Rep Email address
    $from = $_POST['usermail']; // this is the sender's Email address 
    $first_name = $_POST['firstname'];
    $last_name = $_POST['lastname'];
    $subject = "New Enquiry";
    $subject2 = "Copy of your New Enquiry";
  // Email to the Sales Rep
  $message = "<table cellpadding=\"0\" cellspacing=\"0\" style=\"border-top: 1px solid #999;width:550px; font-family:calibri; font-size:13px;\">
  <tr>
    <td style=\"width:120px;border-bottom: 1px solid #999;border-left: 1px solid #999;padding:5px;\"><img src='".JURI::base().'images/vergola-email-logo.png'."'></td>
    <td style=\"border-bottom: 1px solid #999;border-right: 1px solid #999;border-left: 1px solid #999;padding:5px;\">Enquiry Date: " .$_POST['idate']. "</td>
  </tr>
  <tr>
    <td style=\"border-bottom: 1px solid #999;border-left: 1px solid #999;padding:5px;\">From</td>
    <td style=\"border-bottom: 1px solid #999;border-right: 1px solid #999;border-left: 1px solid #999;padding:5px;\">" . $_POST['username'] . "</td>
  </tr>
  <tr>
    <td style=\"border-bottom: 1px solid #999;border-left: 1px solid #999;padding:5px;\">Sales Rep</td>
    <td style=\"border-bottom: 1px solid #999;border-right: 1px solid #999;border-left: 1px solid #999;padding:5px;\">" . $_POST['repname'] . "</td>
  </tr>
  <tr>
    <td style=\"border-bottom: 1px solid #999;border-left: 1px solid #999;padding:5px;\">Client</td>
    <td style=\"border-bottom: 1px solid #999;border-right: 1px solid #999;border-left: 1px solid #999;padding:5px;\">" . $_POST['firstname'] . " " . $_POST['lastname']. "</td>
  </tr>
  <tr>
    <td style=\"border-bottom: 1px solid #999;border-left: 1px solid #999;padding:5px;\">Address</td>
    <td style=\"border-bottom: 1px solid #999;border-right: 1px solid #999;border-left: 1px solid #999;padding:5px;\">" . $_POST['saddress1'] . " " . $_POST['saddress2'] . ", " . $_POST['site_suburb'] . " " . $_POST['site_state'] . " " . $_POST['site_postcode'] . "</td>
  </tr>
  <tr>
    <td style=\"border-bottom: 1px solid #999;border-left: 1px solid #999;padding:5px;\">Phone</td>
    <td style=\"border-bottom: 1px solid #999;border-right: 1px solid #999;border-left: 1px solid #999;padding:5px;\">" . $_POST['chmphone'] ."</td>
  </tr>
  <tr>
    <td style=\"border-bottom: 1px solid #999;border-left: 1px solid #999;padding:5px;\">Mobile</td>
    <td style=\"border-bottom: 1px solid #999;border-right: 1px solid #999;border-left: 1px solid #999;padding:5px;\">" . $_POST['cmobile'] . "</td>
  </tr>
  <tr>
    <td style=\"border-bottom: 1px solid #999;border-left: 1px solid #999;padding:5px;\">Email</td>
    <td style=\"border-bottom: 1px solid #999;border-right: 1px solid #999;border-left: 1px solid #999;padding:5px;\">" . $_POST['cemail'] . "</td>
  </tr>
  <tr>
    <td style=\"border-bottom: 1px solid #999;border-left: 1px solid #999;padding:5px;\">Drawing</td>
    <td style=\"border-bottom: 1px solid #999;border-right: 1px solid #999;border-left: 1px solid #999;padding:5px;\">" . $_POST['checkfile'] . "</td>
  </tr>
  <tr>
    <td style=\"border-bottom: 1px solid #999;border-left: 1px solid #999;padding:5px;\">Note</td>
    <td style=\"border-bottom: 1px solid #999;border-right: 1px solid #999;border-left: 1px solid #999;padding:5px;\">" . $_POST['notestxt'] . "</td>
  </tr>
</table>";
  //Email copy of the Sender
  $message2 = "<table cellpadding=\"0\" cellspacing=\"0\" style=\"border-top: 1px solid #999;min-width:600px;font-family:calibri; font-size:13px;\">
  <tr>
    <td style=\"border-bottom: 1px solid #999;border-left: 1px solid #999;padding:5px;\">Date of Enquiry</td>
    <td style=\"border-bottom: 1px solid #999;border-right: 1px solid #999;border-left: 1px solid #999;padding:5px;\">" .$_POST['idate']. "</td>
  </tr>
  <tr>
    <td style=\"border-bottom: 1px solid #999;border-left: 1px solid #999;padding:5px;\">From:</td>
    <td style=\"border-bottom: 1px solid #999;border-right: 1px solid #999;border-left: 1px solid #999;padding:5px;\">" . $_POST['username'] . "</td>
  </tr>
  <tr>
    <td style=\"border-bottom: 1px solid #999;border-left: 1px solid #999;padding:5px;\">To: </td>
    <td style=\"border-bottom: 1px solid #999;border-right: 1px solid #999;border-left: 1px solid #999;padding:5px;\">" . $_POST['repname'] . "</td>
  </tr>
  <tr>
    <td style=\"border-bottom: 1px solid #999;border-left: 1px solid #999;padding:5px;\">Client:</td>
    <td style=\"border-bottom: 1px solid #999;border-right: 1px solid #999;border-left: 1px solid #999;padding:5px;\">" . $_POST['firstname'] . " " . $_POST['lastname']. "</td>
  </tr>
  <tr>
    <td style=\"border-bottom: 1px solid #999;border-left: 1px solid #999;padding:5px;\">Address: </td>
    <td style=\"border-bottom: 1px solid #999;border-right: 1px solid #999;border-left: 1px solid #999;padding:5px;\">" . $_POST['saddress1'] . " " . $_POST['saddress2'] . ", " . $_POST['site_suburb'] . " " . $_POST['site_state'] . " " . $_POST['site_postcode'] . "</td>
  </tr>
  <tr>
    <td style=\"border-bottom: 1px solid #999;border-left: 1px solid #999;padding:5px;\">Phone: </td>
    <td style=\"border-bottom: 1px solid #999;border-right: 1px solid #999;border-left: 1px solid #999;padding:5px;\">" . $_POST['chmphone'] ."</td>
  </tr>
  <tr>
    <td style=\"border-bottom: 1px solid #999;border-left: 1px solid #999;padding:5px;\">Mobile: </td>
    <td style=\"border-bottom: 1px solid #999;border-right: 1px solid #999;border-left: 1px solid #999;padding:5px;\">" . $_POST['cmobile'] . "</td>
  </tr>
  <tr>
    <td style=\"border-bottom: 1px solid #999;border-left: 1px solid #999;padding:5px;\">Email: </td>
    <td style=\"border-bottom: 1px solid #999;border-right: 1px solid #999;border-left: 1px solid #999;padding:5px;\">" . $_POST['cemail'] . "</td>
  </tr>
 <tr>
    <td style=\"border-bottom: 1px solid #999;border-left: 1px solid #999;padding:5px;\">Drawing</td>
    <td style=\"border-bottom: 1px solid #999;border-right: 1px solid #999;border-left: 1px solid #999;padding:5px;\">" . $_POST['checkfile'] . "</td>
  </tr>
  <tr>
    <td style=\"border-bottom: 1px solid #999;border-left: 1px solid #999;padding:5px;\">Note: </td>
    <td style=\"border-bottom: 1px solid #999;border-right: 1px solid #999;border-left: 1px solid #999;padding:5px;\">" . $_POST['notestxt'] . "</td>
  </tr>
</table>";
    $headers = "From:" . $from. "\r\n";
  $headers .= "MIME-Version: 1.0\r\n";
  $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
   // $headers2 = "From:" . $to. "\r\n";
  //$headers2 .= "MIME-Version: 1.0\r\n";
  //$headers2 .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
  return $mail_result = mail($to,$subject,$message,$headers);
}
//if(isset($_POST['cancel']))
//{ 
//  header('Location:'.JURI::base().'client-listing-vic');          
//}
$is_edit = 0;
if(isset($_REQUEST['pid']))
{ 
  $is_edit = 1;
  $pid = mysql_real_escape_string($_REQUEST['pid']);
  //if(substr($client_id, 0,3)=="CRV"){
  $sql = "SELECT *, DATE_FORMAT(datelodged,'" . SQL_DATE_FORMAT_01 . "') fdatelodged, DATE_FORMAT(appointmentdate,'" . SQL_DATETIME_FORMAT_01 . "') fappointmentdate  FROM ver_chronoforms_data_clientpersonal_vic WHERE pid={$pid} ";
  $client = mysql_fetch_assoc(mysql_query($sql));
  $is_builder = $client['is_builder'];
  if($client == null){
    echo "Can't find client.";
    return;
  }
  //$pid=$client['pid'];
  //print_r($client);  
}
$user =& JFactory::getUser();
?>
<?php 
  $form->data['date_entered'] = date(PHP_DFORMAT);
  $form->data['date_time'] = date(PHP_DFORMAT.' g:i A');
?>
<SCRIPT language="javascript">
        function addRow(tableID) {
            var table = document.getElementById(tableID);
            var rowCount = table.rows.length;
            var row = table.insertRow(rowCount);
            var colCount = table.rows[0].cells.length;
            for(var i=0; i<colCount; i++) { 
                var newcell = row.insertCell(i);
                newcell.innerHTML = table.rows[0].cells[i].innerHTML;
                //alert(newcell.childNodes);
                switch(newcell.childNodes[0].type) {
                    case "text":
                            newcell.childNodes[0].value = "";
                            break;
                    case "checkbox":
                            newcell.childNodes[0].checked = false;
                            break;
                    case "select-one":
                            newcell.childNodes[0].selectedIndex = 0;
                            break;
                }
            }
        }
        function deleteRow(tableID) {
            try {
            var table = document.getElementById(tableID);
            var rowCount = table.rows.length;
            for(var i=0; i<rowCount; i++) {
                var row = table.rows[i];
                var chkbox = row.cells[0].childNodes[0];
                if(null != chkbox && true == chkbox.checked) {
                    if(rowCount <= 1) {
                        alert("Cannot delete all the rows.");
                        break;
                    }
                    table.deleteRow(i);
                    rowCount--;
                    i--;
                }
            }
            }catch(e) {
                alert(e);
            }
        }
</SCRIPT>
<script language="javascript">
    function addRowEntry(tableID)
    {
      var table = document.getElementById(tableID);
      var rowCount = table.rows.length;
      // create a row element
      var row = document.createElement("tr");
      // add the row to the table
      table.appendChild(row);
      var colCount = table.rows[0].cells.length;
      for(var i=0; i<colCount; i++) 
      {
       var newcell = row.insertCell(i);
       newcell.innerHTML = table.rows[0].cells[i].innerHTML;
      }
    }
</script>
<!--- Copy Site Address Script -->
<script language="javascript">
//<![CDATA[
$(window).load(function(){
$('#sbtn').click(function(){
$('#ssuburb_id').val($('#csuburb_id').val());
$('#stitle').val($('#ctitle').val());
$('#stitlespan').css("visibility", "hidden");
$('#sfirstname').val($('#firstname').val());
$('#sfirstnamespan').css("visibility", "hidden");
$('#slastname').val($('#lastname').val());
$('#slastnamespan').css("visibility", "hidden");
$('#saddress1').val($('#caddress1').val());
$('#saddress1span').css("visibility", "hidden");
$('#saddress2').val($('#caddress2').val());
$('#saddress2span').css("visibility", "hidden");
$('#ssuburblist').val($('#csuburblist').val());
$('#ssuburblistspan').css("visibility", "hidden");
$('#ssuburb').val($('#csuburb').val());
$('#ssuburbstate').val($('#csuburbstate').val());
$('#sstatespan').css("visibility", "hidden");
$('#ssuburbpostcode').val($('#csuburbpostcode').val());
$('#spostspan').css("visibility", "hidden");
$('#swkphone').val($('#cwkphone').val());
$('#swkphonespan').css("visibility", "hidden");
$('#shmphone').val($('#chmphone').val());
$('#shmphonespan').css("visibility", "hidden");
$('#smobile').val($('#cmobile').val());
$('#smobilespan').css("visibility", "hidden");
$('#sother').val($('#cother').val());
$('#sotherspan').css("visibility", "hidden");
$('#semail').val($('#cemail').val());
$('#semailspan').css("visibility", "hidden");
});
$('#csuburb').change(function(){
  if($(this).val() == ''){ // or this.value == 'blank'
    $('#client input#csuburbstate').val($('#blank').val());
    $('#client input#csuburbpostcode').val($('#blank').val());
  }
});
$('#ssuburb').change(function(){
  if($(this).val() == ''){ // or this.value == 'blank'
    $('#ssuburb input#ssuburbstate').val($('#blank').val());
    $('#ssuburb input#ssuburbpostcode').val($('#blank').val());
  }
});
$('#bsbtn').click(function(){
        if($("#uploadme").val()=='') {
            $("#checkfile").val('No');
        } else {
            $("#checkfile").val('Yes');
        }
    });
$('#ibtn').click(function(){
        if($("#uploadme").val()=='') {
            $("#checkfile").val('No');
        } else {
            $("#checkfile").val('Yes');
        }
    });
});//]]>
</script>
<script src="<?php echo JURI::base().'jscript/jquery-ui.min.js'; ?>" type="text/javascript"></script>
<style>
    .ui-autocomplete {
        max-height: 200px;
        overflow-y: auto;
        overflow-x: hidden;
        padding-right: 20px;
    }
</style>
<script type="text/javascript">
    $(document).ready(function() {
        var client_config = {
            source: function(request, response) {
                $.ajax({
                    url: "includes/vic/suburb_vic.php", 
                    dataType: "json", 
                    cache: false, 
                    type: "get", 
                    data: {term: request.term}
                }).done(function(data) {
                    response(data);
                });
            }, 
            select: function(event, ui) {
                $("#csuburb").val(ui.item.suburb);
                $("#csuburbstate").val(ui.item.suburb_state);
                $("#csuburbpostcode").val(ui.item.suburb_postcode);
                $("#csuburb_id").val(ui.item.cf_id);
            },
            minLength:2
        };
        $("#csuburb").autocomplete(client_config);
        var site_config = {
            source: function(request, response) {
                $.ajax({
                    url: "includes/vic/suburb_vic.php", 
                    dataType: "json", 
                    cache: false, 
                    type: "get", 
                    data: {term: request.term}
                }).done(function(data) {
                    response(data);
                });
            }, 
            select: function(event, ui) {
                $("#ssuburb").val(ui.item.suburb);
                $("#ssuburbstate").val(ui.item.suburb_state);
                $("#ssuburbpostcode").val(ui.item.suburb_postcode);
                $("#ssuburb_id").val(ui.item.cf_id);
            },
            minLength:2
        };
        $("#ssuburb").autocomplete(site_config);
        $("#csuburbstate").keypress(function() {
            $("#notification").html("Please choose a suburb in the autocomplete box.");   
            //$("#notification").appendTo("."+dataClass+" .notification-area");
            $("#notification").removeClass('hide');  
            $("#notification").show(); 
            setTimeout(
                function() {
                    $( "#notification" ).hide( "slow" );
                }, 
                7000
            );
            $("#csuburb").css({"border-color": "red"});
            $("#csuburb").on("change", function() {
                $(this).css({"border-color": "#97989a"});
            });
            $("#csuburb").text(""); 
            $("#csuburb").focus(); 
        });
        $("#ssuburbstate").keypress(function() {
            $("#notification").html("Please choose a suburb in the autocomplete box.");   
            //$("#notification").appendTo("."+dataClass+" .notification-area");
            $("#notification").removeClass('hide');  
            $("#notification").show(); 
            setTimeout(
                function() {
                    $( "#notification" ).hide( "slow" );
                }, 
                7000
            );
            $("#ssuburb").css({"border-color": "red"});
            $("#ssuburb").on("change", function() {
                $(this).css({"border-color": "#97989a"});
            });
            $("#ssuburb").text(""); 
            $("#ssuburb").focus(); 
        });
    });
</script>
<script>
function csuburbchange(){
    document.getElementById('cstateid').style.visibility = 'hidden';
    document.getElementById('cpostid').style.visibility = 'hidden';
}
function ssuburbchange(){
    document.getElementById('sstatespan').style.visibility = 'hidden';
    document.getElementById('spostspan').style.visibility = 'hidden';
}
</script>
<div id="notification" class="notification_box hide"  ></div>
<form method="post" action="<?php echo JURI::base().'new-client-enquiry-vic/'; ?>" class="Chronoform hasValidation" id="chronoform_New_Client_Enquiry_Vic" enctype="multipart/form-data">
<?php
  if(strlen($notification)>0)
  { 
    echo set_notification($notification);     
  }
function set_notification($msg){
  return "<div class='notification_result'>{$msg}</div>";
} 
?>   
<input type="hidden" value="" id="blank" name="blank" />
  <input type="hidden" value="<?php if($is_edit){echo $client['pid'];} ?>" id="" name="pid" />
  <input type='hidden' name='is_builder'  value="<?php echo $is_builder; ?>" / >
  <div class="column-left"></div>
  <div class="column-right"></div>
  <div id="tabs_wrapper" class="client-builder-tab">
    <div id="tabs_container">
      <ul id="tabs_default">
    <li class="active"><span><?php echo ($is_builder==0?"Client":"Builder"); ?></span></li>      
      </ul>
    </div>
    <div id="tabs_content_container"> 
      <!-- Client Tab -->
      <div id="client" class="tab_content" style="display: block;">
        <input type="hidden" value="<?php echo $client['clientid'] ?>" name="clientid"> 
        <?php if($is_builder==0){ ?>
           <input type="hidden" value="<?php echo $is_builder; ?>" name="is_builder">
        <label class="input"> <span><?php if($is_edit==0) echo "Title"; ?></span>
          <select class="title" id='ctitle' name='ctitle'>
            <option ></option>
            <option value="Mr" <?php echo ($client['client_title']=="Mr"?"selected":""); ?> >Mr</option>
            <option value="Mrs" <?php echo ($client['client_title']=="Mrs"?"selected":""); ?> >Mrs</option>
            <option value="Ms" <?php echo ($client['client_title']=="Ms"?"selected":""); ?>>Ms</option>
            <option value="Dr" <?php echo ($client['client_title']=="Dr"?"selected":""); ?>>Dr</option>
            <option value="Prof." <?php echo ($client['client_title']=="Prof."?"selected":""); ?>>Prof.</option>
          </select>
        </label>  
        <label class="input"><span>First Name</span>
          <input type="text" value="<?php echo $client['client_firstname'] ?>" id="firstname" name="firstname" >
        </label>
        <label class="input"><span>Last Name</span>
          <input type="text" value="<?php echo $client['client_lastname'] ?>" id="lastname" name="lastname">
        </label>
        <?php }else{ ?>
           <input type="hidden" value="<?php echo $is_builder; ?>" name="is_builder">
          <label class="input"><span>Builder Name</span>
            <input type="text" value="<?php echo $client['builder_name'] ?>" id="builder_name" name="builder_name" >
          </label>
          <label class="input"><span>Builder Contact</span>
            <input type="text" value="<?php echo $client['builder_contact'] ?>" id="builder_contact" name="builder_contact">
          </label> 
        <?php } ?>  
        <label class="input"><span>Address 1</span>
          <input type="text" value="<?php echo $client['client_address1'] ?>" id="caddress1" name="caddress1">
        </label>
        <label class="input"><span>Address 2</span>
          <input type="text" value="<?php echo $client['client_address2'] ?>" id="caddress2" name="caddress2">
        </label>
        <!--- Client Suburb -->
        <label class="input"><span>Suburb</span>
          <input type="text" id="csuburb" name="client_suburb" value="<?php echo $client['client_suburb'] ?>"  onkeypress="csuburbchange();" />
        </label>
        <input type="hidden" id="csuburb_id" name="csuburbid" value="<?php echo $client['client_suburbid'] ?>" readonly />
        <label class="input"><span id="cstateid">State</span>
          <input type="text" id="csuburbstate" name="client_state" value="<?php echo $client['client_state'] ?>" readonly />
        </label>
        <label class="input"><span id="cpostid"><?php echo (METRIC_SYSTEM=="inch"?"Zipcode":"Postcode"); ?></span>
          <input type="text" id="csuburbpostcode" name="client_postcode" value="<?php echo $client['client_postcode'] ?>" readonly />
        </label>
        <!-- End of Client Suburb -->
        <!-- <label class="input"><span>Home Phone</span>
          <input type="text" value="<?php echo $client['client_hmphone'] ?>" id="chmphone" name="chmphone">
        </label> -->
        <label class="input"><span>Work Phone</span>
          <input type="text" value="<?php echo $client['client_wkphone'] ?>" id="cwkphone" name="cwkphone">
        </label>
        <label class="input"><span>Mobile</span>
          <input type="text" value="<?php echo $client['client_mobile'] ?>" id="cmobile" name="cmobile">
        </label>
        <label class="input"><span>Other</span>
          <input type="text" value="<?php echo $client['client_other'] ?>" id="cother" name="cother">
        </label>
        <label class="input"><span>Email</span>
          <input type="text" value="<?php echo $client['client_email'] ?>" id="cemail" name="cemail">
        </label>
      </div>
    </div>
  </div>
  <!----------------------------------------------------- Site Address Tab -->
  <div id="tabs_wrapper" class="siteadd-tab">
    <div id="tabs_container">
      <ul id="tabs_default">
        <li class="active"><span>Site Address</span></li>
      </ul>
    </div>
    <div id="tabs_content_container">
      <div id="site-address" class="tab_content_default" style="display: block;">
        <?php if($is_builder >= 0){ ?>
        <label class="input"> <span id='stitlespan'><?php if($is_edit==0) echo "Title"; ?></span>
          <select class="title" id='stitle' name='stitle'>
            <option ></option>
            <option value="Mr" <?php echo ($client['site_title']=="Mr"?"selected":""); ?> >Mr</option>
            <option value="Mrs" <?php echo ($client['site_title']=="Mrs"?"selected":""); ?> >Mrs</option>
            <option value="Ms" <?php echo ($client['site_title']=="Ms"?"selected":""); ?>>Ms</option>
            <option value="Dr" <?php echo ($client['site_title']=="Dr"?"selected":""); ?>>Dr</option>
            <option value="Prof." <?php echo ($client['site_title']=="Prof."?"selected":""); ?>>Prof.</option>
          </select>
        </label>
        <label class="input"><span id="sfirstnamespan">First Name</span>
          <input type="text" value="<?php echo $client['site_firstname'] ?>" id="sfirstname" name="sfirstname">
        </label>
        <label class="input"><span id="slastnamespan">Last Name</span>
          <input type="text" value="<?php echo $client['site_lastname'] ?>" id="slastname" name="slastname">
        </label>
        <?php }else{ ?>
          <!-- <label class="input"><span id="sbuilder_name_span">Builder Name</span>
            <input type="text" value="<?php echo $client['builder_name'] ?>" id="sbuilder_name" name="sbuilder_name" >
          </label>
          <label class="input"><span id="sbuilder_contact_span">Builder Contact</span>
            <input type="text" value="<?php echo $client['builder_contact'] ?>" id="sbuilder_contact" name="sbuilder_contact">
          </label> -->
        <?php } ?>    
        <label class="input"><span id="saddress1span">Address 1</span>
          <input type="text" value="<?php echo $client['site_address1'] ?>" id="saddress1" name="saddress1">
        </label>
        <label class="input"><span id="saddress2span">Address 2</span>
          <input type="text" value="<?php echo $client['site_address2'] ?>" id="saddress2" name="saddress2">
        </label>
        <!--- Site Suburb -->
        <label class="input"><span id="ssuburblistspan">Suburb</span>
          <input type="text" id="ssuburb" name='site_suburb' value="<?php echo $client['site_suburb'] ?>" onkeypress="ssuburbchange();" />
        </label>
        <input type="hidden" id="ssuburb_id" name='ssuburbid' value="<?php echo $client['site_suburbid'] ?>" readonly />
        <label class="input"><span id="sstatespan">State</span>
          <input type="text" id="ssuburbstate" name="site_state" value="<?php echo $client['site_state'] ?>" readonly />
        </label>
        <label class="input"><span id="spostspan">Postcode</span>
          <input type="text" id="ssuburbpostcode" name="site_postcode" value="<?php echo $client['site_postcode'] ?>" readonly />
        </label>
        <!-- End of Site Suburb -->
        <label class="input"><span id="shmphonespan">Home Phone</span>
          <input type="text" value="<?php echo $client['site_hmphone'] ?>" id="shmphone" name="shmphone">
        </label>
        <label class="input"><span id="swkphonespan">Work Phone</span>
          <input type="text" value="<?php echo $client['site_wkphone'] ?>" id="swkphone" name="swkphone">
        </label>
        <label class="input"><span id="smobilespan">Mobile</span>
          <input type="text" value="<?php echo $client['site_mobile'] ?>" id="smobile" name="smobile">
        </label>
        <label class="input"><span id="sotherspan">Other</span>
          <input type="text" value="<?php echo $client['site_other'] ?>" id="sother" name="sother">
        </label>
        <label class="input"><span id="semailspan">Email</span>
          <input type="text" value="<?php echo $client['site_email'] ?>" id="semail" name="semail">
        </label>
        <input type="button" value="Copy Site Address" id="sbtn" name="sbtn" class="btn">
      </div>
    </div>
  </div>
  <!------------------------------------------------------------- Enquiry Tracker Tab  -->
  <div id="tabs_wrapper" class="info-tab">
    <div id="tabs_container">
      <ul id="tabs_default">
        <li class="active"><span>Enquiry Tracker</span></li>
      </ul>
    </div>
    <div id="tabs_content_container">
      <!-- <div id="tracker" class="tab_content_default" style="display: block;">
        <label class="input"><span id="date-entered">Date Entered:</span>
          <input type="text" id="idate" name="idate" class="date_entered" value="<?php  if($is_edit==1){echo $client['fdatelodged']; error_log("fdatelodged: ".$client['fdatelodged'], 3,'C:\\xampp\htdocs\\vergola_contract_system_v4_us\\my-error.log'); } else{echo date(PHP_DFORMAT); } ?>">
        </label> 
        <input type="submit" value="Send Mail" id="ibtn" name="<?php echo ($is_edit==1?"send_and_update":"save"); ?>" class="btn"> -->
		<div id="tracker" class="tab_content_default" style="display: block;">
			<label class="input"><span id="date-entered">Date Entered:</span>
			  <input type="text" id="idate" name="idate" class="date_entered" value="<?php  if($is_edit==1){echo $client['fdatelodged'];  } else{echo date(PHP_DFORMAT); } ?>">
			</label> 
			<input type="submit" value="Send Mail" id="ibtn" name="<?php echo ($is_edit==1?"send_and_update":"save"); ?>" class="btn btn-add">
        <!--- Sales Rep -->
        <?php
      $queryrep="SELECT id, name, RepID, email, block FROM ver_users ORDER BY name ASC ";
      $resultrep = mysql_query($queryrep);
      if(!$resultrep){die ("Could not query the database: <br />" . mysql_error());}
      $RepIDArrayPhp = '';
      $RepNameArrayPhp = '';
      $RepIdentArrayPhp = '';
      $RepEmailArrayPhp = ''; 
      $RepID = '';
      $RepIdent = '';
      $RepName = '';
      $RepEmail = '';
    if($is_edit){
      $RepID = $client['repid'];
      $RepIdent = $client['repident'];
      $RepName = $client['repname'];
    }else{
      $RepID = $user->id; 
      $RepIdent = $user->RepID;
      $RepName = $user->name;
      $RepIsBlock = $user->block;
    } 
    //error_log("user: ".print_r($user,true), 3,'C:\\xampp\htdocs\\vergola_contract_system_v4_us\\my-error.log');
    //error_log("fdatelodged: ".$client['fdatelodged'], 3,'C:\\xampp\htdocs\\vergola_contract_system_v4_us\\my-error.log');
      //create selection list               
       while($row = mysql_fetch_row($resultrep))
    {
        $heading = $row[0]; 
        $RepIDArrayPhp .= 'RepIDArray["'.$heading.'"]="'.$row[0].'";';
        $RepNameArrayPhp .= 'RepNameArray["'.$heading.'"]="'.$row[1].'";';
        $RepIdentArrayPhp .= 'RepIdentArray["'.$heading.'"]="'.$row[2].'";';
        $RepEmailArrayPhp .= 'RepEmailArray["'.$heading.'"]="'.$row[3].'";';
    }
?>
    
    <input type="hidden" id="rep_id" name="rep_id" value="<?php echo $RepID; ?>" />
    <input type="hidden" id="rep_ident" name="rep_ident" value="<?php echo $RepIdent; ?>" />
    <input type="hidden" id="rep_name" name="rep_name" value="<?php echo $RepName; ?>" />
    <label class='' style="color:#222; display: inline-table;"><span><!-- <?php if($is_edit==0){echo 'Last Rep Allocated: ';} ?> --></span>
        <label class='input'><span><?php if($is_edit==0 || empty($RepID)) echo "Consultant"; ?></span>
            <select class='rep-list' id='replist' name='replist' onchange='javascript:SelectChangedRep();'><option></option>
            <?php
            $usergroup = 'Victoria Users';
            //$user =& JFactory::getUser(); //$userName = $user->get( 'name' ); 
            if(isset($user->groups['27'])){ //27 is victoria sales manager
              $sql="SELECT id, name, RepID  FROM ver_users WHERE id IN (SELECT user_id FROM ver_user_usergroup_map WHERE group_id=27 || group_id=9) ORDER BY name ASC";
            }else if(isset($user->groups['9'])){ //27 is victoria sales manager
              $sql="SELECT id, name, RepID FROM ver_users WHERE id IN (SELECT user_id FROM ver_user_usergroup_map WHERE  group_id=9 ) ORDER BY name ASC";
            }else{
               $sql="SELECT id, name, RepID  FROM ver_users WHERE (block=0 AND usertype LIKE ('$usergroup')) AND id IN (SELECT user_id FROM ver_user_usergroup_map WHERE group_id=27 || group_id=9) ORDER BY name ASC";
               //$sql="SELECT id, name, RepID FROM ver_users WHERE usertype LIKE ('$usergroup') AND id<>1 ORDER BY name ASC";
              //$sql="SELECT id, name, RepID FROM ver_users WHERE usertype ='Vergola Users' AND block=0 ORDER BY name ASC";
            }
            $result = mysql_query($sql);
            if(!$result){
                die ("Could not query the database: <br />" . mysql_error());
            }
            while ($data=mysql_fetch_assoc($result)){
                 // error_log("rep id: ".$data['RepID'], 3,'C:\\xampp\htdocs\\vergola_contract_system_v4_us\\my-error.log');
                echo "<option value = '{$data['id']}'";
                // if ($is_edit==1 && $RepID == $data['RepID']) {
                if ($is_edit==1 && $RepIdent == $data['RepID']) {
                    echo "selected = 'selected'";
                }
                echo ">{$data['name']}</option>";
            }
            ?>
            </select>
        </label>
<script language="Javascript" type="text/javascript">
    var RepIDArray = new Array();
    <?php echo $RepIDArrayPhp; ?>
    var RepNameArray = new Array();
    <?php echo $RepNameArrayPhp; ?>
    var RepIdentArray = new Array();
    <?php echo $RepIdentArrayPhp; ?>
    var RepEmailArray = new Array();
    <?php echo $RepEmailArrayPhp; ?>
    function SelectChangedRep()
    {
        var Rep = document.getElementById('replist').value;
        document.getElementById('rep_id').value = RepIDArray[Rep];
        document.getElementById('rep_ident').value = RepIdentArray[Rep];
        document.getElementById('rep_name').value = RepNameArray[Rep];
        document.getElementById('repname').value = RepNameArray[Rep];
        document.getElementById('repident').value = RepIdentArray[Rep];
        document.getElementById('repid').value = RepIDArray[Rep];
        document.getElementById('repemail').value = RepEmailArray[Rep];
    }
</script>
        <input type="hidden" id="repname" name='repname' value="<?php echo $user->name; ?>" readonly />
        <input type="hidden" id="repident" name='repident' value="<?php echo $user->RepID; ?>" readonly />
        <input type="hidden" id="repid" name='repid' value="<?php echo $user->id ?>" readonly />
        <input type="hidden" id="repemail" name='repemail' value="<?php echo $user->email; ?>" readonly /> 
        <!-- End of Sales Rep --> 
        <!--- Lead Type -->
        <?php
      $querylead="SELECT cf_id, lead FROM ver_chronoforms_data_lead_vic ORDER BY lead ASC";
      $resultlead = mysql_query($querylead);
      if(!$resultlead){die ("Could not query the database: <br />" . mysql_error());}
      $LeadIDArrayPhp = '';
      $LeadNameArrayPhp = '';
      $LeadID = '';
    $leadname = '';
    if($is_edit){
      $LeadID = $client['leadid'];
      $leadname = $client['leadname'];
    }
    echo "<input type='hidden' id='is_edit' value='{$is_edit}' />";
    echo "<input type='hidden' id='lead_id' name='lead_id' value='{$LeadID}' />";
    echo "<input type='hidden' id='lead_name' name='lead_name' value='{$leadname}' />";
      //create selection list               
       while($row = mysql_fetch_row($resultlead))
    {
        $heading = $row[0]; 
        $LeadIDArrayPhp .= 'LeadIDArray["'.$heading.'"]="'.$row[0].'";';
        $LeadNameArrayPhp .= 'LeadNameArray["'.$heading.'"]="'.$row[1].'";';
    }
?>
        <label class='input'><span><?php if($is_edit==0 || empty($leadname)) echo "Lead Source"; ?></span>
        <select class='lead-list' id='leadlist' name='leadlist' onchange='javascript:SelectChangedLead();'><option></option>
            <?php
            $querysub2="SELECT cf_id, lead FROM ver_chronoforms_data_lead_vic ORDER BY lead ASC";
            $resultsub2 = mysql_query($querysub2);
            if(!$resultsub2) {
              die ("Could not query the database: <br />" . mysql_error());
            }
            while ($data=mysql_fetch_assoc($resultsub2)){
                echo "<option value = '{$data['cf_id']}'";
                if ($leadname == $data['lead']) {
                    echo "selected = 'selected'";
                }
                echo ">{$data['lead']}</option>";
            }
            ?> 
        </select></label>
        <script language="Javascript" type="text/javascript">
    var LeadIDArray = new Array();
    <?php echo $LeadIDArrayPhp; ?>
    var LeadNameArray = new Array();
    <?php echo $LeadNameArrayPhp; ?>
    function SelectChangedLead()
    {
        var Lead = document.getElementById('leadlist').value;
        document.getElementById('lead_id').value = LeadIDArray[Lead];
        document.getElementById('lead_name').value = LeadNameArray[Lead];
        document.getElementById('leadname').value = LeadNameArray[Lead];
        document.getElementById('leadid').value = LeadIDArray[Lead];
    }
</script>
        <input type="hidden" id="leadname" name='leadname' value="" readonly />
        <input type="hidden" id="leadid" name='leadid' value="" readonly />
        <!-- End of Lead Type -->
        <?php $user =& JFactory::getUser(); $userName = $user->get( 'name' );
       $usermail =& JFactory::getUser(); $userEmail = $usermail->get( 'email' );
       echo '<input type=\'hidden\' id=\'usermail\' name=\'usermail\' value=\''.$userEmail.'\' readonly>';?>
        <div class="input-group date form_datetime col-md-5" data-date-format="<?php echo JS_DFORMAT." @ HH:ii P"; ?>" data-link-field="dtp_appointment" style="display:inline-block">
          <label class='input'><span id='date-entered'>Appointment: </span>
            <input type="text" id="iappointment" name="iappointment" class="form-control" value="<?php echo $client['fappointmentdate'] ?>" readonly>
          </label>
          <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span> <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span> </div>
        <input type="hidden" id="dtp_appointment" name="dtp_appointment" value="<?php echo $client['appointmentdate'] ?>" />
        <br/>
        <script type="text/javascript">
        $('.form_datetime').datetimepicker({
            //language:  'en',
            weekStart: 1,
            todayBtn:  1,
            autoclose: 1,
            todayHighlight: 1,
            startView: 2,
            forceParse: 0,
            showMeridian: 1
        });
        $('.form_date').datetimepicker({
            language:  'en',
            weekStart: 1,
            todayBtn:  1,
            autoclose: 1,
            todayHighlight: 1,
            startView: 2,
            minView: 2,
            forceParse: 0
        });
        $('.form_time').datetimepicker({
            language:  'en',
            weekStart: 1,
            todayBtn:  1,
            autoclose: 1,
            todayHighlight: 1,
            startView: 1,
            minView: 0,
            maxView: 1,
            forceParse: 0
        });
        </script> 
        <?php
        echo '<label class=\'input\'><span id=\'takenid\'>Taken by:</span><input type=\'text\' id=\'username\' name=\'username\' class=\'username\' value=\''.$userName.'\' readonly></label>'; 
        ?> 
      </div>
    </div>
  </div>
<?php if($is_edit==0){  ?>  
  <!-- Drawing Image Tab -->
  <div id="tabs_wrapper" class="drawing-tab">
    <div id="tabs_container">
      <ul id="tabs_default">
        <li class="active"><span>Drawing</span></li>
      </ul>
    </div>
    <div id="tabs_content_container">
      <div id="draw" class="tab_content_default" style="display: block;">
        <!--<INPUT type="button" value="Add Drawing" onclick="addRow('tbl-draw')" /> -->
        <INPUT type="button" value="Delete Drawing" onclick="deleteRow('tbl-draw')" />
        <table id="tbl-draw">
          <tr>
            <td class="tbl-chk"><input type="checkbox" name="chk"/></td>
            <td class="tbl-upload"><input type="file" name="photo[]" id="uploadme" multiple="multiple" accept=".jpg,.png,.bmp,.gif,.pdf">
            <input type="hidden" id="checkfile" value="No" name="checkfile" ></td>
          </tr>
        </table>
      </div>
    </div>
  </div>
  <!-- Notes Tab -->
  <div id="tabs_wrapper" class="notes-tab">
    <div id="tabs_container">
      <ul id="tabs_default">
        <li class="active"><span>Notes</span></li>
      </ul>
    </div>
    <div id="tabs_content_container">
      <div id="notes" class="tab_content_default" style="display: block;">
        <table id="tbl-notes">
          <?php $user =& JFactory::getUser(); $userName = $user->get( 'name' ); 
          //$date_notes = (Date('d-M-Y g:i A')); ?>
          <tr>
            <td class="tbl-content"><textarea name="notestxt" id="notestxt"></textarea>
              <div class="layer-date">Date:
                <input type="text" id="date_display" name="date_display" class="datetime_display" value="<?php print(Date(PHP_DFORMAT)); ?>" readonly>
                <input type="hidden" id="date_notes" name="date_notes" class="date_time" value="<?php print(Date(PHP_DFORMAT." H:i:s")); ?>" readonly>
              </div>
              <div class="layer-whom">By Whom:
                <input type="text" id="username_notes" name="username_notes" class="username" value="<?php echo $userName; ?>" readonly>
              </div></td>
          </tr>
        </table>
      </div>
    </div>
  </div>
<?php  } ?>  
  <div id="_tabs_wrapper" class="button-tab">
    <?php if(isset($_REQUEST['ref']) && $_REQUEST['ref']=="home"){ ?>
    <input type="button" value="Cancel" id="" name="cancel" class="bbtn btn" onclick=location.href='<?php echo JURI::base(); ?>' />
    <?php }else if(isset($_REQUEST['ref'])){?> 
      <input type="button" value="Cancel" id="" name="cancel" class="bbtn btn" onclick=location.href='<?php echo JURI::base().$_REQUEST['ref']; ?>' />
    <?php }else{ ?>
      <input type="button" value="Cancel" id="" name="cancel" class="bbtn btn" onclick=location.href='<?php echo (isset($pid) ? JURI::base()."client-listing-vic/client-folder-vic?pid={$pid}" : JURI::base()); ?>' />
    <?php } ?>  
    <input type="submit" value="Save" id="bsbtn" name="<?php echo ($is_edit==0?"save":"update"); ?>" class="bbtn btn-save" >
  </div>
</form>