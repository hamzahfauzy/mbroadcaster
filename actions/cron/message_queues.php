<?php

$conn = conn();
$db   = new Database($conn);

$query = "SELECT * FROM message_queues LIMIT 0, 15";
$db->query = $query;
$queues = $db->exec('all');
foreach($queues as $queue)
{
    $message = $db->single('messages',[
        'id' => $queue->message_id
    ]);
    
    $attachments = $db->all('message_attachments',[
        'message_id' => $queue->message_id  
    ]);
    
    sendMail($message->title,[$queue->email],$queue->message_content,$attachments);
    
    $db->delete('message_queues',[
        'id' => $queue->id
    ]);
}