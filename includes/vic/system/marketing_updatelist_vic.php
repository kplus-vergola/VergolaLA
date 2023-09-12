<?php  
//$db = JFactory::getDbo();
$next_increment = 0;
$qShowStatus = "SHOW TABLE STATUS LIKE 'ver_lead_marketing_spend'";
$qShowStatusResult = mysql_query($qShowStatus) or die("Query failed: " . mysql_error() . "<br/>" . $qShowStatus);
$row = mysql_fetch_assoc($qShowStatusResult);
$next_increment = $row['Auto_increment'];

$is_edit = 0;
if(isset($_REQUEST['view']) && $_REQUEST['view']=="add"){
	$is_edit = 0;
}else{
	$is_edit = 1;


$id =$_REQUEST['cf_id'];
$cf_id =$_REQUEST['cf_id'];

$month = mysql_real_escape_string($_REQUEST['month']);
$year = mysql_real_escape_string($_REQUEST['year']);

$monthyear = mysql_real_escape_string($_REQUEST['monthyear']);
$m_id = mysql_real_escape_string($_REQUEST['cf_id']);

if (isset($_REQUEST['monthyear']) && strlen($_REQUEST['monthyear']) > 0) {
}

if(isset($_POST['save']) || isset($_POST['save_new']))
{
	// $next_increment = 0;
	// $qShowStatus = "SHOW TABLE STATUS LIKE 'ver_lead_marketing_spend'";
	// $qShowStatusResult = mysql_query($qShowStatus) or die("Query failed: " . mysql_error() . "<br/>" . $qShowStatus);
	// $row = mysql_fetch_assoc($qShowStatusResult);
	// $next_increment = $row['Auto_increment'];
	// $monthyear = $marketing_month . '-' . $year;

	$year = mysql_escape_string($_POST['year']);
	$marketing_month = mysql_escape_string($_POST['marketing_date']);		
	$marketing_source = mysql_escape_string($_POST['marketing_source']);
	$lead = mysql_escape_string($_POST['lead']);
	$marketing_amount = mysql_escape_string($_POST['marketing_amount']);
	// $nmonth = date("m", strtotime($marketing_month));
	$marketing_month = $marketing_month + 1;
	$nmonth = date("n", strtotime($marketing_month));		
	$marketing_date = $year . '-' . $marketing_month. '-01';
	$monthNum = sprintf("%02s", $nmonth);
	$monthname = date("F", strtotime($marketing_month));

	// $monthyear = $monthname . '-' . $year;

	if(isset($_POST['save_new']))
	{	
		
		$next_increment = 0;
		$qShowStatus = "SHOW TABLE STATUS LIKE 'ver_lead_marketing_spend'";
		$qShowStatusResult = mysql_query($qShowStatus) or die("Query failed: " . mysql_error() . "<br/>" . $qShowStatus);
		$row = mysql_fetch_assoc($qShowStatusResult);
		$next_increment = $row['Auto_increment'];

		$cf_id =$next_increment;

		mysql_query("INSERT INTO ver_lead_marketing_spend (marketing_amount,year,lead_id, marketing_date,month) VALUES ('$marketing_amount', '$year', '$lead', '$marketing_date', '$marketing_month' );")
		// mysql_query("INSERT ver_chronoforms_data_installer_vic(name, mobile, email, block)   VALUES('$name','$mobile','$email','$block'); ")
					or die(mysql_error()); 
		echo "Saved!";

	}else if(isset($_POST['save'])){	
		mysql_query("UPDATE ver_lead_marketing_spend SET lead_id ='$lead', year ='$year', marketing_amount='$marketing_amount', marketing_date='$marketing_date', month='$marketing_month' WHERE id = '$id'")
					or die(mysql_error()); 
		echo "Updated!";
	}

	$sql = "SELECT l.*,m.*,m.id AS cf_id,Sum(m.marketing_amount) AS marketing_amount_total,MONTH (m.marketing_date) AS monthNumber,MONTHNAME(m.marketing_date) AS monthName,CONCAT(MONTHNAME(m.marketing_date),'-',m.`year`) AS MonthYear FROM ver_lead_marketing_spend AS m INNER JOIN ver_chronoforms_data_lead_vic AS l ON l.cf_id=m.lead_id WHERE 1=1 AND m.id='{$cf_id}' GROUP BY m.lead_id ORDER BY l.lead ASC;";
	$result = mysql_query($sql);

	$retrieve = mysql_fetch_array($result);
	if (!$result) {
	  die("Error: Data not found..");
	}
	$monthyear = $retrieve['MonthYear'];
	header('Location:' . JURI::base() . 'marketing-listing-vic/marketing-updatelist-vic?monthyear=' . $monthyear);

}
if (isset($_REQUEST['cf_id']) && strlen($_REQUEST['cf_id']) > 0) {
	
  //error_log("inside 1: ", 3,'C:\\xampp\htdocs\\vergola_contract_system_v4_us\\my-error.log');
  //view item based on request
  //
  $cf_id = mysql_real_escape_string($_REQUEST['cf_id']);
  $id = mysql_real_escape_string($_REQUEST['cf_id']);
  $m_id = mysql_real_escape_string($_REQUEST['cf_id']);
  
  $sql = "SELECT l.*,m.*,m.id AS cf_id,Sum(m.marketing_amount) AS marketing_amount_total,MONTH (m.marketing_date) AS monthNumber,MONTHNAME(m.marketing_date) AS monthName,CONCAT(MONTHNAME(m.marketing_date),'-',m.`year`) AS MonthYear FROM ver_lead_marketing_spend AS m INNER JOIN ver_chronoforms_data_lead_vic AS l ON l.cf_id=m.lead_id WHERE 1=1 AND m.id='{$cf_id}' GROUP BY m.lead_id ORDER BY l.lead ASC;";

  // echo $sql;
  //error_log($sql, 3,'C:\\xampp\htdocs\\vergola_contract_system_v4_us\\my-error.log');
  $result = mysql_query($sql);


  $retrieve = mysql_fetch_array($result);
  if (!$result) {
    die("Error: Data not found..");
  }
  $monthyear = $retrieve['MonthYear'];
  $marketing_source = $retrieve['marketing_source'];
  $lead = $retrieve['lead'];
  $marketing_amount = $retrieve['marketing_amount'];
  $monthNumber = $retrieve['monthNumber'];
  $monthName = $retrieve['monthName'];
  $month = $retrieve['monthName'];
  $year = $retrieve['year'];

  // header('Location:'.JURI::base().'marketing-listing-vic/marketing-updatelist-vic?monthyear='"February-2023");
  // header('Location:' . JURI::base() . 'marketing-listing-vic/marketing-updatelist-vic?monthyear=' . $monthyear);
  // $selected = 2022;
} else if (!empty($id)) {
  //error_log("inside 2: ", 3,'C:\\xampp\htdocs\\vergola_contract_system_v4_us\\my-error.log');
  //view item after adding.
  //
  $is_adding = 0;
} else {
  //error_log("inside 3: ", 3,'C:\\xampp\htdocs\\vergola_contract_system_v4_us\\my-error.log');

  $is_adding = 1;
  $Section = $_section;
}

}
if (!empty($id) && $is_adding == 0) {
  //error_log("here 1: ".$id, 3,'C:\\xampp\htdocs\\vergola_contract_system_v4_us\\my-error.log');
  if ($cf_id > 0 || $id > 0 || $m_id > 0 ) {
  } else {
    $cf_id = $_REQUEST['cf_id'];
    $m_id = $_REQUEST['cf_id'];
  }

  if ($year > 0 ) {
  } else {
    $year = $_REQUEST['year'];
  }

  if ($month > 0 ) {
  } else {
    $month = $_REQUEST['month'];
  }

} else {
  //error_log("here 2: ".$id, 3,'C:\\xampp\htdocs\\vergola_contract_system_v4_us\\my-error.log');

}
// Begin delete image function
if (isset($_POST['delete-pic'])) {
    $id = mysql_real_escape_string($_POST['inventoryid']);
    //if ($photo!='')
    //{      
      $sql = "UPDATE `ver_chronoforms_data_inventory_vic` SET photo = '' WHERE inventoryid = '$id'";
      //error_log($sql, 3,'C:\\xampp\htdocs\\vergola_contract_system_v4_us\\my-error.log');
      mysql_query($sql) or die(mysql_error()); $notification = "Image file has been deleted."; 
      //echo "Image file has been successfully Deleted!"; 


    //}else
}
// End delete image function

if(isset($_POST['delbtn']))
{	
	$cf_id = mysql_real_escape_string($_POST['cf_id']);
	$sql = "DELETE from ver_lead_marketing_spend WHERE id = '$cf_id'";
	//error_log($sql, 3,'C:\\xampp\htdocs\\vergola_contract_system_v4_us\\my-error.log');
	mysql_query($sql) or die(mysql_error()); $notification = "Item has been deleted."; 

	// mysql_query("DELETE from ver_lead_marketing_spend WHERE id = '$cf_id'")
				// or die(mysql_error()); 
	// echo "Deleted";
	// $notification = "Item Deleted";
	// header('Location:'.JURI::base().'marketing-listing-vic');		
	header('Location:' . JURI::base() . 'marketing-listing-vic/marketing-updatelist-vic?monthyear=' . $monthyear);	
}

if(isset($_POST['cancel']))
{	
	header('Location:'.JURI::base().'marketing-listing-vic');			
}
?>
<div>
	<h2><?php if($is_adding) echo "Add";  ?> Marketing Expenditures</h2>
	<?php if(strlen($notification)>0){echo "<div class='notification_result'>{$notification}</div>";} ?>
	<div id="notification" class="notification_box hide"  ></div>
<form class="Chronoform hasValidation" method="post" id="chronoform_Marketing_Vic" action="<?php echo JURI::base(); ?>marketing-listing-vic\marketing-updatelist-vic" enctype="multipart/form-data">
  <input type='hidden' name='id' id='id' value='<?php echo $id; ?>' />
  <input type='hidden' name='cf_id' id='cf_id' value='<?php echo $cf_id; ?>' />
  <input type='hidden' name='m_id' id='m_id' value='<?php echo $m_id; ?>' />
  <input type='hidden' name='year' id='year' value='<?php echo $year; ?>' />
  <input type='hidden' name='monthyear' id='monthyear' value='<?php echo $monthyear; ?>' />
  <input type='hidden' name='marketing_source' id='marketing_source' value='<?php echo $marketing_source; ?>' />
  <input type='hidden' name='lead' id='lead' value='<?php echo $lead; ?>' />
  <input type='hidden' name='marketing_amount' id='marketing_amount' value='<?php echo $marketing_amount; ?>' />
  <input type='hidden' name='' id='' value='<?php echo $is_adding; ?>' />
  
  <table class="inventory-table">
    <tr>
      <th width="10%">Year</th>
      <th width="20%">Month</th>      
      <th width="35%">Lead</th>
      <th>Amount</th>
      <th></th>
    </tr>
    <tr>
       <td>
        <select name="year" id="year">
          <option value='<?php echo $year; ?>'></option>
          <?php        
          for ($i_year = date('Y') - 10; $i_year <= date('Y'); $i_year++) {
              $selected = $year == $i_year ? ' selected' : '';
              echo '<option value="'.$i_year.'"'.$selected.'>'.$i_year.'</option>'."\n";
          } ?>
        </select>
      </td>
      <td>
        <select name="marketing_date" id="marketing_date">
          <option value='<?php echo $month; ?>'></option>
          <?php
          /*
          for ($_monthNumber = 1; $_monthNumber <= 12; $_monthNumber++) {
              $_monthName = date("F", mktime(0, 0, 0, $_monthNumber, 10));
              $selected = $monthName == $_monthName ? ' selected' : '';
              
              echo '<option value="'.$_monthName.'"'.$selected.'>'.$_monthName.'</option>'."\n";
          */
		
          // foreach (['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'] as $monthNumber => $month) {          
          	foreach (['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12'] as $monthNumber => $month) {          	
          		// foreach (['','01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'] as $monthNumber => $month) {          	          		
              // $selected = $year == $i_year ? ' selected' : '';
              // echo "<option value='$monthNumber'>{$month}</option>";
              $month = date("F", mktime(0, 0, 0, $month, 10));
              echo "<option value='".$monthNumber."'".($month==$monthName ? " selected='selected'" : "").">{$month}</option>";
		
          }
          ?>          
        </select>
      </td>
      <td class="cat">
          <select name="lead" id="lead">  
            <option value='<?php echo $lead; ?>'></option>
            <?php
             $sql = "SELECT * FROM `ver_chronoforms_data_lead_vic` ";
             $sql_result = mysql_query ($sql) or die ('request "Could not execute SQL query" '.$sql);
                while ($market = mysql_fetch_assoc($sql_result)) {
            
                  echo "<option value='".$market["cf_id"]."'".($market["lead"]==$lead ? " selected='selected'" : "").">".$market["lead"]."</option>"; } ?>        
          </select>
      </td> 
      
      <td class="rrp"><input type="text" id="marketing_amount" name="marketing_amount" value='<?php echo $marketing_amount; ?>'></td>
    </tr>
  </table>




<?php
if (isset($_REQUEST['cf_id']) && strlen($_REQUEST['cf_id']) > 0) {
	$sql = "
	      SELECT
	        l.lead,
	        l.notes,
	        l.marketing_source,
	        m.id AS cf_id,
	        m.lead_id,
	        m.marketing_amount,
	        Sum( m.marketing_amount ) AS marketing_amount_total,
	        m.target_amount,
	        m.target_contract,
	        m.marketing_date,
	        MONTH (m.marketing_date),
	        MONTHNAME(m.marketing_date) AS month,
	        CONCAT( MONTHNAME( m.marketing_date ), '-', m.`year` ) AS MonthYear,
	        m.dateFromTo,
	        m.`year` 
	      FROM
	        ver_lead_marketing_spend AS m
	        INNER JOIN ver_chronoforms_data_lead_vic AS l ON l.cf_id = m.lead_id 
	      WHERE
	        1 = 1 
	        AND m.id  = '{$cf_id}'
	      GROUP BY
	        m.lead_id
	      ORDER BY
	        l.lead ASC ";


	//error_log($sql, 3,'C:\\xampp\htdocs\\vergola_contract_system_v4_us\\my-error.log');
	$result = mysql_query($sql);


	$retrieve = mysql_fetch_array($result);
	if (!$result) {
	  die("Error: Data not found..");
	}


	$monthyear = $retrieve['MonthYear'];
	$marketing_source = $retrieve['marketing_source'];
	$lead = $retrieve['lead'];
	$marketing_amount = $retrieve['marketing_amount'];

	// $_marketing_lead = $retrieve['lead_id'];
	// $_marketing_lead = 'Facebook';
	// $lead = 4;
	// $monthyear = 'July-2023';
}
// $search = $_POST['search_string'];
$sql = "
      SELECT
        l.lead,
        l.notes,
        l.marketing_source,
        m.id AS cf_id,
        m.lead_id,
        m.marketing_amount,
        Sum( m.marketing_amount ) AS marketing_amount_total,
        m.target_amount,
        m.target_contract,
        m.marketing_date,
        MONTH ( m.marketing_date ),
        CONCAT( MONTHNAME( m.marketing_date ), '-', m.`year` ) AS MonthYear,
        m.dateFromTo,
        m.`year` 
      FROM
        ver_lead_marketing_spend AS m
        INNER JOIN ver_chronoforms_data_lead_vic AS l ON l.cf_id = m.lead_id 
      WHERE
        1 = 1 
        AND CONCAT(MONTHNAME(m.marketing_date),'-',m.`year`) = '{$monthyear}'
      GROUP BY
        m.lead_id
      ORDER BY
        l.lead ASC ";

// echo $sql;
$result = mysql_query($sql) or die(mysql_error());

$loop = mysql_query($sql) or die ('cannot run the query because: ' . mysql_error()); echo "<table class='listing-table table-bordered' style='width: 50%;'>
    <thead>
        <tr style=''>
            <th>Marketing Source</th>
            <th>Lead</th>
            <th>Amount</th>
        </tr>
    </thead>
    <tbody>"; 
    while ($record = mysql_fetch_assoc($loop)) 
    // echo "<tr class='pointer' onclick=location.href='" . $this->baseurl . "marketing-updatelist-vic?monthyear={$record['MonthYear']}?cf_id={$record['cf_id']}'>
    echo "<tr class='pointer' onclick=location.href='" . $this->baseurl . "marketing-updatelist-vic?cf_id={$record['cf_id']}'>
            <td>{$record['marketing_source']}</td>
            <td>{$record['lead']}</td>
            <td>{$record['marketing_amount']}</td>
            <td><input type='submit' value='Delete' style='margin:0 0 0 5px;' id='delbtn' name='delbtn' class='update-btn' onclick='return confirm('Are you sure you want to delete this expenditure item?'');'/></td>            
            </td></tr>"; 
    echo "</tbody></table>"; ?>
      
      <div id="postbtn">
        <input type="submit" value="Save" id="savebtn" name="<?php echo ($is_adding ? "save_new" : "save"); ?>" class="update-btn">
        <input type="submit" value="Cancel" id="cancelbtn" name="cancel" class="update-btn" onclick=location.href='<?php echo JURI::base() . 'marketing-listing-vic'; ?>' />
        <input type="hidden" value="Delete" id="delbtnAll" name="delbtnAll" class="update-btn" onclick="return confirm('Are you sure you want to delete this item?');">
      </div>
    </form>
    </div>


    <link rel="stylesheet" type="text/css" media="screen,projection" href="<?php echo JURI::base() . 'jscript/lightbox.css'; ?>" />
    <link rel="stylesheet" type="text/css" media="screen,projection" href="<?php echo JURI::base() . 'jscript/jquery-ui-1.11.4/jquery-ui.css'; ?>" />
    <link rel="stylesheet" type="text/css" media="screen,projection" href="<?php echo JURI::base() . 'jscript/custom.css'; ?>" />
    <link rel="stylesheet" type="text/css" media="screen,projection" href="<?php echo JURI::base() . 'jscript/system-maintenance.css'; ?>" />

    <script src="<?php echo JURI::base() . 'jscript/jquery.min.js'; ?>"></script>
    <script src="<?php echo JURI::base() . 'jscript/jquery-ui-1.11.4/jquery-ui.js'; ?>"></script>
    <script type="text/javascript" src="<?php echo JURI::base() . 'jscript/lightbox.js'; ?>"></script>
    <SCRIPT language="javascript">
      function change_section() {
        var section = $("#section option:selected").val();
        var inventoryid = $("#inventoryid").val();
        var inv_param = "";
        if (inventoryid.length > 0) {
          inv_param = "&inventoryid=" + inventoryid;
        }

        location.href = "<?php echo JURI::base(); ?>marketing-listing-vic/marketing-updatelist-vic?section=" + section + inv_param;
      }


      function change_year() {
        var year = $("#year option:selected").val();
        var inventoryid = $("#inventoryid").val();
        var inv_param = "";
        if (inventoryid.length > 0) {
          inv_param = "&inventoryid=" + inventoryid;
        }

        location.href = "<?php echo JURI::base(); ?>marketing-listing-vic/marketing-updatelist-vic?section=" + section + inv_param;
      }

      function showdrop() {
        var section = $("#section").val(); // get the value of currently selected section
        $.ajax({
          type: "post",
          dataType: "text",
          data: "section=" + section,
          url: "<?php echo JURI::base() . 'includes/vic/category_vic.php'; ?>", // page to which the ajax request is passed
          success: function(response) {
            $("#category").html(response); // set the result to category dropdown
            $("#category").show();
          }
        })


      }


      function addRow(tableID) {

        var table = document.getElementById(tableID);

        var rowCount = table.rows.length;
        var row = table.insertRow(rowCount);

        var colCount = table.rows[0].cells.length;

        for (var i = 0; i < colCount; i++) {

          var newcell = row.insertCell(i);

          newcell.innerHTML = table.rows[0].cells[i].innerHTML;
          //alert(newcell.childNodes);
          switch (newcell.childNodes[0].type) {
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

          for (var i = 0; i < rowCount; i++) {
            var row = table.rows[i];

            var chkbox = row.cells[0].childNodes[0];
            if (null != chkbox && true == chkbox.checked) {
              if (rowCount <= 1) {
                alert("Cannot delete all the rows.");
                break;
              }
              table.deleteRow(i);
              rowCount--;
              i--;
            }


          }
        } catch (e) {
          alert(e);
        }
      }
      function remove_raw_meterial(event,o){
         
        // alert($(o).closest('tr').html());
         $(o).closest('tr').remove();

         var total_cost = 0.00;
         $(".tbl-cost input").each(function(){
             total_cost += parseFloat($(this).val()); 
         });
         $("#lbl_total_cost").html(total_cost.toFixed(2));
         
         if($("#section option:selected").val()=="Disbursements"){

         }else{
           total_cost = total_cost*2; 
         }
         
         $("#rrp").val(total_cost.toFixed(2));

      } 

      function add_raw_meterial(event,o){
       event.preventDefault();
       var tr="";
       var raw_description = $("#raw_desc").val();
       var raw_material_id =  $("#raw_material_id").val();

       if(raw_description.length<1 && raw_material_id.length<1){
           //notification_body

           $("#notification").html("Please choose a raw material in the dropdown list.");   
             //$("#notification").appendTo("."+dataClass+" .notification-area");
             $("#notification").removeClass('hide');  
             $("#notification").show(); 
             setTimeout(function() {
                   $( "#notification" ).hide( "slow" );
             }, 7000);

             
             $("#raw_desc").css({ "border-color": "red"});
             $("#raw_desc").one("change",function(){ $(this).css({ "border-color": "#4d4c4c"}); });
             $("#raw_desc").focus(); 
             return;
       }

       var raw_invqty = $("#raw_invqty").val();
       var raw_invcost = $("#raw_invcost").val();
       var raw_qty = $("#raw_qty").val();
       var raw_cost = $("#raw_cost").val();
       //var extended_cost = raw_invqty * raw_cost;
       var extended_cost = parseFloat(raw_invqty * raw_cost).toFixed(2);
       var supplier_name = $("#suppliers option:selected").text();
       //var supplier_id = $("#suppliers option:selected").val();

       //extended_cost = $("#extended_cost").val(extended_cost.toFixed(2));
       tr = "<tr><td class='tbl-desc'><input type='text' value='"+raw_description+"' /><input type='hidden' value='"+raw_material_id+"' name='raw_material_id[]' /><td class='tbl-desc'><input type='text'style='margin-left:10px; width:80px;' value='"+raw_invqty+"' name='raw_invqty[]' /></td> <td class='tbl-qty1' style=\"display:none;\"><input type='hidden'style='margin-left:10px; width:80px;' value='"+raw_qty+"' /> </td> <td class='tbl-desc'><input type='text' style='margin-left:10px; width:80px;' value='"+raw_cost+"' /> </td> <td class='tbl-cost'><input type='text' value='"+extended_cost+"' name='raw_invcost[]' /></td> <input type='hidden'><input type='hidden' value='"+extended_cost+"' name='extended_cost[]' /><td><input type='button' value='Delete' onclick='remove_raw_meterial(event,this)' style='margin:0 0 0 5px;' /></td> </tr>";

       $("#tbl-retrieve tr:last").after(tr);

       $("#raw_desc").val("");
       $("#raw_material_id").val("");
       $("#raw_invqty").val("");
       $("#raw_invcost").val("");
       $("#raw_qty").val("");
       $("#raw_cost").val("");
       $("#extended_cost").val("");

       var total_cost = 0.00; var qty = 0; var cost=0;
       $(".tbl-cost input").each(function(){
           qty = parseFloat($(this).parent().parent().children('.tbl-qty').children('input').val());

           cost = parseFloat($(this).val());  
           //total_cost +=  qty*cost; 
           // if (qty > 1){
           //   total_cost +=  cost/qty; }
           // else{
           total_cost +=  cost; 
       });


       $("#lbl_total_cost").html(total_cost.toFixed(2));

       if($("#section option:selected").val()=="Disbursements" || $("#section option:selected").val()=="Extras" || $("#section option:selected").val()=="Misc"){

       }else{
         total_cost = total_cost*2; 
       }
       
       $("#rrp").val(total_cost.toFixed(2));
       
       
       

      }

    </SCRIPT>
    <!-- <h2><?php if ($is_adding) echo "Add";  ?> Marketing</h2> -->
    <?php if (strlen($notification) > 0) {
      echo "<div class='notification_result'>{$notification}</div>";
    }