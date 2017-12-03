<?php

function getAllIngredientsWithCategory($database){

    /*
     * column name alias because the framework (medoo) overwrites the first selected column beucase
     * them have the same column name
     * */
    $data = $database->select('ingredient_to_category',[
        "[><]ingredient"=>["id_ingredient" => "id" ],
        "[><]product_category"=>["id_category" => "id" ]
    ], [
        "ingredient.name(ingredientName)",
        "product_category.name(productCategoryName)"

    ]);

    return $data;
}

?>