<!DOCTYPE html>
<html>
<head>
    <title>Add Repair Staff</title>

<?php include "AdminAddStaffValidation.php";?>

</head>
<body>

<?php
//include ("AdminAddStaffValidation.php");
include 'adminNavbar.php'; ?>

<form id="form" action="" method="post">
    <h1>Repair Staff</h1>

    <table>
        <tr><th><input id="F_Name" name="F_Name" placeholder="First Name" type="text" required></th></tr>
        <tr><th style="color: red" > <?php echo $fnameError; ?> </th></tr>
        <tr><th><input id="L_Name" name="L_Name" placeholder="Last Name" type="text" required></th></tr>
        <tr><th style="color: red" > <?php echo $lnameError; ?> </th></tr>
        <tr><th>    <input id="UserName" name="UserName" placeholder="Username" type="text" required></th></tr>
        <tr><th style="color: red" > <?php echo $usernameError; ?> </th></tr>
        <tr><th>    <input id="Email" name="Email"  placeholder="Email" type="text" required></th></tr>
        <tr><th style="color: red" > <?php echo $emailError; ?> </th></tr>
        <tr><th>    <input id="Password" name="Password" placeholder="Password" type="password" required></th></tr>
        <tr><th style="color: red" > <?php echo $passwordError; ?> </th></tr>
        <tr><th>   <table>
                    <tr>
                        <td>Location</td><td><select name="location" id="location">
                                <?php
                                include("DataBaseConfig.php");
                                $query = "select `L_ID`,`Location` from department_locations where D_Name='repair' ";
                                $result = $con->query($query);
                                while ($row = $result->fetch_assoc())
                                {
                                    echo '<option value=" ' . $row['L_ID'] . ' ">' . $row['Location'] . '</option>';
                                }
                                ?>
                            </select></td>
                    </tr>
                </table>
            </th></tr>
        <tr><th><input type="submit" name="AddStaffRepair" value="Add Staff"></th></tr>
    </table>







</form>
</div>






</body>
</html>
