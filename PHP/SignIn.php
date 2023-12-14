<!DOCTYPE html>
<html>
<head>
  <title>AutoCare Masters | SignIn</title>



  
</head>
<body>
    <?php include 'navbar.php'; ?>

<form action="SignInValidation.php" method="post" >

<table style="text-align: center" >

            <tr><th> <input type="text" name="Username" placeholder="Username"> </th></tr>
            <tr> <th>  <input type="password" name="Password" placeholder="Password"> </th></tr>
            <tr> <th>Staff member? <input type="checkbox" name="StaffFlag"></th>   </tr>
            <tr> <th>  <a href="ForgetPassword.php">ForgetPassword ?</a> </th> </tr>
            <tr> <th>  <input type="submit" value="login"> </th> </tr>
            </table>

            </form>




  





    <?php include 'footer.php'; ?>
</body>
</html>
