<!DOCTYPE html>
<html>
<head>
    <title>AutoCare Masters | Add Tuning Staff</title>


</head>
<body>

<?php include 'adminNavbar.php'; ?>
<div class="container">
        <form id="form" action="./AdminAddStaffValidation.php" method="post">
            <h1>Tuning Staff</h1>

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
                <p class="error username-error">
                   
                </p>
            </div>

            <div class="input-control">
                <input id="Email" name="Email"  placeholder="Email" type="text">
                <div class="error"></div>
                <p class="error email-error">
                
                </p>

            </div>

            <div class="input-control">
                <input id="Password" name="Password" placeholder="Password" type="password">
                <div class="error"></div>
            </div>

            
            <div class="input-control">

            <table>
                <tr>
                    <td>Location</td><td> <select name="location" id="location">
                <?php
                  include("DataBaseConfig.php");
                  $query = "select `L_ID`,`Location` from department_locations where D_Name='Tuning' ";
                  $result = $con->query($query);

                
                  while ($row = $result->fetch_assoc()) 
                  {
                      echo '<option value=" ' . $row['L_ID'] . ' ">' . $row['Location'] . '</option>';
                  }
                ?>
            </select></td>
            </tr>
            </table>

              
              <div class="error"></div>
          </div>


            <input type="submit" name="AddStaffbutton" value="Add Staff">
           

        </form>
    </div>






</body>
</html>
