<?php
/*
----- ----- ----- ----- ----- ----- ----- ----- ----- -----
----- insert ???  -----
----- ----- ----- ----- ----- ----- ----- ----- ----- -----
*/
$sql_template_insert_document_handler_temp_entity = "
    INSERT INTO enquiry 
    (
        enquiry_code,       employee_id,            details, 
        area_of_law,        preferred_office,       referral_source, 
        reference_table,    reference_id,           estimated_value, 
        activity_type,      duration_in_seconds,    duration, 
        status,             owner_id,    
        date_lodged, 
        date_created,       last_modified,          date_deleted
    )
    VALUES 
    (
        'Temp',             '0',                    '', 
        '',                 '',                     '', 
        '',                 '0',                    '', 
        '',                 '0',                    '', 
        '',                 '0', 
        NOW(), 
        NOW(),              '1970-01-01 00:00:00',  '1970-01-01 00:00:00'
    );
";





$sql_template_insert_document_handler_folder = "
    INSERT INTO document_handler_folder 
    (
        module,             id, 
        name,               description,                summary, 
        user_id,            group_id,                   date_created 
    )
    VALUES 
    (
        'enquiry',          '[FOLDER_ID]', 
        '[FOLDER_NAME]',    '[FOLDER_DESCRIPTION]',     '[FOLDER_SUMMARY]', 
        '[USER_ID]',        '[GROUP_ID]',               NOW() 
    );
";


$sql_template_insert_document_handler_entity_folder = "
    INSERT INTO document_handler_entity_folder 
    (
        entity_ref_table,   entity_ref_id,      folder_id, 
        user_id,            group_id,           date_created 
    )
    VALUES 
    (
        'enquiry',          '[ENQUIRY_ID]',     '[FOLDER_ID]', 
        '[USER_ID]',        '[GROUP_ID]',       NOW() 
    );
";





$sql_template_insert_document_handler_file = "
    INSERT INTO document_handler_file 
    (
        module,                 id, 
        name,                   description,                summary, 
        `from`,                 date_received, 
        `to`,                   date_sent, 
        content_date,           content_category, 
        original_name,          extension, 
        type,                   size,                       external_ref_name, 
        user_id,                group_id,                   date_created 
    )
    VALUES 
    (
        'enquiry',              '[FILE_ID]', 
        '[FILE_NAME]',          '[FILE_DESCRIPTION]',       '[FILE_SUMMARY]', 
        '[FILE_FROM]',          '[FILE_DATE_RECEIVED]', 
        '[FILE_TO]',            '[FILE_DATE_SENT]', 
        '[FILE_CONTENT_DATE]',  '[FILE_CONTENT_CATEGORY]', 
        '[FILE_ORIGINAL_NAME]', '[FILE_EXTENSION]', 
        '[FILE_TYPE]',          '[FILE_SIZE]',              '[EXTERNAL_REF_NAME]', 
        '[USER_ID]',            '[GROUP_ID]',               NOW() 
    );
";


$sql_template_insert_document_handler_folder_file = "
    INSERT INTO document_handler_folder_file 
    (
        folder_id,          file_id, 
        user_id,            group_id,           date_created 
    )
    VALUES 
    (
        '[FOLDER_ID]',     '[FILE_ID]', 
        '[USER_ID]',       '[GROUP_ID]',        NOW() 
    );
";





$sql_template_insert_document_handler_file_version = "
    INSERT INTO document_handler_file_version 
    (
        file_id,            external_ref_name, 
        user_id,            group_id,           date_created 
    )
    VALUES 
    (
        '[FILE_ID]',        '[FILE_EXTERNAL_REF_NAME]', 
        '[USER_ID]',        '[GROUP_ID]',        NOW() 
    );
";





$sql_template_insert_document_handler_activity_log = "
    INSERT INTO document_handler_activity_log 
    (
        activity_type, 
        data_before_activity, 
        user_id,            group_id,           date_created 
    )
    VALUES 
    (
        '[ACTIVITY_TYPE]', 
        '[DATA_BEFORE_ACTIVITY]', 
        '[USER_ID]',        '[GROUP_ID]',        NOW() 
    );
";









/*
----- ----- ----- ----- ----- ----- ----- ----- ----- -----
----- retrieve ??? -----
----- ----- ----- ----- ----- ----- ----- ----- ----- -----
*/
$sql_template_retrieve_table_status = "
    SHOW TABLE STATUS LIKE '[TABLE_NAME]';
";


/*
$sql_template_retrieve_entity_list = "
    SELECT 
        [ENTITY_REF_ID_COLUMN],  
        [ENTITY_REF_CODE_COLUMN], 
        [ENTITY_REF_DETAILS_COLUMN],  
        [ENTITY_REF_DATE_CREATED_COLUMN] 
    FROM [ENTITY_REF_TABLE_NAME] 
    WHERE date_deleted IS NULL 
    ORDER BY [ENTITY_REF_ID_COLUMN] 
    LIMIT 1000;
";
*/
/*
$sql_template_retrieve_entity_list = "
    SELECT 
        -1 AS 'id', 
        'TEMPORARY' AS 'entity_code', 
        '' AS 'details', 
        '' AS 'date_lodged' 
    UNION 
    SELECT 
        cf_id AS 'id', 
        CONCAT(quoteid, '_', projectid) AS 'entity_code', 
        project_name AS 'details', 
        quotedate AS 'date_lodged' 
    FROM ver_chronoforms_data_followup_vic 
    WHERE cf_id IN ( 
        SELECT 
            MAX(ver_chronoforms_data_followup_vic_2.cf_id) 
        FROM ver_chronoforms_data_followup_vic AS ver_chronoforms_data_followup_vic_2 
        GROUP BY ver_chronoforms_data_followup_vic_2.quoteid 
    ) 
    ORDER BY id DESC 
    LIMIT 1000;
";
*/
$sql_template_retrieve_entity_list = "
    SELECT 
        -1 AS 'id', 
        'TEMPORARY' AS 'entity_code', 
        '' AS 'details', 
        '' AS 'date_lodged' 
    UNION 
    SELECT 
        pid AS 'id', 
        clientid AS 'entity_code', 
        '' AS 'details', 
        datelodged AS 'date_lodged' 
    FROM ver_chronoforms_data_clientpersonal_vic 
    ORDER BY id DESC 
    LIMIT 1000;
";


/*
$sql_template_retrieve_default_entity_id = "
    SELECT 
        MAX(cf_id) AS 'id' 
    FROM ver_chronoforms_data_followup_vic 
    WHERE quoteid = '[QUOTE_ID]'
    GROUP BY quoteid 
    LIMIT 1;
";
*/
$sql_template_retrieve_default_entity_id = "
    SELECT 
        pid AS 'id' 
    FROM ver_chronoforms_data_clientpersonal_vic 
    WHERE clientid = '[CLIENT_ID]'
    LIMIT 1;
";


/*
$sql_template_retrieve_current_login_user_info = "
    SELECT 
        user.username AS 'username', 
        user.id AS 'user_id', 
        user.group_id AS 'user_group_id', 
        user_group.group_name AS 'user_group_group_name', 
        employee.id AS 'employee_id',  
        employee.first_name AS 'employee_first_name', 
        employee.last_name AS 'employee_last_name' 
    FROM user 
        LEFT JOIN user_group 
            ON user.group_id = user_group.id 
        LEFT JOIN employee 
            ON user.id = employee.user_id 
    WHERE user.date_deleted IS NULL 
    AND user_group.date_deleted IS NULL 
    AND employee.date_deleted IS NULL 
    AND user.[USER_REF_COLUMN_NAME] = '[USER_REF_COLUMN_VALUE]' 
    LIMIT 1;
";
*/
$sql_template_retrieve_current_login_user_info = "
    SELECT 
        ver_users.username AS 'username', 
        ver_users.id AS 'user_id', 
        ver_usergroups.id AS 'user_group_id', 
        ver_usergroups.title AS 'user_group_group_name', 
        ver_users.id AS 'employee_id',  
        IFNULL(ver_users.first_name, 'na') AS 'employee_first_name', 
        IFNULL(ver_users.last_name, 'na') AS 'employee_last_name' 
    FROM ver_users 
        LEFT JOIN ver_user_usergroup_map 
            ON ver_users.id = ver_user_usergroup_map.user_id 
        LEFT JOIN ver_usergroups 
            ON ver_user_usergroup_map.group_id = ver_usergroups.id 
    WHERE ver_users.[USER_REF_COLUMN_NAME] = '[USER_REF_COLUMN_VALUE]' 
    LIMIT 1;
";


/*
$sql_template_retrieve_selected_enquiry_user_info = "
    SELECT 
        employee.id AS 'employee_id',  
        employee.first_name AS 'employee_first_name', 
        employee.last_name AS 'employee_last_name', 
        user.id AS 'user_id', 
        user.group_id AS 'user_group_id', 
        user_group.group_name AS 'user_group_group_name' 
    FROM enquiry 
        LEFT JOIN employee 
            ON enquiry.owner_id = employee.id 
        LEFT JOIN user 
            ON employee.user_id = user.id 
        LEFT JOIN user_group 
            ON user.group_id = user_group.id 
    WHERE enquiry.date_deleted IS NULL 
    AND employee.date_deleted IS NULL 
    AND user.date_deleted IS NULL 
    AND user_group.date_deleted IS NULL 
    AND enquiry.[ENQUIRY_REF_COLUMN_NAME] = '[ENQUIRY_REF_COLUMN_VALUE]' 
    LIMIT 1;
";
*/
$sql_template_retrieve_selected_entity_user_info = "
    SELECT 
        ver_users.username AS 'username', 
        ver_users.id AS 'user_id', 
        ver_usergroups.id AS 'user_group_id', 
        ver_usergroups.title AS 'user_group_group_name', 
        ver_users.id AS 'employee_id',  
        IFNULL(ver_users.first_name, 'na') AS 'employee_first_name', 
        IFNULL(ver_users.last_name, 'na') AS 'employee_last_name' 
    FROM ver_chronoforms_data_clientpersonal_vic 
        LEFT JOIN ver_users 
            ON ver_chronoforms_data_clientpersonal_vic.repid = ver_users.id 
        LEFT JOIN ver_user_usergroup_map 
            ON ver_users.id = ver_user_usergroup_map.user_id 
        LEFT JOIN ver_usergroups 
            ON ver_user_usergroup_map.group_id = ver_usergroups.id 
    WHERE ver_chronoforms_data_clientpersonal_vic.clientid = '[CLIENT_ID]'
    LIMIT 1;
";




$sql_template_retrieve_entity_folder_list = "
    SELECT 
        -1 AS 'folder_id', 
        'TEMPORARY' AS 'folder_name', 
        '' AS 'folder_description', 
        '' AS 'folder_summary', 
        '' AS 'folder_date_created' 
    UNION 
    SELECT 
        document_handler_folder.id AS 'folder_id', 
        document_handler_folder.name AS 'folder_name', 
        document_handler_folder.description AS 'folder_description', 
        document_handler_folder.summary AS 'folder_summary', 
        document_handler_folder.date_created AS 'folder_date_created' 
    FROM document_handler_entity_folder 
        LEFT JOIN document_handler_folder 
            ON document_handler_entity_folder.folder_id = document_handler_folder.id 
    WHERE document_handler_entity_folder.date_deleted IS NULL 
    AND document_handler_folder.date_deleted IS NULL 
    AND document_handler_entity_folder.entity_ref_table = 'enquiry' 
    AND document_handler_entity_folder.entity_ref_id = '[ENTITY_REF_ID]' 
    ORDER BY folder_id DESC 
    LIMIT 1000;
";


/*
$sql_template_retrieve_folder_entity_list = "
    SELECT 
        enquiry.id AS 'enquiry_id', 
        enquiry.enquiry_code AS 'enquiry_enquiry_code', 
        enquiry.details AS 'enquiry_details', 
        enquiry.date_lodged AS 'enquiry_date_lodged'
    FROM document_handler_entity_folder 
        LEFT JOIN enquiry 
            ON document_handler_entity_folder.entity_ref_table = 'enquiry' 
            AND document_handler_entity_folder.entity_ref_id = enquiry.id 
    WHERE document_handler_entity_folder.date_deleted IS NULL 
    AND enquiry.date_deleted IS NULL 
    AND document_handler_entity_folder.folder_id = '[FOLDER_ID]' 
    ORDER BY document_handler_entity_folder.id 
    LIMIT 1000;
";
*/
/*
$sql_template_retrieve_folder_entity_list = "
    SELECT 
        ver_chronoforms_data_followup_vic.cf_id AS 'enquiry_id', 
        CONCAT(ver_chronoforms_data_followup_vic.quoteid, '_', ver_chronoforms_data_followup_vic.projectid) AS 'enquiry_enquiry_code', 
        ver_chronoforms_data_followup_vic.project_name AS 'enquiry_details', 
        ver_chronoforms_data_followup_vic.quotedate AS 'enquiry_date_lodged'
    FROM document_handler_entity_folder 
        LEFT JOIN ver_chronoforms_data_followup_vic 
            ON document_handler_entity_folder.entity_ref_table = 'enquiry' 
            AND document_handler_entity_folder.entity_ref_id = ver_chronoforms_data_followup_vic.cf_id 
    WHERE document_handler_entity_folder.folder_id = '[FOLDER_ID]' 
    ORDER BY document_handler_entity_folder.id 
    LIMIT 1000;
";
*/
$sql_template_retrieve_folder_entity_list = "
    SELECT 
        ver_chronoforms_data_clientpersonal_vic.pid AS 'entity_id', 
        ver_chronoforms_data_clientpersonal_vic.clientid AS 'entity_entity_code', 
        '' AS 'entity_details', 
        ver_chronoforms_data_clientpersonal_vic.datelodged AS 'entity_date_lodged'
    FROM document_handler_entity_folder 
        LEFT JOIN ver_chronoforms_data_clientpersonal_vic 
            ON document_handler_entity_folder.entity_ref_table = 'enquiry' 
            AND document_handler_entity_folder.entity_ref_id = ver_chronoforms_data_clientpersonal_vic.pid 
    WHERE document_handler_entity_folder.folder_id = '[FOLDER_ID]' 
    ORDER BY document_handler_entity_folder.id 
    LIMIT 1000;
";




$sql_template_retrieve_folder_file_list = "
    SELECT 
        document_handler_file.id AS 'file_id', 
        document_handler_file.name AS 'file_name', 
        document_handler_file.description AS 'file_description', 
        document_handler_file.summary AS 'file_summary', 
        document_handler_file.from AS 'file_from', 
        document_handler_file.date_received AS 'file_date_received', 
        document_handler_file.to AS 'file_to', 
        document_handler_file.date_sent AS 'file_date_sent', 
        document_handler_file.content_date AS 'file_content_date', 
        document_handler_file.content_category AS 'file_content_category', 
        document_handler_file.original_name AS 'file_original_name', 
        document_handler_file.extension AS 'file_extension', 
        document_handler_file.type AS 'file_type', 
        document_handler_file.size AS 'file_size', 
        document_handler_file.external_ref_name AS 'file_external_ref_name', 
        document_handler_file.date_created AS 'file_date_created' 
    FROM document_handler_folder_file 
        LEFT JOIN document_handler_file 
            ON document_handler_folder_file.file_id = document_handler_file.id 
    WHERE document_handler_folder_file.date_deleted IS NULL 
    AND document_handler_file.date_deleted IS NULL 
    AND document_handler_folder_file.folder_id = '[FOLDER_ID]' 
    ORDER BY document_handler_file.name 
    LIMIT 1000;
";


$sql_template_retrieve_file_folder_list = "
    SELECT 
        document_handler_folder.id AS 'folder_id', 
        document_handler_folder.name AS 'folder_name', 
        document_handler_folder.description AS 'folder_description', 
        document_handler_folder.date_created AS 'folder_date_created'
    FROM document_handler_folder_file 
        LEFT JOIN document_handler_folder 
            ON document_handler_folder_file.folder_id = document_handler_folder.id 
    WHERE document_handler_folder_file.date_deleted IS NULL 
    AND document_handler_folder.date_deleted IS NULL 
    AND document_handler_folder_file.file_id = '[FILE_ID]' 
    ORDER BY document_handler_folder_file.id 
    LIMIT 1000;
";


$sql_template_retrieve_file_version_list = "
    SELECT 
        document_handler_file_version.external_ref_name AS 'file_version_external_ref_name', 
        document_handler_file_version.date_created AS 'file_version_date_created' 
    FROM document_handler_file_version 
        LEFT JOIN document_handler_file 
            ON document_handler_file_version.file_id = document_handler_file.id 
    WHERE document_handler_file_version.date_deleted IS NULL 
    AND document_handler_file.date_deleted IS NULL 
    AND document_handler_file_version.file_id = '[FILE_ID]' 
    ORDER BY document_handler_file_version.date_created DESC 
    LIMIT 1000;
";




$sql_template_retrieve_download_file_info = "
    SELECT 
        id AS 'file_id', 
        extension AS 'file_extension', 
        type AS 'file_type', 
        size AS 'file_size' 
    FROM document_handler_file 
    WHERE date_deleted IS NULL 
    AND external_ref_name = '[FILE_EXTERNAL_REF_NAME]' 
    LIMIT 1;
";

$sql_template_retrieve_download_file_info_2 = "
    SELECT 
        document_handler_file.id AS 'file_id', 
        document_handler_file.extension AS 'file_extension', 
        document_handler_file.type AS 'file_type', 
        document_handler_file.size AS 'file_size' 
    FROM document_handler_file_version 
        LEFT JOIN document_handler_file 
            ON document_handler_file_version.file_id = document_handler_file.id 
    WHERE document_handler_file_version.date_deleted IS NULL 
    AND document_handler_file.date_deleted IS NULL 
    AND document_handler_file_version.external_ref_name = '[FILE_EXTERNAL_REF_NAME]' 
    ORDER BY document_handler_file_version.date_created DESC 
    LIMIT 1;
";





$sql_template_retrieve_document_handler_entity_folder_records = "
    SELECT * 
    FROM document_handler_entity_folder 
    WHERE document_handler_entity_folder.folder_id = '[FOLDER_ID]' 
    LIMIT 1000;
";

$sql_template_retrieve_document_handler_folder_record = "
    SELECT * 
    FROM document_handler_folder 
    WHERE document_handler_folder.id = '[FOLDER_ID]' 
    LIMIT 1;
";

$sql_template_retrieve_document_handler_folder_file_records = "
    SELECT * 
    FROM document_handler_folder_file 
    WHERE document_handler_folder_file.folder_id = '[FOLDER_ID]' 
    LIMIT 1000;
";

$sql_template_retrieve_document_handler_file_record = "
    SELECT * 
    FROM document_handler_file 
    WHERE document_handler_file.id = '[FILE_ID]' 
    LIMIT 1;
";

$sql_template_retrieve_document_handler_folder_file_records_2 = "
    SELECT * 
    FROM document_handler_folder_file 
    WHERE document_handler_folder_file.file_id = '[FILE_ID]' 
    LIMIT 1000;
";










/*
----- ----- ----- ----- ----- ----- ----- ----- ----- -----
----- update ???  -----
----- ----- ----- ----- ----- ----- ----- ----- ----- -----
*/
$sql_template_update_document_handler_folder = "
    UPDATE document_handler_folder SET  
        name = '[FOLDER_NAME]', 
        description = '[FOLDER_DESCRIPTION]', 
        summary = '[FOLDER_SUMMARY]', 
        user_id = '[USER_ID]', 
        group_id = '[GROUP_ID]', 
        date_modified = NOW() 
    WHERE id = '[FOLDER_ID]';
";




$sql_template_update_document_handler_file = "
    UPDATE document_handler_file SET  
        name = '[FILE_NAME]', 
        description = '[FILE_DESCRIPTION]', 
        summary = '[FILE_SUMMARY]', 
        `from` = '[FILE_FROM]', 
        date_received = '[FILE_DATE_RECEIVED]', 
        `to` = '[FILE_TO]', 
        date_sent = '[FILE_DATE_SENT]', 
        content_date = '[FILE_CONTENT_DATE]', 
        content_category = '[FILE_CONTENT_CATEGORY]',  
        original_name = '[FILE_ORIGINAL_NAME]', 
        extension = '[FILE_EXTENSION]', 
        type = '[FILE_TYPE]', 
        size = '[FILE_SIZE]', 
        external_ref_name = '[EXTERNAL_REF_NAME]', 
        user_id = '[USER_ID]', 
        group_id = '[GROUP_ID]', 
        date_modified = NOW() 
    WHERE id = '[FILE_ID]';
";








/*
----- ----- ----- ----- ----- ----- ----- ----- ----- -----
----- delete ???  -----
----- ----- ----- ----- ----- ----- ----- ----- ----- -----
*/
$sql_template_delete_document_handler_entity_folder = "
    DELETE FROM document_handler_entity_folder 
    WHERE folder_id = '[FOLDER_ID]';
";

$sql_template_delete_document_handler_folder_file = "
    DELETE FROM document_handler_folder_file
    WHERE file_id = '[FILE_ID]';
";





$sql_template_delete_document_handler_entity_folder_records = "
    DELETE FROM document_handler_entity_folder 
    WHERE document_handler_entity_folder.folder_id = '[FOLDER_ID]';
";

$sql_template_delete_document_handler_folder_record = "
    DELETE FROM document_handler_folder 
    WHERE document_handler_folder.id = '[FOLDER_ID]';
";

$sql_template_delete_document_handler_folder_file_records = "
    DELETE FROM document_handler_folder_file 
    WHERE document_handler_folder_file.folder_id = '[FOLDER_ID]';
";

$sql_template_delete_document_handler_file_record = "
    DELETE FROM document_handler_file 
    WHERE document_handler_file.id = '[FILE_ID]';
";

$sql_template_delete_document_handler_folder_file_records_2 = "
    DELETE FROM document_handler_folder_file 
    WHERE document_handler_folder_file.file_id = '[FILE_ID]';
";
?>