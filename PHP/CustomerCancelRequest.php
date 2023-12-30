<?php
require ("DataBaseConfig.php");

if (session_status() === PHP_SESSION_NONE)
{
    session_start();
}

$c_id=$_SESSION['id'];


$sql = "select  `r_id` from customer,request,department_locations where c_id=$c_id";
$result = $con->query($sql);

while ($row = $result->fetch_assoc())
{

    if (isset($_POST[$row['r_id']]))
    {
        DeleteByID($row['r_id']);
    }

}



function DeleteByID($id)
{
    require ("DataBaseConfig.php");
    $delete="call delete_customer_and_requests($id)";

    $delete= "DELETE FROM request WHERE r_id = $id";

    if(!mysqli_query($con,$delete))
    {
        //didn't connect
        echo 'Error '.mysqli_error($con);
    }
    else
    {//deleted
        echo 'Deleted successfully ! ';
        header("location:CustomerRequests.php ");
        exit();
    }


}
mysqli_close($con);
?>