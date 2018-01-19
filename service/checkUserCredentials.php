<?php
$postdata = file_get_contents("php://input");
$request = json_decode($postdata);
$user = $request->user;

require  '../external/Medoo.php';

use Medoo\Medoo;

$database = new Medoo([
    'database_type' => 'mysql',
    'database_name' => 'fridgerecomandation',
    'server' => 'localhost',
    'username' => 'root',
    'password' => ''
]);

$sql = "Select u.id from users u where u.email = '".$user->email . "' and u.password = '" .$user->password ."'";

$data = $database->query($sql)->fetchAll(PDO::FETCH_ASSOC);

if(count($data) == 0){
    echo json_encode(false);
}else{
    echo json_encode(true);
}


?>