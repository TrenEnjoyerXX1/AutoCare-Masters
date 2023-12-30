<?php
require ("DataBaseConfig.php");

$sql = "select  `c_id` from customer";
$result = $con->query($sql);

while ($row = $result->fetch_assoc())
{

if (isset($_POST[$row['c_id']]))
{
DeleteByID($row['c_id']);
}

}



function DeleteByID($id)
{
    require ("DataBaseConfig.php");
    $delete="call delete_customer_and_requests($id)";

    if(!mysqli_query($con,$delete))
    {
        //didn't connect
        echo 'Error '.mysqli_error($con);
    }
    else
    {//deleted
        echo 'Deleted successfully ! ';
        header("location: AdminCustomers.php ");
        exit();
    }


}
mysqli_close($con);
?>