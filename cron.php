<?php
if (!(php_sapi_name() == "cli")) {
    die();
}

session_start();
date_default_timezone_set('Asia/Jakarta');
if(file_exists('vendor/autoload.php'))
    require 'vendor/autoload.php';
require 'functions.php';

// cron action
$action = '';
foreach ($argv as $arg) {
    if($arg == 'cron.php') continue;
    $action=$arg;
}

if(file_exists('actions/'.$action.'.php'))
    require 'actions/'.$action.'.php';