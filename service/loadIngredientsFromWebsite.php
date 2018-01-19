<?php

require  '../external/Medoo.php';

use Medoo\Medoo;

$database = new Medoo([
    'database_type' => 'mysql',
    'database_name' => 'fridgerecomandation',
    'server' => 'localhost',
    'username' => 'root',
    'password' => ''
]);

function getAllIngredientsFromPage($url){
    $handle = curl_init($url);
    curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
    $html = curl_exec($handle);
    libxml_use_internal_errors(true); // Prevent HTML errors from displaying
    $doc = new DOMDocument();
    $doc->loadHTML($html);

    $ingredients = array();

    foreach($doc->getElementsByTagName('li') as $element ){
        if($element->getAttribute("itemprop")=="item"){
            $a = $element->getElementsByTagName("a")->item(0);
            array_push($ingredients, $a->getAttribute("title") );
        }
    }

    return $ingredients;
}

function insertIngredientsInTheDatabase($category, $ingredients, $database){
    $sql = "Select c.id from product_category c where c.name = " . $category;

    $data = $database->query($sql)->fetchAll(PDO::FETCH_ASSOC);

    $categoryId = 0;

    if(count($data) == 0){
        $database->insert("product_category", [
            "name"=> $category
        ]);

        $categoryId = $database->id();
    }else{
        $categoryId = $data[0]["id"];
    }

    for($k=0; $k<count($ingredients); $k++){
        $database->insert("ingredient", [
            "name"=> $ingredients[$k]
        ]);
        $ingredientId = $database->id();
        $database->insert("ingredient_to_category", [
            "id_category"=> $categoryId,
            "id_ingredient"=> $ingredientId
        ]);
    }
}



$categorys = array('vegetables', 'spices-and-herbs', 'cereals-and-pulses', 'meat', 'dairy-products', 'fruits', 'seafood', 'sugar-and-sugar-products', 'nuts-and-oilseeds', 'other-ingredients');
$pagesPerCategory = array(4, 4, 3, 2, 2, 3, 2, 1, 2, 5 );

for($i =0; $i< count($categorys); $i++){
    $ingredients = array();
    for($j=1; $j<= $pagesPerCategory[$i]; $j++){
        $url = "https://food.ndtv.com/ingredient/" . $categorys[$i] . "/page-" . $j;
        $ingredients = array_merge($ingredients,getAllIngredientsFromPage($url) );
    }
    insertIngredientsInTheDatabase($categorys[$i], $ingredients, $database);
}

echo "E gata";
?>