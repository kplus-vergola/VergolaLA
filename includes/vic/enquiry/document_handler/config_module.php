<?php
$config['path']['base_url'] = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . '/';
$config['path']['log_folder'] = 'C:\\xampp\htdocs\\VergolaLA_as_live\\logs\\';
$config['path']['script_url'] = substr($config['path']['base_url'], 0, strlen($config['path']['base_url']) - 1) . $_SERVER['REQUEST_URI'];
$config['path']['upload_folder'] = 'C:\\xampp\htdocs\\VergolaLA_as_live\\logs\\';

$config['db']['host_name'] = 'localhost';
$config['db']['db_name'] = 'vergola_quotedb_v5_us_as_live';
$config['db']['user_name'] = 'root';
$config['db']['password'] = 'pass123';

$config['db']['table_name']['entity'] = 'entity';
$config['db']['entity_table_name'] = 'enquiry';
$config['db']['entity_temp_id'] = '-1';
$config['db']['folder_temp_id'] = '-1';

$config['app']['entity']['ref_table_name'] = 'enquiry';
$config['app']['entity']['ref_id_column'] = 'id';
$config['app']['entity']['ref_code_column'] = 'entity_code';
$config['app']['entity']['ref_details_column'] = 'details';
$config['app']['entity']['ref_date_created_column'] = 'date_lodged';

include('config_mime_types.php');
?>