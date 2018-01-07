<?php
require '../dao/ingredientDAO.php';
require  '../external/Medoo.php';

use Medoo\Medoo;

function getAllIngredientsGroupedByCategory(){
    $database = new Medoo([
        'database_type' => 'mysql',
        'database_name' => 'fridgerecomandation',
        'server' => '192.168.99.100',
        'username' => 'root',
        'password' => 'pass'
    ]);

    $data = getAllIngredientsWithCategory($database);

    $aggregratedArray = array();
    for ($i = 0; $i < count($data); $i++) {
        if(!array_key_exists( $data[$i]["productCategoryName"], $aggregratedArray ) ){
            $aggregratedArray[$data[$i]["productCategoryName"] ] = array();
        }

        array_push($aggregratedArray[$data[$i]["productCategoryName"] ], $data[$i]["ingredientName"] );

    }

    return $aggregratedArray;
}

echo json_encode(getAllIngredientsGroupedByCategory() );
?>