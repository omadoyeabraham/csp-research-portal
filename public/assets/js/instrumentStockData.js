var instrumentDataApp = angular.module("instrumentDataApp", []);

instrumentDataApp.controller('mainController', function($scope, $http, $interval){
		
		$scope.dtOptions = { 
			paging: false,
			 searching: true ,
			  "columnDefs" : [
                {
                    "targets": [11],
                    "sortable": false //Ensures that the table isn't sortable by download buttons.
                }
            ], 
            "language": {
                "emptyTable": "Loading Instrument Data ..."
            }
		};

		$http.get("https://portal.cardinalstone.com/broker/stest_cors/public/api/symbols?source=rp")
				 .then(function(response){
				 	$scope.symbols = response.data.symbols;

				 	 for(var i = 0; i < $scope.symbols.length; i++) {
						if($scope.symbols[i].name == phpvar.instrumentName)
						{
							console.log($scope.symbols[i].name);
							$scope.highPrice = $scope.symbols[i].highPrice;
							$scope.volume = $scope.symbols[i].quantityTraded;
							$scope.value = $scope.symbols[i].valueTraded;
						}
				 }
				 });

				

		/*$interval(function() {

	       	$http.get("https://portal.cardinalstone.com/broker/stest_cors/public/api/symbols?source=rp")
				 .then(function(response){
				 	$scope.symbols = response.data.symbols;
				 	//console.log(20);
				 });
				 console.log(symbols);

	    }, 1000000);*/
		

		

});