<?php
$postdata = file_get_contents("php://input");
$request = json_decode($postdata);
$ingredients = $request->ingredients;
$pageNumber = $request->pageNumber;


$apiKey = "555f31f67b4bb986db3deb3f70e93a92";

$requestUrl = "http://food2fork.com/api/search?key=" . $apiKey . ";q=" . implode(",", $ingredients);
if($pageNumber !== null){
    $requestUrl = $requestUrl . ";page=" . $pageNumber;
}


$curl = curl_init($requestUrl);
$result = curl_exec($curl);

echo $result;
?>