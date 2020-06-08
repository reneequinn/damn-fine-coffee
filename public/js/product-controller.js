const app = angular.module('product', []);
app.controller('productCtrl', ($scope) => {
  $scope.qty = 1;
  $scope.decQty = () => {
    return $scope.qty--;
  };
  $scope.incQty = () => {
    return $scope.qty++;
  };
});
