<?php



$connection_link = mysqli_connect("localhost", "root", "baheya", "baheya");
if (!$connection_link)
{
    throw new Exception(" Connection Failed" . mysqli_error());
}  else
{
    session_start();


    $sql=" select COMMENT,DATE,taskID,doctor.NAME from task_comment ,doctor
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
