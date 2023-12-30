<?php
require ("DataBaseConfig.php");

$sql = "select  `s_id` from staff";
$result = $con->query($sql);

while ($row = $result->fetch_assoc())
{

if (isset($_POST[$row['s_id']]))
{
DeleteByID($row['s_id']);
}

}



function DeleteByID($id)
{
    require ("DataBaseConfig.php");
    $delete = "DELETE FROM staff WHERE s_id = $id";
    if(!mysqli_query($con,$delete))
    {
        //didn't connect
        echo 'Error '.mysqli_error($con);
    }
    else
    {//deleted
        echo 'Deleted successfully ! ';
        header("location:AdminManageStaff.php");
        exit();
    }


}
mysqli_close($con);
?>