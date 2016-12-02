/**
 * Created by vvpol on 02.12.2016.
 */
'use strict';
(function(){
    var app = angular.module('testApp', []);
    function controller($scope, $http){
        $scope.login = function(){
            //  rpc2: function(method, params, success){
            var answer = {
                url: 'https://oauth.vk.com/authorize',
                'client_id': '5756898',
                'scope': 'offline',
                'redirect_uri': 'https://isbs.metasystems.ru/manager/test/vk/secure.php',
                'response_type': 'token'
            };
            $http.get('https://oauth.vk.com/authorize', answer)
                .success(function(response, retCode){
                    if (response.error != undefined){
                        alert(response.error);
                    } else {
                        success(response.result, retCode);
                    }
                });
        }
    }
    app.controller('testController', controller);
    app.factory('responseInterceptor', function(){
        var response = function(response) {
            console.log(response);
//            var user = response.data.user;
//            if(user) {
//                user.downloadTimetamp = (new Date()).getTime();
//                user.spaceShip = SpaceShipService.getSpaceShipById(user.spaceShipId);
 //           }
        }

        return {
            response: response
        }
    });
    app.config(['$httpProvider', function($httpProvider) {
        $httpProvider.interceptors.push(['$rootScope', '$q', /*'httpBuffer',*/ function($rootScope, $q/*, httpBuffer*/){
        //    var response = function(response) {
        //        console.log(response);
        //    }
            return {
                response: function(response) {
                    console.log(response);
                }
            }
        }]);
    }]);
    }
)();