
<?php

include ("DataBaseConfig.php");
//fname,lname,username,email,password,location id
$fname=$lname=$username=$email=$password=$repassword=$Car="";
//bool greenlight
$GreenLight=false;

//Errors fname,lname,username,email,password
$fnameError = $lnameError = $usernameError = $emailError = $passwordError =$repasswordError=$CarError="";

//operations on texts
function sanitizeInput($input)
{
    $input= trim($input);
    $input= stripslashes($input);
    $input= htmlspecialchars($input);
    return $input;
}

function isNewCustomerEmail($input)
{
    include("DataBaseConfig.php");


    $query = "SELECT * FROM customer WHERE Email = ?";

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

function isNewCustomerUsername($input)
{
    include("DataBaseConfig.php");

    $query = "SELECT * FROM customer WHERE Username = ?";

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



if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    //validate data types,checkemail & username, skip emptyCheck ashan 3aml required fe tag tmam???! bakalm nafse sa3at

    //username
    $username = sanitizeInput($_POST["UserName"]);

    if (empty($username))
    {
        $usernameError = "UserName can't be empty";
        $GreenLight = false;
    }
    else if (!preg_match("/^[a-zA-Z0-9-_].{1,20}$/", $username))
    {
        $usernameError = "at most 20 and use - or _ ";
        $GreenLight = false;
    }
    else if (!isNewCustomerUsername($username))
    {
        $usernameError = "Username is unavailable";
        $GreenLight = false;
    }
    else
    {
        $usernameError="";
        $GreenLight = true;
    }

////////////////////////////////////////


    //fnameANDlname
    $fname = sanitizeInput($_POST["F_Name"]);

    if (empty($fname))
    {
        $fnameError = "name can't be empty";
        $GreenLight = false;
    }
    else if (!preg_match("/^[A-Za-z]{1,15}$/", $fname))
    {
        $fnameError = "name at most 15";
        $GreenLight = false;
    }
    else
    {
        $GreenLight = true;
    }
    $lname = sanitizeInput($_POST["L_Name"]);

    if (empty($lname))
    {
        $lnameError = "name can't be empty";
        $GreenLight = false;
    }
    else if (!preg_match("/^[A-Za-z]{1,15}$/", $lname))
    {
        $lnameError = "name at most 15";
        $GreenLight = false;
    }
    else
    {
        $lnameError="";
        $GreenLight = true;
    }

/////////////////////////////


    //email
    $email = $_POST["Email"];

    if (empty($email))
    {
        $emailError = "email can't be empty";
        $GreenLight = false;
    }
else if (!preg_match("/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,50}$/", $email))
    {
        $emailError = "Incorrect email format, at most 50 ";
        $GreenLight = false;
    } else if (!isNewCustomerEmail($email))
    {
        $emailError = "Email is Unavailable";
        $GreenLight = false;

    } else
    {
        $emailError="";
        $GreenLight = true;
    }

    ///////////////////////////////////////

    //password
    $password = $_POST["Password"];
    $repassword=$_POST['Password2'];

    if (empty($repassword))
    {
        $repasswordError = "Re-enter your password";
        $GreenLight = false;
    }
    else

    if (empty($password))
    {
        $passwordError = "password can't be empty";
        $GreenLight = false;
    }
    else if (!preg_match("/^[a-zA-Z0-9-_]{1,25}$/", $password))
    {
        $passwordError = "Password  at most 25";
        $GreenLight = false;
    }
    else if($repassword!=$password)
    {
        $repasswordError="Doesn't match the Password";
        $GreenLight=false;
    }
    else
    {
        $repasswordError=$passwordError="";
        $GreenLight = true;
    }

    //////////////////////////////////
    ///
    /// Car
    $Car = sanitizeInput($_POST["Car"]);
    if (!preg_match("/^[a-zA-Z0-9-_].{1,20}$/", $Car))
    {
        $CarError = "at most 20 and use - or _ Only";
        $GreenLight = false;
    }
    else
    {
        $CarError="";
        $GreenLight = true;
    }



}//end of if(request_method type)


//if greenlight insert to database
if ($GreenLight === true)
{
    $sql = "INSERT INTO customer (f_name,l_name,username,email,password,Car)VALUES('$fname','$lname','$username','$email','$password','$Car')";
    $retval = mysqli_query($con, $sql);

    if ($retval)
    {
        header("location:SignupSuccess.php");
        exit();
    }
    mysqli_close($con);
}


?>

<!DOCTYPE html>
<html>
<head>
  <title>AutoCare Masters | SignUp</title>


</head>
<body style="display: grid; align-items: center; justify-content: space-around; background: linear-gradient(to bottom,black,#900605);  background-repeat: no-repeat; height: 900px;">
   
 <div class="brand" style="background-color: transparent; color: white; font-family: 'Times New Roman', Times, serif; text-align: center;">
  <h1>
Auto Care Masters
  </h1>
  </div>

    <div class="container" style="background-color: black; height: 400px; width:400px ; border-radius: 40px; display: grid; align-items:center; justify-content:center;">
        <form id="form" action="" method="post">
            <div style="font-family: 'Times New Roman', Times, serif; display: flex; justify-content: center; align-items: center;"><h1 style="color: aliceblue;">SignUp</h1></div>
            <table>
              <tr><th><input id="F_Name" name="F_Name" placeholder="First Name" type="text" required style="  background: transparent; border: none; outline: none; border-radius: 40px; border: 2px solid red; color: white;"></th></tr>
                <tr><th style="color:red"  > <?php  echo $fnameError; ?> </th></tr>
              <tr><th><input id="L_Name" name="L_Name" placeholder="Last Name" type="text" required style="  background: transparent; border: none; outline: none; border-radius: 40px; border: 2px solid red; color: white;" ></th></tr>
                <tr><th style="color:red"  > <?php   echo $lnameError; ?> </th></tr>
              <tr><th><input id="UserName" name="UserName"  placeholder="Username" type="text" required style="  background: transparent; border: none; outline: none; border-radius: 40px; border: 2px solid red; color: white;" > </th></tr>
                <tr><th style="color:red"  > <?php  echo $usernameError; ?> </th></tr>
              <tr><th><input id="Email" name="Email" placeholder="Email" type="text" required style="  background: transparent; border: none; outline: none; border-radius: 40px; border: 2px solid red; color: white;" > </th> </tr>
                <tr><th style="color:red"  > <?php   echo $emailError; ?> </th></tr>
              <tr><th><input id="Car" name="Car" placeholder="Car" type="text" required style="  background: transparent; border: none; outline: none; border-radius: 40px; border: 2px solid red; color: white;" ></th></tr>
                <tr><th style="color:red"  > <?php   echo $CarError; ?> </th></tr>
              <tr><th><input id="Password" name="Password" placeholder="Password" type="password" required style="  background: transparent; border: none; outline: none; border-radius: 40px; border: 2px solid red; color: white;" >      </th> </tr>
                <tr><th style="color:red"  > <?php  echo $passwordError; ?> </th></tr>
              <tr><th><input id="Password2" name="Password2" placeholder="Re-Enter Your Password" type="password" required style="  background: transparent; border: none; outline: none; border-radius: 40px; border: 2px solid red; color: white;" > </th>  </tr>
                <tr><th style="color:red"  > <?php   echo $repasswordError; ?> </th> </tr>

              <tr> <th> <input type="submit" name="SignupButton" value="Sign Up" style="margin-top: 2%; border-radius: 40px; width: 100px; background-color: #900605; color: white;">  </th></tr>
        </table>

        </form>
    </div>


    <?php //include 'footer.php'; ?>
</body>
</html>


