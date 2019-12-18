<?php 

$method = $_SERVER['REQUEST_METHOD'];

// Process only when method is POST
if($method == 'POST'){
	header('Content-Type: application/json');
	$requestBody = file_get_contents("php://input");
	$json = json_decode($requestBody, true);
	$text = $json["queryResult"]["parameters"]["text"];
	//$text = $json->$result->$parameters->$text;
	switch ($text) {
		case 'hi':
			$speech = "Hi, Nice to meet you"; 
			break;

		case 'bye':
			$speech = "Bye, good night";
			break;

		case 'anything':
			$speech = "Yes, you can type anything here.";
			break;
		
		default:
			$speech = "Sorry, I didnt get that. Please ask me something else.";
			break;
	}

	$response = new \stdClass();
	$response->speech = $requestBody;
	$response->displayText = $json["text"];
	$response->displayText1 = $json["parameters"];
	$response->displayText2 = $json["text"];
	$response->displayText3 = $json["result"]["parameters"];
	$response->displayText4 = $json["parameters"]["text"];
	$response->displayText5 = $json["text"];
	$response->source = "webhook";
	echo json_encode($response);
}
else
{
	echo "Method not allowed";
}

?>
