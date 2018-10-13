<?php
header( "Content-Type: application/json" );

if (strcasecmp($_SERVER['REQUEST_METHOD'], 'POST') != 0) {
	throw new Exception('Request method must be POST!');
}

$contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';
if (strcasecmp($contentType, 'application/json') != 0) {
	throw new Exception('Content type must be: application/json');
}

$content = trim(file_get_contents("php://input"));

$decoded = json_decode($content, true);

if (!is_array($decoded)) {
	throw new Exception('Received content contained invalid JSON!');
}

$fh = fopen("list.csv", "r");

$csvData = array();

while (($row = fgetcsv($fh, 0, ",")) !== FALSE) {
	$csvData[] = $row;
}

echo json_encode($csvData);

?>
