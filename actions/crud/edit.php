<?php

$table = $_GET['table'];
$conn = conn();
$db   = new Database($conn);

$data = $db->single($table,[
    'id' => $_GET['id']
]);

if($table == 'messages')
{
    $data->attachments = $db->all('message_attachments',[
        'message_id' => $_GET['id']
    ]);
}

if(request() == 'POST')
{
    if(isset($_POST['messages']['send_at']))
    {
        if($_POST['messages']['send_at'] == '')
        {
            $_POST['messages']['send_at'] = 'NULL';
        }
    }

    $db->update($table,$_POST[$table],[
        'id' => $_GET['id']
    ]);

    if($table == 'messages')
    {
        if(isset($_FILES['files']))
        {
            $filenames  = $_FILES['files']['name'];
            foreach($filenames as $key => $filename)
            {
                if(empty($filename)) continue;
                $ext  = pathinfo($filename, PATHINFO_EXTENSION);
                $name = strtotime('now').'.'.$ext;
                $file = 'uploads/attachments/'.$name;
                $tmp  = $_FILES['files']['tmp_name'][$key];
                copy($tmp,$file);
                
                $db->insert('message_attachments',[
                    'message_id' => $_GET['id'],
                    'filename' => $filename,
                    'file_url' => $file,
                ]);
            }
        }

        if(isset($_POST['send']))
        {
            if($insert->send_at == NULL)
            {
                $do_at = strtotime('+2 minutes');
                $do_at = date('Y-m-d H:i', $do_at);
            }
            else
            {
                $do_at = $insert->send_at;
            }

            $db->insert('jobs',[
                'message_id' => $_GET['id'],
                'do_at'      => $do_at
            ]);
        }

    }

    set_flash_msg(['success'=>$table.' updated']);
    header('location:'.routeTo().'crud/index?table='.$table);
}

return [
    'data' => $data,
    'table' => $table
];