<?php

$conn = conn();
$db   = new Database($conn);
$success_msg = get_flash_msg('success');

if(request() == 'POST')
{
    // check email
    $customer = $db->single('customers',[
        'email' => $_POST['email']
    ]);

    if(empty($customer))
    {
        $db->insert('customers',$_POST);
    }
    
    set_flash_msg(['success'=>'Data berhasil disimpan']);
    header('location:'.routeTo('register'));
    die();
}

return compact('success_msg');