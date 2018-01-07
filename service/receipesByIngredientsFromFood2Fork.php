<?php
$postdata = file_get_contents("php://input");
$request = json_decode($postdata);
$ingredients = $request->ingredients;

$apiKey = "555f31f67b4bb986db3deb3f70e93a92";



$curl = curl_init("http://food2fork.com/api/search?key=" . $apiKey . ";q=" . implode(",", $ingredients));
$result = curl_exec($curl);

echo $result;
?>