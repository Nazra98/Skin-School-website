<?php 
// Include shared layout functions 
require_once './functions/sharelayout.php';
// Include reigster functions 
require_once './functions/register.php';
// Include database connection functions 
require_once './functions/dbconn.php';
// Start the session 
session_start();
// Check if the user is already logged in 
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
// Process registration form 
$message = "";
// Retrieve and sanitize user inputs 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Sanitize forename 
  $forename = filter_var($_POST ['forename']);
  // Sanitize surname 
  $surname = filter_var($_POST ['surname']);
  // Sanitize email 
  $emailInput = filter_var($_POST ['email'], FILTER_SANITIZE_EMAIL);
  // Retrieve password 
  $passwordInput = filter_var($_POST ['psw']);
  // Sanitize date of birth 
  $dateofbirth = filter_var($_POST ['dateofbirth']);
  // Check if the email already exists in the database 
  $isDuplicateEmail = checkExistingEmail($conn, $emailInput);
  if ($isDuplicateEmail) {
  // Display an error message if the email already exists 
    $message = "Email already exists";
  } else { 
    // Register the user 
    $isSuccessfulRegister = register_user($conn, $forename, $surname, $emailInput, $passwordInput, $dateofbirth);
    if ($isSuccessfulRegister) {
      // Redirect to login page on successful registration 
      header('Location: login.php');
    } else {
      // Display an error message if registration fails 
      $message = "Registration failed";
    }
  }
}
?>
<!DOCTYPE html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale =1.0" />
    <title>Skin School</title>
    <link rel="stylesheet" href="../assets/stylesheets/share.css" />
    <link rel="stylesheet" href="../assets/stylesheets/register.css" />
  </head>
  <body>
    <!-- Header displaying login status -->
    <?php echo showHeader($isLogin); ?>
    <div class ="form-card">
        <h3>Register</h3>
        Once succesfully registered, you will be re-directed to the login page
        <?php echo $message;?>
        <!-- Form using POST method -->
        <form action= "" method="post">
          <label for="forename">First name</label>
          <!-- First name input -->
          <input id="forename" name= "forename" required>
          <label for="surname">Last name</label>
          <!-- Last name input -->
          <input id="surname" name="surname" required>
          <label for="email" >Email Address</label>
          <!-- Email input -->
          <input id="email" name="email" required placeholder ="name@test.com">
          <label for="password" >Password</label>
          <!-- Password input -->
          <input id="psw" type="password" name="psw" required placeholder ="Enter Password">
          <label for="dateofbirth" >Date of Birth </label>
          <!-- Date of birth field restricted to users above 18 years old -->
          <input id="dateofbirth" type="date" name="dateofbirth" required min='1950-12-31' max="<?php echo date('Y-m-d', strtotime('-18 years')); ?>" />
          <!-- Register button -->
          <button type="submit">Register</button>
      </form>
    </div>
    <!-- Footer Section -->
    <?php echo showFooter(); ?>
  </body>
</html>
