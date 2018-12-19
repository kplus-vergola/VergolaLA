<?php
function getLoginUserInfo($db_connection, $sql_template_retrieve_current_login_user_info, $username) {
    $login_user_info = array();

    $sql = str_replace(
        array(
            '[USER_REF_COLUMN_NAME]', 
            '[USER_REF_COLUMN_VALUE]'
        ), 
        array(
            'username', 
            addslashes($username)
        ), 
        $sql_template_retrieve_current_login_user_info
    );

    $results = executeDbQuery($sql, $db_connection);
    if ($results['error'] == 'null') {
        $r1 = mysql_fetch_array($results['data']);
        $login_user_info['username'] = $r1['username'];
        $login_user_info['user_id'] = $r1['user_id'];
        $login_user_info['user_group_id'] = $r1['user_group_id'];
        $login_user_info['user_group_group_name'] = $r1['user_group_group_name'];
        $login_user_info['employee_id'] = $r1['employee_id'];
        $login_user_info['employee_first_name'] = $r1['employee_first_name'];
        $login_user_info['employee_last_name'] = $r1['employee_last_name'];
    }

    return $login_user_info;
}
?>