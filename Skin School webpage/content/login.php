<?php 
// Include shared layout functions 
require_once './functions/sharelayout.php';
// Include login functions 
require_once './functions/login.php';
// Start the session 
session_start();
// Check if the user is logged in and set login status 
if(isset($_SESSION['loginStatus']) && $_SESSION['loginStatus']) {
  $isLogin = true;
} else {
  $isLogin = false;
}
// Redirect to homepage if the user is already logged in 
if ($isLogin) {
  header('Location: index.php');
  exit();
}
// Process login form 
$message = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
// Sanitize email input 
  $emailInput = filter_var($_POST ['email'], FILTER_SANITIZE_EMAIL);
// Retrieve password input
  $passwordInput = filter_var($_POST ['psw']);
  // Attempt to log in user, dunction returns customer ID if successful
  $isSuccessfulLogin = login_user($emailInput,$passwordInput);
  // If login is succesful, session ID is regenerated 
  if ($isSuccessfulLogin) {
    session_regenerate_id();
    $_SESSION['loginStatus'] = true;
    $_SESSION['customerID'] = $isSuccessfulLogin;
  // Redirected to home page on succesful login 
    header('Location: index.php');
  } else {
  // Set login status to false and display error message 
    $_SESSION['loginStatus'] = false;
    $_SESSION['customerID'] = null;
    $message = "Re-check email or password";
  }
}
?>
<!DOCTYPE html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale =1.0" />
    <title>Skin School</title>
    <link rel="stylesheet" href="../assets/stylesheets/share.css" />
    <link rel="stylesheet" href="../assets/stylesheets/login.css" />
  </head>
  <body>
    <!-- Header status changes depending on login status -->
    <?php echo showHeader($isLogin); ?>
    <!-- Login Form Section -->
    <div class ="form-card">
        <h3>Login</h3>
        <!-- Message displayed -->
        <?php echo $message;?>
        <!-- Post method -->
        <form action= "" method="post">
          <label for="email" >Email</label>
          <!-- Email Input -->
          <input id="email" type="email" name="email" required placeholder ="name@test.com">
          <label for="psw" >Password</label>
          <!-- Password Input -->
          <input id="psw" type="password" name="psw" required placeholder ="Enter Password">
          <!-- Login button -->
          <button type="submit">LOGIN</button>
      </form>
    </div>
    <!-- Footer Section -->
    <?php echo showFooter(); ?>
  </body>
</html>
