var apps = angular.module('homePageApp', ["ngRoute"]);

/*apps.config(function ($interpolateProvider){
	$interpolateProvider.startSymbol('<%');
	$interpolateProvider.endSymbol('%>');
});*/

 apps.config( [ '$httpProvider', function($httpProvider){
    // For Access-Control-Allow-Origin and Set-Cookie header
    $httpProvider.defaults.withCredentials = true;
   

  }]); 

apps.run(function (){
	
});



apps.controller('homePageController', function($scope, $http){
	$scope.driversList = [
		      {
		          Driver: {
		              givenName: 'Sebastian',
		              familyName: 'Vettel'
		          },
		          points: 322,
		          nationality: "German",
		          Constructors: [
		              {name: "Red Bull"}
		          ]
		      },
		      {
		          Driver: {
		          givenName: 'Fernando',
		              familyName: 'Alonso'
		          },
		          points: 207,
		          nationality: "Spanish",
		          Constructors: [
		              {name: "Ferrari"}
		          ]
		      }
		    ];

	 $http.get("https://portal.cardinalstone.com/broker/stest_cors/public/")
	   			 	.success(function(response) {
	       				$scope.apiData =  response;			
    	});



					/*$http({
					    url: 'https://portal.cardinalstone.com/broker/stest_cors/public/cors/highlight',
					    dataType: 'json',
					    method: 'GET',
					    data: '',
					    headers: {
					        "Content-Type": "application/json"
					    }

					}).success(function(response){
					    $scope.apiData = response;
					}).error(function(error){
					    $scope.error = error;
					});*/


});

