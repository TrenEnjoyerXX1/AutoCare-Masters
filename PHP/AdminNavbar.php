
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  
  </head>
  
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
      <div class="container-fluid">
        <a class="navbar-brand" >AutoCare Masters</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="Admin.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="AdminCustomers.php">Customers</a>
            </li>

              <li class="nav-item">

                  <a class="nav-link" href="AdminManageStaff.php">Staff</a>
              </li>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Departments
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="AdminWash.php">Wash</a></li>
                <li><a class="dropdown-item" href="AdminRepair.php">Repair</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="AdminWrap.php">Car Wrap</a></li>
                <li><a class="dropdown-item" href="AdminWax.php">Wax</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="AdminTuning.php">Tuning</a></li>
                <li><a class="dropdown-item" href="AdminUpgrade.php">Upgrade</a></li>
                </ul>
               
            </li>


      
            <li class="nav-item">
                            
                  <p class="nav-link" ><?php session_start();  echo "Welcome " . $_SESSION['name']; ?></p>
              </li>
  
             <li class="nav-item" >
              <!-- onclick destroy the session  -->
              <a class="nav-link" href="Logout.php" type="button"  >Log out</a>
           </li>
           
        </ul>

  
          </form>
        </div>
      </div>
  </nav>
  
  
  