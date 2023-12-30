<?php
global $con;
include("DataBaseConfig.php");

$Username=null;
$password=null;
$Role=null;

if(isset($_POST["signinbutton"]))
{
  $Username = $_POST['Username'];
  //$password = hash('sha3-512', $_POST['Password']);
  $password =$_POST['Password'];
  session_start();

}

if (isset($_POST['StaffFlag']))
{
    
        // Checkbox was checked--> Staff User
        if($Username==="admin" && $password==="admin")
        {//admin

            $_SESSION['name'] = "Admin";

            header('Location:Admin.php');
            exit;// (Add-on) to prevent accessing the rest of this page after redirecting
        }
        else if($Username==="staff" && $password=== "staff")
        {
            $Role="wash";
            $_SESSION['name'] = "staff";

            header('Location:ShopWash.php');
            exit;


        }

  

        else if($Username!=="admin" && false)// not admin
        {
            $sql= "SELECT   `Role`,`F_Name`,`S_D_No`  FROM `staff` WHERE `UserName`= ? AND `Password`= ? ; ";
                   // $stmt=$con->prepare($sql);
                    $stmt->bind_param("ss",$Username,$password);
                    $stmt->execute();

                    $result=$stmt->get_result();
                    $stmt->close();
                    if($result->num_rows>0)
                    {
                        while($StaffData=$result->fetch_assoc())
                        {
                            

                            $_SESSION['name']=$StaffData['F_name'];
                            $_SESSION['role']=$StaffData['Role'];
                            $_SESSION['S_D_No']=$StaffData['S_D_No'];
                            $Role=$_SESSION['role'];
                        }
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
                        $UserDataError= "Incorrect username or password.";
                    }
        }
        
    
    else
    {
        $StaffFlagError= "لا انت ادمن ولا انت موظف, هزر بعيد بالله عليك مش هنا السيرفر هيموت من الضحك كده";
    }
}

else
{

    if($Username==="customer" && $password==="customer")
    {

        $_SESSION['name'] = "customer";

        header('Location:index.php');
        exit;// (Add-on) to prevent accessing the rest of this page after redirecting
    }

    // Checkbox was not checked--> Customer

    $sql= "SELECT   `F_Name`,`c_id`  FROM `customer` WHERE `UserName`=".$Username."  AND `Password`=".$password." ;" ;
    $result = $con->query($sql);


    if ($result)
     {
        if ($result->num_rows>0)
        {
            //fe row ya3ne customer bgd

            while($CustomerData = $result->fetch_assoc())
            {

                $_SESSION['name']=$CustomerData['F_name'];
                $_SESSION['c_id']=$CustomerData['c_id'];

            }
            header('Location:index.php');
            exit;// (Add-on) to prevent accessing the rest of this page after redirecting


        }
        else
        {//user isn't in the Database

            
            $UserDataError= "Incorrect username or password.";
        }
    } 




}

?>
