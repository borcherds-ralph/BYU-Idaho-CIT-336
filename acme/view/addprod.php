<!DOCTYPE html>
<html lang = "en">
<head>
    <meta charset = "utf-8">
    <meta http-equiv = "X-UA-Compatible" content="IE=edge">
    <meta name = "viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Acme Add Product</title>

    <!-- CSS files -->
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="../css/style.css" media="screen">

    <!-- Javascript files that have to load at the top -->
    <script src="../js/scripts.js"></script>


</head>
<body>
    <div class="content">
        <?php require '../common/header.php'; ?>
        <nav id="menu"><?php echo $navList; ?></nav>
        <main>
        <h1>New Inventory Item</h1>
            <?php
                if (isset($message)) {
                    echo "<h3>". $message . "</h3>";
                }
            ?>
            <form method="post" action="<?php echo $basepath ?>/products/index.php" id="registrationform">
                <fieldset> 
                    <div>
                        <input id="invName" name="invName" type="text" required placeholder="Inventory Item Name" tabindex="1" title="Enter Item Name" <?php if(isset($invName)){echo "value='$invName'";} ?> />
                        <label for="invName">Item Name</label>
                    </div>
                    <div>
                        <textarea id="invDescription" name="invDescription" rows="5" cols="40" required placeholder="Item Description" tabindex="2" title="Enter the description of the item" <?php if(isset($invDescription)){echo "value='$invDescription'";} ?> ></textarea>
                        <label for="invDescription">Description</label>
                    </div>
                    <div>
                        <input id="invImage" name="invImage" type="text" required placeholder="path to image" tabindex="3" title="Enter the path to the image item. /acme/images/no-image/no-image.png if none." <?php if(isset($invImage)){echo "value='$invImage'";} ?> />
                        <label for="invImage">Image Path</label>
                    </div>
                    <div>
                        <input id="invThumbnail" name="invThumbnail" type="text" required tabindex="4" title="Enter the path to the thumbnail image." <?php if(isset($invThumbnail)){echo "value='$invThumbnail'";} ?> />
                        <label for="invThumbnail">Thumbnail Path</label>
                    </div>
                    <div>
                        <input id="invPrice" name="invPrice" type="number" required  tabindex="5" step="0.01" min="0" title="Enter the Price." pattern="\d+(\.\d{2})?" <?php if(isset($invPrice)){echo "value='$invPrice'";} ?> />
                        <label for="invPrice">Price</label>
                    </div>
                    <div>
                        <input id="invStock" name="invStock"type="number" required tabindex="6" title="Enter the number in Stock." <?php if(isset($invStock)){echo "value='$invStock'";} ?> />
                        <label for="invStock">Qty in Stock</label>
                    </div>
                    <div>
                        <input id="invSize" name="invSize" type="number" required tabindex="6" title="Enter the Size." <?php if(isset($invSize)){echo "value='$invSize'";} ?> />
                        <label for="invSize">Size</label>
                    </div>
                    <div>
                        <input id="invWeight" name="invWeight" type="number" step="0.01" min="0" required tabindex="7" title="Enter the Weight." <?php if(isset($invWeight)){echo "value='$invWeight'";} ?> />
                        <label for="invWeight">Weight</label>
                    </div>
                    <div>
                        <input id="invLocation" name="invLocation" type="text" required tabindex="8" title="Enter the location."  <?php if(isset($invLocation)){echo "value='$invLocation'";} ?> />
                        <label for="invLocation">Location</label>
                    </div>
                    <div>
                        <input id="category" name="category" autocomplete="off" list="categories" required tabindex="9" title="Select the category." >
                        <?php echo $catList; ?> 
                        <label for="category">Category</label>
                    </div>
                    <div>
                        <input id="invVendor" name="invVendor" type="text" required tabindex="10" title="Enter the name of the Vendor." <?php if(isset($invVendor)){echo "value='$invVendor'";} ?> />
                        <label for="invVendor">Vendor Name</label>
                    </div>
                    <div>
                        <input id="invStyle" name="invStyle" type="text" required tabindex="11" title="Enter the Style of the item." <?php if(isset($invStyle)){echo "value='$invStyle'";} ?> />
                        <label for="invStyle">Style</label>
                    </div>
                    
                </fieldset>

                <input type="submit" name="submit" value="Add Product">
                <!-- Add the action name - value pair -->
                <input type="hidden" name="action" value="addprod">
                
            </form>
        </main>
    <?php require "../common/footer.php" ?>
    </div>
    <!-- Latest jQuery Library un-comment if needed-->
    <!-- <script src = "https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> -->
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <!-- JavaScript files -->
    <!-- This script will fill in all the values that had items in them so the person can add only the missing items. -->
    
<?php echo print_r($_POST); ?>

</body>
</html>