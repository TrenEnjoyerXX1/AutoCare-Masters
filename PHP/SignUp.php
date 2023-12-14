<!DOCTYPE html>
<html>
<head>
  <title>AutoCare Masters | SignUp</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="SignUp.css">
    <script defer src="SignUp.js"></script>

  
</head>
<body>
    <?php include 'navbar.php'; ?>


    <div class="container">
        <form id="form" action="SignUpValidation.php" method="post">
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
                <input id="UserName" name="UserName" placeholder="Username" type="text">
                <div class="error"></div>
            </div>

            <div class="input-control">
                <input id="Email" name="Email" placeholder="Email" type="text">
                <div class="error"></div>
            </div>

            <div class="input-control">
                <input id="Password" name="Password" placeholder="Password" type="password">
                <div class="error"></div>
            </div>

            <div class="input-control">
                <input id="Password2" name="Password2" placeholder="Re-Enter Your Password" type="password">
                <div class="error"></div>
            </div>

            <button type="submit">Sign Up</button>

        </form>
    </div>


    <?php include 'footer.php'; ?>
</body>
</html>
