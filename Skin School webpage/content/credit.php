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
    <link rel="stylesheet" href="../assets/stylesheets/share.css" />
    <link rel="stylesheet" href="../assets/stylesheets/credit.css" />
  </head>
  <body>
  <!-- Header Section -->
  <?php echo showHeader($isLogin); ?>
    <div id="main">
      <h1>Credit</h1>
    </div>
     <p>
       1. AdobeStock. Skintypes. Available at: https://stock.adobe.com/uk/search?k=skin+types (Accessed 20 Oct 2024). 
          <br />
          <br />
        2. Beautymates, Skincare for stressed skin. Available at: https://www.beautymates.com/en/blogs/hautprobleme-losungen/skin-care-stressed-skin [Accessed 20 October 2024].
          <br />
          <br />
        3. Bellphoria, Top 5 reasons why Korean beauty is so popular. Available at: https://bellphoria.com/top-5-reasons-why-korean-beauty-is-so-popular/ [Accessed 20 October 2024].
          <br />
          <br />
        4. Dreamstime, Mature woman applying skin cream to face: anti-aging concept. Available at: https://www.dreamstime.com/mature-woman-applying-skin-cream-face-beautiful-holding-jar-body-isolated-grey-background-happy-senior-anti-aging-image120991518 [Accessed 20 October 2024]
          <br />
          <br />
        5. Everyuth Naturals, Celebrate natural skincare with sustainable products. Available at: https://www.everyuth.com/blog/celebrate-natural-skincare-with-sustainableproducts/ [Accessed 20 October 2024].
          <br />
          <br />
        6. Face the Future, Student skincare on a budget: your minimal routine for maximum results. Available at: https://www.facethefuture.co.uk/cdn/shop/articles/Student_Skincare_On_A_Budget_Your_Minimal_Routine_For_Maximum_Results.jpg?crop=center&height=1024&v=1722251984&width=1024 [Accessed 12 December 2024].
          <br />
          <br />
        7. Figaro London, 3 skincare tips for the changing season. Available at: https://figarolondon.uk/3-skincare-tips-for-the-changing-season/ [Accessed 12 December 2024].
          <br />
          <br />
        8. OpenArt, Community testimonials: PUgvPmagwnrqD6a6ISGw. Available at: https://openart.ai/community/PUgvPmagwnrqD6a6ISGw [Accessed 20 October 2024].
          <br />
          <br />
        9. Shutterstock, Satisfied Indian lady applying cleansing foam. Available at: https://www.shutterstock.com/image-photo/satisfied-indian-lady-applying-cleansing-foam-1613076583 [Accessed 20 October 2024].
          <br />
          <br />
        10.Shutterstock, Senior woman pulling cheeks: softness of aging skin. Available at: https://www.shutterstock.com/image-photo/senior-woman-pulling-cheeks-feel-softness1206730258 [Accessed 21 October 2024].
          <br />
          <br />
        11.Shutterstock, Woman face testimonial. Available at: https://www.shutterstock.com/search/woman-face-testimonial[Accessed 20 October 2024].
          <br />
          <br />
        12.Vecteezy, Citrus fresh fruit: orange, grapefruit, lemon, lime with mint leaves. Available at: https://www.vecteezy.com/photo/27603610-citrus-fresh-fruit-orange-grapefruit-lemon-lime-with-mint-leave [Accessed 20 October 2024].
          <br />
          <br />
        13.Vecteezy, Free videos: skin care. Available at: https://www.vecteezy.com/freevideos/skin-care [Accessed 20 October 2024].
          <br />
          <br />
        14.Vogue, Travel beauty: long-haul flight skincare tips. Available at: https://www.vogue.com/article/travel-beauty-long-haul-flight-sleep-skin-hydration-tips-body-face-massage-intermittent-fasting [Accessed 12 December 2024].
          <br />
          <br />
        15.Wallpapers.com, Skincare products showcase on pink background. Available at: https://wallpapers.com/wallpapers/skincare-products-showcase-pink-background-0kgvjc79f8g0dsgy.html [Accessed 20 October 2024].
          <br />
          <br />
        16.Westend61, Youthful female model applying moisturizer. Available at: https://www.westend61.de/en/photo/JLPSF22671/close-up-of-a-youthful-female-modelapplying-moisturizer-to-her-face-young-korean-woman-putting-moisturizer-cream-on-herpretty-face-against-pink-background [Accessed 20 October 2024].
    <!-- Footer Section -->
    <?php echo showFooter(); ?>
  </body>
</html>

        

        

