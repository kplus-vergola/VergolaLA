<?php
function updateCodeBase() {
    $result = false;

    echo 'Loading...';
    echo '<br />';
    echo '<br />';
    ob_flush();
    flush();

    $command_responses = array();

    chdir(LOCAL_GIT_REPO_PATH);

    $command = 'git config --global user.email "trac@knowledgeplus.net.au"';
    exec($command, $command_responses[count($command_responses)]);

    $command = 'git config --global user.name "trac"';
    exec($command, $command_responses[count($command_responses)]);

    $command = 'git pull';
    exec($command, $command_responses[count($command_responses)]);
    if (count($command_responses[count($command_responses) - 1]) > 0) {
        $result = true;
    }

    if (OUTPUT_PROCESSING_STATUS == true) {
        foreach ($command_responses as $key1 => $command_response) {
            foreach ($command_response as $key2 => $value2) {
                echo $key2 . ' => ' . $value2;
                echo '<br />';
            }
        }
    } else {
        sleep(PAUSE_FOR_PROCESSING_IN_SECS);
        echo 'Ok';
        echo '<br />';
        echo '<br />';
    }

    return $result;
}
?>