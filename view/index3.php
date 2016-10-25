<?php

include_once("../controller/taskcontroller.php");
//echo "1111";
//$_SESSION['commentDName']=$_SESSION['commentNameD'];
$controller = new taskcontroller();
$controller-> _gettasks();

?>