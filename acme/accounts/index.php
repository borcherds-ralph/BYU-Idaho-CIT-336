<?php

/*
 * ACME Accounts Controller
 */
// Get the database connection file
require_once '../library/connections.php';
// Get the acme model for use as needed
require_once '../model/acme-model.php';

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

// Get the array of categories
$categories = getCategories();

// Build a navigation bar using the $categories array
$navList = "<ul id='navul'>";
if ($action == NULL) {
    $active = "class='active'"; 
}
$navList .= "<li $active><a href='$basepath/index.php' title='View the Acme home page'>Home</a></li>";
foreach ($categories as $category) {
    if ($action == $category[categoryName]) {
        $active = "class='active'"; 
    } else {
        $active = NULL;
    }
$navList .= "<li $active><a href='$basepath/index.php?action=$category[categoryName]' title='View our $category[categoryName] product line'>$category[categoryName]</a></li>";
}
$navList .= '</ul>';

 switch ($action) {

    case 'login':
      include '../view/login.php';
    break;

  case 'register':
      include '../view/registration.php';
  break;

     default:
       
  }