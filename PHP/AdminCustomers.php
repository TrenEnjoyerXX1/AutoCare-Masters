<!DOCTYPE html>
<html>
<head>
    <title>AutoCare Masters | Manage Customers</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  
</head>
<body>

<?php include 'adminNavbar.php'; ?>

<p >Manage Customers </p>

<table class="table table-dark table-hover" >
  <tr>
    <th>ID</th> <th>First Name  </th> <th>Last Name</th> <th>Username</th> <th>Email</th>  <th>Manage</th>
  </tr>
  <?php 
  
  include("DataBaseConfig.php");
  
  $sql = "select  `c_id`,`f_name`,`l_name`,`username`,`email` from customer;";
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
  <th><form method="post" > <input class="btn btn-danger" type="submit" value="Delete" name="<?php echo $row['c_id']?>" > </form> </th>
</tr>

<?php
  }// end of while loop block
?>

</table>
</body>
</html>


<?php


//loop for the buttons 
while ($row = $result->fetch_assoc()) 
{
    if(isset($_POST[$row['c_id']]))
    {
      DeleteByID($i);
    }

}



//function to alter the table
function DeleteByID($id) 
{
  $delete="DELETE FROM customer WHERE `C_ID` =".$id .";";  

  if(!mysqli_query($con,$delete))
{
  
    echo 'Error '.mysqli_error($con);
    $con->
}   
else
{
    echo 'Deleted successfully ! ';
}


}



?>