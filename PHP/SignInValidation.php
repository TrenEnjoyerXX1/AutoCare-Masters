<?php
include("DataBaseConfig.php");

$Username=null;
$password=null;
$Role=null;

if(isset($_POST["signinbutton"]))
{
  $Username = $_POST['Username'];
  $password = hash('sha3-512', $_POST['Password']);

}

if (isset($_POST['StaffFlag']))
{
    // Checkbox was checked--> Staff User

    $sql= "SELECT   `Role`  FROM `staff` WHERE `UserName`= ? AND `Password`= ? ;" ;
    $stmt->bind_param("ss",$Username,$password);
    $stmt->execute();
    $res=$stmt->get_result();


    $Signin=mysqli_query($con,$sql);

    if($Username==="admin"&&$password==="5a38afb1a18d408e6cd367f9db91e2ab9bce834cdad3da24183cc174956c20ce35dd39c2bd36aae907111ae3d6ada353f7697a5f1a8fc567aae9e4ca41a9d19d")
    {//admin
        header('Location:Admin.php');
        exit;// (Add-on) to prevent accessing the rest of this page after redirecting
    }
    else if($res= mysqli_fetch_array($Signin))
    {
        if($res['Role'])// byshof eh ele fe result ele rag3a mn query
        {
          $Role=$res['Role'];

              if($Role==="wash")
              {//wash

                  header('Location:ShopWash.php');
                  exit;// (Add-on) to prevent accessing the rest of this page after redirecting

              }
              else if($Role==="repair")
              {//repair
                  header('Location:ShopRepair.php');
                  exit;// (Add-on) to prevent accessing the rest of this page after redirecting

              }
              else if($Role==="wax")
              {//wax
                  header('Location:ShopWax.php');
                  exit;// (Add-on) to prevent accessing the rest of this page after redirecting

              }
              else if($Role==="wrap")
              {//wrap
                  header('Location:ShopCarWrap.php');
                  exit;// (Add-on) to prevent accessing the rest of this page after redirecting

              }
              else if($Role==="tuning")
              {//tuning

                  header('Location:ShopTuning.php');
                  exit;// (Add-on) to prevent accessing the rest of this page after redirecting


              }
              else if($Role==="upgrade")
              {//upgrade
                  header('Location:ShopUpgrade.php');
                  exit;// (Add-on) to prevent accessing the rest of this page after redirecting

              }

        }
        else
        {//user isn't in the Database or not a staff member



        }

    }
    else
    {
      echo "else ya bro";
    }
}
else
{
    // Checkbox was not checked--> Customer

        $sql= "SELECT   count(*)  FROM `customer` WHERE `UserName`=" . $Username . "  AND `Password`=" .$password . ";" ;

        $Signin=mysqli_query($con,$sql);

         if($res= mysqli_fetch_array($Signin))
        {
            if($res['count(*)']===1)// byshof eh ele fe result ele rag3a mn query
            {
                //
                echo "signed in successfully";

                //set session values
            }
        }



}




?>
