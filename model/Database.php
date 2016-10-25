<?php

/**
 * Created by PhpStorm.
 * User: Wafaa
 * Date: 26/02/2016
 * Time: 09:41 م
 */

class Database
{
    private $host;
    private $user;
    private $password;
    private $database;

    function __construct($filename)
    {
        if(is_file($filename)) include $filename;
        else throw new Exception("Error!");
        $this->host = $host;
        $this->user = $user;
        $this->password = $password;
        $this->database = $database;
        $this->connectDatabase();
    }
    private function connectDatabase()
    {
        $conn =  mysqli_connect($this->host, $this->user, $this->password,$this->database);
				if ( mysqli_connect_errno() ) {
					printf("Connection failed: %s\
		", mysqli_connect_error());
					exit();
				}
		return true;
    }

    function closeDatabse()
    {
        mysqli_close();
    }

}
?>