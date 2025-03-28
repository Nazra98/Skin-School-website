<?php
// Start the session 
session_start();
// Remove the login status varaible from the session 
unset($_SESSION['loginStatus']);
// Delete all session data 
session_destroy();
// Redirect user to the homepage 
header('Location: index.php');
