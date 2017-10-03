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
    <script src="../js/scripts.js"></script>
</head>
<body>
    <div class="content">

        <?php require '../common/header.php'; ?>
        <nav id="menu"><?php echo $navList; ?></nav>
        <main>
            <h1>User Login</h1>
            <form action="#" method="get" id="loginform">
                <fieldset>
                    <div>
                        <input class="requiredinvalid" id="email" name="email"
                        type="email" required placeholder="email@address.com" tabindex="1"
                        title="E-mail address must be a valid e-mail address format." readonly
                        onfocus="if (this.hasAttribute('readonly')) {
                            this.removeAttribute('readonly');
                            // fix for mobile safari to show virtual keyboard
                            this.blur();    this.focus();  }"/>
                        <label for="email">e-Mail Address</label>
                    </div>
                    <div>
                        <input class="requiredinvalid" id="password" name="password"
                        type="password" tabindex="2" title="Passwords are case sensitive."
                        readonly onfocus="if (this.hasAttribute('readonly')) {
                            this.removeAttribute('readonly');
                            // fix for mobile safari to show virtual keyboard
                            this.blur();    this.focus();  }" />
                        <label for="password">Password</label>
                    </div>
                    <input type="submit" name="login" value="Login" />
                    <p>forgot password? <a href="#">send reset email</a></p>
                    <input type="button" name="register" value="Create an Account" onclick="registration();" />
                </fieldset>
                
            </form>

        </main>
    <?php require "../common/footer.php" ?>
    </div>
    <!-- Latest jQuery Library un-comment if needed-->
    <!-- <script src = "https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> -->
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <!-- JavaScript files -->
    <script>
        function registration() {
            var basepath = '<?php echo $basepath ?>';
            location.href = basepath + '/accounts/index.php?action=register';
        }
    </script>


</body>
</html>