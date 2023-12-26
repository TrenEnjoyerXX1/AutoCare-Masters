<?php
include ("DataBaseConfig.php");

$fname = null;
$lname = null;
$username = null;
$email = null;
$password = null;
$reenteredPassword = null;
$UserName_error=null;
$Email_error=null;
$success=null;


if(isset($_POST['Signupbutton']))
{
// Retrieve form data
$fname = $_POST['F_Name'];
$lname = $_POST['L_Name'];
$username = $_POST['UserName'];
$email = $_POST['Email'];
$password = $_POST['Password'];
$reenteredPassword = $_POST['RePassword'];
$UserName_error=null;
$Email_error=null;
$success=null;
}


$sql = mysqli_connect("localhost", "root", "", "autocare") or die("Couldn't connect to the database");



// Function to validate email against the database


function isNewUname($username,$con)
{
    $sql = "SELECT count(*) FROM `customer` WHERE UserName = '" . $username . "'";

    $UnameQuery=mysqli_query($con,$sql);

    if($res= mysqli_fetch_array($UnameQuery))
    {

        if($res['count(*)']===1)
        {
        $UserName_error="Username is already used by another user";
        
        }
        else
        {
        $UserName_error=null;
        }
        return $res['count(*)']===0;
    }

}

function isNewEmail($email, $con)
{
    $sql = "SELECT count(*) FROM `customer` WHERE Email = '" . $email . "'";

    $UnameQuery=mysqli_query($con,$sql);

    if($res= mysqli_fetch_array($UnameQuery))
    {
        if($res['count(*)']===1)
        {
        $UserName_error="Email is already used by another user";
        }
        else
        {
        $UserName_error=null;
        }

        return $res['count(*)']==0;
    }

}


if(isNewEmail($email,$con)&&isNewUname($email,$con))
{
    $PasswordHash = hash('sha3-512',$password);

    $insert="INSERT INTO `customer`(`F_Name`, `L_Name`, `UserName`, `Email`, `Password`) VALUES ('$fname','$lname','$username','$email','$PasswordHash')";


        if(!mysqli_query($con,$insert))
        {
            echo 'Error '.mysqli_error($con);
        }
        else
        {
            echo "Singed Up successfully !";
        }

}
?>