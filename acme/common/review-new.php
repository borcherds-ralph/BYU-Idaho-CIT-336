

<form method="post" action="<?php echo $basepath ?>/reviews/index.php" id="newreview">
    <fieldset> 
    <div>
            <input class="inputvalid" id="reviewClientName" name="reviewClientName" type="text" readonly title="Review Text" <?php echo "value='" . substr($_SESSION['clientData']['clientFirstname'],0, 1) . $_SESSION['clientData']['clientLastname'] . "'" ?> >
            <label for="reviewText">Your Screen Name:</label>

        </div>
        <div>
            <textarea class="textareainvalid" id="reviewText" name="reviewText" rows="5" cols="60" required placeholder="Please enter your review" tabindex="1" title="Review Text"  ></textarea>
            <label for="reviewText">Your Review</label>

        </div>
        
    </fieldset>
    <input type="submit" name="submit" value="Add Review">
    <!-- Add the action name - value pair -->
    <input type="hidden" name="action" value="reviewadd">
    <input type="hidden" name="clientId" value="<?php echo $_SESSION['clientData']['clientId']; ?>">
    <input type="hidden" name="invId" value="<?php echo $product['invId']; ?>">
    <input type="hidden" name="prodcat" value="<?php echo $product['categoryId']; ?>">
</form>