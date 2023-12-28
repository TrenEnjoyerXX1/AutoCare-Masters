<?php
$UserName_error="";
$passwordError="";

if(isset($_POST['submit'])) {
  $username = $_POST["Username"];  // get the value from username field
  $pass = $_POST["Password"];   // get the value from password field

if(empty($username))
{
  $UserName_error= "Name Is Required";
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



?>

<!DOCTYPE html>
<html>
<head>
  <title>AutoCare Masters | SignIn</title>

<link rel="stylesheet" href="/CSS/signin.css" >

  
</head>
<body>
    <?php //include 'navbar.php'; ?>


<form action="SignInValidation.php" method="post" class="signincontainer" >
<table style="text-align: center" >
            <tr><th> <input type="text" name="Username" placeholder="Username"> </th><th></th></tr>
            <tr> <th>  <input type="password" name="Password" placeholder="Password"> </th></tr>
            <tr> <th>Staff member? <input type="checkbox" name="StaffFlag"></th>   </tr>
            <tr> <th>  <input type="submit" name="signinbutton" value="login"> </th> </tr>
</table>

</form>




  





    
</body>
</html>
