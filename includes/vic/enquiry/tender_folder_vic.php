<script src="<?php echo JURI::base().'jscript/jsapi.js'; ?>"></script>
<script src="<?php echo JURI::base().'jscript/jquery.min.js'; ?>"></script>
<script src="<?php echo JURI::base().'jscript/labels.js'; ?>"></script>
<script type="text/javascript" src="<?php echo JURI::base().'jscript/tabcontent.js'; ?>"></script>

<script charset="UTF-8" type="text/javascript" src="<?php echo JURI::base().'jscript/datetime/js/jquery-1.8.3.min.js'; ?>"></script>
<script type="text/javascript" src="<?php echo JURI::base().'jscript/datetime/js/bootstrap.min.js'; ?>"></script>
<script charset="UTF-8" type="text/javascript" src="<?php echo JURI::base().'jscript/datetime/js/bootstrap-datetimepicker.js'; ?>"></script>


<link rel="stylesheet" type="text/css" media="screen,projection" href="<?php echo JURI::base().'jscript/custom.css'; ?>" />
<link rel="stylesheet" type="text/css" media="screen,projection" href="<?php echo JURI::base().'jscript/new-enquiry.css'; ?>" />
<link rel="stylesheet" type="text/css" media="screen,projection" href="<?php echo JURI::base().'jscript/client-folder.css'; ?>" />

<link rel="stylesheet" type="text/css" media="screen,projection" href="<?php echo JURI::base().'jscript/datetime/css/bootstrap.min.css'; ?>" />
<link rel="stylesheet" type="text/css" media="screen,projection" href="<?php echo JURI::base().'jscript/datetime/css/bootstrap-datetimepicker.min.css'; ?>" />
<?php
date_default_timezone_set('America/Los_Angeles');
?>
<?php  
$next_increment = 0;
$qShowStatus = "SHOW TABLE STATUS LIKE 'ver_chronoforms_data_builderpersonal_vic'";
$qShowStatusResult = mysql_query($qShowStatus) or die ( "Query failed: " . mysql_error() . "<br/>" . $qShowStatus );
$row = mysql_fetch_assoc($qShowStatusResult);
$next_increment = $row['Auto_increment'];
$getclientid = 'BRV'.$next_increment;


$id =$_REQUEST['tenderid'];

$result = mysql_query("SELECT * FROM ver_chronoforms_data_builderpersonal_vic WHERE tenderid  = '$id'");
$retrieve = mysql_fetch_array($result);
if (!$result) 
		{
		die("Error: Data not found..");
		}
		
$resultbuilder = mysql_query("SELECT pid, builderid FROM ver_chronoforms_data_builderpersonal_vic WHERE tenderid = '$id'");
if (!$resultbuilder) 
		{
		die("Error: Data not found..");
		}
if (mysql_num_rows($resultbuilder) >=1) {
mysql_data_seek($resultbuilder, 0);
$row1 = mysql_fetch_row($resultbuilder);
$pid1 = $row1[0];
$BuildID1 = $row1[1]; }

if (mysql_num_rows($resultbuilder) >=2) {
mysql_data_seek($resultbuilder, 1);
$row2 = mysql_fetch_row($resultbuilder);
$pid2 = $row2[0];
$BuildID2 = $row2[1]; }

if (mysql_num_rows($resultbuilder) >=3) {
mysql_data_seek($resultbuilder, 2);
$row3 = mysql_fetch_row($resultbuilder);
$pid3 = $row3[0];
$BuildID3 = $row3[1]; }

if (mysql_num_rows($resultbuilder) >=4) {
mysql_data_seek($resultbuilder, 3);
$row4 = mysql_fetch_row($resultbuilder);
$pid4 = $row4[0];
$BuildID4 = $row4[1]; }

if (mysql_num_rows($resultbuilder) >=5) {
mysql_data_seek($resultbuilder, 4);
$row5 = mysql_fetch_row($resultbuilder);
$pid5 = $row5[0];
$BuildID5 = $row5[1]; }

if (mysql_num_rows($resultbuilder) >=6) {
mysql_data_seek($resultbuilder, 5);
$row6 = mysql_fetch_row($resultbuilder);
$pid6 = $row6[0];
$BuildID6 = $row6[1]; }


	$result1 = mysql_query("SELECT * FROM ver_chronoforms_data_builderpersonal_vic WHERE  pid = '$pid1'");
    $retrieve1 = mysql_fetch_array($result1);										
    $BuildSuburbID1 = $retrieve1['builder_suburbid'] ;
	$BuildName1 = $retrieve1['builder_name'] ;
	$BuildContact1 = $retrieve1['builder_contact'];					
	$BuildAddress11 = $retrieve1['builder_address1'] ;
	$BuildAddress21 = $retrieve1['builder_address2'] ;
	$BuildSuburb1 = $retrieve1['builder_suburb'] ;
	$BuildState1 = $retrieve1['builder_state'];					
	$BuildPostcode1 = $retrieve1['builder_postcode'] ;
	$BuildWPhone1 = $retrieve1['builder_wkphone'] ;
	$BuildMobile1 = $retrieve1['builder_mobile'];					
	$BuildFax1 = $retrieve1['builder_fax'] ;
	$BuildEmail1 = $retrieve1['builder_email'] ;

	$result2 = mysql_query("SELECT * FROM ver_chronoforms_data_builderpersonal_vic WHERE pid = '$pid2'");
    $retrieve2 = mysql_fetch_array($result2);
	$BuildSuburbID2 = $retrieve2['builder_suburbid'] ;
	$BuildName2 = $retrieve2['builder_name'] ;
	$BuildContact2 = $retrieve2['builder_contact'];					
	$BuildAddress12 = $retrieve2['builder_address1'] ;
	$BuildAddress22 = $retrieve2['builder_address2'] ;
	$BuildSuburb2 = $retrieve2['builder_suburb'] ;
	$BuildState2 = $retrieve2['builder_state'];					
	$BuildPostcode2 = $retrieve2['builder_postcode'] ;
	$BuildWPhone2 = $retrieve2['builder_wkphone'] ;
	$BuildMobile2 = $retrieve2['builder_mobile'];					
	$BuildFax2 = $retrieve2['builder_fax'] ;
	$BuildEmail2 = $retrieve2['builder_email'] ;
	
	$result3 = mysql_query("SELECT * FROM ver_chronoforms_data_builderpersonal_vic WHERE pid = '$pid3'");
    $retrieve3 = mysql_fetch_array($result3);
	$BuildSuburbID3 = $retrieve3['builder_suburbid'] ;
	$BuildName3 = $retrieve3['builder_name'] ;
	$BuildContact3 = $retrieve3['builder_contact'];					
	$BuildAddress13 = $retrieve3['builder_address1'] ;
	$BuildAddress23 = $retrieve3['builder_address2'] ;
	$BuildSuburb3 = $retrieve3['builder_suburb'] ;
	$BuildState3 = $retrieve3['builder_state'];					
	$BuildPostcode3 = $retrieve3['builder_postcode'] ;
	$BuildWPhone3 = $retrieve3['builder_wkphone'] ;
	$BuildMobile3 = $retrieve3['builder_mobile'];					
	$BuildFax3 = $retrieve3['builder_fax'] ;
	$BuildEmail3 = $retrieve3['builder_email'] ;
	
	$result4 = mysql_query("SELECT * FROM ver_chronoforms_data_builderpersonal_vic WHERE pid = '$pid4'");
    $retrieve4 = mysql_fetch_array($result4);
	$BuildSuburbID4 = $retrieve4['builder_suburbid'] ;
	$BuildName4 = $retrieve4['builder_name'] ;
	$BuildContact4 = $retrieve4['builder_contact'];					
	$BuildAddress14 = $retrieve4['builder_address1'] ;
	$BuildAddress24 = $retrieve4['builder_address2'] ;
	$BuildSuburb4 = $retrieve4['builder_suburb'] ;
	$BuildState4 = $retrieve4['builder_state'];					
	$BuildPostcode4 = $retrieve4['builder_postcode'] ;
	$BuildWPhone4 = $retrieve4['builder_wkphone'] ;
	$BuildMobile4 = $retrieve4['builder_mobile'];					
	$BuildFax4 = $retrieve4['builder_fax'] ;
	$BuildEmail4 = $retrieve4['builder_email'] ;
	
	$result5 = mysql_query("SELECT * FROM ver_chronoforms_data_builderpersonal_vic WHERE pid = '$pid5'");
    $retrieve5 = mysql_fetch_array($result5);
	$BuildSuburbID5 = $retrieve5['builder_suburbid'] ;
	$BuildName5 = $retrieve5['builder_name'] ;
	$BuildContact5 = $retrieve5['builder_contact'];					
	$BuildAddress15 = $retrieve5['builder_address1'] ;
	$BuildAddress25 = $retrieve5['builder_address2'] ;
	$BuildSuburb5 = $retrieve5['builder_suburb'] ;
	$BuildState5 = $retrieve5['builder_state'];					
	$BuildPostcode5 = $retrieve5['builder_postcode'] ;
	$BuildWPhone5 = $retrieve5['builder_wkphone'] ;
	$BuildMobile5 = $retrieve5['builder_mobile'];					
	$BuildFax5 = $retrieve5['builder_fax'] ;
	$BuildEmail5 = $retrieve5['builder_email'] ;
	
	$result6 = mysql_query("SELECT * FROM ver_chronoforms_data_builderpersonal_vic WHERE pid = '$pid6'");
    $retrieve6 = mysql_fetch_array($result6);
	$BuildSuburbID6 = $retrieve6['builder_suburbid'] ;
	$BuildName6 = $retrieve6['builder_name'] ;
	$BuildContact6 = $retrieve6['builder_contact'];					
	$BuildAddress16 = $retrieve6['builder_address1'] ;
	$BuildAddress26 = $retrieve6['builder_address2'] ;
	$BuildSuburb6 = $retrieve6['builder_suburb'] ;
	$BuildState6 = $retrieve6['builder_state'];					
	$BuildPostcode6 = $retrieve6['builder_postcode'] ;
	$BuildWPhone6 = $retrieve6['builder_wkphone'] ;
	$BuildMobile6 = $retrieve6['builder_mobile'];					
	$BuildFax6 = $retrieve6['builder_fax'] ;
	$BuildEmail6 = $retrieve6['builder_email'] ;


	$SiteProject = $retrieve['site_project'];
	$SiteAddress1 = $retrieve['site_address1'];
	$SiteAddress2 = $retrieve['site_address2'];
	$SiteSuburbID = $retrieve['site_suburbid'];
	$SiteSuburb = $retrieve['site_suburb'];
	$SiteState = $retrieve['site_state'];
	$SitePostcode = $retrieve['site_postcode'];
	$SiteWPhone = $retrieve['site_wkphone'];
	$SiteHPhone = $retrieve['site_hmphone'];
	$SiteMobile = $retrieve['site_mobile'];
	$SiteOther = $retrieve['site_other'];
	$SiteEmail = $retrieve['site_email'];
	$TenderStatus = "Yes";
	$TenderID = $retrieve['tenderid'];
	
	$date = $retrieve['datelodged'];
    $DateLodged = date('d-M-Y', strtotime($date));
	$DateNow = date("Y-m-d H:i:s");
	$datepoint = $retrieve['appointmentdate'];
    $AppointmentLodged = date('d-M-Y @ h:i A', strtotime($datepoint));
    $RepID = $retrieve['repid'];
	$RepIdent = $retrieve['repident'];
	$RepName = $retrieve['repname'];
	
	$LeadID = $retrieve['leadid'];
	$LeadName = $retrieve['leadname'];
	
	$EmployeeID = $retrieve['employeeid'];
	$NotesID = $retrieve['pid'];
	$ClientID = 'BRV'.$NotesID;

if(isset($_POST['save']) || isset($_POST['sendmail']))
{	    

        $BuilderSuburbID1 = $_POST['bsuburbid1'];
	    $BuilderName1 = $_POST['builder_name1'];
	    $BuilderContact1 = $_POST['builder_contact1'];					
	    $BuilderAddress11 = $_POST['baddress11'];
	    $BuilderAddress21 = $_POST['baddress21'];
	    $BuilderSuburb1 = $_POST['builder_suburb1'] ;
	    $BuilderState1 = $_POST['builder_state1'];					
	    $BuilderPostcode1 = $_POST['builder_postcode1'];
	    $BuilderWPhone1 = $_POST['bwphone1'];
	    $BuilderMobile1 = $_POST['bmobile1'];					
	    $BuilderFax1 = $_POST['bfax1'];
	    $BuilderEmail1 = $_POST['bemail1'];

        $BuilderSuburbID2 = $_POST['bsuburbid2'];
	    $BuilderName2 = $_POST['builder_name2'];
	    $BuilderContact2 = $_POST['builder_contact2'];					
	    $BuilderAddress12 = $_POST['baddress12'];
	    $BuilderAddress22 = $_POST['baddress22'];
	    $BuilderSuburb2 = $_POST['builder_suburb2'] ;
	    $BuilderState2 = $_POST['builder_state2'];					
	    $BuilderPostcode2 = $_POST['builder_postcode2'];
	    $BuilderWPhone2 = $_POST['bwphone2'];
	    $BuilderMobile2 = $_POST['bmobile2'];					
	    $BuilderFax2 = $_POST['bfax2'];
	    $BuilderEmail2 = $_POST['bemail2'];
		
		$BuilderSuburbID3 = $_POST['bsuburbid3'];
	    $BuilderName3 = $_POST['builder_name3'];
	    $BuilderContact3 = $_POST['builder_contact3'];					
	    $BuilderAddress13 = $_POST['baddress13'];
	    $BuilderAddress23 = $_POST['baddress23'];
	    $BuilderSuburb3 = $_POST['builder_suburb3'] ;
	    $BuilderState3 = $_POST['builder_state3'];					
	    $BuilderPostcode3 = $_POST['builder_postcode3'];
	    $BuilderWPhone3 = $_POST['bwphone3'];
	    $BuilderMobile3 = $_POST['bmobile3'];					
	    $BuilderFax3 = $_POST['bfax3'];
	    $BuilderEmail3 = $_POST['bemail3'];
		
		$BuilderSuburbID4 = $_POST['bsuburbid4'];
	    $BuilderName4 = $_POST['builder_name4'];
	    $BuilderContact4 = $_POST['builder_contact4'];					
	    $BuilderAddress14 = $_POST['baddress14'];
	    $BuilderAddress24 = $_POST['baddress24'];
	    $BuilderSuburb4 = $_POST['builder_suburb4'] ;
	    $BuilderState4 = $_POST['builder_state4'];					
	    $BuilderPostcode4 = $_POST['builder_postcode4'];
	    $BuilderWPhone4 = $_POST['bwphone4'];
	    $BuilderMobile4 = $_POST['bmobile4'];					
	    $BuilderFax4 = $_POST['bfax4'];
	    $BuilderEmail4 = $_POST['bemail4'];
		
		$BuilderSuburbID5 = $_POST['bsuburbid5'];
	    $BuilderName5 = $_POST['builder_name5'];
	    $BuilderContact5 = $_POST['builder_contact5'];					
	    $BuilderAddress15 = $_POST['baddress15'];
	    $BuilderAddress25 = $_POST['baddress25'];
	    $BuilderSuburb5 = $_POST['builder_suburb5'] ;
	    $BuilderState5 = $_POST['builder_state5'];					
	    $BuilderPostcode5 = $_POST['builder_postcode5'];
	    $BuilderWPhone5 = $_POST['bwphone5'];
	    $BuilderMobile5 = $_POST['bmobile5'];					
	    $BuilderFax5 = $_POST['bfax5'];
	    $BuilderEmail5 = $_POST['bemail5'];
		
		$BuilderSuburbID6 = $_POST['bsuburbid6'];
	    $BuilderName6 = $_POST['builder_name6'];
	    $BuilderContact6 = $_POST['builder_contact6'];					
	    $BuilderAddress16 = $_POST['baddress16'];
	    $BuilderAddress26 = $_POST['baddress26'];
	    $BuilderSuburb6 = $_POST['builder_suburb6'] ;
	    $BuilderState6 = $_POST['builder_state6'];					
	    $BuilderPostcode6 = $_POST['builder_postcode6'];
	    $BuilderWPhone6 = $_POST['bwphone6'];
	    $BuilderMobile6 = $_POST['bmobile6'];					
	    $BuilderFax6 = $_POST['bfax6'];
	    $BuilderEmail6 = $_POST['bemail6'];
		


   if ($BuilderName1!=$BuildName1) {
       	
		mysql_query("UPDATE ver_chronoforms_data_builderpersonal_vic SET 
		             builderid ='$BuildID1',
					 builder_suburbid ='$BuilderSuburbID1', 
					 builder_name ='$BuilderName1', 
					 builder_contact ='$BuilderContact1', 
					 builder_address1 ='$BuilderAddress11', 
					 builder_address2 ='$BuilderAddress21',
					 builder_suburb ='$BuilderSuburb1',
					 builder_state ='$BuilderState1',
					 builder_postcode ='$BuilderPostcode1',
					 builder_wkphone ='$BuilderWPhone1',
					 builder_mobile ='$BuilderMobile1',
					 builder_fax ='$BuilderFax1',
					 builder_email ='$BuilderEmail1'
					 WHERE pid = '$pid1'");
		  
   } 
   elseif ($BuilderName2!="" && $BuildName2=="") 
   { mysql_query("INSERT INTO ver_chronoforms_data_builderpersonal_vic 
                 (builderid, builder_suburbid, builder_name, builder_contact, builder_address1, builder_address2,
				  builder_suburb, builder_state, builder_postcode, builder_wkphone, builder_mobile, builder_fax,
				  builder_email, site_suburbid, site_project, site_address1, site_address2, site_suburb,
				  site_state, site_postcode, site_wkphone, site_hmphone, site_mobile, site_other, site_email,
				  tenderstatus, tenderid, datelodged, repid, repident, repname, leadid, leadname, appointmentdate,
				  employeeid) 
							  
	      VALUES('$getclientid', '$BuilderSuburbID2', '$BuilderName2', '$BuilderContact2', '$BuilderAddress12',
                 '$BuilderAddress22', '$BuilderSuburb2', '$BuilderState2', '$BuilderPostcode2', '$BuilderWPhone2',
                 '$BuilderMobile2', '$BuilderFax2', '$BuilderEmail2',
				 
				 '$SiteSuburbID', '$SiteProject', '$SiteAddress1', '$SiteAddress2', '$SiteSuburb', '$SiteState',
				 '$SitePostcode', '$SiteWKPhone', '$SiteHMPhone', '$SiteMobile', '$SiteOther', '$SiteEmail',
				 '$TenderStatus', '$TenderID',
                 
                 '$DateNow', '$RepID', '$RepIdent', '$RepName', '$LeadID', '$LeadName', '$AppointmentLodged',
				 '$EmployeeID')");
	   
	   } 
	   elseif ($BuilderName2!=$BuildName2) {
        
	
		mysql_query("UPDATE ver_chronoforms_data_builderpersonal_vic SET 
		             builderid ='$BuildID2',
					 builder_suburbid ='$BuilderSuburbID2', 
					 builder_name ='$BuilderName2', 
					 builder_contact ='$BuilderContact2', 
					 builder_address2 ='$BuilderAddress12', 
					 builder_address2 ='$BuilderAddress22',
					 builder_suburb ='$BuilderSuburb2',
					 builder_state ='$BuilderState2',
					 builder_postcode ='$BuilderPostcode2',
					 builder_wkphone ='$BuilderWPhone2',
					 builder_mobile ='$BuilderMobile2',
					 builder_fax ='$BuilderFax2',
					 builder_email ='$BuilderEmail2'
					 WHERE pid = '$pid2'");
		  
   } 
   elseif ($BuilderName3!="" && $BuildName3=="") 
   { mysql_query("INSERT INTO ver_chronoforms_data_builderpersonal_vic 
                 (builderid, builder_suburbid, builder_name, builder_contact, builder_address1, builder_address2,
				  builder_suburb, builder_state, builder_postcode, builder_wkphone, builder_mobile, builder_fax,
				  builder_email, site_suburbid, site_project, site_address1, site_address2, site_suburb,
				  site_state, site_postcode, site_wkphone, site_hmphone, site_mobile, site_other, site_email,
				  tenderstatus, tenderid, datelodged, repid, repident, repname, leadid, leadname, appointmentdate,
				  employeeid) 
							  
	      VALUES('$getclientid', '$BuilderSuburbID3', '$BuilderName3', '$BuilderContact3', '$BuilderAddress13',
                 '$BuilderAddress23', '$BuilderSuburb3', '$BuilderState3', '$BuilderPostcode3', '$BuilderWPhone3',
                 '$BuilderMobile3', '$BuilderFax3', '$BuilderEmail3',
				 
				 '$SiteSuburbID', '$SiteProject', '$SiteAddress1', '$SiteAddress2', '$SiteSuburb', '$SiteState',
				 '$SitePostcode', '$SiteWKPhone', '$SiteHMPhone', '$SiteMobile', '$SiteOther', '$SiteEmail',
				 '$TenderStatus', '$TenderID',
                 
                 '$DateNow', '$RepID', '$RepIdent', '$RepName', '$LeadID', '$LeadName', '$AppointmentLodged',
				 '$EmployeeID')");
	   
	   } 
	   elseif ($BuilderName3!=$BuildName3) {
        
	
		mysql_query("UPDATE ver_chronoforms_data_builderpersonal_vic SET 
		             builderid ='$BuildID3',
					 builder_suburbid ='$BuilderSuburbID3', 
					 builder_name ='$BuilderName3', 
					 builder_contact ='$BuilderContact3', 
					 builder_address1 ='$BuilderAddress13', 
					 builder_address2 ='$BuilderAddress23',
					 builder_suburb ='$BuilderSuburb3',
					 builder_state ='$BuilderState3',
					 builder_postcode ='$BuilderPostcode3',
					 builder_wkphone ='$BuilderWPhone3',
					 builder_mobile ='$BuilderMobile3',
					 builder_fax ='$BuilderFax3',
					 builder_email ='$BuilderEmail3'
					 WHERE pid = '$pid3'");
		  
   } 
   elseif ($BuilderName4!="" && $BuildName4=="") 
   { mysql_query("INSERT INTO ver_chronoforms_data_builderpersonal_vic 
                 (builderid, builder_suburbid, builder_name, builder_contact, builder_address1, builder_address2,
				  builder_suburb, builder_state, builder_postcode, builder_wkphone, builder_mobile, builder_fax,
				  builder_email, site_suburbid, site_project, site_address1, site_address2, site_suburb,
				  site_state, site_postcode, site_wkphone, site_hmphone, site_mobile, site_other, site_email,
				  tenderstatus, tenderid, datelodged, repid, repident, repname, leadid, leadname, appointmentdate,
				  employeeid) 
							  
	      VALUES('$getclientid', '$BuilderSuburbID4', '$BuilderName4', '$BuilderContact4', '$BuilderAddress14',
                 '$BuilderAddress24', '$BuilderSuburb4', '$BuilderState4', '$BuilderPostcode4', '$BuilderWPhone4',
                 '$BuilderMobile4', '$BuilderFax4', '$BuilderEmail4',
				 
				 '$SiteSuburbID', '$SiteProject', '$SiteAddress1', '$SiteAddress2', '$SiteSuburb', '$SiteState',
				 '$SitePostcode', '$SiteWKPhone', '$SiteHMPhone', '$SiteMobile', '$SiteOther', '$SiteEmail',
				 '$TenderStatus', '$TenderID',
                 
                 '$DateNow', '$RepID', '$RepIdent', '$RepName', '$LeadID', '$LeadName', '$AppointmentLodged',
				 '$EmployeeID')");
	   
	   } 
	   elseif ($BuilderName4!=$BuildName4) {
        
	
		mysql_query("UPDATE ver_chronoforms_data_builderpersonal_vic SET 
		             builderid ='$BuildID4',
					 builder_suburbid ='$BuilderSuburbID4', 
					 builder_name ='$BuilderName4', 
					 builder_contact ='$BuilderContact4', 
					 builder_address1 ='$BuilderAddress14', 
					 builder_address2 ='$BuilderAddress24',
					 builder_suburb ='$BuilderSuburb4',
					 builder_state ='$BuilderState4',
					 builder_postcode ='$BuilderPostcode4',
					 builder_wkphone ='$BuilderWPhone4',
					 builder_mobile ='$BuilderMobile4',
					 builder_fax ='$BuilderFax4',
					 builder_email ='$BuilderEmail4'
					 WHERE pid = '$pid4'");
		  
   } 
   elseif ($BuilderName5!="" && $BuildName5=="") 
   { mysql_query("INSERT INTO ver_chronoforms_data_builderpersonal_vic 
                 (builderid, builder_suburbid, builder_name, builder_contact, builder_address1, builder_address2,
				  builder_suburb, builder_state, builder_postcode, builder_wkphone, builder_mobile, builder_fax,
				  builder_email, site_suburbid, site_project, site_address1, site_address2, site_suburb,
				  site_state, site_postcode, site_wkphone, site_hmphone, site_mobile, site_other, site_email,
				  tenderstatus, tenderid, datelodged, repid, repident, repname, leadid, leadname, appointmentdate,
				  employeeid) 
							  
	      VALUES('$getclientid', '$BuilderSuburbID5', '$BuilderName5', '$BuilderContact5', '$BuilderAddress15',
                 '$BuilderAddress25', '$BuilderSuburb5', '$BuilderState5', '$BuilderPostcode5', '$BuilderWPhone5',
                 '$BuilderMobile5', '$BuilderFax5', '$BuilderEmail5',
				 
				 '$SiteSuburbID', '$SiteProject', '$SiteAddress1', '$SiteAddress2', '$SiteSuburb', '$SiteState',
				 '$SitePostcode', '$SiteWKPhone', '$SiteHMPhone', '$SiteMobile', '$SiteOther', '$SiteEmail',
				 '$TenderStatus', '$TenderID',
                 
                 '$DateNow', '$RepID', '$RepIdent', '$RepName', '$LeadID', '$LeadName', '$AppointmentLodged',
				 '$EmployeeID')");
	   
	   } 
	   elseif ($BuilderName5!=$BuildName5) {
        
	
		mysql_query("UPDATE ver_chronoforms_data_builderpersonal_vic SET 
		             builderid ='$BuildID5',
					 builder_suburbid ='$BuilderSuburbID5', 
					 builder_name ='$BuilderName5', 
					 builder_contact ='$BuilderContact5', 
					 builder_address1 ='$BuilderAddress15', 
					 builder_address2 ='$BuilderAddress25',
					 builder_suburb ='$BuilderSuburb5',
					 builder_state ='$BuilderState5',
					 builder_postcode ='$BuilderPostcode5',
					 builder_wkphone ='$BuilderWPhone5',
					 builder_mobile ='$BuilderMobile5',
					 builder_fax ='$BuilderFax5',
					 builder_email ='$BuilderEmail5'
					 WHERE pid = '$pid5'");
		  
   } 
    elseif ($BuilderName6!="" && $BuildName6=="") 
   { mysql_query("INSERT INTO ver_chronoforms_data_builderpersonal_vic 
                 (builderid, builder_suburbid, builder_name, builder_contact, builder_address1, builder_address2,
				  builder_suburb, builder_state, builder_postcode, builder_wkphone, builder_mobile, builder_fax,
				  builder_email, site_suburbid, site_project, site_address1, site_address2, site_suburb,
				  site_state, site_postcode, site_wkphone, site_hmphone, site_mobile, site_other, site_email,
				  tenderstatus, tenderid, datelodged, repid, repident, repname, leadid, leadname, appointmentdate,
				  employeeid) 
							  
	      VALUES('$getclientid', '$BuilderSuburbID6', '$BuilderName6', '$BuilderContact6', '$BuilderAddress16',
                 '$BuilderAddress26', '$BuilderSuburb6', '$BuilderState6', '$BuilderPostcode6', '$BuilderWPhone6',
                 '$BuilderMobile6', '$BuilderFax6', '$BuilderEmail6',
				 
				 '$SiteSuburbID', '$SiteProject', '$SiteAddress1', '$SiteAddress2', '$SiteSuburb', '$SiteState',
				 '$SitePostcode', '$SiteWKPhone', '$SiteHMPhone', '$SiteMobile', '$SiteOther', '$SiteEmail',
				 '$TenderStatus', '$TenderID',
                 
                 '$DateNow', '$RepID', '$RepIdent', '$RepName', '$LeadID', '$LeadName', '$AppointmentLodged',
				 '$EmployeeID')");
	   
	   } 
	   elseif ($BuilderName6!=$BuildName6) {
        
	
		mysql_query("UPDATE ver_chronoforms_data_builderpersonal_vic SET 
		             builderid ='$BuildID6',
					 builder_suburbid ='$BuilderSuburbID6', 
					 builder_name ='$BuilderName6', 
					 builder_contact ='$BuilderContact6', 
					 builder_address1 ='$BuilderAddress16', 
					 builder_address2 ='$BuilderAddress26',
					 builder_suburb ='$BuilderSuburb6',
					 builder_state ='$BuilderState6',
					 builder_postcode ='$BuilderPostcode6',
					 builder_wkphone ='$BuilderWPhone6',
					 builder_mobile ='$BuilderMobile6',
					 builder_fax ='$BuilderFax6',
					 builder_email ='$BuilderEmail6'
					 WHERE pid = '$pid6'");
		  
   } 
   
$gettenderid = $TenderID;	
$checknotes = implode(", ", $_POST['notestxt']);
$cnt = count($_POST['date_notes']);
$cnt2 = count($_POST['username_notes']);
$cnt3 = count($_POST['notestxt']);


if ($cnt > 0 && $cnt == $cnt2 && $cnt2 == $cnt3 && $checknotes != '') {
    $insertArr = array();
    
	for ($i=0; $i<$cnt; $i++) {

        $insertArr[] = "('$gettenderid', '" . mysql_real_escape_string($_POST['date_notes'][$i]) . "', '" . mysql_real_escape_string($_POST['username_notes'][$i]) . "', '" . mysql_real_escape_string($_POST['notestxt'][$i]) . "')";
}


 $queryn = "INSERT INTO ver_chronoforms_data_notes_vic (clientid, datenotes, username, content) VALUES " . implode(", ", $insertArr);
 
 mysql_query($queryn) or trigger_error("Insert failed: " . mysql_error());

}
                 
//This is the Time Save 
$now = time();  

if(isset($_FILES['photo'])){ 

    foreach ($_FILES['photo']['tmp_name'] as $key => $tmp_name){
//This is the directory where images will be saved 
        $target="images/drawings/$now-";
        $target=$target.$_FILES['photo']['name'][$key];	
		if (move_uploaded_file($tmp_name, $target)) {

$query = "INSERT INTO ver_chronoforms_data_drawings_vic (clientid, photo) VALUES  ('$getclientid', '$target')";
 mysql_query($query) or trigger_error("Insert failed: " . mysql_error());

         		
            }
    }
}
    
	$to = $_POST['repemail']; // this is the Sales Rep Email address
    $from = $_POST['usermail']; // this is the sender's Email address	
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
    <td style=\"border-bottom: 1px solid #999;border-left: 1px solid #999;padding:5px;\">Builder</td>
    <td style=\"border-bottom: 1px solid #999;border-right: 1px solid #999;border-left: 1px solid #999;padding:5px;\">" . $_POST['builder_name'] . "</td>
  </tr>
  <tr>
    <td style=\"border-bottom: 1px solid #999;border-left: 1px solid #999;padding:5px;\">Contact Name</td>
    <td style=\"border-bottom: 1px solid #999;border-right: 1px solid #999;border-left: 1px solid #999;padding:5px;\">" . $_POST['builder_contact'] . "</td>
  </tr>
  <tr>
    <td style=\"border-bottom: 1px solid #999;border-left: 1px solid #999;padding:5px;\">Project Name</td>
    <td style=\"border-bottom: 1px solid #999;border-right: 1px solid #999;border-left: 1px solid #999;padding:5px;\">" . $_POST['sprojectname'] . "</td>
  </tr>
  <tr>
    <td style=\"border-bottom: 1px solid #999;border-left: 1px solid #999;padding:5px;\">Address</td>
    <td style=\"border-bottom: 1px solid #999;border-right: 1px solid #999;border-left: 1px solid #999;padding:5px;\">" . $_POST['saddress1'] . " " . $_POST['saddress2'] . ", " . $_POST['site_suburb'] . " " . $_POST['site_state'] . " " . $_POST['site_postcode'] . "</td>
  </tr>
  <tr>
    <td style=\"border-bottom: 1px solid #999;border-left: 1px solid #999;padding:5px;\">Phone</td>
    <td style=\"border-bottom: 1px solid #999;border-right: 1px solid #999;border-left: 1px solid #999;padding:5px;\">" . $_POST['bwphone'] ."</td>
  </tr>
  <tr>
    <td style=\"border-bottom: 1px solid #999;border-left: 1px solid #999;padding:5px;\">Mobile</td>
    <td style=\"border-bottom: 1px solid #999;border-right: 1px solid #999;border-left: 1px solid #999;padding:5px;\">" . $_POST['bmobile'] . "</td>
  </tr>
  <tr>
    <td style=\"border-bottom: 1px solid #999;border-left: 1px solid #999;padding:5px;\">Email</td>
    <td style=\"border-bottom: 1px solid #999;border-right: 1px solid #999;border-left: 1px solid #999;padding:5px;\">" . $_POST['bemail'] . "</td>
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
	$message2 = "<table cellpadding=\"0\" cellspacing=\"0\" style=\"border-top: 1px solid #999;width:550px; font-family:calibri; font-size:13px;\">
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
    <td style=\"border-bottom: 1px solid #999;border-left: 1px solid #999;padding:5px;\">Builder</td>
    <td style=\"border-bottom: 1px solid #999;border-right: 1px solid #999;border-left: 1px solid #999;padding:5px;\">" . $_POST['builder_name'] . "</td>
  </tr>
  <tr>
    <td style=\"border-bottom: 1px solid #999;border-left: 1px solid #999;padding:5px;\">Contact Name</td>
    <td style=\"border-bottom: 1px solid #999;border-right: 1px solid #999;border-left: 1px solid #999;padding:5px;\">" . $_POST['builder_contact'] . "</td>
  </tr>
  <tr>
    <td style=\"border-bottom: 1px solid #999;border-left: 1px solid #999;padding:5px;\">Project Name</td>
    <td style=\"border-bottom: 1px solid #999;border-right: 1px solid #999;border-left: 1px solid #999;padding:5px;\">" . $_POST['sprojectname'] . "</td>
  </tr>
  <tr>
    <td style=\"border-bottom: 1px solid #999;border-left: 1px solid #999;padding:5px;\">Address</td>
    <td style=\"border-bottom: 1px solid #999;border-right: 1px solid #999;border-left: 1px solid #999;padding:5px;\">" . $_POST['saddress1'] . " " . $_POST['saddress2'] . ", " . $_POST['site_suburb'] . " " . $_POST['site_state'] . " " . $_POST['site_postcode'] . "</td>
  </tr>
  <tr>
    <td style=\"border-bottom: 1px solid #999;border-left: 1px solid #999;padding:5px;\">Phone</td>
    <td style=\"border-bottom: 1px solid #999;border-right: 1px solid #999;border-left: 1px solid #999;padding:5px;\">" . $_POST['bwphone'] ."</td>
  </tr>


  <tr>
    <td style=\"border-bottom: 1px solid #999;border-left: 1px solid #999;padding:5px;\">Mobile</td>
    <td style=\"border-bottom: 1px solid #999;border-right: 1px solid #999;border-left: 1px solid #999;padding:5px;\">" . $_POST['bmobile'] . "</td>
  </tr>
  <tr>
    <td style=\"border-bottom: 1px solid #999;border-left: 1px solid #999;padding:5px;\">Email</td>
    <td style=\"border-bottom: 1px solid #999;border-right: 1px solid #999;border-left: 1px solid #999;padding:5px;\">" . $_POST['bemail'] . "</td>
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

    $headers = "From:" . $from. "\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
   // $headers2 = "From:" . $to. "\r\n";
	//$headers2 .= "MIME-Version: 1.0\r\n";
	//$headers2 .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
    mail($to,$subject,$message,$headers);
   // mail($from,$subject2,$message2,$headers2); // sends a copy of the message to the sender

    //echo "Mail Sent. To " . $_POST['repname'];
    // You can also use header('Location: thank_you.php'); to redirect to another page. 
	
	header('Location:'.JURI::base().'tender-listing-vic');			
}



?>
<?php
$form->data['date_entered'] = date('d-M-Y');
$form->data['date_time'] = date('d-M-Y g:i A');
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
<script language="javascript">
//<![CDATA[
$(window).load(function(){
	
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
<script type="text/javascript">
  $(document).ready(function(){
    var site_config = {
    source: "<?php echo JURI::base().'includes/suburb_vic.php'; ?>",
    select: function(event, ui){		
		$("#ssuburb").val(ui.item.suburb);
        $("#ssuburbstate").val(ui.item.suburb_state);
        $("#ssuburbpostcode").val(ui.item.suburb_postcode);
		$("#ssuburb_id").val(ui.item.cf_id);
    },
    minLength:1
    };
		$("#ssuburb").autocomplete(site_config);
  });
</script>


<script type="text/javascript">
  $(document).ready(function(){
    var buildername1_config = {
    source: "<?php echo JURI::base().'includes/builder_vic.php'; ?>",
    select: function(event, ui){		
		$("#build_name1").val(ui.item.builder_name);
        $("#build_contact1").val(ui.item.builder_contact);
        $("#baddress_11").val(ui.item.builder_address1);
		$("#baddress_21").val(ui.item.builder_address2);
		$("#bsuburb1").val(ui.item.builder_suburb);
        $("#bsuburbstate1").val(ui.item.builder_state);
        $("#bsuburbpostcode1").val(ui.item.builder_postcode);
		$("#b_wphone1").val(ui.item.builder_wkphone);
		$("#b_mobile1").val(ui.item.builder_mobile);
		$("#b_fax1").val(ui.item.builder_fax);
		$("#b_email1").val(ui.item.builder_email);
		$("#builder_id1").val(ui.item.cf_id);
		$("#buildersuburbid1").val(ui.item.builder_suburbid);
    },
    minLength:1
    };
		$("#build_name1").autocomplete(buildername1_config);
  });
</script>


<script type="text/javascript">
  $(document).ready(function(){
    var builder1_config = {
    source: "<?php echo JURI::base().'includes/suburb_vic.php'; ?>",
    select: function(event, ui){
        $("#bsuburb1").val(ui.item.suburb);
        $("#bsuburbstate1").val(ui.item.suburb_state);
        $("#bsuburbpostcode1").val(ui.item.suburb_postcode);
		$("#bsuburb_id1").val(ui.item.cf_id);	
    },
    minLength:1
    };
        $("#bsuburb1").autocomplete(builder1_config);

  });
</script>


<script type="text/javascript">
  $(document).ready(function(){
    var buildername2_config = {
    source: "<?php echo JURI::base().'includes/builder_vic.php'; ?>",
    select: function(event, ui){		
		$("#build_name2").val(ui.item.builder_name);
        $("#build_contact2").val(ui.item.builder_contact);
        $("#baddress_12").val(ui.item.builder_address1);
		$("#baddress_22").val(ui.item.builder_address2);
		$("#bsuburb2").val(ui.item.builder_suburb);
        $("#bsuburbstate2").val(ui.item.builder_state);
        $("#bsuburbpostcode2").val(ui.item.builder_postcode);
		$("#b_wphone2").val(ui.item.builder_wkphone);
		$("#b_mobile2").val(ui.item.builder_mobile);
		$("#b_fax2").val(ui.item.builder_fax);
		$("#b_email2").val(ui.item.builder_email);
		$("#builder_id2").val(ui.item.cf_id);
		$("#buildersuburbid2").val(ui.item.builder_suburbid);
    },
    minLength:1
    };
		$("#build_name2").autocomplete(buildername2_config);
  });
</script>


<script type="text/javascript">
  $(document).ready(function(){
    var builder2_config = {
    source: "<?php echo JURI::base().'includes/suburb_vic.php'; ?>",
    select: function(event, ui){
        $("#bsuburb2").val(ui.item.suburb);
        $("#bsuburbstate2").val(ui.item.suburb_state);
        $("#bsuburbpostcode2").val(ui.item.suburb_postcode);
		$("#bsuburb_id2").val(ui.item.cf_id);	
    },
    minLength:1
    };
        $("#bsuburb2").autocomplete(builder2_config);

  });
</script>

<script type="text/javascript">
  $(document).ready(function(){
    var buildername3_config = {
    source: "<?php echo JURI::base().'includes/builder_vic.php'; ?>",
    select: function(event, ui){		
		$("#build_name3").val(ui.item.builder_name);
        $("#build_contact3").val(ui.item.builder_contact);
        $("#baddress_13").val(ui.item.builder_address1);
		$("#baddress_23").val(ui.item.builder_address2);
		$("#bsuburb3").val(ui.item.builder_suburb);
        $("#bsuburbstate3").val(ui.item.builder_state);
        $("#bsuburbpostcode3").val(ui.item.builder_postcode);
		$("#b_wphone3").val(ui.item.builder_wkphone);
		$("#b_mobile3").val(ui.item.builder_mobile);
		$("#b_fax3").val(ui.item.builder_fax);
		$("#b_email3").val(ui.item.builder_email);
		$("#builder_id3").val(ui.item.cf_id);
		$("#buildersuburbid3").val(ui.item.builder_suburbid);
    },
    minLength:1
    };
		$("#build_name3").autocomplete(buildername3_config);
  });
</script>


<script type="text/javascript">
  $(document).ready(function(){
    var builder3_config = {
    source: "<?php echo JURI::base().'includes/suburb_vic.php'; ?>",
    select: function(event, ui){
        $("#bsuburb3").val(ui.item.suburb);
        $("#bsuburbstate3").val(ui.item.suburb_state);
        $("#bsuburbpostcode3").val(ui.item.suburb_postcode);
		$("#bsuburb_id3").val(ui.item.cf_id);	
    },
    minLength:1
    };
        $("#bsuburb3").autocomplete(builder3_config);

  });
</script>


<script type="text/javascript">
  $(document).ready(function(){
    var buildername4_config = {
    source: "<?php echo JURI::base().'includes/builder_vic.php'; ?>",
    select: function(event, ui){		
		$("#build_name4").val(ui.item.builder_name);
        $("#build_contact4").val(ui.item.builder_contact);
        $("#baddress_14").val(ui.item.builder_address1);
		$("#baddress_24").val(ui.item.builder_address2);
		$("#bsuburb4").val(ui.item.builder_suburb);
        $("#bsuburbstate4").val(ui.item.builder_state);
        $("#bsuburbpostcode4").val(ui.item.builder_postcode);
		$("#b_wphone4").val(ui.item.builder_wkphone);
		$("#b_mobile4").val(ui.item.builder_mobile);
		$("#b_fax4").val(ui.item.builder_fax);
		$("#b_email4").val(ui.item.builder_email);
		$("#builder_id4").val(ui.item.cf_id);
		$("#buildersuburbid4").val(ui.item.builder_suburbid);
    },
    minLength:1
    };
		$("#build_name4").autocomplete(buildername4_config);
  });
</script>


<script type="text/javascript">
  $(document).ready(function(){
    var builder4_config = {
    source: "<?php echo JURI::base().'includes/suburb_vic.php'; ?>",
    select: function(event, ui){
        $("#bsuburb4").val(ui.item.suburb);
        $("#bsuburbstate4").val(ui.item.suburb_state);
        $("#bsuburbpostcode4").val(ui.item.suburb_postcode);
		$("#bsuburb_id4").val(ui.item.cf_id);	
    },
    minLength:1
    };
        $("#bsuburb4").autocomplete(builder4_config);

  });
</script>

<script type="text/javascript">
  $(document).ready(function(){
    var buildername5_config = {
    source: "<?php echo JURI::base().'includes/builder_vic.php'; ?>",
    select: function(event, ui){		
		$("#build_name5").val(ui.item.builder_name);
        $("#build_contact5").val(ui.item.builder_contact);
        $("#baddress_15").val(ui.item.builder_address1);
		$("#baddress_25").val(ui.item.builder_address2);
		$("#bsuburb5").val(ui.item.builder_suburb);
        $("#bsuburbstate5").val(ui.item.builder_state);
        $("#bsuburbpostcode5").val(ui.item.builder_postcode);
		$("#b_wphone5").val(ui.item.builder_wkphone);
		$("#b_mobile5").val(ui.item.builder_mobile);
		$("#b_fax5").val(ui.item.builder_fax);
		$("#b_email5").val(ui.item.builder_email);
		$("#builder_id5").val(ui.item.cf_id);
		$("#buildersuburbid5").val(ui.item.builder_suburbid);
    },
    minLength:1
    };
		$("#build_name5").autocomplete(buildername5_config);
  });
</script>


<script type="text/javascript">
  $(document).ready(function(){
    var builder5_config = {
    source: "<?php echo JURI::base().'includes/suburb_vic.php'; ?>",
    select: function(event, ui){
        $("#bsuburb5").val(ui.item.suburb);
        $("#bsuburbstate5").val(ui.item.suburb_state);
        $("#bsuburbpostcode5").val(ui.item.suburb_postcode);
		$("#bsuburb_id5").val(ui.item.cf_id);	
    },
    minLength:1
    };
        $("#bsuburb5").autocomplete(builder5_config);

  });
</script>

<script type="text/javascript">
  $(document).ready(function(){
    var buildername6_config = {
    source: "<?php echo JURI::base().'includes/builder_vic.php'; ?>",
    select: function(event, ui){		
		$("#build_name6").val(ui.item.builder_name);
        $("#build_contact6").val(ui.item.builder_contact);
        $("#baddress_16").val(ui.item.builder_address1);
		$("#baddress_26").val(ui.item.builder_address2);
		$("#bsuburb6").val(ui.item.builder_suburb);
        $("#bsuburbstate6").val(ui.item.builder_state);
        $("#bsuburbpostcode6").val(ui.item.builder_postcode);
		$("#b_wphone6").val(ui.item.builder_wkphone);
		$("#b_mobile6").val(ui.item.builder_mobile);
		$("#b_fax6").val(ui.item.builder_fax);
		$("#b_email6").val(ui.item.builder_email);
		$("#builder_id6").val(ui.item.cf_id);
		$("#buildersuburbid6").val(ui.item.builder_suburbid);
    },
    minLength:1
    };
		$("#build_name6").autocomplete(buildername6_config);
  });
</script>


<script type="text/javascript">
  $(document).ready(function(){
    var builder6_config = {
    source: "<?php echo JURI::base().'includes/suburb_vic.php'; ?>",
    select: function(event, ui){
        $("#bsuburb6").val(ui.item.suburb);
        $("#bsuburbstate6").val(ui.item.suburb_state);
        $("#bsuburbpostcode6").val(ui.item.suburb_postcode);
		$("#bsuburb_id6").val(ui.item.cf_id);	
    },
    minLength:1
    };
        $("#bsuburb6").autocomplete(builder6_config);

  });
</script>

<script>
function ssuburbchange(){
    document.getElementById('sstatespan').style.visibility = 'hidden';
	document.getElementById('spostspan').style.visibility = 'hidden';
}

function bcompanychange1(){
    document.getElementById('bcontactid1').style.visibility = 'hidden';
	document.getElementById('baddress1id1').style.visibility = 'hidden';
	document.getElementById('baddress2id1').style.visibility = 'hidden';
	document.getElementById('bsuburbspan1').style.visibility = 'hidden';
	document.getElementById('bstateid1').style.visibility = 'hidden';
	document.getElementById('bpostid1').style.visibility = 'hidden';
	document.getElementById('bwphoneid1').style.visibility = 'hidden';
	document.getElementById('bmobileid1').style.visibility = 'hidden';
	document.getElementById('bfaxid1').style.visibility = 'hidden';
	document.getElementById('bemailid1').style.visibility = 'hidden';
}
function bsuburbchange1(){
    document.getElementById('bstateid1').style.visibility = 'hidden';
	document.getElementById('bpostid1').style.visibility = 'hidden';
}


function bcompanychange2(){
    document.getElementById('bcontactid2').style.visibility = 'hidden';
	document.getElementById('baddress1id2').style.visibility = 'hidden';
	document.getElementById('baddress2id2').style.visibility = 'hidden';
	document.getElementById('bsuburbspan2').style.visibility = 'hidden';
	document.getElementById('bstateid2').style.visibility = 'hidden';
	document.getElementById('bpostid2').style.visibility = 'hidden';
	document.getElementById('bwphoneid2').style.visibility = 'hidden';
	document.getElementById('bmobileid2').style.visibility = 'hidden';
	document.getElementById('bfaxid2').style.visibility = 'hidden';
	document.getElementById('bemailid2').style.visibility = 'hidden';
}
function bsuburbchange2(){
    document.getElementById('bstateid2').style.visibility = 'hidden';
	document.getElementById('bpostid2').style.visibility = 'hidden';
}

function bcompanychange3(){
    document.getElementById('bcontactid3').style.visibility = 'hidden';
	document.getElementById('baddress1id3').style.visibility = 'hidden';
	document.getElementById('baddress2id3').style.visibility = 'hidden';
	document.getElementById('bsuburbspan3').style.visibility = 'hidden';
	document.getElementById('bstateid3').style.visibility = 'hidden';
	document.getElementById('bpostid3').style.visibility = 'hidden';
	document.getElementById('bwphoneid3').style.visibility = 'hidden';
	document.getElementById('bmobileid3').style.visibility = 'hidden';
	document.getElementById('bfaxid3').style.visibility = 'hidden';
	document.getElementById('bemailid3').style.visibility = 'hidden';
}
function bsuburbchange3(){
    document.getElementById('bstateid3').style.visibility = 'hidden';
	document.getElementById('bpostid3').style.visibility = 'hidden';
}

function bcompanychange4(){
    document.getElementById('bcontactid4').style.visibility = 'hidden';
	document.getElementById('baddress1id4').style.visibility = 'hidden';
	document.getElementById('baddress2id4').style.visibility = 'hidden';
	document.getElementById('bsuburbspan4').style.visibility = 'hidden';
	document.getElementById('bstateid4').style.visibility = 'hidden';
	document.getElementById('bpostid4').style.visibility = 'hidden';
	document.getElementById('bwphoneid4').style.visibility = 'hidden';
	document.getElementById('bmobileid4').style.visibility = 'hidden';
	document.getElementById('bfaxid4').style.visibility = 'hidden';
	document.getElementById('bemailid4').style.visibility = 'hidden';
}
function bsuburbchange4(){
    document.getElementById('bstateid4').style.visibility = 'hidden';
	document.getElementById('bpostid4').style.visibility = 'hidden';
}


function bcompanychange5(){
    document.getElementById('bcontactid5').style.visibility = 'hidden';
	document.getElementById('baddress1id5').style.visibility = 'hidden';
	document.getElementById('baddress2id5').style.visibility = 'hidden';
	document.getElementById('bsuburbspan5').style.visibility = 'hidden';
	document.getElementById('bstateid5').style.visibility = 'hidden';
	document.getElementById('bpostid5').style.visibility = 'hidden';
	document.getElementById('bwphoneid5').style.visibility = 'hidden';
	document.getElementById('bmobileid5').style.visibility = 'hidden';
	document.getElementById('bfaxid5').style.visibility = 'hidden';
	document.getElementById('bemailid5').style.visibility = 'hidden';
}
function bsuburbchange5(){
    document.getElementById('bstateid5').style.visibility = 'hidden';
	document.getElementById('bpostid5').style.visibility = 'hidden';
}

function bcompanychange6(){
    document.getElementById('bcontactid6').style.visibility = 'hidden';
	document.getElementById('baddress1id6').style.visibility = 'hidden';
	document.getElementById('baddress2id6').style.visibility = 'hidden';
	document.getElementById('bsuburbspan6').style.visibility = 'hidden';
	document.getElementById('bstateid6').style.visibility = 'hidden';
	document.getElementById('bpostid6').style.visibility = 'hidden';
	document.getElementById('bwphoneid6').style.visibility = 'hidden';
	document.getElementById('bmobileid6').style.visibility = 'hidden';
	document.getElementById('bfaxid6').style.visibility = 'hidden';
	document.getElementById('bemailid6').style.visibility = 'hidden';
}
function bsuburbchange6(){
    document.getElementById('bstateid6').style.visibility = 'hidden';
	document.getElementById('bpostid6').style.visibility = 'hidden';
}

</script>

<form method="post"  enctype="multipart/form-data">
<input type="hidden" value="" id="blank" name="blank" />

  <div class="column-left"></div>
  <div class="column-right"></div>
  <!----------------------------------------------------- Site Address Tab ---------------------------------------------------->
  <div id="tabs_wrapper" class="siteadd-tab">
    <div id="tabs_container">
      <ul id="tabs_default">
        <li class="active"><span>Site Address</span></li>
      </ul>
    </div>
    <div id="tabs_content_container">
      <div id="site-address" class="tab_content_default" style="display: block;">
          <label class="input"><span id="sprojectnamespan">Project Name</span>
          <input type="text" value="<?php echo $SiteProject; ?>" id="sprojectname" name="sprojectname">
        </label>
        <label class="input"><span id="saddress1span">Address 1</span>
          <input type="text" value="<?php echo $SiteAddress1; ?>" id="saddress1" name="saddress1">
        </label>
        <label class="input"><span id="saddress2span">Address 2</span>
          <input type="text" value="<?php echo $SiteAddress2; ?>" id="saddress2" name="saddress2">
        </label>
        
        <!--- Site Suburb --->
        <label class="input"><span id="ssuburblistspan">Suburb</span>
          <input type="text" id="ssuburb" name="site_suburb" value="<?php echo $SiteSuburb; ?>"  onkeypress="ssuburbchange();" />
        </label>
        <input type="hidden" id="ssuburb_id" name="ssuburbid" value="<?php echo $SiteSuburbID; ?>" readonly />
        <label class="input"><span id="sstatespan">State</span>
          <input type="text" id="ssuburbstate" name="site_state" value="<?php echo $SiteState; ?>" readonly />
        </label>
        <label class="input"><span id="spostspan">Postcode</span>
          <input type="text" id="ssuburbpostcode" name="site_postcode" value="<?php echo $SitePostcode; ?>" readonly />
        </label>
       <!-- End of Site Suburb --->
       
        <label class="input"><span id="shmphonespan">Home Phone</span>
          <input type="text" value="<?php echo $SiteHMPhone; ?>" id="shmphone" name="shmphone">

        </label>
         <label class="input"><span id="swkphonespan">Work Phone</span>
          <input type="text" value="<?php echo $SiteWKPhone; ?>" id="swkphone" name="swkphone">
        </label>
        <label class="input"><span id="smobilespan">Mobile</span>
          <input type="text" value="<?php echo $SiteMobile; ?>" id="smobile" name="smobile">
        </label>
        <label class="input"><span id="sotherspan">Other</span>
          <input type="text" value="<?php echo $SiteOther; ?>" id="sother" name="sother">
        </label>
        <label class="input"><span id="semailspan">Email</span>
          <input type="text" value="<?php echo $SiteEmail; ?>" id="semail" name="semail">
        </label>
        
      </div>
    </div>
  </div>
  
  <!-------------------------------------------------------- Tender Builder Enquiry ---------------------------------------------------> 
  
   <!------------------------------------------------- Builder Content Tab --------------------------------------------------------------->
<div id="tabs_wrapper" class="builder-tab">
  <div id="tabs_container">
    <ul id="builder-tabs" class="shadetabs">
      <li><a href="#" rel="builder1" class="selected">Builder 1</a></li>
      <li><a href="#" rel="builder2">Builder 2</a></li>
      <li><a href="#" rel="builder3">Builder 3</a></li>
      <li><a href="#" rel="builder4">Builder 4</a></li>
      <li><a href="#" rel="builder5">Builder 5</a></li>
      <li><a href="#" rel="builder6">Builder 6</a></li>
    </ul>
  </div>
  <div id="tabs_content_container"> 
    
    <!---------------------------------------------------------------- Builder 1 Tab ------------------------------------------------------->
    
    <div id="builder1" class="tab_content" style="display: block;"> 
    
    <!------------------------------------------------------- Builder 1 Details ------------------------------------------------------------>
        
     
        
        <label class="input"><span id="bnameid1">Company Name</span>
          <input type="text" value="<?php echo $BuildName1; ?>" id="build_name1" name="builder_name1" onkeypress="bcompanychange1();">
        </label>
        <label class="input"><span id="bcontactid1">Contact</span>
          <input type="text" value="<?php echo $BuildContact1; ?>" id="build_contact1" name="builder_contact1">
        </label>
        <label class="input"><span id="baddress1id1">Address 1</span>
          <input type="text" value="<?php echo $BuildAddress11; ?>" id="baddress_11" name="baddress11">
        </label>
        <label class="input"><span id="baddress2id1">Address 2</span>
          <input type="text" value="<?php echo $BuildAddress21; ?>" id="baddress_21" name="baddress21">
        </label>
        
       <!--- Builder Suburb --->
        <label class="input"><span id="bsuburbspan1">Suburb</span>
          <input type="text" id="bsuburb1" name="builder_suburb1" class="bsub-class" value="<?php echo $BuildSuburb1; ?>"  onkeypress="bsuburbchange1();" />
         </label>
        <input type="hidden" id="bsuburb_id1" name="bsuburbid1" value="<?php echo $BuildSuburbID1; ?>" readonly />

        <label class="input"><span id="bstateid1">State</span>
          <input type="text" id="bsuburbstate1" name="builder_state1" class="bstate-class" value="<?php echo $BuildState1; ?>" readonly />
        </label>
        <label class="input"><span id="bpostid1">Postcode</span>
          <input type="text" id="bsuburbpostcode1" name="builder_postcode1" class="bpost-class" value="<?php echo $BuildPostcode1; ?>" readonly />
        </label>
         <!-- End of Builder Suburb --->
         
        <label class="input"><span id="bwphoneid1">Work Phone</span>
          <input type="text" class="bphone-class" value="<?php echo $BuildWPhone1; ?>" id="b_wphone1" name="bwphone1">
        </label>
        <label class="input"><span id="bmobileid1">Mobile</span>
          <input type="text" class="bmobile-class" value="<?php echo $BuildMobile1; ?>" id="b_mobile1" name="bmobile1">
        </label>
        <label class="input"><span id="bfaxid1">Fax</span>
          <input type="text" class="bfax-class" value="<?php echo $BuildFax1; ?>" id="b_fax1" name="bfax1" >
        </label>
        <label class="input"><span id="bemailid1">Email</span>
          <input type="text" class="bemail-class" value="<?php echo $BuildEmail1; ?>" id="b_email1" name="bemail1" >
        </label>
    
    </div>
    
    <!---------------------------------------------------- Builder 2 Tab ------------------------------------------------->
    
    <div id="builder2" class="tab_content"> 
    
    <!------------------------------------------------------- Builder 2 Details ------------------------------------------------------------>
        
         <label class="input"><span id="bnameid2">Company Name</span>
          <input type="text" value="<?php echo $BuildName2; ?>" id="build_name2" name="builder_name2" onkeypress="bcompanychange2();">
        </label>
        <label class="input"><span id="bcontactid2">Contact</span>
          <input type="text" value="<?php echo $BuildContact2; ?>" id="build_contact2" name="builder_contact2">
        </label>
        <label class="input"><span id="baddress1id2">Address 1</span>
          <input type="text" value="<?php echo $BuildAddress12; ?>" id="baddress_12" name="baddress12">
        </label>
        <label class="input"><span id="baddress2id2">Address 2</span>
          <input type="text" value="<?php echo $BuildAddress22; ?>" id="baddress_22" name="baddress22">
        </label>
        
       <!--- Builder Suburb --->
        <label class="input"><span id="bsuburbspan2">Suburb</span>
          <input type="text" id="bsuburb2" name="builder_suburb2" class="bsub-class" value="<?php echo $BuildSuburb2; ?>"  onkeypress="bsuburbchange2();" />
         </label>
        <input type="hidden" id="bsuburb_id2" name="bsuburbid2" value="<?php echo $BuildSuburbID2; ?>" readonly />

        <label class="input"><span id="bstateid2">State</span>
          <input type="text" id="bsuburbstate2" name="builder_state2" class="bstate-class" value="<?php echo $BuildState2; ?>" readonly />
        </label>
        <label class="input"><span id="bpostid2">Postcode</span>
          <input type="text" id="bsuburbpostcode2" name="builder_postcode2" class="bpost-class" value="<?php echo $BuildPostcode2; ?>" readonly />
        </label>
         <!-- End of Builder Suburb --->
         
        <label class="input"><span id="bwphoneid2">Work Phone</span>
          <input type="text" class="bphone-class" value="<?php echo $BuildWPhone2; ?>" id="b_wphone2" name="bwphone2">
        </label>
        <label class="input"><span id="bmobileid2">Mobile</span>
          <input type="text" class="bmobile-class" value="<?php echo $BuildMobile2; ?>" id="b_mobile2" name="bmobile2">
        </label>
        <label class="input"><span id="bfaxid2">Fax</span>
          <input type="text" class="bfax-class" value="<?php echo $BuildFax2; ?>" id="b_fax2" name="bfax2" >
        </label>
        <label class="input"><span id="bemailid2">Email</span>
          <input type="text" class="bemail-class" value="<?php echo $BuildEmail2; ?>" id="b_email2" name="bemail2" >
        </label>
    
        
    </div>
    
    <!---------------------------------------------------- Builder 3 Tab ------------------------------------------------->
    
    <div id="builder3" class="tab_content"> 
    
    <!------------------------------------------------------- Builder 3 Details ------------------------------------------------------------>
        
        <label class="input"><span id="bnameid3">Company Name</span>
          <input type="text" value="<?php echo $BuildName3; ?>" id="build_name3" name="builder_name3" onkeypress="bcompanychange3();">
        </label>
        <label class="input"><span id="bcontactid3">Contact</span>
          <input type="text" value="<?php echo $BuildContact3; ?>" id="build_contact3" name="builder_contact3">
        </label>
        <label class="input"><span id="baddress1id3">Address 1</span>
          <input type="text" value="<?php echo $BuildAddress13; ?>" id="baddress_13" name="baddress13">
        </label>
        <label class="input"><span id="baddress2id3">Address 2</span>
          <input type="text" value="<?php echo $BuildAddress23; ?>" id="baddress_23" name="baddress23">
        </label>
        
       <!--- Builder Suburb --->
        <label class="input"><span id="bsuburbspan3">Suburb</span>
          <input type="text" id="bsuburb3" name="builder_suburb3" class="bsub-class" value="<?php echo $BuildSuburb3; ?>"  onkeypress="bsuburbchange3();" />
         </label>
        <input type="hidden" id="bsuburb_id3" name="bsuburbid3" value="<?php echo $BuildSuburbID3; ?>" readonly />

        <label class="input"><span id="bstateid3">State</span>
          <input type="text" id="bsuburbstate3" name="builder_state3" class="bstate-class" value="<?php echo $BuildState3; ?>" readonly />
        </label>
        <label class="input"><span id="bpostid3">Postcode</span>
          <input type="text" id="bsuburbpostcode3" name="builder_postcode3" class="bpost-class" value="<?php echo $BuildPostcode3; ?>" readonly />
        </label>
         <!-- End of Builder Suburb --->
         
        <label class="input"><span id="bwphoneid3">Work Phone</span>
          <input type="text" class="bphone-class" value="<?php echo $BuildWPhone3; ?>" id="b_wphone3" name="bwphone3">
        </label>
        <label class="input"><span id="bmobileid3">Mobile</span>
          <input type="text" class="bmobile-class" value="<?php echo $BuildMobile3; ?>" id="b_mobile3" name="bmobile3">
        </label>
        <label class="input"><span id="bfaxid3">Fax</span>
          <input type="text" class="bfax-class" value="<?php echo $BuildFax3; ?>" id="b_fax3" name="bfax3" >
        </label>
        <label class="input"><span id="bemailid3">Email</span>
          <input type="text" class="bemail-class" value="<?php echo $BuildEmail3; ?>" id="b_email3" name="bemail3" >
        </label>
    
    </div>
    
    <!---------------------------------------------------- Builder 4 Tab ------------------------------------------------->
    
    <div id="builder4" class="tab_content"> 
    
    <label class="input"><span id="bnameid4">Company Name</span>
          <input type="text" value="<?php echo $BuildName4; ?>" id="build_name4" name="builder_name4" onkeypress="bcompanychange4();">
        </label>
        <label class="input"><span id="bcontactid4">Contact</span>
          <input type="text" value="<?php echo $BuildContact4; ?>" id="build_contact4" name="builder_contact4">
        </label>
        <label class="input"><span id="baddress1id4">Address 1</span>
          <input type="text" value="<?php echo $BuildAddress14; ?>" id="baddress_14" name="baddress14">
        </label>
        <label class="input"><span id="baddress2id4">Address 2</span>
          <input type="text" value="<?php echo $BuildAddress24; ?>" id="baddress_24" name="baddress24">
        </label>
        
       <!--- Builder Suburb --->
        <label class="input"><span id="bsuburbspan4">Suburb</span>
          <input type="text" id="bsuburb4" name="builder_suburb4" class="bsub-class" value="<?php echo $BuildSuburb4; ?>"  onkeypress="bsuburbchange4();" />
         </label>
        <input type="hidden" id="bsuburb_id4" name="bsuburbid4" value="<?php echo $BuildSuburbID4; ?>" readonly />

        <label class="input"><span id="bstateid4">State</span>
          <input type="text" id="bsuburbstate4" name="builder_state4" class="bstate-class" value="<?php echo $BuildState4; ?>" readonly />
        </label>
        <label class="input"><span id="bpostid4">Postcode</span>
          <input type="text" id="bsuburbpostcode4" name="builder_postcode4" class="bpost-class" value="<?php echo $BuildPostcode4; ?>" readonly />
        </label>
         <!-- End of Builder Suburb --->
         
        <label class="input"><span id="bwphoneid4">Work Phone</span>
          <input type="text" class="bphone-class" value="<?php echo $BuildWPhone4; ?>" id="b_wphone4" name="bwphone4">
        </label>
        <label class="input"><span id="bmobileid4">Mobile</span>
          <input type="text" class="bmobile-class" value="<?php echo $BuildMobile4; ?>" id="b_mobile4" name="bmobile4">
        </label>
        <label class="input"><span id="bfaxid4">Fax</span>
          <input type="text" class="bfax-class" value="<?php echo $BuildFax4; ?>" id="b_fax4" name="bfax4" >
        </label>
        <label class="input"><span id="bemailid4">Email</span>
          <input type="text" class="bemail-class" value="<?php echo $BuildEmail4; ?>" id="b_email4" name="bemail4" >
        </label>
    </div>
    
    <!---------------------------------------------------- Builder 5 Tab ------------------------------------------------->
    
    <div id="builder5" class="tab_content"> 
    
    <label class="input"><span id="bnameid5">Company Name</span>
          <input type="text" value="<?php echo $BuildName5; ?>" id="build_name5" name="builder_name5" onkeypress="bcompanychange5();">
        </label>
        <label class="input"><span id="bcontactid5">Contact</span>
          <input type="text" value="<?php echo $BuildContact5; ?>" id="build_contact5" name="builder_contact5">
        </label>
        <label class="input"><span id="baddress1id5">Address 1</span>
          <input type="text" value="<?php echo $BuildAddress15; ?>" id="baddress_15" name="baddress15">
        </label>
        <label class="input"><span id="baddress2id5">Address 2</span>
          <input type="text" value="<?php echo $BuildAddress25; ?>" id="baddress_25" name="baddress25">
        </label>
        
       <!--- Builder Suburb --->
        <label class="input"><span id="bsuburbspan5">Suburb</span>
          <input type="text" id="bsuburb5" name="builder_suburb5" class="bsub-class" value="<?php echo $BuildSuburb5; ?>"  onkeypress="bsuburbchange5();" />
         </label>
        <input type="hidden" id="bsuburb_id5" name="bsuburbid5" value="<?php echo $BuildSuburbID5; ?>" readonly />

        <label class="input"><span id="bstateid5">State</span>
          <input type="text" id="bsuburbstate5" name="builder_state5" class="bstate-class" value="<?php echo $BuildState5; ?>" readonly />
        </label>
        <label class="input"><span id="bpostid5">Postcode</span>
          <input type="text" id="bsuburbpostcode5" name="builder_postcode5" class="bpost-class" value="<?php echo $BuildPostcode5; ?>" readonly />
        </label>
         <!-- End of Builder Suburb --->
         
        <label class="input"><span id="bwphoneid5">Work Phone</span>
          <input type="text" class="bphone-class" value="<?php echo $BuildWPhone5; ?>" id="b_wphone5" name="bwphone5">
        </label>
        <label class="input"><span id="bmobileid5">Mobile</span>
          <input type="text" class="bmobile-class" value="<?php echo $BuildMobile5; ?>" id="b_mobile5" name="bmobile5">
        </label>
        <label class="input"><span id="bfaxid5">Fax</span>
          <input type="text" class="bfax-class" value="<?php echo $BuildFax5; ?>" id="b_fax5" name="bfax5" >
        </label>
        <label class="input"><span id="bemailid5">Email</span>
          <input type="text" class="bemail-class" value="<?php echo $BuildEmail5; ?>" id="b_email5" name="bemail5" >
        </label>
    
    </div>
    
     <!---------------------------------------------------- Builder 6 Tab ------------------------------------------------->
    
    <div id="builder6" class="tab_content"> 
    <label class="input"><span id="bnameid6">Company Name</span>
          <input type="text" value="<?php echo $BuildName6; ?>" id="build_name6" name="builder_name6" onkeypress="bcompanychange6();">
        </label>
        <label class="input"><span id="bcontactid6">Contact</span>
          <input type="text" value="<?php echo $BuildContact6; ?>" id="build_contact6" name="builder_contact6">
        </label>
        <label class="input"><span id="baddress1id6">Address 1</span>
          <input type="text" value="<?php echo $BuildAddress16; ?>" id="baddress_16" name="baddress16">
        </label>
        <label class="input"><span id="baddress2id6">Address 2</span>
          <input type="text" value="<?php echo $BuildAddress26; ?>" id="baddress_26" name="baddress26">
        </label>
        
       <!--- Builder Suburb --->
        <label class="input"><span id="bsuburbspan6">Suburb</span>
          <input type="text" id="bsuburb6" name="builder_suburb6" class="bsub-class" value="<?php echo $BuildSuburb6; ?>"  onkeypress="bsuburbchange6();" />
         </label>
        <input type="hidden" id="bsuburb_id6" name="bsuburbid6" value="<?php echo $BuildSuburbID6; ?>" readonly />

        <label class="input"><span id="bstateid6">State</span>
          <input type="text" id="bsuburbstate6" name="builder_state6" class="bstate-class" value="<?php echo $BuildState6; ?>" readonly />
        </label>
        <label class="input"><span id="bpostid6">Postcode</span>
          <input type="text" id="bsuburbpostcode6" name="builder_postcode6" class="bpost-class" value="<?php echo $BuildPostcode6; ?>" readonly />
        </label>
         <!-- End of Builder Suburb --->
         
        <label class="input"><span id="bwphoneid6">Work Phone</span>
          <input type="text" class="bphone-class" value="<?php echo $BuildWPhone6; ?>" id="b_wphone6" name="bwphone6">
        </label>
        <label class="input"><span id="bmobileid6">Mobile</span>
          <input type="text" class="bmobile-class" value="<?php echo $BuildMobile6; ?>" id="b_mobile6" name="bmobile6">
        </label>
        <label class="input"><span id="bfaxid6">Fax</span>
          <input type="text" class="bfax-class" value="<?php echo $BuildFax6; ?>" id="b_fax6" name="bfax6" >
        </label>
        <label class="input"><span id="bemailid6">Email</span>
          <input type="text" class="bemail-class" value="<?php echo $BuildEmail6; ?>" id="b_email6" name="bemail6" >
        </label>
    
    </div>
    
    <!----------------------------------------- End of Builder Tab Content -------------------------------------------------->
    

  </div>
</div>
<script type="text/javascript">

var builderinfo=new ddtabcontent("builder-tabs")
builderinfo.setpersist(false)
builderinfo.setselectedClassTarget("link") //"link" or "linkparent"
builderinfo.init()

</script>

<!----------------------------------------------------------- End of Builder Tabs ------------------------------------------------->
  
  <!------------------------------------------------------------- Enquiry Tracker Tab ------------------------------------------------->
  <div id="tabs_wrapper" class="info-tab">
    <div id="tabs_container">
      <ul id="tabs_default">
        <li class="active"><span>Enquiry Tracker</span></li>
      </ul>
    </div>
    <div id="tabs_content_container">
      <div id="tracker" class="tab_content_default" style="display: block;">
        <label class="input"><span id="date-entered">Date Entered:</span>
          <input type="text" id="idate" name="idate" class="date_entered" value="<?php echo $DateLodged; ?>">
        </label>
        <input type="submit" value="Send Mail" id="ibtn" name="sendmail" class="btn">
        
        <!--- Sales Rep --->
        <?php
	  $queryrep="SELECT id, name, RepID, email FROM ver_users ORDER BY name ASC";
      $resultrep = mysql_query($queryrep);
      if(!$resultrep){die ("Could not query the database: <br />" . mysql_error());}
      //create selection list				
	   while($row = mysql_fetch_row($resultrep))
	{
		$heading = $row[0];	
		$RepIDArrayPhp .= 'RepIDArray["'.$heading.'"]="'.$row[0].'";';
		$RepNameArrayPhp .= 'RepNameArray["'.$heading.'"]="'.$row[1].'";';
		$RepIdentArrayPhp .= 'RepIdentArray["'.$heading.'"]="'.$row[2].'";';
		$RepEmailArrayPhp .= 'RepEmailArray["'.$heading.'"]="'.$row[3].'";';
	}
	  	    echo "<label class='input'><select class='rep-list' id='replist' name='replist' onchange='javascript:SelectChangedRep();'><option></option>";
            $usergroup = 'Victoria Users';
            $querysub2="SELECT id, name FROM ver_users WHERE usertype LIKE ('$usergroup') ORDER BY name ASC";
            $resultsub2 = mysql_query($querysub2);
            if(!$resultsub2){die ("Could not query the database: <br />" . mysql_error());
			}
			
			  while ($data=mysql_fetch_assoc($resultsub2)){
                  echo "<option value = '{$data[id]}'";
                       if ($RepID == $data[id]) {
                            echo "selected = 'selected'";

					    }
                        echo ">{$data[name]}</option>";
		        }
 
echo "</select></label>";


?>
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
		document.getElementById('repname').value = RepNameArray[Rep];
		document.getElementById('repident').value = RepIdentArray[Rep];
		document.getElementById('repid').value = RepIDArray[Rep];
        document.getElementById('repemail').value = RepEmailArray[Rep];
	}
</script>
        <input type="hidden" id="repname" name='repname' value="<?php echo $RepName; ?>" readonly />
        <input type="hidden" id="repident" name='repident' value="<?php echo $RepIdent; ?>" readonly />
        <input type="hidden" id="repid" name='repid' value="<?php echo $RepID; ?>" readonly />
        <input type="hidden" id="repemail" name='repemail' value="<?php echo $RepEmail; ?>" readonly />
        <!-- End of Sales Rep ---> 
        
        <!--- Lead Type --->
        <?php
      $querylead="SELECT cf_id, lead FROM ver_chronoforms_data_lead_vic ORDER BY lead ASC";
      $resultlead = mysql_query($querylead);
      if(!$resultlead){die ("Could not query the database: <br />" . mysql_error());}
      //create selection list				
	   while($row = mysql_fetch_row($resultlead))
	{
		$heading = $row[0];	
		$LeadIDArrayPhp .= 'LeadIDArray["'.$heading.'"]="'.$row[0].'";';
		$LeadNameArrayPhp .= 'LeadNameArray["'.$heading.'"]="'.$row[1].'";';

	}
			



	  	    echo "<label class='input'><select class='lead-list' id='leadlist' name='leadlist' onchange='javascript:SelectChangedLead();'><option></option>";
            $querysub2="SELECT cf_id, lead FROM ver_chronoforms_data_lead_vic ORDER BY lead ASC";
            $resultsub2 = mysql_query($querysub2);
            if(!$resultsub2){die ("Could not query the database: <br />" . mysql_error());
			}
			
			  while ($data=mysql_fetch_assoc($resultsub2)){
                  echo "<option value = '{$data[cf_id]}'";
                       if ($LeadID == $data[cf_id]) {
                            echo "selected = 'selected'";
					    }
                        echo ">{$data[lead]}</option>";
		        }
 
echo "</select></label>";
?>
        <script language="Javascript" type="text/javascript">
    var LeadIDArray = new Array();
	<?php echo $LeadIDArrayPhp; ?>
    var LeadNameArray = new Array();
	<?php echo $LeadNameArrayPhp; ?>


	function SelectChangedLead()
	{
		var Lead = document.getElementById('leadlist').value;
		document.getElementById('leadname').value = LeadNameArray[Lead];
		document.getElementById('leadid').value = LeadIDArray[Lead];

	}
</script>
        <input type="hidden" id="leadname" name='leadname' value="<?php echo $LeadName; ?>" readonly />
        <input type="hidden" id="leadid" name='leadid' value="<?php echo $LeadID; ?>" readonly />
        
        <!-- End of Lead Type --->
        
        <label class='input'><span>Last Rep Allocated</span>
          <select class="last-rep">
            <option value=""></option>
          </select>
        </label>
        <?php $user =& JFactory::getUser(); $userName = $user->get( 'name' );
       echo '<label class=\'input\'><span id=\'takenid\'>Taken by:</span><input type=\'text\' id=\'username\' name=\'username\' class=\'username\' value=\''.$userName.'\' readonly></label>';?>
         <?php $usermail =& JFactory::getUser(); $userEmail = $usermail->get( 'email' );
       echo '<input type=\'hidden\' id=\'usermail\' name=\'usermail\' value=\''.$userEmail.'\' readonly>';?>
        
                <div class="input-group date form_datetime col-md-5" data-date-format="dd-M-yyyy @ HH:ii P" data-link-field="dtp_appointment" style="display:inline-block">
                    <label class='input'><span id='date-entered'>Appointment: </span>
          <input type="text" id="iappointment" name="iappointment" class="form-control" value="" readonly>
        </label>    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
					<span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                </div>
				<input type="hidden" id="dtp_appointment" name="dtp_appointment" value="" /><br/>
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
      </div>
    </div>
  </div>
  
  <!-- Drawing Image Tab --->
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
             <td class="tbl-upload"><input type="file" name="photo[]" id="uploadme" multiple="multiple">
            <input type="hidden" id="checkfile" value="No" name="checkfile"></td>
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

      <div id="notes" class="tab_content" style="display: block;">
        <table id="tbl-notes">
        <?php $user =& JFactory::getUser(); $userName = $user->get( 'name' ); ?>
        <tr>
		  <td class="tbl-content"><textarea name="notestxt[]" id="notestxt"><?php echo $NotesTxt; ?></textarea>
          <div class="layer-date">Date: <input type="text" id="date_display" name="date_display" class="datetime_display" value="<?php print(Date("d-M-Y")); ?>" readonly>
          <input type="hidden" id="date_notes" name="date_notes[]" class="date_time" value="<?php print(Date("Y-m-d H:i:s")); ?>" readonly> 
          </div>
          <div class="layer-whom">By Whom: <input type="text" id="username_notes" name="username_notes[]" class="username" value="<?php echo $userName; ?>" readonly></div>  
          </td>

		  </tr>
      </table>
      <table id="tbl-content">
        <?php
$resultnotes = mysql_query("SELECT cf_id, datenotes, username, content FROM ver_chronoforms_data_notes_vic WHERE clientid = '$TenderID' ORDER by datenotes DESC");
$i=1;
if (!$resultnotes) {
    echo 'Could not run query: ' . mysql_error();
    exit;
}

  while($row = mysql_fetch_row($resultnotes))
	{

echo "
<tr><td class=\"tbl-content\"><h1>Notes ". $i++ ."</h1><p>$row[3]</p>
<div class=\"layer-date\">Date: " .date('d-M-Y', strtotime ($row[1])) . "</div>
<div class=\"layer-whom\">By Whom: $row[2]</div>
</td>
</tr>";
	}
?>
      </table>

      </div>
    </div>
  </div>
  <div id="_tabs_wrapper" class="button-tab">
    <input type="submit" value="Cancel" id="bcbtn" name="cancel" class="bbtn" onclick=location.href='<?php echo JURI::base().'tender-listing-vic'; ?> />
    <input type="submit" value="Save" id="bsbtn" name="save" class="bbtn">
  </div>
</form>
