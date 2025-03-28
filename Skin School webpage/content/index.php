<?php 
// Include shared layout functions 
require_once './functions/sharelayout.php';
// Start the session 
session_start();
// Determine if the user is logged in 
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
    <link rel="stylesheet" href="../assets/stylesheets/index.css" />
    <link rel="stylesheet" href="../assets/stylesheets/share.css" />
  </head>
  <body>
  <!-- Header Section -->
    <?php echo showHeader($isLogin); ?>
    <div id="main">
      <h1>Skin School</h1>
      <h2>Enhance Your Skincare Knowledge</h2>
    </div>
    <div id="horizontal">
    <!-- Testimonials Section -->
      <div id="left">
        <h3>Testimonials</h3>
        <img
          src="../assets/images/test1.jpeg"
          class="image1"
          alt="Women in a picture with curly hair"
        />
        <p>
          "I loved the K-Beauty session! It was informative and fun,
          <br />
          and I walked away with a new understanding of my skin." — Emily, 35
        </p>
        <img
          src="../assets/images/test2.jpeg"
          class="image2"
          alt=" korean women in a picture"
        />
        <p>
          "The personalised approach at Skin School made such a difference. I
          now understand my skin type"— Mia, 22
        </p>
      </div>
    <!-- About Us Section -->
      <div id="middle">
        <h3>About Us</h3>
        <h4>Empowering you with Skincare Knowledge</h4>
        <p>
          Skin School offers expert-led, hands-on skincare session in Seoul,
          designed to enhance your skincare knowledge in a welcoming
          environment.
        </p>
        <h4>Our Sessions</h4>
        <p>
          From identifying skin types to building personalised routines and
          exploring the latest in K-Beauty, our sessions cover:
        </p>
        <ul>
          <li>Skin Types</li>
          <li>Skincare Routines</li>
          <li>K-Beauty Trends</li>
        </ul>
        <h4>Our Values</h4>
        <ul>
          <li>Quality:A luxurious yet approachable learning environment</li>
          <li>
            Sustainability: Eco-friendly practices, promoting refillable
            products
          </li>
        </ul>
      </div>
    <!-- Upcoming Events Section -->
      <div id="right">
        <h3>Upcoming Events</h3>
        <p>
          <strong>Event:</strong>Skincare for Beginners
          <br />
          <strong>Date:</strong>29th October 2024
          <br />
          Learn the basics of skincare routine and product use.
          <br />
          Ideal for beginners.
        </p>
        <button type="button">Book Now</button>
        <p>
          <strong>Event:</strong>K-Beauty Trends
          <br />
          <strong>Date:</strong>12th November 2024
          <br />
          Explore the latest Korean skincare trends and learn how to achieve
          glass skin.
        </p>
        <button type="button">Book Now</button>
      </div>
    </div>
    <br />
    <br />
   <!-- Featured Sessions Section -->
    <div id="featured">
      <h2>Featured Sessions</h2>
      <p>
        Explore our skincare sessions designed to enhance your
        <br />
        knowledge and help you achieve your best skin. For beginners to
        experienced,
        <br />
        there's something for everyone.
      </p>
    </div>
    <br />
    <br />
    <div id="Sessions">
      <div id="K-Beauty">
        <img
          src="../assets/images/kbeauty.jpeg"
          class="image3"
          alt=" Korean women in a picture"
        />
        <h4>K-Beauty Skincare</h4>
        <a href="#">Learn more</a>
      </div>
      <div id="Aging-Skin">
        <img
          src="../assets/images/mature.jpeg"
          class="image4"
          alt="Older woman in a picture"
        />
        <h4>Aging Skin</h4>
        <a href="#">Learn more</a>
      </div>
      <div id="Skincare-Products">
        <img
          src="../assets/images/skincareproducts.jpeg"
          class="image5"
          alt="different skincare products"
        />
        <h4>Skincare Products</h4>
        <a href="#">Learn more</a>
      </div>
      <div id="Skin-Type">
        <img
          src="../assets/images/skintype.jpeg"
          class="image6"
          alt="women in a picture with closed eyes"
        />
        <h4>Skin Type</h4>
        <a href="#">Learn more</a>
      </div>
    </div>
    <br />
    <br />
    <!-- Footer Section -->
    <?php echo showFooter(); ?>
  </body>
</html>
