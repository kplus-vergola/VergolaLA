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

//error_log($QuoteIDAlpha, 3,'C:\\xampp\htdocs\\vergola_contract_system_v4_sa\\my-error.log');
if(isset($_POST['add']))
{	
    $template_clientid=$_POST['clientid'];
	$template_title=$_POST['title'] ; 
	// $template_content=addslashes($_POST['htmlcontent']);
	$template_content=$_POST['htmlcontent'] ;
     
	mysql_query("INSERT INTO ver_chronoforms_data_letters_vic (clientid, template_name, datecreated, template_content) 
		 VALUES ('$template_clientid','$template_title', '$current_date', '$template_content')"); 

	
	//$_GET['section'] = 'frame'; 
	//header("Location: ". JURI::base() . $_SERVER['REDIRECT_URI'] . '?' . http_build_query($_GET)); 		
    // echo('<script language="Javascript">opener.window.location.reload(false); window.close();</script>');
    //echo('<script language="Javascript">alert(opener.window.location.href);</script>');
    //var url = opener.window.location.href+'&section=frame';
    $titleID=$_POST['title'] ;
	echo('<script language="Javascript">window.opener.parent.location.href = opener.window.location.href + "&titleID='.$titleID.'"; window.close();</script>');
	 
}

$config_vr_fractions_output_format = array(
    '1/32' => '1/32', 
    '2/32' => '1/16', 
    '3/32' => '3/32', 
    '4/32' => '1/8', 
    '5/32' => '5/32', 
    '6/32' => '6/32', 
    '7/32' => '7/32', 
    '8/32' => '1/4', 
    '9/32' => '9/32', 
    '10/32' => '10/32', 
    '11/32' => '11/32', 
    '12/32' => '3/8', 
    '13/32' => '13/32', 
    '14/32' => '14/32', 
    '15/32' => '15/32', 
    '16/32' => '1/2', 
    '17/32' => '17/32', 
    '18/32' => '18/32', 
    '19/32' => '19/32', 
    '20/32' => '5/8', 
    '21/32' => '21/32', 
    '22/32' => '22/32', 
    '23/32' => '23/32', 
    '24/32' => '3/4', 
    '25/32' => '25/32', 
    '26/32' => '26/32', 
    '27/32' => '27/32', 
    '28/32' => '7/8', 
    '29/32' => '29/32', 
    '30/32' => '30/32', 
    '31/32' => '31/32' 
);


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
//error_log($sql, 3,'C:\\xampp\htdocs\\vergola_contract_system_v4_sa\\my-error.log');exit();
$sql = "SELECT * FROM ver_chronoforms_data_contract_list_vic  AS contract JOIN ver_chronoforms_data_clientpersonal_vic AS c ON c.clientid = contract.quoteid WHERE  contract.projectid = '".$projectid."' ";
//error_log($sql, 3,'C:\\xampp\htdocs\\vergola_contract_system_v4_sa\\my-error.log');
$qContract = mysql_query($sql);
$contract = mysql_fetch_array($qContract); 
//error_log(print_r($contract,true), 3,'C:\\xampp\htdocs\\vergola_contract_system_v4_sa\\my-error.log');exit();

 
$sql = "SELECT * FROM ver_chronoforms_data_supplier_vic  WHERE  supplierid = '".$supplierid."' ";
//error_log($sql, 3,'C:\\xampp\htdocs\\vergola_contract_system_v4_sa\\my-error.log');
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
		 	<img src="<?php echo JURI::base().'images/company_logo.png'; ?> " class="" style="float:left;padding:0px 0px 10px 0; width: 180px;"/>
			 
		
		</td>
		<td valign="top" style="padding-left: 5px; font-family:Arial, Helvetica, sans-serif;font-size:10pt;width:50%;">			
			<b>Vergola LA Inc</b><br/>
			13800 Crenshaw Boulevard<br/>
			Gardena CA 90249<br/>
			Phone: 855 949 8347<br/>
			Email: purchasingla@vergola.com  
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
			<th width="50">
				 <b>Fraction</b> 
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
$order_by = ""; 
if($section=="Vergola"){ 
	$order_by = " ORDER BY FIELD(inv.category,'Louvers') DESC, FIELD(inv.inventoryid, 'IRV66', 'IRV64', 'IRV63', 'IRV62', 'IRV60', 'IRV59','IRV58') DESC, id   "; 
}

//Main item of a raw material that should display first like beam and post.


// $sql = "SELECT bm.id,m.qty,(im.inv_qty*bm.qty) AS m_qty,(bm.qty*im.inv_qty) AS ls_qty,bm.length,CASE WHEN m.uom='Mtrs' THEN bm.raw_cost*(im.inv_qty*bm.qty)*bm.length ELSE bm.raw_cost*(im.inv_qty*bm.qty) END AS ls_amount,bm.projectid,bm.inventoryid,bm.materialid,bm.raw_cost,bm.qty AS bm_qty,bm.supplierid,m.raw_description,m.is_per_length,m.length_per_ea,m.uom,s.company_name,inv.photo,b.colour,b.finish FROM ver_chronoforms_data_contract_bom_meterial_vic AS bm JOIN ver_chronoforms_data_contract_bom_vic AS b ON b.contract_item_cf_id=bm.contract_item_cf_id JOIN ver_chronoforms_data_inventory_vic AS inv ON inv.inventoryid=bm.inventoryid JOIN ver_chronoforms_data_inventory_material_vic AS im ON im.inventoryid=bm.inventoryid AND im.materialid=bm.materialid JOIN ver_chronoforms_data_materials_vic AS m ON m.cf_id=im.materialid JOIN ver_chronoforms_data_supplier_vic AS s ON s.supplierid=bm.supplierid WHERE bm.projectid='{$projectid}' AND b.projectid='{$projectid}' ".($is_reorder==1?" AND inv.inventoryid='{$inventoryid}' ":" AND bm.section='{$section}' ")." AND bm.supplierid='{$supplierid}' AND m.is_main_item=1 { $ order_by}  "; // ORDER BY is_per_length DESC, bm.id, b.length DESC, b.qty DESC

// $sql = "SELECT m.qty,(bm.qty) AS 1 _qty,(im.inv_qty*bm.qty) AS m_qty,bm.length,(bm.qty*im.inv_qty) AS ls_qty,SUM(b.qty*im.inv_qty) AS ts_qty,CASE WHEN m.is_per_length=1 THEN CASE WHEN m.uom='Ea' THEN SUM(im.inv_qty*bm.qty) ELSE SUM(floor(((bm.length_feet*12)+bm.length_inch)/m.length_per_ea_us)) END ELSE SUM(im.inv_qty*bm.qty) END AS ls_qty,CASE WHEN m.is_per_length=1 THEN CASE WHEN m.uom='Ea' THEN SUM(m.raw_cost*im.inv_qty*b.qty) ELSE SUM((m.raw_cost*im.inv_qty*(floor(((b.length_feet*12)+b.length_inch)/m.length_per_ea_us)+COALESCE ((((RIGHT (SUBSTRING_INDEX(bm.length_fraction,'/',1),1)+0)/(LEFT (SUBSTRING_INDEX(bm.length_fraction,'/',-1),1)+0))),0))*b.qty)) END ELSE SUM(m.raw_cost*im.inv_qty*b.qty) END AS ls_amount,CASE WHEN m.is_per_length=1 THEN CASE WHEN m.uom='Ea' THEN (m.raw_cost*im.inv_qty*bm.qty) ELSE ((m.raw_cost*im.inv_qty*floor((((bm.length_feet*12)+bm.length_inch)/m.length_per_ea_us)+COALESCE ((((RIGHT (SUBSTRING_INDEX(bm.length_fraction,'/',1),1)+0)/(LEFT (SUBSTRING_INDEX(bm.length_fraction,'/',-1),1)+0))),0))*bm.qty)) END ELSE (m.raw_cost*im.inv_qty*bm.qty) END AS 1 _amount,CASE WHEN m.is_per_length=1 THEN SUM((bm.length_feet*12)+bm.length_inch) END AS s_length,((bm.length_feet*12)+bm.length_inch) AS 1 _length,bm.raw_cost,bm.qty AS bm_qty,bm.length_fraction AS length_fraction,m.raw_description,m.uom,s.company_name,inv.photo,b.colour,b.finish FROM ver_chronoforms_data_contract_bom_meterial_vic AS bm JOIN ver_chronoforms_data_inventory_vic AS inv ON inv.inventoryid=bm.inventoryid JOIN ver_chronoforms_data_contract_bom_vic AS b ON b.contract_item_cf_id=bm.contract_item_cf_id JOIN ver_chronoforms_data_inventory_material_vic AS im ON im.inventoryid=b.inventoryid JOIN ver_chronoforms_data_materials_vic AS m ON m.cf_id=im.materialid JOIN ver_chronoforms_data_supplier_vic AS s ON s.supplierid=bm.supplierid WHERE bm.projectid='{$projectid}' AND b.projectid='{$projectid}' AND s.supplierid='{$supplierid}' ".($is_reorder==" 1 "?" AND b.inventoryid='{$inventoryid}' ":" AND inv.section='{$section}' ")." AND is_main_item=1 GROUP BY CASE WHEN inv.section='Guttering' OR inv.section='Flashings' THEN bm.id ELSE bm.materialid END,bm.length_fraction,b.length,b.colour ORDER BY m.cf_id ASC,m.is_per_length DESC,bm.length DESC,bm.qty DESC,FIELD(inv.category,'Post Fixings','Beam Fixings','Intermediates','Beams') DESC; "
$sql = "
SELECT
	bm.id,
	m.qty,
	(bm.qty) AS 1_qty,
	( im.inv_qty * bm.qty ) AS m_qty_,
	SUM(bm.qty) AS m_qty,
	bm.length,
	( bm.qty * im.inv_qty ) AS ls_qty__,
	SUM( b.qty * im.inv_qty ) AS ts_qty,	

	CASE
		
		WHEN m.is_per_length = 1 THEN
	CASE
		
		WHEN m.uom = 'Ea' THEN
		SUM(im.inv_qty * bm.qty) ELSE SUM( floor( ( ( bm.length_feet * 12 ) + bm.length_inch ) / m.length_per_ea_us ) ) 
		END ELSE SUM(im.inv_qty * bm.qty) 
		END AS ls_qty,
	CASE
			
			WHEN m.is_per_length = 1 THEN
		CASE
				
				WHEN m.uom = 'Ea' THEN
				SUM(m.raw_cost * im.inv_qty * bm.qty) ELSE SUM(
					(
						m.raw_cost * im.inv_qty * floor(
							( ( ( bm.length_feet * 12 ) + bm.length_inch ) / m.length_per_ea_us ) + COALESCE (
								(
									(
										( RIGHT ( SUBSTRING_INDEX( bm.length_fraction, '/', 1 ), 1 ) + 0 ) / ( LEFT ( SUBSTRING_INDEX( bm.length_fraction, '/',- 1 ), 1 ) + 0 ) 
									) 
								),
								0 
							) 
						) * bm.qty 
					) 
				) 
			END ELSE SUM(m.raw_cost * im.inv_qty * bm.qty)
		END AS ls_amount,
	CASE
			
			WHEN m.is_per_length = 1 THEN
		CASE
				
				WHEN m.uom = 'Ea' THEN
				( m.raw_cost * im.inv_qty * bm.qty ) ELSE (
					(
						m.raw_cost * im.inv_qty * floor(
							( ( ( bm.length_feet * 12 ) + bm.length_inch ) / m.length_per_ea_us ) + COALESCE (
								(
									(
										( RIGHT ( SUBSTRING_INDEX( bm.length_fraction, '/', 1 ), 1 ) + 0 ) / ( LEFT ( SUBSTRING_INDEX( bm.length_fraction, '/',- 1 ), 1 ) + 0 ) 
									) 
								),
								0 
							) 
						) * bm.qty 
					) 
				) 
			END ELSE ( m.raw_cost * im.inv_qty * bm.qty ) 
		END AS 1_amount,
	CASE
			
			WHEN m.is_per_length = 1 THEN
			SUM( ( bm.length_feet * 12 ) + bm.length_inch ) 
		END AS s_length,
CASE			
		WHEN m.uom = 'Inches' THEN
		( ( bm.length_feet * 12 ) + bm.length_inch ) END AS 1_length,

	bm.projectid,
	bm.inventoryid,
	bm.materialid,
	bm.raw_cost,
	bm.qty AS bm_qty,
	bm.supplierid,
	bm.length_fraction AS length_fraction,
	m.raw_description,
	m.is_per_length,
	m.length_per_ea,
	m.uom,
	s.company_name,
	inv.photo,
	b.colour,
	b.finish 
FROM
	ver_chronoforms_data_contract_bom_meterial_vic AS bm
	JOIN ver_chronoforms_data_inventory_vic AS inv ON inv.inventoryid = bm.inventoryid
	JOIN ver_chronoforms_data_contract_bom_vic AS b ON b.contract_item_cf_id = bm.contract_item_cf_id
	JOIN ver_chronoforms_data_inventory_material_vic AS im ON im.inventoryid = bm.inventoryid AND im.inventoryid = b.inventoryid
	AND im.materialid = bm.materialid
	JOIN ver_chronoforms_data_materials_vic AS m ON m.cf_id = im.materialid
	JOIN ver_chronoforms_data_supplier_vic AS s ON s.supplierid = bm.supplierid 
	
WHERE
	bm.projectid = '{$projectid}' 
	AND s.supplierid = '{$supplierid}' 	
	
	".($is_reorder==" 1 "?" AND b.inventoryid = '{$inventoryid}' ":" AND inv.section = '{$section}' ")." 
	AND is_main_item = 1 
	
GROUP BY
CASE
		
		WHEN inv.section = 'Guttering' 
		OR inv.section = 'Flashings' 
		THEN
			bm.id ELSE bm.materialid END,
CASE			
		WHEN m.uom = 'Inches' THEN
		( ( bm.length_feet * 12 ) + bm.length_inch ) END,
		bm.length_fraction,
		b.colour 
	ORDER BY
		m.cf_id ASC,
		m.is_per_length DESC,
		bm.length DESC,
	bm.qty DESC
	,FIELD( inv.category, 'Post Fixings', 'Beam Fixings', 'Intermediates', 'Beams' ) DESC ";

$sql2 = "
SELECT
	bm.id,
	m.qty,
	(bm.qty) AS 1_qty,
	( im.inv_qty * bm.qty ) AS m_qty_,
	SUM(bm.qty) AS m_qty,
	bm.length,
	( bm.qty * im.inv_qty ) AS ls_qty__,
	SUM( b.qty * im.inv_qty ) AS ts_qty,	

	CASE
		
		WHEN m.is_per_length = 1 THEN
	CASE
		
		WHEN m.uom = 'Ea' THEN
		SUM(im.inv_qty * bm.qty) ELSE SUM( floor( ( ( bm.length_feet * 12 ) + bm.length_inch ) / m.length_per_ea_us ) ) 
		END ELSE SUM(im.inv_qty * bm.qty) 
		END AS ls_qty,
	CASE
			
			WHEN m.is_per_length = 1 THEN
		CASE
				
				WHEN m.uom = 'Ea' THEN
				SUM( m.raw_cost * im.inv_qty * bm.qty ) ELSE SUM(
					(
					m.raw_cost * im.inv_qty * 
						(FLOOR(((bm.length_feet * 12 ) + bm.length_inch ) / m.length_per_ea_us ) + 
							(COALESCE (((LEFT (SUBSTRING_INDEX(bm.length_fraction,'/',-2),2)+0) / 
								(RIGHT (SUBSTRING_INDEX(bm.length_fraction,'/',2),2)+0)),0) 
							)
						) * b.qty 
					) 
				) 
			END ELSE SUM( m.raw_cost * im.inv_qty * b.qty ) 
		END AS ls_amount,
	CASE
			
			WHEN m.is_per_length = 1 THEN
		CASE
				
				WHEN m.uom = 'Ea' THEN
				( m.raw_cost * im.inv_qty * bm.qty ) ELSE (
					(
						m.raw_cost * im.inv_qty * floor(
							( ( ( bm.length_feet * 12 ) + bm.length_inch ) / m.length_per_ea_us ) + COALESCE (
								(
									(
										( RIGHT ( SUBSTRING_INDEX( bm.length_fraction, '/', 1 ), 1 ) + 0 ) / ( LEFT ( SUBSTRING_INDEX( bm.length_fraction, '/',- 1 ), 1 ) + 0 ) 
									) 
								),
								0 
							) 
						) * bm.qty 
					) 
				) 
			END ELSE ( m.raw_cost * im.inv_qty * bm.qty ) 
		END AS 1_amount,
	CASE
			
			WHEN m.is_per_length = 1 THEN
			SUM( ( bm.length_feet * 12 ) + bm.length_inch ) 
		END AS s_length,
	CASE			
			WHEN m.is_per_length = 1 THEN
		( ( bm.length_feet * 12 ) + bm.length_inch ) END AS 1_length,

	bm.length_fraction AS length_fraction,
	bm.projectid,
	bm.inventoryid,
	bm.materialid,
	bm.raw_cost,
	bm.qty AS bm_qty,
	bm.supplierid,
	m.raw_description,
	m.is_per_length,
	m.length_per_ea,
	m.uom,
	s.company_name,
	inv.photo,
	b.colour,
	b.finish 
FROM
-- OLD JOIN
	-- Begin
		-- ver_chronoforms_data_contract_bom_meterial_vic AS bm
		-- 	JOIN ver_chronoforms_data_inventory_vic AS inv ON inv.inventoryid = bm.inventoryid
		-- 	JOIN ver_chronoforms_data_contract_bom_vic AS b ON b.contract_item_cf_id = bm.contract_item_cf_id
		-- 	-- JOIN ver_chronoforms_data_contract_bom_vic AS b ON b.inventoryid = bm.inventoryid
		-- 	JOIN ver_chronoforms_data_inventory_material_vic AS im ON im.inventoryid = b.inventoryid
		-- 	-- im.inventoryid = bm.inventoryid AND im.inventoryid = b.inventoryid AND im.materialid = bm.materialid
		-- 	JOIN ver_chronoforms_data_materials_vic AS m ON m.cf_id = im.materialid
		-- 	JOIN ver_chronoforms_data_supplier_vic AS s ON s.supplierid = bm.supplierid 
	-- End
	
	-- 	ver_chronoforms_data_contract_bom_meterial_vic AS bm
-- 	JOIN ver_chronoforms_data_contract_bom_vic AS b ON b.contract_item_cf_id = bm.contract_item_cf_id
-- 	JOIN ver_chronoforms_data_inventory_vic AS inv ON inv.section = bm.section	
-- 	JOIN ver_chronoforms_data_inventory_material_vic AS im ON im.inventoryid = inv.inventoryid 	
-- 		AND im.materialid = bm.materialid
-- 	JOIN ver_chronoforms_data_materials_vic AS m ON m.cf_id = im.materialid
-- 	JOIN ver_chronoforms_data_supplier_vic AS s ON s.supplierid = bm.supplierid 

ver_chronoforms_data_contract_bom_meterial_vic AS bm
	JOIN ver_chronoforms_data_inventory_vic AS inv ON inv.inventoryid = bm.inventoryid
	JOIN ver_chronoforms_data_contract_bom_vic AS b ON b.contract_item_cf_id = bm.contract_item_cf_id
	JOIN ver_chronoforms_data_inventory_material_vic AS im ON im.inventoryid = bm.inventoryid AND im.inventoryid = b.inventoryid
	AND im.materialid = bm.materialid
	JOIN ver_chronoforms_data_materials_vic AS m ON m.cf_id = im.materialid
	JOIN ver_chronoforms_data_supplier_vic AS s ON s.supplierid = bm.supplierid 
	
WHERE
	bm.projectid = '{$projectid}' 
	AND b.projectid = '{$projectid}' 
	AND s.supplierid = '{$supplierid}' 	
	
	".($is_reorder==" 1 "?" AND b.inventoryid = '{$inventoryid}' ":" AND inv.section = '{$section}' ")." 
	AND is_main_item = 0 
	
GROUP BY
CASE
		
		WHEN inv.section = 'Guttering' 
		OR inv.section = 'Flashings' THEN
			bm.id ELSE bm.materialid END,
CASE			
		WHEN m.uom = 'Inches' THEN
		( ( bm.length_feet * 12 ) + bm.length_inch ) END,
		b.colour 
	ORDER BY
		m.cf_id ASC,
		m.is_per_length DESC,
		bm.length DESC,
	bm.qty DESC
	,FIELD( inv.category, 'Post Fixings', 'Beam Fixings', 'Intermediates', 'Beams' ) DESC ";

//ORDER BY is_per_length DESC

 				$totalRrp = 0; 
 				
				//error_log("sql : ". $sql, 3,'C:\\xampp\htdocs\\vergola_contract_system_v4_sa\\my-error.log'); 
				//error_log("sql 2: ". $sql2, 3,'C:\\xampp\htdocs\\vergola_contract_system_v4_sa\\my-error.log');
				
				// echo $sql;
				$item_result = mysql_query ($sql);
				//$num_result = mysql_num_rows($item_result);
				$i = 1; $num_same_inv_id = 0;
				$prev_inv_id = "";
				$m_qty = 0; $m_amount = 0; $is_1st=1; $is_2nd = 0;  
				$m_qty_IRV59 = 0; $m_amount_IRV59 = 0; $m_qty_IRV60 = 0; $m_amount_IRV60 = 0; // Just only for link bar and pivot strip
				//Get the ungrouped amount,qty and length if section is Guttering or Flashings
				if ($section == "Guttering" || $section == "Flashings"){ 
						// $m['ts_qty'] = $m['1_qty']; 
						$m['ts_qty'] = $m['m_qty']; 
						$m['s_length'] = $m['1_length']; 
						$m['ls_amount'] = $m['1_amount'];
					}	

				while ($m = mysql_fetch_assoc($item_result)){ //this is just to get get the sum of the link bar and pivot strip.
					if(fnmatch("*Double Bay VR*",$contract['framework']) && $section=="Vergola" && $m["inventoryid"]=="IRV59" ){ //IRV59 is a Pivot strip
						  
						$m_qty_IRV59 += $m['m_qty'];
						$m_amount_IRV59 += $m['ls_amount'];
 
					}else if(fnmatch("*Double Bay VR*",$contract['framework'])  && $section=="Vergola" && $m["inventoryid"]=="IRV60" ){ //IRV60 is a Link Bar
 
						$m_qty_IRV60 += $m['m_qty'];
						$m_amount_IRV60 += $m['ls_amount']; 
 
					}
				}	

				mysql_data_seek($item_result, 0); 
				$IRV59_1st=1; $IRV60_1st=1; 
				while ($m = mysql_fetch_assoc($item_result)){
					$m_qty = 0; $m_amount = 0; $is_group = 1;
					if($m['id']==""){continue;} 
					$totalRrp += $m['ls_amount']; 
					
					

					if(fnmatch("*Double Bay VR*",$contract['framework']) && $section=="Vergola" && $m["inventoryid"]=="IRV59" ){ //IRV59 is a Pivot strip
						  
						$m_qty = $m_qty_IRV59;
						$m_amount = $m_amount_IRV59;
 
						if($IRV59_1st==1){
							$IRV59_1st = 0;
						}else{
							continue;
						}
					}else if(fnmatch("*Double Bay VR*",$contract['framework'])  && $section=="Vergola" && $m["inventoryid"]=="IRV60" ){ //IRV60 is a Link Bar
 
						$m_qty = $m_qty_IRV60;
						$m_amount = $m_amount_IRV60;
 
						if($IRV60_1st==1){ 
							$IRV60_1st = 0;
						}else{
							continue;
						} 

						//error_log("INV: ".$m["inventoryid"]." m_qty:".$m_qty." m_amount:".$m_amount, 3,'C:\\xampp\htdocs\\vergola_contract_system_v4_sa\\my-error.log');
 
					}
					
					//error_log("HERE 2: ", 3,'C:\\xampp\htdocs\\vergola_contract_system_v4_sa\\my-error.log');
					 // only 2nd of IRV59 and IRV60 will be displayed. 
					//error_log("Double Bay VR:".$contract['framework']." section:".$section." inventoryid:".$m["inventoryid"], 3,'C:\\xampp\htdocs\\vergola_contract_system_v4_sa\\my-error.log');
					

 
				?>  
					<tr> 
						<td colspan="2"><?php echo $m['raw_description']; ?></td>  
						
						<!-- <td style="text-align:right;"><?php echo number_format(($m_qty>0?$m_qty:$m['ts_qty'])); ?></td>  -->
						<td style="text-align:right;"><?php echo number_format(($m_qty>0?$m_qty:$m['m_qty'])); ?></td> 
						
						<!-- <td style="text-align:right;"><?php echo number_format(($m_qty>0?$m_qty:$m['m_qty'])); ?></td>  -->
						<!-- <td style="text-align:right;"><?php echo ($section = "Guttering"? number_format($m['m_qty']):($section = "Flashings"?number_format($m['m_qty']):number_format($m['ts_qty']))); ?></td> -->
						<!-- <td style="text-align:right;"><?php echo ($is_group== 1?number_format($m['m_qty']):number_format($m['ts_qty'])); ?></td> -->
						<!-- <td style="text-align:right;"><?php echo number_format(($m_qty>0?$m_qty:($is_group==1?$m['ts_qty']:$m['ls_qty']))); ?></td>  -->

						<td style="text-align:right;"><?php echo ($m['uom']=="Inches" && METRIC_SYSTEM == "inch"?get_feet_value($m['1_length']):($m['uom']=="Inches"?$m['1_length']:"")); ?></td>
						<td style="text-align:right;"><?php echo $config_vr_fractions_output_format[$m['length_fraction']]; ?></td> 
						<td style="text-align:right;"><?php echo $m['uom']; ?></td> 
						<!-- <td><?php echo $m['colour']; ?></td> -->
						<td><?php echo ($m['colour'] == null?"":$m['colour']); ?></td>
						<td><?php echo ($m['finish'] == "null"?" ":$m['finish']); ?></td>
						<td style="text-align:right;">$<?php echo number_format($m['raw_cost'],2); ?></td>
						<td style="text-align:right;">$<?php echo number_format(($m_amount>0?$m_amount:$m['ls_amount']),2); ?></td>
					</tr>  

				<?php
				$m_qty = 0; $m_amount = 0; $is_2nd = 0; 

				if($m["photo"] !=""  ){ //$section=="Guttering"

				?>
					<tr>
					
			  			<td colspan="8" rowspan="10" style="border:1">
			  				<?php
				  			if($m["photo"] !="") { 
				  				echo " <img src='".JURI::base()."images/inventory/".$m['photo']."' class='' style='float:left;padding:0px 0px 0px 0; width: 345px;'/>";
							} 
							?>

			  			</td>
					</tr>

			  			<!-- <td colspan="2" style="column-width: 15%;"> -->
			  				<!-- <tr>
			  					<th colspan="3" align="left"  >Girth A&nbsp;&nbsp;</th>
				  				<th colspan="3" align="right"  >Girth B&nbsp;&nbsp;</th>
				  			</tr>
							  <tr>
			  					<th colspan="3" align="left"  >Girth A&nbsp;&nbsp;</th>
				  				<th colspan="3" align="right"  >Girth B&nbsp;&nbsp;</th>
				  			</tr> -->
				  			<!-- <tr>
				  				<td colspan="1" valign="top" align="right" style="border:none;"><?php echo $item_dimension["girth_a"]; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
							<td colspan="1" valign="top" align="right" style="border:none;"><?php echo $item_dimension["girth_b"]; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
				  			</tr> -->
			  			<!-- </td> -->
			  		<!-- </tr> -->

				<?php 
					//mysql_data_seek($item_result, 0); 
						
						if($prev_inv_id==""){
							$prev_inv_id = $m['inventoryid'];

						}else if($prev_inv_id == $m['inventoryid']){
							 
							$num_same_inv_id++;

						}else{
							$num_same_inv_id = 0;
						}

						$sql_1 = "SELECT id.length AS l, id.dimension_a, id.dimension_b, id.dimension_c, id.dimension_d, id.dimension_e, id.dimension_f, id.dimension_p,girth_side_a AS girth_a, girth_side_b AS girth_b FROM ver_chronoforms_data_contract_items_deminsions  AS id   WHERE projectid = '{$projectid}' AND inventoryid='{$m['inventoryid']}' LIMIT 1  OFFSET {$num_same_inv_id} ";

						/*
						//Modified query string to dicrectly get the dimension values from the defaults table
						$sql = "SELECT ((id.length_feet * 12 ) + id.length_inch) AS l, 
						        CONCAT( id.dimension_a_inch, '<br />', id.dimension_a_fraction ) AS dimension_a,
								CONCAT( id.dimension_b_inch, '<br />', id.dimension_b_fraction ) AS dimension_b,
								CONCAT( id.dimension_c_inch, '<br />', id.dimension_c_fraction ) AS dimension_c,
								CONCAT( id.dimension_d_inch, '<br />', id.dimension_d_fraction ) AS dimension_d,
								CONCAT( id.dimension_e_inch, '<br />', id.dimension_e_fraction ) AS dimension_e,
								CONCAT( id.dimension_f_inch, '<br />', id.dimension_f_fraction ) AS dimension_f,
								CONCAT( id.dimension_p_inch, '<br />', id.dimension_p_fraction ) AS dimension_p  
								FROM 
								-- ver_chronoforms_data_contract_items_default_deminsions  AS id  
								-- JOIN ver_chronoforms_data_contract_bom_vic AS b ON b.inventoryid = id.inventoryid
								ver_chronoforms_data_contract_bom_meterial_vic AS bm
								JOIN ver_chronoforms_data_contract_items_default_deminsions AS id ON id.inventoryid = bm.inventoryid
								WHERE bm.projectid = '{$projectid}' AND id.inventoryid='{$m['inventoryid']}' LIMIT 1 ";
						*/
						//re-modified query string to get all info for later output processing, instead of process output through sql query
						$sql = "SELECT ((id.length_feet * 12 ) + id.length_inch) AS l, 
						        CONCAT( id.dimension_a_inch, '<br />', id.dimension_a_fraction ) AS dimension_a,
								CONCAT( id.dimension_b_inch, '<br />', id.dimension_b_fraction ) AS dimension_b,
								CONCAT( id.dimension_c_inch, '<br />', id.dimension_c_fraction ) AS dimension_c,
								CONCAT( id.dimension_d_inch, '<br />', id.dimension_d_fraction ) AS dimension_d,
								CONCAT( id.dimension_e_inch, '<br />', id.dimension_e_fraction ) AS dimension_e,
								CONCAT( id.dimension_f_inch, '<br />', id.dimension_f_fraction ) AS dimension_f,
								CONCAT( id.dimension_p_inch, '<br />', id.dimension_p_fraction ) AS dimension_p, 
								(id.dimension_a_inch + id.dimension_c_inch + id.dimension_e_inch + id.dimension_f_inch + id.dimension_p_inch) AS girth_side_a_inch,		
								CASE									
									WHEN 
										(((FLOOR (1) * (COALESCE (((LEFT (SUBSTRING_INDEX(id.dimension_a_fraction,'/',-2),2)+0) / (RIGHT (SUBSTRING_INDEX(id.dimension_a_fraction,'/',2),2)+0)),0) )) +
										(FLOOR (1) * (COALESCE (((LEFT (SUBSTRING_INDEX(id.dimension_c_fraction,'/',-2),2)+0) / (RIGHT (SUBSTRING_INDEX(id.dimension_c_fraction,'/',2),2)+0)),0) )) +
										(FLOOR (1) * (COALESCE (((LEFT (SUBSTRING_INDEX(id.dimension_e_fraction,'/',-2),2)+0) / (RIGHT (SUBSTRING_INDEX(id.dimension_e_fraction,'/',2),2)+0)),0) )) +
										(FLOOR (1) * (COALESCE (((LEFT (SUBSTRING_INDEX(id.dimension_f_fraction,'/',-2),2)+0) / (RIGHT (SUBSTRING_INDEX(id.dimension_f_fraction,'/',2),2)+0)),0) )) +
										(FLOOR (1) * (COALESCE (((LEFT (SUBSTRING_INDEX(id.dimension_p_fraction,'/',-2),2)+0) / (RIGHT (SUBSTRING_INDEX(id.dimension_p_fraction,'/',2),2)+0)),0) ))) 
										 >= 1)
								THEN
								CONCAT(
									(FLOOR (32) * (
										(FLOOR (1) * (COALESCE (((LEFT (SUBSTRING_INDEX(id.dimension_a_fraction,'/',-2),2)+0) / (RIGHT (SUBSTRING_INDEX(id.dimension_a_fraction,'/',2),2)+0)),0) )) +
										(FLOOR (1) * (COALESCE (((LEFT (SUBSTRING_INDEX(id.dimension_c_fraction,'/',-2),2)+0) / (RIGHT (SUBSTRING_INDEX(id.dimension_c_fraction,'/',2),2)+0)),0) )) +
										(FLOOR (1) * (COALESCE (((LEFT (SUBSTRING_INDEX(id.dimension_e_fraction,'/',-2),2)+0) / (RIGHT (SUBSTRING_INDEX(id.dimension_e_fraction,'/',2),2)+0)),0) )) +
										(FLOOR (1) * (COALESCE (((LEFT (SUBSTRING_INDEX(id.dimension_f_fraction,'/',-2),2)+0) / (RIGHT (SUBSTRING_INDEX(id.dimension_f_fraction,'/',2),2)+0)),0) )) +
										(FLOOR (1) * (COALESCE (((LEFT (SUBSTRING_INDEX(id.dimension_p_fraction,'/',-2),2)+0) / (RIGHT (SUBSTRING_INDEX(id.dimension_p_fraction,'/',2),2)+0)),0) ))
										) - 32),'/',32
									) 
								ELSE 
								CONCAT(
									(FLOOR (32) * (
										(FLOOR (1) * (COALESCE (((LEFT (SUBSTRING_INDEX(id.dimension_a_fraction,'/',-2),2)+0) / (RIGHT (SUBSTRING_INDEX(id.dimension_a_fraction,'/',2),2)+0)),0) )) +
										(FLOOR (1) * (COALESCE (((LEFT (SUBSTRING_INDEX(id.dimension_c_fraction,'/',-2),2)+0) / (RIGHT (SUBSTRING_INDEX(id.dimension_c_fraction,'/',2),2)+0)),0) )) +
										(FLOOR (1) * (COALESCE (((LEFT (SUBSTRING_INDEX(id.dimension_e_fraction,'/',-2),2)+0) / (RIGHT (SUBSTRING_INDEX(id.dimension_e_fraction,'/',2),2)+0)),0) )) +
										(FLOOR (1) * (COALESCE (((LEFT (SUBSTRING_INDEX(id.dimension_f_fraction,'/',-2),2)+0) / (RIGHT (SUBSTRING_INDEX(id.dimension_f_fraction,'/',2),2)+0)),0) )) +
										(FLOOR (1) * (COALESCE (((LEFT (SUBSTRING_INDEX(id.dimension_p_fraction,'/',-2),2)+0) / (RIGHT (SUBSTRING_INDEX(id.dimension_p_fraction,'/',2),2)+0)),0) ))
										)),'/',32
									) 
								END AS girth_side_a_fraction,
								(FLOOR (1) * (COALESCE (((LEFT (SUBSTRING_INDEX(id.dimension_a_fraction,'/',-2),2)+0) / (RIGHT (SUBSTRING_INDEX(id.dimension_a_fraction,'/',2),2)+0)),0) )) +
								(FLOOR (1) * (COALESCE (((LEFT (SUBSTRING_INDEX(id.dimension_c_fraction,'/',-2),2)+0) / (RIGHT (SUBSTRING_INDEX(id.dimension_c_fraction,'/',2),2)+0)),0) )) +
								(FLOOR (1) * (COALESCE (((LEFT (SUBSTRING_INDEX(id.dimension_e_fraction,'/',-2),2)+0) / (RIGHT (SUBSTRING_INDEX(id.dimension_e_fraction,'/',2),2)+0)),0) )) +
								(FLOOR (1) * (COALESCE (((LEFT (SUBSTRING_INDEX(id.dimension_f_fraction,'/',-2),2)+0) / (RIGHT (SUBSTRING_INDEX(id.dimension_f_fraction,'/',2),2)+0)),0) )) +
								(FLOOR (1) * (COALESCE (((LEFT (SUBSTRING_INDEX(id.dimension_p_fraction,'/',-2),2)+0) / (RIGHT (SUBSTRING_INDEX(id.dimension_p_fraction,'/',2),2)+0)),0) )) AS girth_side_a_fraction_total,
								SUBSTRING_INDEX(
								(FLOOR (1) * (COALESCE (((LEFT (SUBSTRING_INDEX(id.dimension_a_fraction,'/',-2),2)+0) / (RIGHT (SUBSTRING_INDEX(id.dimension_a_fraction,'/',2),2)+0)),0) )) +
								(FLOOR (1) * (COALESCE (((LEFT (SUBSTRING_INDEX(id.dimension_c_fraction,'/',-2),2)+0) / (RIGHT (SUBSTRING_INDEX(id.dimension_c_fraction,'/',2),2)+0)),0) )) +
								(FLOOR (1) * (COALESCE (((LEFT (SUBSTRING_INDEX(id.dimension_e_fraction,'/',-2),2)+0) / (RIGHT (SUBSTRING_INDEX(id.dimension_e_fraction,'/',2),2)+0)),0) )) +
								(FLOOR (1) * (COALESCE (((LEFT (SUBSTRING_INDEX(id.dimension_f_fraction,'/',-2),2)+0) / (RIGHT (SUBSTRING_INDEX(id.dimension_f_fraction,'/',2),2)+0)),0) )) +
								(FLOOR (1) * (COALESCE (((LEFT (SUBSTRING_INDEX(id.dimension_p_fraction,'/',-2),2)+0) / (RIGHT (SUBSTRING_INDEX(id.dimension_p_fraction,'/',2),2)+0)),0) ))
								,'.',1)
								AS girth_side_a_fraction_total_whole,	
								(id.dimension_b_inch + id.dimension_d_inch + id.dimension_e_inch + id.dimension_f_inch + id.dimension_p_inch) AS girth_side_b_inch,								
								CASE									
									WHEN 
										(((FLOOR (1) * (COALESCE (((LEFT (SUBSTRING_INDEX(id.dimension_b_fraction,'/',-2),2)+0) / (RIGHT (SUBSTRING_INDEX(id.dimension_b_fraction,'/',2),2)+0)),0) )) +
										(FLOOR (1) * (COALESCE (((LEFT (SUBSTRING_INDEX(id.dimension_d_fraction,'/',-2),2)+0) / (RIGHT (SUBSTRING_INDEX(id.dimension_d_fraction,'/',2),2)+0)),0) )) +
										(FLOOR (1) * (COALESCE (((LEFT (SUBSTRING_INDEX(id.dimension_e_fraction,'/',-2),2)+0) / (RIGHT (SUBSTRING_INDEX(id.dimension_e_fraction,'/',2),2)+0)),0) )) +
										(FLOOR (1) * (COALESCE (((LEFT (SUBSTRING_INDEX(id.dimension_f_fraction,'/',-2),2)+0) / (RIGHT (SUBSTRING_INDEX(id.dimension_f_fraction,'/',2),2)+0)),0) )) +
										(FLOOR (1) * (COALESCE (((LEFT (SUBSTRING_INDEX(id.dimension_p_fraction,'/',-2),2)+0) / (RIGHT (SUBSTRING_INDEX(id.dimension_p_fraction,'/',2),2)+0)),0) ))) 
										 >= 1)
								THEN
								CONCAT(
									(FLOOR (32) * (
										(FLOOR (1) * (COALESCE (((LEFT (SUBSTRING_INDEX(id.dimension_b_fraction,'/',-2),2)+0) / (RIGHT (SUBSTRING_INDEX(id.dimension_b_fraction,'/',2),2)+0)),0) )) +
										(FLOOR (1) * (COALESCE (((LEFT (SUBSTRING_INDEX(id.dimension_d_fraction,'/',-2),2)+0) / (RIGHT (SUBSTRING_INDEX(id.dimension_d_fraction,'/',2),2)+0)),0) )) +
										(FLOOR (1) * (COALESCE (((LEFT (SUBSTRING_INDEX(id.dimension_e_fraction,'/',-2),2)+0) / (RIGHT (SUBSTRING_INDEX(id.dimension_e_fraction,'/',2),2)+0)),0) )) +
										(FLOOR (1) * (COALESCE (((LEFT (SUBSTRING_INDEX(id.dimension_f_fraction,'/',-2),2)+0) / (RIGHT (SUBSTRING_INDEX(id.dimension_f_fraction,'/',2),2)+0)),0) )) +
										(FLOOR (1) * (COALESCE (((LEFT (SUBSTRING_INDEX(id.dimension_p_fraction,'/',-2),2)+0) / (RIGHT (SUBSTRING_INDEX(id.dimension_p_fraction,'/',2),2)+0)),0) ))
										) - 32),'/',32
									) 
								ELSE 
								CONCAT(
									(FLOOR (32) * (
										(FLOOR (1) * (COALESCE (((LEFT (SUBSTRING_INDEX(id.dimension_b_fraction,'/',-2),2)+0) / (RIGHT (SUBSTRING_INDEX(id.dimension_b_fraction,'/',2),2)+0)),0) )) +
										(FLOOR (1) * (COALESCE (((LEFT (SUBSTRING_INDEX(id.dimension_d_fraction,'/',-2),2)+0) / (RIGHT (SUBSTRING_INDEX(id.dimension_d_fraction,'/',2),2)+0)),0) )) +
										(FLOOR (1) * (COALESCE (((LEFT (SUBSTRING_INDEX(id.dimension_e_fraction,'/',-2),2)+0) / (RIGHT (SUBSTRING_INDEX(id.dimension_e_fraction,'/',2),2)+0)),0) )) +
										(FLOOR (1) * (COALESCE (((LEFT (SUBSTRING_INDEX(id.dimension_f_fraction,'/',-2),2)+0) / (RIGHT (SUBSTRING_INDEX(id.dimension_f_fraction,'/',2),2)+0)),0) )) +
										(FLOOR (1) * (COALESCE (((LEFT (SUBSTRING_INDEX(id.dimension_p_fraction,'/',-2),2)+0) / (RIGHT (SUBSTRING_INDEX(id.dimension_p_fraction,'/',2),2)+0)),0) ))
										)),'/',32
									) 
								END AS girth_side_b_fraction,
								(FLOOR (1) * (COALESCE (((LEFT (SUBSTRING_INDEX(id.dimension_b_fraction,'/',-2),2)+0) / (RIGHT (SUBSTRING_INDEX(id.dimension_b_fraction,'/',2),2)+0)),0) )) +
								(FLOOR (1) * (COALESCE (((LEFT (SUBSTRING_INDEX(id.dimension_d_fraction,'/',-2),2)+0) / (RIGHT (SUBSTRING_INDEX(id.dimension_d_fraction,'/',2),2)+0)),0) )) +
								(FLOOR (1) * (COALESCE (((LEFT (SUBSTRING_INDEX(id.dimension_e_fraction,'/',-2),2)+0) / (RIGHT (SUBSTRING_INDEX(id.dimension_e_fraction,'/',2),2)+0)),0) )) +
								(FLOOR (1) * (COALESCE (((LEFT (SUBSTRING_INDEX(id.dimension_f_fraction,'/',-2),2)+0) / (RIGHT (SUBSTRING_INDEX(id.dimension_f_fraction,'/',2),2)+0)),0) )) +
								(FLOOR (1) * (COALESCE (((LEFT (SUBSTRING_INDEX(id.dimension_p_fraction,'/',-2),2)+0) / (RIGHT (SUBSTRING_INDEX(id.dimension_p_fraction,'/',2),2)+0)),0) )) AS girth_side_b_fraction_total,
								SUBSTRING_INDEX(
								(FLOOR (1) * (COALESCE (((LEFT (SUBSTRING_INDEX(id.dimension_b_fraction,'/',-2),2)+0) / (RIGHT (SUBSTRING_INDEX(id.dimension_b_fraction,'/',2),2)+0)),0) )) +
								(FLOOR (1) * (COALESCE (((LEFT (SUBSTRING_INDEX(id.dimension_d_fraction,'/',-2),2)+0) / (RIGHT (SUBSTRING_INDEX(id.dimension_d_fraction,'/',2),2)+0)),0) )) +
								(FLOOR (1) * (COALESCE (((LEFT (SUBSTRING_INDEX(id.dimension_e_fraction,'/',-2),2)+0) / (RIGHT (SUBSTRING_INDEX(id.dimension_e_fraction,'/',2),2)+0)),0) )) +
								(FLOOR (1) * (COALESCE (((LEFT (SUBSTRING_INDEX(id.dimension_f_fraction,'/',-2),2)+0) / (RIGHT (SUBSTRING_INDEX(id.dimension_f_fraction,'/',2),2)+0)),0) )) +
								(FLOOR (1) * (COALESCE (((LEFT (SUBSTRING_INDEX(id.dimension_p_fraction,'/',-2),2)+0) / (RIGHT (SUBSTRING_INDEX(id.dimension_p_fraction,'/',2),2)+0)),0) ))
								,'.',1)
								AS girth_side_b_fraction_total_whole,
								id.dimension_a_inch, id.dimension_a_fraction,
								id.dimension_b_inch, id.dimension_b_fraction,
								id.dimension_c_inch, id.dimension_c_fraction,
								id.dimension_d_inch, id.dimension_d_fraction,
								id.dimension_e_inch, id.dimension_e_fraction,
								id.dimension_f_inch, id.dimension_f_fraction,
								id.dimension_p_inch, id.dimension_p_fraction 
								FROM 
								ver_chronoforms_data_contract_bom_meterial_vic AS bm
								JOIN ver_chronoforms_data_contract_items_default_deminsions AS id ON id.inventoryid = bm.inventoryid
								WHERE bm.projectid = '{$projectid}' AND id.inventoryid='{$m['inventoryid']}' LIMIT 1 ";
						//error_log("sql G: ". $sql, 3,'C:\\xampp\htdocs\\vergola_contract_system_v4_sa\\my-error.log');
						 // echo $sql;
						$r_item_dimension = mysql_query ($sql);
						$item_dimension = mysql_fetch_assoc($r_item_dimension);	


						if($item_dimension["girth_side_a_fraction_total"] >= 1){
							$item_dimension["girth_side_a_inch"] += $item_dimension["girth_side_a_fraction_total_whole"];
							// $item_dimension["girth_side_a_fraction_numerator"] -= 32;
						}

						if($item_dimension["girth_side_b_fraction_total"] >= 1){
							$item_dimension["girth_side_b_inch"] = $item_dimension["girth_side_b_inch"] + $item_dimension["girth_side_b_fraction_total_whole"];
							// $item_dimension["girth_side_b_fraction_numerator"] -= 32;
						}

						if(!empty($item_dimension)){

							$girth_side_a_output = $item_dimension["girth_side_a_inch"] . '<br />' . $config_vr_fractions_output_format[$item_dimension["girth_side_a_fraction"]];
							$girth_side_b_output = $item_dimension["girth_side_b_inch"] . '<br />' . $config_vr_fractions_output_format[$item_dimension["girth_side_b_fraction"]];
							$dimension_a_output = $item_dimension["dimension_a_inch"] . '<br />' . $config_vr_fractions_output_format[$item_dimension["dimension_a_fraction"]];
							$dimension_b_output = $item_dimension["dimension_b_inch"] . '<br />' . $config_vr_fractions_output_format[$item_dimension["dimension_b_fraction"]];
							$dimension_c_output = $item_dimension["dimension_c_inch"] . '<br />' . $config_vr_fractions_output_format[$item_dimension["dimension_c_fraction"]];
							$dimension_d_output = $item_dimension["dimension_d_inch"] . '<br />' . $config_vr_fractions_output_format[$item_dimension["dimension_d_fraction"]];
							$dimension_e_output = $item_dimension["dimension_e_inch"] . '<br />' . $config_vr_fractions_output_format[$item_dimension["dimension_e_fraction"]];
							$dimension_f_output = $item_dimension["dimension_f_inch"] . '<br />' . $config_vr_fractions_output_format[$item_dimension["dimension_f_fraction"]];
							$dimension_p_output = $item_dimension["dimension_p_inch"] . '<br />' . $config_vr_fractions_output_format[$item_dimension["dimension_p_fraction"]];
					?>					   
					<!-- <th rowspan="0">Favorite -->
					<!-- <tr> -->
						<!-- <th style="border:none;"> -->
			  				<!-- <tr colspan="3" style="column-width: 50%;"> -->
							
							<tr>
								<!-- <tr>
								<td colspan="4" rowspan="2" style="border:1;">123								
								</td>
								</tr> -->
								<th colspan="1" valign="middle" align="right"  style="border:1; background-color:#cccccc;">Girth A&nbsp;&nbsp;</th>
								<th colspan="1" valign="middle" align="center" style="border:1; background-color:#cccccc;"><?php echo $girth_side_a_output; ?> </th>
							</tr>
							<tr>
							  	<th colspan="1" valign="" align="right"  style="border:1; background-color:#cccccc;">Girth B&nbsp;&nbsp;</th>
								<th colspan="1" valign="" align="center" style="border:1; background-color:#cccccc;"><?php echo $girth_side_a_output; ?> </th>
							</tr>							
							<tr>
							  	<th colspan="1" valign="" align="right"  style="border:1;; background-color:#cccccc;">A&nbsp;&nbsp;</th>
								<th colspan="1" valign="" align="center" style="border:1; background-color:#cccccc;"><?php echo $girth_side_a_output; ?> </th>
							</tr>
							<tr>
							  	<th colspan="1" valign="" align="right"  style="border:1; background-color:#cccccc;">B&nbsp;&nbsp;</th>
								<th colspan="1" valign="" align="center" style="border:1; background-color:#cccccc;"><?php echo $girth_side_a_output; ?> </th>
							</tr>
							<tr>
							  	<th colspan="1" valign="" align="right"  style="border:1; background-color:#cccccc;">C&nbsp;&nbsp;</th>
								<th colspan="1" valign="" align="center" style="border:1; background-color:#cccccc;"><?php echo $girth_side_a_output; ?> </th>
							</tr>
							<tr>
							  	<th colspan="1" valign="" align="right"  style="border:1; background-color:#cccccc;">D&nbsp;&nbsp;</th>
								<th colspan="1" valign="" align="center" style="border:1; background-color:#cccccc;"><?php echo $girth_side_a_output; ?> </th>
							</tr>
							<tr>
							  	<th colspan="1" valign="" align="right"  style="border:1; background-color:#cccccc;">E&nbsp;&nbsp;</th>
								<th colspan="1" valign="" align="center" style="border:1; background-color:#cccccc;"><?php echo $girth_side_a_output; ?> </th>
							</tr>
							<tr>
							  	<th colspan="1" valign="" align="right"  style="border:1; background-color:#cccccc;">F&nbsp;&nbsp;</th>
								<th colspan="1" valign="" align="center" style="border:1; background-color:#cccccc;"><?php echo $girth_side_a_output; ?> </th>
							</tr>
							<tr>
							  	<th colspan="1" valign="" align="right"  style="border:1; background-color:#cccccc;">P&nbsp;&nbsp;</th>
								<th colspan="1" valign="" align="center" style="border:1; background-color:#cccccc;"><?php echo $girth_side_a_output; ?> </th>
							</tr>
					<!-- </th> -->
							<!-- <td colspan="2" style="column-width: 15%;"> -->
								<!-- <tr colspan="2" style="column-width: 25%;">
									<th colspan="1" align="left"  style="border:none;">Girth C&nbsp;&nbsp;</th>
									<th colspan="1" align="right" style="border:none;"><?php echo $girth_side_a_output; ?> </th> -->
									<!-- <th colspan="1" align="right"  style="border:none;">Girth B&nbsp;&nbsp;</th> -->
							<!-- </td> -->
						<!-- </th> -->
						<!-- </tr> -->
						
				  			<!-- </tr> -->
				  			<!-- <tr>
				  				<td colspan="1" valign="top" align="right" style="border:none;"><?php echo $girth_side_a_output; ?> </td>
								<td colspan="1" valign="top" align="right" style="border:none;"><?php echo $girth_side_b_output; ?> </td>
								<td colspan="1" valign="top" align="left" style="border:none;"><?php echo $girth_side_a_output; ?></td>
								<td colspan="1" valign="top" align="left" style="border:none;"><?php echo $girth_side_b_output; ?>&nbsp;&nbsp;</td> 
				  			</tr> -->

			  			<!-- </td> -->

					<!-- </tr> -->

			  		</tr></tr></tr>
					  	   
				  		<!-- <tr style="visibility: hidden;">
				  			
				  			<th colspan="1" valign="top" align="left"  style="border:none;">Girth A</th>
				  			<th colspan="1" valign="top" align="left"  style="border:none;">Girth B&nbsp;&nbsp;</th>
				  			<th align="center"  style="border:none;">A</th>
				  			<th align="left"  style="border:none;">B</th>
				  			<th align="left"   style="border:none;">C</th>
				  			<th align="left"   style="border:none;">D</th>
				  			<th align="left"  style="border:none;">E</th>
				  			<th align="left" style="border:none;">F</th>
				  			<th align="left" style="border:none;">P</th>				  			 
				  		</tr> 
				  		<tr style="visibility: hidden;"> 							
							<td colspan="1" valign="top" align="left" style="border:none;"><?php echo $girth_side_a_output; ?></td>
							<td colspan="1" valign="top" align="left" style="border:none;"><?php echo $girth_side_b_output; ?>&nbsp;&nbsp;</td>
							<td valign="top" align="center" style="border:none;"><?php echo $dimension_a_output; ?></td>
							<td valign="top" align="left" style="border:none;"><?php echo $dimension_b_output; ?></td>
							<td valign="top" align="left" style="border:none;"><?php echo $dimension_c_output; ?></td>
				  			<td valign="top" align="left" style="border:none;"><?php echo $dimension_d_output; ?></td>
				  			<td valign="top" align="left" style="border:none;"><?php echo $dimension_e_output; ?></td>
				  			<td valign="top" align="left" style="border:none;"><?php echo $dimension_f_output; ?></td>
				  			<td valign="top" align="left" style="border:none;"><?php echo $dimension_p_output; ?></td> 	
				  		</tr> -->
					  		 
					   
			  	<?php 
			  		
			  	 	} //end if if it has a dimension
			   		
			   		$i++; 

			   		if($m["photo"] !="" ){

			   			// echo "<tr>
					  	// 		<td colspan=\"10\" style=\"border:none\">&nbsp;</td> 
					  	// 	</tr>";
						echo "<tr style=\"background-color: lightgrey\">
							  <td colspan=\"10\" style=\"border:1\">&nbsp;</td> 
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
						$totalRrp += $m['ls_amount']; 
						if($m['id']==""){continue;} 
					?>  
						<!-- <tr> 
							<td colspan="2"><?php echo $m['raw_description']; ?></td>  
							<td style="text-align:right;"><?php echo number_format($m['ls_qty']); ?></td>
							<td style="text-align:right;"><?php echo ($m['uom']=="Inches" && METRIC_SYSTEM == "inch"?get_feet_value($m['length']):($m['uom']=="Mtrs"?$m['length']:"")); ?></td>
							<td style="text-align:right;"><?php echo ($section = "Guttering"? number_format($m['m_qty']):($section = "Flashings"?number_format($m['ts_qty']):number_format($m['ls_qty']))); ?></td>
							<td style="text-align:right;"><?php echo ($section = "Guttering"? number_format($m['m_qty']):($section = "Flashings"?number_format($m['m_qty']):number_format($m['ts_qty']))); ?></td>
							<td style="text-align:right;"><?php echo number_format(($m_qty>0?$m_qty:$m['ts_qty'])); ?></td> 
							<td style="text-align:right;"><?php echo ($m['uom']=="Mtrs" && METRIC_SYSTEM == "inch"?get_feet_value($m['s_length']):($m['uom']=="Mtrs"?$m['s_length']:"")); ?></td>
							<td style="text-align:right;"><?php echo $m['uom']; ?></td> 
							<td> &nbsp; </td>
							<td> &nbsp; </td>
							<td style="text-align:right;">$<?php echo number_format($m['raw_cost'],2); ?></td>
							<td style="text-align:right;">$<?php echo number_format($m['ls_amount'],2); ?></td> 
						</tr> -->

<tr> 
	<td colspan="2"><?php echo $m['raw_description']; ?></td>  
	<!-- <td style="text-align:right;"><?php echo number_format($m['s_qty']); ?></td> -->
	<!-- <td style="text-align:right;"><?php echo ($section = "Guttering"? number_format($m['m_qty']):($section = "Flashings"?number_format($m['ts_qty']):number_format($m['ls_qty']))); ?></td> -->
	<td style="text-align:right;"><?php echo number_format($m['ls_qty']); ?></td> 
	<td style="text-align:right;"><?php echo ($m['uom']=="Inches" && METRIC_SYSTEM == "inch"?get_feet_value($m['1_length']):($m['uom']=="Inches"?$m['1_length']:"")); ?></td>
	<td style="text-align:right;"><?php echo $config_vr_fractions_output_format[$m['length_fraction']]; ?></td> 
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
<input type="submit" class="btn " name="add" id="add1" value="Download PDF" onClick="window.opener.location.replace(redirectUrl);
window.close;"> 
<input class="btn" type="button" value="Close" onClick="window.opener=null; window.close(); return false;">

<!-- echo('<script language="Javascript">window.opener.parent.location.href = opener.window.location.href + "&titleID='.$titleID.'"; window.close();</script>'); -->

<!-- <?php echo "<a href=\"".JURI::base()."contract-listing-vic/contract-folder-vic/contract-po-vic?quoteid=".$quoteid."&projectid=".$projectid."&page_name=po&view=summary\" class='btn ".($page_name=="po" && $is_summary_view==1?"btn-disabled":"")."'>&nbsp;&nbsp; PO Summary &nbsp;&nbsp;</a>&nbsp;"; ?> -->

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