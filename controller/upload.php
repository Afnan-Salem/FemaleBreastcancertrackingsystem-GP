<?php
/**
 * Created by PhpStorm.
 * User: Wafaa
 * Date: 07/05/2016
 * Time: 05:41 ص
 */

if(isset($_POST['btn-chat']))
{

    $file = rand(1000,100000)."-".$_FILES['commentFile']['name'];
    $conn = mysqli_connect("localhost", "root", "baheya", "baheya");

    $sql="INSERT INTO task_comment (COMMENT,DATE,TIME,DID,taskID,ATTACHEMENT) VALUES(\"hdfdhfdhs\",\"2012-01-01 00:00:00\",\"01:30\",3,1,'$file');";
    $result = mysqli_query($conn, $sql);
}
?>