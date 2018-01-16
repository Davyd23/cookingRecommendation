app.controller("MainController", function($scope, $http, $filter, $uibModal){
    $scope.allIngredientsGroupedByCategory = [];
    $scope.menuToggled = {};
    $scope.availableIngredientsList = [];
    $scope.receipes = [];
    $scope.selected = {
        sortBy: "r"
    } ;
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
        //if($scope.availableIngredientsList.length !== 0 ){
            $http.post("service/receipesByIngredientsFromFood2Fork.php", {ingredients:$scope.availableIngredientsList,  pageNumber: 1, sort:$scope.selected.sortBy}).then(function(response){
                console.log(response);
                $scope.receipes = removeExtraTextFromReceipes(response.data).recipes;
            }, function(err){
                console.log(err);
            });
        //}
    };

    $scope.loadMoreReceipes = function(){
        if($scope.receipes.length !== 0){
            var page = ($scope.receipes.length / ingredientsPerRequest) +1;
            $http.post("service/receipesByIngredientsFromFood2Fork.php", {ingredients:$scope.availableIngredientsList, pageNumber: page, sort:$scope.selected.sortBy}).then(function(response){
                console.log(response);
                $scope.receipes = $scope.receipes.concat( removeExtraTextFromReceipes(response.data).recipes );
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

