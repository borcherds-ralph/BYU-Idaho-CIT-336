<?php
// Create or access a Session
session_start();
/*
 * ACME Accounts Controller
 */
// Get the database connection file
require_once '../library/connections.php';
require_once '../library/functions.php';
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

// This section of code checks to see if the input is a POST or GET.
// If it is a GET then it reads the input for the page to load else
// it reads the add inventory item or category item and adds it to the database.
$action = filter_input(INPUT_POST, 'action');
if ($action == NULL){
    $action = filter_input(INPUT_GET, 'action');
}

// Build the navigation
$categories = getCategories();
$navList = navList($categories, $action);


if(isset($_COOKIE['firstname'])){
    $cookieFirstname = filter_input(INPUT_COOKIE, 'firstname', FILTER_SANITIZE_STRING);
}
// Switch statement to determine what to do.
 switch ($action) {

    case 'addcat':  
        $categoryName = filter_input(INPUT_POST, 'categoryName');
    
        if (empty($categoryName)){
                $message = '<p>Please provide information for all empty fields.</p>';
                $navList = navList($categories, $action);
                include '../view/addcat.php';
                exit; 
        }
    
        // Send the data to the model -->
        $catOutcome = addCategory($categoryName);
    
        // Check and report the result
        if($catOutcome === 0){
            $message = "Sorry adding $categoryName failed. Please try again.";
            $navList = navList($categories, $action);
            include '../view/addcat.php';
            exit;
        }  
        $categories = getCategories();
        include '../view/addcat.php';
    break;

    case 'addprod':
        include '../library/product-add.php';
        $navList = navList($categories, $action);
        $message = "<p>Sorry $clientFirstname, but the registration failed. Please try again.</p>";
        $catList = categoryList($categories);
        if ((empty($invName) || empty($invDescription) || empty($invImage) || empty($invThumbnail) || empty($invPrice) || empty($invStock) || empty($invSize) || empty($invWeight)) || empty($invLocation) || empty($categoryId) || empty($invVendor) || empty($invStyle)) {
                $message = 'Please provide information for all empty fields.';
            include '../view/addprod.php';
            exit; 
        }
        $price = checkPrice($invPrice);
        
            // Send the data to the model
        $regOutcome = addProduct($invName, $invDescription, $invImage, $invThumbnail, $price, $invStock, $invSize, $invWeight, $invLocation, $categoryId, $invVendor, $invStyle);

        // Check and report the result
        if($regOutcome === 1){
                $message = "Thanks for adding $invName."; 
                $sucess = '1'; 
        } else {
            include '../library/navigation.php';
            include '../view/addprod.php';
            exit;
        }
        // build category list for drop down list.
        // This must come after the navigation so that the $categories variable has data
        $catList = "<datalist id='categories'>";
        foreach ($categories as $category) {
            $catList .= "<option value='" . $category['categoryName'] . "'></option>";
        }
        $catList .= "</datalist>"; 
        $category = '';
        include '../view/addprod.php';
    break;

    default:
       include '../view/product.php';
  }