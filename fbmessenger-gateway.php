<?php
include 'functions.php';

if (isset($_REQUEST['hub_verify_token']) && $_REQUEST['hub_verify_token'] === $GLOBALS['fbmessenger_verifytoken']) {
    echo $_REQUEST['hub_challenge'];
    exit;
}

$input = json_decode(file_get_contents('php://input'), true);
error_log(json_encode($input));
error_log("HTTP_HOST:".$_SERVER['HTTP_HOST']);
async_post("https://".$_SERVER['HTTP_HOST']."/fbmessenger-process.php", $input);
