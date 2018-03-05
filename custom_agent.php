<?php
/*
##### ##### ##### ##### ##### ##### ##### ##### ##### ##### ##### ##### ##### ##### #####

This customised agent is to help execute shell level operation.

Available functions:

1. Update web site's code base: 

    url: http://localhost/custom_agent.php?fc=i8jcer

2. <future implementation>

    url: http://localhost/custom_agent.php?fc=9mo8rt

3. <future implementation>

    url: http://localhost/custom_agent.php?fc=og9fuh

##### ##### ##### ##### ##### ##### ##### ##### ##### ##### ##### ##### ##### ##### #####
*/


include 'custom_agent_functions.php';


$valid_function_codes = array('i8jcer', '9mo8rt', 'og9fuh');
if (isset($_GET['fc']) && in_array($_GET['fc'], $valid_function_codes)) {
    switch ($_GET['fc']) {
        case 'i8jcer':
            define("LOCAL_GIT_REPO_PATH", "C:\GitRepos\Project");
            define("OUTPUT_PROCESSING_STATUS", false);
            define("PAUSE_FOR_PROCESSING_IN_SECS", 15);
            if (updateCodeBase() == false) {
                echo 'Failed Operation';
                echo '<br />';
                echo '<br />';
            }
            break;
        case '9mo8rt':
            echo 'Under Maintenance';
            echo '<br />';
            echo '<br />';
            break;
        case 'og9fuh':
            echo 'Under Maintenance';
            echo '<br />';
            echo '<br />';
            break;
    }
} else {
    echo 'Invalid Access';
    echo '<br />';
    echo '<br />';
}
?>