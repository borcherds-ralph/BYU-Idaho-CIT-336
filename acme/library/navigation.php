<?php 

// Get the array of categories
$categories = getCategories();
$active = '';

// Build a navigation bar using the $categories array
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
$navList .= "<li $active><a href='$basepath/products/?action=$category[categoryName]' title='View our $category[categoryName] product line'>" . $category['categoryName'] . "</a></li>";
}
$navList .= '</ul>';