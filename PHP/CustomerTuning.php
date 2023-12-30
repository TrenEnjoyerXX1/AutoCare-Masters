<!DOCTYPE html>
<html>
<head>
    <title>AutoCare Masters | Tuning</title>
</head>
<body style="display:grid; align-items:center; justify-content:center; background: linear-gradient(to bottom,black,#900605);  background-repeat: no-repeat; height: 900px;">
<div class="brand" style="background-color: transparent; color: white; font-family: 'Times New Roman', Times, serif; text-align: center;">
  <h1>
Auto Care Masters
  </h1>
  </div>

<div style="color:white; background-color: black; height: 300px; width:300px ; border-radius: 40px; display: grid; align-items:center; justify-content:center;">
    <table>
        <tr><th style="font-family: 'Times New Roman', Times, serif;">Car Tuning Request</th></tr>
        <tr>
            <th >Location</th>
            <th>
                <select name="location" id="location" style="  background: transparent; border: none; outline: none; border-radius: 40px; border: 2px solid red; color: white;">
                    <?php
                    include("DataBaseConfig.php");
                    $query = "select `L_ID`,`Location` from department_locations where D_Name='tuning' ";
                    $result = $con->query($query);


                    while ($row = $result->fetch_assoc())
                    {
                        echo '<option value=" ' . $row['L_ID'] . ' ">' . $row['Location'] . '</option>';
                    }
                    ?>
                </select>
            </th>
        </tr>

        <tr>

            <th colspan="2"><input type="text" placeholder="Service Details" name="Service_Details" style="  background: transparent; border: none; outline: none; border-radius: 40px; border: 2px solid red; color: white;" ></th>
        </tr>
        <tr>
            <th><input type="submit" name="SubmitRequest" value="Submit" style="margin-top: 2%; border-radius: 40px; width: 100px; background-color: #900605; color: white;"></th>
        </tr>


    </table>




</form>
</body>
</html>


