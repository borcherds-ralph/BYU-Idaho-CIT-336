<?php
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
    
    <?php include '../common/head.php'; ?>
</head>
<body>
    <div class="content">
        <?php require '../common/header.php'; ?>

        <main>
            <h1>Account Management</h1>
            <h3>Please use this section to update your account details</h3>
            <form method="post" action="<?php echo $basepath ?>/accounts/index.php" id="registrationform">
                <fieldset>
                    <div>
                        <input class="requiredinvalid" id="clientFirstname" name="clientFirstname"
                        type="text" required <?php if(isset($clientData['clientFirstname'])) {echo "value='$clientData[clientFirstname]'"; } ?> >
                        <label for="clientFirstname">First Name</label>
                    </div>
                    <div>
                        <input class="requiredinvalid" id="clientLastname" name="clientLastname"
                        type="text" required <?php if(isset($clientData['clientLastname'])) {echo "value='$clientData[clientLastname]'"; } ?> >
                        <label for="clientLastname">Last Name</label>
                    </div>
                    <div>
                        <input class="requiredinvalid" id="clientEmail" name="clientEmail"
                        type="email" required 
                        pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" tabindex="3" 
                        <?php if(isset($clientData['clientEmail'])) {echo "value='$clientData[clientEmail]'";  } ?>>
                        <label for="clientEmail">e-Mail Address</label>
                    </div>
                    
                </fieldset>

                <input type="submit" name="submit" value="Update Info">
                <!-- Add the action name - value pair -->
                <input type="hidden" name="action" value="updateClient">
                <input type="hidden" name="clientId" value="<?php if(isset($clientData['clientId'])){ echo $clientData['clientId'];} elseif(isset($clientId)){ echo $clientId; } ?>">
                
                
            </form>
            <h3>Please use this section to update your Password</h3>
            <form method="post" action="<?php echo $basepath ?>/accounts/index.php" id="passwordform">
                <fieldset>
                    <div>
                        <input class="requiredinvalid" id="clientPassword" name="clientPassword"
                        type="password" required <?php if(isset($clientData['clientPassword'])) {echo "value='$clientData[clientPassword]'"; } ?>
                        pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$"
                        title="Passwords must be at least 8 characters and contain at least 1 number, 1 capital letter and 1 special character."/>
                        <label for="clientPassword">Password</label>
                    </div>
                </fieldset>

                <input type="submit" name="submit" value="Update Password">
                <!-- Add the action name - value pair -->
                <input type="hidden" name="action" value="updatePassword">
                <input type="hidden" name="clientId" value="<?php if(isset($clientData['clientId'])){ echo $clientData['clientId'];} elseif(isset($clientId)){ echo $clientId; } ?>">
                
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
<?php unset($_SESSION['message']); ?>