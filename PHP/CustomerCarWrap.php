<!DOCTYPE html>
<html>
<head>
  <title>AutoCare Masters | Car Wrap</title>
</head>
<body>
      <?php include 'navbar.php'; ?>
    

<form method="post" >


    <table>
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
          <th><input type="submit" name="SubmitCarWraprRequest" value="Submit"></th>
        </tr>
        
    </table>




</form>

    <?php include 'footer.php'; ?>
</body>
</html>

<?php
session_start();
if (isset($_POST["SubmitCarWraprRequest"]))
{
$Service_detials=$_POST['Service_Details'];
$D_Id=$_POST['location'];
$today_date = date("Y-m-d");

//insert

$stmt = $con->prepare("INSERT INTO `request` (`R_C_ID`, `R_D_No`, `Service_Details`, `Date`, `Status`) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssss", $_SESSION['c_id'], $D_Id, $Service_detials, $today_date, "pending");

// Execute the statement
$stmt->execute();

if ($stmt->affected_rows > 0) 
{
    echo "Data inserted successfully!";
} 
else 
{
    echo "Error inserting data: " . $con->error;
}

// Close the statement and the connection
$stmt->close();
$con->close();
  




}


?>
