<?php

/*
 * ACME Accounts Controller
 */
// Get the database connection file
require_once '../library/connections.php';
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


$doc = $_SERVER[REQUEST_URI];
if (strpos($doc, '500.php') == true || strpos($doc, 'accounts') == true) {
    $path = "../";
}

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL){
 $action = filter_input(INPUT_GET, 'action');
}


$action2 = filter_input(INPUT_POST, 'action');
if ($action2 != NULL) {
    // Filter and store the data
    $clientFirstname = filter_input(INPUT_POST, 'clientFirstname');
    $clientLastname = filter_input(INPUT_POST, 'clientLastname');
    $clientEmail = filter_input(INPUT_POST, 'clientEmail');
    $clientPassword = filter_input(INPUT_POST, 'clientPassword');
 
    // Check for missing data
    if(empty($clientFirstname) || empty($clientLastname) || empty($clientEmail) || empty($clientPassword)){
        $message = '<p>Please provide information for all empty form fields.</p>';
        include '../view/registration.php';
        exit; 
    }

        // Send the data to the model
    $regOutcome = regClient($clientFirstname, $clientLastname, $clientEmail, $clientPassword);

    // Check and report the result
    if($regOutcome === 1){
        $message = "<p>Thanks for registering $clientFirstname. Please use your email and password to login.</p>";
        include '../view/login.php';
        exit;
    } else {
        $message = "<p>Sorry $clientFirstname, but the registration failed. Please try again.</p>";
        include '../view/registration.php';
        exit;
    }
}

 switch ($action) {

    case 'login':
      include '../view/login.php';
    break;

    case 'registration':
        include '../view/registration.php';
    break;
  
    case 'register':
        echo 'You are in the register case statement.';
    break;

    default:
       
  }