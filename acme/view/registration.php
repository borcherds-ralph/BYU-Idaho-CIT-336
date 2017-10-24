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
                echo $message;
                }
            ?>
            <form method="post" action="<?php echo $basepath ?>/accounts/index.php" id="registrationform">
                <fieldset>
                    <div>
                        <input class="requiredinvalid" id="clientFirstname" name="clientFirstname"
                        type="text" required placeholder="First Name" tabindex="1"
                        title="Enter your First Name" <?php if(isset($clientFirstname)){echo "value='$clientFirstname'";} ?> />
                        <label for="clientFirstname">First Name</label>
                    </div>
                    <div>
                        <input class="requiredinvalid" id="clientLastname" name="clientLastname"
                        type="text" required placeholder="Last Name" tabindex="2"
                        title="Enter your Last Name" <?php if(isset($clientLastname)){echo "value='$clientLastname'";} ?>/>
                        <label for="clientLastname">Last Name</label>
                    </div>
                    <div>
                        <input class="requiredinvalid" id="clientEmail" name="clientEmail"
                        type="email" required placeholder="email@address.com" 
                        pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" tabindex="3" 
                        title="E-mail address must be a valid e-mail address format." <?php if(isset($clientEmail)){echo "value='$clientEmail'";} ?>/>
                        <label for="clientEmail">e-Mail Address</label>
                    </div>
                    <div>
                        <input class="requiredinvalid" id="clientPassword" name="clientPassword"
                        type="password" required tabindex="4" 
                        pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$"
                        title="Passwords must be at least 8 characters and contain at least 1 number, 1 capital letter and 1 special character."/>
                        <label for="clientPassword">Password</label>
                    </div>
                </fieldset>

                <input type="submit" name="submit" value="Register">
                <!-- Add the action name - value pair -->
                <input type="hidden" name="action" value="register">
                
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