<?php //require("SignUpValidation.php") ?>

<!DOCTYPE html>
<html>
<head>
  <title>AutoCare Masters | SignUp</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="SignUp.css">
    <script defer src="SignUp.js"></script>


    <?php
    if($UserName_error != null)
    {
        ?> <style>.username-error{display:block}</style> <?php
    }
    if($Email_error != null)
    {
        ?> <style>.email-error{display:block}</style> <?php
    }
    if($success != null)
    {
        ?> <style>.success{display:block}</style> <?php
    }
    ?>

</head>
<body>
    <?php include 'navbar.php'; ?>


    <div class="container">
        <form id="form" action="./SignUpValidation.php" method="post">
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
                <input id="UserName" name="UserName" value="<?php echo $UserName ?>" placeholder="Username" type="text">
                <div class="error"></div>
                <p class="error username-error">
                    <?php echo $UserName_error; ?>
                </p>
            </div>

            <div class="input-control">
                <input id="Email" name="Email" value="<?php echo $Email ?>" placeholder="Email" type="text">
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

            <input type="submit" value="Sign Up">
           

        </form>
    </div>


    <?php include 'footer.php'; ?>
</body>
</html>
