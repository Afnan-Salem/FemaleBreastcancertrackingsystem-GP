/**
 * Created by tahany on 6/10/2016.
 */

angular.element(document).ready(function()
{
    var myDiv1 = document.getElementById("DRpateients");
    angular.bootstrap(myDiv1, ["P"]);
});

var app = angular.module('P', []);

app.controller('DRpateientsCotroller', function($scope, $http) {
    getPatients(); // Load all available tasks
    function getPatients() {
        console.log("rrr");
        $http.post("../model/archievedPatients.php").success(function (data) {
            $scope.patients = data;
        });
    };
});