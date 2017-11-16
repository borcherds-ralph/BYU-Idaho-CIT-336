<?php
if ($_SESSION['clientData']['clientLevel'] < 2) {
 header("location: $basepath");
 exit;
}?>
<!DOCTYPE html>
<html lang = "en">
<head>
    <meta charset = "utf-8">
    <meta http-equiv = "X-UA-Compatible" content="IE=edge">
    <meta name = "viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><title><?php if(isset($prodInfo['invName'])){ echo "Delete $prodInfo[invName]";} ?> | Acme, Inc.</title>

    <?php include '../common/head.php'; ?>


</head>
<body>

    <div class="content">
        <?php require '../common/header.php'; ?>

        <main>
        <h1><?php if(isset($prodInfo['invName'])){ echo "Delete $prodInfo[invName]";} ?></h1>
            <?php
                if (isset($message)) {
                    echo "<h3>". $message . "</h3>";
                }
            ?>
            <p>Confirm Product Deletion. The delete is permanent.</p>
            
            <form method="post" action="<?php echo $basepath ?>/products/index.php" id="registrationform">
                <fieldset> 
                    <div>
                        <input class="inputinvalid" id="invName" name="invName" type="text" readonly <?php if(isset($prodInfo['invName'])) {echo "value='$prodInfo[invName]'"; } ?> >
                        <label for="invName">Item Name</label>
                    </div>
                    <div>
                        <textarea class="textareainvalid" id="invDescription" name="invDescription" rows="5" cols="40" readonly> <?php if(isset($prodInfo['invDescription'])) {echo "$prodInfo[invDescription]"; } ?></textarea>
                        <label for="invDescription">Description</label>
                    </div>
                </fieldset>

                <input type="submit" name="submit" value="Delete Product">
                <!-- Add the action name - value pair -->
                <input type="hidden" name="action" value="deleteProd">
                <input type="hidden" name="invId" value="<?php if(isset($prodInfo['invId'])){ echo $prodInfo['invId'];} ?>">
                
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