<?php
$postdata = file_get_contents("php://input");
$request = json_decode($postdata);
$ingredients = $request->ingredients;

require  '../external/Medoo.php';

use Medoo\Medoo;

$database = new Medoo([
    'database_type' => 'mysql',
    'database_name' => 'fridgerecomandation',
    'server' => 'localhost',
    'username' => 'root',
    'password' => ''
]);

/*
 * Query-ul returneaza o lista de retete ordonate dupa numarul de ingrediente care se gasesc in reteta
 * fata de ingredientele selectate de utilizator
 * */

/*
 * Select r.name from ingredient_to_receipe itr inner join  ingredient i on itr.id_ingredient = i.id
 * inner join receipe r on itr.id_receipe = r.id where i.name in ("banana", "apple") group by r.id order by count(r.name) desc
 * */

$sql = "Select r.id, r.name, count(r.name) as matchingIngredientsCount from ingredient_to_receipe itr inner join  ingredient i on itr.id_ingredient = i.id inner join receipe r on itr.id_receipe = r.id where i.name in (";

for ($i = 0; $i < count($ingredients); $i++) {
    if($i != 0){
        $sql = $sql . ", ";
    }
    $sql = $sql . "'" . $ingredients[$i] . "'";
}

$sql = $sql . ") group by r.id order by count(r.name) desc" ;


$data = $database->query($sql)->fetchAll(PDO::FETCH_ASSOC);

$firstQueryData = $data;

$receipeIds = array();

for ($i = 0; $i < count($data); $i++) {
    array_push($receipeIds,(int) $data[$i]["id"]);
}

$data = $database->select('ingredient_to_receipe',[
    "[><]ingredient"=>["id_ingredient" => "id" ],
    "[><]receipe"=>["id_receipe" => "id" ]
], [
    "ingredient.name(ingredientName)",
    "receipe.name(receipeName)"
],[
    "AND" => [
        "receipe.id" => $receipeIds
    ]
]);

$aggregratedArray = array();
for ($i = 0; $i < count($data); $i++) {
    if(!array_key_exists( $data[$i]["receipeName"], $aggregratedArray ) ){
        $aggregratedArray[$data[$i]["receipeName"] ] = array();

        for($j = 0; $j < count($firstQueryData); $j++ ){
            if($firstQueryData[$j]["name"] === $data[$i]["receipeName"] ){
                $aggregratedArray[$data[$i]["receipeName"] ]["matchingIngredientsCount"] = $firstQueryData[$j]["matchingIngredientsCount"];
                break;
            }
        }

        $aggregratedArray[$data[$i]["receipeName"] ]["ingredients"] = array();
    }

    array_push($aggregratedArray[$data[$i]["receipeName"] ]["ingredients"], $data[$i]["ingredientName"] );
}

echo json_encode($aggregratedArray);
?>