<?php

class reservationModel
{

    public function __construct($fname,$nnumber,$phone)
    {
		$id;
		if(strlen($nnumber)<=5) // $nnumber is then a patient id;
		{
			$id=$nnumber;
			$this-> _setReservation($id);
		    //$this-> _confirmReservation($phone,$id);
		}
		else
		{
			$id = $this->generate_ID();
            $this-> setReserveData($fname,$nnumber,$phone,$id);
            $this-> _setReservation($id);
		   // $this-> _confirmReservation($phone,$id);
		}
    }
	public function generate_ID()
	{
		//set the random id length 	       
        $random_id_length = 3; 
		//generate a random id encrypt it and store it in $rnd_id 
        $rnd_id = crypt(uniqid(mt_rand(),true),mt_rand()); 
		//to remove any slashes that might have come 
        $rnd_id = strip_tags(stripslashes($rnd_id)); 
       //swap all non numeric and special characters
        $rnd_id = preg_replace("/[^0-9,.]/",mt_rand(0,9), $rnd_id);
       //finally I take the first 3 characters from the $rnd_id 
        $rnd_id = substr($rnd_id,0,$random_id_length);   
	    $rnd_id = 'g_'.$rnd_id;
	    return $rnd_id;
	}

    public function setReserveData($fname,$nnumber,$phone,$id)
    {
        $mysqli = new mysqli("localhost", "root", "baheya", "baheya");

        // check connection
        if ($mysqli->connect_errno) {
            printf("Connect failed: %s\n", $mysqli->connect_error);
            exit();
        }

        $query = "INSERT INTO `guest`(`FULL_NAME`, `SSN`, `NUM`, `PHONE`, `GID`)
          VALUES ('$fname','$nnumber','0','$phone','$id')";
        $result = mysqli_query($mysqli, $query);
    }

    public function _setReservation($id)
    {
        $mysqli = new mysqli("localhost", "root", "baheya", "baheya");

        /* check connection */
        if ($mysqli->connect_errno) {
            printf("Connect failed: %s\n", $mysqli->connect_error);
            exit();
        }
//get saved slots,dayname,date
        $query1 = "SELECT SLOT FROM currentslotcapacity GROUP by SLOT HAVING SUM(CAPACITY)<4";
        $query2 = "SELECT DISTINCT DAYNAME(MAXDATE)AS DayName from currentslotcapacity
                   WHERE MAXDATE in (SELECT DISTINCT MAXDATE FROM currentslotcapacity)";
        $query3 = "SELECT DISTINCT MAXDATE FROM currentslotcapacity";
        $result1 = mysqli_query($mysqli, $query1);
        $result2 = mysqli_query($mysqli, $query2);
        $result3 = mysqli_query($mysqli, $query3);

        $row1 = mysqli_fetch_assoc($result1);
        $savedCapacity = $row1['SLOT'];
        $row2 = mysqli_fetch_assoc($result2);
        $savedDay = $row2['DayName'];
        $row3 = mysqli_fetch_assoc($result3);
        $savedDate = $row3['MAXDATE'];

///////////////////////////////////////////////////////////
        if($savedCapacity<=4) // num 4 here resembles maxslotcapacity // query1 ele btraga3o sabab errroors kter x el conditions boselha kol shwaya 
        {

            $sql1 = "SELECT DID FROM is_available where SLOT='$savedCapacity'
                     and Day='$savedDay'
                     and DID not in (SELECT doctor FROM currentslotcapacity WHERE SLOT='$savedCapacity') LIMIT 1;";
            $sqlres1 = mysqli_query($mysqli, $sql1);
            if(mysqli_num_rows($sqlres1)==0)
            {
                $sql2 = "SELECT DOCTOR FROM currentslotcapacity
                         WHERE CAPACITY in (SELECT MIN(CAPACITY) FROM currentslotcapacity) LIMIT 1";
                $sqlres2 =  mysqli_query($mysqli, $sql2);
                while($sqlrow2 = mysqli_fetch_assoc($sqlres2))
                {
                    $doctor = $sqlrow2['DOCTOR'];
                }
                $sql3 = "INSERT INTO `reservations`(`Date`, `DID`, `FLAG`, `FLAG2`, `SLOT`, `GID`)
                         VALUES('$savedDate','$doctor','g','e','$savedCapacity','$id')";
                $sqlres3 =  mysqli_query($mysqli, $sql3);
            }
			else  //feh doc x is available fady 
			{
                while($sqlrow1 = mysqli_fetch_assoc($sqlres1))
                {
                    $doctor = $sqlrow1['DID'];
                }
                $sql3 = "INSERT INTO `reservations`(`Date`, `DID`, `FLAG`, `FLAG2`, `SLOT`, `GID`)
                         VALUES('$savedDate','$doctor','g','e','$savedCapacity','$id')";
                $sqlres3 =  mysqli_query($mysqli, $sql3);
			}

        }
		if(mysqli_num_rows($result1)==0){ //($savedCapacity==4) == maxslotcapacity
		    $sql1 = "SELECT SLOT FROM currentslotcapacity ORDER BY SLOT DESC LIMIT 1";
            $sqlres1 = mysqli_query($mysqli, $sql1);
			$row_f= mysqli_fetch_assoc($sqlres1);
            $savedSlot = $row_f['SLOT']; //slot_num 1,2,3,4
			if($savedSlot<4)
			{
				$savedSlot=$savedSlot+1;
				$sql2 = "SELECT DID FROM is_available WHERE SLOT='$savedSlot' and Day='$savedDay' LIMIT 1";
                $sqlres2 =  mysqli_query($mysqli, $sql2);
                while($sqlrow2 = mysqli_fetch_assoc($sqlres2))
                {
                    $doctor = $sqlrow2['DID'];
                }
				
                $sql3 = "INSERT INTO `reservations`(`Date`, `DID`, `FLAG`, `FLAG2`, `SLOT`, `GID`)
                         VALUES('$savedDate','$doctor','g','e','$savedSlot','$id')";
                $sqlres3 =  mysqli_query($mysqli, $sql3);
				
			}
			else //slot_num == 4 , start new day 
			{
				$savedSlot=1;
				$sql2 = "SELECT DID FROM is_available WHERE SLOT='$savedSlot' and Day='$savedDay' LIMIT 1";
                $sqlres2 =  mysqli_query($mysqli, $sql2);
                while($sqlrow2 = mysqli_fetch_assoc($sqlres2))
                {
                    $doctor = $sqlrow2['DID'];
                }
				$parts = explode('-', $savedDate);
                $newDate = date('Y-m-d', mktime(0, 0, 0, $parts[1], $parts[2] + 1, $parts[0]));  //part1 : month , 2: day, 0: year


                $sql3 = "INSERT INTO `reservations`( `Date`, `DID`, `FLAG`, `FLAG2`, `SLOT`, `GID`)
                         VALUES('$newDate','$doctor','g','e','$savedSlot','$id')";
                $sqlres3 =  mysqli_query($mysqli, $sql3);


			}
		}
    }

	/*public function _confirmReservation($phone,$id)
	{
		$mysqli = new mysqli("localhost", "root", "baheya", "baheya");
		include ( "../model/src/NexmoMessage.php" );

        $query = "SELECT `START_TIME`,`END_TIME` FROM `working_slots`,`reservations`
                  WHERE `reservations`.`SLOT`= `working_slots`.`SLOT` AND `reservations`.`GID`='$id'";
        $qresult = mysqli_query($mysqli, $query);
        if($qresult)
        {
            while($dates = mysqli_fetch_assoc($qresult))
            {
                $start = $dates['START_TIME'];
                $end = $dates['END_TIME'];
            }
        }
		$sql = "SELECT DAYNAME(Date) as Day,Date as Date FROM reservations WHERE GID='$id' LIMIT 1";
                $sqlres =  mysqli_query($mysqli, $sql);
                while($sqlrow = mysqli_fetch_assoc($sqlres))
                {
                    $day = $sqlrow['Day'];
					$date = $sqlrow['Date'];
                }

	/**
	 * To send a text message.
	 *
	 */

	// Step 1: Declare new NexmoMessage.
	/*$txt="تم الحجز فى مستشفى بهية فى المعاد الاتى: "." "."يوم ".$day. ".".$date." "."خلال الفترة ".$start.", ".$end;
	$nexmo_sms = new NexmoMessage('3cb90b15', 'fe371bfa91ba9c1a');*/
    //$info = $nexmo_sms->sendText($phone, 'MyApp',$txt);

	// Step 2: Use sendText( $to, $from, $message ) method to send a message. 
	
	//
	

	// Step 3: Display an overview of the message
	//echo $nexmo_sms->displayOverview($info);

	// Done!

	/*/}*/

    /*function getReserveData()
    {
        $conn = mysqli_connect("sql200.phpnet.us", "pn_17761594", "fbcts20120100", "pn_17761594_baheya");
        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "INSERT INTO `guest`(`FullName`, `NID`, `PHONE`) VALUES('$this->fname','$this->nnumber','$this->phone')";
        $result = mysqli_query($conn, $sql);

        if($result!=null)
        {
            //echo "gkfj";
            //session_start()
            echo "your appointment is";}
        else
        {
            //echo 'else';
            throw new Exception("there is something wrong in the message");
        }


        echo $this->fname;
        echo $this->phone;
        echo $this->nnumber;
    }*/
			

}
		
?>