var baseURL = 'https://research.cardinalstone.com/api/v1/';

/**
 * This angular mini-app controls the scrolling ticker 
 */
angular.module('ScrollingTickersApp', [])

.controller('MainController', function($scope, ScrollingTickersAppService){

	ScrollingTickersAppService.getWebTickers().then(function(response){
		$scope.webTickers = response.data;
		
	});
	

})

.service('ScrollingTickersAppService', function($http, $interval){
	return{
		getWebTickers: function(){
			var promise = $http.get(baseURL + 'web-tickers');
			return promise;
		}
	}
})