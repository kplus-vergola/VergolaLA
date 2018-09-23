<?php
include 'includes/vic/custom_processes_user.php';

$current_signed_in_user_access_profiles = $custom_configs_user['user_access_profiles'][$current_signed_in_user_group_key]['add-quote-vic'];
if (isset($_GET['page_name']) && $_GET['page_name'] == 'quote_edit') {
    $current_signed_in_user_access_profiles = $custom_configs_user['user_access_profiles'][$current_signed_in_user_group_key]['add-quote-vic > quote_edit'];
}
?>


<?php
include 'vr_forms_la/main.php';
?>
