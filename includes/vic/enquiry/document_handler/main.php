<?php
set_time_limit(3600);


/*
----- ----- ----- ----- ----- ----- ----- ----- ----- -----
----- include files -----
----- ----- ----- ----- ----- ----- ----- ----- ----- -----
*/
include('functions_general.php');
include('functions_module.php');
// include('html_templates.php');
include('sql_templates.php');
require('config_module.php');


/*
----- ----- ----- ----- ----- ----- ----- ----- ----- -----
----- initialise variables -----
----- ----- ----- ----- ----- ----- ----- ----- ----- -----
*/
if (count($config) > 0) {
    $db_connection = mysql_connect(
        $config['db']['host_name'], 
        $config['db']['user_name'], 
        $config['db']['password']
    );
    if ($db_connection) {
        mysql_select_db($config['db']['db_name'], $db_connection);
    }
}


include('functions_module_document_handler.php');


if (isset($_GET['data_migration']) && $_GET['data_migration'] == 'y') {
    include('data_migration.php');
}


$log_contents = '';
$program_begin_date_time = date('Y-m-d H:i:s');


if (isset($_REQUEST['api_mode'])) {
    /*
    ----- ----- ----- ----- ----- ----- ----- ----- ----- -----
    ----- process api access -----
    ----- ----- ----- ----- ----- ----- ----- ----- ----- -----
    */
    $api_response = array();
    $api_response['error'] = array();
    $api_response['message'] = array();
    $api_response['data'] = array();

    if (isset($_REQUEST['api_data'])) {
        $api_data_string = $_REQUEST['api_data'];
        $results = getApiData($api_data_string);
        $api_data_string = $results['api_data_string'];
        $api_data = $results['api_data'];

        if (json_decode($api_data_string, true) == true) {
            if (isset($api_data['username'])) {
                $login_user_info = getLoginUserInfo($db_connection, $sql_template_retrieve_current_login_user_info, $api_data['username']);
                if (isset($login_user_info['user_id'])) {
                    if (isset($api_data['document_handler_form_operation'])) {
                        $valid_operations = array('save', 'retrieve', 'update', 'delete');
                        if (in_array($api_data['document_handler_form_operation'], $valid_operations)) {
                            switch ($api_data['document_handler_form_operation']) {
                                case 'save':
                                    include('script_module_save_data.php');
                                    break;
                                case 'retrieve':
                                    include('script_module_retrieve_data.php');
                                    break;
                                case 'update':
                                    include('script_module_update_data.php');
                                    break;
                                case 'delete':
                                    include('script_module_delete_data.php');
                                    break;
                            }
                        } else {
                            $api_response['error'][] = '30060';
                            $api_response['message'][] = 'Invalid operation';
                            $api_response['data'][] = array();
                        }
                    } else {
                        $api_response['error'][] = '30050';
                        $api_response['message'][] = 'Missing operation';
                        $api_response['data'][] = array();
                    }
                } else {
                    $api_response['error'][] = '30040';
                    $api_response['message'][] = 'Invalid access';
                    $api_response['data'][] = array();
                }
            } else {
                $api_response['error'][] = '30030';
                $api_response['message'][] = 'Missing access key';
                $api_response['data'][] = array();
            }

        } else {
            $api_response['error'][] = '30020';
            $api_response['message'][] = 'Invalid data format';
            $api_response['data'][] = array();
        }
    } else {
        $api_response['error'][] = '30010';
        $api_response['message'][] = 'Empty data';
        $api_response['data'][] = array();
    }

    echo json_encode($api_response);
    exit;
} else {
    /*
    ----- ----- ----- ----- ----- ----- ----- ----- ----- -----
    ----- process normal access -----
    ----- ----- ----- ----- ----- ----- ----- ----- ----- -----
    */


    /*
    ----- ----- ----- ----- ----- ----- ----- ----- ----- -----
    ----- initialise variables -----
    ----- ----- ----- ----- ----- ----- ----- ----- ----- -----
    */
    $app_response = array();
    $app_response['error'] = array();
    $app_response['message'] = array();
    $app_response['data'] = array();
    $document_handler_form_system_info = array();
    $login_user_info = array();

    $document_handler_form_system_info['script_url'] = $config['path']['script_url'];

    // ----- check login user access info -----
    if (isset($_REQUEST['username'])) {
        $login_user_info = getLoginUserInfo($db_connection, $sql_template_retrieve_current_login_user_info, $_REQUEST['username']);
        if (isset($login_user_info['user_id'])) {
            //continue script...
        } else {
            $app_response['error'][] = '30040';
            $app_response['message'][] = 'Invalid access';
            $app_response['data'][] = array();
        }
    } else {
        $app_response['error'][] = '30030';
        $app_response['message'][] = 'Missing access key';
        $app_response['data'][] = array();
    }

    $document_handler_form_system_info['access_mode'] = 'folder_view';
    if (isset($_REQUEST['page_name'])) {
        switch ($_REQUEST['page_name']) {
            case 'entity_view':
                $document_handler_form_system_info['access_mode'] = 'entity_view';
                break;
            case 'folder_view':
                $document_handler_form_system_info['access_mode'] = 'folder_view';
                break;
        }
    }

    // simulated
    $document_handler_form_system_info['access_mode'] = 'entity_view';
    $document_handler_form_entity_list = '[]';
    if ($document_handler_form_system_info['access_mode'] == 'entity_view') {
        $sql = str_replace(
            array(
            ), 
            array(
            ), 
            $sql_template_retrieve_entity_list
        );
        $document_handler_form_entity_list = getResultsetInJson($sql, $db_connection);
    }


    $login_user_info_in_json = json_encode($login_user_info);
    $document_handler_form_system_info_in_json = json_encode($document_handler_form_system_info);

    $default_entity_id = '';
    if (isset($_REQUEST['pid'])) {
        $default_entity_code = 'CRC' . $_REQUEST['pid'];
        $sql = str_replace(
            array(
                '[CLIENT_ID]'
            ), 
            array(
                $default_entity_code
            ), 
            $sql_template_retrieve_default_entity_id
        );

        $results = executeDbQuery($sql, $db_connection);
        if ($results['error'] == 'null') {
            $r1 = mysql_fetch_array($results['data']);
            $default_entity_id = $r1['id'];
        }
    }

    $debug_mode_enabled = 'n';
    if (isset($_REQUEST['dbme']) && $_REQUEST['dbme'] == 'y') {
        $debug_mode_enabled = 'y';
    }


    /*
    ----- ----- ----- ----- ----- ----- ----- ----- ----- -----
    ----- html form -----
    ----- ----- ----- ----- ----- ----- ----- ----- ----- -----
    */
    include('form_document_handler.php');
}


if (count($config) > 0) {
    if ($db_connection) {
        mysql_close($db_connection);
    }
}
?>