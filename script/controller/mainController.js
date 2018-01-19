app.controller("MainController", function($scope, $http, $filter, $uibModal, $cookies){
    $scope.allIngredientsGroupedByCategory = [];
    $scope.menuToggled = {};
    $scope.availableIngredientsList = [];
    $scope.receipes = [];

    $scope.user = null;
    $scope.selected = {
        sortBy: "r"
    } ;
    var favoriteReceipesIdsForUser = [];
    var ingredientsPerRequest = 30; //maximum value is 30
    $http.get("service/IngredientsGroupedByCategory.php").then(function(response){
        console.log(response);
        $scope.allIngredientsGroupedByCategory = response.data;
        for(var key in $scope.allIngredientsGroupedByCategory){
            $scope.allIngredientsGroupedByCategory[key] = removeDuplicates($scope.allIngredientsGroupedByCategory[key]);
        }
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

    $scope.getUserByEmail = function(email){
        $http.post("service/getUserByEmail.php", {email:email}).then(function(response){
            console.log(response);
            $scope.user = response.data;
            $cookies.put('userEmail', $scope.user.email);
            $scope.getFavoredReceipesForUser();

        }, function(err){
            console.log(err);
        });
    };

    if($cookies.get('userEmail') ){
        $scope.getUserByEmail($cookies.get('userEmail') );
    }


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
        $http.post("service/addToFavorite.php", {userId: $scope.user.id, receipe: receipe}).then(function(response){
            console.log(response);
        }, function(err){
            console.log(err);
        });
        receipe.favored = !receipe.favored;
    };

    $scope.getFavoredReceipesForUser = function(){
        $http.post("service/getFavoredReceipesForUser.php", {userId: $scope.user.id}).then(function(response){
            console.log(response);
            favoriteReceipesIdsForUser = getOnlyTheObjectValues(response.data);
            $scope.getReceipes();
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
                },
                userId: function() {
                    return $scope.user.id;
                }
            }
        });

        modalInstance.result.then(function (selectedItem) {
            //success
        }, function () {
            //failure
        });
    };

    $scope.openUserModal = function(){
        var modalInstance = $uibModal.open({
            ariaLabelledBy: 'modal-title',
            ariaDescribedBy: 'modal-body',
            templateUrl: 'view/login.html',
            controller: 'loginController',
            size: 500,
            resolve: {
                user: function () {
                    return $scope.user;
                }
            }
        });

        modalInstance.result.then(function (object) {
            if(object.login){
                $scope.getUserByEmail(object.email);
            }else{
                $scope.user = null;
                $cookies.remove("userEmail");
            }
        }, function () {
            //failure
        });
    };

    function removeDuplicates(arr){
        var unique_array = [];
        for(var i = 0;i < arr.length; i++){
            if(unique_array.indexOf(arr[i]) == -1){
                unique_array.push(arr[i])
            }
        }
        return unique_array
    };

});

