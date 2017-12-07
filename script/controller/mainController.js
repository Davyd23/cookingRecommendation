app.controller("MainController", function($scope, $http){
    $scope.allIngredientsGroupedByCategory = [];
    $scope.menuToggled = {};
    $scope.availableIngredientsList = [];
    $scope.receipes = [];
    $http.get("service/IngredientsGroupedByCategory.php").then(function(response){
        console.log(response);
        $scope.allIngredientsGroupedByCategory = response.data;
    }, function(err){
        console.log(err);
    });


    $scope.getReceipes = function(){
        if($scope.availableIngredientsList.length !== 0 ){
            $http.post("service/receipesByIngredients.php", {ingredients:$scope.availableIngredientsList}).then(function(response){
                $scope.receipes = response.data;
            }, function(err){
                console.log(err);
            });
        }
    };


    $scope.toggleMenuCategory = function(category){
        if(!$scope.menuToggled[category] ){
            $scope.menuToggled[category] = true;
        }else{
            $scope.menuToggled[category] = false;
        }
    };

    $scope.isCategoryToggled = function(category){
        return $scope.menuToggled[category];
    }

    $scope.toggleIngredientInAvailableList = function(ingredient){
        var ingredientIndexInList = $scope.availableIngredientsList.indexOf(ingredient);
        if( ingredientIndexInList !== -1){
            $scope.availableIngredientsList.splice(ingredientIndexInList, 1);
        }else{
            $scope.availableIngredientsList.push(ingredient);
        }
    }

});