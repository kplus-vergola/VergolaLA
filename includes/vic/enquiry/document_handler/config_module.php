<?php
$config['path']['base_url'] = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . '/';
$config['path']['log_folder'] = 'C:\\xampp\htdocs\\VergolaLA_as_live\\logs\\';
$config['path']['script_url'] = substr($config['path']['base_url'], 0, strlen($config['path']['base_url']) - 1) . $_SERVER['REQUEST_URI'];
$config['path']['upload_folder'] = 'C:\\xampp\\htdocs\\VergolaLA_as_live\\images\\document_handler\\upload\\';

$config['db']['host_name'] = 'localhost';
$config['db']['db_name'] = 'vergola_quotedb_v5_us_as_live';
$config['db']['user_name'] = 'root';
$config['db']['password'] = 'pass123';

$config['db']['entity_temp_id'] = '-1';
$config['db']['folder_temp_id'] = '-1';

$config['plugin']['msword']['file_extension'] = 'zip';
$config['plugin']['msword']['file_name'] = 'VGL4W_03.zip';
$config['plugin']['msword']['folder'] = 'C:\\xampp\\htdocs\\VergolaLA_as_live\\images\\document_handler\\plugin\\';

$config['document_handler']['form']['file_name'] = 'form_document_handler.php';

include('config_mime_types.php');
?>