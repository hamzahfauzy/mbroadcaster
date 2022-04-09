<?php

return [
    'dashboard' => 'default/index',
    'customers' => 'crud/index?table=customers',
    'messages'  => 'crud/index?table=messages',
    'users'     => [
        'all users' => 'users/index',
        'roles' => 'roles/index'
    ],
    'settings' => 'application/index'
];