/**
 * Created by tahany on 4/14/2016.
 */

var app = angular.module('updateapp',[]);

app.controller('updatecontroller',function($scope,$http)
{
    $scope.insertprescription = function ()
    {
        $http.post("../model/updateRecordModel.php",{'node':$scope.node,'diss':$scope.diss})
            .success(function(data,status,header,config){
                console.log("inserted successfully");
            });
    }
});

