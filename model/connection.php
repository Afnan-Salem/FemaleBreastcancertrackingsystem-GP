<?php
/**
 * Created by PhpStorm.
 * User: nooor
 * Date: 3/10/2016
 * Time: 8:12 AM
 */
$mysqli = new mysqli("localhost", "root", "baheya", "baheya");

if (!$mysqli)
{
    die('Could not connect: ' . mysqli_error());
}

?>