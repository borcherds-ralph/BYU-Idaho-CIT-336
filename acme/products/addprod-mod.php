<?php 
// Check for POST Data then process that data
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
    $category1 = filter_input(INPUT_POST, 'category');
    foreach ($categories as $category) {
        if ( $category['categoryName'] == $category1) {
            
            $categoryId = $category['categoryId'];
        }
    }
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
