<?php
echo "here1";
if($_POST) {
    echo "here1";
        $message = $_POST['msg'];
    echo "hereee2";
    echo $message;
        try {
            include "../model/reply.php";
            $reply = new reply($message);

        }
        catch (Exception $exc)
        {
            echo $exc->getMessage();
        }


}

?>