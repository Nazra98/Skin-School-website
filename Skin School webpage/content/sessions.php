<?php 
// Include shared layout functions 
require_once './functions/sharelayout.php';
// Include sessiom data functions 
require_once './functions/sessionData.php';
// Fetch all section data from the database
$sessionsFromDb = retrievedata();
// Start the session 
session_start();
// Check if the user is logged in 
if(isset($_SESSION['loginStatus']) && $_SESSION['loginStatus']) {
  $isLogin = true;
} else {
  $isLogin = false;
}
?>
<!DOCTYPE html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale =1.0" />
    <title>Skin School</title>
    <link rel="stylesheet" href="../assets/stylesheets/sessions.css" />
    <link rel="stylesheet" href="../assets/stylesheets/share.css" />
  </head>
  <body>
    <!-- Change the header depending on login status -->
    <?php echo showHeader($isLogin); ?>
    <div id="main">
      <h1>Skin School</h1>
      <h2>Enhance Your Skincare Knowledge</h2>
    </div>
    <!-- Sessions Card Section -->
    <div class="booking-cards">
      <?php 
      foreach($sessionsFromDb as $session) {
        echo <<< session
        <div class="booking-card">
          <div class="booking-img">
            <img src="../assets/images/{$session['session_imagepath']}" alt="" />
          </div>
          <div class="booking-info"> 
            <h3>{$session['title']}</h3>
            <p>
              {$session['description']}
            </p>
            <a href ="./detail.php?sessionId={$session['trainingID']}">MORE DETAIL HERE</a>
          </div>
        </div>
        session;
      }
      ?>
    </div>
    <!-- Footer Section -->
    <?php echo showFooter(); ?>
  </body>
</html>
