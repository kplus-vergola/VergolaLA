<?php
  // connect to database
  //$con = mysql_connect("localhost","root","password");
  //include 'database.php';
  $con = mysql_connect("localhost","root","pass123");
  if (!$con) { echo "Error"; }
  //$dbname = 'vergola_quotedb_sa_v1';

 
  $dbname = 'vergola_quotedb_v5_us';
  mysql_select_db($dbname);
  
  $state_table = "ver_chronoforms_data_suburbs_vic";
  
  $initialSuburbsArray = array( );
  $result = mysql_query("SELECT cf_id, suburb, suburb_state, suburb_postcode FROM {$state_table} ",$con) or die (mysql_error());
  while( $row = mysql_fetch_assoc( $result ) ) {
      $initialSuburbsArray[] = $row;
  }

  $qr = "SELECT cf_id, suburb, suburb_state, suburb_postcode FROM {$state_table} ";
  //error_log($qr, 3,'C:\\xampp\htdocs\\vergola_contract_system_v4_us\\my-error.log');
  $suburbs = $initialSuburbsArray;
  // Cleaning up the term
  $term = trim(strip_tags($_GET['term']));
  // get match
  $matches = array();
  foreach($suburbs as $suburb){
if(stripos($suburb['suburb'], $term) !== false){
    // Adding the necessary "value" and "label" fields and appending to result set
    $suburb['value'] = $suburb['suburb'];
    $suburb['label'] = "{$suburb['suburb']}, {$suburb['suburb_state']} {$suburb['suburb_postcode']}";
    $matches[] = $suburb;
    }
  } 
  // Truncate, encode and return the results
  $matches = array_slice($matches, 0, 5);
  //error_log(print_r($matches,true), 3,'C:\\xampp\htdocs\\vergola_contract_system_v4_us\\my-error.log');
  print json_encode($matches);
  mysql_close($con);
  ?>