<?php

$queue  = 'ActiveMQ';
$msg    = json_encode(array(rand(0,10),rand(0,10),rand(0,10)));
$clienteId = "533576e2cb3f-34547-1573264811601-3:2";
$stomp = NULL;

try {
    $stomp = new Stomp('tcp://activemq:61613', 'admin', 'admin', array('client-id' => $clienteId));
    $stomp->send($queue, $msg);
    echo "Mensagem enviada";
    echo $msg;
} catch(StompException $e) {
    die('Connection error: '.$e);
}finally {
  unset($stomp);
}