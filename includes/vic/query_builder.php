<?php
 ini_set('display_errors', 0);

 $system_config_file_path = $_SERVER['DOCUMENT_ROOT'] . '/configuration.php';
 $config = array();
 if (file_exists($system_config_file_path)) {
     include($system_config_file_path);
     $system_config = new JConfig();
     $config['db']['host_name'] = $system_config->host;
     $config['db']['db_name'] = $system_config->db;
     $config['db']['user_name'] = $system_config->user;
     $config['db']['password'] = $system_config->password;
     $config['path']['log_folder'] = $system_config->log_path . '\\';

     $config['db']['table_name']['builders'] = "ver_chronoforms_data_clientpersonal_vic";
 }

 $matches = array(
     array(
         'id' => 'Error', 
         'builder_name' => 'Error'         
     )
 );
 if (count($config) > 0) {
     $con = mysql_connect(
         $config['db']['host_name'], 
         $config['db']['user_name'], 
         $config['db']['password']
     );

if ($con) {
  mysql_select_db($config['db']['db_name']);
  $state_table = $config['db']['table_name']['builders'];

  $dbname = $config['db']['table_name']['builders'];
  mysql_select_db($dbname);
   

  $data = array();
  $initialSuburbsArray = array( );
  $term = trim(strip_tags($_GET['term']));
  $result = mysql_query("
            SELECT 
                `builder_name`,
                `client_address1` AS address1,
                `client_address2` AS address2,
                `client_suburb` AS suburb,
                `client_state` AS state,
                `client_postcode` AS postcode,
                `client_wkphone` AS workphone,
                `clientid`
            FROM 
                $state_table
            WHERE 
                builder_name LIKE '%{$term}%' 
                AND !ISNULL(builder_name) 
                AND builder_name != ''
            GROUP BY 
                builder_name
            ORDER BY 
                builder_name ASC ",$con) or die (mysql_error()); 
                  
  /*$result = mysql_query("SELECT * FROM $state_table where  builder_name LIKE '%{$term}%' ",$con) or die (mysql_error());*/
  while( $row = mysql_fetch_assoc( $result ) ) {

    $row['value'] = $row['builder_name'];
    $row['label'] = $row['builder_name'];
    
    array_push($data, $row);
  }
}
  //error_log(print_r($data,true), 3,'C:\\xampp\htdocs\\vergola_contract_system_v4_sa\\my-error.log');
  $data = array_slice($data, 0, 10);
  
  echo json_encode ($data); 
  mysql_close($con);
}

?>