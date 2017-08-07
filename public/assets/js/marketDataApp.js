var marketDataApp = angular.module("marketDataApp", ['datatables', 'datatables.scroller']);

marketDataApp.controller('mainController', function($scope, $http, $interval){

		$scope.dtOptions = { 
			paging: true,
			 searching: true ,
			 scroller: true,
			 scrollY: '70vh',
			 scrollX: true,
			  "columns": [
                { "width": "15%" },
                null,
                null,
                null,
                null
              ],
			  "columnDefs" : [
                {
                    "targets": [11],
                    "sortable": false //Ensures that the table isn't sortable by download buttons.
                }
            ], 
            "language": {
                "emptyTable": "Loading Market Data ..."
            }
		};



		//Getting the market data info for the first load
		$http.get("https://portal.cardinalstone.com/broker/stest_cors/public/api/symbols?source=rp")
				 .then(function(response){
				 	$scope.symbols = response.data.symbols;
				 	
				 });

		//Reloading Market data at 30 seconds interval
		$interval(function() {

	       	$http.get("https://portal.cardinalstone.com/broker/stest_cors/public/api/symbols?source=rp")
				 .then(function(response){
				 	$scope.symbols = response.data.symbols;
				 });

	    }, 300000);
		

		

});