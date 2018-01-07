app.controller("ReceipeController", function($scope, $uibModalInstance, receipe){

    $scope.receipe = receipe;

    $scope.close = function(){
        $uibModalInstance.dismiss('cancel');
    };

});

