app.controller("loginController", function($scope, $uibModalInstance, user, $http){

    $scope.isUerAlreadyLogged = true;
    $scope.user = user;
    if($scope.user === null){
        $scope.isUerAlreadyLogged = false;
    }
    $scope.error = false;

    $scope.selected = {
        email: "",
        password: ""
    };

    $scope.close = function(){
        $uibModalInstance.dismiss('cancel');
    };

    $scope.login = function(){
        $http.post("service/checkUserCredentials.php", {
            user: {
                email: $scope.selected.email,
                password:$scope.selected.password }
        }).then(function(response){
            console.log(response);
            $scope.error = !(response.data == 'true');

            if(!$scope.error){
                $uibModalInstance.close({
                    email: $scope.selected.email,
                    login: true
                });
            }

        }, function(err){
            console.log(err);
        });

    };

    $scope.logout = function(){
        $uibModalInstance.close({login: false});
    };

});

