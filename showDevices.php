<?php

# An HTTP GET request example
echo "<div> <div class='cell'><div style='width:20px'>&nbsp;</div><div>Device Id</div><div>Device Descrition</div><div>Last Updated date</div></div>";

$url = 'http://localhost/projectapi/api/getdevices/';
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_TIMEOUT, 5);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$data = curl_exec($ch);

$devices=json_decode($data);
print_r($devices);
$i=0;
/*
foreach ($devices as $device)
{
	$i++;
	echo "<div> <div class='cell'><div style='width:20px'>&nbsp;</div><div>".$device->deviceId."</div><div>".$device->deviceLabel."</div><div>".$device->lastUpdatedOn."</div></div></div>";

}*/

foreach($devices->data as $device)

    {
         echo $device->deviceId . "\n";
         foreach($device->values as $values)
         {
              echo $values->value . "\n";
         }
    }       

curl_close($ch);
echo $data;

?>