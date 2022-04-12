<?php

return [
    'customers'    => [
        'name' => [
            'label' => 'Nama',
            'type'  => 'text'
        ],
        'email' => [
            'label' => 'Email',
            'type'  => 'text'
        ],
    ],
    'messages' => [
        'title' => [
            'label' => 'Judul',
            'type'  => 'text',
        ],
        'content' => [
            'label' => 'Isi Email',
            'type'  => 'textarea',
            'attr'  => ['class'=>'form-control tinymce']
        ],
        'send_at' => [
            'label' => 'Jadwal Kirim',
            'type'  => 'datetime-local',
            'attr'  => ['class'=>'form-control']
        ]
    ]
];