<?php

$table = $_GET['table'];
$conn = conn();
$db   = new Database($conn);

if($table == 'message_attachments')
{
    $data = $db->single('message_attachments',[
        'id' => $_GET['id']
    ]);
}

$db->delete($table,[
    'id' => $_GET['id']
]);

if($table == 'message_attachments')
{
    header('location:'.routeTo().'crud/edit?table=messages&id='.$data->message_id);
    die();
}
set_flash_msg(['success'=>$table.' deleted']);
header('location:'.routeTo().'crud/index?table='.$table);
die();