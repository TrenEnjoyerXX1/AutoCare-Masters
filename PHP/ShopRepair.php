<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Repair Requests</title>
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

<table  style="margin: 0px 5%; width: 90%;  ">
    <tr style="border: 2px solid red; background-color: black; color:white;">
        <th>ID</th> <th>Name</th> <th>Service Details</th> <th> Date </th> <th>Status</th><th>Manage</th>
    </tr>
    <?php

    if (session_status() === PHP_SESSION_NONE)
    {
        session_start();
    }

    include("DataBaseConfig.php");

    $sql = "SELECT `r_id`, customer.F_Name, customer.L_Name, `Service_Details`, Status, `date`,`Car` FROM customer, request, department_locations, staff WHERE R_D_No = L_ID AND R_C_ID = C_ID AND S_D_No = R_D_No AND S_ID = '{$_SESSION['id']}'";

    $result = $con->query($sql);

    while ($row = $result->fetch_assoc())
    {
        ?>
        <tr style="color: white; border: 1px solid black;">
            <th><?php echo $row['r_id']; ?></th>
            <th><?php echo $row['F_Name'] ?>&nbsp;<?php echo $row['L_Name'] ?> </th>
            <th><?php echo $row['Service_Details'] ?></th>
            <th><?php echo $row['date'] ?></th>
            <th><?php echo $row['Status'] ?></th>
            <th><?php echo $row['Car'] ?></th>

            <th><?php  if($row['Status']!="Completed"){ ?>
                <form method="post" action="ShopUpdateRepair.php"> <input class="btn btn-danger" type="submit" value="Cancel" name="<?php echo $row['r_id']?>" > </form>
                <br>
                <form method="post" action="ShopUpdateRepair.php" > <input class="btn btn-success" type="submit" value="Approve" name="<?php echo $row['r_id']?>" > </form>
                <?php } ?>  </th>
        </tr>

        <?php
    }// end of while loop block
    ?>

</table>
</body>
</html>
