<?php
include_once('mtaphpsdk_0.4/mta_sdk.php');

/*
 * This page is not meant to be loaded on a web browser. You have to be cautious
 * of how this code would behave if it gets loaded on a browser. Preferably,
 * you would use this file exclusively to handle conections comming from MTA; It
 * is adviced in the PHP SDK wiki that you should not output any data to the
 * screen, but you can be as creative as you want with your implementation.
 */

/*
 * getInput colects all the argumets passed from the callRemote function and
 * stores them in an array.
 */
$remote_input = mta::getInput();

/*
 * The next block of code is used to select a database depending on what animal
 * you selected in the /getdna command. If you are wondering about why did I
 * choose to make this animal dna example, it's because that was the only publicly
 * accesible database I could find on the internet. It was actualy very interesting
 * to find out that there's a public mysql database full of dna sequencing related stuff.
 */

$animal = $remote_input[0];
if ($animal == 'alpaca') {
    $db_name = 'vicugna_pacos_core_83_1';
} elseif ($animal == 'dolphin') {
    $db_name = 'tursiops_truncatus_core_83_1';
} else {
    mta::doReturn($animal, 'Catastrophic Failure: Critical system files have been compromised. Please restart your computer.');
    exit(1);
}
/*
 * The code below connects to the database. I mean, you could have just connected
 * directly from MTA using the SQL functions... but whatever, I guess. :P
 * This is just an example, you can do whatever you want with PHP and then just
 * pass the result back to MTA.
 */
$database_connection = new mysqli('ensembldb.ensembl.org', 'anonymous', '', $db_name);
$query_result = $database_connection->query('SELECT sequence FROM dna WHERE seq_region_id = 1');
$dna_sequence = $query_result->fetch_row()[0];

/*
 * doReturn takes any number of parameters and sends them back to MTA, then it
 * gets handled by the callback function declared in callRemote.
 */
mta::doReturn($animal, $dna_sequence);
?>
