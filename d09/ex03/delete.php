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
$id = $decoded["id"];
$todo = $decoded["todo"];
//echo "===========> server delete(): \"" . $id . ";" . $todo. "\"\n";
$fptemp = fopen('list-temp.csv', "a+");
if (($fhandle = fopen('list.csv', "r")) !== FALSE) {
	while (($data = fgetcsv($fhandle, 0, ";")) !== FALSE) {
		if ($id != $data[0] ){
			$list = array($data);
			//print_r($list);
			//echo $data[0] . "\n";
			fputcsv($fptemp, array($data[0], $data[1]), ";");
		}
	}
}
fclose($fhandle);
fclose($fptemp);
unlink('list.csv');
rename('list-temp.csv','list.csv');

echo json_encode( array($decoded["id"], $decoded["todo"]));

?>
