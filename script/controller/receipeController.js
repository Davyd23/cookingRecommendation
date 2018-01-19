app.controller("ReceipeController", function($scope, $uibModalInstance, receipe, $sce, $http, userId){

    $scope.receipe = receipe;
    $scope.userId = userId;
    $scope.comments = [];

    $scope.trustSrc = function(src) {
        return $sce.trustAsResourceUrl(src);
    };

     $scope.selected = {
        message: ""
     };

    $scope.close = function(){
        $uibModalInstance.dismiss('cancel');
    };

    $scope.addComment = function(message){
        $http.post("service/addCommentToReceipe.php", {userId: $scope.userId, receipe: $scope.receipe, comment: message}).then(function(response){
            console.log(response);
            $scope.getCommentsForReceipe();
        }, function(err){
            console.log(err);
        });

        $scope.selected.message = "";
    };

    $scope.getCommentsForReceipe = function(){
        $http.post("service/getCommentsForReceipe.php", {receipe: $scope.receipe}).then(function(response){
            console.log(response);
            $scope.comments = response.data;
        }, function(err){
            console.log(err);
        });
    };
    $scope.getCommentsForReceipe();

});

