<!DOCTYPE html>
<html lang = "en">
<head>
    <meta charset = "utf-8">
    <meta http-equiv = "X-UA-Compatible" content="IE=edge">
    <meta name = "viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Acme Review Edit</title>

    <?php include '../common/head.php'; ?>


</head>
<body>

    <div class="content">
        <?php require '../common/header.php'; ?>

        <main>
        <h1>Edit Review</h1>
            <?php
                if (isset($message)) {
                    echo "<h3>". $message . "</h3>";
                }
            ?>

            <h2>Are you sure you wish to delete this review?</h2>
            <form method="post" action="<?php echo $basepath ?>/reviews/" id="registrationform">
                <fieldset> 
                    <div>
                        <input class="inputinvalid" id="reviewDate" name="reviewDate" type="text" readonly <?php if(isset($review['reviewDate'])){ echo "value='" . $review['reviewDate'] . "'"; } ?> >
                        <label for="reviewDate">Date of Review</label>
                    </div>
                    <div>
                        <textarea class="textareainvalid" id="reviewText" name="reviewText" rows="5" cols="40" readonly><?php if(isset($review['reviewText'])){echo $review['reviewText'];} ?></textarea>
                        <label for="reviewText">Text of Review</label>
                    </div>
                    
                    
                </fieldset>

                <input type="submit" name="submit" value="Delete Review">
                <!-- Add the action name - value pair -->
                <input type="hidden" name="action" value="reviewdelete">
                <input type="hidden" name="reviewId" value="<?php echo $review['reviewId']; ?>">
            </form>
        </main>
    <?php require "../common/footer.php" ?>
    </div>
    <!-- Latest jQuery Library un-comment if needed-->
    <!-- <script src = "https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> -->
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <!-- JavaScript files -->
    <!-- This script will fill in all the values that had items in them so the person can add only the missing items. -->
    

</body>
</html>