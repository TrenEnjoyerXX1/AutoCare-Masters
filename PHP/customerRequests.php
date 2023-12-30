<!DOCTYPE html>
<html>
<head>
    <title>My Requests</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</head>
<body style="display:grid; align-items:center; justify-content:center; background: linear-gradient(to bottom,black,#900605);  background-repeat: no-repeat; height: 900px; color:white;">

<?php include 'navbar.php'; ?>
<div class="brand" style="background-color: transparent; color: white; font-family: 'Times New Roman', Times, serif; text-align: center;">
  <h1>
Auto Care Masters
  </h1>
  </div>

<h1>My Requests </h1>

<table class="table table-dark table-hover " style="margin: 0px 5%; width: 90%;" >
    <tr>
        <th>ID</th> <th>Service </th><th>Branch</th> <th>Service Details</th> <th>Date</th> <th>Status</th> <th>Manage</th>
    </tr>

    <?php

    if (session_status() === PHP_SESSION_NONE)
    {
        session_start();
    }

    $c_id=$_SESSION['id'];

    include("DataBaseConfig.php");

    $sql = "select  `r_id`,`location`,`d_name`,`service_details`,`date`,`status` from customer,request,department_locations where R_D_No=L_ID AND R_C_ID=C_ID AND c_id=$c_id";
    $result = $con->query($sql);

    while ($row = $result->fetch_assoc())
    {
        ?>
        <tr>
            <th><?php echo $row['r_id'] ?></th>
            <th><?php echo $row['location'] ?></th>
            <th><?php echo $row['d_name'] ?></th>
            <th><?php echo $row['service_details'] ?></th>
            <th><?php echo $row['date'] ?></th>
            <th><?php echo $row['status'] ?></th>
            <th>
                <?php
                if($row['status']!="completed")
            {
                ?>
                <form action="CustomerCancelRequest.php" method="post" >
                <input class="btn btn-danger" type="submit" value="Cancel" name="<?php echo $row['r_id']; ?>" >
                </form><?php

            } ?> </th>
        </tr>

        <?php
    }// end of while loop block
    ?>

</table>
</body>
</html>


