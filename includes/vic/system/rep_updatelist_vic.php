<?php
include 'includes/vic/custom_processes_user.php';
?>


<link rel="stylesheet" type="text/css" media="screen,projection" href="<?php echo JURI::base().'jscript/jquery-ui-1.11.4/jquery-ui.min.css'; ?>" />
<link rel="stylesheet" type="text/css" media="screen,projection" href="<?php echo JURI::base().'jscript/jquery-ui-1.11.4/jquery-ui.theme.min.css'; ?>" />
<link rel="stylesheet" type="text/css" media="screen,projection" href="<?php echo JURI::base().'jscript/new-enquiry.css'; ?>" />
<link rel="stylesheet" type="text/css" media="screen,projection" href="<?php echo JURI::base().'jscript/client-folder.css'; ?>" />


<script src="<?php echo JURI::base().'jscript/jquery-ui-1.11.4/jquery.js'; ?>"></script>
<script src="<?php echo JURI::base().'jscript/jquery-ui-1.11.4/jquery-ui.min.js'; ?>"></script>
<script src="<?php echo JURI::base().'jscript/jquery-dateFormat.min.js'; ?>"></script>


<?php
$db = JFactory::getDbo();
if(isset($_REQUEST['id'])){
    $id =$_REQUEST['id'];
}else if(isset($_POST['id'])){
    $id =$_POST['id'];
}else{
    $id = 0;
}

$notification = "";

$result = mysql_query("SELECT * FROM ver_users WHERE id  = '$id'");
$retrieve = mysql_fetch_array($result);
if (!$result)
{
    die("Error: Data not found..");
}
    $Name=$retrieve['name'] ;
    $Username=$retrieve['username'] ;
    $Email=$retrieve['email'] ;
    $Password=$retrieve['password'] ;
    $Block=$retrieve['block'] ;
    $Phone=$retrieve['phone'] ;
    $Mobile=$retrieve['mobile'] ;
    $ABN=$retrieve['abn'] ;
    $RepID=$retrieve['RepID'] ;


if(isset($_POST['save']))
{
    $name_save = $_POST['name'];
    $username_save = $_POST['username'];
    $Username=$retrieve['username'] ;
    $email_save = $_POST['email'];
    $Email=$retrieve['email'] ;
    $usergroup_id=$_POST['usergroup_id'];
    $new_password=$_POST['password'];
    $block=$_POST['block'];
    $phone=$_POST['phone'];
    $mobile=$_POST['mobile'];
    $abn=$_POST['abn'];

 	//error_log($query, 3,'C:\\xampp\htdocs\\vergola_contract_system_v4_us\\my-error.log');

    //$query = "SELECT * FROM ver_users WHERE ((username = '$username_save') OR (email = '$email_save'))";
    //$select_result = mysql_query($query);

    // if (!mysql_num_rows($select_result) )
    // {
    //     $query = "UPDATE ver_users SET name ='$name_save', username ='$username_save', password ='$password', email ='$email_save' WHERE id = '$id'";
    //     $insert_result = mysql_query($query);

    //     $sql = "UPDATE ver_user_usergroup_map SET group_id = {$usergroup_id} WHERE user_id={$id} ";
    //     //error_log($sql, 3,'C:\\xampp\htdocs\\vergola_contract_system_v4_us\\my-error.log'); //
    //     $insert_result = mysql_query($sql);
    //     $notification = "Successfully saved..";
    //     //header("Location:'.JURI::base().'system-management-vic/rep-listing-vic");
    // }
    // else
    // {
       //$row = mysql_fetch_assoc($select_result);
    if ($new_password != $Password) {
       		$pw = md5($new_password);
       	}else{
       		$pw = $Password;
       	}

            $query = "UPDATE ver_users SET name ='$name_save', username ='$username_save', password ='$pw', email ='$email_save', block={$block}, phone='{$phone}', mobile='{$mobile}', abn='{$abn}'  WHERE id = '$id'";
            $insert_result = mysql_query($query);

            error_log($query, 3,'C:\\xampp\htdocs\\vergola_contract_system_v4_us\\my-error.log');
             $sql = "UPDATE ver_user_usergroup_map SET group_id = {$usergroup_id} WHERE user_id={$id} ";
             $notification = "Successfully saved..";
            //error_log($query, 3,'C:\\xampp\htdocs\\vergola_contract_system_v4_us\\my-error.log'); //
        	$insert_result = mysql_query($sql);
        	$notification = "Successfully saved..";


    //retrieve data again..
    $result = mysql_query("SELECT * FROM ver_users WHERE id  = '$id'");
    $retrieve = mysql_fetch_array($result);

        $Name=$retrieve['name'] ;
        $Username=$retrieve['username'] ;
        $Email=$retrieve['email'] ;
        $Password=$retrieve['password'] ;
        $Block=$retrieve['block'] ;
        $Phone=$retrieve['phone'] ;
        $Mobile=$retrieve['mobile'] ;
        $ABN=$retrieve['abn'] ;
        $RepID=$retrieve['RepID'] ;
            //header("Location:'.JURI::base().'system-management-vic/rep-listing-vic");
   // }else{
   // 		$notification = "Error while saving..";
   // }

     //   elseif ($row['username']==$username_save){
        //    $username_save = $row['username'];
     //       echo "Username Already Exist";
     //   }


        // elseif ($row['email']==$email_save){
        //    $email_save = $row['email'];
     //       echo "Duplicate Email";
     //   }

    //}




//return $username_save;


}

if(isset($_POST['save_sales_target']) || isset($_POST['save']))
{
    $id =mysql_real_escape_string($_POST['rep_id']);

    $qResult = mysql_query("SELECT * FROM ver_users WHERE RepID  = '$id'");
    $user = mysql_fetch_assoc($qResult);
    //print_r($user);return;

    $year = substr($_POST['dFrom'], 0,4);
    //echo $year; return;
    $queryn = "DELETE FROM ver_rep_sales_target WHERE rep_id='{$user['RepID']}' AND year = {$year}";
    mysql_query($queryn) or trigger_error("Insert failed: " . mysql_error());
    //error_log($queryn, 3,'C:\\xampp\htdocs\\vergola_contract_system_v4_us\\my-error.log');
    $nMonth = count($_POST["target_date"]);
    //echo $nMonth;return;

    $dFrom = mysql_real_escape_string($_POST['dFrom']);//convertToMysqlDate($_POST['dFrom']);
    $dTo = mysql_real_escape_string($_POST['dTo']);
    $year = substr($dFrom, 0,4);
    //echo $year; return;
    $dateFromTo = $dFrom ." - ".$dTo;
    //echo $dateFromTo;return;
    for ($i=0; $i<$nMonth; $i++) {

        //echo "('".$user["RepID"]."'," . mysql_real_escape_string($_POST['target_amount'][$i]) . ", '" . mysql_real_escape_string($_POST['target_date'][$i]) . "','{$dateFromTo}')";
        $insertArr[] = "('".$user["RepID"]."','" . mysql_real_escape_string($_POST['target_amount'][$i]) . "','" . mysql_real_escape_string($_POST['target_contract'][$i]) . "', '" . mysql_real_escape_string($_POST['target_date'][$i]) . "','{$dateFromTo}', {$year})";

    }
    //echo implode(", ", $insertArr);return;

    $queryn = "INSERT INTO ver_rep_sales_target (rep_id, target_amount, target_contract, target_date, dateFromTo, year) VALUES " . implode(", ", $insertArr);
 	//error_log($queryn, 3,'C:\\xampp\htdocs\\vergola_contract_system_v4_us\\my-error.log'); // exit();
 	mysql_query($queryn) or trigger_error("Insert failed: " . mysql_error());
 	$notification = "Successfully saved..";
}


if(isset($_POST['update_sales_target']))
{
    $id =mysql_real_escape_string($_POST['rep_id']);

    $qResult = mysql_query("SELECT * FROM ver_users WHERE RepID  = '$id'");
    $user = mysql_fetch_assoc($qResult);
    //print_r($user);return;
    $year = substr($_POST['dFrom'], 0,4);
    //echo $year; return;
    $queryn = "DELETE FROM ver_rep_sales_target WHERE rep_id='{$user['RepID']}' AND year = {$year}";
 	//error_log($queryn, 3,'C:\\xampp\htdocs\\vergola_contract_system_v4_us\\my-error.log'); // exit();
 	mysql_query($queryn);// or trigger_error("Insert failed: " . mysql_error());

    //print_r($user);return;

    $nMonth = count($_POST["target_date"]);
    //echo $nMonth;return;

    $dFrom = mysql_real_escape_string($_POST['dFrom']);//convertToMysqlDate($_POST['dFrom']);
    $dTo = mysql_real_escape_string($_POST['dTo']);//convertToMysqlDate($_POST['dTo']);

    $dateFromTo = $dFrom ." - ".$dTo;
    //echo $dateFromTo;return;
    for ($i=0; $i<$nMonth; $i++) {

        //echo "('".$user["RepID"]."'," . mysql_real_escape_string($_POST['target_amount'][$i]) . ", '" . mysql_real_escape_string($_POST['target_date'][$i]) . "','{$dateFromTo}')";
        $insertArr[] = "('".$user["RepID"]."','" . mysql_real_escape_string($_POST['target_amount'][$i]) . "','" . mysql_real_escape_string($_POST['target_contract'][$i]) . "', '" . mysql_real_escape_string($_POST['target_date'][$i]) . "','{$dateFromTo}', {$year})";

    }
    //echo implode(", ", $insertArr);return;

    $queryn = "INSERT INTO ver_rep_sales_target (rep_id, target_amount, target_contract, target_date, dateFromTo, year) VALUES " . implode(", ", $insertArr);
 	//error_log($queryn, 3,'C:\\xampp\htdocs\\vergola_contract_system_v4_us\\my-error.log'); // exit();
 	mysql_query($queryn) or trigger_error("Insert failed: " . mysql_error());
 	$notification = "Successfully saved..";
}

//Reinitialize the id because it is being used in different way while saving post.
if(isset($_REQUEST['id'])){
    $id =$_REQUEST['id'];
}else if(isset($_POST['id'])){
    $id =$_POST['id'];
}else{
    $id = 0;
}

function convertToMysqlDate($iDate){

    if(HOST_SERVER=="LA"){
        //given if the input is dd/MM/yy
        return substr($iDate,6,4)."-".substr($iDate,3,2)."-".substr($iDate,0,2);
    }else{
        //given if the input is MM/dd/yy
        return substr($iDate,6,4)."-".substr($iDate,0,2)."-".substr($iDate,3,2);
    }


}

if(isset($_POST['delete']))
{

    mysql_query("UPDATE ver_users SET status = 'deleted' WHERE id = '$id'")
                or die(mysql_error());
    echo "Deleted";

    header("Location:".JURI::base()."system-management-vic/rep-listing-vic");
}

if(isset($_POST['cancel']))
{
    header("Location: index.php");
}

if (isset($_POST['view_sales_target'])) {
    // Get the current URL
    $current_url = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

    // Get form values
    $dFrom = isset($_POST['dFrom']) ? $_POST['dFrom'] : '';
    $dTo = isset($_POST['dTo']) ? $_POST['dTo'] : '';

    // Parse the URL
    $url_parts = parse_url($current_url);

    // Handle missing query key safely for older PHP
    $query_string = isset($url_parts['query']) ? $url_parts['query'] : '';
    parse_str($query_string, $query_params);

    // Add/modify parameters
    $query_params['dFrom'] = $dFrom;
    $query_params['dTo'] = $dTo;

    // Build the query string
    $new_query = http_build_query($query_params);

    // Handle port
    $host_with_port = $url_parts['host'];
    if (isset($url_parts['port'])) {
        $host_with_port .= ':' . $url_parts['port'];
    }

    // Rebuild the URL
    $new_url = $url_parts['scheme'] . '://' . $host_with_port . $url_parts['path'] . '?' . $new_query;

    // Redirect
    header("Location: $new_url");
    exit();
}

?>

<form method="post">
<div style="width:500px; font-size:12px; float: left;">
    <?php
        if(strlen($notification)>0)
        {
            echo set_notification($notification);
        }

    function set_notification($msg){
        return "<div class='notification_result'>{$msg}</div>";
    }
    ?>
    <table class="update-table">
        <tr>
            <td class="row1">Name</td>
            <td class="row2"><input type="text" name="name" value="<?php echo $Name ?>"/></td>
        </tr>
        <tr>
            <td class="row1">Username</td>
            <td class="row2"><input type="text" name="username" value="<?php echo $Username ?>"/></td>
        </tr>
        <tr>
            <td class="row1">Email</td>
            <td class="row2"><input type="text" name="email" value="<?php echo $Email ?>"/></td>
        </tr>
        <tr>
            <td class="row1">Password</td>
            <td class="row2"><input type="password" name="password" value="<?php echo $Password ?>"/></td>
        </tr>
        <tr>
            <td class="row1">Suspend</td>
            <!--
            <td class="row2"><input type="text" name="block" value="<?php echo $Block ?>"/></td>
            -->
            <td class="row1" >
                <select name='block' style="width: 60px;">
                    <option value='0'  <?php echo ($Block=="0" ? "selected":""); ?> >No</option>
                    <option value='1'  <?php echo ($Block=="1" ? "selected":""); ?>  >Yes</option>
                </select>
            </td>
        </tr>
        <tr>
            <td class="row1">Phone</td>
            <td class="row2"><input type="text" name="phone" value="<?php echo $Phone ?>"/></td>
        </tr>
        <tr>
            <td class="row1">Mobile</td>
            <td class="row2"><input type="text" name="mobile" value="<?php echo $Mobile ?>"/></td>
        </tr>
        <tr>
            <td class="row1">ABN</td>
            <td class="row2"><input type="text" name="abn" value="<?php echo $ABN ?>"/></td>
        </tr>
        <tr>
            <td class="row1">RepID</td>
            <td class="row2"><input type="text" name="repid" value="<?php echo $RepID ?>" readonly  disabled/></td>
        </tr>

        <?php
            //error_log($id, 3,'C:\\xampp\htdocs\\vergola_contract_system_v4_us\\my-error.log');
            $user =& JFactory::getUser();
            $sel_user =& JFactory::getUser($id);
           	$cbo_rep_type = "";

     		//$group &= $user['groups'];

            if($user->groups['10']==10 || $user->groups['29']==29){
                /*
                $cbo_rep_type = "
                        <select name='usergroup_id'>
                            <option value='9' ".(isset($sel_user->groups['9']) ? "selected":"").">User</option>
                            <option value='10' ".(isset($sel_user->groups['10']) ? "selected":"")."  >Admin</option>
                            <option value='26' ".(isset($sel_user->groups['26']) ? "selected":"")." >Office</option>
                            <option value='27' ".(isset($sel_user->groups['27']) ? "selected":"")." >Manager</option>

                        </select>
                ";
                */
                $cbo_rep_type = '<select name="usergroup_id">';
                foreach ($custom_configs_user['user_groups'] as $key1 => $value1) {
                    $append_option = true;
                    if ($key1 == '10' && $key1 != $current_signed_in_user_group_key) {
                        $append_option = false;
                    }
                    if ($append_option == true) {
                        $selected = '';
                        if (isset($sel_user->groups[$key1])) {
                            $selected = 'selected';
                        }
                        $cbo_rep_type .= '<option value="' . $key1 . '" ' . $selected . '>' . $value1 . '</option>';
                    }
                }
                $cbo_rep_type .= '</select>';
        ?>
            <tr>
                <td class="row1">Usergroup </td>
                <td class="row2"><?php echo $cbo_rep_type ?></td>
            </tr>

        <?php

            }

        ?>


        <tr>
            <td class="row1">&nbsp;</td>
            <td class="row2"><input type="submit" name="save" value="Save" class="update-btn" /> <input type="submit" name="delete" value="Delete" class="update-btn" /> <input type="button"   value="Cancel" class="update-btn" onclick="location.href='<?php echo JURI::base(); ?>system-management-vic/rep-listing-vic'" /></td>
        </tr>
    </table>
</div>

<div style="width:500px; font-size:12px; float: left; position: relative; left: 50px;">
    <input type="hidden" name="rep_id" value="<?php echo $RepID ?>" />
    <input type="hidden" name="id" value="<?php echo $id ?>" />
    <table id="tblSalesTarget" class="update-table">
        <tr>
            <td class="row1" width="200">Target sales from</td>
            <td class="row2" width="200" colspan="2">
            <?php
                $dFrom = null;
                $dTo = null;
                $year = null;
                $year2 = null;

                if(isset($_GET['dFrom']) && isset($_GET['dTo'])){
                    $dFrom = $_GET['dFrom'];
                    $dTo = $_GET['dTo'];
                    $year = date('Y', strtotime($dFrom));
                    $year2 = date('Y', strtotime($dTo));
                }

                $qResult = mysql_query("SELECT * FROM ver_rep_sales_target WHERE rep_id='$RepID' AND year={$year}");
                $r = mysql_fetch_assoc($qResult);

                if(mysql_num_rows($qResult) < 1){
                    $qResult = mysql_query("SELECT * FROM ver_rep_sales_target WHERE rep_id='Default Target' AND year={$year}");
                    $r = mysql_fetch_assoc($qResult);
                }

                if(!isset($_GET['dFrom']) && !isset($_GET['dTo'])){
                    $dFrom = substr($r['dateFromTo'], 0,10);
                    $dTo = substr($r['dateFromTo'], -10,10);
                }

                if (strlen($dFrom) == 0 || strlen($dTo) == 0) {
                    $dFrom = date('Y') . '-01-01';
                    $endOfYear = new DateTime('last day of December ' . date('Y'));
                    $dTo = $endOfYear->format('Y-m-d');
                }

                $formatFrom = date_format(date_create($dFrom), PHP_DFORMAT);
                $formatTo = date_format(date_create($dTo), PHP_DFORMAT);
            ?>
                <input type="hidden" value="<?php echo $dFrom; ?>" name="dFrom" id="dFrom"  />
                <input type="hidden" value="<?php echo $dTo; ?>" name="dTo" id="dTo"/>
                <input type="text" value="<?php echo $formatFrom; ?>" class="datepicker" style="display: inline;width:150px; " id="dpFrom" >        
                
                <b>to :</b> &nbsp;&nbsp;&nbsp;&nbsp;
                <input type="text" value="<?php echo $formatTo; ?>" class="datepicker" style="display: inline;width:150px; "  id="dpTo" >       
                <!-- <input type="button" name="" value="Create" class="" onclick="createMonthFields();" style="width:100px; margin-top: 10px;" /> -->
                <input type="submit" name="view_sales_target" value="Open" class="" style="width:100px; margin-top: 10px;" />
            </td>
        </tr>       
        <tr>
            <td class="row1" width="200">&nbsp;</td>
            <td class="row2" width="200">&nbsp;</td>
        </tr>
        <?php
            if(isset($_GET['dFrom']) && isset($_GET['dTo'])){
                // Fetch all data for the year
                $qResult = mysql_query("SELECT * FROM ver_rep_sales_target WHERE rep_id='$RepID' AND (year>={$year} AND year<={$year2})");

                // Store the fetched data in an array indexed by YYYY-MM
                $existingTargets = [];
                while ($r = mysql_fetch_assoc($qResult)) {
                    $monthKey = date('Y-m', strtotime($r['target_date']));
                    $existingTargets[$monthKey] = $r;
                }

                // Start and end of date range
                $start = new DateTime($dFrom);
                $end = new DateTime($dTo);
                $end->modify('first day of next month');

                echo "<tr><th width='200'>Month</th><th width='200' style='text-align:left;'>Sales Target</th><th width='200' style='text-align:left;'>Target Contract</th></tr>";

                while ($start < $end) {
                    $monthKey = $start->format('Y-m');
                    $monthDate = $start->format('Y-m-d');
                    $monthName = $start->format('F');

                    if (isset($existingTargets[$monthKey])) {
                        // Existing data
                        $target = $existingTargets[$monthKey];
                        $targetAmount = $target["target_amount"];
                        $targetContract = $target["target_contract"];
                    } else {
                        // Missing month — insert empty with 0
                        $targetAmount = 0;
                        $targetContract = 0;
                    }

                    echo "<tr>";
                    echo "<td>{$monthName}</td>
                        <td>
                            <input type='hidden' name='target_date[]' value='{$monthDate}' />
                            <input type='text' name='target_amount[]' value='{$targetAmount}' />
                        </td>
                        <td>
                            <input type='text' name='target_contract[]' value='{$targetContract}' />
                        </td>";
                    echo "</tr>";

                    $start->modify('first day of next month');
                }

                // Choose button based on whether any data existed
                if (count($existingTargets) > 0) {
                    echo "<tr>
                            <td>&nbsp;</td>
                            <td><input type='submit' value='Update' style='width:100px; padding:3px;' name='update_sales_target' /></td>
                        </tr>";
                } else {
                    echo "<tr>
                            <td>&nbsp;</td>
                            <td><input type='submit' value='Save' style='width:100px; padding:3px;' name='save_sales_target' /></td>
                        </tr>";
                }
            }
        ?>



    </table>
</div>
</form>

<script type="text/javascript">

$(document).ready(function(){
     //console.log($.format.date("2009-12-18 10:54:50.546", "Test: dd/MM/yyyy"));
      	var dFormat = "dd-M-yy";
        <?php if(HOST_SERVER=="LA"){ ?>
            // dFormat = "M-dd-yy";
            dFormat = "dd-M-yy";
        <?php }else{ ?>
            dFormat = "dd-M-yy";
        <?php } ?>

      	$( ".datepicker" ).datepicker({ dateFormat: dFormat  });
        $( "#dpFrom" ).change(function() {
          $( "#dFrom" ).val($.datepicker.formatDate('yy-mm-dd', $( this ).datepicker('getDate')));
        });

        $( "#dpTo" ).change(function() {
           $( "#dTo" ).val($.datepicker.formatDate('yy-mm-dd', $( this ).datepicker('getDate')));
        });
});


function createMonthFields(){
    $("#tblSalesTarget tr:not(:first)").remove();
    var dFrom = new Date($("#dFrom").val());
    var dTo = new Date($("#dTo").val());
    var dFrom_tz = dFrom.getTimezoneOffset();
    var dTo_tz = dTo.getTimezoneOffset();
    dFrom = dFrom.setMinutes( dFrom.getMinutes() + dFrom_tz );
    dTo = dTo.setMinutes( dTo.getMinutes() + dTo_tz );
    var dFrom_server = new Date($.format.date(dFrom, "yyyy-MM-dd") +"T08:00:00.000Z");
    var dTo_server = new Date($.format.date(dTo, "yyyy-MM-dd") +"T08:00:00.000Z");

    var tr = "<tr><td>&nbsp;</td><td>&nbsp;</td></tr><tr><th>Month</th><th style='text-align:left;'>Sales Target</th><th style='text-align:left;'>Target Contract</th></tr> ";
    //while (dFrom <= dTo)
    for (d=dFrom_server; dFrom_server <= dTo_server; d.setMonth(d.getMonth() + 1))
    {
        tr += "<tr>";
        tr += "<td>"+$.format.date(d, "MMMM")+"</td><td><input type='hidden' name='target_date[]' value='"+$.format.date(d, "yyyy-MM-dd")+"'><input type='text' name='target_amount[]' ></td><td><input type='text' name='target_contract[]' ></td>";
        tr += "</tr>";
    }
    tr += "<tr>";
    tr += "<td> &nbsp; </td><td><input type='submit' value='Save' style='width:100px; padding:3px;' name='save_sales_target' /></td>";
    tr += "</tr>";

    $("#tblSalesTarget").append(tr);
}
</script>


