<script src="<?php echo JURI::base().'jscript/jsapi.js'; ?>"></script>
<script type="text/javascript">google.load("jquery", "1");</script>
<script src="<?php echo JURI::base().'jscript/labels.js'; ?>"></script>
<link rel="stylesheet" type="text/css" media="screen,projection" href="<?php echo JURI::base().'jscript/custom.css'; ?>" />
<link rel="stylesheet" type="text/css" media="screen,projection" href="<?php echo JURI::base().'jscript/advance-search.css'; ?>" />
<script>
$(window).load(function(){

$('#advlist1').click(function(){
	$('#advance-search').css("display", "block");
	$('#advlist2').css("display", "inline-block");
	$('#advlist1').css("display", "none");
	$('.search-listing').css("height", "150px");
	$('#advance-search label.input span').css("visibility", "visible");
	$('#advance_search').val('1');
});

$('#advlist2').click(function(){
	$('#advance-search').css("display", "none");
	$('#advlist2').css("display", "none");
	$('#advlist1').css("display", "inline-block");
	$('.search-listing').css("height", "28px");
	$('#builderlist').val('');
	$('#replist').val('');
	$('#suburblist').val('');
	$('.date_entered').val('');
	$('#advance_search').val('1');
});

}); 
</script>

<?php
$user =& JFactory::getUser();
//our pagination function is now in this file
function pagination($current_page_number, $total_records_found, $query_string = null)
{
	$page = 1;
	
	echo "Page: ";
	
	for ($total_pages = ($total_records_found/NUMBER_PER_PAGE); $total_pages > 0; $total_pages--)
	{
		if ($page != $current_page_number)
			echo "<a href=\"" . "tender-listing-vic" . "?page=$page" . (($query_string) ? "&$query_string" : "") . "\">";

		 if ($page == $current_page_number) {echo "<span class=\"current\">$page</span>";} else {echo "$page";}


		if ($page != $current_page_number)
			echo "</a>";

		$page++;
	}
}

define("NUMBER_PER_PAGE", 100); //number of records per page of the search results
 

//load the current paginated page number
$page = ($_GET['page']) ? $_GET['page'] : 1;
$start = ($page-1) * NUMBER_PER_PAGE;

if(isset($user->groups['9'])){
	$is_admin = 0;
}else{
	$is_admin = 1;
}


/**
* if we used the search form use those variables, otherwise look for
* variables passed in the URL because someone clicked on a page number
**/
if (!isset($url)) $url ='';
if (!isset($search)) $search =''; 
if (!isset($suburb_name)) $suburb_name= '';
if (!isset($frdate)) $frdate ='';
if (!isset($todate)) $todate = '';
if (!isset($rep_id)) $rep_id = '';
if (!isset($advance_search)) $advance_search = 0;

$search = $_POST['search_string'];
$rep_id = ($_POST['replist']) ? $_POST['replist'] : $_GET['replist']; 
$suburb_name = ($_POST['suburblist']) ? $_POST['suburblist'] : $_GET['suburblist'];
$frdate = ($_POST['frdate']) ? $_POST['frdate'] : $_GET['frdate'];
$todate = ($_POST['todate']) ? $_POST['todate'] : $_GET['todate']; 
$advance_search = ($_POST['advance_search']) ? $_POST['advance_search'] : $_GET['advance_search'];

if($is_admin==0){
	$rep_id = $user->RepID;
}else{
	if(isset($_POST['replist'])){ $rep_id = ($_POST['replist']) ? $_POST['replist'] : $_GET['replist']; }
}

//error_log("advance_search: ".$advance_search, 3,'C:\\xampp\htdocs\\vergola_contract_system_v4_us\\my-error.log'); 

//display the search form
echo "<div class='search-listing'>
<form  action='" . JRoute::_($url) . "' method='post' id='chronoform_Listing_Module' class='Chronoform hasValidation' style='float:none; width:90%'>
	<label>Search:</label> <input type='text' name='search_string' /> <input type='submit' name='submit' value='Search' class='search-btn' />";

	echo "<input type='button' id='advlist1' class='advance-search' value='Advance Search'>
<input type='button' id='advlist2' class='advance-search' value='Advance Search'>
<input type='hidden' name='advance_search' id='advance_search' value='{$advance_search}' />";

echo "<div id='advance-search' style='display:".($advance_search==1?'block':'none')."'>
<!-- Start of Advance Search --->
<!-- Start of Rep List --->
<label class='input' ". (isset($user->groups["9"]) ? "style='display:none;'":"") ."> ". (isset($user->groups["9"])==false && $rep_id==""? "<span>Consultant</span>":"") ." <select class='rep-list' id='replist' name='replist'><option></option>";
            $usergroup = 'Victoria Users';
            $queryrep="SELECT * FROM ver_users WHERE usertype LIKE ('$usergroup') ORDER BY name ASC";
            $resultrep = mysql_query($queryrep);
            if(!$resultrep){die ("Could not query the database: <br />" . mysql_error());
			}
			
			if(isset($user->groups['9'])){
				echo "<option value = '{$user->name}' selected>{$user->name}</option>";
			}else{	
			  while ($data=mysql_fetch_assoc($resultrep)){
                  	if($data['RepID']==$rep_id){
			  			echo "<option value = '{$data['RepID']}' selected>{$data['name']}</option>";
			  		}else{
	                  	echo "<option value = '{$data['RepID']}'>{$data['name']}</option>";
	                }
		        }
 			}

echo "</select></label>

<!-- Start of Suburb -->
<label class='input'>".($suburb_name==''?"<span id='suburbspan'>Suburb</span>":"")."<select class='suburb-list' id='suburblist' name='suburblist'><option></option>";
      
$querysub="SELECT suburb FROM ver_chronoforms_data_suburbs_vic ORDER BY suburb ASC";

$resultsub = mysql_query($querysub);
if(!$resultsub){die ("Could not query the database: <br />" . mysql_error());
}

  while ($data=mysql_fetch_assoc($resultsub)){
      	if($data['suburb']==$suburb_name){
          	echo "<option value = '{$data['suburb']}' selected>{$data['suburb']}</option>";
        }else{
        	echo "<option value = '{$data['suburb']}'>{$data['suburb']}</option>";
        }
    }
 
echo "</select></label>

<div id='searchdate'>
<div>
<span>From Date</span><br />
<input type='text' id='frdate' name='frdate' class='date_entered' value='{$frdate}'>
</div>
<div>
<span>To Date</span><br />
<input type='text' id='todate' name='todate' class='date_entered' value='{$todate}'></div>
<div>
<input type='submit' name='submit' value='Search' class='search-btn' />
</div>
</div>

<!-- End of Advance Search --->
</div>
</form>

</div>";
 

$search_string_filter = "";
if ($search)
	$search_string_filter .= " AND (builder_name LIKE '%"  . $search .  "%'" . 
	" OR site_project LIKE '%"  . $search .  "%'" . 
	" OR site_address1 LIKE '%"  . $search .  "%'" . 
	" OR site_address2 LIKE '%"  . $search .  "%'" .
	" OR site_suburb LIKE '%"  . $search .  "%'" .
	" OR site_state LIKE '%"  . $search .  "%'" .
	" OR site_postcode LIKE '%"  . $search .  "%'" .
	" OR builder_wkphone LIKE '%"  . $search .  "%'" .
	" OR builder_mobile LIKE '%"  . $search .  "%'" .
	($is_admin?" OR repname LIKE '%"  . $search .  "%'":"").
	")";

 
	
$rep_filter = "   ";
$rep_filter2 = "  ";
if($is_admin ){
	if($rep_id!=""){  
		$rep_filter .= " AND repident='{$rep_id}' ";
		$rep_filter2 .= " AND rep_id='{$rep_id}' "; 
	}
}
else{
	 
	$rep_filter .= " AND repident='{$user->RepID}' ";
	$rep_filter2 = " AND rep_id='{$user->RepID}' ";
	 
}	

// if ($rep_name)
// 	$sql .= " AND repname LIKE '%" . mysql_real_escape_string($rep_name) . "%'";
if(isset($user->groups['9'])){
	$sql .= " AND repname LIKE '%" . $user->name . "%'";
}else{
	if ($rep_name)
		$sql .= " AND repname LIKE '%" . mysql_real_escape_string($rep_name) . "%'"; 
}	

if ($suburb_name)
	$sql .= " AND site_suburb LIKE '%" . mysql_real_escape_string($suburb_name) . "%'";

if ($searchdate)
	$sql .= " AND datelodged >= '" .  date('Y-m-d 00:00:00', strtotime($frdate)) . "'" . " AND datelodged <= '" . $todate . "'";
	

// $sql = "SELECT distinct tenderid, site_project, site_address1, site_address2, site_suburb, site_postcode  FROM ver_chronoforms_data_builderpersonal_vic WHERE tenderstatus='Yes'"; 
	
$sql = "SELECT *,(SELECT content FROM ver_chronoforms_data_notes_vic WHERE clientid = b.builderid  ORDER BY cf_id DESC LIMIT 1) AS note FROM (SELECT * FROM ver_chronoforms_data_builderpersonal_vic AS b WHERE 1=1 {$rep_filter} AND tenderstatus='Yes' {$suburb_filter} {$date_filter} {$search_string_filter} ) AS b LEFT JOIN (SELECT * FROM (SELECT * FROM ver_chronoforms_data_followup_vic WHERE 1=1 {$rep_filter2}  ORDER BY cf_id DESC) as f0  GROUP BY quoteid ) AS f ON f.quoteid=b.builderid ";

//error_log($sql, 3,'C:\\xampp\htdocs\\vergola_contract_system_v4_us\\my-error.log'); 
$loop = mysql_query($sql) or die ('cannot run the query because: ' . mysql_error());
$searchdate = $frdate && $todate;

//this return the total number of records returned by our query
$total_records = mysql_num_rows(mysql_query($sql));

//now we limit our query to the number of results we want per page
$sql .= " ORDER BY datelodged ASC LIMIT $start, " . NUMBER_PER_PAGE;

/**
* Next we display our pagination at the top of our search results
* and we include the search words filled into our form so we can pass
* this information to the page numbers. That way as they click from page
* to page the query will pull up the correct results
**/
echo "<div id='container'>";
// echo "<div class='pagination-layer'>";
// pagination($page, $total_records, "datelodged=$searchdate&rep_id=$rep_id&client_suburb=$suburb_name");
// echo "</div>";



//$distinct = mysql_query("SELECT distinct tenderid FROM ver_chronoforms_data_builderpersonal_vic WHERE tenderstatus='Yes'");
//while($getdistinct = mysql_fetch_assoc($distinct)){
//	$TenderID = $getdistinct['tenderid'];
//	echo $TenderID."<br/>"; 
//	}

$html = "<table class='listing-table table-bordered'><tbody><tr><th>Site Address</th><th>Project Name</th><th>Date of Enquiry</th><th>Sales Rep</th><th>Quote Value</th><th>Quote Delivered</th><th>Builder</th><th>Follow Up</th><th>Status</th><th>Note</th></r>";
 
while ($record = mysql_fetch_assoc($loop)) {
//$TenderID = $record['tenderid'];

 $html .= "<tr class='pointer' onclick=location.href='" . $this->baseurl . "tender-listing-vic/tender-folder-vic?tenderid={$record['tenderid']}' >
	<td>{$record['site_address1']} {$record['site_address2']} <br />{$record['site_suburb']} </td>" . 
	"<td>{$record['site_project']}</td>  ";
	
$html .= "<td>". date('d-M-Y',strtotime($record['datelodged'])). "</td>";	 
    
$html .= "<td class='".(isset($user->groups['9'])?"hide":"")."'>{$record['repname']}</td>";
$html .=  "<td>".($record['total_rrp']>0 ?  "$".number_format($record['total_rrp'],2,".",",") :"")."</td>"; 	
	$html .=  "<td>";
		if (empty($record['qdelivered'])==false && $record['qdelivered']!="" && $record['qdelivered']!="0000-00-00"){$html .=  date('d-M-Y',strtotime($record['qdelivered']));} else {$html .=  "";}
$html .=  "</td>";

$html .= "<td>{$record['builder_name']} </td>";
	
$html .= "<td>";
	if (empty($record['qdelivered'])==false && $record['qdelivered']!="" && $record['qdelivered']!="0000-00-00"){$html .=  date('d-M-Y',strtotime($record['qdelivered']));} else {$html .=  "";}
$html .= "</td>";
$html .= "<td>".$record['status']."</td>";
$html .= "<td>".$record['note']."</td>";
$html .= "</tr>"; 

}

$html . "</tbody></table>";
echo $html;
    
echo "<div class='pagination-layer'>";
pagination($page, $total_records, "datelodged=$searchdate&rep_id=$rep_id&client_suburb=$suburb_name");
echo "</div></div>";