<?php
header('Content-Type: text/html; charset=utf-8');
if($_POST)
{
    $username = $_POST['username'];
    $pass = $_POST['pass'];
	$_SESSION['message'] = "false";


if(is_numeric($username)){
    try{
        include ('../Model/loginPatientModel.php');
        $login = new loginModel ($username,$pass);
        if($login == TRUE)
        {
           //session_start();
            $_SESSION['username'] = $username;
		   if ($_SESSION['exist'] == "false")
            {header('Location:../sign.php');}
			else if($_SESSION['exist'] == "passfalse")
			{
			$message = "خطأ فى  كلمة المرور";
				$_SESSION['message'] =$message;
				echo "<script type='text/javascript'> window.alert('$message');window.location.href='./../login.php';</script>";
			}
			else{
			header('Location:../view/home.php');
			}
        }
    }catch(Exception $exc)
    {
        echo $exc->getMessage();
    }
}
else if( strpos($username, "@baheya.com")>0)
{

 try{
        include ('../model/loginDoctorModel.php');
        $login = new loginModel ($username,$pass);
        if($login == TRUE)
        {
		
		   if ($_SESSION['exist'] == "false")
            {$message = "لا يوجد حساب ";
				$_SESSION['message'] =$message;
				echo "<script type='text/javascript'> window.alert('$message');window.location.href='./../login.php';</script>";}
			else if($_SESSION['exist'] == "passfalse")
			{
			$message = "خطأ فى  كلمة المرور";
				$_SESSION['message'] =$message;
				echo "<script type='text/javascript'> window.alert('$message');window.location.href='./../login.php';</script>";
			}
			else{
			$_SESSION['username'] = $username;
			//echo $_SESSION['username'];
            header('Location:../view/customizeControl.php');
			}
            
        }
    }catch(Exception $exc)
    {
        echo $exc->getMessage();
    }
}
else
{
$message = "خطأ فى  اسم المستخدم";
$_SESSION['message'] =$message;
echo "<script type='text/javascript'> window.alert('$message');window.location.href='./../login.php';</script>";

}
//if ($_SESSION['message'] !="false"){header('Location:./../login.php');}

}

?>