<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff</title>
</head>
<body style="background: linear-gradient(to bottom,black,#900605);  background-repeat: no-repeat; height: 700px;">
<div class="brand" style=" display:flex; justify-content: space-between; align-items:center; background-color: black; padding:5px; margin: -10px; font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;">
<img src="supercar.png" alt="Auto Care Masters" style="height: 100px; margin-left: 2%;" >
    <h1>
    <span style="margin: 10px;  color: white;">Auto Care Masters</span>
    </h1>
    <button type="button" style="background-color: #900605; color: white; height: 40px; width: 100px; margin-right: 2%;"><a class="nav-link" href="Logout.php" type="button" style="  text-decoration: none; color:white;" >Log out</a></button>
    </div>
    <div class="depart" style="width: 100%;  font-family: 'Times New Roman', Times, serif;">
        <h2><span style="display:flex;  text-align: center; color:white;" ><span style="align-items:center; width:100%;">Repair Department</span></span></h2>
        
    </div>

    <table class="table table-dark table-hover" style="margin: 0px 5%; width: 90%;  ">
    <tr style="border: 2px solid red; background-color: black; color:white;">
      <th>First Name</th>  <th>Last Name</th> <th>Service Name </th> <th> Date </th> <th>Status</th>  <th>Manage</th>
    </tr>
    <?php 
    
    include("DataBaseConfig.php");
    
    $sql = "select  c_id,f_name,l_name,username,email from customer;";
    $result = $con->query($sql);
  
    while ($row = $result->fetch_assoc()) 
    {
    ?>
  
  <tr style="color: white; border: 1px solid black;">
    <th><?php echo $row['f_name'] ?></th>
    <th><?php echo $row['l_name'] ?></th>
    <th><?php echo $row['service_Details'] ?></th>
    <th><?php echo $row['Date'] ?></th>
    <th><?php echo $row['Status'] ?></th>
    <select name="Status">
      <option value="Pending">Pending</option>
      <option value="Approved">Approved</option>
      <option value="Completed">Completed</option>
    </select>
    <th><form method="post" > <input class="btn btn-danger" type="submit" value="Delete" name="<?php echo $row['c_id']?>" > </form> </th>
  </tr>
  
  <?php
    }// end of while loop block
  ?>
  
  </table>
</body>
</html>
