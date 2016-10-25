
angular.element(document).ready(function()
{
    var myDiv1 = document.getElementById("getmsg");
    angular.bootstrap(myDiv1, ["getmsg"]);
});
var app = angular.module('getmsg',[]);

app.controller('DRgetmsgcontroller',function($scope,$http)
{
getmessage();
	function getmessage(){
	 
	//window.alert("fduhyuidf");
  $http.post("../model/DRgetmsgModel.php").success(function(data){
 // arrayData = JSON.parse(data);

        $scope.msgs = data;
		//alert($scope.msgs);  
       });
	   
  };
  $scope.readmessage=function()
  {
	 
	//alert("fkgf");
  $http.post("../model/DRreadmsgsModel.php").success(function(data){
 // arrayData = JSON.parse(data);  
       });
	   
  };
  
  $scope.sendmsg = function ()
    {
	
	$to=document.getElementById('to_id').value;
	//window.alert($to);
	
	
        $http.post("../model/DRsentMsgAngular.php",{'msg':$scope.msg,'subject':$scope.subject,'to_id':$to}).success(function(data){
			getmessage();
			$scope.msg = "";
               $scope.subject = "";
                   
                //console.log("inserted successfully");
            });
			
			
    };
});

