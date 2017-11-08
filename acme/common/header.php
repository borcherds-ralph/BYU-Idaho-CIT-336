     <header>
            <div class="logoarea">
            
                <div class="logo"><img src="<?php echo $basepath; ?>/images/site/logo.gif" id="logo" alt="ACME Logo"></div>
                <div class="right">
                <?php if(isset($cookieFirstname)){
                    echo "<span id='welcome'>Welcome $cookieFirstname</span>";
                } ?>
                <?php
                    if (isset($_SESSION['loggedin'])) {
                        echo "<div id='logout'><a href='$basepath/accounts/index.php?action=Logout'>Logout</a></div>";
                        echo "<div id='update'><a href='$basepath/accounts/index.php?action=user-mgt'>Update Account</a></div>";
                    } else {
                        echo "<a href='$basepath/accounts/index.php?action=login' class='link'>
                        <img src='$basepath/images/site/account.gif' alt='Account Folder GIF' id='folder'>
                        My Account
                    </a>";
                    }
                ?>
                </div>
                
            </div>
            
        </header>