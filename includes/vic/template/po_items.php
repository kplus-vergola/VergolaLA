<?php
$print_section = "";
if(isset($_GET["print_section"])){
	$print_section = $_GET["print_section"];
}

$QuoteID = 0;
if(isset($_REQUEST['pid']))
	$QuoteID =$_REQUEST['pid'];

$QuoteIDAlpha = substr($QuoteID, 0, 3);
$current_date = date('Y-m-d H:i:s');

//administrator\components\com_chronoforms\form_actions\tcpdf
//error_log($QuoteIDAlpha, 3,'C:\\xampp\htdocs\\vergola_contract_system_v4_us\\my-error.log');
if(isset($_POST['add']))
{	
    $template_clientid=$_POST['clientid'];
	$template_title=$_POST['title'] ; 
	$template_content=$_POST['htmlcontent'] ;
    
	 
	mysql_query("INSERT INTO ver_chronoforms_data_letters_vic (clientid, template_name, datecreated, template_content) 
		 VALUES ('$template_clientid','$template_title', '$current_date', '$template_content')"); 

	
	//$_GET['section'] = 'frame'; 
	//header("Location: ". JURI::base() . $_SERVER['REDIRECT_URI'] . '?' . http_build_query($_GET)); 		
    // echo('<script language="Javascript">opener.window.location.reload(false); window.close();</script>');
    //echo('<script language="Javascript">alert(opener.window.location.href);</script>');
    //var url = opener.window.location.href+'&section=frame';
    $titleID=$_POST['title'] ;
	
	// $file=$template_title;
	// header('Content-type: application/pdf');
	// header('Content-Disposition: attachment; filename='.$file.'');
	// readfile($file);
	

	echo('<script language="Javascript">window.opener.parent.location.href = opener.window.location.href + "&titleID='.$titleID.'"; window.close();</script>');
	 
}


?>

<html>
<title>Print PO</title>
<head>
<script src="<?php echo JURI::base().'media/editors/tinymce/jscripts/tiny_mce/tiny_mce.js'; ?>" type="text/javascript"></script>
<script type="text/javascript">
				tinyMCE.init({
					// General
					dialog_type : "modal",
					directionality: "ltr",
					editor_selector : "mce_editable",
					language : "en",
					mode : "specific_textareas",
					plugins : "paste,searchreplace,insertdatetime,table,emotions,media,advhr,directionality,fullscreen,layer,style,xhtmlxtras,visualchars,visualblocks,nonbreaking,wordcount,template,advimage,advlink,advlist,autosave,contextmenu,inlinepopups",
					skin : "default",
					theme : "advanced",
					// Cleanup/Output
					inline_styles : true,
					gecko_spellcheck : true,
					entity_encoding : "raw",
					extended_valid_elements : "hr[id|title|alt|class|width|size|noshade|style],img[class|src|border=0|alt|title|hspace|vspace|width|height|align|onmouseover|onmouseout|name|style],a[id|class|name|href|hreflang|target|title|onclick|rel|style]",
					force_br_newlines : false, force_p_newlines : true, forced_root_block : 'p',
					invalid_elements : "script,applet",
					// URL
					relative_urls : true,
					remove_script_host : false,
					document_base_url : "<?php echo JURI::base(); ?>",
					//Templates
					template_external_list_url : "<?php echo JURI::base().'media/editors/tinymce/templates/template_list.js'; ?>",
					// Layout
					content_css : "<?php echo JURI::base().'templates/system/css/editor.css'; ?>",
					// Advanced theme
					theme_advanced_toolbar_location : "top",
					theme_advanced_toolbar_align : "left",
					theme_advanced_source_editor_height : "950",
					theme_advanced_source_editor_width : "750",
					theme_advanced_resizing : true,
					theme_advanced_resize_horizontal : false,
					theme_advanced_statusbar_location : "bottom", theme_advanced_path : true,
					theme_advanced_buttons1_add_before : "",
					theme_advanced_buttons2_add_before : "search,replace,|",
					theme_advanced_buttons3_add_before : "tablecontrols",
					theme_advanced_buttons1_add : "fontselect,fontsizeselect",
					theme_advanced_buttons2_add : "insertdate,inserttime,forecolor,backcolor,fullscreen",
					theme_advanced_buttons3_add : "emotions,media,advhr,ltr,rtl",
					theme_advanced_buttons4 : "cut,copy,paste,pastetext,pasteword,selectall,|,insertlayer,moveforward,movebackward,absolute,styleprops,cite,abbr,acronym,ins,del,attribs,visualchars,visualblocks,nonbreaking,blockquote,template",
					plugin_insertdate_dateFormat : "%Y-%m-%d",
					plugin_insertdate_timeFormat : "%H:%M:%S",
					fullscreen_settings : {
						theme_advanced_path_location : "top"
					}
				});

				function submitForm() { 
				    document.getElementById("add").click();
				}
				//window.location = "test.php";
				//window.open = opener.window.location.href + "&titleID='.$titleID.'";
				window.onload = submitForm;


				</script>
<style>
p {margin: 0;}
.btn {background-color: #4285F4;
    border: 1px solid #026695;
    color: #FFFFFF;
    cursor: pointer;
    margin: 5px 0;
    padding: 2px;
    width: 190px;}
 
.template_tbl {border:1px solid black;  min-width:900px;padding:0px; border-collapse:collapse;  }
 
</style>
</head>
<body>
<?php
 
 
$projectid = mysql_real_escape_string($_REQUEST['projectid']);
$section = mysql_real_escape_string($_REQUEST['section']);
$titleID = mysql_real_escape_string($_REQUEST['titleID']);
$supplierid = mysql_real_escape_string($_REQUEST['supplierid']);

$inventoryid = "";
$is_reorder = 0;
if($section=="reorder"){
	$is_reorder = 1;
	$inventoryid = mysql_real_escape_string($_REQUEST['inventoryid']);
}

//$sql = "SELECT * FROM ver_chronoforms_data_contract_list_vic  AS contract LEFT JOIN ver_chronoforms_data_clientpersonal_vic AS c ON c.clientid = contract.quoteid WHERE  contract.projectid = '{$projectid}' ";
//error_log($sql, 3,'C:\\xampp\htdocs\\vergola_contract_system_v4_us\\my-error.log');exit();
$sql = "SELECT * FROM ver_chronoforms_data_contract_list_vic  AS contract JOIN ver_chronoforms_data_clientpersonal_vic AS c ON c.clientid = contract.quoteid WHERE  contract.projectid = '".$projectid."' ";
//error_log($sql, 3,'C:\\xampp\htdocs\\vergola_contract_system_v4_us\\my-error.log');
$qContract = mysql_query($sql);
$contract = mysql_fetch_array($qContract); 
//error_log(print_r($contract,true), 3,'C:\\xampp\htdocs\\vergola_contract_system_v4_us\\my-error.log');exit();

 
$sql = "SELECT * FROM ver_chronoforms_data_supplier_vic  WHERE  supplierid = '".$supplierid."' ";
//error_log($sql, 3,'C:\\xampp\htdocs\\vergola_contract_system_v4_us\\my-error.log');
$qSupplier = mysql_query($sql);
$supplier = mysql_fetch_array($qSupplier);

?>

<form method="post">
<input name="clientid" id="clientid" type="hidden" value="<?php echo $projectid; ?>">
<input name="title" id="title" type="hidden" value="<?php echo $titleID; ?>">
 
<textarea name="htmlcontent" id="htmlcontent" class="mce_editable" style="width:100%;height:100%!important; ">
<div style="font-family:Arial, Helvetica, sans-serif; width:700px;  font-size: 10pt;">
<table class="template_tbl" cellspacing="0" cellpadding="0" width="600px">
	<tr>
		<td  style="width:50%; text-align:left; " >
		 	<img src="<?php echo JURI::base().'images/company_logo.png'; ?> " class="" style="float:left;padding:0px 0px 10px 0; width: 120px;"/>
			 
		</td>
		<td valign="middle" style="padding-left: 5px; font-family:Arial, Helvetica, sans-serif;font-size:10pt;width:50%;">
			<br/>
			<b>Vergola (SA) Pty Ltd</b><br/>
			101 Port Road<br/>
			THEBARTON SA 5031<br/>
			Phone: 0881506888  &nbsp;&nbsp;&nbsp; FAX: 08 8150 6868 <br/>
			ABN: 14115578112 <br/>
			Email: admin@vergola.com
  
		</td>
	</tr>
	<tr>
		<td style="padding-left: 5px; border: 1px solid black; border-collapse: collapse;">
			 
			<div><b>To:</b></div>
			<div>
				<?php echo $supplier["company_name"]; ?> <br/>
				<?php echo $supplier["address1"]; ?> <br/>
				<?php echo $supplier["suburb"]." ".$supplier["state"]." ".$supplier["postcode"]; ?> <br/> 
				<?php echo $supplier["phone"] ?> <br/>
				<?php echo $supplier["fax"]  ?> <br/>  
			</div>
		</td>
		<td style="padding-left: 5px; border: 1px solid black; border-collapse: collapse;">
			 
			<div><b>Deliver To:</b></div>
			<div>
				<?php if($contract['is_builder']==1){  
					  echo $contract["builder_name"];    
				}else{
					 echo $contract["client_firstname"]." ".$contract["client_lastname"]; 
				} ?> <br/>

				<?php if(empty($contract['site_address1'])==false){  
					echo $contract["site_address1"]." ".$contract["site_address2"];  
				}else{
					echo $contract["client_address1"]." ".$contract["client_address2"]; 
				} ?><br/>
				
				<?php if(empty($contract['site_suburb'])==false){ 
					echo $contract["site_suburb"]." ".$contract["site_state"]." ".$contract["site_postcode"]; 
				}else{
					echo $contract["client_suburb"]." ".$contract["client_state"]." ".$contract["client_postcode"]; 
				} ?><br/>

				<?php if(empty($contract["site_hmphone"])==false){ 
					 echo $contract["site_hmphone"];
				}else{
					echo $contract["client_hmphone"];
				} ?><br/>	
 
				<?php if(empty($contract["site_mobile"])==false){ 
					echo $contract["site_mobile"];
				}else{   
					echo $contract["client_mobile"];
				} ?><br/>		
			</div>
		</td>
	</tr>
	<tr><td colspan="2"></td></tr>	
	<tr>	
		<td colspan="2">
			<b>Client:</b> <?php if($contract["is_builder"]==1){ echo $contract["builder_name"]; }else{ echo $contract["client_firstname"]." ".$contract["client_lastname"];} ?> &nbsp;&nbsp;&nbsp;&nbsp; 
			<b>Project ID:</b> <?php echo $contract["projectid"]; ?>&nbsp;&nbsp;
			<b>Account No:</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<b>Required Date:</b>  
		</td>
	</tr>	
</table>  
<br/> 
 
<b>PO Order No.: <?php echo $contract["cf_id"]  ?></b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b>Ordered On:</b> <?php print(Date(PHP_DFORMAT)); ?>
<br/><br/>
<table class="" border="1" cellspacing="0" style="border-collapse:collapse;font-size:9pt;" width="600px">
	<tr>
		 	<th width="240" colspan="2">
				&nbsp;&nbsp;<b>Description</b> &nbsp;&nbsp;
			</th>
			<th width="50">
				&nbsp;&nbsp;<b>Qty</b>&nbsp;&nbsp;
			</th>
			<th width="50">
				 <b>Length</b> 
			</th>
			<th width="40">
				 <b>UOM</b> 
			</th> 
			<th width="60">
				&nbsp;&nbsp;<b>Color</b> &nbsp;&nbsp;
			</th>
			<th width="60">
				&nbsp;&nbsp;<b>Finish</b> &nbsp;&nbsp;
			</th>
			<th width="60">
				&nbsp;&nbsp;<b>Price</b> &nbsp;&nbsp;
			</th>
			<th  >
				&nbsp;&nbsp;<b>Amount</b> &nbsp;&nbsp;
			</th>
		 
	</tr>


	<?php
 
//Main item of a raw material that should display first like beam and post.
// $sql = "SELECT bm.id, b.qty, m.qty, (m.qty*b.qty) AS m_qty, SUM(m.qty*b.qty) AS s_qty, 
// 	CASE WHEN m.is_per_length=1 THEN CASE WHEN m.uom='Ea' THEN SUM(floor(b.length/m.length_per_ea)) ELSE SUM(b.qty*m.qty) END ELSE SUM(m.qty*b.qty) END  AS ls_qty, 
//     CASE WHEN m.is_per_length=1 
// 		THEN CASE WHEN m.uom='Ea' THEN SUM(m.raw_cost * floor(b.length/m.length_per_ea)) 
//         ELSE SUM(m.raw_cost * b.qty) END
// 	ELSE SUM(m.raw_cost * b.qty)  END  AS ls_amount,
//     b.length, CASE WHEN m.is_per_length=1 THEN SUM(b.length) END AS s_length, bm.projectid, bm.inventoryid, bm.materialid, (bm.raw_cost * bm.qty) AS raw_cost, bm.qty, bm.supplierid, m.raw_description, m.is_per_length, m.length_per_ea, m.uom, s.company_name, inv.photo, b.colour, b.finish
// FROM ver_chronoforms_data_contract_bom_meterial_vic AS bm  
// JOIN ver_chronoforms_data_contract_bom_vic AS b ON b.inventoryid=bm.inventoryid
// JOIN ver_chronoforms_data_inventory_vic AS inv ON inv.inventoryid=bm.inventoryid 				
// JOIN ver_chronoforms_data_materials_vic AS m ON m.cf_id=bm.materialid 
// JOIN ver_chronoforms_data_supplier_vic AS s ON s.supplierid=m.supplierid
// JOIN ver_chronoforms_data_inventory_material_vic AS im ON im.inventoryid = bm.inventoryid AND bm.materialid = im.materialid
// WHERE bm.projectid = '{$projectid}' AND b.projectid = '{$projectid}' AND b.is_reorder={$is_reorder}  ".($is_reorder==1?" AND b.inventoryid='{$inventoryid}' ":" AND inv.section='{$section}'")." AND m.supplierid='{$supplierid}' AND m.is_main_item=1 GROUP BY b.cf_id ORDER BY is_per_length DESC, bm.id, b.length DESC, b.qty DESC ";

//Modiefied SQL QUERY for Main item of a raw material that should display first like beam and post.
$sql = "SELECT
		bm.id,
		b.qty,
		( im.inv_qty * b.qty ) AS m_qty,
		SUM( im.inv_qty * b.qty ) AS s_qty,
	CASE
		
		WHEN m.is_per_length = 1 THEN
	CASE
		
		WHEN m.uom = 'Ea' THEN
		SUM(( floor(b.length_feet * 12 ) + b.length_inch / m.length_per_ea ) ) ELSE SUM( b.qty * im.inv_qty ) 
		END ELSE SUM( im.inv_qty * b.qty ) 
		END AS ls_qty,
	CASE
			
			WHEN m.is_per_length = 1 THEN
		CASE
				
				WHEN m.uom = 'Ea' THEN
				SUM( im.inv_extcost * floor((b.length_feet * 12 ) + b.length_inch / m.length_per_ea ) ) ELSE SUM( im.inv_extcost * b.qty ) 
			END ELSE SUM( im.inv_extcost * b.qty ) 
		END AS ls_amount,
		
	CASE 
			
			WHEN m.is_per_length = 1 THEN
			SUM( (b.length_feet * 12 ) + b.length_inch ) 
		END AS s_length,
		ROUND(bm.length_fraction) AS rfrac,
		CEILING(bm.length_fraction) AS cfrac,
		bm.projectid,
		bm.inventoryid,
		bm.materialid,
		(bm.raw_cost * im.inv_qty) AS rawcost,
		(bm.qty * im.inv_qty) AS invqty,
		bm.qty AS bm_qty,
		bm.supplierid,
		bm.length_fraction,
		m.raw_description AS rawdesc,
		m.raw_description,
		m.is_per_length,
		m.length_per_ea,
		m.uom,		
		m.raw_cost,
		im.inv_extcost,
		im.inv_qty,
		s.company_name,
		inv.photo,
		b.colour,
		b.finish 
		FROM ver_chronoforms_data_contract_bom_meterial_vic AS bm  
		JOIN ver_chronoforms_data_contract_bom_vic AS b ON b.inventoryid=bm.inventoryid
		JOIN ver_chronoforms_data_inventory_vic AS inv ON inv.inventoryid=bm.inventoryid 				
		JOIN ver_chronoforms_data_materials_vic AS m ON m.cf_id=bm.materialid 
		JOIN ver_chronoforms_data_supplier_vic AS s ON s.supplierid=m.supplierid
		JOIN ver_chronoforms_data_inventory_material_vic AS im ON im.inventoryid = inv.inventoryid AND im.materialid=m.cf_id
		WHERE bm.projectid = '{$projectid}' AND b.projectid = '{$projectid}' AND b.is_reorder={$is_reorder}  ".($is_reorder==1?" AND b.inventoryid='{$inventoryid}' ":" AND inv.section='{$section}'")." AND m.supplierid='{$supplierid}' AND m.is_main_item=1 GROUP BY b.cf_id ORDER BY is_per_length DESC, bm.id, b.length DESC, b.qty DESC ";

//Non main item that are additional item like bolts & nuts for a post or a beam.
// $sql2 = "SELECT bm.id, b.qty, m.qty, (m.qty*b.qty) AS m_qty, SUM(m.qty*b.qty) AS s_qty, 
// 	CASE WHEN m.is_per_length=1 THEN CASE WHEN m.uom='Ea' THEN IF(1=".(METRIC_SYSTEM=="inch"?"1":"0").",'i '+SUM(floor(b.length/m.length_per_ea_us)),'m '+SUM(floor(b.length/m.length_per_ea))) ELSE SUM(b.qty*m.qty) END ELSE SUM(m.qty*b.qty) END  AS ls_qty, 
//     CASE WHEN m.is_per_length=1 
// 		THEN CASE WHEN m.uom='Ea' THEN SUM(m.raw_cost * floor(b.length/m.length_per_ea)) 
//         ELSE SUM(m.raw_cost * b.qty) END
// 	ELSE SUM(m.raw_cost * b.qty)  END  AS ls_amount,
//     b.length, 
//     CASE WHEN m.is_per_length=1 THEN SUM(b.length) END AS s_length,
//     bm.projectid, bm.inventoryid, bm.materialid, bm.raw_cost, bm.qty, bm.supplierid, m.raw_description, m.is_per_length, m.length_per_ea, m.uom, s.company_name, b.colour, b.finish
// FROM ver_chronoforms_data_contract_bom_meterial_vic AS bm  
// JOIN ver_chronoforms_data_contract_bom_vic AS b ON b.inventoryid=bm.inventoryid
// JOIN ver_chronoforms_data_inventory_vic AS inv ON inv.inventoryid=bm.inventoryid 				
// JOIN ver_chronoforms_data_materials_vic AS m ON m.cf_id=bm.materialid 
// JOIN ver_chronoforms_data_supplier_vic AS s ON s.supplierid=m.supplierid  
// WHERE bm.projectid = '{$projectid}' AND b.projectid = '{$projectid}' AND b.is_reorder={$is_reorder}  ".($is_reorder==1?" AND b.inventoryid='{$inventoryid}' ":" AND inv.section='{$section}'")." AND m.supplierid='{$supplierid}' AND m.is_main_item=0 GROUP BY bm.materialid ORDER BY is_per_length DESC ";

//----------Begin Old Query------------------------
// $sql2 = "SELECT bm.id,   m.qty, (m.qty*bm.qty) AS m_qty, SUM(m.qty*bm.qty) AS s_qty, 
// 	CASE WHEN m.is_per_length=1 THEN CASE WHEN m.uom='Ea' THEN IF(1=".(METRIC_SYSTEM=="inch"?"1":"0").", SUM(bm.qty*floor(ROUND(bm.length/m.length_per_ea_us,3))), SUM(bm.qty*floor(ROUND(bm.length/m.length_per_ea,3)))) ELSE SUM(bm.qty*m.qty) END ELSE SUM(m.qty*bm.qty) END  AS ls_qty, 
//     CASE WHEN m.is_per_length=1 
// 		THEN CASE WHEN m.uom='Ea' THEN SUM(m.raw_cost * floor(bm.length/m.length_per_ea)) 
//         ELSE SUM(m.raw_cost * bm.qty) END
// 	ELSE SUM(m.raw_cost * bm.qty)  END  AS ls_amount,
//     bm.length, 
//     CASE WHEN m.is_per_length=1 THEN SUM(bm.length) END AS s_length,
//     bm.projectid, bm.inventoryid, bm.materialid, bm.raw_cost, bm.qty, bm.supplierid, m.raw_description, m.is_per_length, m.length_per_ea, m.uom, s.company_name 
// FROM ver_chronoforms_data_contract_bom_meterial_vic AS bm   
// JOIN ver_chronoforms_data_inventory_vic AS inv ON inv.inventoryid=bm.inventoryid 				
// JOIN ver_chronoforms_data_materials_vic AS m ON m.cf_id=bm.materialid 
// JOIN ver_chronoforms_data_supplier_vic AS s ON s.supplierid=m.supplierid
// WHERE bm.projectid = '{$projectid}'  AND m.supplierid='{$supplierid}' AND m.is_main_item=0 GROUP BY bm.materialid ORDER BY is_per_length DESC ";
//----------End Old Query------------------------

//SQL for raw materials secondary items
$sql2 = "SELECT
	bm.id, m.is_main_item, m.qty, im.inv_qty, ( im.inv_qty * bm.qty ) AS m_qty, SUM( im.inv_qty * bm.qty ) AS s_qty, im.inv_extcost, 
	( ( bm.length_feet * 12 ) + bm.length_inch ) AS bm_length, bm.qty AS bm_qty,
CASE
	
	WHEN m.is_per_length = 1 THEN
CASE
	
	WHEN m.uom = 'Ea' THEN
IF
	(
	1 = ".(METRIC_SYSTEM=="inch"?1:0).",
SUM( bm.qty * floor( ROUND( ( bm.length_feet * 12 ) + bm.length_inch / m.length_per_ea_us, 3 ) ) ),
	SUM( bm.qty * floor( ROUND( ( bm.length_feet * 12 ) + bm.length_inch / m.length_per_ea, 3 ) ) ) 
	) ELSE SUM( bm.qty * im.inv_qty ) 
	END ELSE SUM( im.inv_qty * bm.qty ) 
	END AS ls_qty,
CASE
		
		WHEN m.is_per_length = 1 THEN
	CASE
			
			WHEN m.uom = 'Ea' THEN
			SUM( im.inv_extcost * floor( ( bm.length_feet * 12 ) + bm.length_inch / m.length_per_ea ) ) ELSE SUM( im.inv_extcost * bm.qty ) 
		END ELSE SUM( im.inv_extcost * bm.qty ) 
	END AS ls_amount,
	bm.length,
CASE
		
		WHEN m.is_per_length = 1 THEN
		SUM( ( bm.length_feet * 12 ) + bm.length_inch ) 
	END AS s_length,
	bm.projectid,
	bm.inventoryid,
	bm.materialid,
	m.raw_cost,	
	bm.supplierid,
	m.raw_description AS rawdesc,
	m.raw_description,
	m.is_per_length,
	m.length_per_ea,
	m.uom,
	im.inv_qty,
	im.inv_extcost,
	s.company_name 
FROM
	ver_chronoforms_data_contract_bom_meterial_vic AS bm
	JOIN ver_chronoforms_data_inventory_vic AS inv ON inv.inventoryid = bm.inventoryid
	JOIN ver_chronoforms_data_materials_vic AS m ON m.cf_id = bm.materialid
	JOIN ver_chronoforms_data_supplier_vic AS s ON s.supplierid = m.supplierid 
	JOIN ver_chronoforms_data_inventory_material_vic AS im ON im.inventoryid=inv.inventoryid AND im.materialid=m.cf_id
WHERE
	bm.projectid = '{$projectid}'  AND m.supplierid='{$supplierid}' AND m.is_main_item=0 
GROUP BY
	im.materialid, bm.inventoryid 
ORDER BY
is_per_length DESC ";

//Display Main item of a raw material that should display first like beam and post.
 				$totalRrp = 0;
				 
				//error_log("sql 2: ". $sql2, 3,'C:\\xampp\htdocs\\vergola_contract_system_v4_us\\my-error.log');
				$item_result = mysql_query ($sql);
				
				while ($m = mysql_fetch_assoc($item_result)){ 
					$totalRrp += $m['ls_amount'];

				//Convert fraction to decimal
				$input = $m['length_fraction'];				
				if (strpos($input, '/') === FALSE) { $result = $input;
				} else { $fraction = array('whole' => 0);
					preg_match('/^((?P<whole>\d+)(?=\s))?(\s*)?(?P<numerator>\d+)\/(?P<denominator>\d+)$/', $input, $fraction);
				    $result = $fraction['whole']; if ($fraction['denominator'] > 0) $result += $fraction['numerator'] / $fraction['denominator']; }
				
				//while ($row = mysql_fetch_assoc($result)){
				$amount = 0;
				$m_qty = 1; $m_length = 1;
				if($m['is_per_length']==1){
					// $amount = $m['raw_cost'] * $m['qty'] * $bm['qty'] * floor($bm['length'] / $m['length_per_ea']);
					if($m['uom']=="Ea"){
						$m_qty = 0; 
						$mlength = (($m['length_feet'] * 12) + $m['length_inch']);
						$m_qty = $m['invqty'] * floor($m['s_length'] / ((METRIC_SYSTEM=="inch")?$m['length_per_ea_us']:$m['length_per_ea']));						
						$amount = $m_qty * $m['raw_invcost'];  
						//$m_length = $bm['length_feet']."'".$bm['length_inch']; //$m_length = $bm['length'];
						//error_log("inventoryid:".$bm['inventoryid']."m_qty:".$m_qty."---- lpe:".((METRIC_SYSTEM=="inch")?$m['length_per_ea_us']:$m['length_per_ea'])." bm-length:".$bm['length']." floor-".($bm['length'] / ((METRIC_SYSTEM=="inch")?$m['length_per_ea_us']:$m['length_per_ea'])), 3,'C:\\xampp\htdocs\\vergola_contract_system_v4_us\\my-error.log'); 
						$amount = ($m['raw_cost'] * (($m['inv_qty'] == 0 || $m['inv_qty'] == null) ?  1 : $m['inv_qty']))  * $m['bm_qty']; 
					}
					else{
						//$bm['qty'] = $raw_qty;
						$m_qty = $m['invqty'] * $bm['qty'];
						$bm['length'] = (($bm['length_feet'] * 12) + $bm['length_inch']);
						$m_fracs = number_format($bm['length_fraction']);
						$m_length = $bm['length'] / $m['length_per_ea'];// * floor($bm['length'] / $m['length_per_ea']); 						
						//$amount = $m['raw_cost'] * ((($bm['length_feet'] * 12) + $bm['length_inch']) + number_format($bm['length_fraction']));
						$amount = $m['inv_extcost'] * ($m['invqty'] * ($m['s_length'] + $result));						
						//$amount = 150;
						$m_length = $bm['length_feet']."'".$bm['length_inch']; //$m_length = $bm['lenght_feet']; 
						$amount = ($m['raw_cost'] * (($m['inv_qty'] == 0 || $m['inv_qty'] == null) ?  1 : $m['inv_qty']))  * ($m['s_length'] + $result) * $m['bm_qty']; 
						//$amount = $m['qty'];
					}

					
				}else{
					$bm['length'] = (($bm['length_feet'] * 12) + $bm['length_inch']);
					//$bm['qty'] = $raw_qty;
					$amount = $m['raw_invcost'] * $m['invqty'] * $bm['qty']; 
					$m_qty = $m['invqty'] * $bm['qty'];
					$m_length = $bm['length_feet']."'".$bm['length_inch']; //$m_length = $bm['length']; 

					$amount = $m['inv_extcost'] * $m['invqty'] * ($m['s_length'] + $result);						
					//$amount = 50;
					if($bm['inventoryid']=="IRV120"){
					//error_log(print_r($m,true), 3,'C:\\xampp\htdocs\\vergola_contract_system_v4_us\\my-error.log'); 
					//error_log("m_qty:".$m_qty." m-qty:".$m['qty']." bm-qty:".$bm['qty'], 3,'C:\\xampp\htdocs\\vergola_contract_system_v4_us\\my-error.log');  
					}
					
				}

				?>  
					<tr> 
						
						<td colspan="2"><?php echo $m['rawdesc']; ?></td>
						<td style="text-align:right;"><?php echo $m['invqty']; ?></td> 						
						<td style="text-align:right;"><?php echo ($m['uom']=="Inches" && METRIC_SYSTEM == "inch"? get_feet_value($m['s_length']):($m['uom']=="Inches"?$m['s_length']:"")); ?></td> 
						<!-- <td style="text-align:right;"><?php echo ($m['s_length'] + $result); ?></td> -->
						<td style="text-align:right;"><?php echo $m['uom']; ?></td> 
						<td><?php echo $m['colour']; ?></td>
						<td><?php echo $m['finish']; ?></td>
						<td style="text-align:right;">$<?php echo number_format($m['raw_cost'],2); ?></td>  
						<td> $<?php echo $amount; ?> </td>
						<!-- <td style="text-align:right;">$<?php echo number_format($m['ls_amount'],2); ?></td> -->
					</tr>  

				<?php

				if($m["photo"] !=""  ){ //$section=="Guttering"

				?>
					<tr>
			  			<td colspan="9" style="border:none">
			  				<?php
				  			if($m["photo"] !="") { 
				  				echo " <img src='".JURI::base()."images/inventory/".$m['photo']."' class='' style='float:left;padding:0px 0px 0px 0; width: 345px;'/>";
							} 
							?>
			  			</td> 
			  		</tr>

				<?php 
					//mysql_data_seek($item_result, 0); 

						$sql = "SELECT id.length AS l, id.dimension_a, id.dimension_b, id.dimension_c, id.dimension_d, id.dimension_e, id.dimension_f, id.dimension_p FROM ver_chronoforms_data_contract_items_deminsions  AS id   WHERE projectid = '{$projectid}' AND inventoryid='{$m['inventoryid']}' LIMIT 1 ";
						//error_log("sql G: ". $sql, 3,'C:\\xampp\htdocs\\vergola_contract_system_v4_us\\my-error.log');
						
						$r_item_dimension = mysql_query ($sql);
						$item_dimension = mysql_fetch_assoc($r_item_dimension);	

						if(!empty($item_dimension)){
					?>   
					  	   
				  		<tr>
				  			<th colspan="2" align="right"  style="border:none;">Length&nbsp;&nbsp;</th>
				  			<th align="center"  style="border:none;">A</th>
				  			<th align="left"  style="border:none;">B</th>
				  			<th align="left"   style="border:none;">C</th>
				  			<th align="left"   style="border:none;">D</th>
				  			<th align="left"  style="border:none;">E</th>
				  			<th align="left" style="border:none;">F</th>
				  			<th align="left" style="border:none;">P</th>
				  			 
				  		</tr> 
				  		<tr> 
							<td colspan="2" valign="top" align="right" style="border:none;"><?php echo $item_dimension["l"]; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
							<td valign="top" align="center" style="border:none;"><?php echo $item_dimension["dimension_a"]; ?></td>
							<td valign="top" align="left" style="border:none;"><?php echo $item_dimension["dimension_b"]; ?></td>
							<td valign="top" align="left" style="border:none;"><?php echo $item_dimension["dimension_c"]; ?></td>
				  			<td valign="top" align="left" style="border:none;"><?php echo $item_dimension["dimension_d"]; ?></td>
				  			<td valign="top" align="left" style="border:none;"><?php echo $item_dimension["dimension_e"]; ?></td>
				  			<td valign="top" align="left" style="border:none;"><?php echo $item_dimension["dimension_f"]; ?></td>
				  			<td valign="top" align="left" style="border:none;"><?php echo $item_dimension["dimension_p"]; ?></td> 	
				  			 
				  		</tr>
					  		 
					   
			  	<?php 
			  	 	} //end if if it has a dimension
			   		
			   		if($m["photo"] !="" ){

			   			echo "<tr>
					  			<td colspan=\"9\" style=\"border:none\">&nbsp;</td> 
					  		</tr>";
			   		}  
			   	?>

			  	<?php 
			  		} //end of if it has a photo	
			  	} //end of while for the no main item materials
			  	?>

			  	<?php
					$item_result2 = mysql_query ($sql2);
					
					while ($m = mysql_fetch_assoc($item_result2)){ 
						$m['ls_amount'] = ($m['raw_cost'] * (($m['inv_qty'] == 0 || $m['inv_qty'] == null) ?  1 : $m['inv_qty']))  * ($m['s_length'] + $result) * $m['bm_qty']; 
						$totalRrp += $m['ls_amount']; 
						$m_qty = (($m['inv_qty'] == 0 || $m['inv_qty'] == null) ?  1 : $m['inv_qty']) * $m['bm_qty'];
						//$m['ls_amount'] = 
					?>  
						<tr> 
							<td colspan="2"><?php echo $m['rawdesc']; ?></td>  <!-- <td colspan="2"><?php echo $m['raw_description']; ?></td>   -->
							<!-- <td style="text-align:right;"><?php echo number_format($m['ls_qty']); ?></td> -->
							<td style="text-align:right;"><?php echo $m_qty; ?></td> 
							<td style="text-align:right;"><?php echo ($m['uom']=="Inches" && METRIC_SYSTEM == "inch"?get_feet_value($m['s_length']):($m['uom']=="Inches"?$m['s_length']:"")); ?></td>
							<td style="text-align:right;"><?php echo $m['uom']; ?></td> 
							<td> &nbsp; </td>
							<td> &nbsp; </td>
							<td style="text-align:right;">$<?php echo number_format($m['raw_cost'],2); ?></td>
							<td style="text-align:right;">$<?php echo number_format($m['ls_amount'],2); ?></td> 
						</tr> 

			  	<?php

				
			} // end of loop of m	

				?>
  
		<?php //} //------------ bm END contract_bom_vic loop. 

			$gst = $totalRrp * 0.1;
			$totalSum = $totalRrp + $gst;

		 ?>  	
</table>

<br/>
<table width="600px"> 
 
 	<tr>
 		<td width="250" colspan="2">
			&nbsp;&nbsp; 
		</td>
		<td width="50">
			&nbsp;&nbsp; 
		</td>
		<td width="50">
			 &nbsp;&nbsp;
		</td>
		<td width="40">
			 &nbsp;&nbsp;
		</td> 
		 
		<td  colspan="2" style="text-align:right" width="120">
			<span><b>Sub Total</b></span>&nbsp;&nbsp;&nbsp;&nbsp;
		</td> 
		<td style="text-align:right" width="90">
		 	$<?php echo number_format($totalRrp,2); ?>
		</td>
	</tr>
	<tr>
		<td colspan="7" style="text-align:right"> 
			<span ><b>GST</b></span>&nbsp;&nbsp;&nbsp;&nbsp;
		</td>
		 	
		<td style="text-align:right">
		 	$<?php echo number_format($gst,2); ?>
		</td>
	</tr>
	<tr>
		<td colspan="7" style="text-align:right"> 
			<span  ><b>Total Inclusive of GST</b></span>&nbsp;&nbsp;&nbsp;&nbsp;
		</td>
	 			
		<td style="text-align:right">
		 	$<?php echo number_format($totalSum,2); ?>
		</td>
	</tr>  
	 
</table>

<br/><br/>
Measurement Tolerance - 0m / + 1mm &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Length Tolerance - 0m / + 10mm <br/>
NOTE: all folds are 90&deg; unless otherwise stated



</div> 
</textarea>
<input type="submit" class="btn" name="add" id="add1" value="Download PDF"> <input class="btn" type="button" value="Close" onClick="window.opener=null; window.close(); return false;">

<!-- <input class="btn" type="submit" value="Save" onClick="window.location=window.location=location.window.location.href + "&titleID='.$titleID.'";  return true;">
<a href='<?php echo 'index.php?&titleID='.$titleID.'&option=com_chronoforms&tmpl=component&chronoform=Download-PDF'; ?>'>
    Download it!
</a> -->



</form>
</body>
</html>


<?php
	
function get_feet_value($inches){
	return floor($inches / 12)."&rsquo;" . floor($inches % 12);
     
}

function get_feet_whole($inches){
	return floor($inches / 12);
     
}

function get_feet_inch($inches){
	return floor($inches % 12);
     
}

 
?> 