<?php 
// Set base path depending on localhost vs server
$basepath = setBasePath();
$imgpath = setImagePath();

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
            <h1>Server Error</h1>
            <h3>Sorry, the server experienced a problem.</h3>
        </main>
    <?php require "../common/footer.php" ?>
    </div>
    <!-- Latest jQuery Library un-comment if needed-->
    <!-- <script src = "https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> -->
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <!-- JavaScript files -->
    


</body>
</html>