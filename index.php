<?php 

$method = $_SERVER['REQUEST_METHOD'];

// Process only when method is POST
if($method == 'POST'){
	header('Content-Type: application/json');
	$requestBody = file_get_contents("php://input");
	$json = json_decode($requestBody, true);
	$HospitalName = $json["queryResult"]["parameters"]["HospitalName"];
	$appointment = $json["queryResult"]["parameters"]["appointment"];
	$DoctorName = $json["queryResult"]["parameters"]["DoctorName"];
	$Time = $json["queryResult"]["parameters"]["Time"];
	$text = $json["queryResult"]["parameters"]["text"];
	//$text = $json->$result->$parameters->$text;
	switch ($text) {
		case "hi":
			$speech = "Hi, Nice to meet you"; 
			break;

		case "bye":
			$speech = "Bye, good night";
			break;

		case "anything":
			$speech = "Yes, you can type anything here.";
			break;
		
		default:
			$speech = "Sorry, I didnt get that. Please ask me something else.";
			break;
	}

	$response = new \stdClass();
	//$response->speech = $speech."/".$appointment."/".$DoctorName."/".$Time;
	//$response->displayText = $speech;
	$response->fulfillmentText = $speech;
	$response->displayText = $speech;
	$response->source = "General";
	echo json_encode($response);
}
else
{
	echo "Method not allowed";
}

?>
