<?php

// Don't attempt to process the upload on an OPTIONS request
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    header("Access-Control-Allow-Methods: POST, OPTIONS");
    return;
}

reset ($_FILES);
$temp = current($_FILES);
$filename  = $temp['name'];

// Verify extension
if (!in_array(strtolower(pathinfo($filename, PATHINFO_EXTENSION)), array("gif", "jpg", "png"))) {
    header("HTTP/1.1 400 Invalid extension.");
    return;
}

$ext  = pathinfo($filename, PATHINFO_EXTENSION);
$name = strtotime('now').'.'.$ext;
$file = 'uploads/images/'.$name;
$tmp  = $temp['tmp_name'];
if(copy($tmp,$file))
{
    echo json_encode(array('location' => routeTo($file)));
    die();
}

