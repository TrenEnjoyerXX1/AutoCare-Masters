<?php
include ("DataBaseConfig.php");


// Retrieve form data
$fname = $_POST['F_Name'];
$lname = $_POST['L_Name'];
$username = $_POST['UserName'];
$email = $_POST['Email'];
$password = $_POST['Password'];
$reenteredPassword = $_POST['RePassword'];


// Establish a database connection (replace placeholders with your actual credentials)
$conn = new mysqli("localhost", "username", "password", "database_name");

// Function to validate name fields
function validateName($name)
{
    return !empty($name) && preg_match('/^[a-zA-Z\-\'\s]+$/', $name); // Allows letters, hyphens, apostrophes, and spaces
}

// Function to validate email against the database
function validateEmail($email, $conn)
{
    $sql = "SELECT COUNT(*) AS count FROM customer WHERE Email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    return $row['count'] == 0; // Returns true if email doesn't exist in the database
}

// Function to validate password and its confirmation
function validatePassword($password, $reenteredPassword)
{
    // Check if password meets the criteria
    $isStrongPassword = strlen($password) >= 8 && preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^\da-zA-Z]).{8,}$/', $password);

    // Check if password matches the re-entered password
    $isPasswordMatch = ($password === $reenteredPassword);

    return array($isStrongPassword, $isPasswordMatch);
}



// Check if all fields are filled
if (empty($fname) || empty($lname) || empty($username) || empty($email) || empty($password) || empty($reenteredPassword))
{
    echo "Please fill in all fields.";
}
else
{
    // Validate individual fields
    if (!validateName($fname) || !validateName($lname))
    {
        echo "Invalid first or last name.";
    }
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        echo "Invalid email format.";
    }
    else if (!validateEmail($email, $conn))
    {
        echo "Email already exists. Please use a different email.";
    }
    else
    {
        list($isStrongPassword, $isPasswordMatch) = validatePassword($password, $reenteredPassword);

        if ($isStrongPassword && $isPasswordMatch)
        {
            // All data is valid - proceed with registration or further actions

            // Store user data in the database (ensure to hash the password before storing)
            // Redirect to success page or perform additional actions


            $PasswordHash = hash('sha3-512',$password);

            $sql="insert into Customer (F_Name,L_Name,UserName,Email,Password) values($_POST[F_Name],'$_POST[L_Name]', $_POST[UserName], $_POST[Email],PasswordHash)";;

        }
        elseif (!$isStrongPassword)
        {
            echo "Password must be at least 8 characters long and contain uppercase, lowercase, numbers, and special characters.";
        }
        else
        {
            echo "Passwords do not match. Please re-enter the same password.";
        }
    }
}


$PasswordHash = hash('sha3-512',$password);

$sql="insert into Customer (F_Name,L_Name,UserName,Email,Password) values($_POST[F_Name],'$_POST[L_Name]', $_POST[UserName], $_POST[Email],PasswordHash)";;


?>