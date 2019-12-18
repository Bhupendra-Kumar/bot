<?php 
header('Content-Type: application/json');
function processMessage($update){
    if($update["result"]["action"]=="")
    {
        $fp = file_put_contents('request.log', $update["result"]["parameters"]["msg"]);
        sendMessage(array(
            "source" => $update["result"]["source"],
            "speech" => $update["result"]["parameters"]["msg"],
            "displayText" => ".........Text Here............",
            "contextOut" => array()
        ));
    }
}
function sendMessage($parameters){
    $req_dump = print_r($parameters, true);
    $fp = file_put_contents('reques4.log, $req_dump);
    header('content-Type: application/json');
    echo json_encode($parameters);
}

$update_response = file_get_contents("php://input");
$update = json_decode($update_response, true);
if(isset($update["result"]["action"])){
    processMessage($update);
}
?>
