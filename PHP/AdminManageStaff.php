<!DOCTYPE html>
<html>
<head>
    <title>AutoCare Masters | Staff Management</title>


</head>
<body>

<?php include 'adminNavbar.php'; ?>
<div class="container">
        <form id="form" action="./AdminAddStaffValidation.php" method="post">
            <h1>Registration</h1>

            <div class="input-control">
                <input id="F_Name" name="F_Name" placeholder="First Name" type="text">
                <div class="error"></div>
            </div>

            <div class="input-control">
                <input id="L_Name" name="L_Name" placeholder="Last Name" type="text">
                <div class="error"></div>
            </div>

            <div class="input-control">
                <input id="UserName" name="UserName" value="<?php echo $username ?>" placeholder="Username" type="text">
                <div class="error"></div>
                <p class="error username-error">
                    <?php echo $UserName_error; ?>
                </p>
            </div>

            <div class="input-control">
                <input id="Email" name="Email" value="<?php echo $email ?>" placeholder="Email" type="text">
                <div class="error"></div>
                <p class="error email-error">
                    <?php echo $Email_error; ?>
                </p>

            </div>

            <div class="input-control">
                <input id="Password" name="Password" placeholder="Password" type="password">
                <div class="error"></div>
            </div>

            <div class="input-control">
                <input id="Password2" name="Password2" placeholder="Re-Enter Your Password" type="password">
                <div class="error"></div>
            </div>

            <input type="submit" name="Signupbutton" value="Sign Up">
           

        </form>
    </div>






</body>
</html>
