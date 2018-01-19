app.controller("ReceipeController", function($scope, $uibModalInstance, receipe, $sce){

    $scope.receipe = receipe;

    $scope.trustSrc = function(src) {
        return $sce.trustAsResourceUrl(src);
    }

    $scope.close = function(){
        $uibModalInstance.dismiss('cancel');
    };

});

