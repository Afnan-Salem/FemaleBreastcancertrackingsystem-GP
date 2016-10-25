<?php
/**
 * Created by PhpStorm.
 * User: magic net
 * Date: 6/20/2016
 * Time: 5:23 AM
 */
$specialist = '9';
$patient = '122';
$title = 'l';
$connection_link = mysqli_connect("127.0.0.1", "root", "baheya", "baheya");
if (!$connection_link) {
    throw new Exception(" Connection Failed" . mysqli_error());
} else {

    $query1 = "SELECT `SPECIALIST`,`SLOT`, `DATE` FROM `specialistscapacity`
               WHERE `SPECIALIST`='9' AND `CAPACITY`<4 ";
    mysqli_query($connection_link,"SET NAMES 'utf8'");
    $q1res = $connection_link->query($query1);
    if(mysqli_num_rows($q1res)!= 0)
    {
        $sid='';  $sslot='';  $sdate='';
        while($q1row = mysqli_fetch_assoc($q1res))
        {
            $sid = $q1row['SPECIALIST'];
            $sslot = $q1row['SLOT'];
            $sdate= $q1row['DATE'];
        }
        //function _insert ($connection_link,//eb3atelha ele 7at inserteh);
		echo $sid.' --> '.$sslot.' --> '.$sdate."<br>";
    }
    else
    {
		$days = array();
		$x='';
		$reserveDt='';
		$reserveDay='';
       //get day,date to reserve
        $query2 = "SELECT `Day` FROM `is_available` WHERE `DID`='9'";
        $q2res = $connection_link->query($query2);
	    $date= set_Date($connection_link,true); 
		$currentDay = set_CurrentDay($date);
		echo $currentDay->format('l')."<br>";
		while ($q2row = mysqli_fetch_assoc($q2res)) 
		{
            $day = $q2row['Day'];
			$days= count_Rows($connection_link,$days,$day);
		    $x++;		
        }	
		$reserveDay = get_minVal($days,$currentDay);
		$reserveDt = check_Slots($connection_link,$reserveDay,$specialist,$date,$days,$currentDay);
        //get slot
        $query3 = "SELECT `SLOT` FROM `is_available`
                  WHERE `Day`='$reserveDay' and `DID` = '$specialist' and `SLOT` NOT IN
                  (SELECT `SLOT` FROM `specialistscapacity` WHERE `SPECIALIST` ='$specialist' and `Date`='$reserveDt')";
        $q3res = $connection_link->query($query3);
        if($q3res)
        {
            $slot='';
            while($q3row = mysqli_fetch_assoc($q3res))
            {
                $slot = $q3row['SLOT'];
				break;
            }
            echo $specialist.' --> '.$slot.' --> '.$reserveDt;
			//function _insert ($connection_link,//eb3atelha ele 7at inserteh); 
        }
    }
}
function set_Date($connection_link,$bool)
	{
		$date = '';
		if($bool==true)
		{
			//echo "//////";
		    $query= "SELECT DISTINCT Max(DATE) As MaxDt FROM `specialistscapacity` WHERE `Specialist`='9' HAVING Max(DATE)!='NULL'";
		    $qres = $connection_link->query($query);
			if(mysqli_num_rows($qres)!=0)
			{
				//echo "ok";
				while($qrow = mysqli_fetch_assoc($qres))
		        {
		        if($qrow['MaxDt']!=null)
                {
			        $date = $qrow['MaxDt'];
		        }
				}
				//echo $date;
			}
			else 
	            {
			        //echo "<br>"."entering false"."<br>";
		            $date = isset($_GET['date']) ? $_GET['date'] : date('Y-m-d');
			        //echo $date."<br>";
		        }
		    
            
		}
		else 
	    {
			//echo "<br>"."entering false"."<br>";
		    $date = isset($_GET['date']) ? $_GET['date'] : date('Y-m-d');
			//echo $date."<br>";
		}
		return $date;
	}
	function set_CurrentDay($date)
	{
		$currentDay = date('l', strtotime("$date"));
        $currentDay=date_create($currentDay);
		return $currentDay;
	}
	function get_minVal($days,$currentDay)
	{
		$arrOfDiff = array();
		$arrOfNdiff= array();
		$arrOfNdiff_days= array();
        $arrOfPdiff = array();
		$arrOfPdiff_days = array();
		$index='';
        foreach($days as $day)
        {
            $arrDay = date_create($day);
            $diff=date_diff($currentDay,$arrDay);
            $diff=$diff->format("%R%a");
			if($diff<0)
	        {
	            array_push($arrOfNdiff,$diff);
				array_push($arrOfNdiff_days,$day);
	        }
	        else 
	        {
		        array_push($arrOfPdiff,$diff);
				array_push($arrOfPdiff_days,$day);
	        }
        }
        if(count($arrOfNdiff)==count($days))
        {
	        $index = array_search(min($arrOfNdiff), $arrOfNdiff);
			return $arrOfNdiff_days[$index];
        }
        else
        {
	        $index = array_search(min($arrOfPdiff), $arrOfPdiff);
			return $arrOfPdiff_days[$index];
        }

	}
	function count_Rows($connection_link,$days,$day)
	{
		$rows = $connection_link->query('SELECT COUNT(*) FROM `specialistscapacity` HAVING COUNT(*) != 0');
        if (mysqli_num_rows($rows)==0) 
		{ 
			$todaydt= set_Date($connection_link,false); 
			$today = set_CurrentDay($todaydt);
			if($day != $today->format('l'))
			{
				array_push($days,$day);
				
			}
			return $days;
	    }
		else
		{
			array_push($days,$day);
			return $days;
		}
	}
	function check_Slots ($connection_link,$reserveDay,$specialist,$date,$days,$currentDay)
	{
		$query = "SELECT `SLOT` FROM `is_available` WHERE `DID`='9' and `Day`='$reserveDay' and `SLOT` not in (select `SLOT` from `specialistscapacity` where `SPECIALIST` ='$specialist' and `DATE`='$date')";
        $qres = $connection_link->query($query);
        if(mysqli_num_rows($qres)!=0)
		{
			$val=$reserveDay;
            $reserveDt = date('Y-m-d', strtotime($val, strtotime($date)));
			return $reserveDt;
		}
        else
		{
            //echo $reserveDay;
		    foreach($days as $d)
			{
				if($d==$reserveDay)
				{
					$key=array_search("$reserveDay",$days);
					echo "i to delete ".$key."<br>";
					array_splice($days,$key,1);
				}
			}
			$reserveDay = get_minVal($days,$currentDay);
			$val="next ".$reserveDay;
            $reserveDt = date('Y-m-d', strtotime($val, strtotime($date)));
			return $reserveDt;
		}
		 echo $specialist.' --> '.$reserveDay.' --> '.$reserveDt."<br>";
	}
	/*function _insert($connection_link,//eb3atelha ele 7at inserteh);
	{
		/* $qinsert = "INSERT INTO `reservations`(`Date`, `DID`, `FLAG`, `FLAG2`, `SLOT`, `PID`)
                         VALUES('$reserveDt','$specialist','p','$title','$slot','$patient')";
            $qinsertres =  mysqli_query($connection_link, $qinsert);
	}*/