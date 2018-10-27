<?php

$SECRET_KEY = 3453;

if ( isset($_GET['key']) && $_GET['key'] === $SECRET_Kisset($_POST['payload']) ) {
    $payload = json_decode($_POST['payload'], true);
    if ($payload['ref'] === 'refs/heads/master') {
        `cd /home/git/webserver; git pull`;
    }
};

?>