<?php

class sentMsg
{

    private $drID;
    private $subject;
    private $message;
    private $k;

    private $cxn;       // database object
    function __construct($drID,$subject,$message)
    {
        $this->setData($drID,$subject,$message);
      
        $this->getData();
    }

    private function setData($drID,$subject,$message)
    {
        $this->drID = $drID;
        $this->subject = $subject;
        $this->message = $message;
        return true;
    }

    
    function getData()
    {
			session_start();
        global $sql1;
		$Date=date("Y-m-d H:i:s");
		$from=$_SESSION['username'];
		
        $mysqli = new mysqli("localhost", "root", "baheya", "baheya");
        if ($mysqli->connect_errno) {
            printf("Connect failed: %s\n", $mysqli->connect_error);
            exit();
        }
        $query="INSERT INTO `sent_messages`( `PID`, `DID`, `SendDATE`, `SUBJECT`, `CONTENT`, `Sender`)VALUES ('".$from."','".$this->drID."', '".$Date."', '".$this->subject."', '".$this->message."','".$from."')";
        $sql   = $mysqli->query($query);
        if($sql != null )
        {
            return $sql;
        }
        else
        {
            echo 'else';
            throw new Exception("there is something wrong in the message");
        }
mysqli_close();
    }

}
?>

