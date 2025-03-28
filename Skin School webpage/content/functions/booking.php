<?php 
/**
 * Book a training session for a customer 
 */
function bookingSession($conn, $trainingID, $customerID, $number_people, $total_booking_cost, $booking_note) {
    // SQL query to insert booking data 
    $sql = "INSERT INTO `booking`(`trainingID`, `customerID`, `number_people`, `total_booking_cost`, `booking_notes`) VALUES (?,?,?,?,?)";
    // Prepare the SQL statement 
    $stmt = mysqli_prepare($conn, $sql);
    // Bind parameters to the prepared statements 
    if (!mysqli_stmt_bind_param ($stmt, "iiids", $trainingID, $customerID, $number_people, $total_booking_cost, $booking_note)) {
        //Error message 
        echo "Error has occurred to start SQL";
        exit(1);
    }
    // Execute the prepared statement 
    if (!mysqli_stmt_execute($stmt)) {
        //Error message 
        echo "Error has occurred to execute SQL";
        exit(1);
    }
    return true;
}
?>