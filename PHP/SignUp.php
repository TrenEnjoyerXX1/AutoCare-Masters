<!DOCTYPE html>
<html>
<head>
  <title>AutoCare Masters | SignUp</title>

  

  
</head>
<body>
    <?php include 'navbar.php'; ?>

  <!--  Signup form 

  firstname,lastname,email,password, re-enter password ,
  submit button(SignUp)

-->
    <form action="SignUpValidation.php" method="post" >

        <table style="text-align: center" >

            <tr><th> <input type="text" name="F_Name" placeholder="First Name"> </th></tr>
            <tr> <th>  <input type="text" name="L_Name" placeholder="Last Name"> </th></tr>

            <tr> <th>  <input type="text" name="UserName" placeholder="Username"> </th></tr>
            <tr> <th>  <input type="password" name="Password" placeholder="Password"> </th></tr>
            <tr> <th>  <input type="password" name="Re-Password" placeholder="Re-Enter Password"> </th></tr>
            <tr> <th>  <input type="submit" value="SignUp"> </th></tr>
        </table>

    </form>




    <?php include 'footer.php'; ?>
</body>
</html>
