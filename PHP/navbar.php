
<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</head>

<nav class="navbar navbar-expand-lg bg-body-tertiary" style="width:100%;">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php">AutoCare Masters</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="About.php">About</a>
          </li>

            <li class="nav-item">
                <a class="nav-link" href="CustomerRequests.php">My Requests</a>
            </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Services
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="CustomerWash.php">Wash</a></li>
              <li><a class="dropdown-item" href="CustomerRepair.php">Repair</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="CustomerCarWrap.php">Car Wrap</a></li>
              <li><a class="dropdown-item" href="CustomerWax.php">Wax</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="CustomerTuning.php">Tuning</a></li>
              <li><a class="dropdown-item" href="CustomerUpgrade.php">Upgrade</a></li>
              </ul>
             
          </li>

          <li class="nav-item">
            <a class="nav-link" href="Gallery.php">Gallery</a>
          </li>


<?php

if (session_status() === PHP_SESSION_NONE)
{
    session_start();
}



if(isset($_SESSION['name']))
{  ?>


<li class="nav-item">                    
  <p class="nav-link" ><?php echo "Welcome " . $_SESSION['name']; ?></p>
</li>
        
        <li class="nav-item " >
        <!-- onclick destroy the session  -->
        <a class="nav-link" href="logout.php" type="button"  >Log out</a>
        </li>



<?php

}
else

{?>

<li class="nav-item" >
        <a class="nav-link" href="SignIn.php"  >Login</a>
</li>

        <li class="nav-item" >
            <a class="nav-link" href="SignUp.php"  >Register</a>
        </li>


<?php } ?>


        </ul>

        </form>
      </div>
    </div>
</nav>


