<!DOCTYPE html>
<html>
<head>
    <title>Manage Customers</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  
</head>
<body>

<?php include 'adminNavbar.php'; ?>

<h1>Manage Customers </h1>

<table class="table table-dark table-hover " style="margin: 0px 5%; width: 90%;" >
  <tr>
      <th>ID</th> <th>First Name  </th> <th>Last Name</th> <th>Username</th> <th>Email</th> <th>Car</th> <th>Manage</th>
  </tr>

  <?php
  include("DataBaseConfig.php");
  
  $sql = "select  `c_id`,`f_name`,`l_name`,`username`,`email`,`Car` from customer";
  $result = $con->query($sql);

  while ($row = $result->fetch_assoc()) 
  {
  ?>
<tr>
  <th><?php echo $row['c_id'] ?></th>
  <th><?php echo $row['f_name'] ?></th>
  <th><?php echo $row['l_name'] ?></th>
  <th><?php echo $row['username'] ?></th>
  <th><?php echo $row['email'] ?></th>
    <th><?php echo $row['Car'] ?></th>
  <th><form action="AdminDeleteCustomer.php" method="post" > <input class="btn btn-danger" type="submit" value="Kick out" name="<?php echo $row['c_id']?>" > </form> </th>
</tr>

<?php
  }// end of while loop block
?>

</table>
</body>
</html>


