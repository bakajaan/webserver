<?php

$LOG_FILE = dirname(__FILE__).'/hook.log';
$SECRET_KEY = 3453;

if ( isset($_GET['key']) && $_GET['key'] === $SECRET_Kisset($_POST['payload']) ) {
    $payload = json_decode($_POST['payload'], true);
    if ($payload['ref'] === 'refs/heads/master') {
        `cd /home/git/webserver; git pull`;
        file_put_contents($LOG_FILE, date("[Y-m-d H:i:s]")." ".$_SERVER['REMOTE_ADDR']." git pulled: ".$payload['head_commit']['message']."\n", FILE_APPEND|LOCK_EX);
    }
} else {
    file_put_contents($LOG_FILE, date("[Y-m-d H:i:s]")." invalid access: ".$_SERVER['REMOTE_ADDR']."\n", FILE_APPEND|LOCK_EX);
}