var baseURL = 'https://192.168.10.13/projects/webapps/researchPortalCrud/public/api/v1/';
var cspApi = "https://api.cardinalstone.com/";
var api = "https://132.148.17.11/cspapi/public/";

angular.module('SideBarApp', [])

.controller('MainController', function($scope, SideBarAppService){

	SideBarAppService.getStockGainersLosers().then(function(response){
		$scope.stockGainersLosers = response.data;
	});

})

.service('SideBarAppService', function($http, $interval){
	return{

		/**
		 * Returns a promise of the top 5 gainers and losers in the market
		 * @return {[type]} [description]
		 */
		getStockGainersLosers: function(){
			return $http.get(api + 'top-gainers-losers');
		},


	}
})

.filter('abs', function () {
    return function(val) {
        return Math.abs(val);
    }
})