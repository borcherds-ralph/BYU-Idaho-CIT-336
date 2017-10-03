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

    <!-- Javascript files that have to load at the top -->
    <script src="js/scripts.js"></script>


</head>
<body>
    <div class="content">
        <?php require '../common/header.php'; ?>
        <nav id="menu"><?php echo $navList; ?></nav>
        <main>
        <h1>User Registration</h1>
            <form action="" method="get" id="registrationform">
                <fieldset>
                    <div>
                        <input class="requiredinvalid" id="firstname" name="firstname"
                        type="firstname" required placeholder="First Name" tabindex="1"
                        title="Enter your First Name"/>
                        <label for="firstname">First Name</label>
                    </div>
                    <div>
                        <input class="requiredinvalid" id="lastname" name="lastname"
                        type="lastname" required placeholder="Last Name" tabindex="2"
                        title="Enter your Last Name"/>
                        <label for="lastname">Last Name</label>
                    </div>
                    <div>
                        <input class="requiredinvalid" id="email" name="email"
                        type="email" required placeholder="email@address.com" tabindex="3"
                        title="E-mail address must be a valid e-mail address format."/>
                        <label for="email">e-Mail Address</label>
                    </div>
                    <div>
                        <input class="requiredinvalid" id="password" name="password"
                        type="password" tabindex="4"
                        title="E-mail address must be a valid e-mail address format."/>
                        <label for="password">Password</label>
                    </div>
                </fieldset>
                <input type="submit" name="login" value="Create Account" />
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