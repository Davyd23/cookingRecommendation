app.controller("MainController", function($scope, $http, $filter, $uibModal){
    $scope.allIngredientsGroupedByCategory = [];
    $scope.menuToggled = {};
    $scope.availableIngredientsList = [];
    $scope.receipes = [];

    $scope.userId = 1; //TODO sa fie dinamic
    $scope.selected = {
        sortBy: "r"
    } ;
    var favoriteReceipesIdsForUser = [];
    var ingredientsPerRequest = 30; //maximum value is 30
    $http.get("service/IngredientsGroupedByCategory.php").then(function(response){
        console.log(response);
        $scope.allIngredientsGroupedByCategory = response.data;
    }, function(err){
        console.log(err);
    });

    /*
    * filters start
    * */

    $scope.orderByIngredientMatchDescendentAndNumberOfIngredientsAscendent = function(receipesObject){

        var receipeAray = $.map(receipesObject, function(value, index) {
            value.receipeName = index;
            return value;
        });

        return $filter("orderBy")(receipeAray, ["-matchingIngredientsCount", "ingredients.length" ]) ;
    };

    /*
    * filters end
    * */


    var removeExtraTextFromReceipes =function(receipesString){
        while(receipesString[receipesString.length-1] !== "}"){
            receipesString = receipesString.slice(0, -1);
        }
        return (JSON.parse(receipesString ) );
    };

    $scope.getReceipes = function(){
        $http.post("service/receipesByIngredientsFromFood2Fork.php", {ingredients:$scope.availableIngredientsList,  pageNumber: 1, sort:$scope.selected.sortBy}).then(function(response){
            console.log(response);
            var receipes = setFavoredReceipe(removeExtraTextFromReceipes(response.data).recipes);
            $scope.receipes = receipes;
        }, function(err){
            console.log(err);
        });

    };

    $scope.addToFavorite = function(receipe){
        $http.post("service/addToFavorite.php", {userId: $scope.userId, receipe: receipe}).then(function(response){
            console.log(response);
        }, function(err){
            console.log(err);
        });
        receipe.favored = !receipe.favored;
    };

    $scope.getFavoredReceipesForUser = function(){
        $http.post("service/getFavoredReceipesForUser.php", {userId: $scope.userId}).then(function(response){
            console.log(response);
            favoriteReceipesIdsForUser = getOnlyTheObjectValues(response.data);
        }, function(err){
            console.log(err);
        });
    };
    var getOnlyTheObjectValues = function (object) {
        var objectValues = [];
        for(var i=0; i<object.length; i++) {
            for (var key in object[i]) {
                if (object[i].hasOwnProperty(key)) {
                    objectValues.push(object[i][key]);
                }
            }
        }
        return objectValues;
    };

    $scope.getFavoredReceipesForUser();

    var setFavoredReceipe = function(receipes){
        receipes.forEach(function(receipe) {
            receipe.favored = false;
            if(favoriteReceipesIdsForUser.indexOf(receipe.recipe_id) !== -1){
                receipe.favored = true;
            }
        });

        return receipes;
    };

    $scope.loadMoreReceipes = function(){
        if($scope.receipes.length !== 0){
            var page = ($scope.receipes.length / ingredientsPerRequest) +1;
            $http.post("service/receipesByIngredientsFromFood2Fork.php", {ingredients:$scope.availableIngredientsList, pageNumber: page, sort:$scope.selected.sortBy}).then(function(response){
                console.log(response);
                var receipes = setFavoredReceipe(removeExtraTextFromReceipes(response.data).recipes);
                $scope.receipes = $scope.receipes.concat( receipes );
            }, function(err){
                console.log(err);
            });
        }
    };

    $scope.ingredientInList = function(ingredient){
        var ingredientIndex = $scope.availableIngredientsList.indexOf(ingredient);
        return ingredientIndex !== -1;
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
    };

    $scope.toggleIngredientInAvailableList = function(ingredient){
        var ingredientIndexInList = $scope.availableIngredientsList.indexOf(ingredient);
        if( ingredientIndexInList !== -1){
            $scope.availableIngredientsList.splice(ingredientIndexInList, 1);
        }else{
            $scope.availableIngredientsList.push(ingredient);
        }
    };

    $scope.openReceipeModal = function(receipe){
        var modalInstance = $uibModal.open({
            ariaLabelledBy: 'modal-title',
            ariaDescribedBy: 'modal-body',
            templateUrl: 'view/receipe.html',
            controller: 'ReceipeController',
            size: 500,
            resolve: {
                receipe: function () {
                    return receipe;
                }
            }
        });

        modalInstance.result.then(function (selectedItem) {
            //success
        }, function () {
            //failure
        });
    };

});

