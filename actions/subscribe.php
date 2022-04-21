<?php

$conn = conn();
$db   = new Database($conn);
$success_msg = get_flash_msg('success');
$error_msg = get_flash_msg('error');

if(request() == 'POST')
{
    // check email
    $customer = $db->single('customers',[
        'email' => $_POST['email']
    ]);

    if(!empty($customer))
    {
        set_flash_msg(['error'=>'Email sudah terdaftar, Mohon gunakan akun lainnya']);
        header('location:'.routeTo('subscribe'));
        die();
    }
    
    $db->insert('customers',$_POST);
    set_flash_msg(['success'=>'Data berhasil disimpan']);
    header('location:'.routeTo('subscribe'));
    die();
}

return compact('success_msg','error_msg');