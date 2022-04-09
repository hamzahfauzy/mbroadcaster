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
        ],
        'send_at' => [
            'label' => 'Send At',
            'type'  => 'datetime-local',
            'attr'  => ['class'=>'form-control']
        ]
    ]
];