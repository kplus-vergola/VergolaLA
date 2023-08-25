<?php  
$db = JFactory::getDbo();
$id =$_REQUEST['cf_id'];

$result = mysql_query("SELECT * FROM ver_chronoforms_data_lead_vic WHERE cf_id  = '$id'");
$retrieve = mysql_fetch_array($result);
if (!$result) 
    {
    die("Error: Data not found..");
    }
  $Marketing_Source=$retrieve['marketing_source'];
  $Lead=$retrieve['lead'];


if(isset($_POST['save']))
{ 
  $Marketing_Source_save = $_POST['marketing_source'];
  $Lead_save = $_POST['lead'];



  mysql_query("UPDATE ver_chronoforms_data_lead_vic SET marketing_source ='$Marketing_Source_save', lead ='$Lead_save' WHERE cf_id = '$id'")
        or die(mysql_error()); 
  echo "Saved!";
  
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

$cbo_marketing_source = "<select name=\"marketing_source\" style='width:100%; padding:0px'><option value=''>Select Marketing Source</option>"; 
$querysub="SELECT * FROM ver_chronoforms_data_lead_vic WHERE marketing_source != '' GROUP BY marketing_source ORDER BY marketing_source ASC";
      $resultsub = mysql_query($querysub);
        if(!$resultsub){die ("Could not query the database: <br />" . mysql_error()); }            
      while ($data=mysql_fetch_assoc($resultsub)){  
        // $cbo_marketing_source .= "<option value = \"".addslashes($data['marketing_source'])."\">{$data['marketing_source']}</option>";
        // $cbo_marketing_source .= "<option value = \"".addslashes($data['marketing_source'])."\" selected>{$data['marketing_source']}</option>";
        if($data['marketing_source']==$Marketing_Source){ 
          $cbo_marketing_source .= "<option value = \"".addslashes($data['marketing_source'])."\" selected>{$data['marketing_source']}</option>";
        }else{
          $cbo_marketing_source .= "<option value = \"".addslashes($data['marketing_source'])."\">{$data['marketing_source']}</option>";
        } 
      }
$cbo_marketing_source .= "</select>"; 
?>
<form method="post">
<table class="update-table" style="width: 50%;">
  <tr>
    <td class="row1" >Marketing Source :</td>
    <td class="" style="width: 20%;"><?php echo $cbo_marketing_source; ?></td>
    <td class="row1">Lead :</td>
    <td class=""><input style="width: 100%;" type="text" name="lead" value="<?php echo $Lead ?>"/></td>
  </tr>
  
  <tr>
    <td class="row1">&nbsp;</td>
    <td class="">&nbsp;</td>
    <td class="">&nbsp;</td>
    <td class="row2"><input type="submit" name="save" value="Save" class="update-btn" /> <input type="submit" name="delete" value="Delete" class="update-btn" /> <input type="submit" name="cancel" value="Cancel" class="update-btn" /></td>
  </tr>
</table>