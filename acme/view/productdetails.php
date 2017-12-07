<?php 
 if ($_SERVER['HTTP_HOST'] == 'localhost') // or any other host
 {
      $basepath = '/cit336/acme/';
      $imgpath = '/cit336';
 } else {
     $basepath = '/acme';
     $imgpath = '';
 }
 $result = filter_input(INPUT_GET, 'result', FILTER_SANITIZE_NUMBER_INT);
 if ($result > 0) {
    $reviewMessage = "<h3 class='success'>Thank you for submitting a review.</h3>";
} else {
    $reviewMessage = "<h3 class='failure'>There was an issue submitting your review.  Please try again</h3>";
}
 ?>
<!DOCTYPE html>
<html lang = "en">
<head>
    <meta charset = "utf-8">
    <meta http-equiv = "X-UA-Compatible" content="IE=edge">
    <meta name = "viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><?php echo $type; ?> Products | Acme, Inc.</title>
    
    <?php include '../common/head.php'; ?>


</head>
<body>
    <div class="content">
        <?php require '../common/header.php'; ?>

        <main>
            <h1><?php echo $product['invName']; ?></h1>
            <?php if(isset($message)){ echo $message; } ?>
            <div  class="prodInfo">
                <div class="prodImage">
                    <img src='<?php echo $imgpath . $product['invImage']; ?>' id='prodImage' alt='Image of <?php echo $product['invName']; ?> on Acme.com'>
                </div>
                
                <div class="prodDetails">
                <h5>Reviews can be found below</h5>
                <h4 id="prodDescription">Description: <?php echo $product['invDescription']; ?></h4>

                    <p id="prodPrice">Price: <?php echo $product['invPrice']; ?></p>

                    <p id="prodStock"># in Stock: <?php echo $product['invStock']; ?></p>

                    <p id="prodWeight">Product Weight: <?php echo $product['invWeight']; ?></p>

                    <p id="prodLocation">Location of Item: <?php echo $product['invLocation']; ?></p>

                    <p id="prodStyle">Style: <?php echo $product['invStyle']; ?></p>
                </div>
            </div>
            <section class="reviews">
            
            <h2>Customer Reviews</h2>
            <?php
                if (isset ($reviewMessage)) {
                    echo $reviewMessage;
                }
                if (isset($_SESSION['loggedin'])) {
                    echo "<p>Please leave a review so others can see what you think about this product.</p>";
                    include '../common/review-new.php';
                } else {
                    echo "<p>You can leave a review if you Log in first.</p>";  
                }
                echo $result;

                echo $reviewList;
                
                
            ?>
        </section>
        </main>
        
    <?php require "../common/footer.php" ?>
    </div>
    <!-- Latest jQuery Library un-comment if needed-->
    <!-- <script src = "https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> -->
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <!-- JavaScript files -->
    


</body>
</html>