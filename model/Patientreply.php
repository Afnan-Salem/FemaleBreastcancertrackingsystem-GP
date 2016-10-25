<?php

class reply
{

    private $message;

    function __construct($message)
    {
        echo "here";
        $this->setData($message);
        $this->getData();
    }

    private function setData($message)
    {
        $this->message = $message;
        return true;
    }


    function getData()
    {
        $mysqli = new mysqli("localhost", "root", "baheya", "baheya");
        if ($mysqli->connect_errno)
        {
            printf("Connect failed: %s\n", $mysqli->connect_error);
            exit();
        }

        $query= "INSERT INTO `sent_messages`(`PID`, `DID`, `DATE`, `SUBJECT`, `CONTENT`) VALUES ('201','301','2016-03-05','imprtant','".$this->message."')";
        //$query="INSERT INTO `baheya`.`sent_messages` (`PID`, `DID`, `DATE`,`CONTENT`) VALUES ('201','301', '2016-03-05','".$this->message."')";
        $sql   = $mysqli->query($query);

        if($sql != null )
        {
            echo "yess";
            return $sql;
        }
        else
        {
            echo 'else';
            throw new Exception("there is something wrong in the message");
        }

    }

}
?>

