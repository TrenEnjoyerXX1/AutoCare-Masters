<?php
if (session_status() === PHP_SESSION_NONE)
{
    session_start();
}


include ("DataBaseConfig.php");

$ServiceDetails= $c_id=$date=$status=$r_d_no= "";
$GreenLight=true;


function sanitizeInput($input)
{
    $input= trim($input);
    $input= stripslashes($input);
    $input= htmlspecialchars($input);
    return $input;
}


if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $ServiceDetails=sanitizeInput($_POST['Service_Details']);
    $date=date("Y-m-d H:i:s");
    $status="pending";
    $r_d_no=$_POST['location'];
    $c_id=$_SESSION['id'];


}//end of if(request_method type)

/*if (isset($_POST['SubmitCarWrapRequest']))
{
    $role = "repair";
} else if (isset($_POST['AddStaffWash']))
{
    $role = "wash";
} else if (isset($_POST['AddStaffWax']))
{
    $role = "wax";
} else if (isset($_POST['AddStaffTuning']))
{
    $role = "tuning";
} else if (isset($_POST['AddStaffUpgrade']))
{
    $role = "upgrade";
} else if (isset($_POST['AddStaffCarWrap']))
{
    $role = "car wrap";
}*/




//if greenlight insert into database
if ($GreenLight === true)
{
    $sql = "INSERT INTO request (r_c_id,r_d_no,service_details,date,status)VALUES('$c_id','$r_d_no','$ServiceDetails','$date','$status')";
    $retval = mysqli_query($con, $sql);

    if (!$retval)
    {
        echo "Could not enter data: " . mysqli_error($con);
    }
    else
    {
        header("location:CustomerRequestSuccess.php");
    }
    mysqli_close($con);
}



?>

