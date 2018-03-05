<?php
  // connect to database
  include 'database.php';
  if (!$con) { echo "Error"; }
  $dbname = 'vergola_quotedb';
  mysql_select_db($dbname);
  $initialBuildersArray = array( );
  $result = mysql_query("SELECT cf_id, suburbid, builder_name, builder_contact, builder_address1, builder_address2, builder_suburb, builder_state, builder_postcode, builder_wkphone, builder_mobile, builder_fax, builder_email FROM ver_chronoforms_data_builder_vic",$con) or die (mysql_error());
  while( $row = mysql_fetch_assoc( $result ) ) {
      $initialBuildersArray[] = $row;
  }
  $builders = $initialBuildersArray;
  // Cleaning up the term
  $term = trim(strip_tags($_GET['term']));
  // get match
  $matches = array();
  foreach($builders as $builder){
if(stripos($builder['builder_name'], $term) !== false){
    // Adding the necessary "value" and "label" fields and appending to result set
    $builder['value'] = $builder['builder_name'];
    $builder['label'] = "{$builder['builder_name']}, {$builder['builder_address1']} {$builder['builder_suburb']} {$builder['builder_state']} {$builder['builder_postcode']}";
    $matches[] = $builder;
    }
  } 
  // Truncate, encode and return the results
  $matches = array_slice($matches, 0, 5);
  print json_encode($matches);
  mysql_close($con);
  ?>