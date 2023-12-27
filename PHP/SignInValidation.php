<?php
global $con;
include("DataBaseConfig.php");

$Username=null;
$password=null;
$Role=null;
$stmt=null;

if(isset($_POST["signinbutton"]))
{
  $Username = $_POST['Username'];
  $password = hash('sha3-512', $_POST['Password']);
  session_start();

}

if (isset($_POST['StaffFlag']))
{
    
        // Checkbox was checked--> Staff User

        if($Username==="admin" && $password===hash('sha3-512', "admin"))
        {//admin

            $_SESSION['name'] = "Admin";

            header('Location:Admin.php');
            exit;// (Add-on) to prevent accessing the rest of this page after redirecting
        }
        else if($Username!=="admin")// not admin
        {
            $sql= "SELECT   `Role`,`F_Name`,`S_D_No`  FROM `staff` WHERE `UserName`= ? AND `Password`= ? ; ";
                    $stmt->$con->prepare($sql);
                    $stmt->bind_param("ss",$Username,$password);
                    $stmt->execute();
                    $result=$stmt->get_result();

            if ($result->num_rows>0)
            {
                $StaffData=$result->fetch_assoc();

                $_SESSION['name']=$StaffData['F_name'];
                $_SESSION['role']=$StaffData['Role'];
                $_SESSION['S_D_No']=$StaffData['S_D_No'];

                $Role=$_SESSION['role'];

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

                    include_once "SignIn.php";
                    echo "Incorrect username or password.";
                }
    }
    else
    {
      echo "لا انت ادمن ولا انت موظف, هزر بعيد بالله عليك مش هنا السيرفر هيموت من الضحك كده";
    }
}
else
{
    // Checkbox was not checked--> Customer

        $sql= "SELECT   `F_Name`  FROM `customer` WHERE `UserName`=?  AND `Password`=? ;" ;

    $stmt->$con->prepare($sql);
    $stmt->bind_param("ss",$Username,$password);
    $stmt->execute();
    $result=$stmt->get_result();

            if ($result->num_rows>0)
            {//fe row ya3ne customer bgd
                $CustomerData=$result->fetch_assoc();

                $_SESSION['name']=$CustomerData['F_name'];

            }
            else
            {//user isn't in the Database

                include_once "SignIn.php";
                echo "Incorrect username or password.";
            }

}

?>
