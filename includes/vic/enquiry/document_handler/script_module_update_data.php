<?php
// mysql_query("START TRANSACTION");


/*
----- ----- ----- ----- ----- ----- ----- ----- ----- -----
----- initialise variables -----
----- ----- ----- ----- ----- ----- ----- ----- ----- -----
*/
$enable_updating = array(
    'folder_save' => false, 
    'file_save' => false, 
);
if (isset($api_data['access_mode'])) {
    switch ($api_data['access_mode']) {
        case 'folder_save':
            $enable_updating['folder_save'] = true;
            break;
        case 'file_save':
            $enable_updating['file_save'] = true;
            break;
    }
}


/*
----- ----- ----- ----- ----- ----- ----- ----- ----- -----
----- update folder -----
----- ----- ----- ----- ----- ----- ----- ----- ----- -----
*/
$sql = '';
$results_update_data['folder_save']['total_input'] = 0;
$results_update_data['folder_save']['total_success'] = 0;
$results_update_data['folder_save']['total_failure'] = 0;
$results_update_data['folder_save']['failure_indexes'] = array();
$results_update_data['folder_save']['is_success'] = false;

if ($enable_updating['folder_save'] == true) {
    $results_update_data['folder_save']['total_input'] = 2 + count($api_data['document_handler_form_folder_data_entry']['document_handler_form_folder_entity_links']);

    $sql = str_replace(
            array(
                '[FOLDER_NAME]', 
                '[FOLDER_DESCRIPTION]', 
                '[FOLDER_SUMMARY]', 
                '[USER_ID]', 
                '[GROUP_ID]', 
                '[FOLDER_ID]' 
            ), 
            array(
                addslashes($api_data['document_handler_form_folder_data_entry']['document_handler_form_folder_name']), 
                addslashes($api_data['document_handler_form_folder_data_entry']['document_handler_form_folder_description']), 
                addslashes($api_data['document_handler_form_folder_data_entry']['document_handler_form_folder_summary']), 
                addslashes($login_user_info['user_id']), 
                addslashes($login_user_info['user_group_id']), 
                addslashes($api_data['document_handler_form_folder_data_entry']['document_handler_form_folder_id'])
            ), 
            $sql_template_update_document_handler_folder
    );

    $results = executeDbQuery($sql, $db_connection);
    if ($results['error'] == 'null') {
        $results_update_data['folder_save']['total_success']++;
    } else {
        $results_update_data['folder_save']['total_failure']++;
    }


    $sql = str_replace(
        array(
            '[FOLDER_ID]' 
        ), 
        array(
            addslashes($api_data['document_handler_form_folder_data_entry']['document_handler_form_folder_id'])
        ), 
        $sql_template_delete_document_handler_entity_folder
    );

    $results = executeDbQuery($sql, $db_connection);
    if ($results['error'] == 'null') {
        $results_update_data['folder_save']['total_success']++;
    } else {
        $results_update_data['folder_save']['total_failure']++;
    }


    for ($c1 = 0; $c1 < count($api_data['document_handler_form_folder_data_entry']['document_handler_form_folder_entity_links']); $c1++) {
        $sql = str_replace(
            array(
                '[ENQUIRY_ID]', 
                '[FOLDER_ID]', 
                '[USER_ID]', 
                '[GROUP_ID]'
            ), 
            array(
                addslashes($api_data['document_handler_form_folder_data_entry']['document_handler_form_folder_entity_links'][$c1]), 
                addslashes($api_data['document_handler_form_folder_data_entry']['document_handler_form_folder_id']), 
                addslashes($login_user_info['user_id']), 
                addslashes($login_user_info['user_group_id'])
            ), 
            $sql_template_insert_document_handler_entity_folder
        );

        $results = executeDbQuery($sql, $db_connection);
        if ($results['error'] == 'null') {
            $results_update_data['folder_save']['total_success']++;
        } else {
            $results_update_data['folder_save']['total_failure']++;
            $results_update_data['folder_save']['failure_indexes'][] = $c1;
        }
    }

    if (count($api_data['document_handler_form_folder_data_entry']['document_handler_form_folder_entity_links']) == 0) {
        $results_update_data['folder_save']['total_input'] += 1;

        $sql = str_replace(
            array(
                '[ENQUIRY_ID]', 
                '[FOLDER_ID]', 
                '[USER_ID]', 
                '[GROUP_ID]'
            ), 
            array(
                $config['db']['entity_temp_id'], 
                addslashes($api_data['document_handler_form_folder_data_entry']['document_handler_form_folder_id']), 
                addslashes($login_user_info['user_id']), 
                addslashes($login_user_info['user_group_id'])
            ), 
            $sql_template_insert_document_handler_entity_folder
        );

        $results = executeDbQuery($sql, $db_connection);
        if ($results['error'] == 'null') {
            $results_update_data['folder_save']['total_success']++;
        } else {
            $results_update_data['folder_save']['total_failure']++;
            $results_update_data['folder_save']['failure_indexes'][] = $c1;
        }
    }

    if ($results_update_data['folder_save']['total_input'] == $results_update_data['folder_save']['total_success']) {
        $results_update_data['folder_save']['is_success'] = true;
    }
}


/*
----- ----- ----- ----- ----- ----- ----- ----- ----- -----
----- update file -----
----- ----- ----- ----- ----- ----- ----- ----- ----- -----
*/
$sql = '';
$results_update_data['file_save']['total_input'] = 0;
$results_update_data['file_save']['total_success'] = 0;
$results_update_data['file_save']['total_failure'] = 0;
$results_update_data['file_save']['failure_indexes'] = array();
$results_update_data['file_save']['is_success'] = false;

if ($enable_updating['file_save'] == true) {
    $results_update_data['file_save']['total_input'] = 2 + count($api_data['document_handler_form_file_data_entry']['document_handler_form_file_folder_links']);

    $sql = str_replace(
            array(
                '[FILE_NAME]', 
                '[FILE_DESCRIPTION]', 
                '[FILE_SUMMARY]', 
                '[FILE_FROM]', 
                '[FILE_DATE_RECEIVED]', 
                '[FILE_TO]', 
                '[FILE_DATE_SENT]', 
                '[FILE_CONTENT_DATE]', 
                '[FILE_CONTENT_CATEGORY]', 
                '[FILE_ORIGINAL_NAME]', 
                '[FILE_EXTENSION]', 
                '[FILE_TYPE]', 
                '[FILE_SIZE]', 
                '[EXTERNAL_REF_NAME]', 
                '[USER_ID]', 
                '[GROUP_ID]', 
                '[FILE_ID]'
            ), 
            array(
                addslashes($api_data['document_handler_form_file_data_entry']['document_handler_form_file_name']), 
                addslashes($api_data['document_handler_form_file_data_entry']['document_handler_form_file_description']), 
                addslashes($api_data['document_handler_form_file_data_entry']['document_handler_form_file_summary']), 
                addslashes($api_data['document_handler_form_file_data_entry']['document_handler_form_file_from']), 
                addslashes($api_data['document_handler_form_file_data_entry']['document_handler_form_file_date_received']), 
                addslashes($api_data['document_handler_form_file_data_entry']['document_handler_form_file_to']), 
                addslashes($api_data['document_handler_form_file_data_entry']['document_handler_form_file_date_sent']), 
                addslashes($api_data['document_handler_form_file_data_entry']['document_handler_form_file_content_date']), 
                addslashes($api_data['document_handler_form_file_data_entry']['document_handler_form_file_content_category']), 
                addslashes($api_data['document_handler_form_file_data_entry']['document_handler_form_file_original_name']), 
                addslashes($api_data['document_handler_form_file_data_entry']['document_handler_form_file_extension']), 
                addslashes($api_data['document_handler_form_file_data_entry']['document_handler_form_file_type']), 
                addslashes($api_data['document_handler_form_file_data_entry']['document_handler_form_file_size']), 
                addslashes($api_data['document_handler_form_file_data_entry']['document_handler_form_file_external_ref_name']), 
                addslashes($login_user_info['user_id']), 
                addslashes($login_user_info['user_group_id']), 
                addslashes($api_data['document_handler_form_file_data_entry']['document_handler_form_file_id'])
            ), 
            $sql_template_update_document_handler_file
    );

    $results = executeDbQuery($sql, $db_connection);
    if ($results['error'] == 'null') {
        $results_update_data['file_save']['total_success']++;
    } else {
        $results_update_data['file_save']['total_failure']++;
    }


    $sql = str_replace(
        array(
            '[FILE_ID]' 
        ), 
        array(
            addslashes($api_data['document_handler_form_file_data_entry']['document_handler_form_file_id'])
        ), 
        $sql_template_delete_document_handler_folder_file
    );

    $results = executeDbQuery($sql, $db_connection);
    if ($results['error'] == 'null') {
        $results_update_data['file_save']['total_success']++;
    } else {
        $results_update_data['file_save']['total_failure']++;
    }

    for ($c1 = 0; $c1 < count($api_data['document_handler_form_file_data_entry']['document_handler_form_file_folder_links']); $c1++) {
        $sql = str_replace(
            array(
                '[FOLDER_ID]', 
                '[FILE_ID]', 
                '[USER_ID]', 
                '[GROUP_ID]'
            ), 
            array(
                addslashes($api_data['document_handler_form_file_data_entry']['document_handler_form_file_folder_links'][$c1]), 
                addslashes($api_data['document_handler_form_file_data_entry']['document_handler_form_file_id']), 
                addslashes($login_user_info['user_id']), 
                addslashes($login_user_info['user_group_id'])
            ), 
            $sql_template_insert_document_handler_folder_file
        );

        $results = executeDbQuery($sql, $db_connection);
        if ($results['error'] == 'null') {
            $results_update_data['file_save']['total_success']++;
        } else {
            $results_update_data['file_save']['total_failure']++;
            $results_update_data['file_save']['failure_indexes'][] = $c1;
        }
    }

    if (count($api_data['document_handler_form_file_data_entry']['document_handler_form_file_folder_links']) == 0) {
        $results_update_data['file_save']['total_input'] += 1;

        $sql = str_replace(
            array(
                '[FOLDER_ID]', 
                '[FILE_ID]', 
                '[USER_ID]', 
                '[GROUP_ID]'
            ), 
            array(
                $config['db']['folder_temp_id'], 
                addslashes($api_data['document_handler_form_file_data_entry']['document_handler_form_file_id']), 
                addslashes($login_user_info['user_id']), 
                addslashes($login_user_info['user_group_id'])
            ), 
            $sql_template_insert_document_handler_folder_file
        );

        $results = executeDbQuery($sql, $db_connection);
        if ($results['error'] == 'null') {
            $results_update_data['file_save']['total_success']++;
        } else {
            $results_update_data['file_save']['total_failure']++;
            $results_update_data['file_save']['failure_indexes'][] = $c1;
        }
    }

    if ($results_update_data['file_save']['total_input'] == $results_update_data['file_save']['total_success']) {
        $results_update_data['file_save']['is_success'] = true;
    }
}


/*
----- ----- ----- ----- ----- ----- ----- ----- ----- -----
----- process update data results -----
----- ----- ----- ----- ----- ----- ----- ----- ----- -----
*/
$total_overall_input = 0;
foreach ($results_update_data as $key1 => $value1) {
    $total_overall_input += $value1['total_input'];
}

$total_overall_success = 0;
foreach ($results_update_data as $key1 => $value1) {
    $total_overall_success += $value1['total_success'];
}

if ($total_overall_input == $total_overall_success) {
    $api_response['error'] = 'null';
} else {
    $api_response['error'] = '10030';
}

$api_response['message'] = array(
    'total_overall_input' => $total_overall_input, 
    'total_overall_success' => $total_overall_success
);

if (isset($api_data['access_mode'])) {
    switch ($api_data['access_mode']) {
        case 'folder_save':
            break;
        case 'file_save':
            break;
    }
}

$api_response['data'] = array(
);

// if (! ($enable_updating[$target_data_source] == true && $results_update_data[$target_data_source]['is_success'] == true) && 
      // ($enable_updating['data_followup'] == true && $results_update_data['data_followup']['is_success'] == true) &&  
      // ($enable_updating['data_measurement'] == true && $results_update_data['data_measurement']['is_success'] == true)) {
    // mysql_query("ROLLBACK");
// }
?>