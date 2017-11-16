     <header>
            <div class="logoarea">
            
                <div class="logo"><a href="<?php echo $basepath; ?>"><img src="<?php echo $basepath; ?>/images/site/logo.gif" id="logo" alt="ACME Logo"></a></div>
                <div class="right">
                   
                        <?php if(isset($cookieFirstname)){
                            echo "<span id='welcome'>Welcome $cookieFirstname</span>";
                        } ?>
                        <?php
                            if (isset($_SESSION['loggedin'])) {
                                echo "<span><div id='logout'><a href='$basepath/accounts/index.php?action=Logout'>Logout</a></div>";
                                echo "<div id='update'><a href='$basepath/accounts/index.php?action=user-mgt'>Update Account</a></div></span>";
                            } else {
                                echo "<span><a href='$basepath/accounts/index.php?action=login' class='link'>
                                <img src='$basepath/images/site/account.gif' alt='Account Folder GIF' id='folder'>My Account</a></span>";
                            }
                        ?>
                    
                </div>
                
            </div>
            <button class="hamburger" onclick="toggleHam()">&#9776;</button>
            <nav><?php echo $navList; ?></nav>
        </header>