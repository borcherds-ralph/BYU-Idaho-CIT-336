<?php
if (isset($_SESSION['message'])) {
 $message = $_SESSION['message'];
}
?>
<!DOCTYPE html>
<html lang = "en">
<head>
    <meta charset = "utf-8">
    <meta http-equiv = "X-UA-Compatible" content="IE=edge">
    <meta name = "viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Acme Image Management</title>
    <?php include '../common/head.php'; ?>

</head>
<body>
    <div class="content">
        <?php require '../common/header.php'; ?>

        <main>
            <h1>Image Management</h1>
            <p>Welcome to the image management page.</p>
            <h2>Add New Product Image</h2>
            <?php
                if (isset($message)) {
                    echo $message;
                }
            ?>
            <form action="<?php echo $basepath; ?>/uploads/" method="post" enctype="multipart/form-data">
                <label for="invItem">Product</label><br>
                <?php echo $prodSelect; ?><br><br>
                <label>Upload Image:</label><br>
                <input type="file" name="file1"><br>
                <input type="submit" class="regbtn" value="Upload">
                <input type="hidden" name="action" value="upload">
            </form>

            <hr>
            <h2>Existing Images</h2>
            <p class="notice">If deleting an image, delete the thumbnail too and vice versa.</p>
            <?php
                if (isset($imageDisplay)) {
                    echo $imageDisplay;
                }
            ?>
        </main>
    <?php require '../common/footer.php' ?>
    </div>
    <!-- Latest jQuery Library un-comment if needed-->
    <!-- <script src = "https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> -->
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <!-- JavaScript files -->
    


</body>
</html>
<?php unset($_SESSION['message']); ?>