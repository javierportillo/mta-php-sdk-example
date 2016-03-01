<?php

include_once('mtaphpsdk_0.4/mta_sdk.php');

$mta_server = new mta('127.0.0.1', '22005', "javier_portillo", "javier");
$resource = $mta_server->getResource('phpsdk');
$resource->call('functionCalledFromPHP', 'Hello from PHP!');

?>
