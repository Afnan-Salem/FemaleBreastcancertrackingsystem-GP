<?php

//$data = json_decode(file_get_contents("php://input"));

$connection_link = mysqli_connect("localhost", "root", "baheya", "baheya");
if (!$connection_link)
{
    throw new Exception(" Connection Failed" . mysqli_error());
}  else
{
    session_start();


   /* $sql="select `t`.`DID`,`t`.`TITLE`,`t`.`description`,`t`.`initiation_date` , `c`.`COMMENT` ,
 `c`.`DATE`  , `c`.`ATTACHEMENT`, `c`.`DID` , `c`.`taskID` from `tasks` AS `t` LEFT JOIN `task_comment` AS `c`
  ON(`t`.`task_ID` = `c`.`taskID` AND `t`.`PID`= 1)
";*/

    $sql=" select COMMENT,DATE,TIME,taskID,doctor.NAME from task_comment ,doctor
where doctor.DID=task_comment.DID";

    //
    mysqli_query($connection_link, "SET NAMES 'utf8'");
    $result = mysqli_query($connection_link, $sql);
    //$result = mysqli_query($conn, $sql);
    $arr=array();
    if($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {

            $arr[] = $row;
            //echo $row["SUBJECT"];
        }
    }

    echo $json_response = json_encode($arr);

    mysqli_close($connection_link);
}




?>
