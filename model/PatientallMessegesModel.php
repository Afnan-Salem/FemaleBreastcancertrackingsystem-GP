<?php

/*class inbox
{
    private $PID;
    

    function __construct($PID)
    {
        //set data
        $this->setinboxData($PID);
        
        $this->getinboxData();
    }

    private function setinboxData($PID)
    {
        $this->PID = $PID;
        
    }

   

    function getinboxData()
    {*/
	session_start();

       $PID=$_SESSION['username'];

				$conn = mysqli_connect("localhost", "root", "baheya", "baheya");
				// Check connection
				if (!$conn) {
					die("Connection failed: " . mysqli_connect_error());
				}
				/*$sql="SELECT * FROM (SELECT * FROM sent_messages where 
				PID='$PID' and sender!='$PID' and ReceiverRead IS NULL
				ORDER BY SendDATE DESC
								) AS t1
								GROUP BY Sender";*/
				
				$sql="SELECT * FROM sent_messages
				JOIN (SELECT sent_messages.DID,doctor.NAME, MAX(SendDATE) as time_when
						  FROM sent_messages , doctor
						  where PID='".$PID."' and doctor.DID = sent_messages.DID
						  GROUP BY DID) AS mostrecent
					  ON mostrecent.DID = sent_messages.DID
						AND mostrecent.time_when = sent_messages.SendDATE
						ORDER BY SendDATE DESC";
						 mysqli_query($conn, "SET NAMES 'utf8'");
				$result = mysqli_query($conn, $sql);
					$rows=array();
					while($row = $result->fetch_assoc()) {
						$rows[]=$row;

						}
						echo $json_response = json_encode($rows);

						//session_start();
						//$_SESSION['Messages']=$rows;
					
			/*	}
				}*/
?>