<!DOCTYPE html>
<html>
<head>
    <title>
        Best Cooking App
    </title>
    <link rel="stylesheet" type="text/css" href="bower_components/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="bower_components/components-font-awesome/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="css/simple-sidebar.css">

    <link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body ng-app="cookingRecommendation">

    <div ng-include="'view/main.php'"></div>

    <script src="bower_components/jquery/dist/jquery.js"></script>
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="bower_components/angular/angular.js"></script>
    <script src="bower_components/angular-sanitize/angular-sanitize.js"></script>
    <script src="bower_components/angular-bootstrap/ui-bootstrap-tpls.js"></script>

    <script src="script/application.js"></script>
    <script src="script/controller/mainController.js"></script>
    <script src="script/controller/receipeController.js"></script>
</body>
</html>
