<?php
if ($_SESSION['clientData']['clientLevel'] < 2) {
 header("location:  $basepath/index.php");
 exit;
}
if (isset($_SESSION['message'])) {
 $message = $_SESSION['message'];
}?>
<!DOCTYPE html>
<html lang = "en">
<head>
    <meta charset = "utf-8">
    <meta http-equiv = "X-UA-Compatible" content="IE=edge">
    <meta name = "viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Acme Products Management</title>
    <!-- CSS files -->
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="../css/style.css" media="screen">

    <!-- JavaScript files that have to load first -->
    <script src="../js/scripts.js"></script>
</head>
<body>
    <div class="content">
        <?php require '../common/header.php'; ?>
        <nav id="menu"><?php echo $navList; ?></nav>
        <main>
            <h1>Products Management</h1>
            <a href="index.php?action=addcat" class="linkbutton">Add Category</a><br>
            <a href="index.php?action=addprod" class="linkbutton">Add Product</a>

            <?php
                if (isset($message)) {
                echo $message;
                } if (isset($prodList)) {
                echo $prodList;
                }
            ?>
        </main>
        <?php require "../common/footer.php" ?>
    </div>
    <!-- Latest jQuery Library un-comment if needed-->
    <!-- <script src = "https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> -->
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <!-- JavaScript files -->
    


</body>
</html>
<?php unset($_SESSION['message']); ?>