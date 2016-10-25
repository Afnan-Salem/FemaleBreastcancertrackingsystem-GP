<?php
class getmsgcontroller
{

    public function  _getDailyAppointments()
    {echo "22222";

        include "../model/getmsg.php";
        $modelObj = new getmsg();
        $rows = $modelObj -> _getAppointments();
        if($rows != null )
        {
            include_once "../view/viewMessege.php";
            $viewObj = new viewMessage($rows);
        }
        else
        {
            echo 'false';
        }
    }
}