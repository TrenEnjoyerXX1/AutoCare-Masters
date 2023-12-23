<?php
include("DataBaseConfig.php");

$Username=null;
$password=null;
$Role=null;

if(isset($_POST["signinbutton"]))
{
  $Username = $_POST['UserName'];
  $password = hash('sha3-512', $_POST['password']);

}



if (isset($_POST['StaffFlag']))
{
    // Checkbox was checked--> Staff User



    $sql= "SELECT   `Role`  FROM `staff` WHERE `UserName`=".$Username." AND `Password`=".$password ."'";

    $Signin=mysqli_query($con,$sql);

    if($res= mysqli_fetch_array($Signin))
    {
        if($res['Role'])
        {
          $Role=$res['Role'];

              if($Role=="admin")
              {//admin
                header('Location: ' . 'Admin.php');
              }
              else if($Role=="wash")
              {//wash


              }
              else if($Role=="repair")
              {//repair
                
              }
              else if($Role=="wax")
              {//wax
                
              }
              else if($Role=="wrap")
              {//wrap
                
              }
              else if($Role=="tunning")
              {//tunning
                
              }
              else if($Role=="upgrade")
              {//upgrade
                
              }

        }
        else
        {//user isn't in the Database


        }

    }


//Roles are Admin,wash,repair,wax,wrap,tunning and upgrade








}
else
{
    // Checkbox was not checked--> Customer





}




?>
