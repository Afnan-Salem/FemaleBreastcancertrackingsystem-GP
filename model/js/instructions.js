/**
 * Created by tahany on 4/16/2016.
 */


var app = angular.module('instructionForm',[]);

app.controller('instructionController',function($scope,$http)
{
    $scope.insertInstruction = function ()
    {
        $http.post("../model/instructionModel.php",{'specialist':$scope.specialist,'title':$scope.title,'instruction':$scope.instruction})
            .success(function(data,status,header,config){
                console.log("inserted successfully");
            });
    }
});

