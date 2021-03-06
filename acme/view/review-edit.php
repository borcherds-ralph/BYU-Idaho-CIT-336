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
            <form method="post" action="<?php echo $basepath ?>/reviews/" id="registrationform">
                <fieldset> 
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fas fa-user"></i></span>
                        <input class="inputvalid" id="reviewClientName" name="reviewClientName" type="text" readonly title="Review Text" <?php echo "value='" . substr($_SESSION['clientData']['clientFirstname'],0, 1) . $_SESSION['clientData']['clientLastname'] . "'" ?> >
                        
                        <label for="reviewText">Your Screen Name:</label>
                        
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="far fa-calendar-alt"></i></span>
                        <input class="inputvalid" id="reviewDate" name="reviewDate" type="text" readonly <?php if(isset($review['reviewDate'])){ echo "value='" . $review['reviewDate'] . "'"; } ?> >
                        <label for="reviewDate">Date of Review</label>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fas fa-comment-alt"></i></span>
                        <textarea class="textareavalid" id="reviewText" name="reviewText" rows="5" cols="60" maxlength="45" required placeholder="Please enter your review" tabindex="1" title="Review Text"  ><?php if(isset($review['reviewText'])){echo $review['reviewText'];} ?></textarea></textarea>
                        <label for="reviewText">Your Review</label>
                        <div id="charcount"><span id="chars">45</span> &nbsp;characters remaining</div>
                    </div>
                    
                    
                </fieldset>

                <input type="submit" name="submit" value="Modify Review">
                <!-- Add the action name - value pair -->
                <input type="hidden" name="action" value="reviewupdate">
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
    
<script>
    var maxLength = 45;
    $('textarea').keyup(function() {
        var length = $(this).val().length;
        var length = maxLength-length;
        $('#chars').text(length);
    });
</script>
</body>
</html>