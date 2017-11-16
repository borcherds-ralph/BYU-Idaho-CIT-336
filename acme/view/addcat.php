<?php
if ($_SESSION['clientData']['clientLevel'] < 2) {
 header("location: " . $basepath . "/index.php");
 exit;
}
?>
<!DOCTYPE html>
<html lang = "en">
<head>
    <meta charset = "utf-8">
    <meta http-equiv = "X-UA-Compatible" content="IE=edge">
    <meta name = "viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Acme</title>

    <?php include '../common/head.php'; ?>


</head>
<body>
    <div class="content">
        <?php require '../common/header.php'; ?>

        <main>
        <h1>User Registration</h1>
            <?php
                if (isset($message)) {
                echo $message;
                }
            ?>
            <form method="post" action="<?php echo $basepath ?>/products/index.php" id="registrationform">
                <fieldset>
                    <div>
                        <input class="requiredinvalid" id="categoryName" name="categoryName"
                        type="text" required placeholder="Category Name" tabindex="1"
                        title="Enter Name of the Category" <?php if(isset($categoryName)){echo "value='$categoryName'";} ?>/>
                        <label for="categoryName">Category Name</label>
                    </div>
                    
                </fieldset>

                <input type="submit" name="submit" value="Submit New Category">
                <!-- Add the action name - value pair -->
                <input type="hidden" name="action" value="addcat">
                
            </form>
        </main>
    <?php require "../common/footer.php" ?>
    </div>
    <!-- Latest jQuery Library un-comment if needed-->
    <!-- <script src = "https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> -->
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <!-- JavaScript files -->
    


</body>
</html>