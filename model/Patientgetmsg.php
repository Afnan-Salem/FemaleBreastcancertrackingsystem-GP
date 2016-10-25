<?php

//$data = json_decode(file_get_contents("php://input"));

$connection_link = mysqli_connect("127.0.0.1", "root", "baheya", "baheya");
if (!$connection_link)
{
    throw new Exception(" Connection Failed" . mysqli_error());
}  else
{
   session_start();
	$receiver=$_SESSION['username'];
		$sender =$_SESSION['sender_id'];
	  //$sender=mysqli_real_escape_string($connection_link,$data->sender_id);
    $sender_name = $_SESSION['sendername'];
	//  $sender_name=mysqli_real_escape_string($connection_link,$data->sender_name);
 /*echo $sender;
   echo $sender_name;*/

				$sql="SELECT * FROM sent_messages where 
				(PID='$receiver' and DID='$sender' )
				ORDER BY SendDATE ASC";
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
