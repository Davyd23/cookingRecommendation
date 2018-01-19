<?php
$postdata = file_get_contents("php://input");
$request = json_decode($postdata);
$receipe = $request->receipe;
$userId = $request->userId;
$comment = $request->comment;

require  '../external/Medoo.php';

use Medoo\Medoo;

$database = new Medoo([
    'database_type' => 'mysql',
    'database_name' => 'fridgerecomandation',
    'server' => 'localhost',
    'username' => 'root',
    'password' => ''
]);

$sql = "Select r.id, r.name, r.external_id from receipe r where r.external_id = ";
$sql = $sql . "" . $receipe->recipe_id . "";

$data = $database->query($sql)->fetchAll(PDO::FETCH_ASSOC);

$receipeId = 0;

if(count($data) == 0){
    $database->insert("receipe", [
        "name"=> $receipe->title,
        "external_id"=> $receipe->recipe_id
    ]);

    $receipeId = $database->id();
}else{
    $receipeId = $data[0]["id"];
}

$database->insert("comment", [
    "id_user"=> $userId,
    "id_receipe"=> $receipeId,
    "message"=>$comment
]);


?>