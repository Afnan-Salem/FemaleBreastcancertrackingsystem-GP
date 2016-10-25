<?php

/**
 * Created by PhpStorm.
 * User: Wafaa
 * Date: 26/02/2016
 * Time: 09:33 
 */
class loginModel
{
    private $username;
    private $pass;
    private $dbobject;

    function __construct($username,$pass)
    {
        //set data
        $this->setLoginData($username,$pass);
        //connect db
        //$this->connectToDatabase();
        //get data
        $this->getLoginData();
    }

    private function setLoginData($username,$pass)
    {
        $this->username = $username;
        $this->pass = $pass;
    }

    private function connectToDatabase()
    {
        include ('../Model/Database.php');
        $vars = "../include/vars.php";
        $this->dbobject = new Database($vars);
    }

    function getLoginData()
    {
       /* echo $this->username;
        echo $this->pass;*/
				$conn = mysqli_connect("localhost", "root", "baheya", "baheya");
				// Check connection
				if (!$conn) {
					die("Connection failed: " . mysqli_connect_error());
				}
				$sql1="SELECT * FROM patient WHERE PID = '$this->username'";
				mysqli_query($conn,"SET NAMES 'utf8'");
				$sql = "SELECT * FROM patient WHERE PID = '$this->username' AND password = '$this->pass'";
				mysqli_query($conn,"SET NAMES 'utf8'");
				
				$result1= mysqli_query($conn, $sql1);
				mysqli_query($conn,"SET NAMES 'utf8'");
				$result = mysqli_query($conn, $sql);
				mysqli_query($conn,"SET NAMES 'utf8'");

				if (mysqli_num_rows($result) > 0&&mysqli_num_rows($result1) > 0) {
				 session_start();
				  $_SESSION['exist'] = "true";
            $_SESSION['username'] = $this->username;
           
					while($row = mysqli_fetch_assoc($result)) {
					 $_SESSION['FNAME'] = $row["FNAME"];
					 $_SESSION['MNAME'] = $row["MNAME"];
					 $_SESSION['LNAME'] = $row["LNAME"];

					//echo "LNAME: " . $row["FNAME"]. " - LNAME: " . $row["LNAME"];
					}
				} else if (mysqli_num_rows($result) == 0&&mysqli_num_rows($result1) > 0) {
				session_start();
					$_SESSION['exist'] = "passfalse";
					 $_SESSION['username'] = $this->username;
					// echo $_SESSION['username'];
				}
				else
				{
				session_start();
					$_SESSION['exist'] = "false";
					 $_SESSION['username'] = $this->username;
					// echo $_SESSION['username'];
				}



}}