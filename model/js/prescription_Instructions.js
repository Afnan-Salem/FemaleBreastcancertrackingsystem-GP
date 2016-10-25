/**
 * Created by tahany on 4/14/2016.
 */

var pres = angular.module('P',[]);

pres.controller('prescriptionController',function($scope,$http)
{
    $scope.insertprescription = function ()
    {
        $http.post("../model/doctorPrescriptionModel.php",{'medicine':$scope.medicine,'frequency':$scope.frequency,'instruction':$scope.instruction})
            .success(function(data,status,header,config){
                console.log("inserted successfully");
            });
    }
});

var inst = angular.module('I',[]);

inst.controller('instructionController',function($scope,$http)
{
    $scope.insertInstruction = function ()
    {
        $http.post("../model/instructionModel.php",{'specialist':$scope.specialist,'title':$scope.title,'instruction':$scope.instruction})
            .success(function(data,status,header,config){
                console.log("inserted successfully");
            });
    }
});

var upd = angular.module('U',[]);

upd.controller('updatecontroller',function($scope,$http)
{
    $scope.insertInstruction = function ()
    {
        $http.post("../model/updateRecordModel.php",{'node':$scope.node})
            .success(function(data,status,header,config){
                console.log("Updated successfully");
            });
    }
});
angular.element(document).ready(function() {
    var myDiv1 = document.getElementById("prescriptionForm");
    angular.bootstrap(myDiv1, ["P"]);

    var myDiv2 = document.getElementById("instructionForm");
    angular.bootstrap(myDiv2, ["I"]);

    var myDiv3 = document.getElementById("updateForm");
    angular.bootstrap(myDiv3, ["U"]);
});