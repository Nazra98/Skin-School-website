<?php 
// Include shared layout functions 
require_once './functions/sharelayout.php';
// Include session Data  functions 
require_once './functions/sessionData.php';
// Include booking function 
require_once './functions/booking.php';
// Include database connection functions 
require_once './functions/dbconn.php';

// Start the session 
session_start();
// Retrieve session ID from GET request and sanitize it 
$requestParam = htmlspecialchars($_GET['sessionId']);
// Fetch session details from the database based on the session ID
$sessionFromDb = retrievedataById($conn, $requestParam);
// Check if the user is logged in and set login status 
if(isset($_SESSION['loginStatus']) && $_SESSION['loginStatus']) {
  $isLogin = true;
// Retrieve customer ID from session 
  $customerID = $_SESSION['customerID'];
} else {
  $isLogin = false;
// User is not logged in 
  $customerID = null; 
}

// Redirect to homepage if session data is not found 
if ($sessionFromDb == null) {
  header('Location: index.php');
}

$message = "";
// Process booking form submission 
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $isLogin) {
// Sanitize and retrive form inputs 
  $number_people = filter_var($_POST ['number_people']);
  $price = filter_var($_POST ['price']);
  $note = filter_var($_POST ['note']);
// Calculate the total cost 
  $totalCost = $number_people *  $price;
// Save booking details to the database 
  $bookResult = bookingSession($conn, $requestParam, $customerID, $number_people, $totalCost, $note);
  if ($bookResult) {
  // Redirect to confirmation page if booking is successful
    header ('Location:sessionconfirmation.php');
  } else { 
  // Display error message is booking fails 
      $message = "Booking failed";
    }
  }
?>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale =1.0" />
    <title>Skin School</title>
    <link rel="stylesheet" href="../assets/stylesheets/detail.css" />
    <link rel="stylesheet" href="../assets/stylesheets/share.css" />
  </head>
  <body>
  <!-- Header changes based on login status -->
    <?php echo showHeader($isLogin); ?>
    <div id="main">
      <h1>Skin School</h1>
      <h2>Enhance Your Skincare Knowledge</h2>
    </div>
    <?php 
    // Determine the correct anchor link based on login status 
      if ($isLogin) {
        $anchor = "<a href ='./booking.php?sessionId={$sessionFromDb['trainingID']}'>BOOK NOW</a>";
      } else {
        $anchor = "<a href ='./register.php'>REGISTER NOW</a>";
      }
    // Display session details in booking card 
      echo <<< session
      <div class="booking-card">
        <div class="booking-img">
          <img src="../assets/images/{$sessionFromDb['session_imagepath']}" alt="" />
        </div>
        <div class="booking-info">
          <h3>{$sessionFromDb['title']}</h3>
          <p>
            {$sessionFromDb['description']}
          </p>
          <div class="icons">
            <img src="../assets/images/icon_clock.png" alt="clock icon" />
            {$sessionFromDb['session_time']}
            <img src="../assets/images/icon_price_tag.png" alt="tag icon" />
            £{$sessionFromDb['price_per_person']}
            <img src= "../assets/images/icon_calendar.png" alt= "calendar icon" />
            {$sessionFromDb['session_date']}
          </div>
          $anchor
        </div>
      </div>
      session;
    // Display the booking form if user is logged in 
    ?>
    <?php if($isLogin) {
        echo <<< form
        <div class ="form-card1">
        <h3>Booking</h3>
        Once succesfully booked, you will be re-directed to the confirmation page
        $message
        <form action= "" method="post">
          <label for="number_people" >Number of Attendees</label>
          <input id="number_people" type="number" name="number_people" required >
          <label for = "price" >Session Price</label>
          <input type = "text" name = "price" value={$sessionFromDb['price_per_person']} readonly />
          <label for="note" >Additional Booking Notes</label>
          <textarea name = "note"></textarea>
          <button type="submit">Book Now</button>
      </form>
    </div>
    form;
    }
    // Displays footer 
    ?>
    <?php echo showFooter(); ?>
  </body>
</html>
