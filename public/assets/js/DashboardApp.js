var DashboardApp = angular.module("DashboardApp", ['datatables', 'datatables.scroller']);

var baseUrl = "http://192.168.11.203/projects/webapps/researchPortalCrud/public/api/v1/";


DashboardApp.controller('mainController', function($scope, $http, $interval, DashboardAppService){

    $scope.getAllCorporateResults = function(){
        return DashboardAppService.getAllCorporateResults();
    };

    $scope.registerApiUser = function(){
        return DashboardAppService.registerApiUser();
    };

     $scope.loginApiUser = function(){
        return DashboardAppService.loginApiUser();
    };

});


DashboardApp.service('DashboardAppService', function( $http, $interval){

    return {
        

        /**
         * Registers the user that will grant authenticated access to the API endpoint.
         */
        registerApiUser: function(){
            $http.post(baseUrl + "register-api-user", { "name":"apiUser", "email":"apiUser@mail.com", "password":"apiUserPassword" }, {})

                //On success
                .then(function(response){
                    console.log("Api user was successfully created");
                   
                },
                //On Error
                function(response){
                    console.log('An error occured while creating the Api User');
                });
        },

        /**
         * Logs in the api user and returns a token to be used in validating subsequent api calls
         * @return String  $token  The token used to authenticate future api calls
         */
        loginApiUser: function(){
             $http.post(baseUrl + "login-api-user", { "email":"apiUser@mail.com", "password":"apiUserPassword" }, {})

                //On success
                .then(function(response){
                    console.log("Api user was successfully logged in");
                    console.log(response);
                },
                //On Error
                function(response){
                    console.log('An error occured while logging in the Api User');
                });
        },


        /**
         * Returns all the corporate results stored on the research portal Database
         */
        getAllCorporateResults: function(){
            return $http.get(baseUrl + "corporate-results")

                //On success
                .then(function(response){
                    return response.data;
                },
                //On error
                function(response){

                });
        },



    }

});