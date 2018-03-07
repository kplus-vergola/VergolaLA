<?php
/*
##### ##### ##### ##### ##### ##### ##### ##### ##### ##### ##### ##### ##### ##### #####

This customised agent is to help execute shell level operation.

Available function(s):

1. Update web site's code base by using local Git client: 

    url: http://<vergola domain name>/custom_agent.php?fc=ucb

##### ##### ##### ##### ##### ##### ##### ##### ##### ##### ##### ##### ##### ##### #####
*/


include 'custom_agent_functions.php';


$valid_function_codes = array('ucb');
if (isset($_GET['fc']) && in_array($_GET['fc'], $valid_function_codes)) {
    switch ($_GET['fc']) {
        case 'ucb':
            define("LOCAL_GIT_REPO_PATH", "C:\\xampp\htdocs\VergolaLA");
            define("GIT_USER_EMAIL", "git.dev@knowledgeplus.net.au");
            define("GIT_USER_NAME", "git.dev");
            define("OUTPUT_PROCESSING_STATUS", true);
            define("PAUSE_FOR_PROCESSING_IN_SECS", 15);
            if (updateCodeBase() == false) {
                echo 'Failed Operation';
                echo '<br />';
                echo '<br />';
            }
            break;
    }
} else {
    echo 'Invalid Access';
    echo '<br />';
    echo '<br />';
}
?>