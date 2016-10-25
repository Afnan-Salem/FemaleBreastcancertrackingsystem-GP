
angular.element(document).ready(function()
{
    var myDiv1 = document.getElementById("all");
    angular.bootstrap(myDiv1, ["all"]);
});
var app = angular.module('all',[]);

app.controller('getall',function($scope,$http)
{
getallmessage();
	function getallmessage(){
	 
	//window.alert($sender_id);
  $http.post("../model/DRallMessegesModel.php").success(function(data){
  //arrayData = JSON.parse(data);
 //alert("rrr");

        $scope.allmsgs = data;
		//alert($scope.allmsgs);  
       });
  };
 
});

