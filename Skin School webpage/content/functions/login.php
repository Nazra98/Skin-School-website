<?php 
/**
 * Check exisiting user based on email and password 
 * @param $conn database connection
 * @param string $email user email address
 * @param string $userPassword user password 
 * @return int the cutsomer ID if login successful
 */
function login_user($email, $userPassword) {
    require_once './functions/dbconn.php';
    // SQL query to fetch customer ID and hashed password for provided email address
    $sql = "SELECT  customerID, password_hash FROM customers WHERE customer_email = ?";
    // Prepare the SQL statement 
    $stmt = mysqli_prepare($conn, $sql);
    // Bind parameters to the prepared statement 
    if (!mysqli_stmt_bind_param($stmt, "s", $email)) {
        // Display error message 
        echo "Error has occurred to start SQL";
        exit(1);
    }
    if (!mysqli_stmt_execute ($stmt)) {
        // Display error message 
        echo "Error has occurred to execute SQL";
        exit(1);
    }
    // Fetch the result 
    $result = mysqli_stmt_get_result($stmt);
    if(!$result) {
        return false;
    } else{
        // Fetch the customer data 
        if ($customerData = mysqli_fetch_assoc($result)) {
            $passwordHash = $customerData['password_hash'];
            $customerID = $customerData['customerID'];
            $isMatch = password_verify($userPassword, $passwordHash);
            if ($isMatch) {
                return $customerID;
            } else{
                return false;
            }
        }
        else {
            return false;
        }
    }
}
?>