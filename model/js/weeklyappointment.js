/**
 * Created by magic net on 6/7/2016.
 */
var pres = angular.module('w',[]);

pres.controller('weeklyappController',function($scope,$http)
{
    $scope.getday = function ()
    {
        $http.post("../model/weeklyAppointmentModel.php",{'day':$scope.day})
            .then(function (response) {$scope.result = response.data.records;})
            .success(function(data,status,header,config){
                console.log("selected successfully");
            });
    }
});
