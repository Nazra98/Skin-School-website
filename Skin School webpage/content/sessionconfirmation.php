<?php 
// Include shared layout functions 
require_once './functions/sharelayout.php';
// Include booking confirmation functions 
require_once './functions/confirmation.php';
// Start the session 
session_start();
// Check if the user is logged in and retrieve the customer ID
if(isset($_SESSION['loginStatus']) && $_SESSION['loginStatus']) {
  $isLogin = true;
// Retrieve customer ID from the session 
  $customerID = $_SESSION['customerID'];
} else {
  $isLogin = false;
// No customer ID if not logged in 
  $customerID = null; 
}
// If the user is logged in, retrieve their booking data 
if ($isLogin) {
// Retrieve booking data for the logged in customer 
  $bookings = retrievedata($customerID);
} else {
// Redirect to the homepage if the user is not logged in 
  header('Location: index.php');
}
?>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale =1.0" />
    <title>Skin School</title>
    <link rel="stylesheet" href="../assets/stylesheets/share.css" />
    <link rel="stylesheet" href="../assets/stylesheets/sessions.css" />
    <link rel="stylesheet" href="../assets/stylesheets/sessionconfirmation.css" />
  </head>
  <body>
    <!-- Header changes based on login status -->
    <?php echo showHeader($isLogin); ?>
    <div id="main">
      <h1>Skin School</h1>
      <h2>Enhance Your Skincare Knowledge</h2>
    </div>
    <!-- Booking Confirmation Section -->
    <div class="booking-cards">
      <?php 
      foreach($bookings as $booking) {
        echo <<< session
        <div class="booking-card">
          </div>
          <div class="booking-info"> 
            <h2>Thank you for your booking</h2>
            <p>Number of Attendees: {$booking['number_people']}
            <br />
            Total booking cost: {$booking['total_booking_cost']}
            <br />
            Additional notes: {$booking['booking_notes']}
            <br />
            Customer name: {$booking['customer_forename']}
            <br />
            Session booked: {$booking['title']}
            <br />
            Date: {$booking['session_date']}
            <br />
            Time: {$booking['session_time']}</p>
          </div>
        </div>
        session;
      }
      ?>
    </div>
    <!-- Show Footer -->
    <?php echo showFooter(); ?>
  </body>
</html>
