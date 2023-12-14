<?php
//include ("DataBaseConfig.php");


// Retrieve form data
$fname = $_POST['F_Name'];
$lname = $_POST['L_Name'];
$username = $_POST['UserName'];
$email = $_POST['Email'];
$password = $_POST['Password'];
$reenteredPassword = $_POST['RePassword'];


// Establish a database connection (replace placeholders with your actual credentials)
$conn = mysqli_connect("localhost", "root", "", "autocare") or die("Couldn't connect to the database");



// Function to validate email against the database
function isNewEmail($email, $conn)
{
    $sql = "SELECT COUNT(*) AS count FROM customer WHERE Email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    return $row['count'] == 0; // Returns true if email doesn't exist in the database
}

function isNewUname($username , $conn)
{
    $sql = "SELECT COUNT(*) AS count FROM customer WHERE UserName = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    return $row['count'] == 0; // Returns true if email doesn't exist in the database
}


if(isNewEmail($email,$conn)&&isNewUname($username,$conn))
{
    $PasswordHash = hash('sha3-512',$password);

    $sql = "insert into customer (F_Name,L_Name,UserName,Email,Password) values($_POST[F_Name],'$_POST[L_Name]', $_POST[UserName], $_POST[Email],$PasswordHash)";

if(!mysqli_query($conn,$sql))
{
    echo 'Error '.mysqli_error($conn);
}   
else 
{
    echo "Singed Up successfully !";
}

}
elseif (!isNewEmail($email,$conn)&&!isNewUname($username,$conn))
{
    echo "Email and Username are not available";
}
elseif (!isNewEmail($email,$conn))
{
    echo "Email is already used by another user";
}
elseif (!isNewUname($username,$conn))
{
    echo "Username is already used by another user";
}









?>