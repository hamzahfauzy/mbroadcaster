<?php
if (!in_array(php_sapi_name(),["cli","cgi-fcgi"])) {
    die();
}

date_default_timezone_set('Asia/Jakarta');
if(file_exists('vendor/autoload.php'))
    require 'vendor/autoload.php';
require 'functions.php';

// cron action
$action = '';
$argv = $_SERVER['argv'];
foreach ($argv as $arg) {
    if(stringContains($arg,'cron.php')) continue;
    $action=$arg;
}

if(file_exists('actions/'.$action.'.php'))
    require 'actions/'.$action.'.php';