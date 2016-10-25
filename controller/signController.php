<?php

if($_POST)
{
session_start();
    $username = $_POST['username'];
	 $Fname = $_POST['Fname'];
	 $Mname = $_POST['Mname'];
	 $lastname = $_POST['lastname'];
	 $nationalID = $_POST['nationalID'];
	 $birthdate = $_POST['birthdate'];
	 $pphone = $_POST['pphone'];
	 $supportcontact = $_POST['supportcontact'];
	 $phonefamily = $_POST['phonefamily'];	 
    $pass = $_POST['pass'];
/*echo $username;
echo $pass;*/

    try
    {
        include ('../Model/signPatientModel.php');
        $sign = new signPatientModel ($username,$Fname,$Mname,$lastname,$nationalID,$birthdate,
		$pphone,$supportcontact,$phonefamily,$pass);
        if($sign == TRUE)
        {
           
			header('Location:../users/home.php');
			
        }
    }catch(Exception $exc)
    {
        echo $exc->getMessage();
    }


}

?>