
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
        $http.post("../model/getCommentModel.php").success(function(data){
            // arrayData = JSON.parse(data);

            $scope.msgs = data;
            
        });
    };

    $scope.sendmsg = function (TaskID)
    {
        $Ncontent=document.getElementById('Ncontent').value;
		
        $http.post("../model/insertCommentModel.php",{'msg':$scope.msg,'tid':TaskID,'Ncontent':$Ncontent}).success(function(data){
            getmessage();
			$scope.msg="";
			
            console.log("inserted successfully");
        });


    };
});

