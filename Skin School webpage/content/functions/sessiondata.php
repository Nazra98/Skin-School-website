<?php 
/**
 * Retrieve all training sessions from the database 
 * @return array list of all training sessions 
 */
function retrievedata() {
    // Database connection
    require_once './functions/dbconn.php';
    // SQL query to fetch all training sessions 
    $sql = "SELECT * FROM training_sessions";
    $sessions = [];
    // Execute the query and fetch results 
    if ($queryResult = mysqli_query($conn, $sql)) {
        while ($currentRow = mysqli_fetch_assoc($queryResult)) {
            $sessions[] = $currentRow;
        }
    } 
    return $sessions;
}

/**
 * Retrieve a specific training session by training ID 
 * @param $conn database connection 
 * @param int $trainingID the ID of the training session to retrieve 
 * @return associative array of session data if found otherwise null
 */
function retrievedataById($conn, $trainingID) {
    // SQL query tio fetch specific training session by ID 
    $sql = "SELECT * FROM `training_sessions` WHERE `trainingID` = ?";
    // Prepare the SQL statement 
    $stmt = mysqli_prepare($conn, $sql);
    // Bind the training ID parameter to prepared statement 
    if (!mysqli_stmt_bind_param($stmt, "i", $trainingID)) {
        // Error message displayed 
        echo "Error has occurred to start SQL";
        exit(1);
    }
    if (!mysqli_stmt_execute($stmt)) {
        //  Error message displayed 
        echo "Error has occurred to execute SQL";
        exit(1);
    }
    // Fetch the result set 
    $result = mysqli_stmt_get_result($stmt);
    while ($currentRow = mysqli_fetch_assoc($result)) {
        return $currentRow;
    }
    return null;
}
?>