<?php
$Host='localhost';
$Username='root';
$Password='';
$DB='AutoCare';

$con = mysqli_connect($Host,$Username,$Password,$DB) ;

if(!$con)
{
    echo "not connected";
}
else
{
    echo "connected";
}

?>