<?php

$conn = conn();
$db   = new Database($conn);

$jobs = $db->all('jobs',[
    'do_at' => ['LIKE','%'.date('Y-m-d H:i').'%']
]);

$customers = $db->all('customers');

foreach($jobs as $job)
{
    $message = $db->single('messages',[
        'id' => $job->message_id
    ]);

    foreach($customers as $customer)
    {
        $db->insert('message_queues',[
            'message_id' => $message->id,
            'message_content' => $message->content,
            'email'     => $customer->email
        ]);
    }
}