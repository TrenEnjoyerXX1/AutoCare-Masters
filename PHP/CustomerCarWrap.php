<!DOCTYPE html>
<html>
<head>
  <title>AutoCare Masters | Car Wrap</title>
</head>
<body style="display:grid; align-items:center; justify-content:center; background: linear-gradient(to bottom,black,#900605);  background-repeat: no-repeat; height: 900px; color:white;">
      <?php
      require_once "CustomerRequestValidation.php";
      include 'navbar.php';
      ?>
    
    <div class="brand" style="background-color: transparent; color: white; font-family: 'Times New Roman', Times, serif; text-align: center;">
  <h1>
Auto Care Masters
  </h1>
  </div>

<form method="post" action="CustomerRequestValidation.php" >


    <table>
        <tr><th style="font-family: 'Times New Roman', Times, serif;">Car Repair Request</th></tr>
        <tr>
            <th>Location</th>
            <th>
               <select name="location" id="location">
                    <?php
                    include("DataBaseConfig.php");
                    $query = "select `L_ID`,`Location` from department_locations where D_Name='car wrap' ";
                    $result = $con->query($query);


                    while ($row = $result->fetch_assoc())
                    {
                        echo '<option value=" ' . $row['L_ID'] . ' ">' . $row['Location'] . '</option>';
                    }
                    ?>
                </select>
              </th>
        </tr>

          <tr>

              <th colspan="2"><input type="text" placeholder="Service Details" name="Service_Details"  ></th>
          </tr>

        <tr>
            <th colspan="2"><?php echo  $ServiceDtailsError; ?></th>
        </tr>

        <tr>
          <th><input type="submit" name="SubmitCarWrapRequest" value="Submit"></th>
        </tr>

    </table>




</form>
</body>
</html>

