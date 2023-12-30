<?php

include ("DataBaseConfig.php");
//fname,lname,username,email,password,location id
$fname=$lname=$username=$email=$password=$role=$l_id="";
//bool greenlight
$GreenLight=true;

//operations on texts
function sanitizeInput($input)
{
    $input= trim($input);
    $input= stripslashes($input);
    $input= htmlspecialchars($input);
    return $input;
}

function isNewStaffEmail($input)
{
    include("DataBaseConfig.php");


    $query = "SELECT * FROM staff WHERE Email = ?";

    // Using prepared statements to prevent SQL injection
    $stmt = $con->prepare($query);
    $stmt->bind_param("s", $input);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows > 0)
    {

        return false;
    }
    else
    {
        return true;
    }
}

function isNewStaffUsername($input)
{
    include("DataBaseConfig.php");

    $query = "SELECT * FROM staff WHERE Username = ?";

    // Using prepared statements to prevent SQL injection
    $stmt = $con->prepare($query);
    $stmt->bind_param("s", $input);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows > 0)
    {
        // Username already exists
        return false;
    }
    else
    {
        // Username doesn't exist, it's a new username
        return true;
    }
}

//Errors fname,lname,username,email,password
    $fnameError = $lnameError = $usernameError = $emailError = $passwordError = "";


    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        //validate data types,checkemail & username, skip emptyCheck ashan 3aml required fe tag tmam???! bakalm nafse sa3at

        //username
        $username = sanitizeInput($_POST["UserName"]);
        if (!preg_match("/^[a-zA-Z0-9-_].{1,20}$/", $username))
        {
            $usernameError = "at most 20 and use - or _ ";
            $GreenLight = false;
        }
        else if (!isNewStaffUsername($username))
        {
            $usernameError = "Username is unavailable";
            $GreenLight = false;
        }
        else
        {
            $GreenLight = true;
        }

////////////////////////////////////////


        //fnameANDlname
        $fname = sanitizeInput($_POST["F_Name"]);

        if (!preg_match("/^[A-Za-z]{1,15}$/", $fname)) {
            $fnameError = "name at most 15";
            $GreenLight = false;
        } else {
            $GreenLight = true;
        }
        $lname = sanitizeInput($_POST["L_Name"]);
        if (!preg_match("/^[A-Za-z]{1,15}$/", $lname)) {
            $lnameError = "name at most 15";
            $GreenLight = false;
        } else {
            $GreenLight = true;
        }

/////////////////////////////


        //email
        $email = $_POST["Email"];
        if (!preg_match("/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,50}$/", $email))
        {
            $emailError = "Incorrect email format, at most 50 ";
            $GreenLight = false;
        } else if (!isNewStaffEmail($email)) {
            $emailError = "Email is Unavailable";
            $GreenLight = false;

        } else {
            $GreenLight = true;
        }
/////////////////////////////////////////////

        //password
        $password = $_POST["Password"];
        if (!preg_match("/^[a-zA-Z0-9-_]{1,25}$/", $password)) {
            $passwordError = "Password  at most 25";
            $GreenLight = false;
        } else {
            $GreenLight = true;
        }

        //no validation for the location id
        $l_id = $_POST['location'];


    }//end of if(request_method type)

//finding the department name
    if (isset($_POST['AddStaffRepair'])) {
        $role = "repair";
    } else if (isset($_POST['AddStaffWash'])) {
        $role = "wash";
    } else if (isset($_POST['AddStaffWax'])) {
        $role = "wax";
    } else if (isset($_POST['AddStaffTuning'])) {
        $role = "tuning";
    } else if (isset($_POST['AddStaffUpgrade'])) {
        $role = "upgrade";
    } else if (isset($_POST['AddStaffCarWrap'])) {
        $role = "car wrap";
    }

//if greenlight insert into database
    if ($GreenLight === true)
    {
        $sql = "INSERT INTO staff (f_name,l_name,username,email,password,role,s_d_no)VALUES('$fname','$lname','$username','$email','$password','$role','$l_id')";
        $retval = mysqli_query($con, $sql);

        if (!$retval) {
            echo "Could not enter data: " . mysqli_error($con);
        } else {
            header("location:AdminStaffAddedSuccess.php");
        }
        mysqli_close($con);
    }


?>