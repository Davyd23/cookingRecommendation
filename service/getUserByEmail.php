<?php
$postdata = file_get_contents("php://input");
$request = json_decode($postdata);
$email = $request->email;


require  '../external/Medoo.php';

use Medoo\Medoo;

$database = new Medoo([
    'database_type' => 'mysql',
    'database_name' => 'fridgerecomandation',
    'server' => 'localhost',
    'username' => 'root',
    'password' => ''
]);

$sql = "Select u.id, u.email from users u where u.email='" . $email ."'";

$data = $database->query($sql)->fetchAll(PDO::FETCH_ASSOC);

$user ;

if(count($data) == 0){
     $database->insert("users", [
        "email"=> $email,
        "password"=> "to_be_implemented"
    ]);

    $sql = "Select u.id, u.email from users u where u.email='" . $email. "'";

    $data = $database->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    $user = $data[0];
}else{
    $user = $data[0];
}

echo json_encode($user);

?>