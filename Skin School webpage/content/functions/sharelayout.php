<?php
/**
 * This function generates and returns the header for web pages. 
 * @param boolean $loginStatus indciates whether the user is logged in 
 * @return string generates header 
 */
function showHeader($loginStatus) {
  // Displays different links based on login status 
  if  ($loginStatus) {
    $AuthorisedUserLink = "<li><a href='./logout.php'>Logout</a></li>";
  } else {
    $AuthorisedUserLink = "
      <li><a href='./login.php'>Login</a></li>
      <li><a href='./register.php'>Register</a></li>
    ";
  }
    // Return the header (html)
    return <<< Header
    <header>
      <h1>Skin School</h1>
      <!--Navigation Bar-->
      <div>
        <nav>
          <ul>
            <li><a href="./index.php">Home</a></li>
            <li><a href="./sessions.php">Sessions</a></li>
            <li><a href="./credit.php">Credits</a></li>
            $AuthorisedUserLink
          </ul>
        </nav>
        <div>
          <input type="text" placeholder="Search..." />
          <button type="submit">Go</button>
        </div>
      </div>
    </header>
    Header;
}

/**
 * This function generates and returbns the footer for web pages. 
 * @return string generated footer (html)
 */
function showFooter() {
  return <<< Footer
    <footer>
      <p>Copyright &copy; 2024 Website. All rights reserved.</p>
      <div></div>
      <br />
    </footer>
    Footer;
}

?>