const app = angular.module('contact', []);
app.controller('contactCtrl', ($scope) => {
  $scope.handleSubmit = () => {
    $scope.success = true;
    $scope.name = null;
    $scope.email = null;
    $scope.subject = null;
    $scope.message = null;
    $scope.contact.$setPristine();
    $scope.contact.$setUntouched();
  };
});
