<?php
/**
 * Created by PhpStorm.
 * User: magic net
 * Date: 6/7/2016
 * Time: 9:24 PM
 */
session_start();
$id = $_SESSION['DID'];
$getDay = $_GET['num'];
$num = substr($getDay,0,1);
print $num;
$name = substr($getDay,1);
print $name;
//echo $getDay.' '.$num.' '.$name;
$daynum = date('w');
print $daynum;
$week_start = date('Y-m-d', strtotime('-'.$daynum.' days'));
print $week_start;
$day = date('Y-m-d', strtotime('+'.($num-$daynum).' days'));
print $day;
$mysqli = mysqli_connect("localhost", "root", "baheya", "baheya");
if (!$mysqli)
{
    throw new Exception(" Connection Failed" . mysqli_error());
} else
{
    $sql = "SELECT `working_slots`.`START_TIME`, metting.Title as mTitle, metting.Department,Time(metting.Date) as mTime,
            surgery.Description as sTitle,Time(surgery.Date) as sTime
            FROM `working_slots`,`is_available`, metting,dr_metting,doctor,`surgery`,
		    dr_surgery
            WHERE `is_available`.`DID`= '$id' and `is_available`.`Day`='$name' and
                  `is_available`.`SLOT`= `working_slots`.`SLOT` or Date(metting.Date)='$day'
                  or metting.MID=dr_metting.MID and dr_metting.DID='$id' and doctor.DID='$id'
                  and (doctor.DEPARTEMENT=metting.Department or metting.Department='general')
                  or dr_surgery.DID='$id' and Date(surgery.Date)='$day' and surgery.SID=dr_surgery.SID group by mTime";
    $result = $mysqli->query($sql);
    $rows =array();
    if(!$result)
    {
        echo"There isn't any dates this day.";
    }
    else
    {
        while($row = $result->fetch_assoc()) {
            array_push($rows,'Stime',$row['START_TIME']);
            array_push($rows,'mtitle',$row['mTitle']);
            array_push($rows,'dep',$row['Department']);
            array_push($rows,'mtime',$row['mTime']);
            array_push($rows,'stitle',$row['sTitle']);
            array_push($rows,'stime',$row['sTime']);
        }
        echo "<ul>";
        //print_r($result);
        for($x=0;$x<count($rows);$x=$x+12)
        {
            if($rows[$x]=='Stime')
            {
                echo "<li><span>patient examinations from" .$rows[$x+1]. ".</span></li>";
            }
            if($rows[$x+2]=='mtitle' && $rows[$x+4]=='dep' && $rows[$x+6]=='mtime')
            {
                echo "<li><span>Metting about " .$rows[$x+3]. " with " .$rows[$x+5]. " depatrment at
            " .$rows[$x+7]. ".</span></li>";
            }
            if($rows[$x+8]=='stitle' && $rows[$x+10]=='stime')
            {
                echo "<li><span>Surgery about " .$rows[$x+9]. " at " .$rows[$x+11]. ".</span></li>";
            }
            //$x=$x+11;

        }
    }
    echo "</ul>";
    mysqli_close($mysqli);
}
