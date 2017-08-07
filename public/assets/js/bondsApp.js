var bondsApp = angular.module("bondsApp", []);

bondsApp.controller('mainController', function($scope, $http, $window){
	$scope.test = "tested";
	$scope.bondName = angular.element('#bond-select option:selected').text();
	$scope.apiUrl = $window.phpvar.baseUrl + "getBondData/" + $scope.bondName;
	//Getting the market data info for the first load
		$http.get("")
				 .then(function(response){
				 	$scope.symbols = response.data.symbols;
				 	
		});

});

