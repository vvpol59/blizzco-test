/**
 * Created by vvpol on 02.12.2016.
 */
'use strict';
(function(){
    var app = angular.module('testApp', []);
    function controller($scope, $http){
        $scope.login = function(){
            var url = 'https://oauth.vk.com/authorize?client_id=5760260&scope=offline&redirect_uri=https://isbs.metasystems.ru/manager/test/vk/verify.php&response_type=code';
            $http.get(url)
                .success(function(response, retCode){
                    if (response.error != undefined){
                        alert(response.error);
                    } else {
                        success(response.result, retCode);
                    }
                })
                .then(function(){
                    console.log(arguments);
                })
            ;
        }
    }
    app.controller('testController', controller);
    app.config(['$httpProvider', function($httpProvider) {
        $httpProvider.interceptors.push(['$rootScope', '$q', /*'httpBuffer',*/ function($rootScope, $q/*, httpBuffer*/){
            return {
                response: function(response) {
                    console.log(response);
                },
                rejectReason: function(rejectReason){
                    console.log(rejectReason);
                },
                responseError: function(rejectReason){
                    console.log(rejectReason);
                }
            }
        }]);
    }]);
    }
)();