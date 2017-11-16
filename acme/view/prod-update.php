<?php
if ($_SESSION['clientData']['clientLevel'] < 2) {
 header("location: " . $basepath . "/index.php");
 exit;
}?>
<!DOCTYPE html>
<html lang = "en">
<head>
    <meta charset = "utf-8">
    <meta http-equiv = "X-UA-Compatible" content="IE=edge">
    <meta name = "viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><?php if(isset($prodInfo['invName'])){ echo "Modify $prodInfo[invName] ";} elseif(isset($invName)) { echo $invName; }?> | Acme update products</title>

    <?php include '../common/head.php'; ?>

</head>
<body>

    <div class="content">
        <?php require '../common/header.php'; ?>

        <main>
        <h1><?php if(isset($prodInfo['invName'])){ echo "Modify $prodInfo[invName] ";} elseif(isset($invName)) { echo $invName; }?></h1>
            <?php
                if (isset($message)) {
                    echo "<h3>". $message . "</h3>";
                }
            ?>
            <form method="post" action="<?php echo $basepath ?>/products/index.php" id="registrationform">
                <fieldset> 
                    <div>
                        <input class="inputinvalid" id="invName" name="invName" type="text" required placeholder="Inventory Item Name" tabindex="1" title="Enter Item Name" <?php if(isset($invName) && (!isset($sucess))){echo "value='$invName'";} elseif(isset($prodInfo['invName'])) {echo "value='$prodInfo[invName]'"; } ?> >
                        <label for="invName">Item Name</label>
                    </div>
                    <div>
                        <textarea class="textareainvalid" id="invDescription" name="invDescription" rows="5" cols="40" required placeholder="Item Description" tabindex="2" title="Enter the description of the item"><?php if(isset($invDescription) && (!isset($sucess))){echo $invDescription;} elseif(isset($prodInfo['invDescription'])) {echo "$prodInfo[invDescription]"; } ?></textarea>
                        <label for="invDescription">Description</label>
                    </div>
                    <div>
                        <input class="inputinvalid" id="invImage" name="invImage" type="text" required placeholder="path to image" tabindex="3" title="Enter the path to the image item. /acme/images/no-image/no-image.png if none." <?php if(isset($invImage) && (!isset($sucess))) {echo "value='$invImage'";} elseif(isset($prodInfo['invImage'])) {echo "value='$prodInfo[invImage]'"; } ?> />
                        <label for="invImage">Image Path</label>
                    </div>
                    <div>
                        <input class="inputinvalid" id="invThumbnail" name="invThumbnail" type="text" required tabindex="4" title="Enter the path to the thumbnail image." <?php if(isset($invThumbnail) && (!isset($sucess))){echo "value='$invThumbnail'";} elseif(isset($prodInfo['invThumbnail'])) {echo "value='$prodInfo[invThumbnail]'"; }?> />
                        <label for="invThumbnail">Thumbnail Path</label>
                    </div>
                    <div>
                        <input class="inputinvalid" id="invPrice" name="invPrice" type="number" required  tabindex="5" step="0.01" min="0" title="Enter the Price." <?php if(isset($invPrice) && (!isset($sucess))){echo "value='$invPrice'";} elseif(isset($prodInfo['invPrice'])) {echo "value='$prodInfo[invPrice]'"; } ?> />
                        <label for="invPrice">Price</label>
                    </div>
                    <div>
                        <input class="inputinvalid" id="invStock" name="invStock" type="number" required tabindex="6" title="Enter the number in Stock." <?php if(isset($invStock) && (!isset($sucess))){echo "value='$invStock'";} elseif(isset($prodInfo['invStock'])) {echo "value='$prodInfo[invStock]'"; } ?> />
                        <label for="invStock">Qty in Stock</label>
                    </div>
                    <div>
                        <input class="inputinvalid" id="invSize" name="invSize" type="number" required tabindex="6" title="Enter the Size." <?php if(isset($invSize) && (!isset($sucess))){echo "value='$invSize'";} elseif(isset($prodInfo['invSize'])) {echo "value='$prodInfo[invSize]'"; } ?> />
                        <label for="invSize">Size</label>
                    </div>
                    <div>
                        <input class="inputinvalid" id="invWeight" name="invWeight" type="number" step="0.01" min="0" required tabindex="7" title="Enter the Weight." <?php if(isset($invWeight) && (!isset($sucess))){echo "value='$invWeight'";} elseif(isset($prodInfo['invWeight'])) {echo "value='$prodInfo[invWeight]'"; }?> />
                        <label for="invWeight">Weight</label>
                    </div>
                    <div>
                        <input class="inputinvalid" id="invLocation" name="invLocation" type="text" required tabindex="8" title="Enter the location."  <?php if(isset($invLocation) && (!isset($sucess))){echo "value='$invLocation'";} elseif(isset($prodInfo['invLocation'])) {echo "value='$prodInfo[invLocation]'"; }?> />
                        <label for="invLocation">Location</label>
                    </div>
                    <div>
                        <input class="inputinvalid" id="category" name="category" autocomplete="off" list="categories" required tabindex="9" title="Select the category." <?php if(isset($category1) && (!isset($sucess))){echo "value='$category1'";} elseif(isset($prodInfo['category'])) {echo "value='$prodInfo[category]'"; } ?> >
                        <?php echo $catList; ?> 
                        <label for="category">Category</label>
                    </div>
                    <div>
                        <input class="inputinvalid" id="invVendor" name="invVendor" type="text" required tabindex="10" title="Enter the name of the Vendor." <?php if(isset($invVendor) && (!isset($sucess))){echo "value='$invVendor'";} elseif(isset($prodInfo['invVendor'])) {echo "value='$prodInfo[invVendor]'"; }?> />
                        <label for="invVendor">Vendor Name</label>
                    </div>
                    <div>
                        <input class="inputinvalid" id="invStyle" name="invStyle" type="text" required tabindex="11" title="Enter the Style of the item." <?php if(isset($invStyle) && (!isset($sucess))){echo "value='$invStyle'";} elseif(isset($prodInfo['invStyle'])) {echo "value='$prodInfo[invStyle]'"; } ?> />
                        <label for="invStyle">Style</label>
                    </div>
                    
                </fieldset>

                <input type="submit" name="submit" value="Update Product">
                <!-- Add the action name - value pair -->
                <input type="hidden" name="action" value="updateProd">
                <input type="hidden" name="invId" value="<?php if(isset($prodInfo['invId'])){ echo $prodInfo['invId'];} elseif(isset($invId)){ echo $invId; } ?>">
                
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