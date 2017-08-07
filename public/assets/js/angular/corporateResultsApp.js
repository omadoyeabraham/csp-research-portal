/**
 * This app controls the corporate reports table page
 */

//var baseURL = 'http://researchportal.dev/api/v1/';
var baseURL = 'https://research.cardinalstone.com/api/v1/';

angular.module('CorporateResultsApp', ['datatables', 'datatables.scroller'])

.controller('MainController', function($scope, CorporateResultsService){
	$scope.dtOptions = { 
			paging: true, searching: true , scroller: true,
			scrollY: '70vh', scrollX: true,
			  
			  "columnDefs" : [
                {
                    "targets": [7],
                    "sortable": false //Ensures that the table isn't sortable by download buttons.
                }
            ], 
            "language": {
                "emptyTable": "Loading Corporate Results ..."
            }
		};
	//The call to the service returns a promise that is resolved here in the controller
	 CorporateResultsService.getAllCorporateResults().then(function(response){
	 	$scope.allCorporateResults = response.data;
	});
	
})

.service('CorporateResultsService', function($http, $interval){
	return{

			/**
			 * Returns all the corporate results in the database
			 * @return Promise  the promise returned by the $http call
			 */
			 getAllCorporateResults: function(){
			 	//Have to return the $http call, because it returns a promise which is then resolved in the controller
			 	 return $http.get(baseURL + "corporate-results");	
			 },
		}

});