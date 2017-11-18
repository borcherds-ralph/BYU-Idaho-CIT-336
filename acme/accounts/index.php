<?php
// Create or access a Session
session_start();

/*
 * ACME Accounts Controller
 */
// Get the database connection file
require_once '../library/connections.php';
// Get the functions library
require_once '../library/functions.php';
// Get the acme model for use as needed
require_once '../model/acme-model.php';
// Get the accounts model
require_once '../model/accounts-model.php';



// Set base path depending on localhost vs server
if ($_SERVER['HTTP_HOST'] == 'localhost') // or any other host
{
     $basepath = '/cit336/acme';
} else {
    $basepath = '/acme';
}


$doc = $_SERVER['REQUEST_URI'];
if (strpos($doc, '500.php') == true || strpos($doc, 'accounts') == true) {
    $path = "../";
}

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL){
 $action = filter_input(INPUT_GET, 'action');
}
// Build the navigation
$categories = getCategories();
$navList = navList($categories, $action, $prodcat);

if(isset($_COOKIE['firstname'])){
    $cookieFirstname = filter_input(INPUT_COOKIE, 'firstname', FILTER_SANITIZE_STRING);
}

$clientInfo = getClient($_SESSION['clientData']['clientEmail']);

    switch ($action) {

        case 'home':
            include '../view/home.php';
        break;

        case 'registration':
            include '../view/registration.php';
        break;

        case 'Register':
            // Filter and store the data
            $clientFirstname = filter_input(INPUT_POST, 'clientFirstname', FILTER_SANITIZE_STRING);
            $clientLastname = filter_input(INPUT_POST, 'clientLastname', FILTER_SANITIZE_STRING);
            $clientEmail = filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_EMAIL);
            $clientPassword = filter_input(INPUT_POST, 'clientPassword', FILTER_SANITIZE_STRING);
            
            $clientEmail = checkEmail($clientEmail);
            $checkPassword = checkPassword($clientPassword);

            $existingEmail = checkExistingEmail($clientEmail);
            
            // Check for existing email address in the table
            if($existingEmail){
            $message = '<p class="notice">That email address already exists. Do you want to login instead?</p>';
            include '../view/login.php';
            exit;
            }

            // Check for missing data
            if(empty($clientFirstname) || empty($clientLastname) || empty($clientEmail) || empty($checkPassword)){
                $message = '<p>Please provide information for all empty form fields.</p>';
                include '../view/registration.php';
                exit; 
            }

            // Hash the checked password
            $hashedPassword = password_hash($clientPassword, PASSWORD_DEFAULT);
            // Send the data to the model
            $regOutcome = regClient($clientFirstname, $clientLastname, $clientEmail, $hashedPassword);

            // Check and report the result
            if($regOutcome === 1){
                setcookie('firstname', $clientFirstname, strtotime('+1 year'), '/');
                $message = "<p>Thanks for registering $clientFirstname. Please use your email and password to login.</p>";
                include '../view/login.php';
                exit;
            } else {
                $message = "<p>Sorry $clientFirstname, but the registration failed. Please try again.</p>";
                include '../view/registration.php';
                exit;
            }
            include '../view/registration.php';
        break;
        
        case 'login':
            include '../view/login.php';
        break;


        case 'Login':
            $clientEmail = filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_EMAIL);
            $clientEmail = checkEmail($clientEmail);
            $clientPassword = filter_input(INPUT_POST, 'clientPassword', FILTER_SANITIZE_STRING);
            $passwordCheck = checkPassword($clientPassword);
            
            // Run basic checks, return if errors
            if (empty($clientEmail) || empty($passwordCheck)) {
                $message = '<p class="notice">Please provide a valid email address and password.</p>';
                include '../view/login.php';
                exit;
            }
            
            // A valid password exists, proceed with the login process
            // Query the client data based on the email address
            $clientData = getClient($clientEmail);
            // Compare the password just submitted against
            // the hashed password for the matching client
            $hashCheck = password_verify($clientPassword, $clientData['clientPassword']);
            // If the hashes don't match create an error
            // and return to the login view
            if (!$hashCheck) {
                $message = '<p class="notice">Please check your password and try again.</p>';
                include '../view/login.php';
                exit;
            }
            // A valid user exists, log them in
            $_SESSION['loggedin'] = TRUE;
            // Remove the password from the array
            // the array_pop function removes the last
            // element from an array
            array_pop($clientData);
            // Store the array into the session
            $_SESSION['clientData'] = $clientData;
            setcookie('firstname', $_SESSION['clientData']['clientFirstname'], strtotime('+1 year'), $basepath);
            $cookieFirstname = $_SESSION['clientData']['clientFirstname'];
            // Send them to the admin view
            include '../view/admin.php';
            exit;
        break;
        
        case 'Logout':
            session_destroy();
            setcookie('firstname', $_SESSION['clientData']['clientFirstname'], time() - 3600, $basepath);
            header('location:' . $basepath);
            exit;
        break;
        
        case 'updateUSR':
            $clientInfo = getClient($_SESSION['clientData']['clientEmail']);
            include '../view/user-mgt.php';
            exit;
        break;

        case 'user-mgt':
            include '../view/user-mgt.php';
            exit;
        break;

        case 'updateClient':
            // Filter and store the data
            $clientFirstname = filter_input(INPUT_POST, 'clientFirstname', FILTER_SANITIZE_STRING);
            $clientLastname = filter_input(INPUT_POST, 'clientLastname', FILTER_SANITIZE_STRING);
            $clientEmail = filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_EMAIL);
            $clientId = filter_input(INPUT_POST, 'clientId', FILTER_SANITIZE_NUMBER_INT);

            $clientEmail = checkEmail($clientEmail);

            if($_SESSION['clientData']['clientEmail'] <> $clientEmail) {
                $existingEmail = checkExistingEmail($clientEmail);
            } else { $existingEmail = FALSE; }

            // Check for existing email address in the table
            if($existingEmail){
            $message = '<p class="notice">That email address you are changing to already exists.</p>';
            include '../view/user-mgt.php';
            exit;
            }

            // Check for missing data
            if(empty($clientFirstname) || empty($clientLastname) || empty($clientEmail)){
                $message = '<p>Please provide information for all empty form fields.</p>';
                include '../view/user-mgt.php';
                exit; 
            }

            $regOutcome = updateClient($clientFirstname, $clientLastname, $clientEmail, $clientId);

            // Check and report the result
            if($regOutcome === 1){
                setcookie('firstname', $clientFirstname, strtotime('+1 year'), '/');
                $message = "<p>Thanks for updating your info $clientFirstname.</p>";
                include '../view/admin.php';
                exit;
            } else {
                $message = "<p>Sorry $clientFirstname, but the update failed. Please try again.</p>";
                $clientInfo = getClient($_SESSION['clientData']['clientEmail']);
                include '../view/user-mgt.php';
                exit;
            }
            include '../view/user-mgt.php';
            exit;
        break;

        case 'updatePWD':
            $clientInfo = getClient($_SESSION['clientData']['clientEmail']);
            include '../view/user-mgt.php';
            exit;
        break;

        case 'updatePassword':
            // Filter and store the data
            $clientPassword = filter_input(INPUT_POST, 'clientPassword', FILTER_SANITIZE_STRING);
            $clientId = filter_input(INPUT_POST, 'clientId', FILTER_SANITIZE_NUMBER_INT);

            $checkedPassword = checkPassword($clientPassword);
            $hashedPassword = password_hash($clientPassword, PASSWORD_DEFAULT);
            // $clientInfo = getClient($_SESSION['clientData']['clientEmail']);

            // Check for missing data
            if(empty($checkedPassword)) {
                $message = '<p>Please provide information for all empty form fields.</p>';
                include '../view/user-mgt.php';
                exit; 
            }

            $regOutcome = updatePassword($hashedPassword, $clientId);

            // Check and report the result
            if($regOutcome === 1){
                $message = "<p>Thanks for updating your password $clientInfo[clientFirstname].</p>";
                include '../view/admin.php';
                exit;
            } else {
                $message = "<p>Sorry $clientInfo[clientFirstname], but the password update failed. Please try again.</p>";
                include '../view/user-mgt.php';
                exit;
            }
            include '../view/user-mgt.php';
            exit;
        break;

        default:
            include '../view/admin.php';

    }