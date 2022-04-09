<?php

return [
    'customers'    => [
        'name','email'
    ],
    'messages' => [
        'title' => [
            'label' => 'Title',
            'type'  => 'text',
        ],
        'content' => [
            'label' => 'Mail Content',
            'type'  => 'textarea',
            'attr'  => ['class'=>'form-control tinymce']
        ],
        'send_at' => [
            'label' => 'Send At',
            'type'  => 'datetime-local',
            'attr'  => ['class'=>'form-control']
        ]
    ]
];