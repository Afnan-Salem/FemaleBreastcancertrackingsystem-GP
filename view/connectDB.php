<?php
/**
 * Created by PhpStorm.
 * User: tahany
 * Date: 2/23/2016
 * Time: 11:05 AM
 */
$connection_link = @mysql_connect("127.0.0.1","root","","baheya");
if(!$connection_link)
{
    echo "connection failed ".mysql_error();
}
else{
    echo "connection successfully ";
}