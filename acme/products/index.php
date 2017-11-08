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
        // This include is all the fields on the Add/Modify Inventory Form
        include '../library/product-add.php';
        $navList = navList($categories, $action);
        $message = "<p>Sorry $clientFirstname, but the registration failed. Please try again.</p>";
        $catList = categoryList($categories);
        if ((empty($invName) || empty($invDescription) || empty($invImage) || empty($invThumbnail) || empty($invPrice) || empty($invStock) || empty($invSize) || empty($invWeight)) || empty($invLocation) || empty($categoryId) || empty($invVendor) || empty($invStyle)) {
                $message = 'Please provide information for all empty fields.';
            include '../view/prod-add.php';
            exit; 
        }
        $price = checkPrice($invPrice);
        
            // Send the data to the model
        $regOutcome = addProduct($invName, $invDescription, $invImage, $invThumbnail, $invPrice, $invStock, $invSize, $invWeight, $invLocation, $categoryId, $invVendor, $invStyle);

        // Check and report the result
        if($regOutcome === 1){
                $message = "Thanks for adding $invName."; 
                $sucess = '1'; 
        } else {
            include '../library/navigation.php';
            include '../view/prod-add.php';
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
        include '../view/prod-add.php';
    break;

    case 'Logout':
        session_destroy();
        setcookie('firstname', $_SESSION['clientData']['clientFirstname'], time() - 3600, $basepath);
        header('location:' . $basepath);
    exit;
    
    case 'mod':
        $invId = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        $prodInfo = getProductInfo($invId);
        if(count($prodInfo)<1){
            $message = 'Sorry, no product information could be found.';
        }
        // build category list for drop down list.
        // This must come after the navigation so that the $categories variable has data
        $catList = "<datalist id='categories'>";
        foreach ($categories as $category) {
            $catList .= "<option value='" . $category['categoryName'] . "'></option>";
        }
        $catList .= "</datalist>"; 
        include '../view/prod-update.php';
        exit;
    break;

    case 'updateProd':
        // This include is all the fields on the Add/Modify Inventory Form
        include '../library/product-add.php';
        $invId = filter_input(INPUT_POST, 'invId', FILTER_SANITIZE_NUMBER_INT);

        $catList = "<datalist id='categories'>";
        foreach ($categories as $category) {
            $catList .= "<option value='" . $category['categoryName'] . "'></option>";
        }
        $catList .= "</datalist>"; 

        if ((empty($invName) || empty($invDescription) || empty($invImage) || empty($invThumbnail) || empty($invPrice) || empty($invStock) || empty($invSize) || empty($invWeight)) || empty($invLocation) || empty($categoryId) || empty($invVendor) || empty($invStyle)) {
            $message = '<p>Please complete all information for the updated item! Double check the category of the item.</p>';
            include '../view/prod-update.php';
            exit;
        }   
        $updateResult = updateProduct($invName, $invDescription, $invImage, $invThumbnail, $invPrice, $invStock, $invSize, $invWeight, $invLocation, $categoryId, $invVendor, $invStyle, $invId);
        if ($updateResult) {
            $message = "<p>Congratulations, $invName was successfully updated.</p>";
            $_SESSION['message'] = $message;
            header("location: $basepath/products/");
            exit;
        } else {
            $message = "<p>Error. The $invName product was not updated.</p>";
            include '../view/prod-update.php';
            exit;
        }
    break;

    case 'del':
        $invId = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        $prodInfo = getProductInfo($invId);
        if (count($prodInfo) < 1) {
        $message = 'Sorry, no product information could be found.';
        }
        include '../view/prod-delete.php';
        exit;
    break;

    case 'deleteProd':
        $invName = filter_input(INPUT_POST, 'invName', FILTER_SANITIZE_STRING);
        $invId = filter_input(INPUT_POST, 'invId', FILTER_SANITIZE_NUMBER_INT);
    
        $deleteResult = deleteProduct($invId);
        if ($deleteResult) {
            $message = "<p class='notice'>Congratulations, $invName was successfully deleted.</p>";
            $_SESSION['message'] = $message;
            header("location: $basepath/products/");
            exit;
        } else {
            $message = "<p class='notice'>Error: $invName was not deleted.</p>";
            $_SESSION['message'] = $message;
            header("location: $basepath/products/");
            exit;
        }
    break;
    default:
        $products = getProductBasics();
        if(count($products) > 0){
            $prodList = "<div class='inv-items'>";
            $prodList .= "<div class='inv-line prodname' id='title'>Product Name</div>";
            $prodList .= "<div class='inv-line prodmodify col2'></div>";
            $prodList .= "<div class='inv-line proddelete col3'></div>";
            foreach ($products as $key=>$product) {
                if($key % 2 == 0) {
                    $rowoddeven = 'even';
                } else {$rowoddeven = 'odd';}
                $prodList .= "<div class='inv-line prodname col1 $rowoddeven'>$product[invName]</div>";
                $prodList .= "<div class='inv-line prodmodify col2 $rowoddeven'><a href='$basepath/products?action=mod&id=$product[invId]' title='Click to modify'>Modify</a></div>";
                $prodList .= "<div class='inv-line proddelete col3 $rowoddeven'><a href='$basepath/products?action=del&id=$product[invId]' title='Click to delete'>Delete</a></div>";
            }
             $prodList .= '</div>';
            } else {
             $message = '<p class="notify">Sorry, no products were returned.</p>';
          }
        include '../view/prod-mgt.php';
    break;
  }