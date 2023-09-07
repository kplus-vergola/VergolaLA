<!-- Begin -->

<?php  
$db = JFactory::getDbo();
$id =$_REQUEST['cf_id'];
$cf_id =$_REQUEST['cf_id'];
$source_cf_id =$_REQUEST['cf_id'];
$lead_cf_id =$_REQUEST['cf_id'];


$result = mysql_query("SELECT * FROM ver_chronoforms_data_lead_vic WHERE cf_id  = '$id'");
$retrieve = mysql_fetch_array($result);
if (!$result) 
    {
    die("Error: Data not found..");
    }  

  $Marketing_Source=$retrieve['marketing_source'] ;
  $Marketing_Lead=$retrieve['lead'] ;

  $selected_source=$retrieve['marketing_source'] ;
  $selected_lead=$retrieve['lead'] ;

  


        
if(isset($_REQUEST['marketing_source'])){
  $_source = $_REQUEST['marketing_source'];
  $m_source = $_REQUEST['marketing_source'];
}

if(isset($_REQUEST['lead_source'])){
  $_lead = $_REQUEST['lead_source'];
  $l_source = $_REQUEST['lead_source'];
}

if(isset($_REQUEST['source'])){
  $is_addSource = $_REQUEST['is_addSource'];
  $m_source = $_REQUEST['source'];
  $selected_source = $_REQUEST['source'];
  echo ($selected_source);
  if (($is_addSource) || empty($m_source) || is_null($m_source)){
    // header('Location:'.JURI::base().'system-management-vic/lead-listing-vic/lead-vic');
  }
}

if(isset($_REQUEST['lead'])){
  $is_addLead = $_REQUEST['is_addLead'];
  // $m_lead = $_REQUEST['lead'];
  $l_source = $_REQUEST['lead'];  
  $selected_lead = $_REQUEST['lead'];
  echo ($selected_lead);
  if (($is_addLead) || empty($l_source) || is_null($l_source)){
    // header('Location:'.JURI::base().'system-management-vic/lead-listing-vic/lead-vic');
  }
}

if(isset($_POST['is_addSource'])){ 
}
if(isset($_POST['is_addLead'])){ 
}

if(isset($_POST['save']))
{ 
  $marketing_save = $_POST['marketing_source'];
  $lead_save = $_POST['lead_source'];
  if(is_addSource){
    $marketing_save = $_POST['input_marketing_source'];
  }

  if(is_addLead){
    $lead_save = $_POST['input_lead_source'];
  }  

  // mysql_query("INSERT INTO ver_chronoforms_data_lead_vic (marketing_source,lead) 
  // VALUES ('$marketing_save','$lead_save')")
  //       or die(mysql_error()); 
  // echo "Saved!";

  if(empty($id) && $is_adding==0){ 
      mysql_query("INSERT INTO ver_chronoforms_data_lead_vic (marketing_source,lead) 
      VALUES ('$marketing_save','$lead_save')")
            or die(mysql_error()); 
      echo "Saved!";
    }else{
        mysql_query("UPDATE ver_chronoforms_data_lead_vic SET marketing_source ='$marketing_save', lead ='$lead_save' WHERE cf_id = '{$id}' ")
              or die(mysql_error()); 
        echo "Updated!";
    }

  // if((is_addSource) && (is_addLead))
  // {
  //   mysql_query("INSERT INTO ver_chronoforms_data_lead_vic (marketing_source,lead) 
  //   VALUES ('$marketing_save','$lead_save')");
  //         or die(mysql_error()); 
  //   echo "Saved!";
  // }else{
  //   mysql_query("UPDATE ver_chronoforms_data_lead_vic SET marketing_source ='$marketing_save', lead ='$lead_save' WHERE cf_id = '$id'")
  //         or die(mysql_error()); 
  //   echo "Updated!";
  // } 
// $sql = "SELECT * FROM ver_chronoforms_data_lead_vic WHERE cf_id  = '$id'";  
//error_log($sql, 3,'C:\\xampp\htdocs\\vergola_contract_system_v4_us\\my-error.log');
// $result = mysql_query($sql);

  header('Location:'.JURI::base().'system-management-vic/lead-listing-vic');    
}

if(isset($_POST['delete']))
{ 

  mysql_query("DELETE from ver_chronoforms_data_lead_vic WHERE cf_id = '$id'")
        or die(mysql_error()); 
  echo "Deleted";
  
  header('Location:'.JURI::base().'system-management-vic/lead-listing-vic');    
}

if(isset($_POST['cancel']))
{ 
  header('Location:'.JURI::base().'system-management-vic/lead-listing-vic');      
}

// -----------------

// if(isset($_REQUEST['source'])){
//   $_section = $_REQUEST['source'];
// }

if(isset($_REQUEST['marketingid']) && strlen($_REQUEST['marketingid'])>0){
  //error_log("inside 1: ", 3,'C:\\xampp\htdocs\\vergola_contract_system_v4_us\\my-error.log');
  //view inventory item based on request
  $marketingid = mysql_real_escape_string($_REQUEST['marketingid']);
  $id = mysql_real_escape_string($_REQUEST['marketingid']);
}else if(!empty($id)){
  //error_log("inside 2: ", 3,'C:\\xampp\htdocs\\vergola_contract_system_v4_us\\my-error.log');
  //view item after adding.
  $is_adding = 0;
}else{
  //error_log("inside 3: ", 3,'C:\\xampp\htdocs\\vergola_contract_system_v4_us\\my-error.log');
  $is_adding = 1;
  $Section = $_section;
}

if(!empty($id) && $is_adding==0){ 
  //error_log("here 1: ".$id, 3,'C:\\xampp\htdocs\\vergola_contract_system_v4_us\\my-error.log');
  if($marketingid>0 || $id>0 ){

  }else{
    $cf_id = $_REQUEST['cf_id'];
  }
$sql = "SELECT * FROM ver_chronoforms_data_lead_vic WHERE cf_id  = '$id'";  
//error_log($sql, 3,'C:\\xampp\htdocs\\vergola_contract_system_v4_us\\my-error.log');
$result = mysql_query($sql);


$retrieve = mysql_fetch_array($result);
if (!$result) 
    {
    die("Error: Data not found..");
    } 
  
  // Inventory Details
  $CFID = $retrieve['cf_id'];       
  $LeadID = $retrieve['cf_id'];

  // $Marketing_Source = (empty($_source)?$retrieve['section']:$_source);

  $Marketing_Source = $retrieve['marketing_source'] ;
  $Marketing_Lead = $retrieve['lead'] ;
}else{
  //error_log("here 2: ".$id, 3,'C:\\xampp\htdocs\\vergola_contract_system_v4_us\\my-error.log');
} 

// -----------------
?>


<!-- <form method="post"> -->
<h2>  
    Marketing Leads
</h2>
<?php if (strlen($notification) > 0) {
  // echo "<div class='notification_result'>{$notification}</div>";
} 
  // echo $m_source;
  // echo "<div class='notification_result'>{$m_source}</div>";
  // echo "<div class='notification_result'>{$is_adding}</div>";
  
?>
<!-- <div id="notification" class="notification_box hide"></div> -->
<input type='hidden' name='id' id='id' value='<?php echo $cf_id; ?>' />
<input type='hidden' name='cf_id' id='cf_id' value='<?php echo $cf_id; ?>' />
<input type='hidden' name='source_cf_id' id='source_cf_id' value='<?php echo $source_cf_id; ?>' />
<input type='hidden' name='lead_cf_id' id='lead_cf_id' value='<?php echo $lead_cf_id; ?>' />
<input type='hidden' name='is_addSource' id='is_addSource' value='<?php echo $is_addSource; ?>' />
<input type='hidden' name='_source' id='_source' value='<?php echo $_source; ?>' />
<input type='hidden' name='m_source' id='m_source' value='<?php echo $m_source; ?>' />
<input type='hidden' name='l_source' id='l_source' value='<?php echo $l_source; ?>' />
<input type='hidden' name='marketing_source' id='marketing_source' value='<?php echo $l_source; ?>' />
<input type='hidden' name='source' id='source' value='<?php echo $source; ?>' />
<!-- <form class="Chronoform hasValidation" method="post" id="chronoform_Lead_Vic" action="<?php echo JURI::base(); ?>system-management-vic/lead-listing-vic/lead-updatelist-vic">   -->
<form method="post"  enctype="multipart/form-data">
<table class="update-table">
    <tr>
    <td class="row1">Marketing Source</td>
    <td class="row2">
      <input type="text" name="input_marketing_source" id="input_marketing_source" value="<?php echo $Marketing_Source ?>"/>
      <div id="cbo_marketing_source">
        <select class="suburb-list" name="marketing_source" id="marketing_source" >
          <option value=""></option>
          <?php
           $sql = "SELECT * FROM ver_chronoforms_data_lead_vic WHERE marketing_source != '' GROUP BY marketing_source ORDER BY marketing_source ASC";
           $sql_result = mysql_query ($sql) or die ('request "Could not execute SQL query" '.$sql);
              while ($src = mysql_fetch_assoc($sql_result)) { 
                echo "<option value='".$src["marketing_source"]."'".($src["marketing_source"]==$selected_source ? " selected='selected'" : "").">".$src["marketing_source"]."</option>"; } ?>
        </select>          
      </div>
    </td>
    <td class="row2" style="width: 800px; padding-left: 6%;">
      <label class="input productionstart">
        <input type="hidden" id="source_cf_id" name="" value="">      
        <input style="margin: 0 0 0 -390px;width: 50px;" type="checkbox" name="chkboxSource" id="chkboxSource">
        <span class="visible" style="padding-right: -151px;">Check the box to manually type marketing source </span>
      </label>
    </td>    
  </tr>
   <tr>
    <td class="row1">Lead Source</td>
    <td class="row2">
      <input type="text" name="input_lead_source" id="input_lead_source" value="<?php echo $Marketing_Lead ?>"/>    
      <div id="cbo_lead_source">
        <select class="suburb-list" name="lead_source" id="lead_source">
          <?php 
            $sql = "SELECT * FROM ver_chronoforms_data_lead_vic";
            $sql_result = mysql_query ($sql) or die ('request "Could not execute SQL query" '.$sql);
              while ($_lead = mysql_fetch_assoc($sql_result)) { 
                echo "<option value='".$_lead["lead"]."'".($_lead["lead"]==$selected_lead ? " selected='selected'" : "").">".$_lead["lead"]."</option>"; } ?>
        </select>
      </div>
<!--       <input type="hidden" id="lead_cf_id" name="" value="">
      <input type="checkbox" name="chkboxLead" id="chkboxLead" >   -->  
    </td>
    <td class="row2" style="width: 800px; padding-left: 6%;">
      <label class="input productionstart">
        <input type="hidden" id="lead_cf_id" name="" value="">      
        <input style="margin: 0 0 0 -390px;width: 50px;" type="checkbox" name="chkboxLead" id="chkboxLead">
        <span class="visible" style="padding-right: -151px;">Check the box to manually type lead source </span>
      </label>
    </td>  
  </tr>

  <tr>
    <td class="row1">&nbsp;</td>
    <td class="row2"><input type="submit" name="save" value="Save" class="update-btn" /> <input type="submit" name="delete" value="Delete" class="update-btn" /> <input type="submit" name="cancel" value="Cancel" class="update-btn" /></td>
  </tr>
</table>

<!-- End -->




<link rel="stylesheet" type="text/css" media="screen,projection" href="<?php echo JURI::base() . 'jscript/lightbox.css'; ?>" />
<link rel="stylesheet" type="text/css" media="screen,projection" href="<?php echo JURI::base() . 'jscript/jquery-ui-1.11.4/jquery-ui.css'; ?>" />
<link rel="stylesheet" type="text/css" media="screen,projection" href="<?php echo JURI::base() . 'jscript/custom.css'; ?>" />
<link rel="stylesheet" type="text/css" media="screen,projection" href="<?php echo JURI::base() . 'jscript/system-maintenance.css'; ?>" />
<script src="<?php echo JURI::base() . 'jscript/jquery.min.js'; ?>"></script>
<script src="<?php echo JURI::base() . 'jscript/jquery-ui-1.11.4/jquery-ui.js'; ?>"></script>
<script type="text/javascript" src="<?php echo JURI::base() . 'jscript/lightbox.js'; ?>"></script>
<script type="text/javascript">
<?php
  $result = mysql_query("SELECT * FROM `ver_chronoforms_data_lead_vic` WHERE marketing_source <> '' GROUP BY marketing_source ORDER ASC");
  $source = array();
  while ($row = mysql_fetch_assoc($result)) {
    $row_array['value'] = $row['marketing_source'];
    $row_array['label'] = $row['marketing_source'];
    $row_array['cf_id'] = $row['cf_id'];
    $row_array['marketing_source'] = $row['marketing_source'];
    array_push($source, $row_array);
  }
  echo "var source = " . json_encode($source);
?>

<?php
  $result = mysql_query("SELECT * FROM `ver_chronoforms_data_lead_vic` ORDER ASC");
  $lead = array();
  while ($row = mysql_fetch_assoc($result)) {
    $row_array['value'] = $row['lead'];
    $row_array['label'] = $row['lead'];
    $row_array['cf_id'] = $row['cf_id'];
    $row_array['lead'] = $row['lead'];
    array_push($lead, $row_array);
  }
  echo "var lead = " . json_encode($lead);
?>

$(document).ready(function() {
  // $("#is_addSource").val("0");
  // document.getElementById("input_lead_source").style.display = 'block';
  // document.getElementById("input_marketing_source").style.display = 'block';
  // $("#raw_lead").val("");
  // document.getElementById("is_addSource").val;
  // document.getElementById("input_marketing_source").style.display = 'none';
  $("#input_marketing_source").hide();
  $("#input_lead_source").hide();

  $("#input_marketing_source").autocomplete({
      source: source,
  });
    var source_config = {
      source: source,
      select: function(event, ui) {

        $("#source_cf_id").val(ui.item.id);
        $("#marketing_source").val(ui.item.marketing_source);
      },
      minLength: 1
    };
    $("#input_marketing_source").autocomplete(source_config);
    // $("#input_lead_source").autocomplete(source_config);
    // if (source_config && source_config.length > 0) {
    //     console.log('myArray is not empty.');
    // }else{
    //     console.log('myArray is empty.');
    // }
  // });  
// };

$("#input_lead_source").autocomplete({
    source: lead,
});
  var lead_config = {
    source: lead_config,
    select: function(event, ui) {

      $("#lead_cf_id").val(ui.item.id);
      $("#lead_source").val(ui.item.lead_source);
    },
    minLength: 1
  };
  $("#input_lead_source").autocomplete(lead_config);
  // $("#input_lead_source").autocomplete(source_config);
  // if (source_config && source_config.length > 0) {
  //     console.log('myArray is not empty.');
  // }else{
  //     console.log('myArray is empty.');
  // }

});

  function valueChanged()
  {    
      // if (document.getElementById('chkboxSource').checked) {
      //     document.getElementById("input_marketing_source").style.display = 'block';
      //     document.getElementById("cbo_marketing_source").style.display = 'none';
      //     $("#is_addSource").val("1");
      //     $("#_source").val("");

      //     // $("#selected_source").val();
      //     $("#source").val("");
      //     // $("#marketing_source option:selected").val("");
      //     // var marketing_source = $("#marketing_source option:selected").val("");
      //     var marketing_source = $("#cbo_marketing_source > #marketing_source").val("");
      //     // change_source();
                    
      // } else {
      //   document.getElementById("input_marketing_source").style.display = 'none';
      //   document.getElementById("cbo_marketing_source").style.display = 'block';
      //   $("#is_addSource").val("0");
      //   // var marketing_source = $("#marketing_source option:selected").val();
      //   var marketing_source = $("#cbo_marketing_source > #marketing_source").val();
      // }
      // // var marketing_source = $("#marketing_source option:selected").val("");
      // // var is_addSource = $("#is_addSource").val("1");
      
      // // alert(is_addSource);
  }

   function change_source(){
        // var source = $("#marketing_source option:selected").val();
        // var _source = $("#cbo_marketing_source > #marketing_source").val();
        // var cf_id = $("#cf_id").val();
        // var is_addSource = $("#is_addSource").val();
        // var src_param = "";
        // // var source1 = document.getElementById("input_marketing_source").val();
        // // $("#_source").val(source);
        // if(cf_id.length>0){
        //   src_param = "&cf_id="+cf_id;
        // }
        // // $("#_source").val(source);
        // // $("#m_source").val(source);
        // // if(is_addSource.value>0){
        // //   console.log("Inpud");
        // // }else{
        // //   console.log("combo");
        // // }
        // // alert(document.getElementById("input_marketing_source").val());
        // console.log(source);
        // location.href = "<?php echo JURI::base(); ?>system-management-vic/lead-listing-vic/lead-updatelist-vic?source="+source+src_param;
        // // location.href = "<?php echo JURI::base(); ?>system-management-vic/lead-listing-vic/lead-vic?source="+source+src_param;
    }


  function showdrop()
  {
       var section=$("#section").val();   // get the value of currently selected section
       $.ajax({
      type:"post",
      dataType:"text",
      data:"section="+section,
      url:"<?php echo JURI::base().'includes/vic/category_vic.php'; ?>",         // page to which the ajax request is passed
      success:function(response)
      {
               $("#category").html(response);   // set the result to category dropdown
       $("#category").show();
      }
  })


  }

  $(function() {
    // $("#cbo_marketing_source > #marketing_source").on('change', function(e) {

    //   // $('#marketing_source').on('change', function(e) {
    //       let source = this.value;

    //       console.log(source);
    //       // other stuff...
    //       // $("#_source").val(source);
    //       // $("#mktg_source").val(source);
    //       // $("#m_source").val(source);
    //       // location.href = "<?php echo JURI::base(); ?>system-management-vic/lead-listing-vic/lead-vic?";
    //       $("#m_source").val(source);
    //       // alert(mktg_source.value);
    //       // your ajax call...
    // });

    // $("#cbo_lead_source > #lead_source").on('change', function(e) {

    //   // $('#marketing_source').on('change', function(e) {
    //       let lead = this.value;
    //       // $("#l_source").val(lead);
    //       console.log(lead);
    //       // other stuff...
    //       // $("#_source").val(source);
    //       // $("#mktg_source").val(source);
    //       // $("#m_source").val(source);
    //       // location.href = "<?php echo JURI::base(); ?>system-management-vic/lead-listing-vic/lead-vic?";
    //       $("#l_source").val(lead);
    //       // alert(mktg_source.value);
    //       // your ajax call...
    // });

  
    $("#input_marketing_source").on('blur', function(e) {  
      let source = this.value;
      var source_cf_id = $("#source_cf_id").val();
      // var marketing_source = $("#marketing_source option:selected").val("");
      $("#m_source").val(source);
      $("#cbo_marketing_source > #marketing_source").val(source);
      $("#source").val(source);
      console.log(source);
      if(source_cf_id.length>0){
        src_param = "&cf_id="+source_cf_id;
      }
      // location.href = "<?php echo JURI::base(); ?>system-management-vic/lead-listing-vic/lead-updatelist-vic?source="+source+src_param;
    });

    $("#input_lead_source").on('blur', function(e) {  
      let lead = this.value;
      // var cf_id = $("#cf_id").val();
      // var marketing_source = $("#marketing_source option:selected").val("");
      var lead_cf_id = $("#lead_cf_id").val();
      $("#l_source").val(lead);
      $("#cbo_lead_source > #mlead_source").val(lead);
      $("#lead").val(lead);
      console.log(lead);
      if(lead_cf_id.length>0){
        src_param = "&cf_id="+lead_cf_id;
      }
      // location.href = "<?php echo JURI::base(); ?>system-management-vic/lead-listing-vic/lead-updatelist-vic?source="+source+src_param;
    });    

    $("#chkboxSource").on('change', function(e) {    
      // let is_addSource = this.checked;
      let is_addSource = document.getElementById('chkboxSource').checked
      console.log(is_addSource); 
      if (document.getElementById('chkboxSource').checked) {
          document.getElementById("input_marketing_source").style.display = 'block';
          document.getElementById("cbo_marketing_source").style.display = 'none';
          $("#is_addSource").val("1");
          // var marketing_source = $("#cbo_marketing_source > #marketing_source").val("");                    
      } else {
        document.getElementById("input_marketing_source").style.display = 'none';
        document.getElementById("cbo_marketing_source").style.display = 'block';
        $("#is_addSource").val("0");
        // var marketing_source = $("#cbo_marketing_source > #marketing_source").val();
      }
    });


    $("#chkboxLead").on('change', function(e) {    
      // let is_addLead = this.checked;
      let is_addLead = document.getElementById('chkboxLead').checked
      console.log(is_addLead); 
      if (document.getElementById('chkboxLead').checked) {
          document.getElementById("input_lead_source").style.display = 'block';
          document.getElementById("cbo_lead_source").style.display = 'none';
          $("#is_addLead").val("1");
          // var lead_source = $("#cbo_lead_source > #lead_source").val("");
      } else {
        document.getElementById("input_lead_source").style.display = 'none';
        document.getElementById("cbo_lead_source").style.display = 'block';
        $("#is_addLead").val("0");
        // var lead_source = $("#cbo_lead_source > #lead_source").val();
      }
    });

    $("#cbo_marketing_source > #marketing_source").on('change', function(e) {    
      let source = this.value;
      // var source = $("#marketing_source option:selected").val();
      // var source = $("#cbo_marketing_source > #marketing_source").val();
      // var _source = $("#cbo_marketing_source > #marketing_source").val();
      // var cf_id = $("#cf_id").val();
      var source_cf_id = $("#source_cf_id").val();
      var is_addSource = $("#is_addSource").val();
      var src_param = "";
      // var source1 = document.getElementById("input_marketing_source").val();
      // $("#_source").val(source);
      if(source_cf_id.length>0){
        src_param = "&cf_id="+source_cf_id;
      }
      $("#_source").val(source);
      $("#m_source").val(source);

      $("#selected_source").val(source);
      $("#input_marketing_source").val(source);
      $("#Marketing_Source").val(source);       
      $("#source").val(source);
      // if(is_addSource.value>0){
      //   console.log("Inpud");
      // }else{
      //   console.log("combo");
      // }
      // alert(document.getElementById("input_marketing_source").val());
      console.log(source);
      // location.href = "<?php echo JURI::base(); ?>system-management-vic/lead-listing-vic/lead-updatelist-vic?source="+source+src_param;
    });

    $("#cbo_lead_source > #lead_source").on('change', function(e) {  
    let lead = this.value;  
      // var lead = $("#lead_source option:selected").val();
      // var lead = $("#cbo_lead_source > #lead_source").val();
      // var _lead = $("#cbo_lead_source > #lead_source").val();
      var lead_cf_id = $("#lead_cf_id").val();
      var is_addLead = $("#is_addLead").val();
      var src_param = "";
      // var source1 = document.getElementById("input_lead_source").val();
      // $("#_source").val(source);
      if(lead_cf_id.length>0){
        src_param = "&cf_id="+lead_cf_id;
      }
      $("#_lead").val(lead);
      $("#l_source").val(lead);
      // if(is_addSource.value>0){
      //   console.log("Inpud");
      // }else{
      //   console.log("combo");
      // }
      // alert(document.getElementById("input_lead_source").val());
      console.log(lead);
      // location.href = "<?php echo JURI::base(); ?>system-management-vic/lead-listing-vic/lead-updatelist-vic?lead="+lead+src_param;
    });
});

  </script>  