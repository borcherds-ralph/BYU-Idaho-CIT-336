<!DOCTYPE html>
<html lang = "en">
<head>
    <meta charset = "utf-8">
    <meta http-equiv = "X-UA-Compatible" content="IE=edge">
    <meta name = "viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><?php echo $type; ?> Products | Acme, Inc.</title>
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
        <h1><?php echo $type; ?> Products</h1>
        <?php if(isset($message)){ echo $message; } ?>
        <?php if(isset($prodDisplay)){ echo $prodDisplay; } ?>
        </main>
    <?php require "../common/footer.php" ?>
    </div>
    <!-- Latest jQuery Library un-comment if needed-->
    <!-- <script src = "https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> -->
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <!-- JavaScript files -->
    


</body>
</html>