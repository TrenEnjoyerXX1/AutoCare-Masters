<?php
include ("DataBaseConfig.php");

// Retrieve form data
$fname = $_POST['F_Name'];
$lname = $_POST['L_Name'];
$username = $_POST['UserName'];
$email = $_POST['Email'];
$password = $_POST['Password'];
$reenteredPassword = $_POST['RePassword'];
$UserName_error=null;
$Email_error=null;



// Establish a database connection (replace placeholders with your actual credentials)
$sql = mysqli_connect("localhost", "root", "", "autocare") or die("Couldn't connect to the database");

$result=mysqli_query($con,$sql);

// Function to validate email against the database
function isNewEmail($email, $con)
{
    $sql = "SELECT COUNT(*) AS count FROM customer WHERE Email = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    if ($row['count'] == 0)
    {

        return $row['count'] == 0;
    }
    else
    {
        $Email_error = "Email is Used by another user";
    }
}

function isNewUname($username , $con)
{
    $sql = "SELECT count(*) FROM `customer` WHERE UserName = '" . $username . "'";

    $sql = "SELECT count(*) FROM `customer` WHERE UserName = '" . $username . "'";

    $UnameQuery=mysqli_query($con,$sql);

    if($res= mysqli_fetch_array($UnameQuery))
    {
        $UserName_error="";

        //return $res['count(*)']==0;
        echo $res['count(*)'];
    }

}


if(isNewEmail($email,$con)&&isNewUname($username,$con))
{
    $PasswordHash = hash('sha3-512',$password);

    $insert="INSERT INTO `customer`(`F_Name`, `L_Name`, `UserName`, `Email`, `Password`) VALUES ('$fname','lname','$username','$email','$PasswordHash')";


        if(!mysqli_query($con,$insert))
        {
            echo 'Error '.mysqli_error($con);
        }
        else
        {
            echo "Singed Up successfully !";
        }

}


$sql = "SELECT count(*) FROM `customer` WHERE UserName = '" . "Amr21" . "'";

$UnameQuery=mysqli_query($con,$sql);

if($res= mysqli_fetch_array($UnameQuery))
{
    $UserName_error="";

    //return $res['count(*)']==0;
    echo $res['count(*)'];
}








?>