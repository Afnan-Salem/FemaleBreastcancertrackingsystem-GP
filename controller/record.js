/**
 * Created by tahany on 5/25/2016.
 */
//**
// * Created by tahany on 4/14/2016.
// */

angular.element(document).ready(function()
{
    var myDiv1 = document.getElementById("prescriptionForm");
    angular.bootstrap(myDiv1, ["P"]);

    var myDiv3 = document.getElementById("updateForm");
    angular.bootstrap(myDiv3, ["R"]);

    var myDiv1 = document.getElementById("instructionForm");
    angular.bootstrap(myDiv1, ["I"]);
});

var app = angular.module('P', []);

app.controller('PrescController', function($scope, $http)
{
    getPrescriptions(); // Load all available tasks
    function getPrescriptions(){
        $http.post("../model/PreviewPrescriptionModel.php").success(function(data){
            $scope.presc = data;
            console.log("res "+data);
        });
    };

    $scope.addMedicine = function () {
        $http.post("../model/checkMedicine.php",{'medicine':$scope.medicine}).success(function(data){
            if(data=="")
            {
                alert("Please Choose medicine from the list");
            }else
            {
                $http.post("../model/doctorPrescriptionModel.php",{'medicine':$scope.medicine,'frequency':$scope.frequency,'instruction':$scope.instruction}).success(function(data){
                    getPrescriptions();
                    $scope.instruction = "";
                    $scope.medicine = "";
                    $scope.frequency = "";
                    console.log("pres"+data);
                });
            }
        });
    };
    $scope.deleteMedicine = function (Drug_ID,FREQUENCY,INSTRUCTIONS,PRESID) {
        $http.post("../model/deletePrescription.php?ID="+PRESID+"&med="+Drug_ID+"&freq="+FREQUENCY+"&inst="+INSTRUCTIONS).success(function(data){
            console.log("deleted  "+data);
            getPrescriptions();
        });
    };
});


var record = angular.module('R',[]);
record.controller('updatecontroller',function($scope,$http)
{
    $scope.updateRec = function ()
    {
        $http.post("../model/updateRecordModel.php",{'node':$scope.node})
            .success(function(data,status,header,config){
                console.log("updated successfully");
            });
    }
});


var ins = angular.module('I', []);

ins.controller('InstController', function($scope, $http)
{
    getTasks();
    getDoctors();// Load all available tasks
    function getTasks(){
        $http.post("../model/previewTasks.php").success(function(data){
            $scope.tasks = data;
            console.log("result "+data);
        });
    };
    function getDoctors(){
        $http.post("../model/getDoctors.php").success(function(data){
            $scope.name = "Filter Based on Select Value";
            $scope.doctors = data;
        });
    };
    $scope.addTask = function () {
        $http.post("../model/instructionModel.php",{'assigned':$scope.assigned,'title':$scope.title,'taskInstruction':$scope.taskInstruction}).success(function(data){
            getTasks();
            getDoctors();
            $scope.assigned = "";
            $scope.title = "";
            $scope.taskInstruction = "";
            console.log("inserted "+ data);
        });
    };
    $scope.deleteMedicine = function (taskID,DID)
    {
        $http.post("../model/deleteInstruction.php?ID="+taskID+"&doctor="+DID).success(function(data){
            getTasks();
            getDoctors();
            console.log("deleted "+data);
        });
    };
});