<!DOCTYPE html>
<html lang = "en">
<head>
    <meta charset = "utf-8">
    <meta http-equiv = "X-UA-Compatible" content="IE=edge">
    <meta name = "viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Acme</title>
    
    <?php include 'common/head.php'; ?>
</head>
<body>
    <div class="content">
        <?php require 'common/header.php'; ?>
            
        <main>
            <section class="top">
                <div class="topimg"><img id="imgrocket" src="<?php echo $imgpath; ?>/acme/images/site/rocketfeature.jpg" alt="Wiley on Rocket"></div>
                    <div class="textright">
                        <ul>
                            <li><h2>Acme Rocket</h2></li>
                            <li>Quick lighting fuse</li>
                            <li>NHTSA approved seat belts</li>
                            <li>Mobile launch stand included</li>
                            <li><a href="/acme/cart/"><img id="actionbtn" alt="Add to cart button" src="<?php echo $imgpath; ?>/acme/images/site/iwantit.gif"></a></li>
                        </ul>
                    </div>
                
             </section>
             <section class="bottom">
                 <h2 class="nodisplay">nodisplay</h2>
                <section class="recipes">
                    <h2 class="recipesrow1">Featured Recipes</h2>

                    <div class="bbq recipesrow2">
                        <figure class="bkggrey">
                            <img src="<?php echo $imgpath; ?>/acme/images/recipes/bbqsand.jpg" alt="Pulled Roadrunner BBQ">
                            <figcaption>Pulled Roadrunner BBQ</figcaption>
                        </figure>
                        
                    </div>
                    <div class="potpie recipesrow2">
                    <figure class="bkggrey">
                            <img src="<?php echo $imgpath; ?>/acme/images/recipes/potpie.jpg" alt="Roadrunner Pot Pie">
                            <figcaption>Roadrunner Pot Pie</figcaption>
                        </figure>                    
                    </div>
                    <div class="soup recipesrow3">
                    <figure class="bkggrey">
                            <img src="<?php echo $imgpath; ?>/acme/images/recipes/soup.jpg" alt="Roadrunner Soup">
                            <figcaption>Roadrunner Soup</figcaption>
                        </figure>                    
                    </div>
                    <div class="tacos recipesrow3">
                    <figure class="bkggrey">
                            <img src="<?php echo $imgpath; ?>/acme/images/recipes/taco.jpg" alt="Roadrunner Tacos">
                            <figcaption>Roadrunner Tacos</figcaption>
                        </figure>                    
                    </div>
                </section>
                <section class="rightsection">
                    <h2 class="row1">Hero Product Review</h2>
                    <ul>
                        <li>"I don't know how I ever caught roadrunners before this." (4/5)</li>
                        <li>"That thing was fast!" (4/5)</li>
                        <li>"Talk about fast delivery." (5/5)</li>
                        <li>"I didn't even have to pull the meat apart." (4.5/5)</li>
                        <li>"I'm on my thirtieth one. I love these things!" (5/5)</li>
                    </ul>
                </section>
            </section>
        </main>
    <?php require "common/footer.php" ?>
    </div>
    
    <!-- Latest jQuery Library un-comment if needed-->
    <!-- <script src = "https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> -->
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <!-- JavaScript files -->
    <script src="js/scripts.js"></script>
</body>
</html>