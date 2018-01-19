<?php
$postdata = file_get_contents("php://input");
$request = json_decode($postdata);
$userId = $request->userId;

require  '../external/Medoo.php';

use Medoo\Medoo;

$database = new Medoo([
    'database_type' => 'mysql',
    'database_name' => 'fridgerecomandation',
    'server' => 'localhost',
    'username' => 'root',
    'password' => ''
]);

$sql = "Select r.external_id from user_to_receipe utr inner join receipe r on r.id = utr.id_receipe where utr.id_user =" .$userId;

$data = $database->query($sql)->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($data)

?>