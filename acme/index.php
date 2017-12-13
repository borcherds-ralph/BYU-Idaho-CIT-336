<?php
// Create or access a Session
session_start();

/*
 * ACME Main Controller
 */

 // Get the database connection file
 require_once 'library/connections.php';
 // Get the functions.php file
 require_once 'library/functions.php';
 // Get the acme model for use as needed
 require_once 'model/acme-model.php';
 // Get the accounts model
 require_once 'model/accounts-model.php';
 // Get the products model
 require_once 'model/products-model.php';
 // Get the reviews model
 require_once 'model/reviews-model.php';
 
 // Set the base paths for links etc and images.
$basepath = setBasePath();
$imgpath = setImagePath();

// Get the action to perform.
$action = filter_input(INPUT_POST, 'action');
if ($action == NULL){
 $action = filter_input(INPUT_GET, 'action');
}



// Build the navigation
$categories = getCategories();
$navList = navList($categories, $action, $prodcat);

// Check if the firstname cookie exists, get its value
if (isset($_SESSION['loggedin'])) {
    $clientData = getClient($_SESSION['clientData']['clientEmail']);
    array_pop($clientData);
}

 switch ($action){
    
    case 'anything':
    break;

    case 'Logout':
        session_destroy();
        setcookie('firstname', $_SESSION['clientData']['clientFirstname'], time() - 3600, $basepath);
        header('location:' . $basepath);
    exit;

    default:
        include 'view/home.php';
    }