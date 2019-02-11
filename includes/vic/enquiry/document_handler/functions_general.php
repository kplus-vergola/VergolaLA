<?php
function executeDbQuery($sql, $db_connection) {
    $results = 'null';
    $record_display_commands = ['SELECT', 'SHOW'];
    $record_manipulate_commands = ['INSERT', 'UPDATE', 'REPLACE', 'DELETE'];

    if ($query_result = mysql_query($sql, $db_connection)) {
        $results = array(
            'error' => 'null', 
            'message' => '', 
            'num_rows' => 0, 
            'affected_rows' => 0, 
            'data' => $query_result, 
        );
        foreach ($record_display_commands as $key1 => $value1) {
            if (strtoupper(substr(trim($sql), 0, strlen($value1))) == $value1) {
                $results['num_rows'] = mysql_num_rows($query_result);
                break;
            }
        }
        foreach ($record_manipulate_commands as $key1 => $value1) {
            if (strtoupper(substr(trim($sql), 0, strlen($value1))) == $value1) {
                $results['affected_rows'] = mysql_affected_rows($db_connection);
                break;
            }
        }
    } else {
        $results = array(
            'error' => '00010', 
            'message' => mysql_error($db_connection), 
            'num_rows' => 0, 
            'affected_rows' => 0, 
            'data' => 'null', 
        );
    }

    return $results;
}


function getResultsetInJson($sql, $db_connection) {
    $temp_array = array();
    $c1 = 0;

    $results = executeDbQuery($sql, $db_connection);
    if ($results['error'] == 'null') {
        while ($r1 = mysql_fetch_array($results['data'])) {
            $c1 = count($temp_array);
            foreach ($r1 as $key1 => $value1) {
                if (! is_numeric($key1)) {
                    $temp_array[$c1][$key1] = $value1;
                }
            }
        }
    }

    return json_encode($temp_array);
}


function getApiData($api_data_string) {
    $results = array(
        'api_data_string' => '', 
        'api_data' => array()
    );

    $api_data_string = str_replace('[AMPERSAND]', '&', $api_data_string);
    $api_data = json_decode($api_data_string, true);

    $results['api_data_string'] = $api_data_string;
    $results['api_data'] = $api_data;

    return $results;
}


function generateRandomString($target_length = 20, $character_map = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz') {
    $c1 = 0;
    $current_random_position = -1;
    $random_string = '';

    while (strlen($random_string) < $target_length) {
        $current_random_position = mt_rand(0, strlen($character_map));
        $random_string .= substr($character_map, $current_random_position, 1);
    }

    return $random_string;
}


function requestCurlCall($url, $data, $call_method = 'post') {
    switch ($call_method) {
        case 'post':
            $curl_options = array(
                CURLOPT_URL => $url, 
                CURLOPT_POST => true, 
                CURLOPT_RETURNTRANSFER => true, 
                CURLOPT_POSTFIELDS => 'api_data=' . json_encode($data)
            );
            break;
        case 'get':
            $url = $url . '&api_data=' . json_encode($data);
            $curl_options = array(
                CURLOPT_URL => $url, 
                CURLOPT_RETURNTRANSFER => true
            );
            break;
    }

    $curl_handler = curl_init();
    curl_setopt_array($curl_handler, $curl_options);
    $results = curl_exec($curl_handler);
    curl_close($curl_handler);

    return json_decode($results, true);
}
?>