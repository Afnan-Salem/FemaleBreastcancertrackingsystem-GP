<?php
/**
 * Created by PhpStorm.
 * User: magic net
 * Date: 6/20/2016
 * Time: 5:23 AM
 */
class patientReserve
{
    public function _reservation($specialist,$title,$patient)
    {
        $connection_link = mysqli_connect("127.0.0.1", "root", "baheya", "baheya");
        if (!$connection_link) {
            throw new Exception(" Connection Failed" . mysqli_error());
        } else {

            $query1 = "SELECT `SPECIALIST`,`SLOT`, `DATE` FROM `specialistscapacity`
                   WHERE `SPECIALIST`='$specialist' AND `CAPACITY`<4 ";
            mysqli_query($connection_link, "SET NAMES 'utf8'");
            $q1res = $connection_link->query($query1);
            if (mysqli_num_rows($q1res) != 0) {
                $sid = '';
                $sslot = '';
                $sdate = '';
                while ($q1row = mysqli_fetch_assoc($q1res)) {
                    $sid = $q1row['SPECIALIST'];
                    $sslot = $q1row['SLOT'];
                    $sdate = $q1row['DATE'];
                }
                $rDT = $this->_insert($connection_link, $sid, $sslot, $sdate, $title, $patient);
            } else {
                $days = array();
                $x = '';
                $reserveDt = '';
                $reserveDay = '';
                //get day,date to reserve
                $query2 = "SELECT `Day` FROM `is_available` WHERE `DID`='$specialist'";
                $q2res = $connection_link->query($query2);
                $date = $this->set_Date($connection_link, true, $specialist);
                $currentDay = $this->set_CurrentDay($date);
                while ($q2row = mysqli_fetch_assoc($q2res)) {
                    $day = $q2row['Day'];
                    $days = $this->count_Rows($connection_link, $days, $day);
                    $x++;
                }
                $reserveDay = $this->get_minVal($days, $currentDay);
                $reserveDt = $this->check_Slots($connection_link, $reserveDay, $specialist, $date, $days, $currentDay);
                //get slot
                $query3 = "SELECT `SLOT` FROM `is_available`
                      WHERE `Day`='$reserveDay' and `DID` = '$specialist' and `SLOT` NOT IN
                      (SELECT `SLOT` FROM `specialistscapacity` WHERE `SPECIALIST` ='$specialist' and `Date`='$reserveDt')";
                $q3res = $connection_link->query($query3);
                if ($q3res) {
                    $slot = '';
                    while ($q3row = mysqli_fetch_assoc($q3res)) {
                        $slot = $q3row['SLOT'];
                        break;
                    }
                    $rDT =$this-> _insert($connection_link, $specialist, $slot, $reserveDt, $title, $patient);
                }
                $time = '11:59:59';
            }
            $dT = $rDT . $time;
            return $dT;
        }
    }


    function set_Date($connection_link, $bool, $specialist)
    {
        $date = '';
        if ($bool == true) {
            $query = "SELECT DISTINCT Max(DATE) As MaxDt FROM `specialistscapacity` WHERE `Specialist`='$specialist' HAVING Max(DATE)!='NULL'";
            $qres = $connection_link->query($query);
            if (mysqli_num_rows($qres) != 0) {
                //echo "ok";
                while ($qrow = mysqli_fetch_assoc($qres)) {
                    if ($qrow['MaxDt'] != null) {
                        $date = $qrow['MaxDt'];
                    }
                }
                //echo $date;
            } else {
                //echo "<br>"."entering false"."<br>";
                $date = isset($_GET['date']) ? $_GET['date'] : date('Y-m-d');
                //echo $date."<br>";
            }


        } else {
            //echo "<br>"."entering false"."<br>";
            $date = isset($_GET['date']) ? $_GET['date'] : date('Y-m-d');
            //echo $date."<br>";
        }
        return $date;
    }

    function set_CurrentDay($date)
    {
        $currentDay = date('l', strtotime("$date"));
        $currentDay = date_create($currentDay);
        return $currentDay;
    }

    function get_minVal($days, $currentDay)
    {
        $arrOfDiff = array();
        $arrOfNdiff = array();
        $arrOfNdiff_days = array();
        $arrOfPdiff = array();
        $arrOfPdiff_days = array();
        $index = '';
        foreach ($days as $day) {
            $arrDay = date_create($day);
            $diff = date_diff($currentDay, $arrDay);
            $diff = $diff->format("%R%a");
            if ($diff < 0) {
                array_push($arrOfNdiff, $diff);
                array_push($arrOfNdiff_days, $day);
            } else {
                array_push($arrOfPdiff, $diff);
                array_push($arrOfPdiff_days, $day);
            }
        }
        if (count($arrOfNdiff) == count($days)) {
            $index = array_search(min($arrOfNdiff), $arrOfNdiff);
            return $arrOfNdiff_days[$index];
        } else {
            $index = array_search(min($arrOfPdiff), $arrOfPdiff);
            return $arrOfPdiff_days[$index];
        }

    }

    function count_Rows($connection_link, $days, $day)
    {
        $rows = $connection_link->query('SELECT COUNT(*) FROM `specialistscapacity` HAVING COUNT(*) != 0');
        if (mysqli_num_rows($rows) == 0) {
            $todaydt = set_Date($connection_link, false);
            $today = set_CurrentDay($todaydt);
            if ($day != $today->format('l')) {
                array_push($days, $day);

            }
            return $days;
        } else {
            array_push($days, $day);
            return $days;
        }
    }

    function check_Slots($connection_link, $reserveDay, $specialist, $date, $days, $currentDay)
    {
        $query = "SELECT `SLOT` FROM `is_available` WHERE `DID`='$specialist' and `Day`='$reserveDay' and `SLOT` not in (select `SLOT` from `specialistscapacity` where `SPECIALIST` ='$specialist' and `DATE`='$date')";
        $qres = $connection_link->query($query);
        if (mysqli_num_rows($qres) != 0) {
            $val = $reserveDay;
            $reserveDt = date('Y-m-d', strtotime($val, strtotime($date)));
            return $reserveDt;
        } else {
            //echo $reserveDay;
            foreach ($days as $d) {
                if ($d == $reserveDay) {
                    $key = array_search("$reserveDay", $days);
                    echo "i to delete " . $key . "<br>";
                    array_splice($days, $key, 1);
                }
            }
            $reserveDay = $this->get_minVal($days, $currentDay);
            $val = "next " . $reserveDay;
            $reserveDt = date('Y-m-d', strtotime($val, strtotime($date)));
            return $reserveDt;
        }

    }

    function _insert($connection_link, $specialist, $slot, $reserveDt, $title, $patient)
    {
        $qinsert = "INSERT INTO `reservations`(`Date`, `DID`, `FLAG`, `FLAG2`, `SLOT`, `PID`)
                         VALUES('$reserveDt','$specialist','p','$title','$slot','$patient')";
        $qinsertres = mysqli_query($connection_link, $qinsert);
        $time = '11:59:59';
        $query4 = "SELECT `NAME` FROM `doctor` WHERE `DID`='$specialist'";
        $q4res= $connection_link->query($query4);
        while ($q4row = mysqli_fetch_assoc($q4res)) {
            $name = $q4row['NAME'];
        }

        $query6 = "INSERT INTO `notification`( `PID`, `DID`, `DName`, `title`, `Date`, `time`, `type`, `DRseen`,`Pseen`)
                           VALUES ('$patient','$specialist','$name','$title','$reserveDt','$time','r','0','0')";
        mysqli_query($connection_link, $query6);
        return $reserveDt;
    }
}