<?php
include_once('mtaphpsdk_0.4/mta_sdk.php');

$mta_server = new mta('127.0.0.1', '22005', 'username', 'password');
$resource = $mta_server->getResource('phpsdk');
$network_stats = $resource->call('functionCalledFromPHP', 'Requesting network stats');

echo '<pre>', print_r($network_stats[0]), '</pre>';
?>
