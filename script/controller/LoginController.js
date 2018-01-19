app.controller("loginController", function($scope, $uibModalInstance, user){

    $scope.user = user;

    $scope.selected = {
        email: ""
    };

    $scope.close = function(){
        $uibModalInstance.dismiss('cancel');
    };

    $scope.login = function(){
        $uibModalInstance.close($scope.selected.email);
    };

});

