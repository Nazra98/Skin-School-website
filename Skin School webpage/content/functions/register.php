<?php 
/**
 * Register a new user in the database 
 * @param $conn database connection
 * @param string $forename user first name 
 * @param string $surname  user last  name 
 * @param string $email user email address
 * @param string $user Password plain password 
 * @param string $date of birth user date or birth
 * @return boolean true if regsitration is successful or false 
 */
function register_user($conn, $forename, $surname, $email, $userPassword, $dateofbirth) {
    // SQL query to insert a new customer 
    $sql = "INSERT INTO `customers`(`password_hash`, `customer_forename`, `customer_surname`, `customer_email`, `date_of_birth`) VALUES (?,?,?,?,?)";
    // Hash the user password 
    $passwordHash = password_hash($userPassword, PASSWORD_DEFAULT);
    // Prepare the SQL statement 
    $stmt = mysqli_prepare($conn, $sql);
    // Bind parameters to the prepared statement 
    if (!mysqli_stmt_bind_param ($stmt, "sssss", $passwordHash, $forename, $surname, $email, $dateofbirth)) {
        //Display error message 
        echo "Error has occurred to start SQL";
        exit(1);
    }
    if (!mysqli_stmt_execute($stmt)) {
        //Display error message 
        echo "Error has occurred to execute SQL";
        exit(1);
    }
    return true;
}

/**
 * Check if an email already exists in the database 
 * @param $conn database connection 
 * @param string $email email address to check 
 * @return boolean True of email exists otherwise false 
 */
function checkExistingEmail($conn, $email) {
    // SQL query to check existing email
    $sql = "SELECT customerID FROM customers WHERE customer_email = ?";
    // Prepare the SQL statement 
    $stmt = mysqli_prepare($conn, $sql);
    // Bind parameters to the prepared statement 
    if (!mysqli_stmt_bind_param ($stmt, "s", $email)) {
        // Display error message 
        echo "Error has occurred to start SQL";
        exit(1);
    }
    if (!mysqli_stmt_execute ($stmt)) {
        // Display error message 
        echo "Error has occurred to execute SQL";
        exit(1);
    }
    $result = mysqli_stmt_get_result($stmt);
    if(!$result) {
        echo "Error has occurred to execute SQL";
        exit(1);
    }
    if (mysqli_num_rows($result) > 0) {
        // The email exists in the database 
        return true;
    } else {
        // No email exists in the database 
        return false;
    }
}
?>