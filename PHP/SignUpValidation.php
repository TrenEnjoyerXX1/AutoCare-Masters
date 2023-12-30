<?php
include ("DataBaseConfig.php");
include "SignUp.php";

$fname = null;
$lname = null;
$username = null;
$email = null;
$password = null;
$repassword = null;
$UserName_error=null;
$Email_error=null;




if(isset($_POST['signinbutton']))
 {
  $fname=$_POST['F_Name'];///
  $lname=$_POST['L_Name'];//
  $username = $_POST["UserName"];///  
  $password = $_POST["Password"];   
  $repassword=$_POST['Password2'];
  $email=$_POST['Email'];


    if(empty($username))
    {
      $UserName_error= "Username Is Required";
    }
    else
    {
      $username=trim($username);
      $username=htmlspecialchars($username);
      
      if(!preg_match("/^[a-zA-Z]+$/",$username))
      {
        $UserName_error= "Username should contain only char";
      }
    }

if(empty($fname))
{
  $fnameError= "First Name Is Required";
}
else
{
  $fname=trim($fname);
  $fname=htmlspecialchars($fname);
  
  if(!preg_match("/^[a-zA-Z]+$/",$fname))
  {
    $fnameError= "First Name should contain only char";
  }

}

if(empty($lname))
{
  $lnameError= "Last Name Is Required";
}
else
{
  $lname=trim($lname); 
  $lname=htmlspecialchars($lname);
  
  if(!preg_match("/^[a-zA-Z]+$/",$lname))
  {
    $lnameError= "Last Name should contain only char";
  }

}

if(empty($password))
{
$passwordError="Password is required";
}
else
{
    if(strlen($password)<=8)
    {
        $passwordError= "At least 8 characters in the password";

    }
    else if(!preg_match("#[0-9]+#",$password))
    {
            $passwordError="At least One Number";
    }
    else if(!preg_match("#[a-z]+#",$password))
    {
        $passwordError= "At least one lowercase character";
    }
    else if(!preg_match("#[A-Z]+#",$password))
    {
        $passwordError= "At least One Case";
    }




}

if($password!==$repassword)
{
    $repasswordError="the Re-entered password is incorrect";
}

}





    $sql = "SELECT count(*) FROM `customer` WHERE UserName = '" . $username . "'";
    $result = $con->query($sql);

    

    while ($row = $result->fetch_assoc()) 
    {


            if($row['count(*)']===1)
            {
            $UserName_error="Username is already used by another user";
            
            }
            else
            {
            $UserName_error=null;
            }

            $newuname= $row['count(*)']===0;
        

    }






    $sql = "SELECT count(*) FROM `customer` WHERE Email = '" . $email . "'";

    $result = $con->query($sql);

    while ($row = $result->fetch_assoc()) 
    {


            if($row['count(*)']===1)
            {
            $UserName_error="Email is already used by another user";
            
            }
            else
            {
            $UserName_error=null;
            }

            $newEmail= $row['count(*)']===0;
        

    }



    $insert="INSERT INTO `customer`(`F_Name`, `L_Name`, `UserName`, `Email`, `Password`) VALUES (?,?,?,?,?)";
    $stmt = $con->prepare($insert);
    $stmt->bind_param("sssss", $fname, $lname, $username,$email,$password);
    $stmt->execute();

        if($stmt->affected_rows > 0)
        {
            $SignupDbConError= 'Error '.mysqli_error($con);
        }
        else
        {
            $SignUpSuccess= "Singed Up successfully !";
            header('Location:index.php');
            exit;// (Add-on) to prevent accessing the rest of this page after redirecting
        }

?>