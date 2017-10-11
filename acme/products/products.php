<?php

/*
 * ACME Accounts Controller
 */
// Get the database connection file
require_once '../library/connections.php';
// Get the acme model for use as needed
require_once '../model/acme-model.php';
// Get the accounts model
// require_once '../model/accounts-model.php';
// Get the products model
require_once '../model/products-model.php';

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
include '../library/navigation.php';

// build category list for drop down list.
// This must come after the navigation so that the $categories variable has data
$catList = "<datalist id='categories'>";
foreach ($categories as $category) {
    $catList .= "<option value='$category[categoryName]'></option>";
}
$catList .= "</datalist>"; 

// Switch statement to determine what to do.
 switch ($action) {

    case 'addcat':
        include './addcat-mod.php';
      include '../view/addcat.php';
    break;

    case 'addprod':
        include 'addprod-mod.php';
        include '../view/addprod.php';
    break;

    default:
       
  }