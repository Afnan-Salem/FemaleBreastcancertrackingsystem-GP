<?php

class controlLabsRays
{
    public function _view($id,$values)
    {
        include_once '../model/modelLabsRays.php';
        $model = new modelLabsRays();
        $labray = $model->_view($id);
        if ($labray != null)
        {
            include_once '../View/viewLabsRays.php';
            $view = new viewLabsRays($labray);
        }
        else
        {
            echo 'null';
        }

    }

}