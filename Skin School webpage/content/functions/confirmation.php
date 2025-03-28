<?php 
/**
 * Retrieve booking data for a specific customer 
 * @param $conn Database connection
 * @param int customer ID 
 * @return list of booking for the customer or any empty 
 * array if no bookings are found 
 */
function retrievedata($customerID) {
    require_once './functions/dbconn.php';
    // SQL query to fetch booking data for specific customer 
    $sql = "SELECT booking.number_people, booking.total_booking_cost, booking.booking_notes, customers.customer_forename, customers.customer_surname, 
    training_sessions.title, training_sessions.session_date, training_sessions.session_time
    FROM booking INNER JOIN customers ON booking.customerID = customers.customerID
    INNER JOIN training_sessions ON booking.trainingID = training_sessions.trainingID
    WHERE booking.customerID = ?";
    // Prepare the SQL statement 
    $stmt = mysqli_prepare($conn, $sql);
    // Bind parameters to the prepared statement
    if (!mysqli_stmt_bind_param($stmt, "i", $customerID)) {
        echo "Error has occurred to start SQL";
        exit(1);
    } // Execute the prepared statement 
    if (!mysqli_stmt_execute ($stmt)) {
        // Error message displayed 
        echo "Error has occurred to execute SQL";
        exit(1);
    } // Fetch the result set 
    $result = mysqli_stmt_get_result($stmt);
    if(!$result) {
        return [];
    } // Fetch all rows and store them in an array 
    $bookings = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $bookings[] = $row;
    }
    return $bookings;
}
