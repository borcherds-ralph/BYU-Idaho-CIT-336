<!DOCTYPE html>
<html lang = "en">
<head>
    <meta charset = "utf-8">
    <meta http-equiv = "X-UA-Compatible" content="IE=edge">
    <meta name = "viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Acme</title>

    <!-- CSS files -->
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="../css/style.css" media="screen">

    <!-- Javascript files that have to load at the top -->
    <script src="js/scripts.js"></script>


</head>
<body>
    <div class="content">
        <?php require '../common/header.php'; ?>
        <nav id="menu"><?php echo $navList; ?></nav>
        <main>
        <h1>User Registration</h1>
            <?php
                if (isset($message)) {
                    echo $message . "<br>";
                }
            ?>
            <form method="post" action="<?php echo $basepath ?>/products/products.php" id="registrationform">
                <fieldset> 
                    <div>
                        <input class="requiredinvalid" id="invName" name="invName"
                        type="text" required placeholder="First Name" tabindex="1"
                        title="Enter Item Name"/>
                        <label for="invName">Item Name</label>
                    </div>
                    <div>
                        <input class="requiredinvalid" id="invDescription" name="invDescription"
                        type="text" required placeholder="Last Name" tabindex="2"
                        title="Enter the description of the item"/>
                        <label for="invDescription">Description</label>
                    </div>
                    <div>
                        <input id="invImage" name="invImage"
                        type="text" placeholder="path to image" tabindex="3"
                        title="Enter the path to the image item. /acme/images/no-image/no-image.png if none."/>
                        <label for="invImage">Image Path</label>
                    </div>
                    <div>
                        <input id="invThumbnail" name="invThumbnail"
                        type="text" tabindex="4"
                        title="Enter the path to the thumbnail image."/>
                        <label for="invThumbnail">Thumbnail Path</label>
                    </div>
                    <div>
                        <input id="invPrice" name="invPrice"
                        type="number" tabindex="5"
                        title="Enter the Price."/>
                        <label for="invPrice">Price</label>
                    </div>
                    <div>
                        <input id="invStock" name="invStock"
                        type="number" tabindex="6"
                        title="Enter the number in Stock."/>
                        <label for="invStock">Qty in Stock</label>
                    </div>
                    <div>
                        <input id="invSize" name="invSize"
                        type="number" tabindex="6"
                        title="Enter the Size."/>
                        <label for="invSize">Size</label>
                    </div>
                    <div>
                        <input id="invWeight" name="invWeight"
                        type="number" tabindex="7"
                        title="Enter the Weight."/>
                        <label for="invWeight">Weight</label>
                    </div>
                    <div>
                        <input id="invLocation" name="invLocation"
                        type="text" tabindex="8"
                        title="Enter the location."/>
                        <label for="invLocation">Location</label>
                    </div>
                    <div>
                        <input id="category" name="category"
                        list="categories" tabindex="9"
                        title="Select the category."/>
                        <?php echo $catList; ?>
                        <label for="category">Category</label>
                    </div>
                    <div>
                        <input id="invVendor" name="invVendor"
                        type="text" tabindex="10"
                        title="Enter the name of the Vendor."/>
                        <label for="invVendor">Vendor Name</label>
                    </div>
                    <div>
                        <input id="invStyle" name="invStyle"
                        type="text" tabindex="11"
                        title="Enter the Style of the item."/>
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
    <script type="text/javascript">
        document.getElementById('invName').value = "<?php echo $_POST['invName'];?>";
        document.getElementById('invDescription').value = "<?php echo $_POST['invDescription'];?>";
        document.getElementById('invImage').value = "<?php echo $_POST['invImage'];?>";
        document.getElementById('invThumbnail').value = "<?php echo $_POST['invThumbnail'];?>";
        document.getElementById('invPrice').value = "<?php echo $_POST['invPrice'];?>";
        document.getElementById('invSize').value = "<?php echo $_POST['invSize'];?>";
        document.getElementById('invLocation').value = "<?php echo $_POST['invLocation'];?>";
        document.getElementById('invLocation').value = "<?php echo $_POST['invLocation'];?>";
        document.getElementById('category').value = "<?php echo $_POST['category'];?>";
        document.getElementById('invVendor').value = "<?php echo $_POST['invVendor'];?>";
        document.getElementById('invStyle').value = "<?php echo $_POST['invStyle'];?>";
        document.getElementById('invWeight').value = "<?php echo $_POST['invWeight'];?>";
        document.getElementById('invStock').value = "<?php echo $_POST['invStock'];?>";
    </script>

</body>
</html>