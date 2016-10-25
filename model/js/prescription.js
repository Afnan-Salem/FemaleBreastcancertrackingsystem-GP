/**
 * Created by tahany on 4/14/2016.
 */

var app = angular.module('prescriptionForm',[]);

app.controller('prescriptionController',function($scope,$http)
{
    $scope.insertprescription = function ()
    {
        $http.post("../model/doctorPrescriptionModel.php",{'medicine':$scope.medicine,'frequency':$scope.frequency,'instruction':$scope.instruction})
            .success(function(data,status,header,config){
                console.log("inserted successfully");
            });
    }
});

