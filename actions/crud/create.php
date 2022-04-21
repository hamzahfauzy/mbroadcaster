<?php

$table = $_GET['table'];
$error_msg = get_flash_msg('error');

if(request() == 'POST')
{
    $conn = conn();
    $db   = new Database($conn);

    if($table == 'messages')
    {
        if($_POST['messages']['send_at'] == '')
        {
            unset($_POST['messages']['send_at']);
        }
    }

    if($table == 'customers')
    {
        $customer = $db->single('customers',[
            'email' => $_POST[$table]['email']
        ]);

        if(!empty($customer))
        {
            set_flash_msg(['error'=>'Gagal menyimpan data dikarenakan email sudah terdaftar']);
            header('location:'.routeTo().'crud/create?table='.$table);
            die();
        }
    }

    $insert = $db->insert($table,$_POST[$table]);

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
                    'message_id' => $insert->id,
                    'filename' => $filename,
                    'file_url' => $file,
                ]);
            }
        }

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
            'message_id' => $insert->id,
            'do_at'      => $do_at
        ]);
    }

    set_flash_msg(['success'=>$table.' created']);
    header('location:'.routeTo().'crud/index?table='.$table);
}

return compact('table','error_msg');