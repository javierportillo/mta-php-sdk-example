<?php
include_once('mtaphpsdk_0.4/mta_sdk.php');

$animal = mta::getInput()[0];

if ($animal == 'alpaca') {
    $db_name = 'vicugna_pacos_core_83_1';
} elseif ($animal == 'dolphin') {
    $db_name = 'tursiops_truncatus_core_83_1';
} else {
    mta::doReturn($animal, 'Catastrophic Failure: Critical system files have been compromised. Please restart your computer.');
    exit(1);
}

$database_connection = new mysqli('ensembldb.ensembl.org', 'anonymous', '', $db_name);
$query_result = $database_connection->query('SELECT sequence FROM dna WHERE seq_region_id = 1');
$dna_sequence = $query_result->fetch_row()[0];

mta::doReturn($animal, $dna_sequence);
?>
