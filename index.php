<!DOCTYPE html>
<html>
<head>
    <title>
        Best Cooking App
    </title>
    <link rel="stylesheet" type="text/css" href="bower_components/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/simple-sidebar.css">
</head>
<body ng-app="cookingRecommendation">

    <div ng-include="'view/main.php'"></div>

    <script src="bower_components/jquery/dist/jquery.js"></script>
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="bower_components/angular/angular.js"></script>

    <script src="script/application.js"></script>
    <script src="script/controller/mainController.js"></script>
</body>
</html>






<?php
/*
 * init database
 * */
require  'external/Medoo.php';

use Medoo\Medoo;
$database = new Medoo([
    'database_type' => 'mysql',
    'database_name' => 'fridgerecomandation',
    'server' => 'localhost',
    'username' => 'root',
    'password' => ''
]);

// Enjoy
//$database->insert('ingredient', [
//    'name' => 'mar'
//]);

$data = $database->select('ingredient', [
    'id',
    'name'
], [
    'id' => 2
]);

echo json_encode($data);
?>