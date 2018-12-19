<?php
/*
----- ----- ----- ----- ----- ----- ----- ----- ----- -----
----- initialise variables -----
----- ----- ----- ----- ----- ----- ----- ----- ----- -----
*/
$enable_retrieve = array(
    'enquiry_user_info' => false, 
    'enquiry_folder_list' => false, 
    'folder_file_list' => false, 
    'file_download' => false
);
if (isset($api_data['access_mode'])) {
    switch ($api_data['access_mode']) {
        case 'enquiry_user_info':
            $enable_retrieve['enquiry_user_info'] = true;
            break;
        case 'enquiry_folder_list':
            $enable_retrieve['enquiry_folder_list'] = true;
            break;
        case 'folder_file_list':
            $enable_retrieve['folder_file_list'] = true;
            break;
        case 'file_download':
            $enable_retrieve['file_download'] = true;
            break;
        case 'msword_plugin_download':
            $enable_retrieve['msword_plugin_download'] = true;
            break;
    }
}


$document_handler_form_selected_enquiry_user_info = array();
$document_handler_form_enquiry_folder_list = array();
$document_handler_form_folder_file_list = array();


/*
----- ----- ----- ----- ----- ----- ----- ----- ----- -----
----- retrieve enquiry_user_info -----
----- ----- ----- ----- ----- ----- ----- ----- ----- -----
*/
$sql = '';
$results_retrieve_data['enquiry_user_info']['is_success'] = true;
$results_retrieve_data['enquiry_user_info']['total_record'] = 0;

if ($enable_retrieve['enquiry_user_info'] == true) {
    $sql = str_replace(
        array(
            '[CLIENT_ID]'
        ), 
        array(
            $api_data['entity_id']
        ), 
        $sql_template_retrieve_selected_entity_user_info
    );

    $results = executeDbQuery($sql, $db_connection);
    if ($results['error'] == 'null') {
        $results_retrieve_data['enquiry_user_info']['is_success'] = true;

        $r1 = mysql_fetch_array($results['data']);
        $document_handler_form_selected_enquiry_user_info['employee_id'] = $r1['employee_id'];
        $document_handler_form_selected_enquiry_user_info['employee_first_name'] = $r1['employee_first_name'];
        $document_handler_form_selected_enquiry_user_info['employee_last_name'] = $r1['employee_last_name'];
        $document_handler_form_selected_enquiry_user_info['user_id'] = $r1['user_id'];
        $document_handler_form_selected_enquiry_user_info['user_group_id'] = $r1['user_group_id'];
        $document_handler_form_selected_enquiry_user_info['user_group_group_name'] = $r1['user_group_group_name'];
    }
}


/*
----- ----- ----- ----- ----- ----- ----- ----- ----- -----
----- retrieve enquiry_folder_list -----
----- ----- ----- ----- ----- ----- ----- ----- ----- -----
*/
$sql = '';
$results_retrieve_data['enquiry_folder_list']['is_success'] = true;
$results_retrieve_data['enquiry_folder_list']['total_record'] = 0;

if ($enable_retrieve['enquiry_folder_list'] == true) {
    $sql = str_replace(
        array(
            '[ENTITY_REF_ID]'
        ), 
        array(
            $api_data['enquiry_id']
        ), 
        $sql_template_retrieve_entity_folder_list
    );
// print_r($sql); exit;

    $results = executeDbQuery($sql, $db_connection);
    if ($results['error'] == 'null') {
        $results_retrieve_data['enquiry_folder_list']['is_success'] = true;

        while ($r1 = mysql_fetch_array($results['data'])) {
            $current_item_index = count($document_handler_form_enquiry_folder_list);

            $document_handler_form_enquiry_folder_list[$current_item_index]['folder_id'] = $r1['folder_id'];
            $document_handler_form_enquiry_folder_list[$current_item_index]['folder_name'] = $r1['folder_name'];
            $document_handler_form_enquiry_folder_list[$current_item_index]['folder_description'] = $r1['folder_description'];
            $document_handler_form_enquiry_folder_list[$current_item_index]['folder_summary'] = $r1['folder_summary'];
            $document_handler_form_enquiry_folder_list[$current_item_index]['folder_date_created'] = $r1['folder_date_created'];

            $sql = str_replace(
                array(
                    '[FOLDER_ID]' 
                ), 
                array(
                    $r1['folder_id']
                ), 
                $sql_template_retrieve_folder_entity_list
            );

            $current_folder_entity_list = array();

            $results2 = executeDbQuery($sql, $db_connection);
            if ($results2['error'] == 'null') {
                while ($r2 = mysql_fetch_array($results2['data'])) {
                    $current_item_index2 = count($current_folder_entity_list);
                    $current_folder_entity_list[$current_item_index2]['entity_id'] = $r2['entity_id'];
                    $current_folder_entity_list[$current_item_index2]['entity_entity_code'] = $r2['entity_entity_code'];
                    $current_folder_entity_list[$current_item_index2]['entity_details'] = $r2['entity_details'];
                    $current_folder_entity_list[$current_item_index2]['entity_date_lodged'] = $r2['entity_date_lodged'];
                }
            }

            $document_handler_form_enquiry_folder_list[$current_item_index]['folder_entity_list'] = $current_folder_entity_list;
        }
    }
}


/*
----- ----- ----- ----- ----- ----- ----- ----- ----- -----
----- retrieve folder_file_list -----
----- ----- ----- ----- ----- ----- ----- ----- ----- -----
*/
$sql = '';
$results_retrieve_data['folder_file_list']['is_success'] = true;
$results_retrieve_data['folder_file_list']['total_record'] = 0;

if ($enable_retrieve['folder_file_list'] == true) {
    $sql = str_replace(
        array(
            '[FOLDER_ID]'
        ), 
        array(
            $api_data['folder_id']
        ), 
        $sql_template_retrieve_folder_file_list
    );

    $results = executeDbQuery($sql, $db_connection);
    if ($results['error'] == 'null') {
        $results_retrieve_data['folder_file_list']['is_success'] = true;

        while ($r1 = mysql_fetch_array($results['data'])) {
            $current_item_index = count($document_handler_form_folder_file_list);

            $document_handler_form_folder_file_list[$current_item_index]['file_id'] = $r1['file_id'];
            $document_handler_form_folder_file_list[$current_item_index]['file_name'] = $r1['file_name'];
            $document_handler_form_folder_file_list[$current_item_index]['file_description'] = $r1['file_description'];
            $document_handler_form_folder_file_list[$current_item_index]['file_summary'] = $r1['file_summary'];
            $document_handler_form_folder_file_list[$current_item_index]['file_from'] = $r1['file_from'];
            $document_handler_form_folder_file_list[$current_item_index]['file_date_received'] = $r1['file_date_received'];
            $document_handler_form_folder_file_list[$current_item_index]['file_to'] = $r1['file_to'];
            $document_handler_form_folder_file_list[$current_item_index]['file_date_sent'] = $r1['file_date_sent'];
            $document_handler_form_folder_file_list[$current_item_index]['file_content_date'] = $r1['file_content_date'];
            $document_handler_form_folder_file_list[$current_item_index]['file_content_category'] = $r1['file_content_category'];
            $document_handler_form_folder_file_list[$current_item_index]['file_original_name'] = $r1['file_original_name'];
            $document_handler_form_folder_file_list[$current_item_index]['file_extension'] = $r1['file_extension'];
            $document_handler_form_folder_file_list[$current_item_index]['file_type'] = $r1['file_type'];
            $document_handler_form_folder_file_list[$current_item_index]['file_size'] = $r1['file_size'];
            $document_handler_form_folder_file_list[$current_item_index]['file_external_ref_name'] = $r1['file_external_ref_name'];
            $document_handler_form_folder_file_list[$current_item_index]['file_date_created'] = $r1['file_date_created'];

            $sql = str_replace(
                array(
                    '[FILE_ID]' 
                ), 
                array(
                    $r1['file_id']
                ), 
                $sql_template_retrieve_file_folder_list
            );

            $current_file_folder_list = array();

            $results2 = executeDbQuery($sql, $db_connection);
            if ($results2['error'] == 'null') {
                while ($r2 = mysql_fetch_array($results2['data'])) {
                    $current_item_index2 = count($current_file_folder_list);
                    $current_file_folder_list[$current_item_index2]['folder_id'] = $r2['folder_id'];
                    $current_file_folder_list[$current_item_index2]['folder_name'] = $r2['folder_name'];
                    $current_file_folder_list[$current_item_index2]['folder_description'] = $r2['folder_description'];
                    $current_file_folder_list[$current_item_index2]['folder_date_created'] = $r2['folder_date_created'];
                }
            }

            $document_handler_form_folder_file_list[$current_item_index]['file_folder_list'] = $current_file_folder_list;

            $sql = str_replace(
                array(
                    '[FILE_ID]' 
                ), 
                array(
                    $r1['file_id']
                ), 
                $sql_template_retrieve_file_version_list
            );

            $current_file_version_list = array();

            $results2 = executeDbQuery($sql, $db_connection);
            if ($results2['error'] == 'null') {
                while ($r2 = mysql_fetch_array($results2['data'])) {
                    $current_item_index2 = count($current_file_version_list);
                    $current_file_version_list[$current_item_index2]['file_version_external_ref_name'] = $r2['file_version_external_ref_name'];
                    $current_file_version_list[$current_item_index2]['file_version_date_created'] = $r2['file_version_date_created'];
                }
            }

            $document_handler_form_folder_file_list[$current_item_index]['file_version_list'] = $current_file_version_list;
        }
    }
}


/*
----- ----- ----- ----- ----- ----- ----- ----- ----- -----
----- download file -----
----- ----- ----- ----- ----- ----- ----- ----- ----- -----
*/
$sql = '';
$results_retrieve_data['file_download']['is_success'] = true;
$results_retrieve_data['file_download']['total_record'] = 0;

if ($enable_retrieve['file_download'] == true) {
    $sql = str_replace(
        array(
            '[FILE_EXTERNAL_REF_NAME]'
        ), 
        array(
            $api_data['file_external_ref_name']
        ), 
        $sql_template_retrieve_download_file_info
    );

    $results = executeDbQuery($sql, $db_connection);
    if ($results['error'] == 'null') {
        $file_extension = '';
        $file_type = '';

        if ($results['num_rows'] > 0) {
            $results_retrieve_data['file_download']['is_success'] = true;
            $r1 = mysql_fetch_array($results['data']);
            $file_extension = $r1['file_extension'];
            $file_type = $r1['file_type'];
        } else {
            $sql = str_replace(
                array(
                    '[FILE_EXTERNAL_REF_NAME]'
                ), 
                array(
                    $api_data['file_external_ref_name']
                ), 
                $sql_template_retrieve_download_file_info_2
            );

            $results2 = executeDbQuery($sql, $db_connection);
            if ($results2['error'] == 'null') {
                if ($results2['num_rows'] > 0) {
                    $results_retrieve_data['file_download']['is_success'] = true;
                    $r2 = mysql_fetch_array($results2['data']);
                    $file_extension = $r2['file_extension'];
                    $file_type = $r2['file_type'];
                }
            }
        }

        if ($file_extension != '' && $file_type != '') {
            $source_file_name = $api_data['file_external_ref_name'] . '.' . $file_extension;
            $source_file_path = $config['path']['upload_folder'] . $source_file_name;

            $download_file_name = $api_data['entity_name'] . "___";
            $download_file_name .= $api_data['folder_name'] . "___";
            $download_file_name .= $api_data['file_name'] . "___";
            $download_file_name .= $source_file_name;

            header('Content-Type: ' . $file_type);
            header('Content-Disposition: attachement; filename="' . $download_file_name . '"');
            echo file_get_contents($source_file_path);
            exit;
        }
    }
}


/*
----- ----- ----- ----- ----- ----- ----- ----- ----- -----
----- download msword plugin -----
----- ----- ----- ----- ----- ----- ----- ----- ----- -----
*/
if ($enable_retrieve['msword_plugin_download'] == true) {
    $file_extension = 'zip';
    $source_file_name = 'VGL4W_01.zip';
    $source_file_path = $config['path']['upload_folder'] . $source_file_name;
    $download_file_name .= $source_file_name;
    $file_type = $config['mime_types'][$file_extension];

    header('Content-Type: ' . $file_type);
    header('Content-Disposition: attachement; filename="' . $download_file_name . '"');
    echo file_get_contents($source_file_path);
    exit;
}


/*
----- ----- ----- ----- ----- ----- ----- ----- ----- -----
----- process retrieve data results -----
----- ----- ----- ----- ----- ----- ----- ----- ----- -----
*/
$total_overall_success = 0;
foreach ($results_retrieve_data as $key1 => $value1) {
    if ($value1['is_success'] == true) {
        $total_overall_success++;
    }
}

// if ($results_retrieve_data['enquiry_folder_list']['is_success'] == true) {
if ($total_overall_success == count($results_retrieve_data)) {
    $api_response['error'] = 'null';
} else {
    $api_response['error'] = '10020';
}

$api_response['message'] = array(
);

$api_response['data'] = array();

if (isset($api_data['access_mode'])) {
    switch ($api_data['access_mode']) {
        case 'enquiry_user_info':
            $api_response['data'] = array(
                'document_handler_form_selected_enquiry_user_info' => $document_handler_form_selected_enquiry_user_info
            );
            break;
        case 'enquiry_folder_list':
            $api_response['data'] = array(
                'document_handler_form_enquiry_folder_list' => $document_handler_form_enquiry_folder_list
            );
            break;
        case 'folder_file_list':
            $api_response['data'] = array(
                'document_handler_form_folder_file_list' => $document_handler_form_folder_file_list
            );
            break;
    }
}
?>