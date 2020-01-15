<?php 

$method = $_SERVER['REQUEST_METHOD'];

// Process only when method is POST
if($method == 'POST'){
	header('Content-Type: application/json');
	$requestBody = file_get_contents("php://input");
	$json = json_decode($requestBody, true);
	$Empname = $json["queryResult"]["parameters"]["Empname"];
	if($Empname != "" && $Empname != null)
	{
		$speech = "Ya sure, which type of number you want intercom number , telephone number or mobile number";
	}
	else
	{
		$speech = "Ya sure, May i have the employee name or emailid";
	}

	$response = new \stdClass();
	$response->fulfillmentText = $speech;
	$response->displayText = $speech;
	$response->source = "General";
	echo json_encode($response);
}
else
{
	echo "method not allowed";
}

?>
