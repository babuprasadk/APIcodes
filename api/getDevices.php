<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
// include database and object files
include '../config/dbConnect.php';
include '../objects/devices.php';
 
// instantiate database and product object
$database = new Database();
$db = $database->getConnection();
 
// initialize object
$device = new Device($db);
 
// query devices
$stmt = $device->read();
$num = $stmt->rowCount();
 
// check if more than 0 record found
if($num>0){
 
    // products array
    $devices_arr=array();
    $devices_arr["data"]=array();
 
    // retrieve our table contents
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
 
        $device_item=array(
            "id" => $id,
            "deviceId" => $deviceId,
            "deviceLabel" => html_entity_decode($deviceLabel),
            "lastUpdatedOn" => $lastUpdatedOn
        );
 
        array_push($devices_arr["data"], $device_item);
    }
 
    echo json_encode($devices_arr);
}
 
else{
    echo json_encode(
        array("message" => "No devices found.")
    );
}
?>