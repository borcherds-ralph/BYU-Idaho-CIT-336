<?php


function checkEmail($clientEmail){
    $valEmail = filter_var($clientEmail, FILTER_VALIDATE_EMAIL);
    return $valEmail;
}


// Check the password for a minimum of 8 characters,
// at least one 1 capital letter, at least 1 number and
// at least 1 special character
function checkPassword($clientPassword){
    $pattern = '/^(?=.*[[:digit:]])(?=.*[[:punct:]])[[:print:]]{8,}$/';
    return preg_match($pattern, $clientPassword);
}

function checkPrice($price){
    $pattern = '/^[0-9]+(\.[0-9]{1,2})?$/';
    return preg_match($pattern, $price);
}

function makeCategories($categories){
    // build category list for drop down list.
    // This must come after the navigation so that the $categories variable has data
    $catList = "<datalist id='categories'>";
    foreach ($categories as $category) {
        $catList .= "<option value='" . $category['categoryName'] . "'></option>";
    }
    $catList .= "</datalist>";
    return $catList;
}

// Create Navigation
function navList($categories, $action, $prodcat) {
    if ($_SERVER['HTTP_HOST'] == 'localhost') // or any other host
    {
         $basepath = '/cit336/acme';
    } else {
        $basepath = '/acme';
    }
    
    $active = '';

    // Build a navigation bar using the $categories array
    $navList = "<ul class='navigation'>";
    if ($action == NULL && $prodcat == NULL) {
        $active = "class='active'"; 
    }
    $navList .= "<li $active><a href='$basepath/index.php' title='View the Acme home page'>Home</a></li>";
    foreach ($categories as $category) {
        if ($action == $category['categoryName'] || $prodcat == $category['categoryId']) {
            $active = "class='active'"; 
        } else {
            $active = NULL;
        }
        $navList .= "<li $active><a href='$basepath/products/?action=category&type=$category[categoryName]' title='View our $category[categoryName] product line'>$category[categoryName]</a></li>";
    }
    $navList .= '</ul>';
    return $navList;
}

function categoryList($categories) {
    $catList = "<datalist id='categories'>";
    foreach ($categories as $category) {
        $catList .= "<option value='" . $category['categoryName'] . "'></option>";
    }
    $catList .= "</datalist>"; 
    $category = '';
    return $catList;
}

// Build the list of products to display.
function buildProductsDisplay($products){
    if ($_SERVER['HTTP_HOST'] == 'localhost') // or any other host
    {
         $basepath = '/cit336/acme/';
         $imgpath = '/cit336';
    } else {
        $basepath = '/acme';
        $imgpath = '';
    }

    $pd = '<ul id="prod-display">';
    foreach ($products as $product) {
     $pd .= '<li>';
     $pd .= "<a href='$basepath/products/?action=proddetail&invId=$product[invId]&prodcat=$product[categoryId]'><img src='" . $imgpath . "$product[invThumbnail]' alt='Image of $product[invName] on Acme.com'>";
     $pd .= '<hr>';
     $pd .= "<h2>$product[invName]</h2>";
     $pd .= "<span>$$product[invPrice]</span></a>";
     $pd .= '</li>';
    }
    $pd .= '</ul>';
    return $pd;
}

function buildProduct($products){
    if ($_SERVER['HTTP_HOST'] == 'localhost') // or any other host
    {
         $basepath = '/cit336/acme/';
         $imgpath = '/cit336';
    } else {
        $basepath = '/acme';
        $imgpath = '';
    }
    $pd = "<h2>$products[invName]</h2>";
    $pd .= "";
    return $pd;
}
