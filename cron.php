<?php
if (!(php_sapi_name() == "cli")) {
    die();
}

date_default_timezone_set('Asia/Jakarta');
if(file_exists('vendor/autoload.php'))
    require 'vendor/autoload.php';
require 'functions.php';

// cron action
$action = '';
foreach ($argv as $arg) {
    if(stringContains($arg,'cron.php')) continue;
    $action=$arg;
}

if(file_exists('actions/'.$action.'.php'))
    require 'actions/'.$action.'.php';