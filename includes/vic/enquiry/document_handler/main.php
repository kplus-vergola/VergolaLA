<?php
set_time_limit(3600);


/*
----- ----- ----- ----- ----- ----- ----- ----- ----- -----
----- include files -----
----- ----- ----- ----- ----- ----- ----- ----- ----- -----
*/
include('functions_general.php');
include('functions_module.php');
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
                $login_user_info = getLoginUserInfo($db_connection, $sql_template_retrieve_current_login_user_info, $api_data['username'], $api_data['password']);
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
                            if (isset($_REQUEST['return_url']) && strlen($_REQUEST['return_url']) > 0) {
                                header('Location: ' . $_REQUEST['return_url']);
                                exit;
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

    $document_handler_form_system_info['base_url'] = $config['path']['base_url'];
    $document_handler_form_system_info['script_url'] = $config['path']['script_url'];

    // ----- check login user access info -----
    $current_user_info = JFactory::getUser();
    if (isset($current_user_info->username) && isset($current_user_info->password)) {
        $credential_info = array();
        $credential_info['username'] = $current_user_info->username;
        $credential_info['password'] = $current_user_info->password;
    } elseif (isset($_REQUEST['username']) && isset($_REQUEST['password'])) {
        $credential_info = array();
        $credential_info['username'] = $_REQUEST['username'];
        $credential_info['password'] = $_REQUEST['password'];
    } else {
        $credential_info = null;
    }

    if (is_array($credential_info)) {
        $login_user_info = getLoginUserInfo($db_connection, $sql_template_retrieve_current_login_user_info, $credential_info['username'], $credential_info['password']);
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

    $document_handler_form_system_info['module'] = '';
    if (isset($_REQUEST['module'])) {
        $document_handler_form_system_info['module'] = $_REQUEST['module'];
    }

    if ($document_handler_form_system_info['access_mode'] == 'entity_view') {
        $sql = str_replace(
            array(
                '[MODULE]', 
            ), 
            array(
                    addslashes($document_handler_form_system_info['module']), 
            ), 
            $sql_template_retrieve_entity_list
        );

        $document_handler_form_entity_list = getResultsetInJson($sql, $db_connection);
    }


    $login_user_info_in_json = json_encode($login_user_info);
    $document_handler_form_system_info_in_json = json_encode($document_handler_form_system_info);


    $default_entity_id = 'null';
    if (isset($_REQUEST['default_entity_id'])) {
        $default_entity_id = $_REQUEST['default_entity_id'];
    }

    $default_folder_id = 'null';
    if (isset($_REQUEST['default_folder_id'])) {
        $default_folder_id = $_REQUEST['default_folder_id'];
    }

    $default_file_id = 'null';
    if (isset($_REQUEST['default_file_id'])) {
        $default_file_id = $_REQUEST['default_file_id'];
    }

    $default_content_category = 'null';
    if (isset($_REQUEST['default_content_category'])) {
        $default_content_category = $_REQUEST['default_content_category'];
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
    include($config['document_handler']['form']['file_name']);
}


if (count($config) > 0) {
    if ($db_connection) {
        mysql_close($db_connection);
    }
}
?>