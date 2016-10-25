<?php

/**
 * Created by PhpStorm.
 * User: Wafaa
 * Date: 26/02/2016
 * Time: 09:33 
 */
class signPatientModel
{

  private $username;
  private $Fname;
  private $Mname;
  private $lastname;
  private $nationalID;
  private $birthdate;
  private $pphone;
  private $supportcontact;
  private$phonefamily;
  private $pass;
  private $dbobject;

    function __construct($username,$Fname,$Mname,$lastname,$nationalID,$birthdate,
		$pphone,$supportcontact,$phonefamily,$pass)
    {
        //set data
        $this->setsignData($username,$Fname,$Mname,$lastname,$nationalID,$birthdate,
		$pphone,$supportcontact,$phonefamily,$pass);
        //connect db
        //$this->connectToDatabase();
        //get data
        $this->getsignData();
    }

    private function setsignData($username,$Fname,$Mname,$lastname,$nationalID,$birthdate,
		$pphone,$supportcontact,$phonefamily,$pass)
    {
        $this->username = $username;
		$this->Fname = $Fname;
		$this->Mname = $Mname;
		$this->lastname = $lastname;
		$this->nationalID = $nationalID;
		$this->birthdate = $birthdate;
		$this->pphone = $pphone;
		$this->supportcontact = $supportcontact;
		$this->phonefamily = $phonefamily;	
        $this->pass = $pass;
    }

    private function connectToDatabase()
    {
       /* include ('../Model/Database.php');
        $vars = "../include/vars.php";
        $this->dbobject = new Database($vars);*/
    }

    function getsignData()
    {
       

		$newformat = date('Y-m-d',strtotime($this->birthdate));
		$this->birthdate=$newformat;
				$conn = mysqli_connect("localhost", "root", "baheya", "baheya");
				// Check connection
				if (!$conn) {
					die("Connection failed: " . mysqli_connect_error());
				}

				$sql = "INSERT INTO `patient`(`PID`, `FNAME`, `MNAME`, `LNAME`, `NID`, `PASSWORD`, 
				`BIRTHDATE`, `HOME_PHONE`, `SUPPORT_CONTACT`, 
				`SUPPORT_PHONE`) VALUES('$this->username','$this->Fname','$this->Mname','$this->lastname',
				'$this->nationalID','$this->pass',
				'$this->birthdate','$this->pphone','$this->supportcontact','$this->phonefamily')";
				$result = mysqli_query($conn, $sql);

				if($result!=null)
				{
				//echo "gkfj";
				//session_start();
				$_SESSION['username']=$this->username;
				$_SESSION['FNAME'] = $this->Fname;
					 $_SESSION['LNAME'] = $this->lastname;
				}
		else
        {
            //echo 'else';
            throw new Exception("there is something wrong in the message");
        }


}}
?>