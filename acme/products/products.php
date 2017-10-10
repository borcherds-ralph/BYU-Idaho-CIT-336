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

// Get the array of categories
$categories = getCategories();

// Build a navigation bar using the $categories array
$active = "";
$navList = "<ul id='navul'>";
if ($action == NULL) {
    $active = "class='active'"; 
}
$navList .= "<li $active><a href='$basepath/index.php' title='View the Acme home page'>Home</a></li>";
foreach ($categories as $category) {
    if ($action == $category['categoryName']) {
        $active = "class='active'"; 
    } else {
        $active = NULL;
    }
$navList .= "<li $active><a href='$basepath/index.php?action=$category[categoryName]' title='View our $category[categoryName] product line'>$category[categoryName]</a></li>";
}
$navList .= '</ul>';

// build category list for drop down list
$catList = "<datalist id='categories'>";
foreach ($categories as $category) {
    $catList .= "<option value='$category[categoryName]'></option>";
}
$catList .= "</datalist>";

// Check for POST Data then process that data
$action2 = filter_input(INPUT_POST, 'action');
if ($action2 == "addprod") {
    // Filter and store the data
    $invName = filter_input(INPUT_POST, 'invName');
    $invDescription = filter_input(INPUT_POST, 'invDescription');
    $invImage = filter_input(INPUT_POST, 'invImage');
    $invThumbnail = filter_input(INPUT_POST, 'invThumbnail');
    $invPrice = filter_input(INPUT_POST, 'invPrice');
    $invStock = filter_input(INPUT_POST, 'invStock');
    $invSize = filter_input(INPUT_POST, 'invSize');
    $invWeight = filter_input(INPUT_POST, 'invWeight');
    $invLocation = filter_input(INPUT_POST, 'invLocation');
    $categoryId = getCategoryId(INPUT_POST, 'category');
    $invVendor = filter_input(INPUT_POST, 'invVendor');
    $invStyle = filter_input(INPUT_POST, 'invStyle');
    
 
    // Check for missing data
    if ((empty($invName) || empty($invDescription) || empty($invImage) || empty($invThumbnail) || empty($invPrice) || empty($invStock) || empty($invSize) || empty($invWeight)) || empty($invLocation) || empty($categoryId) || empty($invVendor) || empty($invStyle)) {
        $message = '<p>Please provide information for all empty fields.</p>';
        include '../view/addprod.php';
        exit; 
    }

        // Send the data to the model
    $regOutcome = addProduct($invName, $invDescription, $invImage, $invThumbnail, $invPrice, $invStock, $invSize, $invWeight, $invLocation, $categoryId, $invVendor, $invStyle);

    // Check and report the result
    if($regOutcome === 1){
        $message = "<p>Thanks for adding $invName.</p>";
        include '../view/addprod.php';
        exit;
    } else {
        $message = "<p>Sorry $clientFirstname, but the registration failed. Please try again.</p>";
        include '../view/addprod.php';
        exit;
    }
}

if ($action2 == "addcat") {
    $categoryName = filter_input(INPUT_POST, 'categoryName');

    if (empty($categoryName)){
        $message = '<p>Please provide information for all empty fields.</p>';
        include '../view/addcat.php';
        exit; 
    }

        // Send the data to the model
    $catOutcome = addCategory($categoryName);

    // Check and report the result
    if($catOutcome === 1){
        $message = "<p>Thanks for adding the category $categoryName.</p>";
        include '../view/addcat.php';
        exit;
    } else {
        $message = "<p>Sorry adding $categoryName failed. Please try again.</p>";
        include '../view/addcat.php';
        exit;
    }
}

 switch ($action) {

    case 'addcat':
      include '../view/addcat.php';
    break;

    case 'addprod':
        include '../view/addprod.php';
    break;

    default:
       
  }