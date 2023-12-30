<?php
include ("DataBaseConfig.php");
$checking=false;
if (session_status() === PHP_SESSION_NONE)
{
    session_start();
}

$uname= $password =  $SignInError = "";


if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $uname = $_POST['Username'];
    $password = $_POST['Password'];


    if (empty($fname) )
    {
        $SignInError = "Enter your Username";

    }
    else if (empty($password))
    {
        $SignInError = "Enter your Password";

    }
    else if(empty($fname)&&empty($password))
    {
        $SignInError = "Enter Username and Password";
    }

}

if (isset($_POST['StaffFlag']) && $_POST['StaffFlag'] === 'staff')
{

    if ($uname=="admin" && $password=="admin")
    {
        $_SESSION['name']="admin";
        header("location:Admin.php");
        exit();
    }
    else
    {
        $sql = "SELECT f_name,s_id,role FROM staff WHERE username = '$uname' AND password = '$password'";
        $result = $con->query($sql);
        $checking=true;
        if ($result === false)
        {
            // Query failed, handle the error
            echo "Error: " . $con->error;
        }
        else
        {
            // Query succeeded, check if there are rows to fetch
            if ($result->num_rows > 0)
            {
                while ($row = $result->fetch_assoc())
                {
                    $_SESSION['name'] = $row['f_name'];
                    $_SESSION['id'] = $row['s_id'];
                    $role=$row['role'];
                }

                if($role=="wash")
                {
                    header("location:ShopWash.php");
                    exit();
                }
                else if($role=="wax")
                {
                    header("location:ShopWax.php");
                    exit();
                }
                else if($role=="car wrap")
                {
                    header("location:ShopCarWrap.php");
                    exit();
                }
                else if($role=="repair")
                {
                    header("location:ShopRepair.php");
                    exit();
                }
                else if($role=="tuning")
                {
                    header("location:ShopTuning.php");
                    exit();
                }
                else if($role=="upgrade")
                {
                    header("location:ShopUpgrade.php");
                    exit();
                }
            }
            else
            {
                if($checking)
                {
                    $SignInError = "invalid uname or password";
                }

            }
        }

    }



}
else
{//customer
    $sql = "SELECT f_name,c_id FROM customer WHERE username = '$uname' AND password = '$password'";
    $result = $con->query($sql);
    $checking=true;
    if ($result === false)
    {
        // Query failed, handle the error
        echo "Error: " . $con->error;
    }
    else
    {
        // Query succeeded, check if there are rows to fetch
        if ($result->num_rows > 0)
        {
            while ($row = $result->fetch_assoc())
            {
                $_SESSION['name'] = $row['f_name'];
                $_SESSION['id'] = $row['c_id'];
            }

            header("location:index.php");
            exit();
        }
        else
        {
            $SignInError="invalid uname or password";

        }
    }

}
?>

<!DOCTYPE html>
<html>
<head>
  <title>AutoCare Masters | SignIn</title>

<link rel="stylesheet" href="/CSS/signin.css" >

  
</head>
<body style="display:grid; align-items:center; justify-content:center; background: linear-gradient(to bottom,black,#900605);  background-repeat: no-repeat; height: 900px;">
    <?php

    
    $SignInError=" ";


    ?>
    <div class="brand" style="background-color: transparent; color: white; font-family: 'Times New Roman', Times, serif; text-align: center;">
  <h1>
Auto Care Masters
  </h1>
  </div>

<div class="container" style="background-color: black; height: 300px; width:350px ; border-radius: 40px; display: grid; align-items:center; justify-content:center; color: white;">
<form  method="post" action="">
                <div style="font-family: 'Times New Roman', Times, serif; display: flex; justify-content: center; align-items: center;"><h1 style="color: aliceblue;">SignIn</h1></div>
<table >
            <tr><th><input type="text" name="Username" placeholder="Username" required style="  background: transparent; border: none; outline: none; border-radius: 40px; border: 2px solid red; color: white;"></th></tr>
            <tr><th><input type="password" name="Password" placeholder="Password"  required style="  background: transparent; border: none; outline: none; border-radius: 40px; border: 2px solid red; color: white;"></tr>
            <tr><th>Staff member? <input type="checkbox" name="StaffFlag" value="staff" ></th></tr>
            <tr><th><input type="submit" name="SignInButton" value="login" style="margin-top: 2%; border-radius: 40px; width: 100px; background-color: #900605; color: white;"> </th></tr>
            <tr><th style="color : red" ><?php  if($checking===true) {echo $SignInError;} ?></th></tr>
</table>

</form>
</div>



</body>
</html>