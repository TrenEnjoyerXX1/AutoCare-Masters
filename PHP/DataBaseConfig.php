<?php
$Host='localhost';
$Username='root';
$Password='';
$DB='AutoCare';

$con = mysqli_connect($Host,$Username,$Password,$DB) ;

if(mysqli_connect_errno())
{
    echo 'Error '.mysqli_error($con);
}   
else
{
    echo 'connected';
}


?>