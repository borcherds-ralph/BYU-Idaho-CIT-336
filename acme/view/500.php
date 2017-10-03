<?php if ($_SERVER['HTTP_HOST'] == 'localhost') // or any other host
{
     $basepath = '/cit336/acme';
}

else
{
    $basepath = '/acme';
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
    <meta http-equiv="Cache-Control" content="max-age=200" />
    <!-- CSS files -->
    <link rel="stylesheet" href="../css/normalize.css">
    <!-- <link href="https://fonts.googleapis.com/css?family=Architects+Daughter%7cCovered+By+Your+Grace%7cGloria+Hallelujah%7cHandlee%7cIndie+Flower" rel="stylesheet"> -->
    <link rel="stylesheet" href="../css/style.css" media="screen">
    <script src="../js/scripts.js"></script>
</head>
<body>
    <div class="content">
        <?php require '../common/header.php'; ?>
        <?php require '../common/nav.php'; ?>
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