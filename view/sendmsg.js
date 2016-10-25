
angular.element(document).ready(function()
{
    var myDiv1 = document.getElementById("getmsg");
    angular.bootstrap(myDiv1, ["getmsg"]);
});
var app = angular.module('getmsg',[]);

app.controller('Patientgetmsgcontroller',function($scope,$http)
{
    getmessage();
    function getmessage(){

        //window.alert($sender_id);
        $http.post("../model/getcomment.php").success(function(data){
            // arrayData = JSON.parse(data);

            $scope.msgs = data;
            //alert($scope.msgs);
        });
    };

    $scope.sendmsg = function (TaskID)
    {
        //$to=document.getElementById('tid').value;
        $http.post("../model/insertcomment.php",{'msg':$scope.msg,'tid':TaskID}).success(function(data){
            getmessage();
            console.log("inserted successfully");
        });


    };
});

