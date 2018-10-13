<?php
header('Content-Type: application/json');

///Make sure that it is a POST request.
if(strcasecmp($_SERVER['REQUEST_METHOD'], 'POST') != 0){
	throw new Exception('Request method must be POST!');
}
 
//Make sure that the content type of the POST request has been set to application/json
$contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';
if(strcasecmp($contentType, 'application/json') != 0){
	throw new Exception('Content type must be: application/json');
}
     
//Receive the RAW post data.
$content = trim(file_get_contents("php://input"));
      
//Attempt to decode the incoming RAW post data from JSON.
$decoded = json_decode($content, true);
       
//If json_decode failed, the JSON is invalid.
if(!is_array($decoded)){
	throw new Exception('Received content contained invalid JSON!');
}
            
//Process the JSON.
//echo "===========> server insert(): \"" . $decoded["id"] . ";" . $decoded["todo"] . "\"\n";
$fhandle = fopen("list.csv", "a");
fputcsv($fhandle, array($decoded["id"], $decoded["todo"]), ";");
fclose($fhandle);

echo json_encode( array($decoded["id"], $decoded["todo"]));

?>
