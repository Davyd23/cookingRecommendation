app.controller("MainController", function($scope, $http){
    $scope.allIngredientsGroupedByCategory = [];
    $http.get("service/IngredientsGroupedByCategory.php").then(function(response){
        console.log(response);
        $scope.allIngredientsGroupedByCategory = response.data;
    }, function(err){
        console.log(err);
    });


});