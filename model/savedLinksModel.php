<?php
/**
 * Created by PhpStorm.
 * User: magic net
 * Date: 6/7/2016
 * Time: 9:24 PM
 */
session_start();
$id = $_SESSION['DID'];
$link = $_GET['lin'];
/*
$num = substr($getDay,0,1);
$name = substr($getDay,1);
//echo $getDay.' '.$num.' '.$name;
$daynum = date('w');
$week_start = date('Y-m-d', strtotime('-'.$daynum.' days'));
$day = date('Y-m-d', strtotime('+'.($num-$daynum).' days'));*/
$mysqli = mysqli_connect("localhost", "root", "baheya", "baheya");
if (!$mysqli)
{
    throw new Exception(" Connection Failed" . mysqli_error());
} else {
	//print $id;
	//print $link;
    $sql = "INSERT INTO `savedlinks`(`DID`, `Links`) VALUES ('$id','$link')";
    $result1 = $mysqli->query($sql);


    $sql2 = "SELECT `Links` FROM `savedlinks` WHERE `DID`='$id'";
    $result = $mysqli->query($sql2);
    $rows = array();
    if (!$result) {

    } else {
        $links = $_SESSION['links'];
        while ($row = $result->fetch_assoc()) {
            array_push($rows, 'link', $row['Links']);
        }
        for ($x = 0; $x < count($rows); $x += 2) {
            if (in_array($rows[$x + 1], $links)) {
            } else {
                echo "<ul>";
                echo "<li><a href='#'>" . $rows[$x + 1] . ".</a></li>
                </ul>";

            }
        }

        /*echo "<ul>";
        //print_r($result);
        for($x=0;$x<count($rows);$x=$x+2)
        {
            if($rows[$x]=='link')
            {
                echo "<li><a href='#'>".$rows[$x+1]. ".</a></li>";
            }
            $x=$x+2;
        }
    }
    echo "</ul>";*/
        mysqli_close($mysqli);
    }
}