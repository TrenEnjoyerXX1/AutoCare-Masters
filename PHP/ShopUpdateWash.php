<?php
require ("DataBaseConfig.php");
if (session_status() === PHP_SESSION_NONE)
{
    session_start();
}


$sql = "SELECT `r_id`,`status` FROM customer, request, department_locations, staff WHERE R_D_No = L_ID AND R_C_ID = C_ID AND S_D_No = R_D_No AND S_ID = '{$_SESSION['id']}'";


$result = $con->query($sql);

while ($row = $result->fetch_assoc())
{

if (isset($_POST[$row['r_id']]) && $_POST[$row['r_id']] ==='Cancel' )
{
    CancelRequest($row['r_id']);
}
else if (isset($_POST[$row['r_id']]) && $_POST[$row['r_id']] ==='Approve' )
{

    if ($row['status']=="pending")
    {
        UpdateStatues($row['r_id'],"Approved");
    }
    else if ($row['status']=="Approved")
    {
        UpdateStatues($row['r_id'],"Completed");
    }


}

}




function CancelRequest($id)
{
    require ("DataBaseConfig.php");
    $delete = "DELETE FROM request WHERE r_id = $id";

    if(!mysqli_query($con,$delete))
    {
        //didn't connect
        echo 'Error '.mysqli_error($con);
    }
    else
    {//deleted
        echo 'Deleted successfully ! ';
        header("location:ShopWash.php ");
        exit();
    }


}

function UpdateStatues($id,$newStatus)
{
    require ("DataBaseConfig.php");
    $update = "UPDATE request SET status = '$newStatus' WHERE r_id = $id";
    if(!mysqli_query($con,$update))
    {
        //didn't connect
        echo 'Error '.mysqli_error($con);
    }
    else
    {
        echo 'Updated successfully ! ';
        header("location:ShopWash.php ");
        exit();
    }


}
mysqli_close($con);
?>