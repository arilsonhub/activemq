<?php

$queue  = 'ActiveMQ';
$stomp = NULL;

try {
    $stomp = new Stomp('tcp://activemq:61613');
    $stomp->subscribe($queue);    
       if ($stomp->hasFrame()) {
           $frame = $stomp->readFrame();
           if ($frame != NULL) {
               print "Mensagem Recebida: ".$frame->body;
               $stomp->ack($frame);
           }else{
               print "Frame Nulo";
           }
       }else{
           print "Sem dados na fila";
       }    
} catch(StompException $e) {
    die('Connection error: ' . $e);
}finally {
    unset($stomp);
}