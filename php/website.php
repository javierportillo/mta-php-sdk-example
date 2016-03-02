<?php
include_once('mtaphpsdk_0.4/mta_sdk.php');

/*
 * This page is meant to be loaded on a web browser.
 * You can use this code when you want to retrieve data from your MTA server and
 * show it on your web page.
 */

/*
 * First, a new instance of the mta class is created, this is used to connect
 * your PHP programs to the HTTP interface of MTA.
 * The first parameter is your server IP address.
 * The second parameter is your httpport, you can find it in mtaserver.conf.
 * The third and fourth parameters are the username and password of an account
 * in your MTA server, the account must exist and it must have admin rights on
 * your ACL.
 */
$mta_server = new mta('127.0.0.1', '22005', 'username', 'password');

/*
 * The next line is used to declare a resource so you can call its functions.
 * You'll need to repeat this line for every resource you need to use.
 * Remember to start the resource on the server.
 */
$resource = $mta_server->getResource('phpsdk');

/*
 * Now it's time to call a function from the phpsdk resource.
 * This line calls the 'functionCalledFromPHP' function in your phpsdk resource
 * and passes the 'Requesting network stats' string as it's first parameter.
 * The returned values from our lua function are stored in the $network_stats
 * variable as an array.
 */
$network_stats = $resource->call('functionCalledFromPHP', 'Requesting network stats');

/*
 * And then we echo the result using print_r to print the array contents in a
 * human readable way.
 */
echo '<pre>', print_r($network_stats), '</pre>';
?>
