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
        /*echo $this->username;
        echo $this->pass;*/
				$conn = mysqli_connect("localhost", "root", "baheya", "baheya");
				// Check connection
				if (!$conn) {
					die("Connection failed: " . mysqli_connect_error());
				}
				
				$sql1="SELECT * FROM doctor WHERE EMAIL = '$this->username'";
				$sql = "SELECT * FROM doctor WHERE EMAIL = '$this->username' AND password = '$this->pass'";
				$result1= mysqli_query($conn, $sql1);
				$result = mysqli_query($conn, $sql);
				
				if (mysqli_num_rows($result) > 0&&mysqli_num_rows($result1) > 0) {
				 session_start();
				  $_SESSION['exist'] = "true";
            $_SESSION['username'] = $this->username;
           
					while($row = mysqli_fetch_assoc($result)) {
					session_start();
						$_SESSION['DID'] = $row["DID"];
					$_SESSION['NAME'] = $row["NAME"];
						$_SESSION['TYPE'] = $row["TYPE"];
					}
				} else if (mysqli_num_rows($result) == 0&&mysqli_num_rows($result1) > 0) {
				session_start();
					$_SESSION['exist'] = "passfalse";
					 
				}
				else
				{
				session_start();
					$_SESSION['exist'] = "false";
					 
				}

				



}}